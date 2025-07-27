<h1 class="mt-0 mb-4 font-bold">Edit Item</h1>

<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-content">
                <button type="button" class="btn btn-danger mb-4" data-toggle="modal" data-target="#myModal5" onclick="window.history.back()">
                    <i class="fa fa-arrow-left mr-2" aria-hidden="true"></i>Back
                </button>

                <form method="POST" action="" id="form_edit_item">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label font-bold" for="namaItem">Nama Item</label>
                                <input type="text" name="namaItem" id="namaItem" placeholder="Nama Item" class="form-control" required value="<?= $item['data']['nama_item'] ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label font-bold" for="uom">UOM</label>
                                <input type="text" name="uom" id="uom" placeholder="UOM" class="form-control" required value="<?= $item['data']['uom'] ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label font-bold" for="hargaBeli">Harga Beli</label>
                                <input type="number" name="hargaBeli" id="hargaBeli" placeholder="Harga Beli" class="form-control" required value="<?= $item['data']['harga_beli'] ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label font-bold" for="hargaJual">Harga Jual</label>
                                <input type="number" name="hargaJual" id="hargaJual" placeholder="Harga Jual" class="form-control" required value="<?= $item['data']['harga_jual'] ?>">
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
        $('#form_edit_item').submit(function(e) {
            e.preventDefault();
            var form = $(this);
            var formData = new FormData(form[0]);
            fetch('<?= SERVER_NAME ?>handler/item/edit.php?id_item=<?= $item['data']['id_item'] ?>', {
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
                            window.location.href = '<?= SERVER_NAME ?>item.php';
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