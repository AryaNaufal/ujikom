<?php
$menuMasterItems = [
    'user-account.php/' => 'User Account',
    'identitas.php/' => 'Identitas',
    'customer.php/' => 'Customer',
    'item.php/' => 'Item',
];

$menuInvoiceItems = [
    'invoice.php/' => 'Invoice',
];

foreach ($menuMasterItems as $path => $label) {
    $activeMasterMenu = strcasecmp($current_menu, $label) === 0;
    if ($activeMasterMenu) {
        break;
    }
}

foreach ($menuInvoiceItems as $path => $label) {
    $activeInvoiceMenu = strcasecmp($current_menu, $label) === 0;
    if ($activeInvoiceMenu) {
        break;
    }
}
?>

<div class="sidebar-collapse">
    <ul class="nav metismenu" id="side-menu">
        <li class="nav-header d-flex flex-column justify-content-center align-items-center text-center">
            <div class="dropdown profile-element">
                <img alt="image" class="rounded-circle" src="<?= SERVER_NAME . "assets/images/ProfilePicture.jpg" ?>" style="width: 70px; height: 70px;" />
                <a href=" #">
                    <span class="block m-t-xs font-bold"><?= $_SESSION['username'] ?></span>
                    <span class="text-muted text-xs block">Art Director</span>
                </a>
            </div>
        </li>

        <li class="<?= $current_menu == 'dashboard' ? 'active' : ''; ?>"><a href="<?= SERVER_NAME ?>index.php"><i class="fa fa-home"></i> Home</a></li>

        <li class="<?= $activeMasterMenu ? 'active' : ''; ?>">
            <a href=""><i class="fa fa-database"></i> <span class="nav-label">Master</span>
                <span class="fa arrow"></span></a>
            <ul class="nav nav-second-level <?= $activeMasterMenu ? '' : 'collapse'; ?>">
                <?php foreach ($menuMasterItems as $path => $label): ?>
                    <li class="<?= strcasecmp($current_menu, $label) === 0 ? 'active' : ''; ?>" style="width: 100%;">
                        <a href="<?= SERVER_NAME . trim($path, '/') ?>">
                            <?= $label ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </li>

        <li class="<?= $activeInvoiceMenu ? 'active' : ''; ?>">
            <a href=""><i class="fa fa-copy"></i> <span class="nav-label">Transaksi</span> <span class="fa arrow"></span></a>
            <ul class="nav nav-second-level <?= $activeInvoiceMenu ? '' : 'collapse'; ?>">
                <?php foreach ($menuInvoiceItems as $path => $label): ?>
                    <li class="<?= strcasecmp($current_menu, $label) === 0 ? 'active' : ''; ?>" style="width: 100%;">
                        <a href="<?= SERVER_NAME . trim($path, '/') ?>">
                            <?= $label ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </li>

        <li>
            <a href="index.html"><i class="fa fa-book"></i> <span class="nav-label">Laporan</span> <span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li class="active"><a href="">-</a></li>
            </ul>
        </li>


    </ul>

</div>