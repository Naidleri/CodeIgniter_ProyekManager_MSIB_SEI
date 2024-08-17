<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Proyek</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">Tambah Proyek</h1>

            <form action="<?= site_url('proyek/save') ?>" method="post">
                <div class="mb-3">
                    <label for="namaProyek" class="form-label">Nama Proyek:</label>
                    <input type="text" name="namaProyek" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="client" class="form-label">Client:</label>
                    <input type="text" name="client" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="tglMulai" class="form-label">Tanggal Mulai:</label>
                    <input type="datetime-local" name="tglMulai" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="tglSelesai" class="form-label">Tanggal Selesai:</label>
                    <input type="datetime-local" name="tglSelesai" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="pimpinanProyek" class="form-label">Pimpinan Proyek:</label>
                    <input type="text" name="pimpinanProyek" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan:</label>
                    <textarea name="keterangan" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label for="lokasi" class="form-label">Lokasi:</label>
                    <select name="lokasi" class="form-select">
                        <?php foreach ($lokasi as $l): ?>
                            <option value="<?= $l->id ?>"><?= $l->namaLokasi ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="d-flex justify-content-between mt-3">
                    <a href="<?= site_url('/') ?>" class="btn btn-secondary">Kembali ke Beranda</a>
                    <button type="submit" class="btn btn-primary">Tambah Proyek</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
