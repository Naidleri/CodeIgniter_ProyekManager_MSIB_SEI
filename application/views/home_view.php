<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5">
        <h1 class="mb-4">Proyek Manager</h1>

        <?php if (!empty($error)): ?>
            <div class="alert alert-danger" role="alert">
                <?= $error ?>
            </div>
        <?php endif; ?>

        <h2 class="mb-3">Proyek</h2>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama Proyek</th>
                    <th>Client</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                    <th>Pimpinan Proyek</th>
                    <th>Keterangan</th>
                    <th>Lokasi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($proyek as $p): ?>
                    <tr>
                        <td><?= $p->id ?></td>
                        <td><?= $p->namaProyek ?></td>
                        <td><?= $p->client ?></td>
                        <td><?= date_format(date_create($p->tglMulai), 'd F Y, H:i') ?></td>
                        <td><?= date_format(date_create($p->tglSelesai), 'd F Y, H:i') ?></td>
                        <td><?= $p->pimpinanProyek ?></td>
                        <td><?= $p->keterangan ?></td>
                        <td>
                            <?php if (!empty($p->lokasiList)): ?>
                                <ul class="list-unstyled mb-0">
                                    <?php foreach ($p->lokasiList as $l): ?>
                                        <li><?= $l->namaLokasi ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="<?= site_url('proyek/edit/' . $p->id) ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="<?= site_url('proyek/delete/' . $p->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus proyek ini?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="mt-4">
            <a href="<?= site_url('add_proyek') ?>" class="btn btn-primary me-2">Tambah Proyek</a>
        </div>
    </div>

    <div class="container">
        <h2 class="mt-5 mb-3">Lokasi</h2>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama Lokasi</th>
                    <th>Negara</th>
                    <th>Provinsi</th>
                    <th>Kota</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lokasi as $l): ?>
                    <tr>
                        <td><?= $l->id ?></td>
                        <td><?= $l->namaLokasi ?></td>
                        <td><?= $l->negara ?></td>
                        <td><?= $l->provinsi ?></td>
                        <td><?= $l->kota ?></td>
                        <td>
                            <a href="<?= site_url('lokasi/edit/' . $l->id) ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="<?= site_url('lokasi/delete/' . $l->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus lokasi ini?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="mt-4">
            <a href="<?= site_url('add_lokasi') ?>" class="btn btn-primary me-2">Tambah Lokasi</a>
        </div>
    </div>
</body>
</html>
