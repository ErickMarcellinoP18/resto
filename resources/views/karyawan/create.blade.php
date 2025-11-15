<!DOCTYPE html>
<html lang="en">

<head>
    <title>Program Toko - Tambah Karyawan</title>
    @include('ADMTemplate.head')
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('ADMTemplate.left-sidebar')
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
                                    <h1 class="h4 text-gray-900 mb-4">Tambah Karyawan</h1>
                                </div>

                                <div class="text-center mb-3">
                                    <img id="preview-image" 
                                        class="mx-auto d-block rounded" 
                                        src="{{ asset('images/noimage.jpg') }}" 
                                        width="200" height="200" 
                                        alt="Gambar Produk">
                                </div>
                                
                                <form class="user" action="{{ route('kategori.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label class="font-weight-bold">Nama Karyawan</label>
                                            <input type="text"
                                                class="form-control form-control-user @error('nama') is-invalid @enderror"
                                                id="InputNamaProduk" placeholder="Nama Kategori"
                                                value="{{ old('nama') }}" name="nama" required>
                                            @error('nama')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label class="font-weight-bold">NIP</label>
                                            <input type="text"
                                                class="form-control form-control-user @error('nip') is-invalid @enderror"
                                                id="InputNIP" placeholder="NIP"
                                                value="{{ old('nip') }}" name="nip" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label class="font-weight-bold">Email</label>
                                            <input type="email" 
                                            class="form-control form-control-user @error('email') is-invalid @enderror"
                                            id="InputEmail" placeholder="Email"
                                            value="{{ old('email') }}" name="email" required>
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label class="font-weight-bold">Foto</label>
                                            <input type="file" 
                                            class="form-control form-control-user @error('foto') is-invalid @enderror"
                                            id="InputFoto" name="foto">
                                        </div>
                                    </div>
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-sm-3">
                                            <button type="submit" class="btn btn-success btn-user btn-block">
                                                Simpan
                                            </button>
                                        </div>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Main Content -->
            
            <!-- Footer -->
            <!-- End of Footer -->
            
        </div>
        @include('ADMTemplate.footer')
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    @include('ADMTemplate.logoutModal')

    @include('ADMTemplate.script')

</body>

</html>
