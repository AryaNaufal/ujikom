<h1 class="mt-0 mb-4 font-bold">Manage Data Invoice</h1>

<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-content">
                <a href="<?= SERVER_NAME ?>add-invoice.php">
                    <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#myModal5">
                        <i class="fa fa-plus mr-2" aria-hidden="true"></i>Add Invoice
                    </button>
                </a>

                <div class="table-responsive">

                    <table class="table table-striped table-bordered table-hover dataTables-example">
                        <thead>
                            <tr>
                                <th>Sales No</th>
                                <th>DO No</th>
                                <th>Tgl Sales</th>
                                <th>Customer</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>123</td>
                                <td>01/DO/12/XII/2020</td>
                                <td>27/07/2025</td>
                                <td>RSUD Tarakan Jakarta</td>
                                <td>Belum Lunas</td>
                                <td class="center">
                                    <button class="btn btn-info btn-edit-catalog" data-name="Alat Tulis Kantor">
                                        Edit
                                    </button>
                                    <button class="btn btn-danger btn-delete-catalog-category" data-name="Alat Tulis Kantor">
                                        Hapus
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>1234</td>
                                <td>01/DO/12/XII/2020</td>
                                <td>27/07/2025</td>
                                <td>RSUD Kota Medan</td>
                                <td>Lunas</td>
                                <td class="center">
                                    <button class="btn btn-info btn-edit-catalog" data-name="Alat Tulis Kantor">
                                        Edit
                                    </button>
                                    <button class="btn btn-danger btn-delete-catalog-category" data-name="Alat Tulis Kantor">
                                        Hapus
                                    </button>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>