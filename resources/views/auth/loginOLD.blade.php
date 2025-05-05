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

    <meta name="csrf-token" content="{{ csrf_token() }}">
     <!-- Include Toastify CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
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
                  <form action="{{ route('login') }}" id='loginForm' method="POST">
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
                     <form id="registerForm" action="{{ route('register_process') }}" method="POST">
            @csrf
                    <!-- Name input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                      <input type="text" name="nama_siswa" id="registerName" class="form-control" />
                      <label class="form-label" for="registerName">Nama Siswa</label>
                    </div>


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
                      <input type="password" name="repeat_password" id="registerConfirmPassword" class="form-control" />
                      <label class="form-label" for="registerRepeatPassword">Ulangi password</label>
                    </div>
                    <!-- Submit button -->
                    <button data-mdb-ripple-init type="submit" style="background-color: #022377" class="btn btn-block text-light mb-3">Daftar</button>
                  </form>
                </div>
              </div>
              <!-- Pills content -->
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- End your project here-->

    <!-- MDB -->
    <script type="text/javascript" src="{{ asset('landing-page/js/mdb.umd.min.js') }}"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>




{{-- toastr login siswa --}}

<!-- Include Toastify JS -->
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <!-- Include jQuery (optional, for easier form handling) -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
   document.getElementById('loginForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent form submission

        // Get form values
        var email = document.getElementById('loginName').value.trim();
        var password = document.getElementById('loginPassword').value.trim();

        // Validate form fields
        if (email === '' || password === '') {

              toastr.error('Email dan Password harus diisi.', 'Kesalahan', {
            positionClass: 'toast-top-right', // Posisi di kanan atas
            progressBar: true,
            timeOut: 5000,
            closeButton: true,
            preventDuplicates: true,
            backgroundColor: '#ff6b6b', // Kustomisasi warna latar belakang
        });
        return;
          // Toastify({
          //   text: "Email dan password harus diisi.",
          //   duration: 3000,
          //   gravity: "top",
          //   position: "center",
          //   style: {
          //     background: "linear-gradient(to right, #ff6b6b, #ffe66d)",
          //   },
          //   className: "error",
          //   stopOnFocus: true,
          // }).showToast();
          // return;
        }

        // Kirim permintaan ke server
        fetch('/login', { // Ganti '/login' dengan endpoint server Anda
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-Token': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Jika menggunakan CSRF
          },
          body: JSON.stringify({
            email: email,
            password: password
          })
        })
        .then(response => {
          if (!response.ok) {

            
                toastr.error('Login Gagal Cek Kembali E-mail dan Password Anda!.', 'Kesalahan', {
            positionClass: 'toast-top-right', // Posisi di kanan atas
            progressBar: true,
            timeOut: 5000,
            closeButton: true,
            preventDuplicates: true,
            backgroundColor: '#ff6b6b',}) // Kustomisasi warna latar belakang
            // throw new Error('Login gagal, silakan coba lagi.');
          }
          return response.json(); // Mengambil data JSON dari respons
        })
        .then(data => {
          // Tangani data yang diterima dari server
          if (data.success) {

            
              toastr.success('Login berhasil!', 'Sukses', {
                positionClass: 'toast-top-right',
                progressBar: true,
                timeOut: 5000,
                closeButton: true,
                preventDuplicates: true,
                backgroundColor: '#28a745', // Kustomisasi warna latar belakang untuk sukses
            });
            // Redirect atau lakukan tindakan lain setelah login berhasil
            window.location.href = data.redirect_url; // Contoh redirect ke halaman yang sesuai
          } else {

                toastr.error('Login Gagal Cek Kembali E-mail dan Password Anda!.', 'Kesalahan', {
            positionClass: 'toast-top-right', // Posisi di kanan atas
            progressBar: true,
            timeOut: 5000,
            closeButton: true,
            preventDuplicates: true,
            backgroundColor: '#ff6b6b', // Kustomisasi warna latar belakang
        });
        return;
            // Toastify({
            //   text: "Login gagal, silakan coba lagi.",
            //   duration: 3000,
            //   gravity: "top",
            //   position: "center",
            //   style: {
            //     background: "linear-gradient(to right, #ff6b6b, #ffe66d)",
            //   },
            //   className: "error",
            //   stopOnFocus: true,
            // }).showToast();
          }
        })
        .catch(error => {
          // Tangani kesalahan jaringan atau kesalahan lainnya
          Toastify({
            text: error.message,
            duration: 3000,
            gravity: "top",
            position: "center",
            style: {
              background: "linear-gradient(to right, #ff6b6b, #ffe66d)",
            },
            className: "error",
            stopOnFocus: true,
          }).showToast();
        });
      });

    </script>

