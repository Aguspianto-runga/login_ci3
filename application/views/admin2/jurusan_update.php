       <!-- Content Header (Page header) -->
       <div class="content-header">
        <div class="container-fluid alert" role="alert">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><i class="fas fa-university"></i> Update Jurusan</h1>
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


<?php foreach($jurusan as $jrs) : ?>
    <form method="post" action="<?php echo base_url('administrator/jurusan/update_aksi') ?>">
        <div class="form-group">
            <label>Kode Jurusan</label>
            <input type="hidden" name="id_jurusan" value="<?php echo $jrs->id_jurusan ?>">
            <input type="text" name="kode_jurusan" class="form-control" value="<?php echo $jrs->kode_jurusan ?>">
        </div>
        <div class="form-group">
            <label>Nama Jurusan</label>
            <input type="text" name="nama_jurusan" class="form-control" value="<?php echo $jrs->nama_jurusan ?>">
        </div>
        <a href="<?php echo base_url('administrator/jurusan') ?>" class="btn btn-sm mb-1 btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-sm mb-1 btn-primary">Simpan</button>
    </form>
<?php endforeach; ?>



</div>
</section>
</div>