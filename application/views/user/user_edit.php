<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $title; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><?= $title; ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">



            <?= $this->session->flashdata('message'); ?>

            <div class="container-fluid">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Update Profile</h3>
                    </div>
                    <div class="card-body">
                        <?= form_open_multipart('user/edit'); ?>
                            <div class="card-body">
                                <div class="d-flex align-items-start align-items-sm-center gap-4">
                                    <img src="<?= base_url('assets/img/') . $user['image']; ?>" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar">
                                    <div class="button-wrapper">
                                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                            <span class="d-none d-sm-block">Upload new photo</span>
                                            <i class="bx bx-upload d-block d-sm-none"></i>
                                            <input type="file" id="upload" class="account-file-input" name="image" hidden="" accept="image/png, image/jpeg">
                                        </label>
                                        <p class="text-muted mb-0">Allowed JPG, GIF or PNG</p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" name="nama" class="form-control" id="name" value="<?= $user['name']; ?>">
                                    <?= form_error('name', '<small class="text-danger pl-2">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    </div>
                                    <input type="email" name="email" id="email" class="form-control" value="<?= $user['email']; ?>" readonly>
                                </div>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-sm btn-primary me-2">Save changes</button>
                                <a href="<?php echo base_url('user') ?>" class="btn btn-sm btn-outline-secondary">
                                    </i>Kembali
                                </a>
                            </div>
                        </form>
                    </div>
                </div><!-- /.card -->
            </div>



        </div><!-- /.container-fluid -->
    </section><!-- /.content -->