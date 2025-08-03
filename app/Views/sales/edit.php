<h1 class="mt-0 mb-4 font-bold">Edit Sales</h1>

<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-content">
                <button type="button" class="btn btn-danger mb-4" data-toggle="modal" data-target="#myModal5" onclick="window.history.back()">
                    <i class="fa fa-arrow-left mr-2" aria-hidden="true"></i>Back
                </button>

                <form id="form_edit_sales">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label font-bold" for="id_customer">Nama Customer</label>
                                <select name="id_customer" name="id_customer" id="id_customer" class="form-control" required>
                                    <option selected value="<?= $sale['id_customer'] ?>"><?= $sale['nama_customer'] ?></option>
                                    <?php foreach ($customers as $c) : ?>
                                        <option value="<?= $c['id_customer'] ?>"><?= $c['nama_customer'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label font-bold" for="id_item">Nama Barang</label>
                                <select name="id_item" name="id_item" id="id_item" class="form-control" required>
                                    <option selected value="<?= $sale['id_item'] ?>"><?= $sale['nama_item'] ?></option>
                                    <?php foreach ($items as $item) : ?>
                                        <option value="<?= $item['id_item'] ?>"><?= $item['nama_item'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label font-bold" for="do_customer">DO Number</label>
                                <input type="text" name="do_customer" id="do_customer" placeholder="Nomor DO" class="form-control" value="<?= $sale['do_customer'] ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label font-bold" for="status">Status</label>
                                <select name="status" id="status" class="form-control" required>
                                    <option selected value="<?= $sale['status'] ?>"><?= $sale['status'] ?></option>
                                    <option value="belum bayar">belum bayar</option>
                                    <option value="sudah bayar">sudah bayar</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label font-bold" for="quantity">Quantity</label>
                                <input type="text" name="quantity" id="quantity" placeholder="Quantity" class="form-control" value="<?= $sale['quantity'] ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label font-bold" for="amount">Amount</label>
                                <input type="text" name="amount" id="amount" placeholder="Amount (kilogram, gram, etc)" class="form-control" value="<?= $sale['amount'] ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label font-bold" for="tgl_sales">Tanggal Penjualan</label>
                                <input type="date" name="tgl_sales" id="tgl_sales" placeholder="Nomor DO" class="form-control" value="<?= $sale['tgl_sales'] ?>">
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
        $('#form_edit_sales').submit(function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            fetch('<?= SERVER_NAME ?>sales/edit/<?= $sale['id_sales'] ?>', {
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
                            window.location.href = '<?= SERVER_NAME ?>sales';
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