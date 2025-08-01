<h1 class="mt-0 mb-4 font-bold">Edit Customer</h1>

<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-content">
                <button type="button" class="btn btn-danger mb-4" onclick="window.history.back()">
                    <i class="fa fa-arrow-left mr-2" aria-hidden="true"></i>Back
                </button>

                <form id="form_edit_customer">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label font-bold" for="namaCustomer">Nama Customer</label>
                                <input type="text" name="namaCustomer" id="namaCustomer" placeholder="Nama Customer" class="form-control" required value="<?= $customer['data']['nama_customer'] ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label font-bold" for="telp">Telp</label>
                                <input type="tel" name="telp" id="telp" placeholder="Telp" class="form-control" value="<?= $customer['data']['telp'] ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label font-bold" for="fax">Fax</label>
                                <input type="text" name="fax" id="fax" placeholder="Fax" class="form-control" value="<?= $customer['data']['fax'] ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label font-bold" for="email">Email</label>
                                <input type="email" name="email" id="email" placeholder="Email" class="form-control" value="<?= $customer['data']['email'] ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label font-bold" for="alamat">Alamat</label>
                                <textarea name="alamat" id="alamat" placeholder="Alamat" class="form-control" required><?= $customer['data']['alamat'] ?></textarea>
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
        $('#form_edit_customer').submit(function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            fetch('<?= SERVER_NAME ?>customer/edit/<?= $customer['data']['id_customer'] ?>', {
                    method: 'POST',
                    body: formData
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
                            window.location.href = '<?= SERVER_NAME ?>customer';
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