<h1 class="mt-0 mb-4 font-bold">Manage Item</h1>

<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-content">
                <a href="<?= SERVER_NAME ?>Master/Item/add-item.php">
                    <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#myModal5">
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
                            <?php foreach ($items['data'] as $item): ?>
                                <tr>
                                    <td><?= $item['nama_item'] ?></td>
                                    <td><?= $item['uom'] ?></td>
                                    <td><?= $item['harga_beli'] ?></td>
                                    <td><?= $item['harga_jual'] ?></td>
                                    <td class="center">
                                        <a href="<?= SERVER_NAME . "Master/Item/edit-item.php?id_item=" . $item['id_item'] ?>" class="btn btn-info btn-edit-catalog">
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
            let customerId = $(this).data('id');
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
                    fetch('<?= SERVER_NAME ?>handler/item/delete.php', {
                            method: 'POST',
                            body: new URLSearchParams({
                                id: customerId
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