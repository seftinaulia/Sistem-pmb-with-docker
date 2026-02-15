<?php $__env->startSection('title'); ?>
    PMB UBHI
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('navbar'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('navbar'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('menunya'); ?>
    Jadwal Kegiatan
<?php $__env->stopSection(); ?>

<?php $__env->startSection('menu'); ?>
    <?php if(auth()->guard()->check()): ?>
        <ul class="metismenu" id="menu">
            <li><a href="<?php echo e(route('dashboard')); ?>">
                    <i class="fas fa-home"></i>
                    <span class="nav-text">Jadwal Kegiatan</span>
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
                <li><a href="<?php echo e(route('data-registration')); ?>" aria-expanded="false">
                        <i class="fa fa-database"></i>
                        <span class="nav-text">Pendaftaran</span>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(auth()->user()->role == 'Administrator'): ?>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Jadwal Kegiatan Pendaftaran</h4>

                        <!-- center modal -->
                        <div>
                            <button class="btn btn-info waves-effect waves-light mb-4" onclick="printDiv('cetak')"><i
                                    class="fa fa-print"> </i></button>
                            <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal"
                                data-bs-target=".modal" style="margin-bottom: 1rem;"><i class="mdi mdi-plus me-1"></i>Tambah
                                Kegiatan</button>
                        </div>


                        <div class="modal fade modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah Kegiatan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="save-jadwal" method="POST" enctype="multipart/form-data">
                                            <?php echo e(csrf_field()); ?>

                                            <input type="hidden" name="userid" value="<?php echo e(auth()->user()->id); ?>">
                                            <div class="form-group">
                                                <label for="iduser">Nama Kegiatan</label>
                                                <input type="text" class="form-control" id="nama"
                                                    placeholder="Masukkan nama kegiatan: Gelombang 1" name="nama"
                                                    required>
                                            </div>
                                            <div class="form-group">
                                                <label for="iduser">Jenis Kegiatan</label>

                                                <input class="form-control" list="datalistOptionsJenis" id="exampleDataList"
                                                    placeholder="Pilih Jenis Kegiatan" name="jenis"
                                                    value="<?php echo e(old('jenis')); ?>">
                                                <datalist id="datalistOptionsJenis">
                                                    <option value="Pendaftaran">Pendaftaran</option>
                                                    <option value="Tes Potensi akademik dan Wawancara">Tes Potensi akademik
                                                        dan Wawancara</option>
                                                    <option value="Pengumuman">Pengumuman</option>
                                                    <option value="Registrasi Ulang">Registrasi Ulang</option>
                                                </datalist>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-6 col-xl-6 col-md-6">
                                                        <label for="iduser">Tanggal Mulai</label>
                                                        <input type="date" class="form-control" name="mulai" required>
                                                    </div>
                                                    <div class="col-lg-6 col-xl-6 col-md-6">
                                                        <label for="iduser">Tanggal Selesai</label>
                                                        <input type="date" class="form-control" name="selesai" required>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer border-top-0 d-flex">
                                                <button type="button" class="btn btn-danger light"
                                                    data-bs-dismiss="modal">Tutup</button>
                                                <button type="submit" name="add" class="btn btn-primary">Tambahkan
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
                                        <th>Nama Kegiatan</th>
                                        <th>Jenis Kegiatan</th>
                                        <th>Tanggal Mulai</th>
                                        <th>Tanggal Berakhir</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php $__currentLoopData = $viewData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $x): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($no++); ?></td>
                                            <td><?php echo e($x->nama_kegiatan); ?></td>
                                            <td><?php echo e($x->jenis_kegiatan); ?></td>
                                            <td><?php echo e($x->tgl_mulai); ?></td>
                                            <td><?php echo e($x->tgl_akhir); ?></td>
                                            <td>
                                                <?php if($x->tgl_mulai <= $datenow && $x->tgl_akhir > $datenow): ?>
                                                    <span class="badge light badge-primary">
                                                        <i class="fa fa-circle text-primary me-1"></i>
                                                        Berjalan
                                                    </span>
                                                <?php elseif($x->tgl_mulai < $datenow): ?>
                                                    <span class="badge light badge-danger">
                                                        <i class="fa fa-circle text-danger me-1"></i>
                                                        Berakhir
                                                    </span>
                                                <?php else: ?>
                                                    <span class="badge light badge-info">
                                                        <i class="fa fa-circle text-info me-1"></i>
                                                        Akan Berjalan
                                                    </span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <a class="btn btn-primary shadow btn-xs sharp me-1" title="Edit"
                                                        data-bs-toggle="modal"
                                                        data-bs-target=".edit<?php echo e($x->id); ?>"><i
                                                            class="fa fa-pencil-alt"></i></a>
                                                    <a class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"
                                                            data-bs-toggle="modal"
                                                            data-bs-target=".delete<?php echo e($x->id); ?>"></i></a>
                                                    <div class="modal fade delete<?php echo e($x->id); ?>" tabindex="-1"
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
                                                                        class="fa fa-trash"></i><br> Anda yakin ingin
                                                                    menghapus kegiatan ini?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger light"
                                                                        data-bs-dismiss="modal">Batalkan</button>
                                                                    <a href="delete-jadwal/<?php echo e($x->id); ?>">
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

                                        <div class="modal fade edit<?php echo e($x->id); ?>" tabindex="-1" role="dialog"
                                            aria-labelledby="mySmallModalLabel" aria-hidden="true">

                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Sunting Sekolah</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="update-jadwal/<?php echo e($x->id); ?>" method="POST"
                                                            enctype="multipart/form-data">
                                                            <?php echo e(csrf_field()); ?>

                                                            <input type="hidden" name="userid"
                                                                value="<?php echo e(auth()->user()->id); ?>">
                                                            <input type="hidden" name="id"
                                                                value="<?php echo e($x->id); ?>">

                                                            <div class="form-group">
                                                                <label for="iduser">Nama Kegiatan</label>
                                                                <input type="text" class="form-control" id="nama"
                                                                    placeholder="Masukkan nama kegiatan: Gelombang 1"
                                                                    name="nama" value="<?php echo e($x->nama_kegiatan); ?>"
                                                                    required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="iduser">Jenis Kegiatan</label>

                                                                <input class="form-control" list="datalistOptionsJenis"
                                                                    id="exampleDataList"
                                                                    placeholder="Pilih Jenis Kegiatan" name="jenis"
                                                                    value="<?php echo e($x->jenis_kegiatan); ?>">
                                                                <datalist id="datalistOptionsJenis">
                                                                    <option value="Pendaftaran">Pendaftaran</option>
                                                                    <option value="Tes Potensi akademik dan Wawancara">Tes
                                                                        Potensi akademik dan Wawancara</option>
                                                                    <option value="Pengumuman">Pengumuman</option>
                                                                    <option value="Registrasi Ulang">Registrasi Ulang
                                                                    </option>
                                                                </datalist>
                                                            </div>




                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-lg-6 col-xl-6 col-md-6">
                                                                        <label for="iduser">Tanggal Mulai</label>
                                                                        <input type="date" class="form-control"
                                                                            name="mulai" value="<?php echo e($x->tgl_mulai); ?>"
                                                                            required>
                                                                    </div>
                                                                    <div class="col-lg-6 col-xl-6 col-md-6">
                                                                        <label for="iduser">Tanggal Selesai</label>
                                                                        <input type="date" class="form-control"
                                                                            name="selesai" value="<?php echo e($x->tgl_akhir); ?>"
                                                                            required>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="modal-footer border-top-0 d-flex">
                                                                <button type="button" class="btn btn-danger light"
                                                                    data-bs-dismiss="modal">Tutup</button>
                                                                <button type="submit" name="add"
                                                                    class="btn btn-primary">Perbaharui
                                                                    Data</button>
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
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.master-admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/app/resources/views/jadwalkegiatan/data-jadwal.blade.php ENDPATH**/ ?>