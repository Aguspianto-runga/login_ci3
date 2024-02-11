        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid alert" role="alert">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><i class="fas fa-book"></i> Detail Mata Kuliah</h1>
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




<table class="table table-bordered table-hover">
    <?php foreach ($detail as $dt) : ?>
        <tr>
            <th style="width: 25%">Kode Mata Kuliah</th>
            <td><?php echo $dt->kode_matakuliah; ?></td>
        </tr>
        <tr>
            <th>Nama Mata Kuliah</th>
            <td><?php echo $dt->nama_matakuliah; ?></td>
        </tr>
        <tr>
            <th>SKS</th>
            <td><?php echo $dt->sks; ?></td>
        </tr>
        <tr>
            <th>Semester</th>
            <td><?php echo $dt->semester; ?></td>
        </tr>
        <tr>
            <th>Jurusan</th>
            <td><?php echo $dt->nama_jurusan; ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<a href="<?php echo base_url('administrator/matakuliah')?>" class="btn btn-sm mb-1 btn-secondary">Kembali</a>




</div>
</section>
</div>