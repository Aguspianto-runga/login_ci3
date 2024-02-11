        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid alert " role="alert">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><i class="fas fa-book"></i> Mata Kuliah</h1>
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

    <?= $this->session->flashdata('pesan'); ?>
    
    
    
                        <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <?php echo anchor('administrator/matakuliah/tambah_matakuliah', '<button class="btn btn-sm btn-primary mb-2"><i class="fas fa-plus"></i> Tambah Mata Kuliah</button>') ?>
                            <!-- Button trigger modal -->
                        <button type="button" class="btn btn-outline-info btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            <i class="fas fa-plus"></i> Tambah Data
                        </button>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <!--<div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="dataTables_length" id="dataTable_length">
                                                <label>Show entries
                                                    <select name="dataTable_length" aria-controls="dataTable" class="custom-select custom-select-sm form-control form-control-sm">
                                                        <option value="10">10</option>
                                                        <option value="25">25</option>
                                                        <option value="50">50</option>
                                                        <option value="100">100</option>
                                                    </select>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div id="dataTable_filter" class="dataTables_filter">
                                                <label>Search:
                                                    <input type="search" class="form-control form-control-sm" placeholder="" aria-controls="dataTable">
                                                </label>
                                            </div>
                                        </div>
                                    </div>-->
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table dataTable table-hover" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 55px;">No</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 62px;">Kode</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 48px;">Mata Kuliah</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 30px;">Jurusan</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 30px;">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    $no = 1;
                                                    foreach($matakuliah as $mk): ?>
                                                    <tr>
                                                        <td width="20px"><?php echo $no++ ?></td>
                                                        <td><?php echo $mk->kode_matakuliah ?></td>
                                                        <td><?php echo $mk->nama_matakuliah ?></td>
                                                        <td><?php echo $mk->nama_jurusan ?></td>
                                                        <td width="20%">
                                                            <?php echo anchor('administrator/matakuliah/detail/' . $mk->kode_matakuliah, '<div class="btn btn-sm btn-primary mb-1"><i class="fas fa-list"></i></div>')?>
                                                            <?php echo anchor('administrator/matakuliah/update/' . $mk->kode_matakuliah, '<div class="btn btn-sm btn-success mb-1"><i class="fas fa-edit"></i></div>')?>
                                                            <a href="<?php echo base_url('administrator/matakuliah/delete/' . $mk->kode_matakuliah . "")?>" class="btn btn-danger btn-sm mb-1" onclick="return confirm('Anda yakin menghapus data yg anda pilih?');"><i class="fas fa-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        </div>




</div>
</section>
</div>















<!-- Modal tambah data -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel"><b>Tambah Mahasiswa</b></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <?php echo form_open_multipart('administrator/matakuliah/tambah_matakuliah_aksi') ?>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Kode Matakuliah</label>
                            <input type="text" name="kode_matakuliah" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Matakuliah</label>
                            <input type="text" name="nama_matakuliah" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">SKS</label>
                            <input type="text" name="sks" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Semester</label>
                            <select class="custom-select" name="semester">
                                <option value="">Pilih Semester</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                            </select>
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
                           
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <a href="<?php echo base_url('administrator/mahasiswa') ?>" class="btn btn-sm mb-1 btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-sm mb-1 btn-primary">Simpan</button>
                    </div>
                <?php echo form_close(); ?>

                </div>
            </div>
        </div>