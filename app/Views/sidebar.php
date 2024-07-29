<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>

    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1.0/dist/css/adminlte.min.css" />

    <!-- Sidebar CSS -->
    <link rel="stylesheet" href="<?php echo base_url('/css/sidebar.css'); ?>">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />

    <!-- Google Font: Inter -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;500;700&family=Rubik:wght@300;400;500&display=swap"
        rel="stylesheet">
    </meta>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <span class="brand-text font-weight-light">Sigma WO Dashboard</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar h-100">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Dashboard -->
                        <li class="nav-item">
                            <a href="<?= base_url('daftarPaket') ?>" class="nav-link">
                                <i class="nav-icon fas fa-regular fa-newspaper"></i>
                                <p>Daftar Paket</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?= base_url('daftarPesanan') ?>" class="nav-link">
                                <i class="nav-icon fas fa-regular fa-cart-plus"></i>
                                <p>Daftar Pesanan</p>
                            </a>
                        </li>

                        <!--
                        <li class="nav-item">
                            <a href="<?= base_url('detailWebInfo') ?>" class="nav-link">
                                <i class="nav-icon fas fa-solid fa-desktop"></i>
                                <p>Website Info</p>
                            </a>
                        </li>
-->

                        <li class="nav-item">
                            <a href="<?= base_url('/') ?>" class="nav-link">
                                <i class="nav-icon fas fa-solid fa-home"></i>
                                <p>Kembali Ke Home</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?= base_url('logout') ?>" class="nav-link">
                                <i class="nav-icon fas fa-user-tie"></i>
                                <p>Logout</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
</body>