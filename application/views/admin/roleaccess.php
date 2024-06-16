<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-cogs"></i> <?= $title; ?></h1>
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
                        <h5>Role: <?= $role['role']; ?></h5>
                    </div>
                    <div class="col sm-6 text-right">
                        <input type="text" id="inputPencarian" onkeyup="cariMenu()" placeholder="Cari role..."><br><br>
                    </div>
                </div>
                    <table class="table dataTable table-hover" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Menu</th>
                            <th>Access</th>
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
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" <?= check_access($role['id'], $m['id']); ?> data-role="<?= $role['id']?>" data-menu="<?= $m['id']?>">
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="button">
                    <a href="<?= base_url('admin/role')?>" class="btn btn-outline-secondary">Kembali</a>
                </div>
            </div>



        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->











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