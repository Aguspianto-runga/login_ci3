        <!-- Content Header (Page header) -->
        <div class="content-header mb-5">
            <div class="container-fluid" role="alert">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 "><i class="fas fa-user-graduate"></i> Update Mahasiswa</h1>
                    </div>
                </div>
            </div>
        </div><!-- /.content-header -->


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">





                <div class="card mb-4">
                    <h5 class="card-header">Profile Details</h5>
                    <!-- Account -->
                    <?php foreach ($mahasiswa as $mhs) : ?>
                    <?php echo form_open_multipart('administrator/mahasiswa/update_mahasiswa_aksi') ?>
                        <div class="card-body">
                            <div class="d-flex align-items-start align-items-sm-center gap-4">
                                <img src="<?= base_url('assets/img/') . $mhs->foto; ?>" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar">
                                <div class="button-wrapper">
                                    <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                        <span class="d-none d-sm-block">Upload new photo</span>
                                        <i class="bx bx-upload d-block d-sm-none"></i>
                                        <input type="file" id="upload" class="account-file-input" name="foto" hidden="" accept="image/png, image/jpeg">
                                    </label>
                                    <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                                </div>
                            </div>
                        </div>
                        <hr class="my-0">
                        <div class="card-body">
                            <form id="formAccountSettings" method="POST" onsubmit="return false">
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="firstName" class="form-label">Nama</label>
                                        <input type="hidden" name="id" class="form-control" value="<?php echo $mhs->id ?>">
                                        <input type="text" name="nama" class="form-control form-control" value="<?php echo $mhs->nama ?>">
                                        <?php echo form_error('nama', '<div class="text-danger small" ml-3>') ?>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="lastName" class="form-label">NIM</label>
                                        <input type="number" name="nim" class="form-control form-control" value="<?php echo $mhs->nim ?>">
                                        <?php echo form_error('nim', '<div class="text-danger small" ml-3>') ?>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="email" class="form-label">E-mail</label>
                                        <input type="email" name="email" class="form-control form-control" id="inputEmail" value="<?php echo $mhs->email ?>">
                                        <?php echo form_error('email', '<div class="text-danger small" ml-3>') ?>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="organization" class="form-label">Alamat</label>
                                        <input type="text" name="alamat" class="form-control form-control" id="inputEmail" value="<?php echo $mhs->alamat ?>">
                                        <?php echo form_error('alamat', '<div class="text-danger small" ml-3>') ?>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="phoneNumber">Phone Number</label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text">IDN (+62)</span>
                                            <input type="number" name="telpon" class="form-control form-control" id="inputEmail" value="<?php echo $mhs->telpon ?>">
                                            <?php echo form_error('alamat', '<div class="text-danger small" ml-3>') ?>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="address" class="form-label">Tempat Lahir</label>
                                        <input type="text" name="tempat_lahir" class="form-control form-control" id="inputEmail" value="<?php echo $mhs->tempat_lahir ?>">
                                        <?php echo form_error('tempat_lahir', '<div class="text-danger small" ml-3>') ?>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="state" class="form-label">Tanggal Lahir</label>
                                        <input type="date" name="tanggal_lahir" class="form-control form-control" id="inputEmail" value="<?php echo $mhs->tanggal_lahir ?>">
                                        <?php echo form_error('tanggal_lahir', '<div class="text-danger small" ml-3>') ?>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="country">Jurusan</label>
                                        <select type="select" class="form-control form-control" id="inputEmail" name="nama_jurusan">
                                            <option value="<?php echo $mhs->nama_jurusan ?>"> <?php echo $mhs->nama_jurusan ?></option>
                                            <?php foreach ($jurusan as $jrs) : ?>
                                                <option value="<?php echo $jrs->nama_jurusan ?>"><?php echo $jrs->nama_jurusan; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?php echo form_error('jurusan', '<div class="text-danger small" ml-3>') ?>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="language" class="form-label">Jenis Kelamin</label>
                                        <select name="jenis_kelamin" class="form-control form-control" id="inputEmail">
                                            <option type="select" value="<?php echo $mhs->jenis_kelamin ?>"><?php echo $mhs->jenis_kelamin ?></option>
                                            <option>Laki-laki</option>
                                            <option>Perempuan</option>
                                        </select>
                                        <?php echo form_error('jenis_kelamin', '<div class="text-danger small" ml-3>') ?>
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                    <a href="<?php echo base_url('administrator/mahasiswa') ?>" class="btn btn-outline-secondary">
                                        </i>Kembali
                                    </a>
                                </div>
                            </form>
                        </div>
                        <?php echo form_close(); ?>
                    <?php endforeach; ?>
                    <!-- /Account -->
                </div>






            </div>
        </section>
        </div>