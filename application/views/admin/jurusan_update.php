 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1><i class="fas fa-user-graduate"></i><?= $title; ?></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active"><?= $title; ?></li> -->
                                <li class="breadcrumb-item active"><i class="fas fa-calendar-alt"></i> <?= date('d F Y'); ?></li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">





<div class="container-fluid">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Update Mahasiswa</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="<?= base_url('admin/jurusan_update_aksi') ?>" enctype="multipart/form-data">
                    <?php foreach ($jurusan as $jrs) : ?>
                        <hr class="my-0">
                        <div class="card-body">
                            <form id="formAccountSettings" method="POST" onsubmit="return false">
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="firstName" class="form-label">Nama</label>
                                        <input type="text" name="nama_jurusan" class="form-control form-control" value="<?php echo $jrs->nama_jurusan ?>">
                                        <?php echo form_error('nama_jurusan', '<div class="text-danger small" ml-3>') ?>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="lastName" class="form-label">Kode</label>
                                        <input type="text" name="kode_jurusan" class="form-control form-control" value="<?php echo $jrs->kode_jurusan ?>">
                                        <?php echo form_error('kode_jurusan', '<div class="text-danger small" ml-3>') ?>
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                    <a href="<?php echo base_url('admin/jurusan') ?>" class="btn btn-outline-secondary">
                                        </i>Kembali
                                    </a>
                                </div>
                                <?php endforeach; ?>
                            </form>
                        </div>

                </form>
                
            </div>
            <!-- /.card -->
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">

        </div>
        <!--/.col (right) -->
    </div>
    <!-- /.row -->
</div>



</div><!-- /.container-fluid -->
</section><!-- /.content -->