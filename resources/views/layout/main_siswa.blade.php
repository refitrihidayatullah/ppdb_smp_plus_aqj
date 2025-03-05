<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>PPDB SMP Plus Al-Qodiri Jember</title>
    <link rel="icon" href="img/logo-smp.png" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
    <link rel="stylesheet" href="{{ asset('landing-page/') }}/css/mdb.min.css" />
    <link rel="stylesheet" href="{{ asset('landing-page/') }}/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
  </head>
  <body style="background-color: #022377">
    <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
      <div class="container">
        <a class="navbar-brand me-2" href="#">
          <img src="https://mdbcdn.b-cdn.net/img/logo/mdb-transaprent-noshadows.webp" height="16" alt="MDB Logo" loading="lazy" style="margin-top: -1px" />
        </a>
        <button data-mdb-collapse-init class="navbar-toggler" type="button" data-mdb-target="#navbarButtonsExample" aria-controls="navbarButtonsExample" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarButtonsExample">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link fw-bold" href="#">PPDB SMP Plus Al-Qodiri Jember</a>
            </li>
          </ul>
          <div class="d-flex align-items-center">
            <div class="px-3 me-2">{{ Auth::guard('siswa')->user()->nama_siswa }} | {{ Auth::guard('siswa')->user()->tahun_daftar }} </div>

             <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                                             @csrf
                          <button type="submit" class="btn btn-danger">Logout</button>
                          </form>
          </div>
        </div>
      </div>
    </nav>
@yield('content')
