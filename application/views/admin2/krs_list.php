        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid alert bg-gradient-cyan" role="alert">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><i class="fas fa-file"></i> Kartu Rencana Studi (KRS)</h1>
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


    <center class="mb-3">
        <legend class="mt-3"><b>KARTU RENCANA STUDI</b></legend>

            <table>
                <tr>
                    <td><strong>NIM</strong></td>
                    <td>&nbsp;: <?php echo $nim ?></td>
                </tr>
                <tr>
                    <td><strong>Nama</strong></td>
                    <td>&nbsp;: <?php echo $nama ?></td>
                </tr>
                <tr>
                    <td><strong>Jurusan</strong></td>
                    <td>&nbsp;: <?php echo $jurusan ?></td>
                </tr>
                <tr>
                    <td><strong>Tahun Akademik (Semester)</strong></td>
                    <td>&nbsp;: <?php echo $tahun_akademik.'&nbsp;('.$semester.')'; ?></td>
                </tr>
            </table>
    </center>

        <?php echo anchor('administrator/krs/tambah_krs/'.$nim.'/'.$id_thn_akad, '<button class="btn btn-sm btn-outline-primary mb-2"><i class="fas fa-plus"></i> Tambah Data KRS</button>') ?> 
        <?php echo anchor('administrator/krs/print', '<button class="btn btn-sm btn-outline-info mb-2 ml-1"><i class="fas fa-plus"></i> Print</button>') ?>

    <table class="table dataTable table-hover" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Matakuliah</th>
                <th>Nama Matakuliah</th>
                <th>SKS</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no =1;
            $JumlahSks = 0;
            foreach($krs_data as $krs): ?>
            <tr>
                <td width="20px"><?php echo $no++ ?></td>
                <td><?php echo $krs->kode_matakuliah ?></td>
                <td><?php echo $krs->nama_matakuliah ?></td>
                <td>
                    <?php echo $krs->sks;
                            $JumlahSks+=$krs->sks ;?>
                </td>
                <td width="20%">
                    <?php echo anchor('administrator/krs/update/' . $krs->id_krs, '<div class="btn btn-sm btn-success mb-1"><i class="fas fa-edit"></i></div>')?>
                    <a href="<?php echo base_url('administrator/krs/delete/' . $krs->id_krs . "")?>" class="btn btn-danger btn-sm mb-1" onclick="return confirm('Anda yakin menghapus data yg anda pilih?');"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
            
            <?php endforeach; ?>
            <tr>
                <td colspan="3"><h6><b>Jumlah SKS: </b></h6></td>
                <td colspan="2"><b><?php echo $JumlahSks; ?></b></td>
            </tr>
        </tbody>
    </table>

    <a href="<?php echo base_url('administrator/krs') ?>" class="btn btn-sm mt-1 mb-3 btn-outline-secondary">Kembali</a>
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