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
                Mata pelajaran
            </button>
        </a>
    </div>
    <div class="container blok-full blok-judul">
        <h1 class="text__blue1 text-center">Data Bank Soal</h1>
    </div>
    <!-- Tabel -->
    <div class="row">
        <!-- Table mata pelajaran -->
        <div class="col-md-12 table__sekolah mb-3">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <p class="fs-5 fw__r card-title">Data Mata Pelajaran</p>
                        <a class="d-block" href="/mapel/tambah_mapel">
                            <button class="btn btn-primary rounded-pill d-flex align-items-center btn-p">
                                <i class="fas fa-plus text-white me-2 d-block mr-2"></i>
                                <span class="d-block text-white">Tambah Mata Pelajaran</span>
                            </button>
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <!-- alert kelola mata pelajaran -->
                    <?php if (session()->getFlashdata('pesan-tambah-mapel')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('pesan-tambah-mapel'); ?>
                    </div>
                    <?php endif; ?>
                    <?php if (session()->getFlashdata('pesan-edit-mapel')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('pesan-edit-mapel'); ?>
                    </div>
                    <?php endif; ?>
                    <?php if (session()->getFlashdata('pesan-hapus-mapel')) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= session()->getFlashdata('pesan-hapus-mapel'); ?>
                    </div>
                    <?php endif; ?>
                    <!-- end alert kelola mata pelajaran -->

                    <div class="table-responsive">
                        <table id="tabel__matapelajaran"
                            class="display table table-hover table-striped table-borderless">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Jumlah soal</th>
                                    <th style="width: 10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($mapel as $mapel) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $mapel['nama_mapel']; ?></td>
                                    <td><?= $jumlah_soal[$i - 1]; ?></td>
                                    <td>
                                        <div class="form-button-action">
                                            <a href="/soal/daftar_soal/<?= $mapel['id_mapel']; ?>/1" class="d-flex">
                                                <button type="button" data-bs-toggle="tooltip" title=""
                                                    class="btn detail btn-lg" data-original-title="Lebih detail">
                                                    Selengkapnya
                                                </button>
                                            </a>
                                            <a href="/mapel/edit_mapel/<?= $mapel['id_mapel']; ?>" class="d-flex">
                                                <button type="button" data-bs-toggle="tooltip" title=""
                                                    class="btn btn-link  btn-lg" data-original-title="Lihat dan Edit">
                                                    <i class="fa fa-edit text__blue1"></i>
                                                </button>
                                            </a>
                                            <a id="hapus_mapel"
                                                href="<?= base_url(); ?>/mapel/hapus_mapel/<?= $mapel['id_mapel']; ?>"
                                                class="d-flex hapus_mapel">
                                                <button type="button" data-bs-toggle="tooltip" title=""
                                                    class="btn btn-link hapus_mapel" data-original-title="Hapus">
                                                    <i class="far fa-trash-alt text-danger"></i>
                                                </button>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- end tabel mata pelajaran -->
    </div> <!-- end table -->
</div>
<?= $this->endSection(); ?>