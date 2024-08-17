<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Lokasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h1>Edit Lokasi</h1>

        <form action="<?= site_url('lokasi/update/' . $lokasi->id) ?>" method="post">
            <div class="mb-3">
                <label for="namaLokasi" class="form-label">Nama Lokasi:</label>
                <input type="text" class="form-control" name="namaLokasi" value="<?= $lokasi->namaLokasi ?>" required>
            </div>
            <div class="mb-3">
                <label for="negara" class="form-label">Negara:</label>
                <input type="text" class="form-control" name="negara" value="<?= $lokasi->negara ?>">
            </div>
            <div class="mb-3">
                <label for="provinsi" class="form-label">Provinsi:</label>
                <input type="text" class="form-control" name="provinsi" value="<?= $lokasi->provinsi ?>">
            </div>
            <div class="mb-3">
                <label for="kota" class="form-label">Kota:</label>
                <input type="text" class="form-control" name="kota" value="<?= $lokasi->kota ?>">
            </div>
            <div class="d-flex justify-content-between mt-3">
                <a href="<?= site_url('/') ?>" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Update Lokasi</button>
            </div>
        </form>
    </div>
</body>
</html>
