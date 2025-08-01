<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="<?= SERVER_NAME ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= SERVER_NAME ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?= SERVER_NAME ?>assets/css/plugins/dataTables/datatables.min.css" rel="stylesheet">


    <link href="<?= SERVER_NAME ?>assets/css/animate.css" rel="stylesheet">
    <link href="<?= SERVER_NAME ?>assets/css/style.css" rel="stylesheet">

    <link href="<?= SERVER_NAME ?>assets/css/plugins/summernote/summernote-bs4.css" rel="stylesheet">
    <link href="<?= SERVER_NAME ?>assets/js/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet">


    <link href="<?= SERVER_NAME ?>assets/css/plugins/datapicker/datepicker3.css" rel="stylesheet">

    <!-- EasyUI -->
    <link rel="stylesheet" type="text/css" href="<?= SERVER_NAME ?>assets/plugins/easyui/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="<?= SERVER_NAME ?>assets/plugins/easyui/themes/icon.css">
    <script src="<?= SERVER_NAME ?>assets/plugins/easyui/jquery.min.js"></script>
    <script src="<?= SERVER_NAME ?>assets/plugins/easyui/jquery.easyui.min.js"></script>
</head>

<body></body>
<div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <?php include_once __DIR__ . "/../components/sidebar.php"; ?>
    </nav>

    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <a href="<?= SERVER_NAME ?>handler/auth/logout.php" class="btn btn-danger text-white" id="btn-logout">
                            <i class="fa fa-sign-out"></i> Log out
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="wrapper wrapper-content animated fadeInRight">
            <?php isset($content_view) && require $content_view; ?>
        </div>

        <div class="footer">
            <div>
                <strong>Copyright</strong> Arya Naufal &copy; 2025
            </div>
        </div>
    </div>
</div>


<!-- Mainly scripts -->
<script src="<?= SERVER_NAME ?>assets/js/jquery-3.1.1.min.js"></script>
<script src="<?= SERVER_NAME ?>assets/js/popper.min.js"></script>
<script src="<?= SERVER_NAME ?>assets/js/bootstrap.js"></script>
<script src="<?= SERVER_NAME ?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="<?= SERVER_NAME ?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="<?= SERVER_NAME ?>assets/js/inspinia.js"></script>
<script src="<?= SERVER_NAME ?>assets/js/plugins/pace/pace.min.js"></script>

<!-- jQuery UI -->
<script src="<?= SERVER_NAME ?>assets/js/plugins/jquery-ui/jquery-ui.min.js"></script>

<!-- EayPIE -->
<script src="<?= SERVER_NAME ?>assets/js/plugins/easypiechart/jquery.easypiechart.js"></script>

<!-- ChartJS-->
<script src="<?= SERVER_NAME ?>assets/js/plugins/chartJs/Chart.min.js"></script>

<!-- Data picker -->
<script src="<?= SERVER_NAME ?>assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>

<!-- Data tables -->
<script src="<?= SERVER_NAME ?>assets/js/plugins/dataTables/datatables.min.js"></script>

<!-- SUMMERNOTE -->
<script src="<?= SERVER_NAME ?>assets/js/plugins/summernote/summernote-bs4.js"></script>

<!-- Sweetalert2 -->
<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.16.0/dist/sweetalert2.all.min.js" integrity="sha256-JxrPeaXEC22LUNm25PF02qeQ756a2XN/mxPJlfk9Lb8=" crossorigin="anonymous"></script> -->
<script src="<?= SERVER_NAME ?>assets/sweetalert/sweetalert2.all.min.js"></script>

<script>
    $(document).ready(function() {
        $('#date_modified').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true
        });
    });
</script>

<script>
    $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-white btn-sm';

    $(document).ready(function() {
        $('.dataTables-example').DataTable({
            pageLength: 10,
            responsive: true,
        });

    });
</script>

<script>
    $(document).ready(function() {
        $('.summernote').summernote({
            placeholder: "Write description here",
            height: 200,
        });

        $('.input-group.date').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true
        });

    });
</script>

</body>

</html>