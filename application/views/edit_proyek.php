<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Proyek</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h1>Edit Proyek</h1>
        <form action="<?= site_url('proyek/update/' . $proyek->id) ?>" method="post">
            <div class="mb-3">
                <label for="namaProyek" class="form-label">Nama Proyek:</label>
                <input type="text" class="form-control" name="namaProyek" value="<?= $proyek->namaProyek ?>" required>
            </div>
            <div class="mb-3">
                <label for="client" class="form-label">Client:</label>
                <input type="text" class="form-control" name="client" value="<?= $proyek->client ?>" required>
            </div>
            <div class="mb-3">
                <label for="tglMulai" class="form-label">Tanggal Mulai:</label>
                <input type="datetime-local" class="form-control" name="tglMulai" value="<?= date('Y-m-d\TH:i', strtotime($proyek->tglMulai)) ?>" required>
            </div>
            <div class="mb-3">
                <label for="tglSelesai" class="form-label">Tanggal Selesai:</label>
                <input type="datetime-local" class="form-control" name="tglSelesai" value="<?= date('Y-m-d\TH:i', strtotime($proyek->tglSelesai)) ?>" required>
            </div>
            <div class="mb-3">
                <label for="pimpinanProyek" class="form-label">Pimpinan Proyek:</label>
                <input type="text" class="form-control" name="pimpinanProyek" value="<?= $proyek->pimpinanProyek ?>">
            </div>
            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan:</label>
                <textarea class="form-control" name="keterangan"><?= $proyek->keterangan ?></textarea>
            </div>
            <div class="mb-3">
                <label for="lokasi" class="form-label">Lokasi:</label>
                <select class="form-control" name="lokasi" id="lokasi">
                    <?php foreach ($lokasi as $l): ?>
                        <option value="<?= $l->id ?>" <?= $l->id == $proyek->lokasiList[0]->id ? 'selected' : '' ?>>
                            <?= $l->namaLokasi ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class ="d-flex justify-content-between mt-3"> 
                <a href="<?= site_url('/') ?>" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Update Proyek</button>
            </div>
        </form>
    </div>
</body>
</html>
