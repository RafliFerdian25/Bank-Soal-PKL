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
                        Tambah soal
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
        <div class="tambah__soal__excel text-center rounded-pill">
            <a href="/soal/tambah_soal_excel/<?= $materi[0]['id_mapel']; ?>">
                <button class="btn btn-primary rounded-pill">
                    Tambah soal dengan excel
                </button>
            </a>
        </div>
    </div>
    <div class="col-md-12 mb-3">
        <?php if ($materi == null) { ?>
            <hr class="mb-5">
            <div class="card card-body p-md-5 p-3 rounded-3 bg__img img__404__materi">
                <h3 class="text-center materi__404">404</h3>
                <h2 class="text-center materi__404">Belum ada materi pada mata pelajaran ini</h2>
            </div>
        <?php } else { ?>
            <form action="/soal/simpan_tambah_soal/<?= $materi[0]['id_mapel']; ?>" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
                <div class="card-header p-3">
                    <div class="align-items-center justify-content-between">
                        <div class="tambah__soal">
                            <p class="m-0 fs-4 fw__r card-title">Tambah Soal</p>
                        </div>

                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="mb-3 row">
                        <label for="soal" class="col-md-2 text-md-end col-form-label">Soal <span class="required-label">*</span>
                        </label>
                        <div class="col-lg-9 col-md-10">
                            <textarea required autofocus type="text" name="soal" class="form-control rounded-3 <?= ($validation->hasError('soal')) ? 'is-invalid' : ''; ?>" id="soal" cols="30" rows="3"><?= old('soal'); ?></textarea>
                            <div class="invalid-feedback">
                                <?= ($validation->getError('soal') == '') ? 'Bagian Soal wajib diisi' : $validation->getError('soal'); ?>
                            </div>
                        </div>
                    </div>
                    <!-- end soal -->
                    <div class="mb-3 row">
                        <label for="materi" class="col-md-2 text-md-end col-form-label">Materi Soal<span class="required-label">*</span> </label>
                        <div class="col-lg-9 col-md-10">
                            <select required class="form-select rounded-3 <?= ($validation->hasError('materi')) ? 'is-invalid' : ''; ?>" id="materi" name="materi">
                                <option selected hidden value="">Pilih opsi ...</option>
                                <?php foreach ($materi as $list_materi) : ?>
                                    <option <?= ($list_materi['id_materi'] == old('materi')) ? 'selected' : '' ?> value="<?= $list_materi['id_materi']; ?>"><?= $list_materi['nama_materi']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= ($validation->getError('materi') == '') ? 'Bagian Sekolah Induk wajib diisi' : $validation->getError('materi'); ?>
                            </div>
                        </div>
                    </div>
                    <!-- end materi -->
                    <div class="mb-3 row">
                        <label for="soal_img" class="col-md-2 text-md-end form-label">Gambar Soal
                        </label>
                        <div class="col-lg-9 col-md-10 row ">
                            <div class="col-2 input-file input-file-image">
                                <img class="img-upload-preview" width="100" height="100" src="https://via.placeholder.com/100">
                                <input hidden class="form-control form-control-file <?= ($validation->hasError('soal_img')) ? 'is-invalid' : ''; ?>" type="file" id="soal_img" name="soal_img" accept="image/*">
                            </div>
                            <div class="col-3 align-self-center">
                                <label for="soal_img" class="btn btn-primary btn-round mt-2"><i class="fa fa-file-image text-white"></i>
                                    Unggah gambar</label>
                                <small class="m-0">Maksimal 2 MB</small>
                            </div>
                            <div class="invalid-feedback">
                                <?= ($validation->getError('soal_img') == '') ? 'Bagian Gambar Soal wajib diisi' : $validation->getError('soal_img'); ?>
                            </div>
                        </div>
                    </div>
                    <!-- end soal image -->
                    <div class="mb-3 row">
                        <label for="opsi_a" class="col-md-2 text-md-end col-form-label">Opsi A <span class="required-label">*</span>
                        </label>
                        <div class="col-lg-9 col-md-10">
                            <textarea required cols="30" rows="3" type="text" name="opsi_a" class="form-control rounded-3 <?= ($validation->hasError('opsi_a')) ? 'is-invalid' : ''; ?>" id="opsi_a"><?= old('opsi_a'); ?></textarea>
                            <div class="invalid-feedback">
                                <?= ($validation->getError('opsi_a') == '') ? 'Bagian Opsi A wajib diisi' : $validation->getError('opsi_a'); ?>
                            </div>
                        </div>
                    </div>
                    <!-- end opsi A -->
                    <div class="mb-3 row">
                        <label for="opsi_b" class="col-md-2 text-md-end col-form-label">Opsi B <span class="required-label">*</span>
                        </label>
                        <div class="col-lg-9 col-md-10">
                            <textarea required cols="30" rows="3" type="text" name="opsi_b" class="form-control rounded-3 <?= ($validation->hasError('opsi_b')) ? 'is-invalid' : ''; ?>" id="opsi_b"><?= old('opsi_b'); ?></textarea>
                            <div class="invalid-feedback">
                                <?= ($validation->getError('opsi_b') == '') ? 'Bagian Opsi B wajib diisi' : $validation->getError('opsi_b'); ?>
                            </div>
                        </div>
                    </div>
                    <!-- end opsi B -->
                    <div class="mb-3 row">
                        <label for="opsi_c" class="col-md-2 text-md-end col-form-label">Opsi C <span class="required-label">*</span>
                        </label>
                        <div class="col-lg-9 col-md-10">
                            <textarea required cols="30" rows="3" type="text" name="opsi_c" class="form-control rounded-3 <?= ($validation->hasError('opsi_c')) ? 'is-invalid' : ''; ?>" id="opsi_c"><?= old('opsi_c'); ?></textarea>
                            <div class="invalid-feedback">
                                <?= ($validation->getError('opsi_c') == '') ? 'Bagian Opsi C wajib diisi' : $validation->getError('opsi_c'); ?>
                            </div>
                        </div>
                    </div>
                    <!-- end opsi C -->
                    <div class="mb-3 row">
                        <label for="opsi_d" class="col-md-2 text-md-end col-form-label">Opsi D <span class="required-label">*</span>
                        </label>
                        <div class="col-lg-9 col-md-10">
                            <textarea required cols="30" rows="3" type="text" name="opsi_d" class="form-control rounded-3 <?= ($validation->hasError('opsi_d')) ? 'is-invalid' : ''; ?>" id="opsi_d"><?= old('opsi_d'); ?></textarea>
                            <div class="invalid-feedback">
                                <?= ($validation->getError('opsi_d') == '') ? 'Bagian Opsi D wajib diisi' : $validation->getError('opsi_d'); ?>
                            </div>
                        </div>
                    </div>
                    <!-- end opsi D -->

                    <div class="mb-3 row">
                        <label for="jawaban" class="col-md-2 text-md-end col-form-label">Jawaban Benar <span class="required-label">*</span> </label>
                        <div class="col-lg-9 col-md-10">
                            <select required class="form-select rounded-3 <?= ($validation->hasError('jawaban')) ? 'is-invalid' : ''; ?>" id="jawaban" name="jawaban">
                                <option selected hidden value="">Pilih opsi ...</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                            </select>
                            <div class="invalid-feedback">
                                <?= ($validation->getError('jawaban') == '') ? 'Bagian Jawaban wajib diisi' : $validation->getError('jawaban'); ?>
                            </div>
                        </div>
                    </div>
                    <!-- end jawaban -->

                    <div class="mb-3 row">
                        <label for="opsi_d" class="col-md-2 text-md-end col-form-label">Teks alasan jawaban <span class="required-label">*</span>
                        </label>
                        <div class="col-lg-9 col-md-10">
                            <textarea required cols="30" rows="3" type="text" name="alasan_jawaban" class="form-control rounded-3 <?= ($validation->hasError('alasan_jawaban')) ? 'is-invalid' : ''; ?>" id="alasan_jawaban"><?= old('alasan_jawaban'); ?></textarea>
                            <div class="invalid-feedback">
                                <?= ($validation->getError('alasan_jawaban') == '') ? 'Bagian alasan jawaban wajib diisi' : $validation->getError('alasan_jawaban'); ?>
                            </div>
                        </div>
                    </div>
                    <!-- end alasan jawaban -->
                    <div class="mb-3 row">
                        <label for="alasan_jawaban_img" class="col-md-2 text-md-end form-label">Scan
                            alasan jawaban
                        </label>
                        <div class="col-lg-9 col-md-10 row ">
                            <div class="col-2 input-file input-file-image">
                                <img class="img-upload-preview" width="100" height="100" src="https://via.placeholder.com/100">
                                <input hidden class="form-control form-control-file <?= ($validation->hasError('alasan_jawaban_img')) ? 'is-invalid' : ''; ?>" type="file" id="alasan_jawaban_img" name="alasan_jawaban_img" accept="image/*">
                            </div>
                            <div class="col-3 align-self-center">
                                <label for="alasan_jawaban_img" class="btn btn-primary btn-round mt-2"><i class="fa fa-file-image text-white"></i>
                                    Unggah gambar</label>
                                <small class="m-0">Maksimal 2 MB</small>
                            </div>
                            <div class="invalid-feedback">
                                <?= ($validation->getError('alasan_jawaban_img') == '') ? 'Bagian Gambar Soal wajib diisi' : $validation->getError('alasan_jawaban_img'); ?>
                            </div>
                        </div>
                    </div>
                    <!-- end alasan jawaban image -->
                    <div class="mb-3 row">
                        <p>Catatan :</p>
                        <ul>
                            <li>
                                Untuk alasan jawaban Isi salah satu antara Teks atau Scan. Jika menggunakan scan foto, maka
                                pada bagian teks alasan jawaban dapat diisi dengan "-"
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-action p-4">
                    <div class="row">
                        <div class="col-12 justify-content-end d-flex">
                            <a href="/soal/daftar_soal/<?= $materi[0]['id_mapel']; ?>" class="btn btn-danger me-4 rounded-pill btn-submit fs-7">
                                Batal
                            </a>
                            <button type="submit" class="btn btn-primary rounded-pill btn-submit fs-7">Tambah</button>
                        </div>
                    </div>
                </div>
            </form>
        <?php } ?>
    </div>
</div>
<?= $this->endSection(); ?>