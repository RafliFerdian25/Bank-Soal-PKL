<?= $this->extend('auth/template_login'); ?>

<?= $this->section('content'); ?>


<div class="container-fluid">

    <div class="login__section">


        <div class="row">

            <!-- Kiri -->
            <div class="col-sm-5 col-12 login__kiri">
                <div class="login__judul d-flex">
                    <img src="<?= base_url(); ?>/assets/images/logo-batang.png" alt="" class="login__logo mb-sm-0 mb-2">

                    <h5 class="fs-6 mx-sm-3 align-self-center">Dinas Pendidikan dan Kebudayaan <br> Kabupaten Batang
                    </h5>
                </div>
                <div class="login__form row">
                    <h3 class="mb-0 text-center">Bank Soal</h3>
                    <p class="fs-7 text-center fw__r">
                        Membuat Sebuah Akun
                    </p>

                    <?= view('Myth\Auth\Views\_message_block') ?>

                    <form action="<?= route_to('register') ?>" method="post" class="col-12  pt-3" id="form_login">
                        <?= csrf_field() ?>
                        <!-- end radio username -->
                        <div class="form-floating mb-3">
                            <input type="email"
                                class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>"
                                name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>"
                                value="<?= old('email') ?>">
                            <label for="email">Alamat Email</label>
                        </div>
                        <!-- end email -->
                        <div class="form-floating mb-3" id="username_admin">
                            <input type="text"
                                class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>"
                                name="username" placeholder="<?= lang('Auth.username') ?>"
                                value="<?= old('username') ?>">
                            <label for="username"><?= lang('Auth.username') ?></label>
                        </div>
                        <!-- end username -->

                        <div class="row">
                            <div class="form-floating col-lg-6 mb-3 mb-lg-0">
                                <input type="password" name="password"
                                    class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>"
                                    id="floatingPassword" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
                                <label class="ms-3" for="password">Password</label>
                            </div>
                            <!-- end password -->
                            <div class="form-floating  col-lg-6">
                                <input type="password" name="pass_confirm"
                                    class="form-control  <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>"
                                    id="floatingPassword" placeholder="<?= lang('Auth.repeatPassword') ?>"
                                    autocomplete="off">
                                <label class="ms-3" for="pass_confirm">Ulangi Password</label>
                            </div>
                            <!-- end repeat password -->
                        </div>
                        <div class="d-flex justify-content-around pt-5">
                            <a href="/user/daftar_akun">
                                <button type="button" class="btn rounded-pill px-5 py-2 btn-danger">Batal</button>
                            </a>
                            <button type="submit" class="btn rounded-pill px-5 py-2 btn-primary">Daftar</button>
                        </div>
                    </form>
                </div>
                <hr>

                <p hidden>Sudah punya akun? <a href="<?= route_to('login') ?>">Masuk</a></p>

                <div class="login__footer">
                    <p class="fw__sb text-center p-xl-5 pt-5">© <?= date('Y'); ?>. Dinas Pendidikan dan Kebudayaan
                        Kabupaten
                        Batang.
                    </p>
                </div>
            </div>
            <!-- end kiri -->
            <!-- kanan -->
            <div class="col-sm-7 p-0 login__kanan">
                <div class="login__img">
                    <div class="bg__img"
                        style="background-image: url('<?= base_url(); ?>/assets/images/Kantor-2.png');">
                    </div>
                </div>
            </div>
            <!-- end kanan -->
        </div>
    </div>
</div>




<?= $this->endSection(); ?>