<h1 class="mt-0 mb-4 font-bold">Manage Item</h1>

<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-content">
                <a href="<?= SERVER_NAME . "item/add" ?>">
                    <button type="button" class="btn btn-primary mb-4">
                        <i class="fa fa-plus mr-2" aria-hidden="true"></i>Add Item
                    </button>
                </a>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example">
                        <thead>
                            <tr>
                                <th>Nama Item</th>
                                <th>UOM</th>
                                <th>Harga Beli</th>
                                <th>Harga Jual</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($items as $item): ?>
                                <tr>
                                    <td><?= htmlspecialchars($item['nama_item']) ?></td>
                                    <td><?= htmlspecialchars($item['uom']) ?></td>
                                    <td><?= htmlspecialchars($item['harga_beli']) ?></td>
                                    <td><?= htmlspecialchars($item['harga_jual']) ?></td>
                                    <td class="center">
                                        <a href="<?= SERVER_NAME . "item/edit/" . $item['id_item'] ?>" class="btn btn-info">
                                            Edit
                                        </a>
                                        <button class="btn btn-danger btn-delete-item" data-id="<?= htmlspecialchars($item['id_item']) ?>">Delete</button>
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
        $('.btn-delete-item').click(function() {
            let itemId = $(this).data('id');
            Swal.fire({
                title: 'Hapus Item?',
                text: 'Data item yang dihapus tidak dapat dikembalikan. Lanjutkan?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal',
                confirmButtonColor: '#007bff',
                cancelButtonColor: '#dc3545',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch('<?= SERVER_NAME ?>item/delete', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                id: itemId
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