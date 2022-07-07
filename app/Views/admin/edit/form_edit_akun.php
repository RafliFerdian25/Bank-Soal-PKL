<?= $this->extend('templates/template_admin'); ?>

<?= $this->section('content'); ?>
<div class="blok-full">
    <div class="row">

        <div class="col pt-lg-4 pt-5">
            <a href="<?= base_url(); ?>/user/index" class="text-black">
                <button class="btn back">
                    <i class="fas fa-home back"></i>
                </button>
            </a>
            <i class="fas fa-chevron-right"></i>
            <a href="<?= base_url(); ?>/user/daftar_akun" class="text-black">
                <button class="btn back">
                    Manajemen akun
                </button>
            </a>
            <i class="fas fa-chevron-right"></i>
            <a href="#" class="text-black">
                <button class="btn back">
                    Edit akun
                </button>
            </a>
        </div>
        <div class="col pt-lg-4 pt-5 kembali">
            <a href="<?= base_url(); ?>/user/daftar_akun" class="text-black">
                <i class="fas fa-arrow-left"></i>
                <button class="btn back">
                    Kembali
                </button>
            </a>
        </div>
    </div>
    <div class="container blok-full blok-judul">
        <h1 class="text__blue1 text-center">Formulir Data Akun</h1>
    </div>
    <div class="col-md-12 mb-3">
        <div class="card table__sekolah">
            <form method="post" action="/user/simpan_edit_akun/<?= $user['userid']; ?>" class="needs-validation"
                enctype="multipart/form-data" novalidate>
                <div class="card-header p-3">
                    <p class="mx-0 my-2 fs-4 fw__m text-center card-title">Edit Data Akun</p>
                </div>
                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-md-4">
                            <!-- <img src="<?= base_url(); ?>/assets/images/user-3.png" class="img-fluid" alt="gambar-akun"> -->
                            <div class="form-group form-show-validation row ">
                                <!-- <label class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Upload Image <span class="required-label">*</span></label> -->
                                <!-- <div class="col-lg-7 col-md-9 col-sm-8"> -->
                                <div class="input-file input-file-image text-center">
                                    <img class="img-upload-preview img-fluid mb-3"
                                        src="<?= base_url(); ?>/assets/images/akun/<?= $user['user_image']; ?>"
                                        alt="gambar-akun">

                                </div>
                                <!-- </div> -->
                            </div>
                        </div>
                        <div class="col-md-8 align-self-center">
                            <div class="mb-3 row">
                                <label for="id" class="col-md-4 text-md-start ps-4 col-form-label">ID Pengguna
                                </label>
                                <div class="col-md-8">
                                    <input type="text" name="id" class="form-control rounded-3" id="id"
                                        value="<?= $user['userid']; ?>" disabled>
                                </div>
                            </div>
                            <!-- end ID -->
                            <div class="mb-3 row" id="input-nuptk">
                                <label for="id" class="col-md-4 text-md-start ps-4 col-form-label">NUPTK  <span class="required-label">*</span>
                                </label>
                                <div class="col-md-8">
                                    <select class="form-select rounded-3 <?= ($validation->hasError('nuptk')) ? 'is-invalid' : ''; ?>" id="nuptk" name="nuptk">
                                        <!-- <option value=""></option> -->
                                        <?php if ($guru_sebelum != null) : ?>
                                        <option selected value="<?= $guru_sebelum['nuptk']; ?>">
                                            <?= $guru_sebelum['nuptk']; ?> - <?= $guru_sebelum['nama_guru']; ?></option>
                                        <?php endif; ?>
                                        <?php foreach ($guru as $guru) : ?>
                                        <option value="<?= $guru['nuptk']; ?>">
                                            <?= $guru['nuptk']; ?> - <?= $guru['nama_guru']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= ($validation->getError('nuptk') == '') ? 'Bagian nuptk wajib diisi' : $validation->getError('nuptk'); ?>
                                    </div>
                                </div>
                            </div>
                            <!-- NIP -->
                            <div class="mb-3 row">
                                <label for="email" class="col-md-4 text-md-start ps-4 col-form-label">Alamat Email <span
                                        class="required-label">*</span> </label>
                                <div class="col-md-8">
                                    <input type="email" name="email"
                                        class="form-control rounded-3 <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>"
                                        id="email" value="<?= $user['email']; ?>">
                                    <div class="invalid-feedback">
                                        <?= ($validation->getError('email') == '') ? 'Bagian email guru wajib diisi' : $validation->getError('email'); ?>
                                    </div>
                                </div>
                            </div>
                            <!-- end email guru -->
                            <div class="mb-3 row">
                                <label for="username" class="col-md-4 text-md-start ps-4 col-form-label"> Nama Pengguna
                                    <span class="required-label">*</span> </label>
                                <div class="col-md-8">
                                    <input type="username" name="username"
                                        class="form-control rounded-3 <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>"
                                        id="username" value="<?= $user['username']; ?>">
                                    <div class="invalid-feedback">
                                        <?= ($validation->getError('username') == '') ? 'Bagian nama pengguna wajib diisi' : $validation->getError('username'); ?>
                                    </div>
                                </div>
                            </div>
                            <!-- end username -->
                            <div class="mb-3 row">
                                <label for="peran" class="col-md-4 text-md-start ps-4 col-form-label">Peran
                                </label>
                                <div class="col-md-8">
                                    <div class="form-check peran">
                                        <!-- admin -->
                                        <input type="radio" class="btn-check" name="peran" id="admin" value="1"
                                            autocomplete="off" <?= ($user['name'] == 'admin') ? 'checked' : '';  ?>>
                                        <label class="btn btn-primary rounded-pill" for="admin">Admin</label>
                                        <!-- guru -->
                                        <input type="radio" class="btn-check" name="peran" id="guru" value="2"
                                            autocomplete="off" <?= ($user['name'] == 'guru') ? 'checked' : '';  ?>>
                                        <label class="btn btn-primary rounded-pill" for="guru">Guru</label>
                                        <!-- mgmp -->
                                        <input type="radio" class="btn-check" name="peran" id="mgmp" value="3"
                                            autocomplete="off" <?= ($user['name'] == 'mgmp') ? 'checked' : '';  ?>>
                                        <label class="btn btn-primary rounded-pill" for="mgmp">MGMP</label>
                                    </div>
                                    <div class="invalid-feedback">
                                        <?= ($validation->getError('peran') == '') ? 'Bagian peran wajib diisi' : $validation->getError('peran'); ?>
                                    </div>
                                </div>
                            </div>
                            <!-- end role akun -->
                            <div class="mb-3 row" id="mgmp_mapel">
                                <label for="mapel_mgmp" class="col-md-4 text-md-start ps-4 col-form-label">Mata
                                    Pelajaran
                                </label>
                                <div class="col-md-8">
                                    <select name="mapel_mgmp" id="mapel_mgmp" class="form-select">
                                        <?php foreach ($mapel as $mapel) : ?>
                                        <option <?= ($user['id_mgmp'] == $mapel['id_mapel']) ? 'selected' : '';  ?>
                                            value="<?= $mapel['id_mapel']; ?>"><?= $mapel['nama_mapel']; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <!-- end mapel mgmp -->
                        </div>
                    </div>
                </div>
                <div class="card-action p-4">
                    <div class="row">
                        <div class="col-12 justify-content-end d-flex">
                            <a href="<?= base_url(); ?>/user/daftar_akun"
                                class="btn btn-danger me-4 rounded-pill btn-submit fs-7">
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

<script>
<?php if ($user['name'] == 'mgmp') : ?>
$("#input-nuptk").hide();
<?php elseif($user['name'] == 'admin'): ?>
    $("#input-nuptk").hide();
$("#mgmp_mapel").hide();
<?php else: ?>
$("#mgmp_mapel").hide();
<?php endif; ?>
$("input[name='peran']").click(function() {
    console.log(this.value);
    if (this.value == 3) {
        $("#mgmp_mapel").show();
        $("#input-nuptk").hide();
    } else if(this.value == 1) {
        $("#mgmp_mapel").hide();
        $("#input-nuptk").hide();
    } else {
        $("#mgmp_mapel").hide();
        $("#input-nuptk").show();
    }
});
</script>
<?= $this->endSection(); ?>