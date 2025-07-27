<h1 class="mt-0 mb-4 font-bold">Add Identitas</h1>

<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-content">
                <button type="button" class="btn btn-danger mb-4" data-toggle="modal" data-target="#myModal5" onclick="window.history.back()">
                    <i class="fa fa-arrow-left mr-2" aria-hidden="true"></i>Back
                </button>

                <form method="POST" action="" id="form_add_identitas" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label font-bold" for="namaIdentitas">Nama Identitas</label>
                                <input type="text" name="namaIdentitas" id="namaIdentitas" placeholder="Nama Identitas" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label font-bold" for="badanHukum">Badan Hukum</label>
                                <input type="text" name="badanHukum" id="badanHukum" placeholder="Badan Hukum" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label font-bold" for="npwp">NPWP</label>
                                <input type="text" name="npwp" id="npwp" placeholder="NPWP" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label font-bold" for="email">Email</label>
                                <input type="email" name="email" id="email" placeholder="Email" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label font-bold" for="url">URL</label>
                                <input type="text" name="url" id="url" placeholder="URL" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label font-bold" for="alamat">Alamat</label>
                                <textarea name="alamat" id="alamat" placeholder="Alamat" class="form-control" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label font-bold" for="telp">Telp</label>
                                <input type="tel" name="telp" id="telp" placeholder="Telp" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label font-bold" for="fax">Fax</label>
                                <input type="text" name="fax" id="fax" placeholder="Fax" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label font-bold" for="rekening">Rekening</label>
                                <input type="text" name="rekening" id="rekening" placeholder="Rekening" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label font-bold" for="foto">Foto</label>
                                <input type="file" name="foto" id="foto" placeholder="Foto" class="form-control" accept="image/*">
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