<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\DetilNota;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Produk;
use App\Models\Nota;
use App\Models\DetilProduk;
use Exception;
use Carbon\Carbon;

class PesananController extends Controller
{
    public function create()
    {
        Carbon::setLocale('id');
        $date = Carbon::now()->translatedFormat('l, d F Y');

        $produk = Produk::all();
        $cart = session()->get('cart', []);
        $total = 0;
        foreach ($cart as $details) {
            $total += $details['harga'] * $details['jumlah'];
        }

        return view('laporan.nota', compact('cart', 'total', 'date', 'produk'))
            ->with('success', 'Transaksi siap diproses.');
    }

   
    public function cetakNota($id)
    {
        $nota = Nota::find($id);
        $detilnota = DetilNota::where('id_nota', $id)->get();
        $pdf = Pdf::loadView('transaksi.nota', compact('nota', 'detilnota'));
        return $pdf->stream('Nota-' . $nota->inv_num . '.pdf');
    }

    public function cash(Request $request)
    {
        try {
            $uang = $request->uang;
            $cart = session()->get('cart');
            $total = 0;
            $tdiskon = 0;

            foreach ($cart as $details) {
                $total += ($details['harga'] * $details['jumlah']) - $details['diskon'];
                $tdiskon += ($details['diskon']);
            }

            $kembalian = $uang - $total;

            if ($kembalian < 0) {
                return redirect()->route('pesanan.create')->with('error', 'Uang yang anda masukkan kurang');
            }

            \DB::beginTransaction();

            $nota = Nota::create([
                'inv_num' => 'INV-' . date('Ymd') . '-' . str_pad(Nota::count() + 1, 3, '0', STR_PAD_LEFT),
                'total' => $total,
                'bayar' => $uang,
                'kembali' => $kembalian,
                'tanggal' => Carbon::today(),
                'id_kasir' => auth()->user()->id,
                'status' => 'lunas',
                'metode' => 'cash',
            ]);

            foreach ($cart as $id => $details) {
                $jumlah_dibutuhkan = $details['jumlah'];
                // $total_hpp = 0;
                
                $produk = Produk::find($details['id_produk']);
                $total_stok = $produk->stok;

                if ($total_stok < $jumlah_dibutuhkan) {
                    throw new Exception("Stok produk {$details['nama']} tidak mencukupi. Stok tersedia: $total_stok");
                }

                if ($jumlah_dibutuhkan <= 0) break;
                $jumlah_diambil = min($produk->stok, $jumlah_dibutuhkan);
                $produk->stok -= $jumlah_diambil;
                $produk->save();
                // $total_hpp += $jumlah_diambil * $produk->harga;
                $jumlah_dibutuhkan -= $jumlah_diambil;

                // $hpp_per_unit = $total_hpp / $details['jumlah'];


                DetilNota::create([
                    'id_nota' => $nota->id,
                    'id_produk' => $details['id_produk'],
                    'jumlah' => $details['jumlah'],
                    'harga' => $details['harga'],
                    // 'hpp' => $hpp_per_unit,
                    'subtotal' => $details['harga'] * $details['jumlah'],
                    'diskon' => $details['diskon'],
                ]);
            }

            
            \DB::commit();

            session()->forget('cart');

            return redirect()->route('pesanan.create')
            ->with('success', 'Pesanan berhasil! Kembalian: Rp. '.number_format($kembalian, 0, ',', '.'))
            ->with('print_id', $nota->id); 

        } catch (Exception $e) {
            \DB::rollBack();
            return redirect()->route('pesanan.create')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function qrisSelesai(Request $request)
    {
        try {
            $cart = session()->get('cart');
            $total = 0;
            $tdiskon = 0;

            foreach ($cart as $details) {
                $total += ($details['harga'] * $details['jumlah']) - $details['diskon'];
                $tdiskon += ($details['diskon']);
            }

           

            \DB::beginTransaction();

            $nota = Nota::create([
                'inv_num' => 'INV-' . date('Ymd') . '-' . str_pad(Nota::count() + 1, 3, '0', STR_PAD_LEFT),
                'total' => $total,
                'bayar' => $total,
                'kembali' => 0,
                'tanggal' => Carbon::today(),
                'id_kasir' => auth()->user()->id,
                'status' => 'lunas',
                'metode' => 'QRIS',
            ]);

            foreach ($cart as $id => $details) {
                $jumlah_dibutuhkan = $details['jumlah'];
                // $total_hpp = 0;
                $produk = Produk::find($details['id_produk']);
                $stok_available = $produk->stok;

                $total_stok = $stok_available;
                if ($total_stok < $jumlah_dibutuhkan) {
                    throw new Exception("Stok produk {$details['nama']} {$details['varian']} tidak mencukupi. Stok tersedia: $total_stok");
                }

                if ($jumlah_dibutuhkan <= 0) break;
                $jumlah_diambil = min($produk->stok, $jumlah_dibutuhkan);
                $produk->stok -= $jumlah_diambil;
                $produk->save();
                // $total_hpp += $jumlah_diambil * $stok->harga;
                $jumlah_dibutuhkan -= $jumlah_diambil;
                // $hpp_per_unit = $total_hpp / $details['jumlah'];


                DetilNota::create([
                    'id_nota' => $nota->id,
                    'id_produk' => $details['id_produk'],
                    'jumlah' => $details['jumlah'],
                    'harga' => $details['harga'],
                    // 'hpp' => $hpp_per_unit,
                    'subtotal' => $details['harga'] * $details['jumlah'],
                    'diskon' => $details['diskon'],
                ]);
            }

            
            \DB::commit();
            
            DetilProduk::where('stok', 0)->delete();
            

            session()->forget('cart');

        return response()->json([
            'success' => true,
            'redirect' => route('pesanan.create'),
            'print_id' => $nota->id
        ]);

        } catch (Exception $e) {
            \DB::rollBack();
            return redirect()->route('pesanan.create')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
