<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Admin Dashboard</div>
                    <div class="card-body">
                        <h1>Selamat datang, {{ Auth::guard('admin')->user()->name }}!</h1>
                       <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                                             @csrf
                          <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
