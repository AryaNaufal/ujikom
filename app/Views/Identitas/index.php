<h1 class="mt-0 mb-4 font-bold">Manage Item</h1>

<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-content">
                <a href="<?= SERVER_NAME . "identitas/add" ?>">
                    <button type="button" class="btn btn-primary mb-4">
                        <i class="fa fa-plus mr-2" aria-hidden="true"></i>Add Item
                    </button>
                </a>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example">
                        <thead>
                            <tr>
                                <th>Nama Identitas</th>
                                <th>Badan Hukum</th>
                                <th>NPWP</th>
                                <th>Email</th>
                                <th>URL</th>
                                <th>Alamat</th>
                                <th>Telp</th>
                                <th>Fax</th>
                                <th>Rekening</th>
                                <th>Foto</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($identitas as $identita): ?>
                                <tr>
                                    <td><?= htmlspecialchars($identita['nama_identitas']) ?></td>
                                    <td><?= htmlspecialchars($identita['badan_hukum']) ?></td>
                                    <td><?= htmlspecialchars($identita['npwp']) ?></td>
                                    <td><?= htmlspecialchars($identita['email']) ?></td>
                                    <td><?= htmlspecialchars($identita['url']) ?></td>
                                    <td><?= htmlspecialchars($identita['alamat']) ?></td>
                                    <td><?= htmlspecialchars($identita['telp']) ?></td>
                                    <td><?= htmlspecialchars($identita['fax']) ?></td>
                                    <td><?= htmlspecialchars($identita['rekening']) ?></td>
                                    <td>
                                        <img src="<?= SERVER_NAME . "image/identitas/" . rawurlencode($identita['foto']) ?>" alt="Foto Identitas" width="100">
                                    </td>
                                    <td class="center">
                                        <a href="<?= SERVER_NAME . "identitas/edit/" . $identita['id_identitas'] ?>" class="btn btn-info">
                                            Edit
                                        </a>
                                        <button class="btn btn-danger btn-delete-identitas" data-id="<?= htmlspecialchars($identita['id_identitas']) ?>">Delete</button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.btn-delete-identitas').click(function() {
            let identitasId = $(this).data('id');
            Swal.fire({
                title: 'Hapus Identitas?',
                text: 'Data identitas yang dihapus tidak dapat dikembalikan. Lanjutkan?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal',
                confirmButtonColor: '#007bff',
                cancelButtonColor: '#dc3545',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch('<?= SERVER_NAME ?>identitas/delete', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                id: identitasId
                            })
                        })
                        .then(res => res.json())
                        .then(data => {
                            if (data.status === 'success') {
                                Swal.fire({
                                    title: 'Berhasil',
                                    text: data.message,
                                    icon: 'success',
                                    confirmButtonText: 'Ok',
                                    confirmButtonColor: '#007bff'
                                }).then(() => {
                                    window.location.reload();
                                });
                            } else {
                                Swal.fire({
                                    title: 'Gagal',
                                    text: data.message,
                                    icon: 'error',
                                    confirmButtonText: 'Ok',
                                    confirmButtonColor: '#007bff'
                                });
                            }
                        })
                        .catch((error) => {
                            Swal.fire({
                                title: 'Gagal',
                                text: 'Terjadi kesalahan saat menghubungi server.' + error,
                                icon: 'error',
                                confirmButtonText: 'Ok',
                                confirmButtonColor: '#dc3545'
                            });
                        });
                }
            });
        });
    });
</script>