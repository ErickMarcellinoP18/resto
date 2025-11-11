<!DOCTYPE html>
<html lang="en">

<head>
    <title>Program Toko - Tambah Produk</title>
    @include('ADMTemplate.head')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('ADMTemplate.navbar')
                <!-- End of Topbar -->

                <div class="container">

                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Tambah Produk</h1>
                                </div>
                                <div class="text-center mb-3">
                                    <img id="preview-image" 
                                        class="mx-auto d-block rounded" 
                                        src="{{ asset('images/noimage.jpg') }}" 
                                        width="200" height="200" 
                                        alt="Gambar Produk">
                                </div>
                                <form class="user" action="{{ route('produks.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label class="font-weight-bold">Nama Produk</label>
                                            <input type="text"
                                                class="form-control form-control-user @error('nama') is-invalid @enderror"
                                                id="InputNamaProduk" placeholder="Nama Produk"
                                                value="{{ old('nama') }}" name="nama" required>
                                            @error('nama')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label class="font-weight-bold">Harga Jual</label>
                                            <input type="number"
                                                class="form-control form-control-user @error('harga') is-invalid @enderror"
                                                id="InputHarga" placeholder="Harga Jual Produk" value="{{ old('harga') }}"
                                                name="harga" required>
                                            @error('harga')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label class="font-weight-bold">Kategori</label>
                                            <select name="id_kategori"
                                                class="form-control form-control-user @error('id_kategori') is-invalid @enderror"
                                                id="InputKategori">
                                                <option value="">Pilih Kategori</option>
                                                @foreach ($kategori as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                            @error('id_kategori')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label class="font-weight-bold">Gambar Produk</label>
                                            <input type="file"
                                                class="form-control form-control-user @error('gambar') is-invalid @enderror"
                                                id="InputGambar" name="gambar" required>
                                            @error('gambar')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    
                                    <div class="col-sm">
                                        
                                        <label class="font-weight-bold">Deskripsi</label>
                                        <textarea
                                            class="form-control form-control-user @error('deskripsi') is-invalid @enderror"
                                            id="InputDeskripsi"
                                            name="deskripsi"
                                            placeholder="Masukkan deskripsi"
                                            rows="4"
                                            >{{ old('deskripsi') }}</textarea>
                                        @error('deskripsi')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                
                                
                                <hr>
                                <div class="row d-flex justify-content-center">
                                    <div class="col-sm-3">
                                        <button type="submit" class="btn btn-success btn-user btn-block btn-sm-3">
                                            Simpan
                                        </button>
                                    </div>
                                    <div class="col-sm-3">
                                        <a class="btn btn-danger btn-user btn-block" href="{{route('produks.cancel') }}">Batal</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </form>
                    <!-- Modal Container -->
                    <div class="modal fade" id="DetailModal" tabindex="-1" aria-labelledby="DetailModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-scrollable">
                        <div class="modal-content"id="modal-content">
                            <div class="modal-body text-center">
                            <div class="spinner-border text-primary" role="status"></div>
                            <p class="mt-2">Memuat data...</p>
                            </div>
                        </div>
                    </div>
                    </div>
                    <!-- Modal Container -->
                     <!-- Modal Container -->
                    <div class="modal fade" id="option" tabindex="-1" aria-labelledby="optionLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-scrollable">
                        <div id="option-content" class="modal-content">
                            <div class="modal-body text-center">
                                <div class="spinner-border text-primary" role="status"></div>
                                <p class="mt-2">Memuat opsi...</p>
                            </div>
                        </div>
                    </div>
                    </div>
                    </div>

                    </div>
                    </div>
                    @include('ADMTemplate.footer')
                </div>


            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    @include('ADMTemplate.logoutModal')

    @include('ADMTemplate.script')
    
    <script>
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session('success') }}',
                confirmButtonText: 'OK'
            });
        @endif

        @if (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ session('error') }}',
                confirmButtonText: 'OK'
            });
        @endif
    </script>
    <script>
        document.getElementById('InputGambar').addEventListener('change', function(event) {
            const reader = new FileReader();
            reader.onload = function() {
                document.getElementById('preview-image').src = reader.result;
            }
            if (event.target.files[0]) {
                reader.readAsDataURL(event.target.files[0]);
            }
        });
    </script>
    
</body>

</html>
