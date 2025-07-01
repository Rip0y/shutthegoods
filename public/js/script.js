(function ($) {
  "use strict";

  var initPreloader = function () {
    $(document).ready(function ($) {
      var Body = $("body");
      Body.addClass("preloader-site");
    });
    $(window).on("load", function () { // Menggunakan .on("load", ...) yang lebih modern
      $(".preloader-wrapper").fadeOut();
      $("body").removeClass("preloader-site");
    });
  };

  // init Chocolat light box
  var initChocolat = function () {
    Chocolat(document.querySelectorAll(".image-link"), {
      imageSize: "contain",
      loop: true,
    });
  };

  var initSwiper = function () {
    var swiper = new Swiper(".main-swiper", {
      speed: 500,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });

    var category_swiper = new Swiper(".category-carousel", {
      slidesPerView: 3,
      spaceBetween: 30,
      speed: 500,
      navigation: {
        nextEl: ".category-carousel-next",
        prevEl: ".category-carousel-prev",
      },
      breakpoints: {
        0: { slidesPerView: 1 },
        800: { slidesPerView: 2 },
        1500: { slidesPerView: 3 },
      },
    });

    $(".products-carousel").each(function () {
      var $el_id = $(this).attr("id");
      var products_swiper = new Swiper("#" + $el_id + " .swiper", {
        slidesPerView: 5,
        spaceBetween: 30,
        speed: 500,
        navigation: {
          nextEl: "#" + $el_id + " .products-carousel-next",
          prevEl: "#" + $el_id + " .products-carousel-prev",
        },
        breakpoints: {
          0: { slidesPerView: 1 },
          768: { slidesPerView: 3 },
          991: { slidesPerView: 4 },
        },
      });
    });

    var testimonialSwiper = new Swiper(".testimonial-Swiper", {
      loop: true,
      grabCursor: true,
      spaceBetween: 30,
      slidesPerView: 1,
      pagination: {
        el: ".testimonial-pagination",
        clickable: true,
      },
      breakpoints: {
        768: { slidesPerView: 2, spaceBetween: 20 },
        992: { slidesPerView: 3, spaceBetween: 30 },
      },
    });

    var thumb_slider = new Swiper(".product-thumbnail-slider", {
      slidesPerView: 5,
      spaceBetween: 20,
      direction: "vertical",
      breakpoints: {
        0: { direction: "horizontal" },
        992: { direction: "vertical" },
      },
    });

    var large_slider = new Swiper(".product-large-slider", {
      slidesPerView: 1,
      spaceBetween: 0,
      effect: "fade",
      thumbs: {
        swiper: thumb_slider,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });
  };

  var initProductQty = function () {
    $(".product-qty").each(function () {
      var $el_product = $(this);
      var quantity = 0;
      $el_product.find(".quantity-right-plus").click(function (e) {
        e.preventDefault();
        quantity = parseInt($el_product.find("#quantity").val());
        $el_product.find("#quantity").val(quantity + 1);
      });
      $el_product.find(".quantity-left-minus").click(function (e) {
        e.preventDefault();
        quantity = parseInt($el_product.find("#quantity").val());
        if (quantity > 0) {
          $el_product.find("#quantity").val(quantity - 1);
        }
      });
    });
  };

  var initJarallax = function () {
    jarallax(document.querySelectorAll(".jarallax"));
    jarallax(document.querySelectorAll(".jarallax-keep-img"), {
      keepImg: true,
    });
  };

  // =================================================================
  // DOKUMEN READY - SEMUA FUNGSI DIPANGGIL DARI SINI
  // =================================================================
  $(document).ready(function () {
    // Memanggil semua fungsi inisialisasi
    initPreloader();
    initSwiper();
    initProductQty();
    initJarallax();
    initChocolat();

    // ==============================================================
    // KODE UNTUK TOMBOL "LIHAT SEMUA" SEKARANG DI SINI (LOKASI BENAR)
    // ==============================================================
    $("#lihatSemuaTips").on("click", function (e) {
      // Mencegah link berpindah halaman
      e.preventDefault();
      
      // Menambah atau menghapus kelas .tampil pada wrapper
      $("#artikelTambahanWrapper").toggleClass("tampil");

      // Mengubah teks tombol
      var button = $(this);
      if (button.text() === "Lihat Semua") {
        button.text("Tampilkan Lebih Sedikit");
      } else {
        button.text("Lihat Semua");
      }
    });

    // ======================================================================
    // KODE BARU YANG LEBIH STABIL UNTUK "LIHAT SEMUA" NEW ARRIVALS
    // ======================================================================
    $('#lihatSemuaProduk').on('click', function(e) {
      e.preventDefault(); 
      
      // Menggunakan fadeToggle pada semua elemen dengan kelas .produk-tambahan
      $('.produk-tambahan').fadeToggle('slow');

      // Mengubah teks tombol
      var button = $(this);
      if (button.text() === "Lihat Semua") {
        button.text("Tampilkan Lebih Sedikit");
      } else {
        button.text("Lihat Semua");
      }
    });
    // Pastikan kode ini dijalankan setelah dokumen HTML selesai dimuat
document.addEventListener("DOMContentLoaded", function() {

  const categorySwiper = new Swiper('.category-carousel', {
    // Opsi yang mungkin sudah Anda miliki
    loop: false, // Atur ke true jika ingin carousel berputar terus
    spaceBetween: 20, // Jarak antar slide/item
    slidesPerView: 2, // Default jumlah slide yang terlihat untuk mobile

    // Opsi Navigasi untuk tombol ❮ dan ❯
    navigation: {
      nextEl: '.category-carousel-next',
      prevEl: '.category-carousel-prev',
    },

    // --- TAMBAHKAN BLOK KODE INI ---
    keyboard: {
      enabled: true,          // Ini adalah kunci untuk mengaktifkannya
      onlyInViewport: true,   // Sangat direkomendasikan: keyboard hanya aktif saat carousel terlihat di layar
    },
    // --------------------------------

    // Opsi Breakpoints untuk tampilan responsif di berbagai ukuran layar
    breakpoints: {
      // saat lebar layar 576px atau lebih besar
      576: {
        slidesPerView: 3,
        spaceBetween: 20
      },
      // saat lebar layar 768px atau lebih besar
      768: {
        slidesPerView: 4,
        spaceBetween: 30
      },
      // saat lebar layar 992px atau lebih besar
      992: {
        slidesPerView: 5,
        spaceBetween: 30
      }
    }
  });

});
  }); // Akhir dari document.ready
  
})(jQuery);