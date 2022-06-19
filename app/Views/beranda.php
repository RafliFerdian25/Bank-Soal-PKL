<?php if (in_groups('admin')) { ?>
<?= $this->extend('templates/template_admin'); ?>
<?php } else { ?>
<?= $this->extend('templates/template_guru'); ?>
<?php }; ?>
<?= $this->section('content'); ?>


<div class="blok-full bg__img d-flex blok-beranda"
    style="background-image: url('<?= base_url(); ?>/assets/images/kantor-1.png'); min-height: 650px; max-height: 768px;">
    <div class="col align-self-center">
        <h1 class="text__white text-center align-self-center">Selamat Datang </h1>
        <h2 class="text__white text-center align-self-center">
            di Bank Soal
            Ujian Semester SMP <br>
            Dinas Pendidikan dan Kebudayaan
            Kabupaten Batang
        </h2>
    </div>
</div>
<div class="blok-full blok-beranda bg__blue">
    <div class="row justify-content-ms-center justify-content-around">
        <!-- <div class="col-12 col-sm-6 col-md-3 text-center">
                <h1 class="text__white">50</h1>
                <h5 class="text__white fw__r">Jumlah SMP di Batang</h5>
            </div>
            <div class=" col-12 col-sm-6 col-md-3 text-center">
                <h1 class="text__white">100</h1>
                <h5 class="text__white fw__r">Jumlah Guru</h5>
            </div>
            <div class=" col-12 col-sm-6 col-md-3 text-center">
                <h1 class="text__white">10000</h1>
                <h5 class="text__white fw__r">Jumlah Soal</h5>
            </div> -->
        <div class="col-4">
            <h1 class="text__white">Rekap Data Bank Soal</h1>
        </div>
        <div class="col-8">
            <div id="beranda__rekap" class="owl-carousel owl-theme">
                <div class="mt-2 mb-4 text-center">
                    <h1 class="text__white"><?= $sekolah; ?></h1>
                    <h5 class="text__white fw__r">Jumlah SMP di Batang</h5>
                </div>
                <div class="mt-2 mb-4 text-center">
                    <h1 class="text__white"><?= $guru; ?></h1>
                    <h5 class="text__white fw__r">Jumlah Guru</h5>
                </div>
                <div class="mt-2 mb-4 text-center">
                    <h1 class="text__white"><?= $soal; ?></h1>
                    <h5 class="text__white fw__r">Jumlah Soal Keseluruhan</h5>
                </div>
                <div class="mt-2 mb-4 text-center">
                    <h1 class="text__white"><?= $soal_ipa; ?></h1>
                    <h5 class="text__white fw__r">Jumlah Soal IPA</h5>
                </div>
                <div class="mt-2 mb-4 text-center">
                    <h1 class="text__white"><?= $soal_ips; ?></h1>
                    <h5 class="text__white fw__r">Jumlah Soal IPS</h5>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>