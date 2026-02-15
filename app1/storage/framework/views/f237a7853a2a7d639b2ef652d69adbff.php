<?php $__env->startSection('title'); ?>
    PMB UBHI
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('navbar'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('navbar'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('menunya'); ?>
    Form Pendaftaran
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
        <form action="/save-registration" method="POST" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

            <input type="hidden" name="userid" value="<?php echo e(auth()->user()->id); ?>">
            <div class="col-xl-12">
                <div class="custom-accordion">
                    <div class="card">
                        <a href="#personal-data" class="text-dark" data-bs-toggle="collapse">
                            <div class="p-4">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 me-3"> <i class="uil uil-receipt text-primary h2"></i>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <h5 class="font-size-16 mb-1">Data Pribadi</h5>
                                        <p class="text-muted text-truncate mb-0">NISN, NIK, Nama, Jenis Kelamin, Pas
                                            Photo, TTL, dsb</p>
                                    </div>
                                    <div class="flex-shrink-0"> <i
                                            class="mdi mdi-chevron-up accor-down-icon font-size-24"></i> </div>
                                </div>
                            </div>
                        </a>
                        <div id="personal-data" class="collapse show">
                            <div class="p-4 border-top">
                                <div class="row">
                                    <input type="hidden" name="user_id" value="<?php echo e(auth()->user()->id); ?>">
                                    <input type="hidden" name="id" value="<?php echo e(auth()->user()->id); ?>">
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3 mb-4">
                                            <label class="form-label" for="personal-data-nisn">NISN</label>
                                            <input type="text" class="form-control" id="personal-data-nisn"
                                                name="nisn" placeholder="Masukkan NISN" value="<?php echo e(old('nisn')); ?>"
                                                required>
                                            <?php $__errorArgs = ['nisn'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="alert alert-warning" role="alert">
                                                    <strong>Peringatan!</strong>
                                                    <?php echo e($message); ?>

                                                </div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3 mb-4">
                                            <label class="form-label" for="personal-data-nik">NIK</label>
                                            <input type="text" class="form-control" id="personal-data-nik" name="nik"
                                                placeholder="Masukkan NIK" value="<?php echo e(old('nik')); ?>" required>
                                            <?php $__errorArgs = ['nik'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="alert alert-warning" role="alert">
                                                    <strong>Peringatan!</strong>
                                                    <?php echo e($message); ?>

                                                </div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3 mb-4">
                                            <label class="form-label" for="personal-data-name">Nama</label>

                                            <?php if(auth()->user()->profile->nama != null): ?>
                                                <input type="text" class="form-control" id="basicpill" name="nama"
                                                    placeholder="Masukkan Nama Lengkap"
                                                    value="<?php echo e(auth()->user()->profile->nama); ?>" required>
                                            <?php else: ?>
                                                <input type="text" class="form-control" id="personal-data-name"
                                                    name="nama" placeholder="Masukkan Nama Lengkap"
                                                    value="<?php echo e(old('nama')); ?>" required>
                                            <?php endif; ?>
                                            <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="alert alert-warning" role="alert">
                                                    <strong>Peringatan!</strong>
                                                    <?php echo e($message); ?>

                                                </div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3 mb-4">
                                            <label class="form-label" for="personal-data-gender">Jenis
                                                Kelamin</label>
                                            <?php if(auth()->user()->profile->gender != null): ?>
                                                <?php if(auth()->user()->profile->gender == 'Perempuan'): ?>
                                                    <select class="form-control wide" name="jk"
                                                        value="<?php echo e(old('jk')); ?>">
                                                        <option value="<?php echo e(auth()->user()->profile->gender); ?>" selected>
                                                            <?php echo e(auth()->user()->profile->gender); ?></option>
                                                        <option value="Laki-laki">Laki-laki</option>
                                                    </select>
                                                <?php else: ?>
                                                    <select class="form-control wide" name="jk"
                                                        value="<?php echo e(old('jk')); ?>">
                                                        <option value="<?php echo e(auth()->user()->profile->gender); ?>" selected>
                                                            <?php echo e(auth()->user()->profile->gender); ?></option>
                                                        <option value="Perempuan">Perempuan</option>
                                                    </select>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <select class="form-control wide" name="jk"
                                                    value="<?php echo e(old('jk')); ?>">
                                                    <option value="<?php echo e(old('jk')); ?>" disabled selected>Pilih
                                                        Jenis Kelamin </option>
                                                    <option value="Laki-laki">Laki-aki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            <?php endif; ?>

                                            <?php $__errorArgs = ['jk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="alert alert-warning" role="alert">
                                                    <strong>Peringatan!</strong>
                                                    <?php echo e($message); ?>

                                                </div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3 mb-4">
                                            <label class="form-label" for="personal-data">Agama</label>
                                            <select class="form-control wide" name="agama"
                                                value="<?php echo e(old('agama')); ?>">
                                                <option value="<?php echo e(old('agama')); ?>" disabled selected>Pilih agama
                                                </option>
                                                <option value="Islam">Islam</option>
                                                <option value="Kristen">Kristen</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Budha">Budha</option>
                                                <option value="Kong Hu Chu ">Kong Hu Chu</option>
                                                <option value="Lainnya">Etc</option>
                                            </select>
                                            <?php $__errorArgs = ['agama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="alert alert-warning" role="alert">
                                                    <strong>Peringatan!</strong>
                                                    <?php echo e($message); ?>

                                                </div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-4 mb-lg-0">
                                            <label class="form-label">Tempat lahir</label>
                                            <?php if(auth()->user()->profile->tempat_lahir != null): ?>
                                                <input type="text" class="form-control" id="basicpill"
                                                    name="tempatlahir" placeholder="Masukkan Tempat Lahir"
                                                    value="<?php echo e(auth()->user()->profile->tempat_lahir); ?>" required>
                                            <?php else: ?>
                                                <input type="text" class="form-control" id="basicpill"
                                                    name="tempatlahir" placeholder="Masukkan Tempat Lahir"
                                                    value="<?php echo e(old('tempatlahir')); ?>" required>
                                            <?php endif; ?>
                                            <?php $__errorArgs = ['tempatlahir'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="alert alert-warning" role="alert">
                                                    <strong>Peringatan!</strong>
                                                    <?php echo e($message); ?>

                                                </div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-4 mb-lg-0">
                                            <label class="form-label" for="billing-city">Tanggal lahir</label>
                                            <?php if(auth()->user()->profile->tanggal_lahir != null): ?>
                                                <input type="date" class="form-control" id="basicpill"
                                                    name="tanggallahir" placeholder="Masukkan Tanggal Lahir"
                                                    value="<?php echo e(auth()->user()->profile->tanggal_lahir); ?>" required>
                                            <?php else: ?>
                                                <input type="date" class="form-control" id="basicpill"
                                                    name="tanggallahir" placeholder="Masukkan Tanggal Lahir"
                                                    value="<?php echo e(old('tanggallahir')); ?>" required>
                                            <?php endif; ?>
                                            <?php $__errorArgs = ['tanggallahir'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="alert alert-warning" role="alert">
                                                    <strong>Peringatan!</strong>
                                                    <?php echo e($message); ?>

                                                </div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            <!--<input name="tanggallahir" class="datepicker-default form-control" id="datepicker" >-->
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-0">
                                            <label class="form-label" for="zip-code">Pas Photo</label>
                                            <div class="input-group">
                                                <span class="input-group-text">Upload</span>
                                                <div class="form-file">
                                                    <input type="file" class="form-file-input form-control"
                                                        name="foto" value="<?php echo e(old('foto')); ?>"
                                                        accept="image/png, image/jpg, image/jpeg" required>
                                                </div>
                                            </div>
                                            <?php $__errorArgs = ['foto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="alert alert-warning" role="alert">
                                                    <strong>Peringatan!</strong>
                                                    <?php echo e($message); ?>

                                                </div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="billing-address">Alamat</label>

                                    <?php if(auth()->user()->profile->alamat != null): ?>
                                        <textarea class="form-control" id="billing-address" rows="3" name="alamat" required
                                            placeholder="Masukkan alamat lengkap"><?php echo e(auth()->user()->profile->alamat); ?></textarea>
                                    <?php else: ?>
                                        <textarea class="form-control" id="billing-address" rows="3" name="alamat" required
                                            placeholder="Masukkan alamat lengkap"><?php echo e(old('alamat')); ?></textarea>
                                    <?php endif; ?>
                                    <?php $__errorArgs = ['alamat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="alert alert-warning" role="alert">
                                            <strong>Peringatan!</strong>
                                            <?php echo e($message); ?>

                                        </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3 mb-4">
                                            <label class="form-label" for="personal-data-nisn">Email</label>
                                            <input type="email" class="form-control" id="personal-data-nisn"
                                                name="email" placeholder="Masukkan email"
                                                value="<?php echo e(auth()->user()->email); ?>" required readonly>
                                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="alert alert-warning" role="alert">
                                                    <strong>Peringatan!</strong>
                                                    <?php echo e($message); ?>

                                                </div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3 mb-4">
                                            <label class="form-label" for="personal-data-nik">No
                                                Hp/WhatsApp</label>
                                            <?php if(auth()->user()->profile->no_hp != null): ?>
                                                <input type="number" class="form-control" id="basicpill" name="nohp"
                                                    placeholder="Masukkan Tanggal Lahir"
                                                    value="<?php echo e(auth()->user()->profile->no_hp); ?>" required>
                                            <?php else: ?>
                                                <input type="number" class="form-control" id="basicpill" name="nohp"
                                                    placeholder="Masukkan nomor telepon" value="<?php echo e(old('nohp')); ?>"
                                                    required>
                                            <?php endif; ?>
                                            <?php $__errorArgs = ['nohp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="alert alert-warning" role="alert">
                                                    <strong>Peringatan!</strong>
                                                    <?php echo e($message); ?>

                                                </div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <a href="#registration-data" class="collapsed text-dark" data-bs-toggle="collapse">
                            <div class="p-4">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 me-3"> <i class="uil uil-truck text-primary h2"></i>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <h5 class="font-size-16 mb-1">Data Pendaftaran</h5>
                                        <p class="text-muted text-truncate mb-0">Pilihan program studi </p>
                                    </div>
                                    <div class="flex-shrink-0"> <i
                                            class="mdi mdi-chevron-up accor-down-icon font-size-24"></i> </div>
                                </div>
                            </div>
                        </a>
                        <div id="registration-data" class="collapse">
                            <div class="p-4 border-top">
                                <div class="mb-4">
                                    <label class="form-label" for="billing-address">Gelombang</label>
                                    <select class="form-control wide" name="gelombang" required>
                                        <?php $__currentLoopData = $viewDataJadwal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $x): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($x->id); ?>" selected><?php echo e($x->nama_kegiatan); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['gelombang'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="alert alert-warning" role="alert">
                                            <strong>Peringatan!</strong>
                                            <?php echo e($message); ?>

                                        </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3 mb-4">
                                            <label class="form-label" for="personal-data-nisn">Pilihan
                                                1</label>
                                            <input class="form-control" list="datalistOptionsProdi" id="exampleDataList"
                                                placeholder="Pilih program studi" name="pil1"
                                                value="<?php echo e(old('pil1')); ?>" required>
                                            <datalist id="datalistOptionsProdi">
                                                <?php $__currentLoopData = $viewProdi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $z): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($z->id); ?>"><?php echo e($z->nama_prodi); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </datalist>
                                            <?php $__errorArgs = ['pil1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="alert alert-warning" role="alert">
                                                    <strong>Peringatan!</strong>
                                                    <?php echo e($message); ?>

                                                </div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3 mb-4">
                                            <label class="form-label" for="personal-data-nik">Pilihan 2</label>
                                            <input class="form-control" list="datalistOptionsProdi" id="exampleDataList"
                                                placeholder="Pilih program studi" name="pil2"
                                                value="<?php echo e(old('pil2')); ?>" required>
                                            <datalist id="datalistOptionsProdi">
                                                <?php $__currentLoopData = $viewProdi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $z): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($z->id); ?>"><?php echo e($z->nama_prodi); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </datalist>
                                            <?php $__errorArgs = ['pil2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="alert alert-warning" role="alert">
                                                    <strong>Peringatan!</strong>
                                                    <?php echo e($message); ?>

                                                </div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <a href="#parental-data" class="collapsed text-dark" data-bs-toggle="collapse">
                            <div class="p-4">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 me-3"> <i class="uil uil-bill text-primary h2"></i>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <h5 class="font-size-16 mb-1">Data Orang Tua</h5>
                                        <p class="text-muted text-truncate mb-0">Data orang tua, keuangan dan data.
                                        </p>
                                    </div>
                                    <div class="flex-shrink-0"> <i
                                            class="mdi mdi-chevron-up accor-down-icon font-size-24"></i> </div>
                                </div>
                            </div>
                        </a>
                        <div id="parental-data" class="collapse">
                            <div class="p-4 border-top">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3 mb-4">
                                            <label class="form-label" for="personal-data-name">Nama
                                                Ayah</label>
                                            <input type="text" class="form-control" id="personal-data-name"
                                                name="ayah" placeholder="Masukkan Nama Ayah"
                                                value="<?php echo e(old('ayah')); ?>" required>
                                            <?php $__errorArgs = ['ayah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="alert alert-warning" role="alert">
                                                    <strong>Peringatan!</strong>
                                                    <?php echo e($message); ?>

                                                </div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3 mb-4">
                                            <label class="form-label" for="personal-data-gender">Pekerjaan
                                                Ayah</label>
                                            <input class="form-control" list="datalistOptionsOccupation"
                                                id="exampleDataList" placeholder="Masukkan Jenis Pekerjaan..."
                                                name="pekerjaanayah" value="<?php echo e(old('pekerjaanayah')); ?>" required>
                                            <datalist id="datalistOptionsOccupation">
                                                <option value="Karyawan Swasta"></option>
                                                <option value="Karyawan BUMN"></option>
                                                <option value="Karyawan BUMD"></option>
                                                <option value="Karyawan Honorer"></option>
                                                <option value="PNS"></option>
                                                <option value="Wirausaha"></option>
                                                <option value="PNS"></option>
                                                <option value="Buruh"></option>
                                                <option value="Asisten Rumah Tangga"></option>
                                                <option value="Seniman"></option>
                                                <option value="Dokter"></option>
                                                <option value="Perawat"></option>
                                                <option value="Bidan"></option>
                                                <option value="Apoteker"></option>
                                                <option value="Pengajar"></option>
                                                <option value="Notaris"></option>
                                            </datalist>
                                            <?php $__errorArgs = ['pekerjaanayah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="alert alert-warning" role="alert">
                                                    <strong>Peringatan!</strong>
                                                    <?php echo e($message); ?>

                                                </div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3 mb-4">
                                            <label class="form-label" for="personal-data-nik">No HP
                                                Ayah</label>
                                            <input type="number" class="form-control" id="personal-data-no"
                                                name="noayah" placeholder="Masukkan Telepon Ayah" required
                                                value="<?php echo e(old('noayah')); ?>">
                                            <?php $__errorArgs = ['pekerjaanayah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="alert alert-warning" role="alert">
                                                    <strong>Peringatan!</strong>
                                                    <?php echo e($message); ?>

                                                </div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3 mb-4">
                                            <label class="form-label" for="personal-data-name">Nama Ibu</label>
                                            <input type="text" class="form-control" id="personal-data-name" required
                                                name="ibu" placeholder="Masukkan Nama Ibu"
                                                value="<?php echo e(old('ibu')); ?>">
                                            <?php $__errorArgs = ['ibu'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="alert alert-warning" role="alert">
                                                    <strong>Peringatan!</strong>
                                                    <?php echo e($message); ?>

                                                </div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3 mb-4">
                                            <label class="form-label" for="personal-data-gender">Pekerjaan
                                                Ibu</label>
                                            <input class="form-control" list="datalistOptionsOccupation"
                                                id="exampleDataList" placeholder="Cari Pekerjaan Ibu.."
                                                name="pekerjaanibu" value="<?php echo e(old('pekerjaanibu')); ?>" required>
                                            <datalist id="datalistOptionsOccupation">
                                                <option value="Karyawan Swasta"></option>
                                                <option value="Karyawan BUMN"></option>
                                                <option value="Karyawan BUMD"></option>
                                                <option value="Karyawan Honorer"></option>
                                                <option value="PNS"></option>
                                                <option value="Wirausaha"></option>
                                                <option value="PNS"></option>
                                                <option value="Buruh"></option>
                                                <option value="Asisten Rumah Tangga"></option>
                                                <option value="Seniman"></option>
                                                <option value="Dokter"></option>
                                                <option value="Perawat"></option>
                                                <option value="Bidan"></option>
                                                <option value="Apoteker"></option>
                                                <option value="Pengajar"></option>
                                                <option value="Notaris"></option>
                                            </datalist>
                                            <?php $__errorArgs = ['pekerjaanibu'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="alert alert-warning" role="alert">
                                                    <strong>Peringatan!</strong>
                                                    <?php echo e($message); ?>

                                                </div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3 mb-4">
                                            <label class="form-label" for="personal-data-nik">No Telepon
                                                Ibu</label>
                                            <input type="number" class="form-control" id="personal-data-no"
                                                name="noibu" placeholder="Masukkan Telepon Ibu"
                                                value="<?php echo e(old('noibu')); ?>" required>
                                            <?php $__errorArgs = ['noibu'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="alert alert-warning" role="alert">
                                                    <strong>Peringatan!</strong>
                                                    <?php echo e($message); ?>

                                                </div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3 mb-4">
                                            <label class="form-label" for="personal-data-nisn">Penghasilan Ayah</label>
                                            <select class="form-control wide" title="Recipient" name="penghasilan_ayah"
                                                required>
                                                <option value="<?php echo e(old('penghasilan_ayah')); ?>" disabled selected>Pilih gaji
                                                </option>
                                                <option value="< 1.0000.000">
                                                    < 1.000.000</option>
                                                <option value="1.000.000 - 2.500.000">1.000.000 -
                                                    2.500.000
                                                </option>
                                                <option value="2.500.000 - 5.000.000">2.500.000 - 5.000.000</option>
                                                <option value="5.000.000 - 7.500.000">5.000.000 - 7.500.000</option>
                                                <option value="7.500.000 - 10.000.000">7.500.000 - 10.000.000
                                                </option>
                                                <option value="> 10.0000.000"> > 10.000.000</option>
                                            </select>
                                            <?php $__errorArgs = ['penghasilan_ayah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="alert alert-warning" role="alert">
                                                    <strong>Peringatan!</strong>
                                                    <?php echo e($message); ?>

                                                </div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3 mb-4">
                                            <label class="form-label" for="personal-data-nisn">Penghasilan Ibu</label>
                                            <select class="form-control wide" title="Recipient" name="penghasilan_ibu"
                                                required>
                                                <option value="<?php echo e(old('penghasilan_ibu')); ?>" disabled selected>Pilih gaji
                                                </option>
                                                <option value="< 1.0000.000">
                                                    < 1.000.000</option>
                                                <option value="1.000.000 - 2.500.000">1.000.000 -
                                                    2.500.000
                                                </option>
                                                <option value="2.500.000 - 5.000.000">2.500.000 - 5.000.000</option>
                                                <option value="5.000.000 - 7.500.000">5.000.000 - 7.500.000</option>
                                                <option value="7.500.000 - 10.000.000">7.500.000 - 10.000.000
                                                </option>
                                                <option value="> 10.0000.000"> > 10.000.000</option>
                                            </select>
                                            <?php $__errorArgs = ['penghasilan_ibu'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="alert alert-warning" role="alert">
                                                    <strong>Peringatan!</strong>
                                                    <?php echo e($message); ?>

                                                </div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3 mb-4">
                                            <label class="form-label" for="personal-data-nisn">Berkas Orang Tua
                                                <small>kk,slip gaji</small>
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text">Upload</span>
                                                <div class="form-file">
                                                    <input type="file" class="form-file-input form-control"
                                                        name="ftberkas_ortu" value="<?php echo e(old('ftberkas_ortu')); ?>"
                                                        accept="application/pdf" required>
                                                </div>
                                            </div>
                                            <?php $__errorArgs = ['ftberkas_ortu'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="alert alert-warning" role="alert">
                                                    <strong>Peringatan!</strong>
                                                    <?php echo e($message); ?>

                                                </div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <a href="#school-data" class="collapsed text-dark" data-bs-toggle="collapse">
                            <div class="p-4">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 me-3"> <i class="uil uil-truck text-primary h2"></i>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <h5 class="font-size-16 mb-1">Data sekolah asal dan nilai</h5>
                                        <p class="text-muted text-truncate mb-0">Sekolah asal, jurusan, nilai
                                            raport dan ijazah</p>
                                    </div>
                                    <div class="flex-shrink-0"> <i
                                            class="mdi mdi-chevron-up accor-down-icon font-size-24"></i> </div>
                                </div>
                            </div>
                        </a>
                        <div id="school-data" class="collapse">
                            <div class="p-4 border-top">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3 mb-4">
                                            <label class="form-label" for="billing-address">Nama
                                                Sekolah</label>
                                            <select name="sekolah" class="form-control" id="">
                                                <?php $__currentLoopData = $viewSekolah; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $z): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($z->id); ?>">
                                                        <?php echo e($z->nama_sekolah); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            
                                            <?php $__errorArgs = ['sekolah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="alert alert-warning" role="alert">
                                                    <strong>Peringatan!</strong>
                                                    <?php echo e($message); ?>

                                                </div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-lg-2">
                                        <div class="mb-3 mb-4">
                                            <label class="form-label">Semester 1</label>
                                            <input type="number" class="form-control" name="smt1"
                                                placeholder="Masukkan Rata Nilai Semester" value="<?php echo e(old('smt1')); ?>"
                                                required>
                                            <?php $__errorArgs = ['smt1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="alert alert-warning" role="alert">
                                                    <strong>Peringatan!</strong>
                                                    <?php echo e($message); ?>

                                                </div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="mb-3 mb-4">
                                            <label class="form-label">Semester 2</label>
                                            <input type="number" class="form-control" name="smt2"
                                                placeholder="Masukkan Rata Nilai Semester" value="<?php echo e(old('smt2')); ?>"
                                                required>
                                            <?php $__errorArgs = ['smt2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="alert alert-warning" role="alert">
                                                    <strong>Peringatan!</strong>
                                                    <?php echo e($message); ?>

                                                </div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="mb-3 mb-4">
                                            <label class="form-label">Semester 3</label>
                                            <input type="number" class="form-control" name="smt3"
                                                placeholder="Masukkan Rata Nilai Semester" value="<?php echo e(old('smt3')); ?>"
                                                required>
                                            <?php $__errorArgs = ['smt3'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="alert alert-warning" role="alert">
                                                    <strong>Peringatan!</strong>
                                                    <?php echo e($message); ?>

                                                </div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="mb-3 mb-4">
                                            <label class="form-label">Semester 4</label>
                                            <input type="number" class="form-control" name="smt4"
                                                placeholder="Masukkan Rata Nilai Semester" value="<?php echo e(old('smt4')); ?>"
                                                required>
                                            <?php $__errorArgs = ['smt4'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="alert alert-warning" role="alert">
                                                    <strong>Peringatan!</strong>
                                                    <?php echo e($message); ?>

                                                </div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="mb-3 mb-4">
                                            <label class="form-label">Semester 5</label>
                                            <input type="number" class="form-control" name="smt5"
                                                placeholder="Masukkan Rata Nilai Semester" value="<?php echo e(old('smt5')); ?>"
                                                required>
                                            <?php $__errorArgs = ['smt5'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="alert alert-warning" role="alert">
                                                    <strong>Peringatan!</strong>
                                                    <?php echo e($message); ?>

                                                </div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="mb-3 mb-4">
                                            <label class="form-label">Semester 6 <small><i>*jika ada</i></small></label>
                                            <input type="number" class="form-control" name="smt6"
                                                placeholder="Masukkan Rata Nilai Semester" value="<?php echo e(old('smt6')); ?>">
                                            <?php $__errorArgs = ['smt5'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="alert alert-warning" role="alert">
                                                    <strong>Peringatan!</strong>
                                                    <?php echo e($message); ?>

                                                </div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3 mb-4">
                                            <label class="form-label" for="billing-address">Berkas Siswa</label>
                                            <div class="input-group">
                                                <span class="input-group-text">Upload</span>
                                                <div class="form-file">
                                                    <input type="file" class="form-file-input form-control"
                                                        name="ftberkas_siswa" value="<?php echo e(old('ftberkas_siswa')); ?>"
                                                        accept="application/pdf" required>
                                                </div>
                                            </div>
                                            <?php $__errorArgs = ['ftberkas_siswa'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="alert alert-warning" role="alert">
                                                    <strong>Peringatan!</strong>
                                                    <?php echo e($message); ?>

                                                </div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3 mb-4">
                                            <label class="form-label" for="billing-address">Prestasi <small>(jika
                                                    ada)</small></label>
                                            <div class="input-group">
                                                <span class="input-group-text">Upload</span>
                                                <div class="form-file">
                                                    <input type="file" class="form-file-input form-control"
                                                        name="ftprestasi" value="<?php echo e(old('ftprestasi')); ?>"
                                                        accept="application/pdf">
                                                </div>
                                            </div>
                                            <?php $__errorArgs = ['ftprestasi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="alert alert-warning" role="alert">
                                                    <strong>Peringatan!</strong>
                                                    <?php echo e($message); ?>

                                                </div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col">
                            <div class="text-end mt-2 mt-sm-0">
                                <button type="submit" name="add" class="btn btn-primary">Buat Pendaftaran</button>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row-->
                </div>
        </form>
    </div>
    <!-- end row -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.master-admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/app/resources/views/pendaftaran/data-pendaftaran-input-admin.blade.php ENDPATH**/ ?>