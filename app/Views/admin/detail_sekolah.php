<?= $this->extend('templates/template_admin'); ?>

<?= $this->section('content'); ?>
<div class="blok-full blok-beranda detail__sekolah">
    <div class="row">

        <div class="col pt-lg-4 pt-5 back-full">
            <a href="<?= base_url(); ?>/user/index" class="text-black">
                <button class="btn back">
                    <i class="fas fa-home back"></i>
                </button>
            </a>
            <i class="fas fa-chevron-right"></i>
            <a href="<?= base_url(); ?>/sekolah/sekolah" class="text-black">
                <button class="btn back">
                    Sekolah
                </button>
            </a>
            <i class="fas fa-chevron-right"></i>
            <a href="#" class="text-black">
                <button class="btn back">
                    Detail sekolah
                </button>
            </a>
        </div>
        <div class="col pt-lg-4 pt-5 kembali">
            <i class="fas fa-arrow-left"></i>
            <a href="<?= base_url(); ?>/sekolah/sekolah" class="text-black">
                <button class="btn back">
                    Kembali
                </button>
            </a>
        </div>
    </div>
    <div class="container blok-full blok-judul">
        <h1 class="text__blue1 text-center">Detail Sekolah</h1>
    </div>
    <!-- Dtail Sekolah -->
    <div class="row justify-content-center mb-5">
        <!-- Logo SMP -->
        <div class="text-center detail__kiri col-md-3 col-12 align-self-center">
            <img src="/assets/images/logo/<?= $sekolah['logo_sekolah']; ?>" class="img-fluid detail__logo" alt="">
        </div>
        <div class="col-1">
            <div class="vl"></div>
        </div>
        <div class="detail__kanan col-md-8 col-12  align-self-center">
            <table class="table-borderless table">
                <thead>
                    <tr>
                        <th colspan="3" class="text-center">
                            <h3><?= $sekolah['nama_sekolah']; ?></h3>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>NPSN</td>
                        <td>:</td>
                        <td><?= $sekolah['npsn']; ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td><?= $sekolah['alamat']; ?></td>
                    </tr>
                    <tr>
                        <td>Alamat Email</td>
                        <td>:</td>
                        <td><?= $sekolah['email']; ?></td>
                    </tr>
                    <tr>
                        <td>Jumlah Guru</td>
                        <td>:</td>
                        <td><?= ($sekolah['jumlah_guru'] == '') ? '-' : $sekolah['jumlah_guru']; ?></td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <a href="/sekolah/edit_sekolah/<?= $sekolah['npsn']; ?>">
                                <button class="btn btn-primary rounded-pill d-flex align-items-center btn-p1">
                                    <i class="fa fa-edit text-white me-2 d-block mr-2"></i>
                                    <span class="d-block text-white">Edit data</span>
                                </button>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Tabel -->
    <div class="row">
        <!-- Table guru -->
        <div class="col-md-12 table__sekolah mb-3">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <p class="fs-5 fw__r card-title">Data Guru</p>
                        <a class="d-block" href="/guru/tambah_guru/<?= $sekolah['npsn']; ?>">
                            <button class="btn btn-primary rounded-pill d-flex align-items-center btn-p">
                                <i class="fas fa-plus text-white me-2 d-block mr-2"></i>
                                <span class="d-block text-white">Tambah Guru</span>
                            </button>
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <!-- alert kelola guru -->
                    <?php if (session()->getFlashdata('add-msg-guru')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('add-msg-guru'); ?>
                    </div>
                    <?php endif; ?>
                    <?php if (session()->getFlashdata('edit-msg-guru')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('edit-msg-guru'); ?>
                    </div>
                    <?php endif; ?>
                    <?php if (session()->getFlashdata('delete-msg-guru')) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= session()->getFlashdata('delete-msg-guru'); ?>
                    </div>
                    <?php endif; ?>
                    <!-- end alert kelola guru -->

                    <div class="table-responsive">
                        <table id="tabel__guru" class="display table table-hover table-striped table-borderless">
                            <thead>
                                <tr>
                                    <th>NUPTK</th>
                                    <th>Nama guru</th>
                                    <!-- <th>Asal Sekolah</th> -->
                                    <th>Mata Pelajaran</th>
                                    <th style="width: 10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($guru as $guru) : ?>
                                <tr>
                                    <td><?= $guru['nuptk']; ?></td>
                                    <td><?= $guru['nama_guru']; ?></td>
                                    <!-- <td>Batang</td> -->
                                    <td><?= $guru['mata_pelajaran']; ?></td>
                                    <td>
                                        <div class="form-button-action">
                                            <a href="<?= base_url(); ?>/guru/edit_guru/<?= $guru['nuptk']; ?>"
                                                class="d-flex">
                                                <button type="button" data-bs-toggle="tooltip" title="Edit"
                                                    class="btn btn-link btn-lg" data-original-title="Lihat dan Edit">
                                                    <i class="text__blue1 fa fa-edit"></i>
                                                </button>
                                            </a>
                                            <a href="<?= base_url(); ?>/guru/hapus_guru/<?= $guru['nuptk']; ?>"
                                                class="d-flex">
                                                <button type="button" data-bs-toggle="tooltip" title=""
                                                    class="btn btn-link" data-original-title="Hapus">
                                                    <i class="far fa-trash-alt text-danger"></i>
                                                </button>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- end tabel guru -->
    </div> <!-- end table -->
</div>

<?= $this->endSection(); ?>