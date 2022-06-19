<?php if (in_groups('admin')) { ?>
<?= $this->extend('templates/template_admin'); ?>
<?php } else if (in_groups('guru')) { ?>
<?= $this->extend('templates/template_guru'); ?>
<?php }; ?>

<?= $this->section('content'); ?>
<div class="blok-full">
    <div class="pt-lg-4 pt-5">
        <a href="<?= base_url(); ?>/user/index" class="text-black">
            <button class="btn back">
                <i class="fas fa-home back"></i>
            </button>
        </a>
        <i class="fas fa-chevron-right"></i>
        <a href="#" class="text-black">
            <button class="btn back">
                Edit akun
            </button>
        </a>
    </div>
    <div class="container blok-full blok-judul">
        <h1 class="text__blue1 text-center">Formulir Data Akun</h1>
    </div>
    <div class="col-md-12 mb-3">
        <div class="card table__sekolah">
            <form method="post" action="<?= base_url(); ?>/user/simpan_edit_akun_user" class="needs-validation"
                enctype="multipart/form-data" novalidate>

                <input type="hidden" name="user_image_lama" value="<?= user()->user_image; ?>">
                <div class="card-header p-3">
                    <p class="mx-0 my-2 fs-4 fw__m text-center card-title">Edit Data Akun</p>
                </div>
                <div class="card-body p-4">
                    <?php if (session()->getFlashdata('pesan-edit-akun')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('pesan-edit-akun'); ?>
                    </div>
                    <?php endif; ?>
                    <!-- end alert kelola akun -->
                    <div class="row">
                        <div class="col-md-4">
                            <!-- <img src="<?= base_url(); ?>/assets/images/user-3.png" class="img-fluid" alt="gambar-akun"> -->
                            <div class="form-group form-show-validation row ">
                                <!-- <label class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Upload Image <span class="required-label">*</span></label> -->
                                <!-- <div class="col-lg-7 col-md-9 col-sm-8"> -->
                                <div class="input-file input-file-image text-center">
                                    <img class="img-upload-preview img-fluid mb-3"
                                        src="<?= base_url(); ?>/assets/images/akun/user-3.png" alt="gambar-akun">
                                    <?php if (in_groups('guru')) : ?>
                                    <input type="file" class="form-control form-control-file" hidden id="user_image"
                                        name="user_image" accept="image/*">
                                    <label for="user_image" class="btn btn-primary btn-round btn-lg"><i
                                            class="fa fa-file-image text-white"></i> Upload gambar</label>
                                    <?php endif; ?>
                                </div>
                                <!-- </div> -->
                            </div>
                        </div>
                        <div class="col-md-8 align-self-center">
                            <?php if (in_groups('admin')) { ?>
                            <div class="mb-3 row">
                                <label for="id" class="col-md-4 text-md-start ps-4 col-form-label">ID Pengguna
                                </label>
                                <div class="col-md-8">
                                    <input type="text" name="id" value="<?= user_id(); ?>"
                                        class="form-control rounded-3" id="id" disabled>
                                </div>
                            </div>
                            <?php } else { ?>
                            <div class="mb-3 row">
                                <label for="id" class="col-md-4 text-md-start ps-4 col-form-label">NIP
                                </label>
                                <div class="col-md-8">
                                    <input type="text" name="nip" value="<?= user()->nip; ?>"
                                        class="form-control rounded-3" id="id" disabled>
                                </div>
                            </div>

                            <?php } ?>
                            <!-- end NIP -->
                            <div class="mb-3 row">
                                <label for="email" class="col-md-4 text-md-start ps-4 col-form-label">Alamat Email <span
                                        class="required-label">*</span> </label>
                                <div class="col-md-8">
                                    <input type="email" name="email"
                                        class="form-control rounded-3 <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>"
                                        id="email" value="<?= user()->email; ?>">
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
                                        id="username" value="<?= user()->username; ?>">
                                    <div class="invalid-feedback">
                                        <?= ($validation->getError('username') == '') ? 'Bagian nama pengguna wajib diisi' : $validation->getError('username'); ?>
                                    </div>
                                </div>
                            </div>
                            <!-- end username -->
                            <div class="mb-3 row">
                                <label for="password" class="col-md-4 text-md-start ps-4 col-form-label"> Kata sandi
                                </label>
                                <div class="col-md-8">
                                    <a href="<?= route_to('forgot') ?>" class="btn btn-danger">
                                        Ubah kata sandi
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
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