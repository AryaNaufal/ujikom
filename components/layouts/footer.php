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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.16.0/dist/sweetalert2.all.min.js" integrity="sha256-JxrPeaXEC22LUNm25PF02qeQ756a2XN/mxPJlfk9Lb8=" crossorigin="anonymous"></script>

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