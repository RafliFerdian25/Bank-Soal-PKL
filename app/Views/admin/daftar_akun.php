<?php

use Myth\Auth\Controllers\AuthController;
?>
<?= $this->extend('templates/template_admin'); ?>

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
                Manajemen akun
            </button>
        </a>
    </div>
    <div class="container blok-full blok-judul">
        <h1 class="text__blue1 text-center">Manajemen Akun</h1>
    </div>
    <!-- Tabel -->
    <div class="row">
        <!-- Table akun -->
        <div class="col-md-12 table__sekolah mb-3">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <p class="fs-5 fw__r card-title">Daftar akun</p>
                        <a href="<?= route_to('register') ?>" class="d-block">
                            <button class="btn btn-primary rounded-pill d-flex align-items-center btn-p">
                                <i class="fas fa-plus text-white me-2  d-block mr-2"></i>
                                <span class="d-block text-white">Tambah Akun</span>
                            </button>
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <!-- alert kelola akun -->
                    <?php if (session()->getFlashdata('message')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->getFlashdata('message'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if (session()->getFlashdata('pesan-edit-akun')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->getFlashdata('pesan-edit-akun'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if (session()->getFlashdata('pesan-hapus-akun')) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->getFlashdata('pesan-hapus-akun'); ?>
                        </div>
                    <?php endif; ?>
                    <!-- end alert kelola akun -->

                    <div class="table-responsive">
                        <table id="tabel__akun" class="display table table-hover table-striped table-borderless">
                            <thead>
                                <tr>
                                    <th>Id Pengguna</th>
                                    <th>Alamat Email</th>
                                    <th>Username</th>
                                    <th>NUPTK</th>
                                    <th>Peran</th>
                                    <th style="width: 10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $user) : ?>
                                    <tr>
                                        <td><?= $user['userid']; ?></td>
                                        <td><?= $user['email']; ?></td>
                                        <td><?= $user['username']; ?></td>
                                        <td><?= ($user['nuptk'] == null) ? 'belum ada' : $user['nuptk']; ?></td>
                                        <td><?= ucfirst($user['name']);  ?></td>
                                        <td>
                                            <div class="form-button-action">
                                                <a href="/user/edit_akun/<?= $user['userid']; ?>" class="d-flex">
                                                    <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link  btn-lg" data-original-title="Lihat dan Edit">
                                                        <i class="fa fa-edit text__blue1"></i>
                                                    </button>
                                                </a>
                                                <a href="/user/hapus_akun/<?= $user['userid']; ?>" class="d-flex hapus_akun">
                                                    <button type="button" data-bs-toggle="tooltip" title="Hapus" data-bs-placement="top" class="btn btn-link" data-original-title="Hapus">
                                                        <i class="far fa-trash-alt text-danger"></i>
                                                    </button>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- end tabel akun -->
    </div> <!-- end table -->
</div>
<?= $this->endSection(); ?>