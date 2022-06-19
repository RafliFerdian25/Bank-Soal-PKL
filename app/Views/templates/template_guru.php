<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link rel="shortcut icon" href="<?= base_url(); ?>/assets/images/favicon.ico" type="image/x-icon">

    <!-- animate animation styles -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/owl.carousel.min.css"> <!-- owl carousel min -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/owl.theme.default.min.css">
    <!-- owl carousel theme default min -->
    <!-- Boostrap -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/bootstrap.min.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="<?= base_url(); ?>/assets/js/bootstrap.bundle.min.js"></script>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/styles.css">
    <!-- Sweet Alert -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.0/sweetalert2.min.css"
        integrity="sha512-y4S4cBeErz9ykN3iwUC4kmP/Ca+zd8n8FDzlVbq5Nr73gn1VBXZhpriQ7avR+8fQLpyq4izWm0b8s6q4Vedb9w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- ICON -->
    <link href="/assets/vendor/font-awesome/css/all.css" rel="stylesheet">
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <nav class=" navbar navbar-expand-lg navbar-light bg__blue" id="navbar">
            <div class="mx__max container-fluid">
                <a class="navbar-brand d-flex" href="/admin/index">
                    <img src="<?= base_url(); ?>/assets/images/logo-batang.png" class="navbar__logo" alt="Logo-Batang">
                    <h5 class="mx-4 align-self-center text__white">Bank Soal</h5>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="justify-content-end collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item align-self-center mx-4 ">
                            <a class="nav-link text__white fw__sb px-2" id="nav__beranda" aria-current="page"
                                href="<?= base_url(); ?>/user/index">Beranda</a>
                        </li>
                        <li class="nav-item align-self-center mx-4">
                            <a class="nav-link text__white fw__sb px-2" id="nav__soal"
                                href="<?= base_url(); ?>/soal/daftar_soal/<?= $mapel['id_mapel']; ?>">Soal</a>
                        </li>
                        <li class="nav-item align-self-center mx-4 dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <img class="navbar__logo rounded-circle"
                                    src="<?= base_url(); ?>/assets/images/akun/<?= user()->user_image; ?>" alt="">
                            </a>
                            <ul class="dropdown-menu min-w__20 p-2" aria-labelledby="navbarDropdown">
                                <div class="d-flex">
                                    <img class="navbar__logo rounded-circle"
                                        src="<?= base_url(); ?>/assets/images/akun/<?= user()->user_image; ?>" alt="">
                                    <p class="mx-2 align-self-center"><?= user()->email; ?></p>
                                </div>
                                <hr class="dropdown-divider">
                                <li><a class="dropdown-item" href="<?= base_url(); ?>/user/edit_akun_user">Edit akun</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <!-- <li><a class="dropdown-item" href="<?= base_url(); ?>/logout">Logout</a></li> -->
                                <li>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-modal" data-bs-toggle="modal"
                                        data-bs-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Keluar
                                    </button>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>


    <!-- Main Content -->
    <?= $this->renderSection('content'); ?>

    <!-- end Main content -->

    <!-- Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">Anda yakin akan keluar?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Pilih "Logout" dibawah jika anda ingin mengakhiri sesimu sekarang.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <a href="<?= base_url(); ?>/logout" class="btn btn-danger">Logout</a>
                </div>
            </div>
        </div>
    </div>


    <footer>
        <p class="fw__sb text-center p-5 pb-2">© <?= date('Y'); ?>. Dinas Pendidikan dan Kebudayaan Kabupaten Batang.
        </p>
    </footer>


    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
    <!-- Carousel -->
    <script src="<?= base_url(); ?>/assets/js/owl.carousel.min.js"></script> <!-- owl carousel min scripts -->

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js">
    </script>
    <!-- Script -->
    <script src="<?= base_url(); ?>/assets/js/script.js"></script>

    <!-- Include a polyfill for ES6 Promises (optional) for IE11 and Android browser -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.0/dist/sweetalert2.all.min.js"
        integrity="sha256-WytkU8Xrh6h+8sc4jcaZcl47v0P/5Xq1VfhIoHZkMgk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>


</body>

</html>