        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid alert alert-default-primary" role="alert">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark"><i class="fas fa-user-graduate"></i> Input Mahasiswa</h1>
                    </div>
                    <!-- <div class="col-sm-6"> 
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard v1</li>
                </ol>
            </div> -->
                </div>
            </div><!-- /.container-fluid -->
        </div><!-- /.content-header -->


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">



                <div class="card">
                    <div class="card-header bg-primary">
                        <h3 class="card-title">Quick Example</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="form">
                        <?php echo form_open_multipart('administrator/mahasiswa/tambah_mahasiswa_aksi') ?>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">NIM</label>
                                        <input type="text" name="nim" class="form-control">
                                        <?php echo form_error('nim', '<div class="text-danger small">') ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nama Mahasiswa</label>
                                        <input type="text" name="nama" class="form-control">
                                        <?php echo form_error('nama', '<div class="text-danger small">') ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="text" name="email" class="form-control">
                                        <?php echo form_error('email', '<div class="text-danger small">') ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Alamat</label>
                                        <input type="text" name="alamat" class="form-control">
                                        <?php echo form_error('alamat', '<div class="text-danger small">') ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="">No. Telpon</label>
                                        <input type="text" name="telpon" class="form-control">
                                        <?php echo form_error('telpon', '<div class="text-danger small">') ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Tempat Lahir</label>
                                        <input type="text" name="tempat_lahir" class="form-control">
                                        <?php echo form_error('tempat_lahir', '<div class="text-danger small">') ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tanggal Lahir</label>
                                        <input type="date" name="tanggal_lahir" class="form-control">
                                        <?php echo form_error('tanggal_lahir', '<div class="text-danger small">') ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Jenis Kelamin</label>
                                        <select class="custom-select" name="jenis_kelamin">
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option>Laki-laki</option>
                                            <option>Perempuan</option>
                                        </select>
                                        <?php echo form_error('jenis_kelamin', '<div class="text-danger small">') ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Jurusan</label>
                                        <select class="custom-select" name="nama_jurusan">
                                            <option value="">Pilih Jurusan</option>
                                            <?php foreach ($jurusan as $jrs) : ?>
                                                <option value="<?php echo $jrs->nama_jurusan ?>"><?php echo $jrs->nama_jurusan; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?php echo form_error('nama_jurusan', '<div class="text-danger small">') ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">File input</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="foto" class="custom-file-input" id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <a href="<?php echo base_url('administrator/mahasiswa') ?>" class="btn btn-sm mb-1 btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-sm mb-1 btn-primary">Simpan</button>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>


                <!--<div class="form m-auto" style="width: 85%;">
                    <?php echo form_open_multipart('administrator/mahasiswa/tambah_mahasiswa_aksi') ?>
                    <div class="form-group">
                        <label for="">NIM</label>
                        <input type="text" name="nim" class="form-control">
                        <?php echo form_error('nim', '<div class="text-danger small" ml-3>') ?>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Mahasiswa</label>
                        <input type="text" name="nama" class="form-control">
                        <?php echo form_error('nama', '<div class="text-danger small" ml-3>') ?>
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input type="text" name="alamat" class="form-control">
                        <?php echo form_error('alamat', '<div class="text-danger small" ml-3>') ?>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" name="email" class="form-control">
                        <?php echo form_error('email', '<div class="text-danger small" ml-3>') ?>
                    </div>
                    <div class="form-group">
                        <label for="">No. Telpon</label>
                        <input type="text" name="telpon" class="form-control">
                        <?php echo form_error('telpon', '<div class="text-danger small" ml-3>') ?>
                    </div>
                    <div class="form-group">
                        <label for="">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="form-control">
                        <?php echo form_error('tempat_lahir', '<div class="text-danger small" ml-3>') ?>
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control">
                        <?php echo form_error('tanggal_lahir', '<div class="text-danger small" ml-3>') ?>
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Kelamin</label>
                        <select class="custom-select" name="jenis_kelamin">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option>Laki-laki</option>
                            <option>Perempuan</option>
                        </select>
                        <?php echo form_error('jenis_kelamin', '<div class="text-danger small" ml-3>') ?>
                    </div>
                    <div class="form-group">
                        <label for="">Jurusan</label>
                        <select class="custom-select" name="nama_jurusan">
                            <option value="">Pilih Jurusan</option>
                            <?php foreach ($jurusan as $jrs) : ?>
                                <option value="<?php echo $jrs->nama_jurusan ?>"><?php echo $jrs->nama_jurusan; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php echo form_error('nama_jurusan', '<div class="text-danger small" ml-3>') ?>
                    </div>
                    <div class="form-group">
                        <label for="">Foto</label><br>
                        <input type="file" name="foto">
                    </div>
                    <a href="<?php echo base_url('administrator/mahasiswa') ?>" class="btn btn-sm mb-1 btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-sm mb-1 btn-primary">Simpan</button>
                    <?php form_close(); ?>
                </div>-->


            </div>
        </section>
        </div>