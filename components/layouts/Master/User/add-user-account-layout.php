<h1 class="mt-0 mb-4 font-bold">Add User</h1>

<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-content">
                <button type="button" class="btn btn-danger mb-4" data-toggle="modal" data-target="#myModal5" onclick="window.history.back()">
                    <i class="fa fa-arrow-left mr-2" aria-hidden="true"></i>Back
                </button>

                <form method="POST" action="" id="form_add_user">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label font-bold" for="namaUser">Nama User</label>
                                <input type="text" name="namaUser" id="namaUser" placeholder="Nama User" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label font-bold" for="username">Username</label>
                                <input type="text" name="username" id="username" placeholder="Username" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label font-bold" for="level">Level</label>
                                <select name="level" id="level" class="form-control" required>
                                    <option value="">Pilih Level</option>
                                    <option value="Petugas">Petugas</option>
                                    <option value="Sales">Sales</option>
                                    <option value="customer">Customer</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div style="text-align: right;">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#form_add_customer').submit(function(e) {
            e.preventDefault();
            var form = $(this);
            var formData = new FormData(form[0]);
            fetch('<?= SERVER_NAME ?>handler/customers/add.php', {
                    method: 'POST',
                    body: formData
                })
                .then(res => res.json())
                .then(data => {
                    if (data.status == 'success') {
                        Swal.fire({
                            title: 'Berhasil',
                            text: data.message,
                            icon: 'success',
                            confirmButtonText: 'Ok',
                            confirmButtonColor: '#007bff'
                        }).then(() => {
                            window.location.href = '<?= SERVER_NAME ?>customer.php';
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
                    console.error('Error:', error);
                    Swal.fire({
                        title: 'Gagal',
                        text: 'Terjadi kesalahan saat menghubungi server.',
                        icon: 'error',
                        confirmButtonText: 'Ok',
                        confirmButtonColor: '#dc3545'
                    });
                });
        });
    });
</script>