<style>
    #btn-logout:hover {
        background-color: #dc3545;
    }
</style>
<div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <?php include ROOT_PATH . "/components/fragments/sidebar.php"; ?>
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