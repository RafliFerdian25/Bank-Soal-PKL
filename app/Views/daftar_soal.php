<?php if (in_groups('admin')) { ?>
<?= $this->extend('templates/template_admin'); ?>
<?php } else { ?>
<?= $this->extend('templates/template_guru'); ?>
<?php }; ?>
<?= $this->section('content'); ?>
<div class="blok-full blok-beranda">
    <div class="row">

        <div class="col pt-lg-4 pt-5 back-full">
            <a href="<?= base_url(); ?>/user/index" class="text-black">
                <button class="btn back">
                    <i class="fas fa-home back"></i>
                </button>
            </a>
            <?php if (in_groups('admin')) { ?>
            <i class="fas fa-chevron-right"></i>
            <a href="/mapel/mapel" class="text-black">
                <button class="btn back">
                    Mata pelajaran
                </button>
            </a>
            <?php } ?>
            <i class="fas fa-chevron-right"></i>
            <a href="#" class="text-black">
                <button class="btn back">
                    Daftar soal
                </button>
            </a>
        </div>
        <?php if (in_groups('admin')) { ?>

        <div class="col pt-lg-4 pt-5 kembali">
            <a href="/mapel/mapel" class="text-black">
                <i class="fas fa-arrow-left"></i>
                <button class="btn back">
                    Kembali
                </button>
            </a>
        </div>
        <?php } ?>
    </div>

    <div class="container blok-full blok-judul align-content-center">
        <h1 class="text__blue1 text-center">Data Soal <?= $mapel['nama_mapel']; ?></h1>
        <h3 class="text__blue1 text-center">Semester <?= $semester; ?></h3>
        <!-- <div class=" align-center-webkit"> -->
        <div class="d-flex justify-content-center">
            <?php if (!in_groups('mgmp')) : ?>
            <a href="/soal/tambah_soal/<?= $mapel['id_mapel']; ?>">
                <button class=" d-flex align-items-center btn btn-primary rounded-pill  btn-p">
                    <i class="fas fa-plus text-white me-2 d-block mr-2"></i>
                    <span class="d-block text-white">Tambah soal</span>
                </button>
            </a>
            <?php endif; ?>
            <?php if (!in_groups('mgmp')) { ?>
            <button class="ms-2 d-flex align-items-center btn btn-primary rounded-pill  btn-p" data-bs-toggle="modal"
                data-bs-target="#simpanCetakSoal">
                <i class="fas fa-print text-white me-2 d-block mr-2"></i>
                <span class="d-block text-white">Cetak</span>
            </button>
            <?php } ?>
            <?php if ($semester == 1) : ?>
            <a href="/soal/daftar_soal/<?= $mapel['id_mapel']; ?>/2">
                <button class="ms-2 d-flex align-items-center btn btn-primary rounded-pill  btn-p">
                    <i class="fas fa-book text-white me-2 d-block mr-2"></i>
                    <span class="d-block text-white">Semester 2</span>
                </button>
            </a>
            <?php else : ?>
            <a href="/soal/daftar_soal/<?= $mapel['id_mapel']; ?>/1">
                <button class="ms-2 d-flex align-items-center btn btn-primary rounded-pill  btn-p">
                    <i class="fas fa-book text-white me-2 d-block mr-2"></i>
                    <span class="d-block text-white">Semester 1</span>
                </button>
            </a>
            <?php endif; ?>
        </div>
        <!-- </div> -->
    </div>
    <!-- Tabel -->
    <div class="row">
        <!-- Soal -->
        <div class="col-md-12 soal__content mb-3">
            <!-- alert kelola soal -->
            <?php if (session()->getFlashdata('pesan-tambah-soal')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan-tambah-soal'); ?>
            </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('pesan-edit-soal')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan-edit-soal'); ?>
            </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('pesan-delete-soal')) : ?>
            <div class="alert alert-danger" role="alert">
                <?= session()->getFlashdata('pesan-delete-soal'); ?>
            </div>
            <?php endif; ?>
            <!-- end alert kelola soal -->
            <div class="accordion" id="accordion_soal">
                <?php if ($materi == null) { ?>
                <hr class="mb-5">
                <div class="card card-body p-md-5 p-3 rounded-3 bg__img img__404__materi">
                    <h3 class="text-center materi__404">404</h3>
                    <h2 class="text-center materi__404">Data tidak ditemukan</h2>
                </div>
                <?php } else { ?>
                <?php $j = 0; ?>
                <?php foreach ($soal as $data) : ?>
                <div class="accordion-item mb-3">
                    <h2 class="accordion-header" id="">
                        <button class="accordion-button collapsed fs-5 fw__m" type="button" data-bs-toggle="collapse"
                            data-bs-target="#materi_<?= $materi[$j]['id_materi']; ?>" aria-expanded="false"
                            aria-controls="collapseTwo">
                            <?= ucfirst($materi[$j]['nama_materi']) ?>
                        </button>
                    </h2>

                    <div id="materi_<?= $materi[$j]['id_materi']; ?>" class="accordion-collapse collapse"
                        aria-labelledby="headingTwo" data-bs-parent="#accordion_soal">
                        <div class="accordion-body">
                            <!-- Table soal -->
                            <div class="col-md-12 table__sekolah mb-3">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <p class="fs-5 fw__r card-title">Materi</p>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="materi_id<?= $materi[$j]['id_materi']; ?>"
                                                class="display table table-hover table-striped table-borderless">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 5%">No</th>
                                                        <th style="width: 40%">Soal</th>
                                                        <th style="width: 30%">Materi</th>
                                                        <th style="width: 5%">Jawaban</th>
                                                        <th style="width: 10%">Status</th>
                                                        <th style="width: 10%">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1; ?>
                                                    <?php foreach ($data as $soal_data) : ?>
                                                    <tr>
                                                        <td><?= $i; ?></td>
                                                        <td><?= $soal_data['soal']; ?></td>
                                                        <td><?= $soal_data['nama_materi']; ?></td>
                                                        <td><?= $soal_data['jawaban']; ?></td>
                                                        <td><?= ucfirst($soal_data['nama_status_soal']) ?> validasi
                                                        </td>
                                                        <td>
                                                            <div class="form-button-action">
                                                                <a href="/soal/detail_soal/<?= $soal_data['id_soal']; ?>"
                                                                    class="d-flex">
                                                                    <button type="button" data-bs-toggle="tooltip"
                                                                        title="Detail" data-bs-placement="top"
                                                                        class="btn detail" data-original-title="Detail">
                                                                        Detail
                                                                    </button>
                                                                </a>
                                                                <?php if (!in_groups('mgmp')) : ?>
                                                                <a href="/soal/hapus_soal/<?= $soal_data['id_soal']; ?>"
                                                                    class="d-flex hapus_soal">
                                                                    <button type="button" data-bs-toggle="tooltip"
                                                                        title="" class="btn btn-link"
                                                                        data-original-title="Hapus">
                                                                        <i class="far fa-trash-alt text-danger"></i>
                                                                    </button>
                                                                </a>
                                                                <?php endif; ?>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php $i++; ?>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <h6 class="text-end">Jumlah soal : <?= $materi[$j]['jumlah_soal']; ?></h6>
                                    </div>
                                </div>
                            </div> <!-- end tabel soal -->
                        </div>
                    </div>
                </div>
                <?php $j++; ?>
                <?php endforeach; ?>
                <?php } ?>
            </div>
            <!-- end accordion -->
        </div>
    </div> <!-- end table -->
