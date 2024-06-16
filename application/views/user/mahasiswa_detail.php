<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-user-graduate"></i> <?= $title; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <!-- <li class="breadcrumb-item"><a href="#">Test</a></li>
                        <li class="breadcrumb-item active"><?= $title; ?></li> -->
                        <li class="breadcrumb-item active"><i class="fas fa-calendar-alt"></i> <?= date('d F Y');?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">





            <!-- Content Header (Page header) -->
            <div class="content-header">

            </div><!-- /.content-header -->


            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">






                    <div class="d-flex align-items-stretch flex-column m-auto" style="width: 85%;">
                        <?php foreach ($mahasiswa as $dt) : ?>
                            <div class="card bg-light d-flex flex-fill">
                                <div class="card-header text-muted border-bottom-0">
                                    Digital Strategist
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="col-7">
                                            <h2 class="lead"><b><?= $dt->nama; ?></b></h2>
                                            <p class="text-muted"><b><?= $dt->nama_jurusan; ?></b></p>
                                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                                <li class="small mb-1"><span class="fa-li"><i class="fas fa-lg fa-id-card"></i></span>: <?= $dt->nim; ?></li>
                                                <li class="small mb-1"><span class="fa-li"><i class="fas fa-lg fa-map-marker-alt"></i></span>: <?= $dt->alamat; ?></li>
                                                <li class="small mb-1"><span class="fa-li"><i class="fas fa-lg fa-envelope"></i></span><a href="mailto:<?= $dt->email; ?>">: <?= $dt->email; ?></a></li>
                                                <li class="small mb-1"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>: <?= $dt->telpon; ?></li>
                                                <li class="small mb-1"><span class="fa-li"><i class="fas fa-lg fa-calendar"></i></span>: <?= $dt->tempat_lahir ?>, <?= $dt->tanggal_lahir; ?></li>
                                                <li class="small mb-1"><span class="fa-li"><i class="fas fa-lg fa-user"></i></span>: <?= $dt->jenis_kelamin; ?></li>
                                            </ul>
                                        </div>
                                        <div class="col-5 text-center">
                                            <img src="<?= base_url('assets/img/') . $dt->foto; ?>" class="img-circle img-fluid">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="text-right">
                                        <a href="#" class="btn btn-sm bg-teal">
                                            <i class="fas fa-comments"></i>
                                        </a>
                                        <a href="<?php echo base_url('user/mahasiswa') ?>" class="btn btn-sm btn-secondary">
                                            </i>Kembali
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>



                </div>
            </section>
        </div>