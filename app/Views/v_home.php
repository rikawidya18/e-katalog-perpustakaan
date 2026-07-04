<!-- Pencarian Buku -->
<div class="container mt-4">

    <section class="hero">

        <style>
        .form-area {
            max-width: 650px;
            width: 100%;
            margin: auto;
        }

        .search-box input {
            border-radius: 5px 0 0 5px;
        }

        .search-box button {
            border-radius: 0 5px 5px 0;
        }

        .area-slider {
            background: rgba(200, 200, 200, 0.85);
            padding: 12px;
            border-radius: 6px;
        }

        /* card buku */
        .card-buku {
            position: relative;
            width: 100%;
            border-radius: 6px;
            overflow: hidden;
            background: #e9e9e9;
            text-align: center;
            transition: 0.3s ease;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .card-buku:hover {
            transform: translateY(-5px);
        }

        .cover-buku {
            width: 100%;
            height: 140px;
            object-fit: cover;
        }

        .info-buku {
            padding: 6px;
        }

        .judul-buku {
            font-size: 13px;
            line-height: 1.3;
            height: 34px;
            overflow: hidden;

            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }

        .hover-detail {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;

            background: rgba(0, 0, 0, 0.6);

            display: flex;
            justify-content: center;
            align-items: center;

            opacity: 0;
            transition: 0.3s;
        }

        .card-buku:hover .hover-detail {
            opacity: 1;
        }

        .btn-detail {
            font-size: 12px;
        }

        .swiper-button-next,
        .swiper-button-prev {
            color: #ff6a2a;
        }
        </style>


        <div class="form-area">

            <h2 class="text-center mb-3">Katalog Perpustakaan</h2>
            <h8 class="text-center mb-3">Gunakan Fasilitas Pencarian Untuk Menemukan Buku Yang Anda Inginkan</h8>

            <form action="<?= base_url('home/HasilCari') ?>" method="get" id="formCari">

                <div class="search-box d-flex">

                    <input type="text" name="keyword" id="keyword" class="form-control mr-2"
                        placeholder="Cari judul buku atau pengarang">

                    <button type="submit" class="btn btn-warning text-white">
                        Cari
                    </button>

                </div>


                <div id="warningCari" class="alert alert-warning mt-2" style="display:none;">

                    <span>Silakan Isi Kolom Pencarian !</span>

                    <button type="button" onclick="tutupWarning()"
                        style="float:right;border:none;background:none;font-size:20px;cursor:pointer;">
                        &times;
                    </button>

                </div>


                <small data-toggle="collapse" data-target="#pencarianSpesifik" style="cursor:pointer;">
                    <i class="fas fa-filter"></i> Pencarian Spesifik
                </small>


                <div class="collapse mt-3" id="pencarianSpesifik">

                    <div class="card card-body">

                        <div class="form-group">
                            <label>Kategori</label>

                            <select name="id_kategori" id="kategori" class="form-control">

                                <option value="">--Pilih Kategori--</option>

                                <?php foreach ($kategori as $value) { ?>

                                <option value="<?= $value['id_kategori'] ?>">
                                    <?= $value['nama_kategori'] ?>
                                </option>

                                <?php } ?>

                            </select>

                        </div>


                        <div class="form-group">
                            <label>Pengarang</label>
                            <input type="text" name="pengarang" id="pengarang" class="form-control">
                        </div>


                        <div class="form-group">
                            <label>Penerbit</label>
                            <input type="text" name="penerbit" id="penerbit" class="form-control">
                        </div>


                        <div class="form-group">
                            <label>Tahun Terbit</label>
                            <input type="number" name="tahun_terbit" id="tahun" class="form-control">
                        </div>


                        <div class="form-group">
                            <label>Tempat Terbit</label>
                            <input type="text" name="tempat_terbit" id="tempat" class="form-control">
                        </div>


                        <button type="submit" class="btn btn-primary btn-block">
                            Terapkan Pencarian Spesifik
                        </button>

                    </div>

                </div>

            </form>


            <!-- SLIDER BUKU -->
            <div class="mt-5">

                <h5 class="mb-3">
                    <i class="fas fa-book text-primary"></i> Buku Terbaru
                </h5>

                <div class="area-slider">

                    <div class="swiper mySwiper">

                        <div class="swiper-wrapper">

                            <?php foreach ($buku as $b) { ?>

                            <div class="swiper-slide">

                                <div class="card-buku">

                                    <img src="<?= !empty($b['cover']) ? base_url('cover/'.$b['cover']) : base_url('cover/default.png') ?>"
                                        class="cover-buku">

                                    <div class="hover-detail">
                                        <a href="<?= base_url('home/detailbuku/'.$b['id_buku']) ?>"
                                            class="btn btn-light btn-detail">
                                            Detail Buku
                                        </a>
                                    </div>

                                    <div class="info-buku">

                                        <div class="judul-buku">
                                            <?= $b['judul_buku'] ?>
                                        </div>

                                    </div>

                                </div>

                            </div>

                            <?php } ?>

                        </div>

                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>



<script>
document.getElementById("formCari").addEventListener("submit", function(e) {

    let keyword = document.getElementById("keyword").value.trim();
    let kategori = document.getElementById("kategori").value;
    let pengarang = document.getElementById("pengarang").value.trim();
    let penerbit = document.getElementById("penerbit").value.trim();
    let tahun = document.getElementById("tahun").value;
    let tempat = document.getElementById("tempat").value.trim();

    if (keyword == "" && kategori == "" && pengarang == "" && penerbit == "" && tahun == "" && tempat == "") {

        document.getElementById("warningCari").style.display = "block";
        e.preventDefault();

    }

});

function tutupWarning() {
    document.getElementById("warningCari").style.display = "none";
}
</script>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
var swiper = new Swiper(".mySwiper", {

    slidesPerView: 6,
    spaceBetween: 10,

    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev"
    },

    breakpoints: {

        320: {
            slidesPerView: 2
        },
        576: {
            slidesPerView: 3
        },
        768: {
            slidesPerView: 4
        },
        992: {
            slidesPerView: 5
        },
        1200: {
            slidesPerView: 6
        }

    }

});
</script>