</div>

<!-- Modal cetak soal-->
<div class="modal fade" id="simpanCetakSoal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="simpanCetakSoalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="simpanCetakSoalLabel">Cetak</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/soal/simpan_cetak_soal/<?= $mapel['id_mapel']; ?>/<?= $semester; ?>" method="post">
                <div class="modal-body">
                    <!-- <label for="jumlah_cetak_soal">Jumlah soal: </label> -->
                    <P class="fw-bold mb-0">Pilih materi dan jumlah soal yang akan diujikan</P>
                    <div class="row p-3">
                        <?php foreach ($materi as $data_materi) : ?>
                        <div class="form-check col-6 mt-2">
                            <input class="form-check-input" name="materi_<?= $data_materi['id_materi']; ?>"
                                type="checkbox" value="materi_<?= $data_materi['id_materi']; ?>"
                                id="<?= $data_materi['id_materi']; ?>">
                            <label class="form-check-label" for="<?= $data_materi['id_materi']; ?>">
                                <?= $data_materi['nama_materi']; ?>
                            </label>
                        </div>
                        <div class="col-6 mt-2">
                            <input type="number" class="form-control"
                                id="jumlah_cetak_soal_<?= $data_materi['id_materi']; ?>"
                                name="jumlah_cetak_soal_<?= $data_materi['id_materi']; ?>">
                        </div>
                        <?php endforeach ?>
                    </div>
                    <div class="col-12">

                        <p>Catatan :</p>
                        <ol>
                            <li>Hanya soal yang sudah lolos validasi yang dapat dicetak</li>
                            <li>Setelah memilih materi dan jumlah soal silahkan Untuk mengacak soal dengan menekan "Acak
                                soal"</li>
                            <li>Untuk mencetak soal dapat pilih "Cetak soal"</li>
                            <li>Untuk mencetak kunci jawaban dapat pilih "Cetak kunci jawaban"</li>
                        </ol>
                    </div>
                    <div class="alert <?= ($soal_cetak == null) ? 'alert-warning' : 'alert-success'; ?>">
                        <p>Status cetak soal:
                            <?= ($soal_cetak == null) ? 'Harus melakukan "Acak Soal" Terlebih dahulu' : 'Dapat dicetak'; ?>
                        </p>
                    </div>
                </div>
                <div class="modal-footer">

                    <button type="submit" id="submit_cetak_soal" class="btn btn-primary">Acak Soal</button>
                    <button <?= ($soal_cetak == null) ? 'disabled' : ''; ?> type="button" id="submit_cetak_soal"
                        class="btn btn-primary">
                        <a class="text-white" href="<?= base_url(); ?>/soal/cetak_soal">
                            Cetak soal
                        </a>
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                        <?= ($soal_cetak == null) ? 'disabled' : ''; ?>>
                        <a class="text-white" href="<?= base_url(); ?>/soal/cetak_kunci_jawaban">Cetak kunci
                            jawaban
                        </a>
                    </button>


                </div>
            </form>
        </div>
    </div>
