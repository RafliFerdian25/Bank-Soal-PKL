<?php if (in_groups('admin')) { ?>
    <?= $this->extend('templates/template_admin'); ?>
<?php } else if (in_groups('guru')) { ?>
    <?= $this->extend('templates/template_guru'); ?>
<?php }; ?>
<?= $this->section('content'); ?>

<div class="blok-full blok-beranda">
    <div class="pt-lg-4 pt-5">
        <a href="<?= base_url(); ?>/user/index" class="text-black">
            <button class="btn back">
                <i class="fas fa-home back"></i>
            </button>
        </a>
        <i class="fas fa-chevron-right"></i>
        <a href="#" class="text-black">
            <button class="btn back">
                Sekolah
            </button>
        </a>
    </div>
    <div class="container blok-full blok-judul">
        <h1 class="text__blue1 text-center">Data Sekolah</h1>
    </div>
    <!-- Tabel -->
    <div class="row">
        <!-- Table sekolah -->
        <div class="col-md-12 table__sekolah mb-3">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <p class="fs-5 fw__r card-title">Data Sekolah</p>
                        <a class="d-block" href="/sekolah/tambah_sekolah">
                            <button class="btn btn-primary rounded-pill d-flex align-items-center btn-p">
                                <i class="fas fa-plus text-white me-2  d-block mr-2"></i>
                                <span class="d-block text-white">Tambah Sekolah</span>
                            </button>
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <!-- alert kelola Sekolah -->
                    <?php if (session()->getFlashdata('pesan-tambah-sekolah')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->getFlashdata('pesan-tambah-sekolah'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if (session()->getFlashdata('pesan-edit-sekolah')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->getFlashdata('pesan-edit-sekolah'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if (session()->getFlashdata('pesan-hapus-sekolah')) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->getFlashdata('pesan-hapus-sekolah'); ?>
                        </div>
                    <?php endif; ?>
                    <!-- end alert kelola Sekolah -->

                    <div class="table-responsive">
                        <table id="tabel__sekolah" class="display table table-hover table-striped table-borderless">
                            <thead>
                                <tr>
                                    <th>NPSN</th>
                                    <th>Nama Sekolah</th>
                                    <th>Alamat</th>
                                    <th>Alamat Email</th>
                                    <th>Jumlah Guru</th>
                                    <!-- <th>Jumlah Siswa</th> -->
                                    <th style="width: 10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($sekolah as $sekolah) : ?>
                                    <tr>
                                        <td><?= $sekolah['npsn']; ?></td>
                                        <td><?= $sekolah['nama_sekolah']; ?></td>
                                        <td><?= $sekolah['alamat']; ?></td>
                                        <td><?= $sekolah['email']; ?></td>
                                        <td class="text-center">
                                            <?= ($sekolah['jumlah_guru'] == '') ? '-' : $sekolah['jumlah_guru']; ?></td>
                                        <td>
                                            <div class="form-button-action">
                                                <a href="/sekolah/detail_sekolah/<?= $sekolah['npsn']; ?>" class="d-flex">
                                                    <button type="button" data-bs-toggle="tooltip" title="Detail" data-bs-placement="top" class="btn detail" data-original-title="Detail">
                                                        Detail
                                                    </button>
                                                </a>
                                                <a href="<?= base_url(); ?>/sekolah/hapus_sekolah/<?= $sekolah['npsn']; ?>" type="button" class="btn hapus_sekolah" id="" data-bs-toggle="tooltip" data-original-title="Hapus" title="Hapus" data-bs-placement="top">
                                                    <i class="far fa-trash-alt text-danger"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach;  ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- end tabel Sekolah -->
    </div> <!-- end table -->
</div>

<?= $this->endSection(); ?>