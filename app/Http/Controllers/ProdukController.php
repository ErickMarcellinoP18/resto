<?php

namespace App\Http\Controllers;

use Dotenv\Exception\ValidationException;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\DetilProduk;
use Illuminate\Support\Facades\Storage;

use Exception;
use function PHPUnit\Framework\returnArgument;

class ProdukController extends Controller
{

    public function index(Request $request)
    {
        
        $produk = Produk::where('status', 1)
        ->where(function($query) use ($request) {
            $query->where('nama', 'like', '%' . $request->search . '%')
                ->orWhereHas('kategori', function($q) use ($request) {
                    $q->where('nama', 'like', '%' . $request->search . '%');
                });
        })
        ->orderBy('nama', 'asc')
        ->get();

        $stok = DetilProduk::select('id_produk')
        ->selectRaw('SUM(stok) as total_stok')
        ->groupBy('id_produk')
        ->pluck('total_stok', 'id_produk');

        

        return view('kelolaProduk.index', compact('produk', 'stok'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('kelolaProduk.create', compact('kategori'));
    }

    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        $kategori = Kategori::all();
        return view('kelolaProduk.edit', compact('produk', 'kategori'));
    }

    public function store(Request $r)
    {
        $r->validate([
            'nama'=> 'required|string|max:255',
            'harga'=> 'required|numeric',
        ]);

        try{
            DB::beginTransaction();
            $gambar = null;
            if($r->hasFile('gambar')){
                $gambar = $r->file('gambar')->store('produk', 'public');
            }

            $produk = Produk::create([
                'nama' => $r->nama,
                'harga' => $r->harga,
                'id_kategori' => $r->id_kategori,
                'gambar' => $gambar,
            ]);
            DB::commit();
            return redirect()->route('produks.index')->with('success', 'Produk berhasil ditambahkan');
        }catch(Exception $e){
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }

    public function update(Request $r, $id)
    {
        $r->validate([
            'nama'=> 'required|string|max:255',
            'harga'=> 'required|numeric',
        ]);

        try{
            DB::beginTransaction();
            $produk = Produk::findOrFail($id);

            if($r->hasFile('gambar')){
                if($produk->gambar){
                    Storage::disk('public')->delete($produk->gambar);
                }
                $gambar = $r->file('gambar')->store('produk', 'public');
                $produk->gambar = $gambar;
            }

            $produk->nama = $r->nama;
            $produk->harga = $r->harga;
            $produk->id_kategori = $r->id_kategori;
            $produk->save();

            DB::commit();
            return redirect()->route('produks.index')->with('success', 'Produk berhasil diupdate');
        }catch(Exception $e){
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        if($produk->gambar){
            Storage::disk('public')->delete($produk->gambar);
        }
        $produk->gambar = null;
        $produk->status = 0;
        $produk->save();
        return redirect()->route('produks.index')->with('success', 'Produk berhasil dihapus');
    }
}
