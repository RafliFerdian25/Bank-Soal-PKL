/*********  Navbar  **********/
/* When the user scrolls down, hide the navbar. When the user scrolls up, show the navbar */
// var prevScrollpos = window.pageYOffset;
// window.onscroll = function () {
//   var currentScrollPos = window.pageYOffset;
//   if (prevScrollpos > currentScrollPos) {
//     document.getElementById("navbar").style.top = "0";
//   } else {
//     document.getElementById("navbar").style.top = "-75px";
//   }
//   prevScrollpos = currentScrollPos;
// };
// active
$(document).ready(function () {
  if (document.title == "Bank Soal | Beranda") {
    $("#nav__beranda").addClass("active");
  } else if (document.title == "Bank Soal | Sekolah") {
    $("#nav__sekolah").addClass("active");
  } else if (document.title == "Bank Soal | Detail Sekolah") {
    $("#nav__sekolah").addClass("active");
  } else if (document.title == "Bank Soal | Sekolah") {
    $("#nav__sekolah").addClass("active");
  } else if (document.title == "Bank Soal | Soal") {
    $("#nav__soal").addClass("active");
  } else if (document.title == "Bank Soal | Guru") {
    $("#nav__guru").addClass("active");
  }
});
//Datatables
$(document).ready(function () {
  // Add Row
  $("#n").DataTable({
    pageLength: 25,
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
  $("#tabel__guru").DataTable({
    pageLength: 25,
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
  $("#tabel__sekolah").DataTable({
    pageLength: 25,
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
  $("#tabel__soal").DataTable({
    pageLength: 25,
    autoWidth: false,
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
  $("#tabel__akun").DataTable({
    pageLength: 25,
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
// ========== owl carousel ==========
// index - Beranda
$(document).ready(function () {
  $(".owl-carousel#beranda__rekap").owlCarousel({
    loop: true,
    margin: 10,
    nav: false,
    dots: false,
    autoplay: true,
    autoplayTimeout: 3000,
    smartSpeed: 1000,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 2,
      },
      1200: {
        items: 3,
      },
    },
  });
});

// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  "use strict";

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll(".needs-validation");

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms).forEach(function (form) {
    form.addEventListener(
      "submit",
      function (event) {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        }

        form.classList.add("was-validated");
      },
      false
    );
  });
})();

// mapel
$(".tambah__materi").hover(
  function () {
    $(".fa-plus").css("color", "white");
  },
  function () {
    $(".fa-plus").css("color", "black");
  }
);

// Tambah materi
var i = $(".materi").length;
var j = i + 1;
function tambah__materi() {
  if (j <= 8) {
    $("#" + i + "_materi").after(
      `<div class="mb-3 row materi" id="` +
        j +
        `_materi">
      <label for="materi_` +
        j +
        `" class="col-md-2 text-md-end col-form-label">Materi ` +
        j +
        `</label>
        <div class="col-lg-9 col-md-10">
        <input type="text" name="materi_` +
        j +
        `" class="form-control rounded-3 <?= ($validation->hasError('materi_` +
        j +
        `')) ? 'is-invalid' : ''; ?>" id="materi_` +
        j +
        `">
        </div>
    </div>
    <!-- end materi ` +
        j +
        ` -->`
    );
  } else {
    $("#alert_materi").show(1000);
  }
  i++;
  j++;
  $("#materi_" + i + "").change(function () {
    console.log(i);
    $("#jumlah_materi").val(i);
  });
}

// Input File Image

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $(input)
        .parent(".input-file-image")
        .find(".img-upload-preview")
        .attr("src", e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
  }
}

$('.input-file-image input[type="file"').change(function () {
  readURL(this);
});

// Tooltip
var tooltipTriggerList = [].slice.call(
  document.querySelectorAll('[data-bs-toggle="tooltip"]')
);
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl);
});

//hapus sekolah
$(".hapus_sekolah").on("click", function (e) {
  e.preventDefault();
  const href = $(this).attr("href");
  Swal.fire({
    title: "Apakah anda yakin?",
    text: "Data sekolah akan dihapus!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#d33",
    cancelButtonColor: "#3085d6s",
    confirmButtonText: "Hapus data!",
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire("Terhapus!", "Data sekolah sudah terhapus.", "success").then(
        (result) => {
          if (result.isConfirmed) {
            document.location.href = href;
          }
        }
      );
    }
  });
});
//hapus guru
$(".hapus_guru").on("click", function (e) {
  e.preventDefault();
  const href = $(this).attr("href");
  Swal.fire({
    title: "Apakah anda yakin?",
    text: "Data guru akan dihapus!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#d33",
    cancelButtonColor: "#3085d6",
    confirmButtonText: "Hapus data!",
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire("Terhapus!", "Data guru sudah terhapus.", "success").then(
        (result) => {
          if (result.isConfirmed) {
            document.location.href = href;
          }
        }
      );
    }
  });
});
//hapus mapel
$(".hapus_mapel").on("click", function (e) {
  e.preventDefault();
  const href = $(this).attr("href");
  Swal.fire({
    title: "Apakah anda yakin?",
    text: "Data mata pelajaran akan dihapus!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#d33",
    cancelButtonColor: "#3085d6",
    confirmButtonText: "Hapus data!",
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire({
        title: "Terhapus!",
        text: "Data mata pelajaran sudah terhapus.",
        icon: "success",
      }).then((result) => {
        if (result.isConfirmed) {
          document.location.href = href;
        }
      });
    }
  });
});
//hapus soal
$(".hapus_soal").on("click", function (e) {
  e.preventDefault();
  const href = $(this).attr("href");
  Swal.fire({
    title: "Apakah anda yakin?",
    text: "Data soal akan dihapus!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#d33",
    cancelButtonColor: "#3085d6",
    confirmButtonText: "Hapus data!",
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire("Terhapus!", "Data soal sudah terhapus.", "success").then(
        (result) => {
          if (result.isConfirmed) {
            document.location.href = href;
          }
        }
      );
    }
  });
});
//hapus akun
$(".hapus_akun").on("click", function (e) {
  e.preventDefault();
  const href = $(this).attr("href");
  Swal.fire({
    title: "Apakah anda yakin?",
    text: "Data soal akan dihapus!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#d33",
    cancelButtonColor: "#3085d6",
    confirmButtonText: "Hapus data!",
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire("Terhapus!", "Data soal sudah terhapus.", "success").then(
        (result) => {
          if (result.isConfirmed) {
            document.location.href = href;
          }
        }
      );
    }
  });
});
//hapus materi
$(".hapus_materi").on("click", function (e) {
  e.preventDefault();
  const href = $(this).attr("href");
  Swal.fire({
    title: "Apakah anda yakin?",
    text: "Data materi akan dihapus!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#d33",
    cancelButtonColor: "#3085d6",
    confirmButtonText: "Hapus data!",
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire("Terhapus!", "Data materi sudah terhapus.", "success").then(
        (result) => {
          if (result.isConfirmed) {
            document.location.href = href;
          }
        }
      );
    }
  });
});

/*****************  Edit Akun  ***********************/
