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
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="{{ asset('landing-page/css/mdb.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('landing-page/css/style.css') }}" />
    <!-- google font -->
    <link rel="stylesheet" href="{{ asset('landing-page/') }}/style.css" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="csrf-token-reg" content="{{ csrf_token() }}">
    <!-- Include Toastify CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
</head>

<body style="background-color: #022377">
    <!-- Start your project here-->

    <div class="container mt-5 mb-5 py-5">
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-md-start mt-3 mb-3">
                    <div class="col-md">
                        <img class="mb-3" src="{{ asset('landing-page/img/logo-smp.png') }}" width="80px" alt="" />
                        <h1 class="fw-bold fs-3">SPMB SMP Plus Al-Qodiri Jember</h1>
                        <p>silakan buat akun PPDB atau login</p>

                        <p>jika ada permasalahan login bisa menghubungi...</p>
                    </div>
                    <div class="col-md">
                        <!-- Pills navs -->
                        <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="tab-login" data-mdb-pill-init href="#pills-login"
                                    role="tab" aria-controls="pills-login" aria-selected="true">Login</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="tab-register" data-mdb-pill-init href="#pills-register"
                                    role="tab" aria-controls="pills-register" aria-selected="false">Daftar</a>
                            </li>
                        </ul>
                        <!-- Pills navs -->

                        <!-- Pills content -->
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="pills-login" role="tabpanel"
                                aria-labelledby="tab-login">
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
                                        <input type="password" name="password" id="loginPassword"
                                            class="form-control" />
                                        <label class="form-label" for="loginPassword">Password</label>
                                    </div>

                                    <!-- Submit button -->
                                    <button type="submit" style="background-color: #022377"
                                        class="btn text-light btn-block mb-4">Sign in</button>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="pills-register" role="tabpanel"
                                aria-labelledby="tab-register">
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
                                        <input type="password" name="password" id="registerPassword"
                                            class="form-control" />
                                        <label class="form-label" for="registerPassword">Password</label>
                                    </div>

                                    <!-- Repeat Password input -->
                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input type="password" name="repeat_password" id="registerRepeatPassword"
                                            class="form-control" />
                                        <label class="form-label" for="registerRepeatPassword">Ulangi password</label>
                                    </div>
                                    <!-- Submit button -->
                                    <button data-mdb-ripple-init type="submit" style="background-color: #022377"
                                        class="btn btn-block text-light mb-3">Daftar</button>
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
        document.getElementById('loginForm').addEventListener('submit', function (event) {
            event.preventDefault(); // Prevent form submission

            // Get form values
            var email = document.getElementById('loginName').value.trim();
            var password = document.getElementById('loginPassword').value.trim();

            // Validate form fields
            if (email === '' || password === '') {
                Toastify({
                    text: "Email dan password harus diisi.",
                    duration: 3000,
                    gravity: "top",
                    position: "center",
                    style: {
                        background: "linear-gradient(to right, #ff6b6b, #ffe66d)",
                    },
                    className: "error",
                    stopOnFocus: true,
                }).showToast();
                return;
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
                        throw new Error('Login gagal, silakan coba lagi.');
                    }
                    return response.json(); // Mengambil data JSON dari respons
                })
                .then(data => {
                    // Tangani data yang diterima dari server
                    if (data.success) {
                        Toastify({
                            text: "Login berhasil!",
                            duration: 3000,
                            gravity: "top",
                            position: "center",
                            style: {
                                background: "linear-gradient(to right, #28a745, #85e3b0)",
                            },
                            className: "success",
                            stopOnFocus: true,
                        }).showToast();
                        // Redirect atau lakukan tindakan lain setelah login berhasil
                        window.location.href = data.redirect_url; // Contoh redirect ke halaman yang sesuai
                    } else {
                        Toastify({
                            text: "Login gagal, silakan coba lagi.",
                            duration: 3000,
                            gravity: "top",
                            position: "center",
                            style: {
                                background: "linear-gradient(to right, #ff6b6b, #ffe66d)",
                            },
                            className: "error",
                            stopOnFocus: true,
                        }).showToast();
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
    <script>
        document.getElementById('registerForm').addEventListener('submit', function (event) {
            event.preventDefault(); // Prevent form submission

            // Get form values
            var namaSiswa = document.getElementById('registerName').value.trim();
            var email = document.getElementById('registerEmail').value.trim();
            var password = document.getElementById('registerPassword').value.trim();
            var confirmPassword = document.getElementById('registerRepeatPassword').value.trim();

            // Validate form fields
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
            } else if (confirmPassword === '') {
                isValid = false;
                errorMessage = 'Konfirmasi password harus diisi.';
            } else if (password !== confirmPassword) {
                isValid = false;
                errorMessage = 'Password dan konfirmasi password tidak cocok.';
            }

            if (!isValid) {
                // Display error message using Toastify
                Toastify({
                    text: errorMessage,
                    duration: 3000,
                    gravity: "top",
                    position: "right",
                    style: {
                        background: "linear-gradient(to right, #ff6b6b, #ffe66d)",
                    },
                    className: "error",
                    stopOnFocus: true,
                }).showToast();
            } else {
                // Check if email is unique
                checkEmailUniqueness(email, function (isUnique) {
                    if (isUnique) {
                        // If form is valid and email is unique, submit the form
                        fetch('/register_process', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token-reg"]').getAttribute('content'),

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
                                        style: {
                                            background: "linear-gradient(to right, #00b894, #55efc4)",
                                        },
                                        className: "success",
                                        stopOnFocus: true,
                                    }).showToast();
                                    // Redirect to login page or another page
                                    setTimeout(function () {
                                        window.location.href = '/auth';
                                    }, 3000);
                                } else {
                                    Toastify({
                                        text: data.message,
                                        duration: 3000,
                                        gravity: "top",
                                        position: "right",
                                        style: {
                                            background: "linear-gradient(to right, #ff6b6b, #ffe66d)",
                                        },
                                        className: "error",
                                        stopOnFocus: true,
                                    }).showToast();
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                Toastify({
                                    text: 'Terjadi kesalahan saat mendaftar.',
                                    duration: 3000,
                                    gravity: "top",
                                    position: "right",
                                    style: {
                                        background: "linear-gradient(to right, #ff6b6b, #ffe66d)",
                                    },
                                    className: "error",
                                    stopOnFocus: true,
                                }).showToast();
                            });
                    } else {
                        Toastify({
                            text: 'Email sudah terdaftar.',
                            duration: 3000,
                            gravity: "top",
                            position: "right",
                            style: {
                                background: "linear-gradient(to right, #ff6b6b, #ffe66d)",
                            },
                            className: "error",
                            stopOnFocus: true,
                        }).showToast();
                    }
                });
            }
        });

        // Function to validate email format
        function validateEmail(email) {
            var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }

        // Function to check email uniqueness
        function checkEmailUniqueness(email, callback) {
            fetch('/check-email', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ email: email })
            })
                .then(response => response.json())
                .then(data => {
                    callback(!data.exists); // Invert the result since we want true if email is unique
                })
                .catch(error => {
                    console.error('Error:', error);
                    callback(false);
                });
        }

    </script>
    {{-- end toastr register --}}

</body>

</html>