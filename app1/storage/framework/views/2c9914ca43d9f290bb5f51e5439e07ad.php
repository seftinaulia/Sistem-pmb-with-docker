<div class="row">
    <div class="col-xl-12">
        <div class="row">
            <div class="col-xl-6">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card tryal-gradient">
                            <div class="card-body tryal row">
                                <div class="col-xl-7 col-sm-6">
                                    <h2>Selamat Datang, <?php if(auth()->guard()->check()): ?>
                                            <?php echo e(auth()->user()->name); ?>

                                        <?php endif; ?>
                                    </h2>
                                    <span>Terus pantau kegiatan penerimaan mahasiswa baru Universitas Bhinneka
                                        PGRI</span>
                                    <a href="<?php echo e(route('data-registration')); ?>"
                                        class="btn btn-rounded  fs-18 font-w500">Lihat
                                        pendaftar</a>
                                </div>
                                <div class="col-xl-5 col-sm-6">
                                    <img src="<?php echo e(asset('assets/images/chart.png')); ?>" alt="" class="sd-shape">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-6 col-sm-6">
                                        <div class="items">
                                            <h4 class="fs-20 font-w700 mb-4">Data Progress <br> Penerimaan Mahasiswa
                                                Baru</h4>
                                            <span class="fs-14 font-w400">Data yang baru masuk dan telah
                                                diverifikasi oleh admin akan dapat melanjutkan kegiatan
                                                penerimaan</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 redial col-sm-6">

                                        <?php
                                            $aa = 0;
                                            $bb = 0;
                                        ?>
                                        <?php $__currentLoopData = $viewTotal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $x): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(!$x->status_pendaftaran): ?>
                                                <?php
                                                    $aa = $x->jumlah;
                                                ?>
                                            <?php elseif($x->status_pendaftaran): ?>
                                                <?php
                                                    $bb = $x->jumlah;
                                                ?>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $hsl = $aa + $bb;
                                            $hslpersenanbaru = ($hsl * 100) / $jmlpendaftar;
                                        ?>

                                        <div id="redial"></div>
                                        <span class="text-center d-block fs-18 font-w600">Sedang berlangsung
                                            <small class="text-orange"><span
                                                    id="progressnya"><?php echo e($hslpersenanbaru); ?></span>
                                                %</small></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-xl-6 col-sm-6">
                                <div class="card">
                                    <div class="card-body d-flex px-4 pb-0 justify-content-between">
                                        <div>
                                            <h4 class="fs-18 font-w600 mb-4 text-nowrap">Pendaftar
                                            </h4>
                                            <div class="d-flex align-items-center">
                                                <h2 class="fs-32 font-w700 mb-0"><?php echo e($jmlpendaftar); ?></h2>
                                                
                                            </div>

                                            <span class="fs-16 font-w400">Pendaftar saat ini </span>
                                        </div>
                                        <?php
                                            $no = 1;
                                        ?>
                                        <div id="columnChart">
                                            <?php $__currentLoopData = $jmlpendaftarprodi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $x): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <span id="prodi<?php echo e($no); ?>" style="color:transparent"
                                                    aria-disabled><?php echo e($x->jmldaftarprodi); ?></span>
                                                <?php
                                                    $no++;
                                                ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-sm-6">
                                <div class="card">
                                    <div class="card-body px-4 pb-0">
                                        <h4 class="fs-18 font-w600 mb-5 text-nowrap">Hasil Seleksi Pendaftar</h4>
                                        <div class="progress default-progress">

                                            <?php
                                                $a = 0;
                                                $b = 0;
                                            ?>
                                            <?php $__currentLoopData = $jmlpengumuman; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $x): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($x->hasil_seleksi == 'LULUS'): ?>
                                                    <?php
                                                        $a = $x->jumlah;
                                                    ?>
                                                <?php elseif($x->hasil_seleksi == 'TIDAK LULUS'): ?>
                                                    <?php
                                                        $b = $x->jumlah;
                                                    ?>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                $hasil = $a + $b;
                                                $hasilpersenan = ($hasil * 100) / $jmlpendaftar;
                                            ?>
                                            <div class="progress-bar bg-gradient1 progress-animated"
                                                style="width: <?php echo e($hasilpersenan); ?>%; height:10px;" role="progressbar">
                                            </div>

                                        </div>
                                        <div class="d-flex align-items-end mt-2 pb-3 justify-content-between">
                                            <span><?php echo e($hasil); ?> yang telah diberi <br> pengumuman</span>
                                            <h4 class="mb-0"><?php echo e($hasil); ?>/<?php echo e($jmlpendaftar); ?></h4>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-sm-6">
                                <div class="card">
                                    <div class="card-body d-flex px-4  justify-content-between">
                                        <div>
                                            <div class="">
                                                <h4 class="fs-32 font-w700"><?php echo e($jmluser); ?></h4>
                                                <span class="fs-18 font-w500 d-block">Total
                                                    Pengguna</span></span>
                                            </div>
                                        </div>
                                        <div id="NewCustomers"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-sm-6">
                                <div class="card">
                                    <div class="card-body d-flex px-4  justify-content-between">
                                        <div>
                                            <div class="">
                                                <p style="margin: 0%"><b>Rp</b></p>
                                                <h5 class="fs-32 font-w700">
                                                    <?php echo e(number_format($jmlbayar * 150000, 0, 0, '.')); ?></h5>
                                                <span class="fs-18 font-w500 d-block">Jumlah Pembayaran</span>
                                            </div>
                                        </div>
                                        <div id="NewCustomers1"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header border-0 pb-0">
                                <h4 class="card-title">Linimasa </h4>
                            </div>
                            <div class="card-body">
                                <div id="DZ_W_TimeLine11" class="widget-timeline dlab-scroll style-1 height150">
                                    <ul class="timeline">
                                        <?php if($countTimeline == 0): ?>
                                            <li>
                                                <div class="timeline-badge primary"></div>
                                                <a class="timeline-panel text-muted" href="#">
                                                    <span>Belum ada data</span>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                        <?php $__currentLoopData = $timeline; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li> <?php
                                                $no = 1;
                                            ?>
                                                <?php $__currentLoopData = $viewDataUser; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $x): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($x->user_id == $item->user_id && $no == 1): ?>
                                                        <div class="timeline-badge primary"></div>
                                                        <a class="timeline-panel text-muted" href="#">
                                                            <span><?php echo e($item->tgl_update); ?></span>
                                                            <h6 class="mb-0"><strong class="text-primary">
                                                                    #<?php echo e($x->user->name); ?>

                                                                </strong>,<?php echo e($item->status_pendaftaran); ?>.
                                                            </h6>
                                                        </a>
                                                    <?php elseif($x->user_id != $item->user_id && $no == 1): ?>
                                                        <div class="timeline-badge warning">
                                                        </div>
                                                        <a class="timeline-panel text-muted" href="#">
                                                            <span><?php echo e($item->tgl_update); ?></span>
                                                            <h6 class="mb-0">#<?php echo e($item->user->name); ?>,
                                                                <?php echo e($item->status_pendaftaran); ?>.</h6>
                                                        </a>
                                                    <?php endif; ?>
                                                    <?php
                                                        $no++;
                                                    ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Pendaftaran</h4>
            </div>
            <div class="card-body" id="cetak">
                <div class="table-responsive">
                    <?php echo e(csrf_field()); ?>


                    <table id="example" class="display" style="min-width: 845px">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Peserta</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Tanggal Daftar</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php $__currentLoopData = $pendaftar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $x): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($no++); ?></td>
                                    <td><?php echo e($x->id_pendaftaran); ?></td>
                                    <td><?php echo e($x->nama_siswa); ?></td>
                                    <td><?php echo e($x->jenis_kelamin); ?></td>
                                    <td><strong><?php echo e($x->tgl_pendaftaran); ?></strong></a></td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <?php if($x->status_pendaftaran): ?>
                                                    <span class="badge badge-success">Terverifikasi<span
                                                            class="ms-1 fa fa-check"></span>
                                                    <?php elseif($x->status_pendaftaran == false): ?>
                                                        <span class="badge badge-warning">Belum Terverifikasi<span
                                                                class="ms-1 fas fa-stream"></span>
                                                        <?php elseif($x->status_pendaftaran == null): ?>
                                                            <span class="badge badge-info">Tidak Sesuai<span
                                                                    class="ms-1 fa fa-ban"></span>
                                                            <?php else: ?>
                                                                <span class="badge badge-danger">Not Found<span
                                                                        class="ms-1 fa fa-search"></span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="dropdown text-sans-serif"><button
                                                        class="btn btn-primary tp-btn-light sharp" type="button"
                                                        id="order-dropdown-7" data-bs-toggle="dropdown"
                                                        data-boundary="viewport" aria-haspopup="true"
                                                        aria-expanded="false"><span><svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                width="18px" height="18px" viewbox="0 0 24 24"
                                                                version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none"
                                                                    fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24">
                                                                    </rect>
                                                                    <circle fill="#000000" cx="5"
                                                                        cy="12" r="2">
                                                                    </circle>
                                                                    <circle fill="#000000" cx="12"
                                                                        cy="12" r="2">
                                                                    </circle>
                                                                    <circle fill="#000000" cx="19"
                                                                        cy="12" r="2">
                                                                    </circle>
                                                                </g>
                                                            </svg></span></button>
                                                    <div class="dropdown-menu dropdown-menu-end border py-0"
                                                        aria-labelledby="order-dropdown-7">
                                                        <div class="py-2"><a class="dropdown-item"
                                                                href="/verified-registration/<?php echo e($x->id_pendaftaran); ?>">Terverifikasi</a><a
                                                                class="dropdown-item"
                                                                href="/notverified-registration/<?php echo e($x->id_pendaftaran); ?>">Belum
                                                                Terverifikasi</a>
                                                            <div class="dropdown-divider"></div><a
                                                                class="dropdown-item text-danger"
                                                                href="/invalid-registration/<?php echo e($x->id_pendaftaran); ?>">Tidak
                                                                Sah</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <a class="btn btn-light shadow btn-xs sharp me-1"
                                                title="Detail Registration"
                                                href="detail-registration/<?php echo e($x->id_pendaftaran); ?>"><i
                                                    class="fa fa-file-alt"></i></a>
                                            <a class="btn btn-primary shadow btn-xs sharp me-1" title="Edit"
                                                href="edit-registration/<?php echo e($x->id_pendaftaran); ?>"><i
                                                    class="fa fa-pencil-alt"></i></a>
                                            <a class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"
                                                    data-bs-toggle="modal"
                                                    data-bs-target=".delete<?php echo e($x->id_pendaftaran); ?>"></i></a>
                                            <div class="modal fade delete<?php echo e($x->id_pendaftaran); ?>" tabindex="-1"
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
                                                            menghapus data ini?<?php echo e($x->id_pendaftaran); ?>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger light"
                                                                data-bs-dismiss="modal">Tidak</button>
                                                            <a href="delete-registration/<?php echo e($x->id_pendaftaran); ?>">
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
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /var/www/app/resources/views/dashboard/dashboard-admin.blade.php ENDPATH**/ ?>