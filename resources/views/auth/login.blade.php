<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>PPDB SMP Plus Al-Qodiri Jember</title>
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
  <body style="background-color: #022377">
    <!-- Start your project here-->

    <div class="container mt-5 mb-5 py-5">
      <div class="card">
        <div class="card-body">
          <div class="row justify-content-md-start mt-3 mb-3">
            <div class="col-md">
              <img class="mb-3" src="{{ asset('landing-page/img/logo-smp.png') }}" width="80px" alt="" />
              <h1 class="fw-bold fs-3">PPDB SMP Plus Al-Qodiri Jember</h1>
              <p>silakan buat akun PPDB atau login</p>

              <p>jika ada permasalahan login bisa menghubungi...</p>
            </div>
            <div class="col-md">
              <!-- Pills navs -->
              <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                <li class="nav-item" role="presentation">
                  <a class="nav-link active" id="tab-login" data-mdb-pill-init href="#pills-login" role="tab" aria-controls="pills-login" aria-selected="true">Login</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" id="tab-register" data-mdb-pill-init href="#pills-register" role="tab" aria-controls="pills-register" aria-selected="false">Daftar</a>
                </li>
              </ul>
              <!-- Pills navs -->

              <!-- Pills content -->
              <div class="tab-content">
                <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                     @if(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                  <form action="{{ route('login') }}" method="POST">
                            @csrf
                    <!-- Email input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                      <input type="email" id="loginName" name="email" class="form-control" />
                      <label class="form-label" for="loginName">Email</label>
                    </div>

                    <!-- Password input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                      <input type="password" name="password" id="loginPassword" class="form-control" />
                      <label class="form-label" for="loginPassword">Password</label>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" style="background-color: #022377" class="btn text-light btn-block mb-4">Sign in</button>
                  </form>
                </div>
                <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
                     <form action="{{ route('register.student.process') }}" method="POST">
            @csrf



                    <!-- Name input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                      <input type="text" name="nama_siswa" id="registerName" class="form-control" />
                      <label class="form-label" for="registerName">Name</label>
                    </div>

                    {{-- <!-- Username input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                      <input type="text" id="registerUsername" class="form-control" />
                      <label class="form-label" for="registerUsername">Username</label>
                    </div> --}}

                    <!-- Email input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                      <input type="email" name="email" id="registerEmail" class="form-control" />
                      <label class="form-label" for="registerEmail">Email</label>
                    </div>

                    <!-- Password input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                      <input type="password" name="password" id="registerPassword" class="form-control" />
                      <label class="form-label" for="registerPassword">Password</label>
                    </div>

                    <!-- Repeat Password input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                      <input type="password" name="repeat_password" id="registerRepeatPassword" class="form-control" />
                      <label class="form-label" for="registerRepeatPassword">Repeat password</label>
                    </div>

                    <!-- Checkbox -->
                    <!-- <div class="form-check d-flex justify-content-center mb-4">
                      <input class="form-check-input me-2" type="checkbox" value="" id="registerCheck" checked aria-describedby="registerCheckHelpText" />
                      <label class="form-check-label" for="registerCheck"> I have read and agree to the terms </label>
                    </div> -->

                    <!-- Submit button -->
                    <button data-mdb-ripple-init type="submit" style="background-color: #022377" class="btn btn-block text-light mb-3">Daftar</button>
                  </form>
                </div>
              </div>
              <!-- Pills content -->
            </div>
          </div>

          <!-- <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <button type="button" class="btn btn-primary" data-mdb-ripple-init>Button</button> -->
        </div>
      </div>
    </div>

    <!-- End your project here-->

    <!-- MDB -->
    <script type="text/javascript" src="{{ asset('landing-page/js/mdb.umd.min.js') }}"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
  </body>
</html>
