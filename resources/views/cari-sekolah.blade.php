<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari Sekolah by NPSN</title>
    <!-- Sertakan Bootstrap CSS (opsional) -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Cari Sekolah Berdasarkan NPSN</h1>

        <!-- Form Pencarian -->
        <form action="{{ route('cari.sekolah') }}" method="GET" class="mb-4">
            <div class="form-group">
                <label for="npsn">Masukkan NPSN:</label>
                <input type="text" id="npsn" name="npsn" class="form-control" placeholder="Contoh: 20106342" required>
            </div>
            <button type="submit" class="btn btn-primary">Cari</button>
        </form>

        <!-- Menampilkan Data Sekolah -->
        @if(isset($sekolah))
            <h2>Data Sekolah:</h2>
            <div class="card mb-4">
                <div class="card-body">
                    <p><strong>Creator:</strong> {{ $creator }}</p>
                    <p><strong>Status:</strong> {{ $status }}</p>
                    <p><strong>Total Data:</strong> {{ $total_data }}</p>
                    <p><strong>Page:</strong> {{ $page }}</p>
                    <p><strong>Per Page:</strong> {{ $per_page }}</p>
                </div>
            </div>

            <form>
                <div class="form-group">
                    <label for="nama_sekolah">Nama Sekolah:</label>
                    <input type="text" id="nama_sekolah" class="form-control" value="{{ $sekolah['sekolah'] }}" readonly>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat:</label>
                    <input type="text" id="alamat" class="form-control" value="{{ $sekolah['alamat_jalan'] }}" readonly>
                </div>
                <div class="form-group">
                    <label for="jenjang">Jenjang:</label>
                    <input type="text" id="jenjang" class="form-control" value="{{ $sekolah['bentuk'] }}" readonly>
                </div>
                <div class="form-group">
                    <label for="status">Status:</label>
                    <input type="text" id="status" class="form-control" value="{{ $sekolah['status'] }}" readonly>
                </div>
                <div class="form-group">
                    <label for="kecamatan">Kecamatan:</label>
                    <input type="text" id="kecamatan" class="form-control" value="{{ $sekolah['kecamatan'] }}" readonly>
                </div>
                <div class="form-group">
                    <label for="kabupaten">Kabupaten/Kota:</label>
                    <input type="text" id="kabupaten" class="form-control" value="{{ $sekolah['kabupaten_kota'] }}" readonly>
                </div>
                <div class="form-group">
                    <label for="propinsi">Provinsi:</label>
                    <input type="text" id="propinsi" class="form-control" value="{{ $sekolah['propinsi'] }}" readonly>
                </div>
            </form>
        @endif

        <!-- Menampilkan Pesan Error -->
        @if(isset($error))
            <div class="alert alert-danger mt-4">
                {{ $error }}
            </div>
        @endif
    </div>
</body>
</html>
