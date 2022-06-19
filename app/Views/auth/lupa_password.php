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
                    <h3>Bank Soal</h3>
                    <h6 class="fw__sb mt-3">
                        <?php if (user() == null) { ?>
                            Lupa Password?
                        <?php } else {  ?>
                            Ganti password?
                        <?php } ?>
                    </h6>

                    <?= view('Myth\Auth\Views\_message_block') ?>
                    <p><?php if (user() == null) { ?>
                            Jangan kuatir!
                        <?php } ?> Masukkan alamat email anda dibawah dan kami akan mengirimkan intruksi untuk reset
                        password</p>

                    <form action="<?= route_to('forgot') ?>" method="POST" class="col-12 pt-2">
                        <?= csrf_field() ?>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>">

                            <div class="invalid-feedback">
                                <?= session('errors.email') ?>
                            </div>
                            <label for="login">Alamat Email</label>
                        </div>

                        <div class="d-flex justify-content-around pt-5">
                            <a href="/login" class="btn rounded-pill px-5 py-2 btn-danger">
                                Batal
                            </a>

                            <button type="submit" class="btn rounded-pill px-5 py-2 btn-primary">Kirim</button>
                        </div>
                    </form>
                </div>
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
                    <div class="bg__img" style="background-image: url('<?= base_url(); ?>/assets/images/Kantor-2.png');">
                    </div>
                </div>
            </div>
            <!-- end kanan -->
        </div>
    </div>
</div>


<?= $this->endSection(); ?>