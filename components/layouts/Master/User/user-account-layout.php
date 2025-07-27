<h1 class="mt-0 mb-4 font-bold">Manage User Account</h1>

<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-content">
                <a href="<?= SERVER_NAME ?>Master/User/add-user-account.php">
                    <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#myModal5">
                        <i class="fa fa-plus mr-2" aria-hidden="true"></i>Add User Account
                    </button>
                </a>

                <div class="table-responsive">

                    <table class="table table-striped table-bordered table-hover dataTables-example">
                        <thead>
                            <tr>
                                <th>Nama User</th>
                                <th>Username</th>
                                <th>level</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Andi</td>
                                <td>Andi</td>
                                <td>Petugas</td>
                                <td class="center">
                                    <button class="btn btn-info btn-edit-catalog" data-id="Alat Tulis Kantor" data-toggle="modal" data-target="#edit-catalog-category" data-name="Alat Tulis Kantor">
                                        Edit
                                    </button>
                                    <button class="btn btn-danger btn-delete-catalog-category" data-name="Alat Tulis Kantor">
                                        Hapus
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>Anton</td>
                                <td>Anton</td>
                                <td>Sales</td>
                                <td class="center">
                                    <button class="btn btn-info btn-edit-catalog" data-id="Alat Tulis Kantor" data-toggle="modal" data-target="#edit-catalog-category" data-name="Alat Tulis Kantor">
                                        Edit
                                    </button>
                                    <button class="btn btn-danger btn-delete-catalog-category" data-name="Alat Tulis Kantor">
                                        Hapus
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>Budi</td>
                                <td>Budi</td>
                                <td>Customer</td>
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