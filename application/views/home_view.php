<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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

        <?php if (empty($proyek)): ?>
            <p>Proyek tidak ada.</p>
        <?php else: ?>
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
                        <th>Action</th>
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
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="<?= $p->id ?>" data-url="<?= site_url('proyek/delete/' . $p->id) ?>">Delete</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>

        <div class="mt-4">
            <a href="<?= site_url('add_proyek') ?>" class="btn btn-primary me-2">Tambah Proyek</a>
        </div>
    </div>

    <div class="container">
        <h2 class="mt-5 mb-3">Lokasi</h2>

        <?php if (empty($lokasi)): ?>
            <p>Lokasi tidak ada.</p>
        <?php else: ?>
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nama Lokasi</th>
                        <th>Negara</th>
                        <th>Provinsi</th>
                        <th>Kota</th>
                        <th>Action</th>
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
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="<?= $l->id ?>" data-url="<?= site_url('lokasi/delete/' . $l->id) ?>">Delete</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>

        <div class="mt-4">
            <a href="<?= site_url('add_lokasi') ?>" class="btn btn-primary me-2">Tambah Lokasi</a>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Penghapusan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus item ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <a id="confirmDeleteButton" href="#" class="btn btn-danger">Hapus</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var deleteModal = document.getElementById('deleteModal');
        deleteModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var url = button.getAttribute('data-url');
            var confirmButton = deleteModal.querySelector('#confirmDeleteButton');
            confirmButton.setAttribute('href', url);
        });
    </script>
</body>
</html>
