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
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    Tambah Data <i class="fas fa-plus"></i>
                                </button>
                                <!-- <?php echo anchor('admin/input_matakuliah', '<button class="btn btn-sm btn-outline-primary"><i class="fas fa-plus"></i> Tambah Data</button>') ?> -->
                            </div>
                            <!-- Input Cari Nama -->
                            <div class="col sm-6 text-right">
                                <input type="text" id="inputPencarian" onkeyup="cariMatakuliah()" placeholder="Cari matakuliah...."><br><br>
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
                                                        <th>Kode</th>
                                                        <th>Nama</th>
                                                        <th>SKS</th>
                                                        <th>Semester</th>
                                                        <th>Jurusan</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    foreach ($matakuliah as $mk) : ?>
                                                        <tr>
                                                            <td width="20px"><b><?= $no++ ?></b></td>
                                                            <td><?= $mk->kode_matakuliah ?></td>
                                                            <td><?= $mk->nama_matakuliah ?></td>
                                                            <td><?= $mk->sks ?></td>
                                                            <td><?= $mk->semester ?></td>
                                                            <td><?= $mk->nama_jurusan ?></td>
                                                            <td width="20%">
                                                                <?= anchor('admin/update_matakuliah/' .$mk->kode_matakuliah, '<div class="btn btn-sm btn-outline-success  mb-1"><i class="fas fa-edit"></i></div>') ?>
                                                                <a href="<?= base_url('admin/delete_matakuliah/' .$mk->kode_matakuliah ,"") ?>" class="btn btn-outline-danger btn-sm mb-1" onclick="return confirm('Yakin menghapus data yg dipilih?');"><i class="fas fa-trash"></i></a>
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





    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('admin/matakuliah'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Kode</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                <input type="text" name="kode_matakuliah" class="form-control" id="menu" placeholder="Menu name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Matakuliah</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-book-open"></i></span>
                                <input type="text" name="nama_matakuliah" class="form-control" id="menu" placeholder="Menu name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">SKS</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-list-ol"></i></span>
                                <input type="text" name="sks" class="form-control" id="menu" placeholder="Menu name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Semester</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                <input type="text" name="semester" class="form-control" id="menu" placeholder="Menu name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Jurusan</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                <input type="text" name="nama_jurusan" class="form-control" id="menu" placeholder="Menu name" required>
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
            function cariMatakuliah() {
                // Deklarasi variabel
                var input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("inputPencarian");
                filter = input.value.toUpperCase();
                table = document.getElementById("dataTable");
                tr = table.getElementsByTagName("tr");

                // Loop melalui semua baris tabel, sembunyikan yang tidak sesuai
                for (i = 0; i < tr.length; i++) {
                    tdNama = tr[i].getElementsByTagName("td")[2]; // Kolom Nama
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