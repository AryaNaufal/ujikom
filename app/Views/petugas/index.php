<h1 class="mt-0 mb-4 font-bold">Manage Petugas</h1>

<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-content">
                <a href="<?= SERVER_NAME . "petugas/add" ?>">
                    <button type="button" class="btn btn-primary mb-4">
                        <i class="fa fa-plus mr-2" aria-hidden="true"></i>Add Petugas
                    </button>
                </a>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example">
                        <thead>
                            <tr>
                                <th>Nama User</th>
                                <th>Username</th>
                                <th>level</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($petugas as $petuga): ?>
                                <tr>
                                    <td><?= htmlspecialchars($petuga['nama_user']) ?></td>
                                    <td><?= htmlspecialchars($petuga['username']) ?></td>
                                    <td><?= htmlspecialchars($petuga['level']) ?></td>
                                    <td class="center">
                                        <a href="<?= SERVER_NAME . "petugas/edit/" . $petuga['id_user'] ?>" class="btn btn-info">
                                            Edit
                                        </a>
                                        <button class="btn btn-danger btn-delete-petugas" data-id="<?= htmlspecialchars($petuga['id_user']) ?>">Delete</button>
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
        $('.btn-delete-petugas').click(function() {
            let petugasId = $(this).data('id');
            Swal.fire({
                title: 'Hapus Petugas?',
                text: 'Data petugas yang dihapus tidak dapat dikembalikan. Lanjutkan?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal',
                confirmButtonColor: '#007bff',
                cancelButtonColor: '#dc3545',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch('<?= SERVER_NAME ?>petugas/delete', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                id: petugasId
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