        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid alert" role="alert">
                <div class="row">
                    <div class="col-sm-6">
                        <h1 class="m-0"><i class="fas fa-user-graduate"></i> Mahasiswa</h1>
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
                        <div class="row">
                            <div class="col sm-6 text-left">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-outline-info btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    <i class="fas fa-plus"></i> Tambah Data
                                </button>
                                <!--<?php echo anchor('administrator/mahasiswa/tambah_mahasiswa', '<button class="btn btn-sm btn-primary mb-2" ><i class="fas fa-plus"></i> Tambah Mahasiswa</button>') ?>-->
                            </div>
                            <div class="col sm-6 text-right">
                                <input type="text" id="inputPencarian" onkeyup="cariMahasiswa()" placeholder="Cari nama..."><br><br>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
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
                                                                <a href="<?php echo base_url('administrator/mahasiswa/delete/' . $mhs->id . "") ?>" class="btn btn-outline-danger btn-sm mb-1" onclick="return confirm('Yakin menghapus data yg dipilih?');"><i class="fas fa-trash"></i></a>
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
        </section>
        </div>















        <!-- Modal tambah data -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel"><b>Tambah Mahasiswa</b></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <?php echo form_open_multipart('administrator/mahasiswa/tambah_mahasiswa_aksi') ?>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">NIM</label>
                                    <input type="text" name="nim" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Mahasiswa</label>
                                    <input type="text" name="nama" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" name="email" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Alamat</label>
                                    <input type="text" name="alamat" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="">No. Telpon</label>
                                    <input type="text" name="telpon" class="form-control" required>
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
        </div>






        
        <script>    
        // scrip cari nama tabel
            function cariMahasiswa() {
                // Deklarasi variabel
                var input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("inputPencarian");
                filter = input.value.toUpperCase();
                table = document.getElementById("dataTable");
                tr = table.getElementsByTagName("tr");

                // Loop melalui semua baris tabel, sembunyikan yang tidak sesuai
                for (i = 0; i < tr.length; i++) {
                    tdNama = tr[i].getElementsByTagName("td")[1]; // Kolom Nama
                    if (tdNama) {
                        txtValue = tdNama.textContent || tdNama.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                }
            }
        </script>