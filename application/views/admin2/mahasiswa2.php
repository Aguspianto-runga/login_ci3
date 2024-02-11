
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
      <?= $this->session->flashdata('pesan'); ?>

<button type="button" class="btn btn-success swalDefaultSuccess">
                  Launch Success Toast
              </button>
              <button type="button" class="btn btn-default toastsDefaultAutohide">
                                                Launch Default Toasts with autohide
                                            </button>
                                            <button type="button" class="btn btn-info toastsDefaultInfo">
  Launch Info Toast
</button>
<button type="button" class="btn btn-warning toastrDefaultWarning">
  Launch Warning Toast
</button>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-outline-info btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            <i class="fas fa-plus"></i> Tambah Data
        </button>
        <?php echo anchor('administrator/mahasiswa/tambah_mahasiswa', '<button class="btn btn-sm btn-primary mb-2"><i class="fas fa-plus"></i> Tambah Mahasiswa</button>') ?>
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
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>NIM</th>
                                        <th>Foto</th>
                                        <th>Jurusan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($mahasiswa as $mhs) : ?>
                                        <tr>
                                            <td width="20px"><b><?php echo $no++ ?></b></td>
                                            <td><?php echo $mhs->nama ?></td>
                                            <td><?php echo $mhs->nim ?></td>
                                            <td>
                                                <img class="profile-user-img rounded-circle" style="width: 60px;" src="<?php echo base_url('assets/img/') . $mhs->foto; ?>" alt="User profile picture">
                                            </td>
                                            <td><?php echo $mhs->nama_jurusan ?></td>
                                            <td width="20%">
                                                <?php echo anchor('administrator/mahasiswa/detail/' . $mhs->id, '<div class="btn btn-sm btn-outline-primary mb-1"><i class="fas fa-list"></i></div>') ?>
                                                <?php echo anchor('administrator/mahasiswa/update/' . $mhs->id, '<div class="btn btn-sm btn-outline-success mb-1"><i class="fas fa-edit"></i></div>') ?>
                                                <a href="<?php echo base_url('administrator/mahasiswa/delete/' . $mhs->id . "") ?>" class="btn btn-outline-danger btn-sm mb-1" onclick="return confirm('Anda yakin menghapus data yg anda pilih?');"><i class="fas fa-trash"></i></a>
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
<p>total </p>
      </div>
      <!-- /.modal -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  