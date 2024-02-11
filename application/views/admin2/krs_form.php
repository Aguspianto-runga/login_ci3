
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid alert alert-default-primary bg-gradient-cyan" role="alert">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-white"><i class="fas fa-file"></i> Kartu Rencana Studi (KRS)</h1>
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





<form method="post" action="<?php echo base_url('administrator/krs/tambah_krs_aksi') ?>">
    <div class="form-group">
        <label>Tahun Akademik</label>
        <input type="hidden" name="id_thn_akad" class="form-control" value="<?php echo $id_thn_akad; ?>">
        <input type="hidden" name="id_krs" class="form-control" value="<?php echo $id_krs; ?>">
        <input type="text" name="thn_akad_smt" class="form-control" value="<?php echo $thn_akad_smt. '/' .$semester; ?>" readonly/>
    </div>
    <div class="form-group">
        <label>NIM Mahasiswa</label>
        <input type="text" name="nim" class="form-control" value="<?php echo $nim; ?>" readonly/>
    </div>
    <div class="form-group">
        <label>Matakuliah</label>
        <?php 
            $query = $this->db->query('SELECT kode_matakuliah,nama_matakuliah FROM matakuliah');
            $dropdowns = $query->result();
            foreach($dropdowns as $dropdown) {
                $dropDownList[$dropdown->kode_matakuliah] = $dropdown->nama_matakuliah;
            }
            echo form_dropdown('kode_matakuliah', $dropDownList, $kode_matakuliah, 'class="form-control" id="kode_matakuliah"');
        ?>
    </div>
    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
    <?php echo anchor('administrator/krs/krs_aksi', '<div class="btn btn-danger btn-sm"> Batal </div>') ?>
</form>




</div>
</section>
</div>