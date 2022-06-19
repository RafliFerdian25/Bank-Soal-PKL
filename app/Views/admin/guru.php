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
                Guru
            </button>
        </a>
    </div>
    <div class="container blok-full blok-judul">
        <h1 class="text__blue1 text-center">Data Guru</h1>
    </div>
    <!-- Tabel -->
    <div class="row">
        <!-- Table guru -->
        <div class="col-md-12 table__sekolah mb-3">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <p class="fs-5 fw__r card-title">Data Guru</p>
                        <a class="d-block" href="/guru/tambah_guru">
                            <button class="btn btn-primary rounded-pill d-flex align-items-center btn-p">
                                <i class="fas fa-plus text-white me-2 d-block mr-2"></i>
                                <span class="d-block text-white">Tambah Guru</span>
                            </button>
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <!-- alert kelola guru -->
                    <?php if (session()->getFlashdata('pesan-tambah-guru')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('pesan-tambah-guru'); ?>
                    </div>
                    <?php endif; ?>
                    <?php if (session()->getFlashdata('pesan-edit-guru')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('pesan-edit-guru'); ?>
                    </div>
                    <?php endif; ?>
                    <?php if (session()->getFlashdata('pesan-hapus-guru')) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= session()->getFlashdata('pesan-hapus-guru'); ?>
                    </div>
                    <?php endif; ?>
                    <!-- end alert kelola guru -->

                    <div class="table-responsive">
                        <table id="tabel__guru" class="display table table-hover table-striped table-borderless">
                            <thead>
                                <tr>
                                    <th>NUPTK</th>
                                    <th>NIP</th>
                                    <th>Nama guru</th>
                                    <th>Asal Sekolah</th>
                                    <th>Mata Pelajaran</th>
                                    <th style="width: 10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($guru as $guru) : ?>
                                <tr>
                                    <td><?= $guru['nuptk']; ?></td>
                                    <td><?= $guru['nip']; ?></td>
                                    <td><?= $guru['nama_guru']; ?></td>
                                    <td><?= $guru['sekolah_induk']; ?></td>
                                    <td><?= $guru['mata_pelajaran']; ?></td>
                                    <td>
                                        <div class="form-button-action">
                                            <a href="<?= base_url(); ?>/guru/edit_guru/<?= $guru['nuptk']; ?>"
                                                class="d-flex">
                                                <button type="button" data-bs-toggle="tooltip" title="Lihat dan Edit"
                                                    class="btn btn-link btn-lg" data-original-title="Lihat dan Edit">
                                                    <i class="text__blue1 fa fa-edit"></i>
                                                </button>
                                            </a>
                                            <a href="<?= base_url(); ?>/guru/hapus_guru/<?= $guru['nuptk']; ?>"
                                                class="d-flex hapus_guru">
                                                <button type="button" data-bs-toggle="tooltip" title="Hapus"
                                                    class="btn btn-link" data-original-title="Hapus">
                                                    <i class="far fa-trash-alt text-danger"></i>
                                                </button>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                <?php foreach ($guru_tanpa_sekolah as $guru_tanpa_sekolah) : ?>
                                <tr>
                                    <td><?= $guru_tanpa_sekolah['nuptk']; ?></td>
                                    <td><?= $guru_tanpa_sekolah['nip']; ?></td>
                                    <td><?= $guru_tanpa_sekolah['nama_guru']; ?></td>
                                    <td>Belum Ada</td>
                                    <td><?= $guru_tanpa_sekolah['mata_pelajaran']; ?></td>
                                    <td>
                                        <div class="form-button-action">
                                            <a href="<?= base_url(); ?>/guru/edit_guru/<?= $guru_tanpa_sekolah['nuptk']; ?>"
                                                class="d-flex">
                                                <button type="button" data-bs-toggle="tooltip" title="Lihat dan Edit"
                                                    class="btn btn-link btn-lg" data-original-title="Lihat dan Edit">
                                                    <i class="text__blue1 fa fa-edit"></i>
                                                </button>
                                            </a>
                                            <a href="<?= base_url(); ?>/guru/hapus_guru/<?= $guru_tanpa_sekolah['nuptk']; ?>"
                                                class="d-flex hapus_guru">
                                                <button type="button" data-bs-toggle="tooltip" title="Hapus"
                                                    class="btn btn-link" data-original-title="Hapus">
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
        </div> <!-- end tabel guru -->
    </div> <!-- end table -->
</div>
<?= $this->endSection(); ?>