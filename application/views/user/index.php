<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-user"></i> <?= $title; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><?= $title; ?></li> -->
                        <li class="breadcrumb-item active"><i class="fas fa-calendar-alt"></i> <?= date('d F Y');?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="user" style="width: auto;">
                <!-- Widget: user widget style 1 -->
                <div class="card card-widget widget-user shadow">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-info">
                        <h3 class="widget-user-username animation__shake"><?= $user['name']; ?></h3>
                        <h5 class="widget-user-desc animation__shake"><?= $user['email']; ?></h5>
                    </div>
                    <div class="widget-user-image">
                        <img class="img-circle elevation-2" src="<?= base_url('assets/img/'). $user['image']; ?>" alt="User Avatar">
                    </div>
                    <div class="card-footer">
                        <?php echo anchor('user/edit/' .$user['id'], '<div class="btn btn-sm btn-outline-primary mb-1"><i class="fas fa-user-edit"></i> Edit Profile</div>') ?>
                        <p class="card-text mt-1">
                            Selamat datang <b><?= $user['name']; ?></b>, Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias accusamus dolores temporibus,
                            ullam iure est cumque rem aperiam aliquam fuga commodi blanditiis eveniet numquam delectus
                            maiores nulla hic, neque exercitationem.
                        </p>
                        <p class="card-text text-muted text-md-right">
                            <small>
                                <marquee behavior="" direction="">
                                    Bergabung sejak <?= date('d F Y', $user['date_created']); ?>
                                </marquee>
                            </small>
                        </p>
                    </div>
                </div>
                <!-- /.widget-user -->
            </div>
            <!-- /.col -->


            <h5 class="mb-2">Card with Image Overlay</h5>
            <div class="card card-success">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-6 col-xl-4">
                            <div class="card mb-2 bg-gradient-dark">
                                <img class="card-img-top" src="<?= base_url('assets'); ?>/dist/img/photo1.png" alt="Dist Photo 1">
                                <div class="card-img-overlay d-flex flex-column justify-content-end">
                                    <h5 class="card-title text-primary text-white">Card Title</h5>
                                    <p class="card-text text-white pb-2 pt-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod tempor.</p>
                                    <a href="#" class="text-white">Last update 2 mins ago</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6 col-xl-4">
                            <div class="card mb-2">
                                <img class="card-img-top" src="<?= base_url('assets'); ?>/dist/img/photo2.png" alt="Dist Photo 2">
                                <div class="card-img-overlay d-flex flex-column justify-content-center">
                                    <h5 class="card-title text-white mt-5 pt-2">Card Title</h5>
                                    <p class="card-text pb-2 pt-1 text-white">
                                        Lorem ipsum dolor sit amet, <br>
                                        consectetur adipisicing elit <br>
                                        sed do eiusmod tempor.
                                    </p>
                                    <a href="#" class="text-white">Last update 15 hours ago</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6 col-xl-4">
                            <div class="card mb-2">
                                <img class="card-img-top" src="<?= base_url('assets'); ?>/dist/img/photo3.jpg" alt="Dist Photo 3">
                                <div class="card-img-overlay">
                                    <h5 class="card-title text-primary">Card Title</h5>
                                    <p class="card-text pb-1 pt-1 text-white">
                                        Lorem ipsum dolor <br>
                                        sit amet, consectetur <br>
                                        adipisicing elit sed <br>
                                        do eiusmod tempor. </p>
                                    <a href="#" class="text-primary">Last update 3 days ago</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->