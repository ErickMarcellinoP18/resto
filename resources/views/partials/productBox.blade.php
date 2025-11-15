<!-- resources/views/partials/productBox.blade.php -->
<div class="image">
<img src="{{ asset('storage/' . $item->gambar) }}" width="150px">
</div>
<div class="content">
    <h3>{{ $item->nama }}</h3>
    <h2>
        Kategori:
    @if (!is_null($item->kategori))
        {{ $item->kategori->nama }}
    @endif
    </h2>
    <h2><span class="stock" style="font-size: larger;">Stok Tersedia: {{ $item->stok ?? 0 }}</span></h2>
    <form id="addToCartForm" method="GET" 
        action="{{ route('addproduk.to.cart', ['id' => $item->id]) }}">
        <button type="submit" class="btn btn-secondary">Tambah ke keranjang</button>
    </form>
    <br>
    <span class="price">Rp. {{ number_format($item->harga, 0, ',', '.') }}</span>
    <br>
    
</div>
