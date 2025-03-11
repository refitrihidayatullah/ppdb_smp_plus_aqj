<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>SPMB SMP Plus Al-Qodiri Jember</title>
    <!-- MDB icon -->
    <link rel="icon" href="{{ asset('landing-page/img/logo-smp.png') }}" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="{{ asset('landing-page/css/mdb.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('landing-page/css/style.css') }}" />
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
</head>
<body>
    <!-- Start your project here-->

    <!-- Header -->
    <header>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg sticky-top navbar-light bg-light">
            <!-- Container -->
            <div class="container">
                <!-- Navbar brand -->
                <a class="navbar-brand" href="#beranda">
                    <img src="{{ asset('landing-page/img/logo-smp.png') }}" width="50px" alt="" />
                </a>

                <!-- Toggler -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Collapsible wrapper -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                        <li class="nav-item mx-3 fst-normal">
                            <a class="nav-link active" aria-current="page" href="#beranda">Beranda</a>
                        </li>
                        <li class="nav-item mx-3 fst-normal">
                            <a class="nav-link" href="#tentang-kami">Tentang Kami</a>
                        </li>
                        <li class="nav-item mx-3 fst-normal">
                            <a class="nav-link" href="#alur-pendaftaran">Alur Pendaftaran</a>
                        </li>
                        <li class="nav-item mx-3 fst-normal">
                            <a class="nav-link" href="#kontak-kami">Kontak Kami</a>
                        </li>
                    </ul>
                    <a style="background-color: #022377" class="btn fw-bold text-light" href="{{ route('auth') }}" role="button">Login</a>
                </div>
            </div>
            <!-- Container -->
        </nav>
        <script>
            // Memastikan elemen navbar dapat ditampilkan di mobile
            document.addEventListener("DOMContentLoaded", function () {
                var navbarToggler = document.querySelector(".navbar-toggler");
                var navbarCollapse = document.getElementById("navbarSupportedContent");

                navbarToggler.addEventListener("click", function () {
                    if (navbarCollapse.classList.contains("show")) {
                        navbarCollapse.classList.remove("show");
                    } else {
                        navbarCollapse.classList.add("show");
                    }
                });
            });
        </script>
        <!-- Navbar -->
    </header>
    <!-- End Header -->

    <!-- Main Content -->
    <main>
        <section id="beranda" class="py-5" style="margin-top: -100px; background-color: #022377">
            <div class="container col-xxl-8 px-4 py-5">
                <div class="row flex-lg-row-reverse align-items-center g-5 text-center text-lg-start">
                    <div class="col-10 col-sm-8 col-lg-6 mx-auto">
                        <img src="{{ asset('landing-page/img/header_smp.png') }}" class="d-block mx-auto img-fluid" alt="Bootstrap Themes" width="600" height="450" loading="lazy" />
                    </div>
                    <div class="col-lg-6 text-light mx-auto">
                        <p class="fs-4 fw-bold">SMP Plus Al-Qodiri Jember</p>
                        <h1 class="display-5 fw-bold lh-1 mb-3">Raih Masa Depanmu disini!</h1>
                        <p class="lead">Di SMP Plus Al-Qodiri Jember, kita mencetak peserta didik yang berakhlakul karimah, berjiwa Qur'ani, dan terampil dalam berteknologi untuk masa depan yang gemilang.</p>
                        <div class="d-grid gap-2 d-md-flex justify-content-center justify-content-md-start">
                            <button type="button" class="btn btn-lg btn-light btn-lg px-4 me-md-2" style="color: #022377">Daftar Sekarang</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="kenapa" class="py-5 mt-5">
            <h1 class="text-center fw-bold mb-5">Mengapa Harus <span class="fw-bold" style="color: #022377">SMP Plus Al-Qodiri Jember?</span></h1>
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-4">
                        <img src="{{ asset('landing-page/img/aqidah.png') }}" width="100" alt="Icon Aqidah" class="mb-2" />
                        <h4 class="fw-bold">Aqidah Yang Lurus dan Berakhlak Mulia</h4>
                        <p>Peserta didik di SMP Plus Al-Qodiri Jember dibimbing untuk memiliki aqidah yang lurus dan berakhlak mulia sebagai dasar kehidupan yang harmonis.</p>
                    </div>
                    <div class="col-md-4">
                        <img src="{{ asset('landing-page/img/qurani.png') }}" width="100" alt="Icon Generasi Qur'ani" class="mb-2" />
                        <h4 class="fw-bold">Generasi Qur'ani yang Mandiri dan Berjiwa Pemimpin</h4>
                        <p>Kami mendidik generasi yang mandiri, berjiwa pemimpin, cerdas visioner, dan berwawasan luas, siap menghadapi tantangan global.</p>
                    </div>
                    <div class="col-md-4">
                        <img src="{{ asset('landing-page/img/teknologi.png') }}" width="100" alt="Icon Teknologi" class="mb-2" />
                        <h4 class="fw-bold">Terampil dalam Teknologi</h4>
                        <p>Menghasilkan lulusan yang terampil dalam teknologi untuk bersaing secara global dan memenuhi tuntutan zaman.</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="tentang-kami" style="background-color: #022377" class="py-5 text-light">
            <h1 class="text-center fw-bold mb-5 mt-5">Tentang Kami</h1>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="fw-bold">Selayang Pandang SMP Plus Al-Qodiri Jember</h2>
                        <p>SMP Plus Al-Qodiri Jember didirikan pada tahun 2005 dengan visi untuk menghasilkan lulusan yang berakhlak mulia, berjiwa Qur'ani, dan terampil dalam teknologi.</p>
                    </div>
                    <div class="col-md-6">
                        <img src="https://media.istockphoto.com/id/638731986/vector/school-building.jpg?s=612x612&w=0&k=20&c=cETrD6Nheg4ivAfaV6UYoaWbGTaPushFu_ssur8CeZQ=" alt="Gambar SMP Plus Al-Qodiri Jember" class="img-fluid rounded" />
                    </div>
                </div>
            </div>
        </section>

        <section id="alur-pendaftaran" class="py-5">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-6">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRUMgaGfB-0yE45WmJQtVha_byZHC1dohZ-8w&s" width="500" height="300" alt="Alur Pendaftaran" class="img-fluid" />
                    </div>
                    <div class="col-md-6">
                        <h1 class="text-center fw-bold mb-5">Alur <span class="fw-bold" style="color: #022377">Pendaftaran</span></h1>
                        <ul class="timeline-with-icons">
                            <li class="timeline-item mb-5">
                                <span class="timeline-icon">
                                    <i class="fas fa-mouse-pointer fa-sm fa-fw"></i>
                                </span>
                                <h5 class="fw-bold">Klik Tombol "Daftar Disini!"</h5>
                                <p class="text-muted mb-2 fw-bold">Langkah Pertama</p>
                                <p class="text-muted">Mulai proses pendaftaran dengan mengklik tombol "Daftar Disini!" yang terletak di bagian atas halaman.</p>
                            </li>
                            <li class="timeline-item mb-5">
                                <span class="timeline-icon">
                                    <i class="fas fa-pencil-alt fa-sm fa-fw"></i>
                                </span>
                                <h5 class="fw-bold">Isi Formulir Pendaftaran</h5>
                                <p class="text-muted mb-2 fw-bold">Langkah Kedua</p>
                                <p class="text-muted">Lengkapi formulir pendaftaran dengan informasi yang benar dan akurat untuk memastikan proses pendaftaran berjalan lancar.</p>
                            </li>
                            <li class="timeline-item mb-5">
                                <span class="timeline-icon">
                                    <i class="fas fa-upload fa-sm fa-fw"></i>
                                </span>
                                <h5 class="fw-bold">Upload Dokumen yang Diperlukan</h5>
                                <p class="text-muted mb-2 fw-bold">Langkah Ketiga</p>
                                <p class="text-muted">Unggah semua dokumen yang diperlukan seperti foto copy transkrip nilai, rapor, ijazah, akta lahir, KK, KTP orang tua, dan lainnya.</p>
                            </li>
                            <li class="timeline-item mb-5">
                                <span class="timeline-icon">
                                    <i class="fas fa-check-circle fa-sm fa-fw"></i>
                                </span>
                                <h5 class="fw-bold">Konfirmasi Pendaftaran</h5>
                                <p class="text-muted mb-2 fw-bold">Langkah Keempat</p>
                                <p class="text-muted">Setelah mengklik tombol "Daftar", tunggu konfirmasi dari kami yang akan menginformasikan status pendaftaran Anda.</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section id="fasilitas">
            <p>ini adalah fasilitas</p>
        </section>

        <section id="kontak-kami" class="py-5">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="fw-bold mb-3">Contact Person Panitia PPDB <span style="color: #022377" class="fw-bold">SMP Plus Al-Qodiri Jember</span></h2>
                        <ul class="text-dark list-unstyled">
                            <li class="mb-3">
                                <a href="https://wa.me/6281234567890" class="text-dark"> <i class="fab fa-whatsapp"></i> +62 812-3456-7890 (Bapak Ahmad) </a>
                            </li>
                            <li class="mb-3">
                                <a href="https://wa.me/6280987654321" class="text-dark"> <i class="fab fa-whatsapp"></i> +62 809-8765-4321 (Ibu Siti) </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <p><i class="fas fa-map-marker-alt"></i> Jl. Sultan Agung No. 5, Kaliwates, Jember, Jawa Timur, 68136, Indonesia</p>
                        <p><i class="fas fa-phone"></i> +62 331 1234567</p>
                        <p><i class="fas fa-envelope"></i> info@smpalqodirijember.ac.id</p>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- End Main Content -->

    <!-- Footer -->
    <footer style="background-color: #022377" class="text-center text-white">
        <div class="container p-4">
            <section class="mb-4">
                <a class="btn btn-primary btn-floating m-1" style="background-color: #3b5998" href="#!" role="button"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-primary btn-floating m-1" style="background-color: #55acee" href="#!" role="button"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-primary btn-floating m-1" style="background-color: #dd4b39" href="#!" role="button"><i class="fab fa-google"></i></a>
                <a class="btn btn-primary btn-floating m-1" style="background-color: #ac2bac" href="#!" role="button"><i class="fab fa-instagram"></i></a>
                <a class="btn btn-primary btn-floating m-1" style="background-color: #0082ca" href="#!" role="button"><i class="fab fa-linkedin-in"></i></a>
                <a class="btn btn-primary btn-floating m-1" style="background-color: #333333" href="#!" role="button"><i class="fab fa-github"></i></a>
            </section>
        </div>
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
            © 2020 Copyright:
            <a class="text-white" href="https://mdbootstrap.com/">SMP Plus Al-Qodiri Jember Developed By <span class="text-light fw-bold">Arrohim Dwi Ksatria, S.Kom</span></a>
        </div>
    </footer>
    <!-- End Footer -->

    <!-- MDB -->
    <script type="text/javascript" src="{{ asset('landing-page/js/mdb.umd.min.js') }}"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
</body>
</html>
