       <!-- Content Header (Page header) -->
       <div class="content-header">
        <div class="container-fluid alert bg-gradient-cyan" role="alert">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-white"><i class="fas fa-file"></i> Form Masuk Halaman KRS</h1>
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

        <!-- Basic Card Example -->
        <div class="card shadow mb-4 m-auto" style="width: 70%;">
            <div class="card-body">
                <form method="post" action="<?php echo base_url('administrator/krs/krs_aksi') ?>">
                    <div class="form-group">
                        <label>NIM Mahasiswa</label>
                        <input type="text" name="nim" class="form-control" placeholder="Masukkan NIM">
                        <?php echo form_error('nim', '<div class="text-danger small ml-2">','</div>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Tahun Akademik/Semester</label>
                        <?php 
                        $query = $this->db->query('SELECT id_thn_akad, semester, CONCAT(tahun_akademik,"/") AS thn_semester FROM tahun_akademik');
                        $dropdowns = $query->result();

                        foreach($dropdowns as $dropdown){
                            if($dropdown->semester == 'Ganjil'){
                                $tampilSemester = "Ganjil";
                            }else if ($dropdown->semester =='Genap') {
                                $tampilSemester = "Genap";
                            }
                            $dropDownList[$dropdown->id_thn_akad] = $dropdown->thn_semester . " " . $tampilSemester;
                        }
                        echo form_dropdown('id_thn_akad', $dropDownList, '', 'class="form-control" id="id_thn_akad"');
                        ?>
                    </div>
                        <button type="submit" class="btn btn-sm btn-primary">Proses</button>
                </form>
            </div>
        </div>





</div>
</section>
</div>