</div>
<!-- end cetak soal -->
<script>
<?php foreach ($materi as $script_materi) : ?>
$(document).ready(function() {
    // datatable
    $("#materi_id<?= $script_materi['id_materi']; ?>").DataTable({
        pageLength: 10,
        language: {
            info: "Menampilkan _END_ dari _TOTAL_ baris",
            infoEmpty: "Menampilkan 0 sampai 0 of 0 baris",
            infoFiltered: "(filtered from _MAX_ total entries)",
            infoPostFix: "",
            thousands: ",",
            lengthMenu: "Menampilkan _MENU_ baris",
            loadingRecords: "Tunggu...",
            processing: "Memproses...",
            search: "Cari:",
            zeroRecords: "Tidak ada data yang ditemukan",
            paginate: {
                first: "Pertama",
                last: "Terakhir",
                next: "Selanjutnya",
                previous: "Sebelumnya",
            },
        },
    });

});
$('#jumlah_cetak_soal_<?= $script_materi['id_materi']; ?>').hide();
$('#<?= $script_materi['id_materi']; ?>').click(function() {
    $('#jumlah_cetak_soal_<?= $script_materi['id_materi']; ?>').hide();
    if ("#<?= $script_materi['id_materi']; ?>:checked") {
        $('#jumlah_cetak_soal_<?= $script_materi['id_materi']; ?>').show();
    }
});
<?php endforeach; ?>
</script>
<?= $this->endSection(); ?>