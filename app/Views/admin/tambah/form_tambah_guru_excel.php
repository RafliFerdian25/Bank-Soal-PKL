<?php if (in_groups('admin')) { ?>
<?= $this->extend('templates/template_admin'); ?>
<?php } else if (in_groups('guru')) { ?>
<?= $this->extend('templates/template_guru'); ?>
<?php }; ?>
<?= $this->section('content'); ?>
<div class="blok-full">
    <div class="row">
        <div class="col pt-lg-4 pt-5 back-full">

            <a href="<?= base_url(); ?>/user/index" class="text-black">
                <button class="btn back">
                    <i class="fas fa-home back"></i>
                </button>
            </a>
            <i class="fas fa-chevron-right"></i>
            <a href="<?= base_url(); ?>/guru/guru" class="text-black">
                <button class="btn back">
                    Guru
                </button>
            </a>
            <i class="fas fa-chevron-right"></i>
            <a href="#" class="text-black">
                <button class="btn back">
                    Tambah data guru
                </button>
            </a>
        </div>
        <div class="col pt-lg-4 pt-5 kembali">
            <a href="<?= base_url(); ?>/guru/guru" class="text-black">
                <i class="fas fa-arrow-left"></i>
                <button class="btn back">
                    Kembali
                </button>
            </a>
        </div>
    </div>
    <div class="container blok-full blok-judul">
        <h1 class="text__blue1 text-center">Formulir Guru</h1>
    </div>
    <div class="col-md-12 mb-3 card">
        <div class="card-header p-3">
            <div class=" align-items-center justify-content-between">
                <p class="m-0 fs-4 fw__r card-title">Tambah guru dengan excel</p>
            </div>
        </div>
        <div class="card-body p-4">
            <div class="mb-3">
                <h6>Ketentuan unggah : </h6>
                <ol type="A">
                    <li>File harus harus berbentuk (ekstensi) .xls atau .xlsx.File harus harus berbentuk (ekstensi) .xls
                        atau .xlsx.</li>
                    <li>Format kolom harus seperti gambar dibawah ini:</li>
                    <img class="img-fluid mb-2 ms-3" src="<?= base_url(); ?>/assets/images/contoh-excel-guru.png"
                        alt="">
                    <li>Kolom yang wajib diisi : NUPTK, NPSN, Nama Guru, No Mata Pelajaran</li>
                    <li>Kolom No Mata Pelajaran harus diisi dengan angka dan diambil dari nomer urut materi dibawah
                        ini
                        :
                        <?php $i = 1; ?>
                        <?php foreach ($mapel as $data_mapel) : ?>
                        <p class="ms-2 mb-2"><?= $i; ?>. <?= $data_mapel['nama_mapel']; ?></p>
                        <?php $i++; ?>
                        <?php endforeach; ?>
                    </li>

                </ol>
                <br>
                <p>Catatan: </p>
                <p>File excel bisa menggunakan templat file yang telah disediakan. <br> Untuk mengunduh templat soal
                    tekan tombol dibawah ini.
                </p>
                <a href="/guru/download_template">
                    <button class="btn btn-primary">
                        Unduh Templat
                    </button>
                </a>
                <p></p>
            </div>


        </div>
        <div class="card-action p-4">
            <form action="/guru/simpan_tambah_guru_excel" method="post" class="needs-validation"
                enctype="multipart/form-data" novalidate>
                <div class="my-5 row">
                    <label for="guru_excel" class="col-md-2 text-md-end align-self-center form-label">Unggah file guru
                    </label>
                    <div class="col-lg-9 col-md-10 row ">
                        <div class="col-12 input-file">
                            <input required
                                class="form-control form-control-file <?= ($validation->hasError('guru_excel')) ? 'is-invalid' : ''; ?>"
                                type="file" id="guru_excel" name="guru_excel"
                                accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                        </div>
                        <div class="invalid-feedback">
                            <?= ($validation->getError('guru_excel') == '') ? 'Bagian Gambar guru wajib diisi' : $validation->getError('guru_excel'); ?>
                        </div>
                    </div>
                </div>
                <!-- end guru image -->
                <div class="row">
                    <div class="col-12 justify-content-end d-flex">
                        <a href="/guru/guru" class="btn btn-danger me-4 rounded-pill btn-submit fs-7">
                            Batal
                        </a>
                        <button type="submit" class="btn btn-primary rounded-pill btn-submit fs-7">Tambah</button>
                    </div>
            </form>
        </div>
    </div>
</div>
</div>
<?= $this->endSection(); ?>