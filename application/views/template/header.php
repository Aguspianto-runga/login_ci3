<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | <?= $title?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets') ?>/img/PN2.png">
    <!-- boostrap 5.3 -->
    <link rel="stylesheet" href="<?= base_url('assets') ?>/css/bootstrap.css">
    <!-- Tempusdominus Bootstrap 4
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css"> -->
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/jqvmap/jqvmap.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- Ekko Lightbox -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/ekko-lightbox/ekko-lightbox.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>
                <!-- User Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <div class="card card-widget widget-user m-auto" style="width: 20rem;">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header bg-info">
                                <h3 class="widget-user-username animate__animated animation__wobble"><?= $user['name']; ?></h3>
                                <h5 class="widget-user-desc"><?= $user['email']; ?></h5>
                            </div>
                            <div class="widget-user-image">
                                <img class="img-circle elevation-2" src="<?= base_url('assets/img/'). $user['image']; ?>" alt="User Avatar">
                            </div>
                            <div class="card-footer">
                                <center>
                                    <p class="card-text">
                                        Selamat datang <b><?= $user['name']; ?></b>
                                        <!-- Mengubah role_id dari '1/2' menjadi 'admin/user'  -->
                                            (<?php
                                                if ($user['role_id'] == 1) {
                                                    echo('admin');
                                                } else {
                                                    echo('user');
                                                }
                                            ?>)<br>
                                    </p>
                                    <p class="card-text text-muted mb-3">
                                        <small>
                                            Bergabung sejak <?= date('d F Y', $user['date_created']); ?>
                                        </small>
                                    </p>
                                    <a href="<?= base_url('auth/logout'); ?>" class="btn btn-sm btn-primary">
                                        <i class="fas fa-sign-out-alt"></i> Logout
                                    </a>
                                </center>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link" style="text-decoration: none;">
                <img src="<?= base_url('assets'); ?>/img/PN2.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">USER_0622</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= base_url('assets/img/') . $user['image']; ?>" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block" style="text-decoration: none;"><?= $user['name']; ?></a>
                    </div>
                </div>

                <!-- SidebarSearch Form 
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search text-light" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div> -->

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                            with font-awesome or any other icon font library -->

                        <!--QUERY MENU-->
                        <?php
                        $role_id = $this->session->userdata('role_id');
                        $queryMenu = "SELECT `user_menu`.`id`, `menu`
                                            FROM `user_menu` JOIN `user_access_menu`
                                            ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                                            WHERE `user_access_menu`.`role_id` = $role_id
                                            ORDER BY `user_access_menu`.`menu_id` ASC
                                            ";
                        $menu = $this->db->query($queryMenu)->result_array();
                        ?>



                        <!--Looping Menu-->
                        <?php foreach ($menu as $m) : ?>
                            <ul class="nav-header">
                                <?= $m['menu']; ?>
                            </ul>

                            <!--Sub Menu-->
                            <?php
                            $menuId = $m['id'];
                            $querySubMenu = "SELECT *
                                                FROM `user_sub_menu` JOIN `user_menu`
                                                ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                                                WHERE `user_sub_menu`.`menu_id` = $menuId
                                                AND `user_sub_menu`.`is_active` = 1
                                            ";
                            $subMenu = $this->db->query($querySubMenu)->result_array();
                            ?>

                            <?php foreach ($subMenu as $sm) : ?>
                                <li class="nav-item">
                                    <?php if ($title == $sm['title']) : ?>
                                        <a href="<?= base_url($sm['url']); ?>" class="nav-link active">
                                        <?php else : ?>
                                            <a href="<?= base_url($sm['url']); ?>" class="nav-link">
                                            <?php endif; ?>
                                            <i class="nav-icon <?= $sm['icon']; ?>"></i>
                                            <p>
                                                <?= $sm['title']; ?>
                                            </p>
                                            </a>

                                </li>
                            <?php endforeach; ?>


                        <?php endforeach; ?>



                    </ul>

                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>