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
            <a href="/mapel/mapel" class="text-black">
                <button class="btn back">
                    Mata pelajaran
                </button>
            </a>
            <i class="fas fa-chevron-right"></i>
            <a href="#" class="text-black">
                <button class="btn back">
                    Edit data mata pelajaran
                </button>
            </a>
        </div>
        <div class="col pt-lg-4 pt-5 kembali">
            <a href="/mapel/mapel" class="text-black">
                <i class="fas fa-arrow-left"></i>
                <button class="btn back">
                    Kembali
                </button>
            </a>
        </div>
    </div>
    <div class="container blok-full blok-judul">
        <h1 class="text__blue1 text-center">Formulir Mata Pelajaran</h1>
    </div>
    <div class="col-md-12 mb-3">
        <div class="card">
            <div class="card-header p-3">
                <div class=" align-items-center justify-content-between">
                    <p class="m-0 fs-4 fw__r card-title">Edit Mata Pelajaran</p>
                </div>
            </div>
            <div class='tabs-x tabs-above tab-bordered'>
                <ul id="myTab-tabs-above" class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="tab_semester_1" href="#semester_1" role="tab" data-bs-toggle="tab" title="Semester 1 tab" aria-controls="home-kv-1" aria-selected="true">
                            Semester 1
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab_semester_2" href="#semester_2" role="tab-kv" data-bs-toggle="tab" data-url="/site/fetch-tab?tab=2" title="Semester 2" aria-controls="profile">
                            Semester 2
                        </a>
                    </li>
                </ul>
                <div id="myTabContent-tabs-above" class="tab-content">
                    <!-- semester 1 -->
                    <div class="tab-pane fade show active" id="semester_1" role="tabpanel" aria-labelledby="tab_semester_1">
                        <form method="post" action="<?= base_url(); ?>/mapel/simpan_edit_mapel/<?= $mapel['id_mapel']; ?>/1" class="needs-validation" novalidate>

                            <div class="card-body p-4">
                                <?php if (session()->getFlashdata('pesan-hapus-materi')) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= session()->getFlashdata('pesan-hapus-materi'); ?>
                                    </div>
                                <?php endif; ?>
                                <!-- End alert -->
                                <div class="mb-3 row">
                                    <label for="nama_mapel" class="col-md-2 text-md-end col-form-label">Mata Pelajaran
                                        <span class="required-label">*</span>
                                    </label>
                                    <div class="col-lg-9 col-md-10">
                                        <input type="text" value="<?= $mapel['nama_mapel'] ?>" name="nama" class="form-control rounded-3  <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama_mapel">
                                        <div class="invalid-feedback">
                                            <?= ($validation->getError('nama') == '') ? 'Bagian Mata Pelajaran wajib diisi' : $validation->getError('nama'); ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- end soal -->
                                <input type="text" hidden name="jumlah_materi_semester1" id="jumlah_materi_semester1">
                                <!-- end jumlah materi_semester1 -->
                                <?php $i = 1; ?>
                                <!-- jika materi_semester1 kosong -->
                                <?php if ($materi_semester1 == null) { ?>
                                    <div id="0_materi_semester1">
                                    </div>
                                <?php } else { ?>
                                    <!-- jika materi_semester1 tidak kosong -->
                                    <?php foreach ($materi_semester1 as $materi_semester1) : ?>
                                        <div class=" mb-3 row materi_smt1" id="<?= $i; ?>_materi_semester1">
                                            <input hidden type="text" name="id_semester1_<?= $i; ?>" value="<?= $materi_semester1['id_materi']; ?>">
                                            <label for="materi_semester1_<?= $i; ?>" class="col-md-2 text-md-end col-form-label">Materi
                                                <?= $i; ?>
                                            </label>
                                            <div class="col-md-9 col-11">
                                                <input type="text" name="materi_semester1_<?= $i; ?>" value="<?= $materi_semester1['nama_materi']; ?>" class="form-control rounded-3 <?= ($validation->hasError("materi_semester1_" . $i)) ? 'is-invalid' : ''; ?>" id="materi_semester1_<?= $i; ?>">
                                                <div class="invalid-feedback">
                                                    <?= ($validation->getError('materi_semester1_' . $i) == '') ? 'Bagian Materi wajib
                                diisi' : $validation->getError('materi_semester1_' . $i); ?>
                                                </div>
                                            </div>
                                            <a href="/mapel/hapus_materi/<?= $materi_semester1['id_materi']; ?>/<?= $mapel['id_mapel']; ?>" class="d-flex hapus_materi col-1">
                                                <button type="button" data-bs-toggle="tooltip" title="Hapus" data-bs-placement="top" class="btn btn-link" data-original-title="Hapus">
                                                    <i class="far fa-trash-alt text-danger"></i>
                                                </button>
                                            </a>
                                        </div>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                <?php } ?>
                                <!-- end materi_semester1 -->
                                <div class="mb-3 row px-3">
                                    <div class="col-md-2"></div>
                                    <a class="btn col-md-10 col-lg-9 text-center tambah__materi" onclick="tambah__edit__materi_semester1()">
                                        <i class="fas fa-plus"></i>
                                    </a>
                                </div>
                                <!-- end tambah materi_semester1 -->
                                <div class="alert alert-warning alert-dismissible fade show" role="alert" id="alert_materi">
                                    <strong>Materi penuh!</strong> Hanya dapat mengisi maksimal 8 materi.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                <!-- alert -->
                            </div>
                            <div class="card-action p-4">
                                <div class="row">
                                    <div class="col-12 justify-content-end d-flex">
                                        <a href="/mapel/mapel" class="btn btn-danger me-4 rounded-pill btn-submit fs-7">
                                            Batal
                                        </a>
                                        <button type="submit" class="btn btn-primary rounded-pill btn-submit fs-7">Edit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- end semester 1 -->
                    <!-- semester 2 -->
                    <div class="tab-pane fade" id="semester_2" role="tabpanel" aria-labelledby="tab_semester_2">
                        <p>
                        <div class="tab-pane fade show active" id="semester_1" role="tabpanel" aria-labelledby="tab_semester_1">
                            <form method="post" action="<?= base_url(); ?>/mapel/simpan_edit_mapel/<?= $mapel['id_mapel']; ?>/2" class="needs-validation" novalidate>

                                <div class="card-body p-4">
                                    <?php if (session()->getFlashdata('pesan-hapus-materi')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= session()->getFlashdata('pesan-hapus-materi'); ?>
                                        </div>
                                    <?php endif; ?>
                                    <!-- End alert -->
                                    <div class="mb-3 row" hidden>
                                        <label for="nama_mapel" class="col-md-2 text-md-end col-form-label">Mata
                                            Pelajaran
                                            <span class="required-label">*</span>
                                        </label>
                                        <div class="col-lg-9 col-md-10">
                                            <input type="text" value="<?= $mapel['nama_mapel'] ?>" name="nama" class="form-control rounded-3  <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama_mapel">
                                            <div class="invalid-feedback">
                                                <?= ($validation->getError('nama') == '') ? 'Bagian Mata Pelajaran wajib diisi' : $validation->getError('nama'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end soal -->
                                    <input type="text" hidden name="jumlah_materi_semester2" id="jumlah_materi_semester2">
                                    <!-- end jumlah materi_semester2 -->
                                    <?php $j = 1; ?>
                                    <!-- jika materi_semester2 kosong -->
                                    <?php if ($materi_semester2 == null) { ?>
                                        <div id="0_materi_semester2">
                                        </div>
                                    <?php } else { ?>
                                        <!-- jika materi_semester2 tidak kosong -->
                                        <?php foreach ($materi_semester2 as $materi_semester2) : ?>
                                            <div class=" mb-3 row materi_semester2" id="<?= $j; ?>_materi_semester2">
                                                <input hidden type="text" name="id_semester2_<?= $j; ?>" value="<?= $materi_semester2['id_materi']; ?>">
                                                <label for="materi_semester2_<?= $j; ?>" class="col-md-2 text-md-end col-form-label">Materi
                                                    <?= $j; ?>
                                                </label>
                                                <div class="col-md-9 col-11">
                                                    <input type="text" name="materi_semester2_<?= $j; ?>" value="<?= $materi_semester2['nama_materi']; ?>" class="form-control rounded-3 <?= ($validation->hasError("materi_semester2_" . $j)) ? 'is-invalid' : ''; ?>" id="materi_semester2_<?= $j; ?>">
                                                    <div class="invalid-feedback">
                                                        <?= ($validation->getError('materi_semester2_' . $j) == '') ? 'Bagian Materi wajib diisi' : $validation->getError('materi_semester2_' . $j); ?>
                                                    </div>
                                                </div>
                                                <a href="/mapel/hapus_materi/<?= $materi_semester2['id_materi']; ?>/<?= $mapel['id_mapel']; ?>" class="d-flex hapus_materi col-1">
                                                    <button type="button" data-bs-toggle="tooltip" title="Hapus" data-bs-placement="top" class="btn btn-link" data-original-title="Hapus">
                                                        <i class="far fa-trash-alt text-danger"></i>
                                                    </button>
                                                </a>
                                            </div>
                                            <?php $j++; ?>
                                        <?php endforeach; ?>
                                    <?php } ?>
                                    <!-- end materi_semester2 -->
                                    <div class="mb-3 row px-3">
                                        <div class="col-md-2"></div>
                                        <a class="btn col-md-10 col-lg-9 text-center tambah__materi" onclick="tambah__edit__materi_semester2()">
                                            <i class="fas fa-plus"></i>
                                        </a>
                                    </div>
                                    <!-- end tambah materi_semester2 -->
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert" id="alert_materi_2">
                                        <strong>Materi penuh!</strong> Hanya dapat mengisi maksimal 10 materi.
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    <!-- alert -->
                                </div>
                                <div class="card-action p-4">
                                    <div class="row">
                                        <div class="col-12 justify-content-end d-flex">
                                            <a href="/mapel/mapel" class="btn btn-danger me-4 rounded-pill btn-submit fs-7">
                                                Batal
                                            </a>
                                            <button type="submit" class="btn btn-primary rounded-pill btn-submit fs-7">Edit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- end semester 2 -->
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    // Edit materi semester 1
    <?php if ($materi_semester1 == null) { ?>
        var a = 1;
    <?php } else { ?>
        var a = $(".materi_smt1").length;
    <?php } ?>
    console.log('a = ' + a);
    var b = a + 1;
    $(document).ready(function() {
        $('input[name=jumlah_materi_semester1]').val(a);
        $("#alert_materi").hide();
    })

    function tambah__edit__materi_semester1() {
        console.log('b = ' + b);
        if (b <= 10) {
            $("#" + a + "_materi_semester1").after(
                `<div class="mb-3 row materi_semester1" id="` + b + `_materi_semester1">
      <label for="materi_semester1_` + b + `" class="col-md-2 text-md-end col-form-label">Materi ` + b + `</label>
        <div class="col-lg-9 col-md-10">
        <input type="text" name="materi_semester1_` + b + `" class="form-control rounded-3"  id="materi_semester1_` +
                b + `">
        </div>
    </div>
    <!-- end materi_semester1 ` +
                b +
                ` -->`
            );
        } else {
            $("#alert_materi").show(1000);
            console.log('masuk 8');
        }
        a++;
        b++;
        // console.log(a);

        $("#materi_semester1_" + a + "").change(function() {
            $('input[name=jumlah_materi_semester1]').val(a);
        });
        console.log('a = ' + a);
    }


    // Edit materi semester 2
    <?php if ($materi_semester2 == null) { ?>
        var g = 1;
    <?php } else { ?>
        var g = $(".materi_semester2").length;
    <?php } ?>
    console.log('g =' + g);
    var h = g + 1;
    $(document).ready(function() {
        $('input[name=jumlah_materi_semester2]').val(g);
        $("#alert_materi_2").hide();
    })


    function tambah__edit__materi_semester2() {
        if (h <= 10) {
            $("#" + g + "_materi_semester2").after(
                `<div class="mb-3 row materi_semester2" id="` + h + `_materi_semester2">
      <label for="materi_semester2_` + h + `" class="col-md-2 text-md-end col-form-label">Materi ` + h + `</label>
        <div class="col-lg-9 col-md-10">
        <input type="text" name="materi_semester2_` + h + `" class="form-control rounded-3"  id="materi_semester2_` +
                h + `">
        </div>
    </div>
    <!-- end materi_semester2 ` +
                h +
                ` -->`
            );
        } else {
            $("#alert_materi_2").show(1000);
        }
        g++;
        h++;
        // console.log(i);

        $("#materi_semester2_" + g + "").change(function() {
            $('input[name=jumlah_materi_semester2]').val(g);
            console.log(g);
        });
        console.log('g =' + g);

    }
</script>
<?= $this->endSection(); ?>