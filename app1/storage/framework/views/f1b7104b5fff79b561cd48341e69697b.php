<?php $__env->startSection('title'); ?>
    PMB UBHI
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('navbar'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('navbar'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('menunya'); ?>
    Kartu Pendaftaran
<?php $__env->stopSection(); ?>

<?php $__env->startSection('menu'); ?>
    <?php if(auth()->guard()->check()): ?>
        <ul class="metismenu" id="menu">
            <li><a href="<?php echo e(route('dashboard')); ?>">
                    <i class="fas fa-home"></i>
                    <span class="nav-text">Beranda</span>
                </a>
            </li>
            <?php if(auth()->user()->role == 'Administrator'): ?>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="fa fa-book"></i>
                        <span class="nav-text">Data Master </span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="<?php echo e(route('data-user')); ?>">Pengguna</a></li>
                        <li><a href="<?php echo e(route('data-sekolah')); ?>">Sekolah</a></li>
                        <li><a href="<?php echo e(route('data-prodi')); ?>">Program Studi</a></li>
                        <li><a href="<?php echo e(route('data-jadwal')); ?>">Jadwal Kegiatan</a></li>
                    </ul>
                </li>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="fa fa-database"></i>
                        <span class="nav-text">Data Transaksi</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="<?php echo e(route('data-registration')); ?>">Pendaftaran</a></li>
                        <li><a href="<?php echo e(route('data-pembayaran')); ?>">Pembayaran</a></li>
                    </ul>
                </li>
                <li><a href="<?php echo e(route('data-pengumuman')); ?>" aria-expanded="false">
                        <i class="fa fa-file"></i>
                        <span class="nav-text">Pengumuman</span>
                    </a>
                </li>
            <?php else: ?>
                <li class="mm-active"><a href="<?php echo e(route('data-registration')); ?>" aria-expanded="false">
                        <i class="fa fa-database"></i>
                        <span class="nav-text">Pendaftaran</span>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <form action="/update-registration/<?php echo e($viewData->id_pendaftaran); ?>" method="POST" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

            <div class="col-xl-12">
                <div class="card card-body" id="cetak" style="margin-bottom: -1rem">
                    <div class="p-4">
                        <div class="d-flex">
                            <div class="col-lg-3" style="text-align: center; margin-right:25px; margin-left:25px;">
                                <img width="110px" src="<?php echo e(asset('assets/images/logo.jpg')); ?>" alt="">
                            </div>
                            <div class="col-lg-6">
                                <center>
                                    <label class="form-label" style="margin-top: -0.5rem"><strong class="d-block">KARTU
                                            PESERTA</strong></label>
                                    <h5 style="margin-top: -0.5rem"> <strong class="d-block">PENERIMAAN MAHASISWA
                                            BARU</strong></h4>
                                        <h4 style="margin-top: -0.5rem"><strong class="d-block">UNIVERSITAS BHINNEKA PGRI TULUNGAGUNG</strong></h3>
                                            <p style="margin-top: -0.5rem"><strong class="d-block">Plosokandang, Kec.
                                                    Kedungwaru, Kabupaten
                                                    Tulungagung, Jawa Timur <br> 66229</strong></p>
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="margin-bottom: -4rem;">
                        <div class="p-4" style="border-top: 2px solid black!important; margin-top:-2.5rem;">
                            <div class="d-flex">
                                <div class="col-lg-4" style="text-align: center; margin-right:25px;">
                                    <img src="<?php echo e(asset($viewData->pas_foto)); ?>" width="250px" height="300"
                                        alt="">
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3 mb-4">
                                        <h4><strong>DATA PESERTA</strong></h4><br>
                                        <strong>NOMOR PESERTA</strong><br>
                                        <h5 style="text-indent: 0.5in"><strong><?php echo e($viewData->id_pendaftaran); ?></strong>
                                        </h5>
                                        <strong>NAMA PESERTA</strong><br>
                                        <h5 style="text-indent: 0.5in"><strong><?php echo e($viewData->nama_siswa); ?></strong></h5>
                                        <strong>TANGGAL LAHIR</strong><br>
                                        <h5 style="text-indent: 0.5in"><strong><?php echo e($viewData->tanggal_lahir); ?></strong>
                                        </h5>
                                        <strong>NISN</strong><br>
                                        <h5 style="text-indent: 0.5in"><strong><?php echo e($viewData->nisn); ?></strong></h5>
                                        <strong>ASAL SEKOLAH</strong><br>
                                        <h5 style="text-indent: 0.5in"><strong>
                                                <?php $__currentLoopData = $viewSekolah; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $z): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($z->id == $viewData->sekolah): ?>
                                                        <h5 class="f-w-500">: <?php echo e($z->nama_sekolah); ?></h5>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </strong></h5>

                                    </div>
                                </div>

                            </div>
                            <br>
                            <div class="d-flex">
                                <div class="col-lg-6" style="width: 50%">
                                    <div class="mb-3 mb-4">
                                        <strong>PILIHAN 1</strong><br>
                                        <h5><strong><?php echo e($viewData->pilihan1->nama_prodi); ?>

                                            </strong></h5>
                                    </div>
                                </div>
                                <div class="col-lg-6" style="width: 50%">
                                    <div class="mb-3 mb-4">
                                        <strong>PILIHAN 2</strong><br>
                                        <h5><strong><?php echo e($viewData->pilihan2->nama_prodi); ?>

                                            </strong></h5>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="mb-4">
                                <h4><strong>PERNYATAAN</strong></h4>
                                <h5 style="text-indent: 0.5in;text-align: justify;">Saya yang menyatakan bahwa data yang
                                    saya isikan dalam formulir pendaftaran penerimaan mahasiswa baru Universitas Bhinneka PGRI 
                                    Tulungagung tahun 2025 adalah benar dan saya bersedia menerima ketentuan yang berlaku. Saya
                                    bersedia menerima sanksi pembatalan penerimaan apabila melanggar pernyataan ini.</h5>
                            </div>
                            <div class="d-flex">
                                <div class="col-lg-6" style="width:50%; text-align: right; margin:15px;">
                                    <img width="150px" src="<?php echo e(asset('assets/images/qr.png')); ?>" alt="">
                                </div>
                                <div class="col-lg-6" style="width:50%;">
                                    <br>
                                    <center>
                                        <h5><label class="form-label"><strong
                                                    class="d-block">...............................,2025</strong></label>
                                        </h5>
                                        <br>
                                        <p style="color: rgb(156, 156, 156)">ttd</p>
                                        <br>
                                        <h5><strong class="d-block"><?php echo e($viewData->nama_siswa); ?></strong></h5>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row my-4">
                <div class="col">
                    <div class="text-end mt-2 mt-sm-0">
                        <button class="btn btn-success waves-effect waves-light me-1" onclick="printDiv('cetak')"><i
                                class="fa fa-print"> </i></button>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row-->
        </form>
    </div>
    <!-- end row -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.master-admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/app/resources/views/pendaftaran/data-pendaftaran-kartu-admin.blade.php ENDPATH**/ ?>