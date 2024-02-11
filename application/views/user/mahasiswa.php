 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1><?= $title; ?></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active"><?= $title; ?></li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">






                <?= $this->session->flashdata('pesan'); ?>

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="row">
                            <div class="col sm-6 text-left">
                                <!-- Button trigger modal
                                <button type="button" class="btn btn-outline-info btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    <i class="fas fa-plus"></i> Tambah Data
                                </button> -->
                                <?php echo anchor('admin/input_mahasiswa', '<button class="btn btn-sm btn-outline-primary mb-2"><i class="fas fa-plus"></i> Tambah Mahasiswa</button>') ?>
                            </div>
                            <!-- Input Cari Nama -->
                            <div class="col sm-6 text-right">
                                <input type="text" id="inputPencarian" onkeyup="cariMahasiswa()" placeholder="Cari nama mahasiswa...."><br><br>
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
                                                                <img class="profile-user-img rounded-circle" style="width: 60px;" src="<?php echo base_url('assets/img/') . $mhs->foto; ?>" alt="Picture">
                                                            </td>
                                                            <td><?php echo $mhs->nama_jurusan ?></td>
                                                            <td width="20%">
                                                                <?php echo anchor('user/detail/' .$mhs->id, '<div class="btn btn-sm btn-outline-primary mb-1"><i class="fas fa-list"></i></div>') ?>
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
                    <p class="ml-5">total </p>
                </div>






        </div><!-- /.container-fluid -->
    </section><!-- /.content -->











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