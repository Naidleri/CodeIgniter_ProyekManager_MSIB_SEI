<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Lokasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">Tambah Lokasi</h1>

            <form action="<?= site_url('lokasi/save') ?>" method="post">
                <div class="mb-3">
                    <label for="namaLokasi" class="form-label">Nama Lokasi:</label>
                    <input type="text" name="namaLokasi" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="negara" class="form-label">Negara:</label>
                    <input type="text" name="negara" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="provinsi" class="form-label">Provinsi:</label>
                    <input type="text" name="provinsi" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="kota" class="form-label">Kota:</label>
                    <input type="text" name="kota" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Tambah Lokasi</button>
            </form>

            <a href="<?= site_url('/') ?>" class="btn btn-secondary mt-3">Kembali ke Beranda</a>
        </div>
    </div>
</body>
</html>
