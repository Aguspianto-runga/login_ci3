<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PIAN | <?= $title; ?></title>

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/toastr/toastr.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/dist/css/adminlte.min.css">
    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/img/PN2.png') ?>">
</head>

<body class="hold-transition login-page">
    <div class="login-box" style="width: auto;">
        <!-- login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <img src="<?= base_url('assets/img/PN2.png') ?>" style="width: 5rem;" alt=""><br>
                <a href="<?= base_url(''); ?>" class="h2"><b>PIAN</b></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <?= $this->session->flashdata('message'); ?>

                <form action="<?= base_url('auth'); ?>" method="post">
                    <div class="input-group mt-2 mb-1">
                        <input type="text" id="email" name="email" class="form-control" placeholder="Username" value="<?= set_value('email'); ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <?= form_error('email', '<small class="text-danger pl-2">', '</small>'); ?>
                    <div class="input-group mt-3 mb-1">
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <?= form_error('password', '<small class="text-danger pl-2">', '</small>'); ?>
                    <button type="submit" class="btn btn-primary btn-block mt-3">Sign In</button>
                </form>

                <p class="mb-1 mt-1">
                    <a href="forgot-password.html">I forgot my password</a>
                </p>
                <p class="mb-0">
                    <a href="<?= base_url('auth/registration') ?>" class="text-center">Register a new membership</a>
                </p>
            </div><!-- /.card-body -->
        </div><!-- /.card -->
    </div><!-- /.login-box -->



        <!-- jQuery -->
        <script src="<?= base_url('assets'); ?>/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="<?= base_url('assets'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?= base_url('assets'); ?>/dist/js/adminlte.min.js"></script>

        <!-- SweetAlert2 -->
        <script src="<?= base_url('assets'); ?>/plugins/sweetalert2/sweetalert2.min.js"></script>
        <!-- Toastr -->
        <script src="<?= base_url('assets'); ?>/plugins/toastr/toastr.min.js"></script>






</body>

</html>