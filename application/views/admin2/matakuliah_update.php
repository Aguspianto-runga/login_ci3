        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid alert bg-gradient-cyan" role="alert">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><i class="fas fa-book"></i> Ubah Mata Kuliah</h1>
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




<?php foreach($matakuliah as $mk) : ?>
    <form method="post" action="<?php echo base_url('administrator/matakuliah/update_aksi') ?>">
        <div class="form-group">
            <label>Nama Mata Kuliah</label>
            <input type="hidden" name="kode_matakuliah" class="form-control"  value="<?php echo $mk->kode_matakuliah ?>">
            <input type="text" name="nama_matakuliah" class="form-control" value="<?php echo $mk->nama_matakuliah ?>">
        </div>
        <div class="form-group">
            <label>SKS</label>
            <select name="sks" class="form-control">
                <option value="<?php echo $mk->sks ?>"><?php echo $mk->sks; ?></option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
            </select>
        </div>
        <div class="form-group">
            <label>Semester</label>
            <select name="semester" class="form-control">
                <option value="<?php echo $mk->semester ?>"><?php echo $mk->semester; ?></option>
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
            <label>Jurusan</label>
            <select name="nama_jurusan" class="form-control">
                <option value="<?php echo $mk->nama_jurusan ?>"><?php echo $mk->nama_jurusan; ?></option>
                <?php foreach ($jurusan as $jrs): ?>
                    <option value="<?php echo $jrs->nama_jurusan ?>"><?php echo $jrs->nama_jurusan; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <a href="<?php echo base_url('administrator/matakuliah') ?>" class="btn btn-sm mb-1 btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-sm mb-1 btn-primary">Simpan</button>
    </form>
<?php endforeach; ?>





</div>
</section>
</div>