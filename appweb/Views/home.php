<?php
    try {
        $stmt  = $pdo->prepare("
                    SELECT judul, gambar
                    FROM page
                    WHERE id_page = ?
                ");

        $stmt->bindValue(1, $_GET['id']);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    }catch(Exception $e) {
        var_dump($e);
        die();
        exit();
    }
?>

<header class="container-fluid mt-5">
    <div class="container pb-5 px-0 px-sm-2">
        <section class="slider row justify-content-center">
            <?php
                try{
                    $stmtSlider = $pdo->prepare("
                            SELECT judul, gambar, deskripsi, slug
                            FROM kabar
                            WHERE slider = ?
                            ORDER BY id_kabar DESC
                            LIMIT 5
                        ");

                    $stmtSlider->bindValue(1, "Yes");
                    $stmtSlider->execute();
                    while($resultSlider = $stmtSlider->fetch(PDO::FETCH_ASSOC)){
                        $deskripsi      = htmlentities(strip_tags(preg_replace("/&#?[a-z0-9]+;/i","",$resultSlider["deskripsi"])));
                        $myDeskripsi    = substr($deskripsi,0,strrpos(substr($deskripsi,0,250)," "))." ...";
            ?>
            <div class="text-center">
                <div class="col-8">
                    <img src="<?= $url_images ?>/kabar/<?= $resultSlider['gambar'] ?>" alt="Gambar <?= $resultSlider['judul'] ?>" class="img-fluid position-relative start-25 rounded-5 shadow">
                </div>
                <div class="col-12 bg-success rounded-5 text-center text-light pt-5 pb-3 px-4 mt--5">
                    <h1 class="mt-4 fw-bold"><?= $resultSlider['judul'] ?></h1>
                    <p><?= $myDeskripsi ?></p>
                    <a href="<?= $base_url ?>/kabar/<?= $resultSlider['slug'] ?>/" title="Selengkapnya Tentang <?= $resultSlider['judul'] ?>" class="btn btn-warning">Selengkapnya <i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
            <?php
                    }
                }catch(Exception $e){
                    var_dump($e);
                }
            ?>
        </section>
    </div>
</header>

<section class="container-fluid mt-4">
    <div class="container px-0 px-sm-2">
        <h1 class="text-center fw-bold text-dark">Yayasan Ini Berfokus Pada</h1>
        <div class="row justify-content-center mt-3">
            <div class="col-6 col-md-4 col-lg-3 col-xl-2 py-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center pt-0">
                        <i class="fa-solid fa-graduation-cap fa-4x text-primary"></i>
                        <h4 class="mt-3">Pendidikan</h4>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3 col-xl-2 py-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center pt-0">
                        <i class="fa-solid fa-chart-line fa-4x text-primary"></i>
                        <h4 class="mt-3">Ekonomi</h4>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3 col-xl-3 py-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center pt-0">
                        <i class="fa-solid fa-users fa-4x text-primary"></i>
                        <h5 class="mt-3">Pemberdaya Masyarakat</h5>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3 col-xl-2 py-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center pt-0">
                        <i class="fa-solid fa-star-and-crescent fa-4x text-primary"></i>
                        <h4 class="mt-3">Keagamaan</h4>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3 col-xl-2 py-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center pt-0">
                        <i class="fa-solid fa-kit-medical fa-4x text-primary"></i>
                        <h4 class="mt-3">Kesehatan</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container-fluid bg-success mt-5 py-5">
    <div class="container px-0 px-sm-2">
        <div class="row justify-content-center">
            <?php
                try {
                    $stmtPengurus  = $pdo->prepare("
                                SELECT judul, img_share
                                FROM page
                                WHERE id_page = ?
                            ");

                    $stmtPengurus->bindValue(1, "4");
                    $stmtPengurus->execute();
                    $resultPengurus = $stmtPengurus->fetch(PDO::FETCH_ASSOC);
                }catch(Exception $e) {
                    var_dump($e);
                    die();
                    exit();
                }
            ?>
            <div class="col-12 col-lg-11 col-xl-10 text-center">
                <h1 class="text-center fw-bold text">Pengurus</h1>
                <img src="<?= $url_images ?>/pages/<?= $resultPengurus['img_share'] ?>" alt="Gambar <?= $resultPengurus['judul'] ?>" class="w-75 rounded-5 my-4">
                <div class="w-100"></div>
                <a href="<?= $base_url ?>/struktur-pengurus/" title="Halaman <?= $resultPengurus['judul'] ?>" class="btn btn-warning">Gambar <?= $resultPengurus['judul'] ?> <i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</section>

<section class="container-fluid mt-5 py-5">
    <div class="container px-0 px-sm-2">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-11 col-xl-10 mb-4 text-center">
                <h1 class="text-center fw-bold text-dark">Kabar Terbaru</h1>
            </div>

            <?php
                try{
                    $stmtKabar = $pdo->prepare("
                            SELECT judul, gambar, deskripsi, slug
                            FROM kabar
                            ORDER BY id_kabar DESC
                            LIMIT 3
                        ");

                    $stmtKabar->execute();
                    while($resultKabar = $stmtKabar->fetch(PDO::FETCH_ASSOC)){
                        $deskripsi      = htmlentities(strip_tags(preg_replace("/&#?[a-z0-9]+;/i","",$resultKabar["deskripsi"])));
                        $myDeskripsi    = substr($deskripsi,0,strrpos(substr($deskripsi,0,225)," "))." ...";
            ?>

            <div class="col-md-6 col-lg-4">
                <div class="card shadow">
                    <div class="card-header card-header-blog-lg p-0">
                        <img src="<?= $url_images ?>/kabar/<?= $resultKabar['gambar'] ?>" alt="Gambar <?= $resultKabar['judul'] ?>" class="image-zoom-on-hover img-thumbnail rounded-top-5">
                    </div>
                    <div class="card-body bg-primary">
                        <p class="text-light"><?= $myDeskripsi ?></p>

                        <div class="text-center">
                            <a href="<?= $base_url ?>/kabar/<?= $resultKabar['slug'] ?>/" title="Selengkapnya Tentang <?= $resultKabar['judul'] ?>" class="btn btn-warning mt-3">Selengkapnya <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <?php
                    }
                }catch(Exception $e){
                    var_dump($e);
                }
            ?>

            <div class="w-100"></div>

            <div class="col-auto">
                <a href="<?= $base_url ?>/kabar/" title="Lebih Banyak Lagi Tentang Kabar" class="btn btn-lg btn-warning mt-5">Lebih Banyak Lagi <i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</section>