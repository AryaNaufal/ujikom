<h1 class="mt-0 mb-4 font-bold">Manage Customer</h1>

<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-content">
                <a href="<?= SERVER_NAME . "customer/add" ?>">
                    <button type="button" class="btn btn-primary mb-4">
                        <i class="fa fa-plus mr-2" aria-hidden="true"></i>Add Customer
                    </button>
                </a>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Customer</th>
                                <th>Nama Customer</th>
                                <th>Alamat</th>
                                <th>Telp</th>
                                <th>Fax</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($customers as $customer): ?>
                                <tr>
                                    <td><?= htmlspecialchars($no++) ?></td>
                                    <td><?= htmlspecialchars($customer['id_customer']) ?></td>
                                    <td><?= htmlspecialchars($customer['nama_customer']) ?></td>
                                    <td><?= htmlspecialchars($customer['alamat']) ?></td>
                                    <td><?= htmlspecialchars($customer['telp']) ?></td>
                                    <td><?= htmlspecialchars($customer['fax']) ?></td>
                                    <td><?= htmlspecialchars($customer['email']) ?></td>
                                    <td class="center">
                                        <a href="<?= SERVER_NAME . "customer/edit/" . $customer['id_customer'] ?>" class="btn btn-info">
                                            Edit
                                        </a>
                                        <button class="btn btn-danger btn-delete-customer" data-id="<?= htmlspecialchars($customer['id_customer']) ?>">Delete</button>
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
        $('.btn-delete-customer').click(function() {
            let customerId = $(this).data('id');
            Swal.fire({
                title: 'Hapus Customer?',
                text: 'Data customer yang dihapus tidak dapat dikembalikan. Lanjutkan?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal',
                confirmButtonColor: '#007bff',
                cancelButtonColor: '#dc3545',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch('<?= SERVER_NAME ?>customer/delete', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
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