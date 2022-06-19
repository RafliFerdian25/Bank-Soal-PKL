<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $title; ?></title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <!-- ICON -->
    <script src="https://kit.fontawesome.com/5fbcc24921.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" />

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <style>
        * {
            font-family: "Times New Roman", Times, serif !important;
            padding: 0;
            margin: 0;
        }

        .w-5 {
            width: 5%;
        }

        @media print {
            #print {
                display: none;
            }

            #title {
                display: none;
            }

            @page {
                margin: 2cm;
            }

        }
    </style>
    <!-- <title id="title">Formulir_Pendaftaran_'Nama'</title> -->
</head>

<body>


    <!-- head -->
    <div class="head-koleksi position-relative pb-2" style="border-bottom: 3px solid black;">
        <div class="text-left position-absolute">
            <img src="<?php base_url() ?>/assets/img/logo-batang-hp.png" style="width: 60px;" alt="">
        </div>
        <span class="text-center flex-column">
            <h4>PEMERINTAH KABUPATEN BATANG <br>DINAS PENDIDIKAN DAN KEBUDAYAAN</h4>
        </span>
        <div class="alamat text-center">
            <p><small>Jalan Slamet Riyadi No.29 Telp.(0285) 391321 Fax.(0285) 391321 Batang 51214 <br>Laman:
                    www.disdikbud.batangkab.go.id | Alamat Email: disdikbud@batangkab.go.id
                </small></p>
        </div>
    </div>
    <br>
    <?php $i = 1 ?>
    <?php foreach ($soal as $soal) : ?>
        <div class="row">
            <div class="col-1 w-5"><?= $i; ?></div>
            <?php $i++; ?>
            <div class="col-2 text-center" <?= ($soal['soal_img'] == null) ? 'hidden' : '' ?>>
                <img src="<?= base_url(); ?>/assets/images/soal/<?= $soal['soal_img']; ?>" style="max-width: 100px; min-height: 100px; max-height: 250px;" class="soal__img img-fluid me-3 mb-3 ">
            </div>
            <!-- end soal image -->
            <div class="col-9">
                <p class="align-self-start mb-1"><?= $soal['soal']; ?></p>
                <!-- pilihan ganda -->
                <div class="pilihan mb-3">
                    <!-- A -->
                    <div class="row justify-content-start">
                        <div class="col-1">
                            A.
                        </div>
                        <div class="col-10">
                            <?= $soal['opsi_a']; ?>
                        </div>
                    </div>
                    <!-- B -->
                    <div class="row justify-content-start">
                        <div class="col-1">
                            B.
                        </div>
                        <div class="col-10">
                            <?= $soal['opsi_b']; ?>
                        </div>
                    </div>
                    <!-- C -->
                    <div class="row justify-content-start">
                        <div class="col-1">
                            C.
                        </div>
                        <div class="col-10">
                            <?= $soal['opsi_c']; ?>
                        </div>
                    </div>
                    <!-- D -->
                    <div class="row justify-content-start">
                        <div class="col-1">
                            D.
                        </div>
                        <div class="col-10">
                            <?= $soal['opsi_d']; ?>
                        </div>
                    </div>
                </div>
                <!-- end pilihan jawaban -->
            </div>
        </div>
        <!-- end soal -->
    <?php endforeach; ?>


    <script>
        window.print()
    </script>
</body>

</html>