{{-- end toastr login --}}


{{-- start toastr register --}}
{{-- 
 <script>
        document.getElementById('registerForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Mencegah pengiriman form default

    // Ambil nilai dari form
    var namaSiswa = document.getElementById('registerName').value.trim();
    var email = document.getElementById('registerEmail').value.trim();
    var password = document.getElementById('registerPassword').value.trim();
    var confirmPassword = document.getElementById('registerConfirmPassword').value.trim();

    // Validasi form
    var isValid = true;
    var errorMessage = '';

    if (namaSiswa === '') {
        isValid = false;
        errorMessage = 'Nama siswa harus diisi.';
    } else if (email === '') {
        isValid = false;
        errorMessage = 'Email harus diisi.';
    } else if (!validateEmail(email)) {
        isValid = false;
        errorMessage = 'Email tidak valid.';
    } else if (password === '') {
        isValid = false;
        errorMessage = 'Password harus diisi.';
    } else if (password.length < 8) {
        isValid = false;
        errorMessage = 'Password harus minimal 8 karakter.';
    } else if (password !== confirmPassword) {
        isValid = false;
        errorMessage = 'Password dan konfirmasi password tidak cocok.';
    }

    if (!isValid) {
        // Tampilkan pesan kesalahan menggunakan Toastr
        Toastify({
            text: errorMessage,
            duration: 3000,
            gravity: "top",
            position: "right",
            backgroundColor: "linear-gradient(to right, #ff6b6b, #ffe66d)",
            className: "error",
            stopOnFocus: true,
        }).showToast();
    } else {
        // Jika validasi berhasil, kirim data ke server
        fetch('{{ route('register_process') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-Token': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Jika menggunakan CSRF
            },
            body: JSON.stringify({
                nama_siswa: namaSiswa,
                email: email,
                password: password,
                password_confirmation: confirmPassword
            })
        })
        .then(response => {
            if (!response.ok) {
                return response.json().then(data => {
                    // Tampilkan pesan kesalahan dari server
                    Toastify({
                        text: data.message || 'Terjadi kesalahan, silakan coba lagi.',
                        duration: 3000,
                        gravity: "top",
                        position: "right",
                        backgroundColor: "linear-gradient(to right, #ff6b6b, #ffe66d)",
                        className: "error",
                        stopOnFocus: true,
                    }).showToast();
                });
            }
            return response.json();
        })
        .then(data => {
            // Tampilkan pesan sukses jika pendaftaran berhasil
            Toastify({
                text: 'Pendaftaran berhasil!',
                duration: 3000,
                gravity: "top",
                position: "right",
                backgroundColor: "linear-gradient(to right, #28a745, #85e3b0)",
                className: "success",
                stopOnFocus: true,
            }).showToast();
            // Redirect atau lakukan tindakan lain setelah pendaftaran berhasil
        })
        .catch(error => {
            // Tangani kesalahan jaringan atau kesalahan lainnya
            Toastify({
                text: 'Terjadi kesalahan, silakan coba lagi.',
                duration: 3000,
                gravity: "top",
                position: "right",
                backgroundColor: "linear-gradient(to right, #ff6b6b, #ffe66d)",
                className: "error",
                stopOnFocus: true,
            }).showToast();


            console.log(error)
        });
    }
});

// Fungsi untuk memvalidasi format email
function validateEmail(email) {
    var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
} --}}



