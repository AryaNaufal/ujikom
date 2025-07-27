<h1 class="mt-0 mb-4 font-bold">Add Invoice</h1>
<!-- Sales No, DO No, Tgl Sales, Customer, Status, Action -->
<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-content">
                <button type="button" class="btn btn-danger mb-4" data-toggle="modal" data-target="#myModal5" onclick="window.history.back()">
                    <i class="fa fa-arrow-left mr-2" aria-hidden="true"></i>Back
                </button>

                <form method="POST" action="" id="form_add_invoice">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label font-bold" for="salesNo">Sales No</label>
                                <input type="text" name="salesNo" id="salesNo" placeholder="Sales No" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label font-bold" for="doNo">DO No</label>
                                <input type="text" name="doNo" id="doNo" placeholder="DO No" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label font-bold" for="tglSales">Tanggal Sales</label>
                                <input type="date" name="tglSales" id="tglSales" placeholder="Tanggal Sales" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label font-bold" for="customer">Customer</label>
                                <select name="customer" id="customer" class="form-control" required>
                                    <option value="">Pilih Customer</option>
                                    <?php
                                    foreach ($customers['data'] as $customer) {
                                    ?>
                                        <option value="<?= $customer['id_customer'] ?>"><?= $customer['nama_customer'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label font-bold" for="status">Status</label>
                                <select name="status" id="status" class="form-control" required>
                                    <option value="">Pilih Status</option>
                                    <option value="Belum Dibayar">Belum Dibayar</option>
                                    <option value="Sudah Dibayar">Sudah Dibayar</option>
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
        $('#form_add_invoice').submit(function(e) {
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