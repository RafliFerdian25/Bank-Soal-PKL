<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Bank Soal</title>
    <link rel="shortcut icon" href="<?= base_url(); ?>/assets/images/favicon.ico" type="image/x-icon">

    <!-- Boostrap -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/bootstrap.min.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="<?= base_url(); ?>/assets/js/bootstrap.bundle.min.js"></script>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/styles.css">
</head>

<body>

    <!-- Main Content -->

    <div class="container-fluid">

        <div class="login__section">

            <div class="row">
                <!-- Kiri -->
                <div class="col-sm-5 col-12 login__kiri">
                    <div class="login__judul d-flex">
                        <img src="<?= base_url(); ?>/assets/images/logo-batang.png" alt=""
                            class="login__logo mb-sm-0 mb-2">
                        <h5 class="fs-6 mx-sm-3 align-self-center">Dinas Pendidikan dan Kebudayaan <br> Kabupaten Batang
                        </h5>
                    </div>
                    <div class="login__form row">
                        <h3>Bank Soal</h3>
                        <h6 class="fw__r">
                            Mohon login ke akun anda
                        </h6>

                        <?= view('Myth\Auth\Views\_message_block') ?>

                        <form action="<?= route_to('login') ?>" method="POST" class="col-12  pt-5">
                            <?= csrf_field() ?>
                            <?php if ($config->validFields === ['email']) : ?>
                            <div class="form-floating mb-3">
                                <input type="email"
                                    class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>"
                                    id="login" name="login" placeholder="name@example.com" autofocus>
                                <div class="invalid-feedback">
                                    <?= session('errors.login') ?>
                                </div>
                                <label for="login">Alamat Email</label>
                            </div>
                            <?php else : ?>
                            <div class="form-floating mb-3">
                                <input type="text"
                                    class="form-control  <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>"
                                    id="login" name="login" placeholder="name@example.com" autofocus>
                                <div class="invalid-feedback">
                                    <?= session('errors.login') ?>
                                </div>
                                <label for="login">Alamat Email / Nama Pengguna</label>
                                <div class="invalid-feedback">
                                    <?= session('errors.login') ?>
                                </div>
                            </div>
                            <?php endif; ?>
                            <!-- end email -->
                            <div class="form-floating">
                                <input type="password" id="password" name="password"
                                    class="form-control  <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>"
                                    placeholder="Kata sandi">
                                <label for="password">Kata sandi</label>
                                <div class="invalid-feedback">
                                    <?= session('errors.password') ?>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center pt-5">
                                <button type="submit" class="btn rounded-pill px-5 py-2 btn-primary">Masuk</button>
                            </div>
                        </form>
                    </div>
                    <hr>

                    <!-- <?php if ($config->allowRegistration) : ?>
                <p><a href="<?= route_to('register') ?>">Mendaftar sebuah akun?</a></p>
                <?php endif; ?> -->
                    <?php if ($config->activeResetter) : ?>
                    <p><a href="<?= route_to('forgot') ?>">Lupa kata sandi?</a></p>
                    <?php endif; ?>
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


    <!-- end Main content -->

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Script -->
    <script src="<?= base_url(); ?>/assets/js/script.js"></script>


</body>

</html>