{{-- <script>
document.getElementById('registerForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Mencegah pengiriman form default

    // Ambil nilai dari form
    var namaSiswa = document.getElementById('registerName').value.trim();
    var email = document.getElementById('registerEmail').value.trim();
    var password = document.getElementById('registerPassword').value.trim();
    var confirmPassword = document.getElementById('registerConfirmPassword').value.trim();

    // Validasi di sisi klien
    if (namaSiswa === '' || email === '' || password === '' || confirmPassword === '') {
        Toastify({
            text: "Semua field harus diisi.",
            duration: 3000,
            gravity: "top",
            position: "right",
            backgroundColor: "linear-gradient(to right, #ff6b6b, #ffe66d)",
            className: "error",
            stopOnFocus: true,
        }).showToast();
        return;
    }

    if (password !== confirmPassword) {
        Toastify({
            text: "Password dan konfirmasi password tidak cocok.",
            duration: 3000,
            gravity: "top",
            position: "right",
            backgroundColor: "linear-gradient(to right, #ff6b6b, #ffe66d)",
            className: "error",
            stopOnFocus: true,
        }).showToast();
        return;
    }

    // Kirim data ke server

    // cek email unik


    fetch('{{ route('register_process') }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-Token': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Jika menggunakan CSRF
        },
        body: JSON.stringify({
            nama_siswa: namaSiswa,
            email: email,
            password: password,
            password_confirmation: confirmPassword
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            Toastify({
                text: data.message,
                duration: 3000,
                gravity: "top",
                position: "right",
                backgroundColor: "linear-gradient(to right, #28a745, #85e3b0)",
                className: "success",
                stopOnFocus: true,
            }).showToast();
            // Redirect atau lakukan tindakan lain setelah pendaftaran berhasil
        } else {
            Toastify({
                text: "Pendaftaran gagal, silakan coba lagi.",
                duration: 3000,
                gravity: "top",
                position: "right",
                backgroundColor: "linear-gradient(to right, #ff6b6b, #ffe66d)",
                className: "error",
                stopOnFocus: true,
            }).showToast();
        }
    })
    .catch(error => {
        Toastify({
            text: "Terjadi kesalahan: " + error.message,
            duration: 3000,
            gravity: "top",
            position: "right",
            backgroundColor: "linear-gradient(to right, #ff6b6b, #ffe66d)",
            className: "error",
            stopOnFocus: true,
        }).showToast();
    });
});


    </script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

<script>

document.getElementById('registerForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Mencegah pengiriman form default

    // Ambil nilai dari form
    var namaSiswa = document.getElementById('registerName').value.trim();
    var email = document.getElementById('registerEmail').value.trim();
    var password = document.getElementById('registerPassword').value.trim();
    var confirmPassword = document.getElementById('registerConfirmPassword').value.trim();

    // Validasi form
    if (namaSiswa === '' || email === '' || password === '' || confirmPassword === '') {
        toastr.error('Semua field harus diisi!', 'Kesalahan', {
            positionClass: 'toast-top-right',
            progressBar: true,
            timeOut: 5000,
            closeButton: true,
            preventDuplicates: true,
            backgroundColor: '#dc3545', // Kustomisasi warna latar belakang untuk kesalahan
        });
        return;
    }

    if (password !== confirmPassword) {
        toastr.error('Password dan konfirmasi password tidak cocok!', 'Kesalahan', {
            positionClass: 'toast-top-right',
            progressBar: true,
            timeOut: 5000,
            closeButton: true,
            preventDuplicates: true,
            backgroundColor: '#dc3545',
        });
        return;
    }

    // Kirim data ke server
    fetch('/register_process', { // Ganti '/register' dengan endpoint yang sesuai
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-Token': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            nama_siswa: namaSiswa,
            email: email,
            password: password,
            confirm_password: confirmPassword
        })
    })
    .then(response => {
        if (response.ok) {
            return response.json(); // Mengambil data JSON dari respons
        } else {
            throw new Error('Pendaftaran gagal, silakan coba lagi.');
        }
    })
    .then(data => {
        if (data.success) {
            toastr.success('Pendaftaran berhasil!', 'Sukses', {
                positionClass: 'toast-top-right',
                progressBar: true,
                timeOut: 5000,
                closeButton: true,
                preventDuplicates: true,
                backgroundColor: '#28a745', // Kustomisasi warna latar belakang untuk sukses
            });

            // Kosongkan form setelah pendaftaran berhasil
            document.getElementById('registerForm').reset();
        } else {
            toastr.error(data.message || 'Pendaftaran gagal, silakan coba lagi.', 'Kesalahan', {
                positionClass: 'toast-top-right',
                progressBar: true,
                timeOut: 5000,
                closeButton: true,
                preventDuplicates: true,
                backgroundColor: '#dc3545',
            });
        }
    })
    .catch(error => {
        toastr.error(error.message, 'Kesalahan', {
            positionClass: 'toast-top-right',
            progressBar: true,
            timeOut: 5000,
            closeButton: true,
            preventDuplicates: true,
            backgroundColor: '#dc3545',
            
        });
        console.log(error)
    });
});


</script>




{{-- end toastr register --}}

  </body>
</html>
