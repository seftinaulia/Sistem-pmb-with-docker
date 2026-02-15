<?php $__env->startSection('title'); ?>
    PMB UBHI
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('navbar'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('navbar'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('menunya'); ?>
    Pengumuman
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
                <li><a href="data-registration" aria-expanded="false">
                        <i class="fa fa-database"></i>
                        <span class="nav-text">Pendaftaran</span>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!--ADMIN-->
    <?php if(auth()->guard()->check()): ?>
        <?php if(auth()->user()->role == 'Administrator'): ?>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Data Pengumuman</h4>


                            <div>
                                <button class="btn btn-info waves-effect waves-light mb-4" onclick="printDiv('cetak')"><i
                                        class="fa fa-print"> </i></button>

                                
                            </div>
                            <!-- center modal -->

                            <div class="modal fade modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Tambah Pengumuman</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="save-announcement" method="POST" enctype="multipart/form-data">
                                                <?php echo e(csrf_field()); ?>

                                                <input type="hidden" name="userid" value="<?php echo e(auth()->user()->id); ?>">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-xl-6">
                                                            <label for="iduser">ID Pendaftaran</label>
                                                            <select class="default-select form-control wide"
                                                                title="id_pendaftaran" name="id_pendaftaran" required>
                                                                <option value="-">Pilih ID</option>
                                                                <?php $__currentLoopData = $viewIdPendaftaran; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $y): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($y->id_pendaftaran); ?>">
                                                                        <?php echo e($y->id_pendaftaran); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-xl-6">
                                                            <label for="iduser">Hasil</label>
                                                            <select class="default-select form-control wide" title="hasil"
                                                                name="hasil" required>
                                                                <option value="Belum Tersedia">Pilih Hasil</option>
                                                                <option value="LULUS">Lulus</option>
                                                                <option value="TIDAK LULUS">Tidak Lulus</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="iduser">Program Studi Penerima </label>
                                                    <select class="default-select form-control wide" title="penerima"
                                                        name="penerima" required>
                                                        <option value="-">Pilih Program Studi</option>
                                                        <option value="TIDAK ADA">Tidak Ada</option>
                                                        <?php $__currentLoopData = $viewProdi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $z): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($z->id_prodi); ?>"><?php echo e($z->nama_prodi); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-xl-6">
                                                            <label for="iduser">Nilai Interview</label>
                                                            <input type="number" class="form-control"
                                                                placeholder="Masukkan Nilai Interview" name="interview"
                                                                required>
                                                        </div>
                                                        <div class="col-xl-6">
                                                            <label for="iduser">Nilai Test</label>
                                                            <input type="number" class="form-control"
                                                                placeholder="Masukkan Nilai Test" name="test" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer border-top-0 d-flex">
                                                    <button type="button" class="btn btn-danger light"
                                                        data-bs-dismiss="modal">Tutup</button>
                                                    <button type="submit" name="add" class="btn btn-primary">Tambah
                                                        Data</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                        </div>
                        <div class="card-body" id="cetak">
                            <div class="table-responsive">
                                <?php echo e(csrf_field()); ?>


                                <table id="example3" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Id Pendaftaran</th>
                                            <th>Hasil</th>
                                            <th>Program Studi Penerima</th>
                                            <th>Nilai Interview</th>
                                            <th>Nilai Tes</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php $__currentLoopData = $viewData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $x): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($no++); ?></td>
                                                <td><a
                                                        href="detail-registration/<?php echo e($x->pendaftaran->id_pendaftaran); ?>"><?php echo e($x->pendaftaran->id_pendaftaran); ?></a>
                                                </td>
                                                <td>
                                                    <?php if($x->hasil_seleksi == 'LULUS' || $x->hasil_seleksi == 'Lulus' || $x->hasil_seleksi == 'lulus'): ?>
                                                        <span class="badge light badge-success">
                                                            <i class="fa fa-circle text-success me-1"></i>
                                                            LULUS
                                                        </span>
                                                    <?php else: ?>
                                                        <span class="badge light badge-danger">
                                                            <i class="fa fa-circle text-danger me-1"></i>
                                                            TIDAK LULUS
                                                        </span>
                                                    <?php endif; ?>
                                                <td>
                                                    <?php if($x->hasil_seleksi == 'LULUS' || $x->hasil_seleksi == 'Lulus' || $x->hasil_seleksi == 'lulus'): ?>
                                                        <?php echo e($x->prodi->nama_prodi); ?>

                                                    <?php endif; ?>
                                                </td>
                                                <td><strong><?php echo e($x->nilai_interview); ?></strong></a></td>
                                                <td><strong><?php echo e($x->nilai_test); ?></strong></a></td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a class="btn btn-secondary shadow btn-xs sharp me-1"
                                                            title="Detail Registration"
                                                            href="view-announcement/<?php echo e($x->pendaftaran->id_pendaftaran); ?>"><i
                                                                class="fa fa-file-alt"></i></a>
                                                        <a class="btn btn-primary shadow btn-xs sharp me-1" title="Edit"
                                                            data-bs-toggle="modal"
                                                            data-bs-target=".edit<?php echo e($x->id_pengumuman); ?>"><i
                                                                class="fa fa-pencil-alt"></i></a>
                                                        <a class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"
                                                                data-bs-toggle="modal"
                                                                data-bs-target=".delete<?php echo e($x->id_pengumuman); ?>"></i></a>
                                                        <div class="modal fade delete<?php echo e($x->id_pengumuman); ?>" tabindex="-1"
                                                            role="dialog" aria-hidden="true">
                                                            <div class="modal-dialog modal-sm">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Hapus Data</h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal">
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body text-center"><i
                                                                            class="fa fa-trash"></i><br> Apakah anda yakin ingn
                                                                        menghapus data ini? <br><?php echo e($x->id_pengumuman); ?>

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-danger light"
                                                                            data-bs-dismiss="modal">Hapus</button>
                                                                        <a href="delete-announcement/<?php echo e($x->id_pengumuman); ?>">
                                                                            <button type="submit"
                                                                                class="btn btn-danger shadow">
                                                                                Ya, Hapus Data!
                                                                            </button></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                            <div class="modal fade edit<?php echo e($x->id_pengumuman); ?>" tabindex="-1"
                                                role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">

                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Sunting Pengumuman</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close">
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="update-announcement/<?php echo e($x->id_pengumuman); ?>"
                                                                method="POST" enctype="multipart/form-data">
                                                                <?php echo e(csrf_field()); ?>

                                                                <input type="hidden" name="userid"
                                                                    value="<?php echo e(auth()->user()->id); ?>">
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-xl-6">
                                                                            <label for="iduser">ID Pendaftaran</label>
                                                                            <select class="default-select form-control wide"
                                                                                title="id_pendaftaran" name="id_pendaftaran"
                                                                                required>
                                                                                <option value="<?php echo e($x->id_pendaftaran); ?>">
                                                                                    <?php echo e($x->pendaftaran->id_pendaftaran); ?>

                                                                                </option>
                                                                            </select>

                                                                        </div>
                                                                        <div class="col-xl-6">
                                                                            <label for="iduser">Hasil</label>
                                                                            <select class="default-select form-control wide"
                                                                                title="Result" name="hasil" required>
                                                                                <option value="<?php echo e($x->hasil_seleksi); ?>"
                                                                                    selected><?php echo e($x->hasil_seleksi); ?></option>
                                                                                <option value="LULUS">LULUS</option>
                                                                                <option value="TIDAK LULUS">TIDAK LULUS
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="iduser">Program Studi Penerima </label>
                                                                    <select class="default-select form-control wide"
                                                                        title="Recipient" name="prodi" required>
                                                                        <?php if($x->hasil_seleksi == 'LULUS' || $x->hasil_seleksi == 'Lulus' || $x->hasil_seleksi == 'lulus'): ?>
                                                                            <option value="<?php echo e($x->prodi_penerima); ?>" selected>
                                                                                <?php echo e($x->prodi->nama_prodi); ?></option>
                                                                        <?php endif; ?>
                                                                        <option value="<?php echo e($x->pendaftaran->pil1); ?>">Pilihan 1
                                                                            : <?php echo e($x->pendaftaran->pilihan1->nama_prodi); ?>

                                                                        </option>
                                                                        <option value="<?php echo e($x->pendaftaran->pil2); ?>">Pilihan 2
                                                                            : <?php echo e($x->pendaftaran->pilihan2->nama_prodi); ?>

                                                                        </option>
                                                                        <option value="tidak diterima0">Tidak DiTerima</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-xl-6">
                                                                            <label for="iduser">Nilai Interview</label>
                                                                            <input type="number" class="form-control"
                                                                                id="nama"
                                                                                value="<?php echo e($x->nilai_interview); ?>"
                                                                                name="interview" required>
                                                                        </div>
                                                                        <div class="col-xl-6">
                                                                            <label for="iduser">Nilai Tes</label>
                                                                            <input type="number" class="form-control"
                                                                                id="nama" value="<?php echo e($x->nilai_test); ?>"
                                                                                name="test" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer border-top-0 d-flex">
                                                                    <button type="button" class="btn btn-danger light"
                                                                        data-bs-dismiss="modal">Tutup</button>
                                                                    <button type="submit" name="add"
                                                                        class="btn btn-primary">Perbaharui Data</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php elseif(auth()->user()->role == 'Calon Mahasiswa'): ?>
            <!--USER-->
            <div class="row" style="min-height: 500px">
                <div class="col-lg-12">
                    <div class="card card-body">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-sm-8">
                                    <h4 class="card-title">Lihat Hasil Seleksimu, <?php echo e(auth()->user()->name); ?> !</h4>
                                    <h5 class="card-title">Pengumuman Seleksi Penerimaan Mahasiswa Baru </h5> <br>
                                    <form action="view-announcement/" method="POST">
                                        <?php echo e(csrf_field()); ?>

                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div class="mb-3">
                                                    <label>No Pendaftaran</label>
                                                    <input type="text" class="form-control" name="id_pendaftaran">
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary  fs-18 font-w500" type="submit">Lihat Hasil
                                            Seleksi</button>
                                    </form>
                                </div>
                                <div class="col-sm-4">
                                    <img src="<?php echo e(asset('assets/images/chart.png')); ?>" alt="" class="sd-shape">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        <?php endif; ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.master-admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/app/resources/views/pengumuman/data-pengumuman-admin.blade.php ENDPATH**/ ?>