<?php if (in_groups('admin')) { ?>
<?= $this->extend('templates/template_admin'); ?>
<?php } else { ?>
<?= $this->extend('templates/template_guru'); ?>
<?php }; ?>
<?= $this->section('content'); ?>
<div class="blok-full blok-beranda detail__soal">
    <div class="row">

        <div class="col pt-lg-4 pt-5 back-full">
            <a href="<?= base_url(); ?>/user/index" class="text-black">
                <button class="btn back">
                    <i class="fas fa-home back"></i>
                </button>
            </a>
            <i class="fas fa-chevron-right"></i>
            <?php if (in_groups('admin')) { ?>
            <a href="/mapel/mapel" class="text-black">
                <button class="btn back">
                    Mata pelajaran
                </button>
            </a>
            <i class="fas fa-chevron-right"></i>
            <?php } ?>
            <a href="/soal/daftar_soal/<?= $soal['id_mapel']; ?>" class="text-black">
                <button class="btn back">
                    Daftar soal
                </button>
            </a>
            <i class="fas fa-chevron-right"></i>
            <a href="#" class="text-black">
                <button class="btn back">
                    Detail soal
                </button>
            </a>
        </div>
        <div class="col pt-lg-4 pt-5 kembali">
            <a href="/soal/daftar_soal/<?= $soal['id_mapel']; ?>" class="text-black">
                <i class="fas fa-arrow-left"></i>
                <button class="btn back">
                    Kembali
                </button>
            </a>
        </div>
    </div>
    <div class="container blok-full blok-judul">
        <h1 class="text__blue1 text-center">Detail Soal</h1>
    </div>
    <!-- Soal -->
    <div class="card">
        <div class="card-header">
            <h2 class="text-center text__blue1 m-0"><?= $soal['nama_mapel']; ?></h2>
            <h5 class="fs-5 fw-normal text-center"><?= $soal['nama_materi']; ?></h5>
        </div>
        <div class="card-body p-5">
            <?php if (session()->getFlashdata('pesan-edit-soal')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan-edit-soal'); ?>
            </div>
            <?php endif; ?>
            <div class="soal row">
                <div class="col-md-4 col-xl-3 col-12 text-center " <?= ($soal['soal_img'] == null) ? 'hidden' : '' ?>>
                    <img src="<?= base_url(); ?>/assets/images/soal/<?= $soal['soal_img']; ?>" alt=""
                        class="soal__img img-fluid me-3 mb-3 ">
                </div>
                <!-- end soal image -->
                <div class="col-md-8 col-xl-9 col-12 isi__soal">
                    <p class="align-self-center text-md-start soal__soal"><?= $soal['soal']; ?></p>
                    <!-- pilihan ganda -->
                    <div class="pilihan">
                        <!-- A -->
                        <div class="row justify-content-start">
                            <div class="col-1">
                                A.
                            </div>
                            <div class="col-10">
                                <?= $soal['opsi_a']; ?>
                            </div>
                        </div>
                        <!-- B -->
                        <div class="row justify-content-start">
                            <div class="col-1">
                                B.
                            </div>
                            <div class="col-10">
                                <?= $soal['opsi_b']; ?>
                            </div>
                        </div>
                        <!-- C -->
                        <div class="row justify-content-start">
                            <div class="col-1">
                                C.
                            </div>
                            <div class="col-10">
                                <?= $soal['opsi_c']; ?>
                            </div>
                        </div>
                        <!-- D -->
                        <div class="row justify-content-start">
                            <div class="col-1">
                                D.
                            </div>
                            <div class="col-10">
                                <?= $soal['opsi_d']; ?>
                            </div>
                        </div>
                    </div>
                    <!-- end pilihan jawaban -->
                </div>
                <!-- end soal -->
                <!-- Jawaban benar -->
                <div class="d-md-flex justify-content-start">
                    <p class="fw-bold ">
                        Jawaban benar :
                    </p>
                    <div class="jawaban">
                        <?= $soal['jawaban']; ?>.
                        <?php if ($soal['jawaban'] == 'A') {
                            echo $soal['opsi_a'];
                        } else if ($soal['jawaban'] == 'B') {
                            echo $soal['opsi_b'];
                        } else if ($soal['jawaban'] == 'C') {
                            echo $soal['opsi_c'];
                        } else {
                            echo $soal['opsi_d'];
                        }; ?>
                    </div>
                </div>
                <!-- end jawaban benar -->
                <div class="d-md-flex justify-content-start">
                    <p class=" fw-bold">
                        Alasan jawaban :
                    </p>
                    <div class="jawaban">
                        <?= $soal['alasan_jawaban']; ?>
                    </div>
                </div>
                <?php if ($soal['alasan_jawaban_img'] != null) : ?>
                <div class="d-md-flex justify-content-start">
                    <p class=" fw-bold">
                        Scan alasan jawaban :
                    </p>
                    <div class="text-center  me-3 mb-3 " <?= ($soal['alasan_jawaban_img'] == null) ? 'hidden' : '' ?>>
                        <img src="<?= base_url(); ?>/assets/images/soal/<?= $soal['alasan_jawaban_img']; ?>" alt=""
                            class="soal__img img-fluid">
                    </div>
                    <?php endif; ?>
                    <!-- end alasan jawaban image -->
                </div>
                <!-- end alasan jawaban -->
                <div class="d-flex justify-content-end">
                    <?php if (in_groups('mgmp')) : ?>
                    <button type="button"
                        class="btn btn-primary rounded-pill d-flex align-items-center btn-p1 mt-3 me-2"
                        data-bs-toggle="modal" data-bs-target="#statusSoalModal">
                        <!-- <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400 text-white"></i> -->
                        Edit Status Soal
                    </button>
                    <?php endif ?>

                    <a href="/soal/edit_soal/<?= $soal['id_soal']; ?>">
                        <button class="btn btn-primary rounded-pill d-flex align-items-center btn-p1 mt-3">
                            <!-- <i class="fa fa-edit text-white me-2 d-block mr-2"></i> -->
                            <span class="d-block text-white">Edit Soal</span>
                        </button>
                    </a>
                </div>
                <!-- end button edit -->
            </div>
        </div>
        <div class="card-footer">
            <?php $date = date_create($soal['tgl_input']) ?>
            <p>Keterengan soal : </p>
            <ol>
                <li>Tanggal input soal : <?= date_format($date, "d-m-Y"); ?></li>
                <li>Status soal : <?= $soal['nama_status_soal']; ?> validasi</li>
            </ol>
        </div>
    </div>
    <!-- Modal edit status soal -->
    <div class="modal fade" id="statusSoalModal" tabindex="-1" aria-labelledby="statusSoalModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="statusSoalModalLabel">Edit status soal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/soal/edit_status_soal/<?= $soal['id_soal']; ?>" method="post">
                    <div class="modal-body">
                        <p>Status Soal : <?= $soal['nama_status_soal']; ?> validasi</p>
                        <select name="status_soal" id="" class="form-select">
                            <option <?= ($soal['id_status_soal'] == 1) ? 'selected' : ''; ?> value="1">Belum validasi
                            </option>
                            <option <?= ($soal['id_status_soal'] == 2) ? 'selected' : ''; ?> value="2">Lolos validasi
                            </option>
                            <option <?= ($soal['id_status_soal'] == 3) ? 'selected' : ''; ?> value="3">Tidak lolos
                                validasi</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>