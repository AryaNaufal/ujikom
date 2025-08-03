<h1 class="mt-0 mb-4 font-bold">Manage Sales</h1>

<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-content">
                <a href="<?= SERVER_NAME . "sales/add" ?>">
                    <button type="button" class="btn btn-primary mb-4">
                        <i class="fa fa-plus mr-2" aria-hidden="true"></i>Add Sales
                    </button>
                </a>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example">
                        <thead>
                            <tr>
                                <th>No Sales</th>
                                <th>No Customer</th>
                                <th>DO Customer</th>
                                <th>Status</th>
                                <th>Tanggal Penjualan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($sales as $sale): ?>
                                <tr>
                                    <td><?= htmlspecialchars($sale['id_sales']) ?></td>
                                    <td><?= htmlspecialchars($sale['id_customer']) ?></td>
                                    <td><?= htmlspecialchars($sale['do_customer']) ?></td>
                                    <td><?= htmlspecialchars($sale['status']) ?></td>
                                    <td><?= htmlspecialchars($sale['tgl_sales']) ?></td>
                                    <td class="center">
                                        <a href="<?= SERVER_NAME . "sales/edit/" . $sale['id_sales'] ?>" class="btn btn-info">
                                            Edit
                                        </a>
                                        <button class="btn btn-danger btn-delete-sales" data-id="<?= htmlspecialchars($sale['id_sales']) ?>">Delete</button>
                                        <a href="<?= SERVER_NAME . "sales/print/" . $sale['id_sales'] ?>" target="_blank" class="btn btn-secondary">
                                            Cetak PDF
                                        </a>
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
        $('.btn-delete-sales').click(function() {
            let salesId = $(this).data('id');
            Swal.fire({
                title: 'Hapus Sales?',
                text: 'Data sales yang dihapus tidak dapat dikembalikan. Lanjutkan?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal',
                confirmButtonColor: '#007bff',
                cancelButtonColor: '#dc3545',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch('<?= SERVER_NAME ?>sales/delete', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                id: salesId
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