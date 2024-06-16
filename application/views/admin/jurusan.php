<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-university"></i> <?= $title; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><?= $title; ?></li> -->
                        <li class="breadcrumb-item active"><i class="fas fa-calendar-alt"></i> <?= date('d F Y'); ?></li>
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
                                <button type="button" class="btn btn-outline-primary btn-sm mb-2" data-toggle="modal" data-target="#inputModal">
                                    Tambah Jurusan <i class="fas fa-plus"></i>
                                </button>
                                <?php echo anchor('admin/input_jurusan', '<button class="btn btn-sm btn-outline-primary mb-2"><i class="fas fa-plus"></i> Tambah Data</button>') ?>
                            </div>
                            <!-- Input Cari Nama -->
                            <div class="col sm-6 text-right">
                                <input type="text" id="inputPencarian" onkeyup="cariJurusan()" placeholder="Cari nama jurusan...."><br><br>
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
                                                        <th>Kode Jurusan</th>
                                                        <th>Nama Jurusan</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    foreach ($jurusan as $jrs) : ?>
                                                        <tr>
                                                            <td width="20px"><b><?php echo $no++ ?></b></td>
                                                            <td><?php echo $jrs->kode_jurusan ?></td>
                                                            <td><?php echo $jrs->nama_jurusan ?></td>
                                                            <td width="20%">
                                                                <?php echo anchor('admin/update_jurusan/' . $jrs->id_jurusan, '<div class="btn btn-sm btn-outline-success mb-1"><i class="fas fa-edit"></i></div>') ?>
                                                                <a href="<?php echo base_url('admin/delete_jurusan/' . $jrs->id_jurusan, "") ?>" class="btn btn-outline-danger btn-sm mb-1" onclick="return confirm('Yakin menghapus data yg dipilih?');"><i class="fas fa-trash"></i></a>
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
    </section>
    <!-- /.content -->






    <!-- Modal Tambah Jurusan -->
    <div class="modal fade" id="inputModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel"><i class="fas fa-university"></i> Input Jurusan</h4>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?php echo base_url('admin/jurusan_input_aksi') ?>">
                        <div class="form-group">
                            <label for="">Kode Jurusan</label>
                            <input type="text" name="kode_jurusan" id="" palceholder="Masukkan Kode Jurusan" class="form-control">
                            <?php echo form_error('kode_jurusan', '<div class="text-danger small" ml-3>') ?>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Jurusan</label>
                            <input type="text" name="nama_jurusan" id="" palceholder="Masukkan Nama Jurusan" class="form-control">
                            <?php echo form_error('nama_jurusan', '<div class="text-danger small" ml-3>') ?>
                        </div>
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal <i class=" glyphicon glyphicon-remove"></i></button>
                        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>





    <script>
        // scrip cari nama tabel
        function cariJurusan() {
            // Deklarasi variabel
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("inputPencarian");
            filter = input.value.toUpperCase();
            table = document.getElementById("dataTable");
            tr = table.getElementsByTagName("tr");

            // Loop melalui semua baris tabel, sembunyikan yang tidak sesuai
            for (i = 0; i < tr.length; i++) {
                tdNama = tr[i].getElementsByTagName("td")[2]; // Kolom Nama yg dicari
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