<h1 class="mt-0 mb-4 font-bold">Manage Identitas</h1>

<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-content">
                <a href="<?= SERVER_NAME ?>Master/Identitas/add-identitas.php">
                    <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#myModal5">
                        <i class="fa fa-plus mr-2" aria-hidden="true"></i>Add Identitas
                    </button>
                </a>

                <div class="table-responsive">

                    <table class="table table-striped table-bordered table-hover dataTables-example">
                        <thead>
                            <tr>
                                <th>Nama Identitas</th>
                                <th>Badan Hukum</th>
                                <th>NPWP</th>
                                <th>Email</th>
                                <th>URL</th>
                                <th>Alamat</th>
                                <th>Telp</th>
                                <th>Fax</th>
                                <th>Rekening</th>
                                <th>Foto</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>KTP</td>
                                <td>Negara</td>
                                <td>1234567890</td>
                                <td>budi@example.com</td>
                                <td>www.example.com</td>
                                <td>Jl. Raya No. 1</td>
                                <td>08231312</td>
                                <td>(12312) 12312312</td>
                                <td>123123123</td>
                                <td><img src="https://ui-avatars.com/api/?name=KTP&size=100&background=2e3f5e&color=ffffff" alt=""></td>
                                <td class="center">
                                    <button class="btn btn-info btn-edit-catalog" data-id="Alat Tulis Kantor" data-toggle="modal" data-target="#edit-catalog-category" data-name="Alat Tulis Kantor">
                                        Edit
                                    </button>
                                    <button class="btn btn-danger btn-delete-catalog-category" data-name="Alat Tulis Kantor">
                                        Hapus
                                    </button>
                                </td>
                            </tr>
                            <div class="modal inmodal fade" id="edit-catalog-category" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="" method="POST" id="form-edit-catalog-category">
                                                <div class="form-group">
                                                    <label>Edit Catalog Category</label>
                                                    <input type="text" name="category_name" id="edit-category-name" class="form-control">
                                                    <input type="hidden" name="original_name" id="edit-category-original-name">
                                                </div>
                                                <button type="submit" class="btn btn-primary float-right">Submit</button>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>