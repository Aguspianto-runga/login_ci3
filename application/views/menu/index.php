<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-folder"></i> <?= $title; ?></h1>
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

            <?= $this->session->flashdata('message'); ?>

            <div class="col-lg-8">
                <div class="row">
                    <div class="col sm-6 text-left">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            Tambah Data <i class="fas fa-plus"></i>
                        </button>
                    </div>
                    <div class="col sm-6 text-right">
                        <input type="text" id="inputPencarian" onkeyup="cariMenu()" placeholder="Cari nama menu...."><br><br>
                    </div>
                </div>
                    <table class="table dataTable table-hover" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Menu</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($menu as $m) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $m['menu']; ?></td>
                                <td>
                                    <?php echo anchor('menu/edit/' . $m['id'], '<div class="btn btn-sm btn-outline-success mb-1"><i class="fas fa-edit"></i></div>') ?>
                                    <a href="<?php echo base_url('menu/delete/' . $m['id'], "") ?>" class="btn btn-outline-danger btn-sm mb-1" onclick="return confirm('Yakin menghapus data yg dipilih?');"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>



        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->





    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('menu'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <input type="text" name="menu" class="form-control" id="menu" placeholder="Menu name" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
                        <!-- <a href="<?= base_url('menu/') ?>" class="btn btn-outline-danger">Back</a> -->
                    </div>
                </form>
            </div>
        </div>
    </div>











        <script>    
        // scrip cari nama tabel
            function cariMenu() {
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