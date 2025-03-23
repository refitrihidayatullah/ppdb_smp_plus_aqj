<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>@yield('title', 'SPMB SMP Plus Al-Qodiri Jember')</title>
    <!-- MDB icon -->
    <link rel="icon" href="{{ asset('landing-page/img/logo-smp.png') }}" type="image/x-icon" />
    <!-- Font Awesome -->
    {{-- csrf token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- csrf token --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="{{ asset('landing-page/') }}/css/mdb.min.css" />

    {{-- my style --}}
    <link rel="stylesheet" href="{{ asset('landing-page/') }}/style.css" />

    {{-- toastr --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Toastr CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    {{-- toastr --}}

</head>

<body style=" background-color: #022377">

    @yield('content');



    <!-- MDB -->
    <script type=" text/javascript" src="{{ asset('landing-page/') }}/js/mdb.umd.min.js">
    </script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
</body>

</html>
