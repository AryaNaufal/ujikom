<h1 class="mt-0 mb-4 font-bold">Add Identitas</h1>

<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-content">
                <button type="button" class="btn btn-danger mb-4" data-toggle="modal" data-target="#myModal5" onclick="window.history.back()">
                    <i class="fa fa-arrow-left mr-2" aria-hidden="true"></i>Back
                </button>

                <form id="form_add_identitas">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label font-bold" for="namaIdentitas">Nama Identitas</label>
                                <input type="text" name="namaIdentitas" id="namaIdentitas" placeholder="Nama Identitas" class="form-control" required value="asd">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label font-bold" for="badanHukum">Badan Hukum</label>
                                <input type="text" name="badanHukum" id="badanHukum" placeholder="Badan Hukum" class="form-control" required value="asd">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label font-bold" for="npwp">NPWP</label>
                                <input type="text" name="npwp" id="npwp" placeholder="NPWP" class="form-control" required value="asd">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label font-bold" for="email">Email</label>
                                <input type="email" name="email" id="email" placeholder="Email" class="form-control" required value="asd@example.com">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label font-bold" for="url">URL</label>
                                <input type="text" name="url" id="url" placeholder="URL" class="form-control" value="asd">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label font-bold" for="alamat">Alamat</label>
                                <textarea name="alamat" id="alamat" placeholder="Alamat" class="form-control" required>asd</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label font-bold" for="telp">Telp</label>
                                <input type="tel" name="telp" id="telp" placeholder="Telp" class="form-control" required value="123">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label font-bold" for="fax">Fax</label>
                                <input type="text" name="fax" id="fax" placeholder="Fax" class="form-control" value="123">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label font-bold" for="rekening">Rekening</label>
                                <input type="text" name="rekening" id="rekening" placeholder="Rekening" class="form-control" value="123">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label font-bold" for="foto">Foto</label>
                                <div class="d-flex align-items-center">
                                    <button type="button" class="btn btn-primary mr-3" onclick="$('input[name=foto]').click()"><i class="fa fa-plus mr-2"></i> Tambah Foto</button>
                                    <span id="foto_name" class="font-bold"></span>
                                    <input type="file" name="foto" id="foto" class="form-control d-none" onchange="document.getElementById('foto_name').innerHTML = this.files[0].name;">
                                </div>
                            </div>
                            <div class="my-2">
                                <img src="" alt="" style="max-width: 150px;" id="foto_preview">
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
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#foto_preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#foto").change(function() {
        readURL(this);
    });
</script>

<script>
    $(document).ready(function() {
        $('#form_add_identitas').submit(function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            fetch('<?= SERVER_NAME ?>identitas/add', {
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
                            window.location.href = '<?= SERVER_NAME ?>identitas';
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