<?php if (in_groups('admin')) { ?>
<?= $this->extend('templates/template_admin'); ?>
<?php } else if (in_groups('guru')) { ?>
<?= $this->extend('templates/template_guru'); ?>
<?php }; ?>
<?= $this->section('content'); ?>
<div class="blok-full">
    <div class="row">

        <?php if (in_groups('admin')) { ?>
        <div class="col pt-lg-4 pt-5">
            <a href="<?= base_url(); ?>/user/index" class="text-black">
                <button class="btn back">
                    <i class="fas fa-home back"></i>
                </button>
            </a>
            <i class="fas fa-chevron-right"></i>
            <a href="/mapel/mapel" class="text-black">
                <button class="btn back">
                    Mata pelajaran
                </button>
            </a>
            <i class="fas fa-chevron-right"></i>
            <a href="/soal/daftar_soal/<?= $materi[0]['id_mapel']; ?>" class="text-black">
                <button class="btn back">
                    Daftar soal
                </button>
            </a>
            <i class="fas fa-chevron-right"></i>
            <a href="#" class="text-black">
                <button class="btn back">
                    Tambah soal
                </button>
            </a>
        </div>
        <?php } else { ?>
        <div class="col pt-lg-4 pt-5">
            <a href="<?= base_url(); ?>/user/index" class="text-black">
                <button class="btn back">
                    <i class="fas fa-home back"></i>
                </button>
            </a>
            <i class="fas fa-chevron-right"></i>
            <a href="/soal/daftar_soal/<?= $materi[0]['id_mapel']; ?>" class="text-black">
                <button class="btn back">
                    Daftar soal
                </button>
            </a>
            <i class="fas fa-chevron-right"></i>
            <a href="#" class="text-black">
                <button class="btn back">
                    Tambah soal excel
                </button>
            </a>
        </div>
        <?php } ?>
        <div class="col pt-lg-4 pt-5 kembali">
            <a href="/soal/daftar_soal/<?= $materi[0]['id_mapel']; ?>" class="text-black">
                <i class="fas fa-arrow-left"></i>
                <button class="btn back">
                    Kembali
                </button>
            </a>
        </div>
    </div>

    <div class="container blok-full blok-judul">
        <h1 class="text__blue1 text-center">Formulir Soal</h1>
    </div>
    <div class="col-md-12 mb-3 card">
        <div class="card-header p-3">
            <div class=" align-items-center justify-content-between">
                <p class="m-0 fs-4 fw__r card-title">Tambah soal dengan excel</p>
            </div>
        </div>
        <div class="card-body p-4">
            <div class="mb-3">
                <h6>Ketentuan unggah : </h6>
                <p>A. File harus harus berbentuk (ekstensi) .xls atau .xlsx. </p>
                <p>B. Format kolom harus seperti gambar dibawah ini:</p>
                <img class="img-fluid mb-2 ms-3" src="<?= base_url(); ?>/assets/images/contoh-excel.png" alt="">
                <p>D. Format isi kolom: </p>
                <p class="ms-3">a. 'Soal' diisi pertanyaan yang akan dibuat soal
                <p class="ms-3">b. 'Nomer materi' harus diisi dengan angka dan diambil dari nomer urut materi dibawah
                    ini
                    :
                    <?php $i = 1; ?>
                    <?php foreach ($materi as $data_materi) : ?>
                <p class="ms-5"><?= $i; ?>. <?= $data_materi['nama_materi']; ?></p>
                <?php $i++; ?>
                <?php endforeach; ?>
                <p class="ms-3">c. 'Opsi' diisi pilihan jawaban soal
                <p class="ms-3">d. 'Jawaban benar' harus diisi A,B,C, atau D sesuai dengan jawaban yang benar
                <p class="ms-3">e. 'Alasan jawaban' diisi alasan mengapa jawaban itu yang benar
                </p>
                <p>E. Semua kolom wajib diisi. </p>
                <br>
                <p>Catatan: </p>
                <ul style="list-style-type: circle">
                    <li>Templat excel ini hanya digunakan untuk soal yang tidak menggunakan gambar.</li>
                    <li>File excel bisa menggunakan templat file yang telah disediakan. <br> Untuk mengunduh templat
                        soal
                        tekan
                        tombol
                        dibawah ini.
                    </li>
                </ul>
                <a href="/soal/download_template">
                    <button class="btn btn-primary">
                        Unduh Templat
                    </button>
                </a>
                <p></p>
            </div>


        </div>
        <div class="card-action p-4">
            <form action="/soal/simpan_tambah_soal_excel/<?= $materi[0]['id_mapel']; ?>" method="post"
                class="needs-validation" enctype="multipart/form-data" novalidate>
                <div class="my-5 row">
                    <label for="soal_excel" class="col-md-2 text-md-end align-self-center form-label">Unggah file soal
                    </label>
                    <div class="col-lg-9 col-md-10 row ">
                        <div class="col-12 input-file">
                            <input
                                class="form-control form-control-file <?= ($validation->hasError('soal_excel')) ? 'is-invalid' : ''; ?>"
                                type="file" id="soal_excel" name="soal_excel"
                                accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                        </div>
                        <div class="invalid-feedback">
                            <?= ($validation->getError('soal_excel') == '') ? 'Bagian Gambar Soal wajib diisi' : $validation->getError('soal_excel'); ?>
                        </div>
                    </div>
                </div>
                <!-- end soal image -->
                <div class="row">
                    <div class="col-12 justify-content-end d-flex">
                        <a href="/soal/daftar_soal/<?= $materi[0]['id_mapel']; ?>"
                            class="btn btn-danger me-4 rounded-pill btn-submit fs-7">
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