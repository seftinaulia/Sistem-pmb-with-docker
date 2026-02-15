<?php $__env->startSection('title'); ?>
    PMB UBHI
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('navbar'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('navbar'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('menunya'); ?>
    Program Studi
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
    <?php $__errorArgs = ['success'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="alert alert-success alert-dismissible fade show">
            <svg viewbox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none"
                stroke-linecap="round" stroke-linejoin="round" class="me-2">
                <polyline points="9 11 12 14 22 4"></polyline>
                <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
            </svg>
            <strong>Sukses!</strong> Data berhasil disimpan.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
            </button>
        </div>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Program Studi</h4>

                    <!-- center modal -->
                    <div>
                        <button class="btn btn-info waves-effect waves-light mb-4" onclick="printDiv('cetak')"><i
                                class="fa fa-print"> </i></button>
                        <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target=".modal"
                            style="margin-bottom: 1rem;"><i class="mdi mdi-plus me-1"></i>Tambah Program Studi</button>
                    </div>

                    <div class="modal fade modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Tambah Program Studi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="save-prodi" method="POST" enctype="multipart/form-data">
                                        <?php echo e(csrf_field()); ?>

                                        <input type="hidden" name="userid" value="<?php echo e(auth()->user()->id); ?>">
                                        <div class="form-group">
                                            <label for="iduser">Nama Program Studi</label>
                                            <input type="text" class="form-control" id="nama"
                                                placeholder="Masukkan Nama Prodi" name="nama" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="iduser">Jenjang Program Studi</label>
                                            <input type="text" class="form-control" id="jenjang"
                                                placeholder="Masukkan Jenjang Prodi" name="jenjang" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="iduser">Foto Program Studi</label>
                                            <div class="input-group">
                                                <span class="input-group-text">Upload</span>
                                                <div class="form-file">
                                                    <input type="file" class="form-file-input form-control"
                                                        name="foto">
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
                                    <th>ID</th>
                                    <th>Nama Program Studi</th>
                                    <th>Jenjang</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $viewData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $x): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td><?php echo e($x->id_prodi); ?></td>
                                        <td><?php echo e($x->nama_prodi); ?></td>
                                        <td><?php echo e($x->jenjang_prodi); ?></td>
                                        <td><img src="<?php echo e(asset($x->foto_prodi)); ?>" width="200px" height="200"
                                                alt=""></td>
                                        <td>
                                            <div class="d-flex">
                                                <a class="btn btn-primary shadow btn-xs sharp me-1" title="Edit"
                                                    data-bs-toggle="modal" data-bs-target=".edit<?php echo e($x->id); ?>"><i
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
                                                                    class="fa fa-trash"></i><br> Apakah anda yakin ingin
                                                                menghapus data ini?<br> <?php echo e($x->nama_prodi); ?>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger light"
                                                                    data-bs-dismiss="modal">Batalkan</button>
                                                                <a href="delete-prodi/<?php echo e($x->id); ?>">
                                                                    <button type="submit" class="btn btn-danger shadow">
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
                                                    <h5 class="modal-title">Sunting Program Studi</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="update-prodi/<?php echo e($x->id); ?>" method="POST"
                                                        enctype="multipart/form-data">
                                                        <?php echo e(csrf_field()); ?>

                                                        <input type="hidden" name="userid"
                                                            value="<?php echo e(auth()->user()->id); ?>">
                                                        <div class="form-group">
                                                            <input type="hidden" name="id" id="nama"
                                                                class="form-control" value="<?php echo e($x->id); ?>">
                                                            <div class="row">
                                                                <div class="col-xl-12">
                                                                    <label for="iduser">Nama Program Studi</label>
                                                                    <input type="text" class="form-control"
                                                                        id="nama" value="<?php echo e($x->nama_prodi); ?>"
                                                                        placeholder="Masukan Nama Prodi" name="nama"
                                                                        required>
                                                                </div>
                                                                <div class="col-xl-12">
                                                                    <label for="iduser">Jenjang Program Studi</label>
                                                                    <input type="text" class="form-control"
                                                                        id="jenjang" value="<?php echo e($x->jenjang_prodi); ?>"
                                                                        placeholder="Masukan Jenjang Prodi" name="jenjang"
                                                                        required>
                                                                </div>
                                                                <div class="col-xl-12">
                                                                    <label for="iduser">Foto Program Studi</label>
                                                                    <div class="input-group">
                                                                        <span class="input-group-text">Upload</span>
                                                                        <div class="form-file">
                                                                            <input type="file"
                                                                                class="form-file-input form-control"
                                                                                name="foto"
                                                                                value="<?php echo e(old('foto')); ?>">
                                                                            <input type="hidden" name="pathnya"
                                                                                class="form-control-file"
                                                                                value="<?php echo e($x->foto_prodi); ?>">
                                                                        </div>
                                                                    </div>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.master-admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/app/resources/views/prodi/data-studyProgram-admin.blade.php ENDPATH**/ ?>