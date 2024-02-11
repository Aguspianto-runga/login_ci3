        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid alert" role="alert">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class=""><i class="fas fa-home"></i> Dashboard</h1>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </div><!-- /.content-header -->



        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">


            <div class="row">
              <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-info">
                  <div class="inner">
                    <h3>109</h3>

                    <p>Jumlah Mahasiswa</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-user-graduate"></i>
                  </div>
                  <a href="<?= base_url('administrator/mahasiswa'); ?>" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-success">
                  <div class="inner">
                    <h3>53</h3>
                    <p>Jurusan</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-university"></i>
                  </div>
                  <a href="<?= base_url('administrator/jurusan'); ?>" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-danger">
                  <div class="inner">
                    <!--<h3>65<sup style="font-size: 20px">%</sup></h3>-->
                    <h3>65</h3>
                    <p>Mata Kuliah</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-book-open"></i>
                  </div>
                  <a href="<?= base_url('administrator/matakuliah')?>" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-warning">
                  <div class="inner">
                    <h3>44</h3>
                    <p>Dosen</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-users"></i>
                  </div>
                  <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>
              <!-- ./col -->
            </div>


            <!-- Basic Card Example -->
            <div class="card shadow mt-2 mb-4">
              <div class="card-header bg-gradient-light py-3">
                <h4 class="m-0 font-weight-bold">Selamat Datang!</h4>
                <div class="ribbon-wrapper">
                  <div class="ribbon bg-primary">
                    Pian
                  </div>
                </div>
              </div>
              <div class="card-body">
                <p>Selamat datang <strong><?= $user['name']; ?></strong> di sistem
                  informasi akademik Universitas Prindavan, Anda login sebagai <strong><?= $user_role['role']; ?></strong>
                </p>
                <p class="text-muted">
                  Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                  Veniam error voluptas tempora earum tempore, consectetur veritatis quam molestias aliquam,
                  tenetur ex, est voluptatibus assumenda magni sapiente. Saepe optio necessitatibus doloremque
                  consequatur quia in, exercitationem dignissimos libero quasi ea, hic, dolorem itaque
                  perspiciatis atque dolore mollitia natus est quaerat omnis soluta sapiente doloribus? Esse
                  delectus aperiam voluptatum a minima nesciunt ducimus omnis iste, inventore nam,
                  harum molestias sunt ullam eveniet numquam similique, quis quidem? Earum veritatis adipisci
                  cupiditate sint, assumenda alias quasi eligendi non voluptatibus tempora repellat. Deleniti
                  voluptates et voluptate magnam neque,
                  dignissimos ipsam ab reiciendis iste labore temporibus. Quasi.
                </p>
                <!-- Button trigger modal  -->
                <button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#exampleModal">
                  <i class="fas fa-cogs"></i> Control Panel <em>(Modal)</em>
                </button>
                <!-- <a class="btn btn-info btn-sm" href="<?php echo base_url('administrator/control_panel') ?>" role="button"><i class="fas fa-cogs"></i> Control Panel</a> -->
              </div>
            </div>


            <div class="col-md-7">
              <div class="card">
                <div class="card-header bg-gradient-light">
                  <h5 class="font-weight-bold">Gallery</h5>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                      <li data-target="#carouselExampleIndicators" data-slide-to="0" class=""></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="1" class=""></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="2" class="active"></li>
                    </ol>
                    <div class="carousel-inner">
                      <div class="carousel-item">
                        <img class="d-block w-100" src="<?php echo base_url('assets/img/73.jpg'); ?>" alt="First slide">
                      </div>
                      <div class="carousel-item">
                        <img class="d-block w-100" src="<?php echo base_url('assets/img/851.jpg'); ?>" alt="Second slide">
                      </div>
                      <div class="carousel-item active">
                        <img class="d-block w-100" src="<?php echo base_url('assets/img/1621.jpg'); ?>" alt="Third slide">
                      </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                      <span class="carousel-control-custom-icon" aria-hidden="true">
                        <i class="fas fa-chevron-left"></i>
                      </span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                      <span class="carousel-control-custom-icon" aria-hidden="true">
                        <i class="fas fa-chevron-right"></i>
                      </span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
                </div><!-- /.card-body -->
              </div><!-- /.card -->
            </div>


          </div>
        </section>
        </div>









        <!-- Modal Control panel -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel"><i class="fas fa-cogs"></i> Control Panel</h4>
              </div>
              <div class="container align-content-center">
                <div class="container-fluid mt-2">




                  <div class="row">
                    <div class="col-lg-3 col-6">
                      <!-- small box -->
                      <div class="small-box bg-info">
                        <div class="inner">
                          <h3>1.</h3>
                          <br>
                        </div>
                        <div class="icon">
                          <i class="fas fa-calendar"></i>
                        </div>
                        <a href="<?php echo base_url('administrator/tahun_akademik'); ?>" class="small-box-footer">Tahun Akademik </a>
                      </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                      <!-- small box -->
                      <div class="small-box bg-info">
                        <div class="inner">
                          <h3>2.</h3>
                          <br>
                        </div>
                        <div class="icon">
                          <i class="fas fa-file"></i>
                        </div>
                        <a href="<?php echo base_url('administrator/krs'); ?>" class="small-box-footer">KRS </a>
                      </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                      <!-- small box -->
                      <div class="small-box bg-info">
                        <div class="inner">
                          <h3>3.</h3>
                          <br>
                        </div>
                        <div class="icon">
                          <i class="fas fa-book"></i>
                        </div>
                        <a href="#" class="small-box-footer">KHS</a>
                      </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                      <!-- small box -->
                      <div class="small-box bg-info">
                        <div class="inner">
                          <h3>4.</h3>
                          <br>
                        </div>
                        <div class="icon">
                          <i class="fas fa-user-graduate"></i>
                        </div>
                        <a href="<?php echo base_url('administrator/mahasiswa'); ?>" class="small-box-footer">Mahasiswa</a>
                      </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                      <!-- small box -->
                      <div class="small-box bg-info">
                        <div class="inner">
                          <h3>5.</h3>
                          <br>
                        </div>
                        <div class="icon">
                          <i class="fas fa-list-ol"></i>
                        </div>
                        <a href="#" class="small-box-footer">Input Nilai</a>
                      </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                      <!-- small box -->
                      <div class="small-box bg-info">
                        <div class="inner">
                          <h3>6.</h3>
                          <br>
                        </div>
                        <div class="icon">
                          <i class="fas fa-print"></i>
                        </div>
                        <a href="#" class="small-box-footer">Cetak Transkrip</a>
                      </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                      <!-- small box -->
                      <div class="small-box bg-info">
                        <div class="inner">
                          <h3>7.</h3>
                          <br>
                        </div>
                        <div class="icon">
                          <i class="fas fa-filter"></i>
                        </div>
                        <a href="#" class="small-box-footer">Kategori</a>
                      </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                      <!-- small box -->
                      <div class="small-box bg-info">
                        <div class="inner">
                          <h3>8.</h3>
                          <br>
                        </div>
                        <div class="icon">
                          <i class="fas fa-info"></i>
                        </div>
                        <a href="#" class="small-box-footer">Info Kampus</a>
                      </div>
                    </div>
                    <!-- ./col -->

                    <div class="col-lg-3 col-6">
                      <!-- small box -->
                      <div class="small-box bg-info">
                        <div class="inner">
                          <h3>9.</h3>
                          <br>
                        </div>
                        <div class="icon">
                          <i class="fas fa-id-card"></i>
                        </div>
                        <a href="#" class="small-box-footer">Identitas</a>
                      </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                      <!-- small box -->
                      <div class="small-box bg-info">
                        <div class="inner">
                          <h3>10.</h3>
                          <br>
                        </div>
                        <div class="icon">
                          <i class="fas fa-building"></i>
                        </div>
                        <a href="#" class="small-box-footer">Fasilitas</a>
                      </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                      <!-- small box -->
                      <div class="small-box bg-info">
                        <div class="inner">
                          <h3>11.</h3>
                          <br>
                        </div>
                        <div class="icon">
                          <i class="fas fa-image"></i>
                        </div>
                        <a href="#" class="small-box-footer">Gallery</a>
                      </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                      <!-- small box -->
                      <div class="small-box bg-info">
                        <div class="inner">
                          <h3>12.</h3>
                          <br>
                        </div>
                        <div class="icon">
                          <i class="fas fa-university"></i>
                        </div>
                        <a href="#" class="small-box-footer">Tentang Kampus</a>
                      </div>
                    </div>
                    <!-- ./col -->
                  </div>



                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                </div>
              </div>
            </div>
          </div>
        </div>