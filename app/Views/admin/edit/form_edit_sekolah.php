<?= $this->extend('templates/template_admin'); ?>

<?= $this->section('content'); ?>
<div class="blok-full blok-beranda">
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
            <a href="/sekolah/detail_sekolah/<?= $sekolah['npsn']; ?>" class="text-black">
                <button class="btn back">
                    Detail sekolah
                </button>
            </a>
            <i class="fas fa-chevron-right"></i>
            <a href="#" class="text-black">
                <button class="btn back">
                    Edit data sekolah
                </button>
            </a>
        </div>
        <div class="col pt-lg-4 pt-5 kembali">
            <i class="fas fa-arrow-left"></i>
            <a href="/sekolah/detail_sekolah/<?= $sekolah['npsn']; ?>" class="text-black">
                <button class="btn back">
                    Kembali
                </button>
            </a>
        </div>
    </div>
    <div class="container blok-full blok-judul">
        <h1 class="text__blue1 text-center">Formulir Data Sekolah</h1>
    </div>
    <div class="col-md-12 mb-3">
        <div class="card">
            <form action="/sekolah/simpan_edit_sekolah/<?= $sekolah['npsn']; ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="logoLama" value="<?= $sekolah['logo_sekolah']; ?>">
                <div class="card-header p-3">
                    <div class=" align-items-center justify-content-between">
                        <p class="m-0 fs-4 fw__r card-title">Edit Data Sekolah</p>
                        <p class="m-0" style="font-size: 14px; color: var(--abu);">Masukkan data sekolah dengan
                            benar
                        </p>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="mb-3 row">
                        <label for="npsn" class="col-md-2 text-md-end col-form-label">NPSN <span class="required-label">*</span>
                        </label>
                        <div class="col-lg-9 col-md-10">
                            <input type="text" name="npsn" value="<?= $sekolah['npsn']; ?>" class="form-control rounded-3 <?= ($validation->hasError('npsn')) ? 'is-invalid' : ''; ?>" id="npsn" maxlength="8">
                            <div class="invalid-feedback">
                                <?= ($validation->getError('npsn') == '') ? 'Bagian NPSN wajib diisi' : $validation->getError('npsn'); ?>
                            </div>
                        </div>
                    </div>
                    <!-- end NPSN -->
                    <div class="mb-3 row">
                        <label for="nama" class="col-md-2 text-md-end col-form-label">Nama Sekolah <span class="required-label">*</span> </label>
                        <div class="col-lg-9 col-md-10">
                            <input type="text" name="nama" value="<?= $sekolah['nama_sekolah']; ?>" class="form-control rounded-3 <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama">
                            <div class="invalid-feedback">
                                <?= ($validation->getError('nama') == '') ? 'Bagian nama sekolah wajib diisi' : $validation->getError('nama'); ?>
                            </div>
                        </div>
                    </div>
                    <!-- end nama sekolah -->
                    <div class="mb-3 row">
                        <label for="alamat" class="col-md-2 text-md-end col-form-label">Alamat <span class="required-label">*</span> </label>
                        <div class="col-lg-9 col-md-10">
                            <textarea class="form-control rounded-3 <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" name="alamat" id="alamat" rows="3"><?= $sekolah['alamat']; ?></textarea>
                            <div class="invalid-feedback">
                                <?= ($validation->getError('alaamt') == '') ? 'Bagian alamat wajib diisi' : $validation->getError('alamat'); ?>
                            </div>
                        </div>
                    </div>
                    <!-- end alamat -->
                    <div class="mb-3 row">
                        <label for="email" class="col-md-2 text-md-end col-form-label">Alamat Email Sekolah </label>
                        <div class="col-lg-9 col-md-10">
                            <input type="email" name="email" value="<?= $sekolah['email']; ?>" class="form-control rounded-3 <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?> <?= ($validation->getError('email') == '') ? 'm-6' : 'is-invalid'; ?>" id="email" aria-describedby="email-feedback">
                            <div class="invalid-feedback" id="email-feedback">
                                <?= ($validation->getError('email') == '') ? 'Bagian email wajib diisi dengan benar' : $validation->getError('email'); ?>
                            </div>
                        </div>
                    </div>

                    <!-- end email sekolah -->
                    <div class="mb-3 row">
                        <label class="col-md-2 text-md-end align-self-center form-label">Logo Sekolah
                        </label>
                        <div class=" col-lg-9 col-md-10">
                            <div class="input-file input-file-image">
                                <img class="img-upload-preview" width="100" height="100" src="<?= base_url(); ?>/assets/images/logo/<?= $sekolah['logo_sekolah']; ?>">
                                <input hidden class="form-control form-control-file <?= ($validation->hasError('logo')) ? 'is-invalid' : ''; ?>" type="file" id="logo" name="logo" accept="image/*" value="<?= $sekolah['logo_sekolah']; ?>">
                                <br>
                                <p class="m-0 fs-7">Maksimal 2 MB</p>
                                <label for="logo" class="btn btn-primary btn-round mt-2"><i class="fa fa-file-image text-white"></i>
                                    Unggah gambar</label>
                                <div class="invalid-feedback">
                                    <?= ($validation->getError('logo') == '') ? 'Bagian logo sekolah wajib diisi' : $validation->getError('logo'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end logo sekolah -->
                </div>
                <div class="card-action p-4">
                    <div class="row">
                        <div class="col-12 justify-content-end d-flex">
                            <a href="/sekolah/sekolah" class="btn btn-danger me-4 rounded-pill btn-submit  fs-7">
                                Batal
                            </a>
                            <input type="submit" class="btn btn-primary rounded-pill btn-submit fs-7" value="Edit">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>