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
            <a href="<?= base_url(); ?>/guru/guru" class="text-black">
                <button class="btn back">
                    Guru
                </button>
            </a>
            <i class="fas fa-chevron-right"></i>
            <a href="#" class="text-black">
                <button class="btn back">
                    Edit data guru
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
        <h1 class="text__blue1 text-center">Formulir Data Guru</h1>
    </div>
    <div class="col-md-12 mb-3">
        <div class="card">
            <form action="<?= base_url(); ?>/guru/simpan_edit_guru/<?= $guru['nuptk']; ?>" method="post"
                class="needs-validation" novalidate>
                <div class="card-header p-3">
                    <div class=" align-items-center justify-content-between">
                        <p class="m-0 fs-4 fw__r card-title">Edit Data Guru</p>
                        <p class="m-0" style="font-size: 14px; color: var(--abu);">Masukkan data guru dengan benar
                        </p>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="mb-3 row">
                        <label for="nuptk" class="col-md-2 text-md-end col-form-label">NUPTK <span
                                class="required-label">*</span>
                        </label>
                        <div class="col-lg-9 col-md-10">
                            <input required type="number" name="nuptk" max="9999999999999999"
                                class="form-control rounded-3 <?= ($validation->hasError('nuptk')) ? 'is-invalid' : ''; ?>"
                                id="nuptk" value="<?= $guru['nuptk']; ?>" maxlength="18">
                            <div class="invalid-feedback">
                                <?= ($validation->getError('nuptk') == '') ? 'Bagian NUPTK guru wajib diisi dan hanya dapat berisi angka kurang dari 16' : $validation->getError('nuptk'); ?>
                            </div>
                        </div>
                    </div>
                    <!-- end NUPTK -->
                    <div class="mb-3 row">
                        <label for="nip" class="col-md-2 text-md-end col-form-label">NIP
                        </label>
                        <div class="col-lg-9 col-md-10">
                            <input type="number" name="nip" max="999999999999999999"
                                class="form-control rounded-3 <?= ($validation->hasError('nip')) ? 'is-invalid' : ''; ?>"
                                id="nip" value="<?= $guru['nip']; ?>" maxlength="18">
                            <div class="invalid-feedback">
                                <?= ($validation->getError('nip') == '') ? 'Bagian NIP guru hanya dapat berisi angka kurang dari 18' : $validation->getError('nip'); ?>
                            </div>
                        </div>
                    </div>
                    <!-- end NIP -->
                    <div class="mb-3 row">
                        <label for="nama" class="col-md-2 text-md-end col-form-label">Nama guru <span
                                class="required-label">*</span> </label>
                        <div class="col-lg-9 col-md-10">
                            <input required type="text" name="nama" value="<?= $guru['nama_guru']; ?>"
                                class="form-control rounded-3 <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>"
                                id="nama">
                            <div class="invalid-feedback">
                                <?= ($validation->getError('nama') == '') ? 'Bagian nama guru wajib diisi' : $validation->getError('nama'); ?>
                            </div>
                        </div>
                    </div>
                    <!-- end nama guru -->

                    <div class="mb-3 row">
                        <label for="npsn" class="col-md-2 text-md-end form-label">Sekolah Induk <span
                                class="required-label">*</span> </label>
                        <div class="col-lg-9 col-md-10">
                            <select required
                                class="form-select rounded-3 <?= ($validation->hasError('npsn')) ? 'is-invalid' : ''; ?>"
                                id="npsn" name="npsn">
                                <option selected hidden value="">Pilih sekolah</option>
                                <?php foreach ($sekolah as $sekolah) : ?>
                                <option <?= ($sekolah['npsn'] == $guru['npsn']) ? 'selected' : '' ?>
                                    value="<?= $sekolah['npsn']; ?>">
                                    <?= $sekolah['nama_sekolah']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= ($validation->getError('npsn') == '') ? 'Bagian Sekolah Induk wajib diisi' : $validation->getError('npsn'); ?>
                            </div>
                        </div>
                    </div>
                    <!-- end sekolah induk -->
                    <div class="mb-3 row">
                        <label for="mata_pelajaran" class="col-md-2 text-md-end col-form-label">Mata Pelajaran <span
                                class="required-label">*</span>
                        </label>
                        <div class="col-lg-9 col-md-10">
                            <select required class="form-select rounded-3" aria-label="mata pelajaran" name="id_mapel">
                                <option selected hidden value="">Pilih mata pelajaran</option>
                                <?php foreach ($mapel as $mapel) : ?>
                                <option <?= ($mapel['id_mapel'] == $guru['id_mapel']) ? 'selected' : '' ?>
                                    value="<?= $mapel['id_mapel']; ?>"><?= $mapel['nama_mapel']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= ($validation->getError('id_mapel') == '') ? 'Bagian Mata Pelajaran wajib diisi' : $validation->getError('id_mapel'); ?>
                            </div>
                        </div>
                    </div>
                    <!-- end mata pelajaran -->
                </div>
                <div class="card-action p-4">
                    <div class="row">
                        <div class="col-12 justify-content-end d-flex">
                            <a href="/guru/guru" class="btn btn-danger me-4 rounded-pill btn-submit fs-7">
                                Batal
                            </a>
                            <button type="submit" class="btn btn-primary rounded-pill btn-submit fs-7">Edit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>