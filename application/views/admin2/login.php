<!DOCTYPE html>
    <html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PIAN</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url()?>assets/img/PN2.png">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    </head>

    <body class="hold-transition login-page">
    <div class="login-box mb-4" style="width: 45%;">
    <div class="login-logo mt-4">
        <ul>
            <a href="" class="mr-5"><b><img style="width: 20%;" src="<?php echo base_url()?>assets/img/PN2.png" alt="logo"></b></a>
        </ul>
        <ul>
        <a href="" class="mr-5"><b>PIAN</b></a>
        </ul>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
        <h4 class="login-box-msg">Login Administrator</h4>

        <?= $this->session->flashdata('pesan'); ?>

        <form method="post" action="<?php echo base_url('administrator/auth/proses_login') ?>">
            <div class="input-group mb-3">
            <input type="text" class="form-control" name="username" placeholder="Username">
            <div class="input-group-append">
                <div class="input-group-text">
                    <?= form_error('username', '<small class="text-danger pl-1">', '</small>'); ?>
                    <span class="fas fa-user ml-1"></span>
                </div>
            </div>
            </div>
            <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password">
            <div class="input-group-append">
                <div class="input-group-text">
                    <?= form_error('password', '<small class="text-danger pl-1">', '</small>'); ?>
                    <span class="fas fa-lock ml-1"></span>
                </div>
            </div>
            </div>
            <div class="text-center mb-3">
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </div>
            <p class="mb-0">
                <a href="<?php echo base_url('administrator/auth/registration'); ?>" class="text-center">Register a new membership</a>
            </p>
        </form>
        </div>
        <!-- /.login-card-body -->
    </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url() ?>assets/dist/js/adminlte.min.js"></script>

    </body>
    </html>
