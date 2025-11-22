<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <!-- @include('template.script'); -->

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Custom CSS -->
    <style>
        body.dark-mode {
            background-color: #121212;
            color: #ffffff;
        }

        /* Perbaikan header dan navbar saat dark mode */
        body.dark-mode .header, 
        body.dark-mode .navbar {
            background-color: #222;
            color: white;
        }

        body.dark-mode .nav-link {
            color: white !important;
        }

        body.dark-mode .btn-outline-secondary {
            color: white;
            border-color: white;
        }

        body.dark-mode .btn-outline-secondary:hover {
            background-color: white;
            color: black;
        }
    </style>

    @include('template.header')
</head>
<body>

<!-- Header -->
@include('template.navbar')
@include('template.shoppingCart')

    <header class="d-flex justify-content-between align-items-center py-3 mb-5">
        <h1>My Website</h1>
    </header>
    
    <section  id="home">
    <!-- Carousel -->
    <div id="carouselExample" class="carousel slide carousel-fade mb-2" data-bs-ride="carousel">
         <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="3000">
                <img src="images/depan.jpeg" class="d-block w-100" alt="First Slide"  style="filter: brightness(60%) contrast(110%);">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Antic Cafe</h5>
                    <h5>Ngopi Ga Ngopi Tetep Ngopi</h5>
                    <p>Jl. Pemuda No.86 Magelang Jawa Tengah</p>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="3000">
                <img src="images/untitled.jpeg" class="d-block w-100"  style="filter: brightness(60%) contrast(110%);" alt="Second Slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Antic Cafe</h5>
                    <h5>Melayani Dengan Rasa</h5>
                    <p>Jl. Pemuda No.86 Magelang Jawa Tengah</p>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="3000">
                <img src="images/untitled1.jpeg" class="d-block w-100"  style="filter: brightness(60%) contrast(110%);" alt="Third Slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Antic Cafe</h5>
                    <h5>Ngopi Untuk Bangkitkan Inspirasi</h5>
                    <p>Jl. Pemuda No.86 Magelang Jawa Tengah</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    </section>

    <section id="about">

        <h1 class="heading"> <span>Tentang</span> Kami </h1>

        <div class="row">

            <div class="image col-md">
                <img class="w-100 rounded-3" src="images/siluet.png" alt="">
            </div>

            <div class="content col-md">
                <h3 style="font-size: 36px;" class="mb-3">Komitmen adalah <span>jalan kami</span> untuk memuaskan anda!</h3>
                <p style="font-size: 14px;" class="mb-3">
                    Antic Cafe berkomitmen untuk selalu memberikan rasa terbaik dengan bahan berkualitas, serta menciptakan suasana nyaman bagi setiap pelanggan. Kami percaya bahwa setiap cangkir kopi yang kami sajikan adalah bagian dari pengalaman berharga Anda, dan kami berusaha untuk menjadikan setiap kunjungan Anda sebagai momen yang tak terlupakan.
                </p>
                <p style="font-size: 16px;" class="mb-3">
                    Karena rasa tidak untuk diperdebatkan, tapi untuk dinikmati.
                </p>
            </div>

        </div>

    </section>
    <section class="gallery" id="gallery">

        <h1 class="heading">Produk <span>Kami</span></h1>

        <div class="gallery-container">
            
        @foreach ($produk as $item)
            <a href="{{ asset('storage/' . $item->gambar) }}" class="box">
                <img src="{{ asset('storage/' . $item->gambar) }}" alt="">
                <div class="icons"><i class="fas fa-plus"></i></div>
            </a>
        @endforeach
        </div>
        <div class="d-flex justify-content-center">
            <a class="btn btn-primary" href="/produkHome"> Lihat Selengkapnya </a>
        </div>

    </section>
    <section class="parallax" id="parallax">

        <h1 class="heading">Jangkauan Produk</h1>

        <div class="box-container">

            <div class="box">
                <div class="image">
                    <img class="rounded-circle" src="images/parallax-1.gif" style="width:200px; height:200px; object-fit:cover;" alt="">
                </div>
                <div class="content">
                    <h3>Sepeda Gunung</h3>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="images/parallax-2.gif" class="rounded-circle" style="width:200px; height:200px; object-fit:cover;" alt="">
                </div>
                <div class="content">
                    <h3>Sepeda Lipat</h3>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="images/parallax-3.gif" class="rounded-circle" style="width:200px; height:200px; object-fit:cover;" alt="">
                </div>
                <div class="content">
                    <h3>Sepeda Listrik</h3>
                </div>
            </div>

        </div>

    </section>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>


@include('template.script')
@include('template.foot')

</body>
</html>
