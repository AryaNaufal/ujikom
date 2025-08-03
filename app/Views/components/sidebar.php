<?php
$menuItems = [
    'master' => [
        'label' => 'Master',
        'icon' => 'fa fa-database',
        'items' => [
            'identitas' => 'Identitas',
            'customer' => 'Customer',
            'item' => 'Item',
            'petugas' => 'Petugas',
        ]
    ],
    'transaksi' => [
        'label' => 'Transaksi',
        'icon' => 'fa fa-copy',
        'items' => [
            'sales' => 'Sales',
        ]
    ],
    'laporan' => [
        'label' => 'Laporan',
        'icon' => 'fa fa-book',
        'items' => [
            'laporan-penjualan' => 'Laporan Penjualan',
        ]
    ]
];

// Dapatkan URI saat ini untuk menentukan menu yang aktif.
// Asumsikan URI adalah bagian pertama dari path, misal '/item' -> 'item'.
$currentUri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
$currentUriSegment = explode('/', $currentUri)[0] ?? 'dashboard';

// Tentukan apakah menu induk (Master, Transaksi, Laporan) aktif.
$activeParentMenu = null;
foreach ($menuItems as $parentKey => $parentMenu) {
    if (isset($parentMenu['items']) && array_key_exists($currentUriSegment, $parentMenu['items'])) {
        $activeParentMenu = $parentKey;
        break;
    }
}
?>

<div class="sidebar-collapse">
    <ul class="nav metismenu" id="side-menu">
        <!-- Bagian Profil -->
        <li class="nav-header d-flex flex-column justify-content-center align-items-center text-center">
            <div class="dropdown profile-element">
                <img alt="image" class="rounded-circle" src="<?= SERVER_NAME . "assets/images/ProfilePicture.jpg" ?>" style="width: 70px; height: 70px;" />
                <a href="#">
                    <span class="block m-t-xs font-bold"><?= $_SESSION['username'] ?? 'User' ?></span>
                    <span class="text-muted text-xs block">Art Director</span>
                </a>
            </div>
        </li>

        <!-- Menu Home -->
        <li class="<?= $currentUriSegment == '' ? 'active' : ''; ?>">
            <a href="<?= SERVER_NAME ?>"><i class="fa fa-home"></i> <span class="nav-label">Home</span></a>
        </li>

        <!-- Menu Induk (Master, Transaksi, Laporan) -->
        <?php foreach ($menuItems as $parentKey => $parentMenu): ?>
            <li class="<?= $activeParentMenu == $parentKey ? 'active' : ''; ?>">
                <a href="#">
                    <i class="<?= $parentMenu['icon'] ?>"></i>
                    <span class="nav-label"><?= $parentMenu['label'] ?></span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level <?= $activeParentMenu == $parentKey ? '' : 'collapse'; ?>">
                    <?php foreach ($parentMenu['items'] as $uri => $label): ?>
                        <li class="<?= $currentUriSegment == $uri ? 'active' : ''; ?>" style="width: 100%;">
                            <a href="<?= SERVER_NAME . $uri ?>">
                                <?= $label ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </li>
        <?php endforeach; ?>
    </ul>