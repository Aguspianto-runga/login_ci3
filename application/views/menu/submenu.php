<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-folder-open"></i> <?= $title; ?></h1>
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

            <div class="col-lg-15">
                <div class="row">
                    <div class="col">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-sm btn-outline-primary mb-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            Tambah Data <i class="fas fa-plus"></i>
                        </button>
                    </div>
                    <div class="col sm-6 text-right">
                            <input type="text" id="inputPencarian" onkeyup="cariTitle()" placeholder="Cari title...."><br><br>
                    </div>
                </div>
                <table class="table dataTable table-hover" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Menu</th>
                            <th>Url</th>
                            <th>Icon</th>
                            <th>Active</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($subMenu as $sm) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $sm['title']; ?></td>
                                <td><?= $sm['menu']; ?></td>
                                <td><?= $sm['url']; ?></td>
                                <td>
                                    <i class="<?= $sm['icon']; ?>"> </i>
                                    (<?= $sm['icon']; ?>)
                                </td>
                                <td><?= $sm['is_active']; ?></td>
                                <td>
                                    <?= anchor('menu/edit_submenu/' .$sm['id'], '<div class="btn btn-sm btn-outline-success mb-1"><i class="fas fa-edit"></i></div>') ?>
                                    <a href="<?php echo base_url('menu/delete_submenu/' .$sm['id'], "") ?>" class="btn btn-outline-danger btn-sm mb-1" onclick="return confirm('Yakin menghapus data yg dipilih?');"><i class="fas fa-trash"></i></a>
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
                <form action="<?= base_url('menu/submenu'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <input type="text" name="title" class="form-control" id="title" placeholder="Title" required>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <select class="custom-select" name="menu_id" id="menu_id">
                                <?php foreach($menu as $m): ?>
                                    <option value="<?= $m['id']; ?>"><?= $m['menu']?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <input type="text" name="url" class="form-control" id="url" placeholder="URL" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <input type="text" name="icon" class="form-control" id="icon" placeholder="Menu icon" required>
                            </div>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="is_active" value="1" class="form-check-input" id="is_active" checked>
                            <label class="form-check-label" for="is_active">Active?</label>
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
            function cariTitle() {
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