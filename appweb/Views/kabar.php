<?php
    try {
        $stmt  = $pdo->prepare("
                SELECT judul, gambar, img_share, deskripsi, slug, tgl_update
                FROM page
                WHERE id_page = ?");

        $stmt->bindValue(1, $_GET['id']);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    }catch(Exception $e) {
        var_dump($e);
        die();
        exit();
    }

    switch ($_GET['act']) {
        case 'list':
?>

<section class="container-fluid px-0">
    <div class="card bg-dark text-white">
        <div class="card-header img-card-img-overlay card-header-blog-lg p-0">
            <img src="<?= $url_images; ?>/pages/<?= $result['gambar'] ?>" class="card-img rounded-0" alt="Gambar <?= $result['judul'] ?>">
        </div>
        <div class="card-img-overlay text-center">
            <h1 class="text-light text-uppercase fw-bolder"><?= $result['judul'] ?></h1>
        </div>
    </div>
</section>

<section class="container-fluid mt-5">
    <div class="container px-0 px-sm-2">
        <div class="row my-5">

            <div class="col-12">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb bg-light rounded p-3">
                        <li class="breadcrumb-item"><a href="<?= $base_url; ?>" class="link-success fw-bold text-decoration-none"><i class="fa-solid fa-house"></i> Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $result['judul'] ?></li>
                    </ol>
                </nav>
            </div>

            <?php

                try {
                    $stmtMinKabar = $pdo->prepare("
                            SELECT tgl_terbit
                            FROM kabar
                            ORDER BY tgl_terbit ASC
                        ");

                    $stmtMaxKabar = $pdo->prepare("
                            SELECT tgl_terbit
                            FROM kabar
                            ORDER BY tgl_terbit DESC
                        ");

                    $stmtMinKabar->execute();
                    $stmtMaxKabar->execute();
                    $resultMinKabar = $stmtMinKabar->fetch(PDO::FETCH_ASSOC);
                    $resultMaxKabar = $stmtMaxKabar->fetch(PDO::FETCH_ASSOC);
                } catch (Exception $e) {
                    var_dump($e);
                }

                try {
                    $stmtRowKabar = $pdo->prepare("
                            SELECT DISTINCT tgl_terbit
                            FROM kabar
                            ORDER BY tgl_terbit DESC
                        ");

                    $stmtRowKabar->execute();
                    while ($resultRowKabar = $stmtRowKabar->fetch(PDO::FETCH_ASSOC)) {
            ?>

            <div class="col-12 mt-4">
                <h4 class="bg-primary text-light rounded shadow-sm p-2"><?= indoTgl($resultRowKabar['tgl_terbit']) ?></h4>
            </div>

            <?php
                        try{
                            $stmtKabar = $pdo->prepare("
                                    SELECT judul, gambar, deskripsi, slug, tgl_terbit
                                    FROM kabar
                                    WHERE tgl_terbit = ?
                                    ORDER BY id_kabar DESC
                                ");

                            $stmtKabar->bindValue(1, $resultRowKabar['tgl_terbit']);
                            $stmtKabar->execute();
                            while($resultKabar = $stmtKabar->fetch(PDO::FETCH_ASSOC)){
                                $deskripsi      = htmlentities(strip_tags(preg_replace("/&#?[a-z0-9]+;/i","",$resultKabar["deskripsi"])));
                                $myDeskripsi    = substr($deskripsi,0,strrpos(substr($deskripsi,0,225)," "))." ...";
            ?>

            <div class="col-md-6 col-lg-4 col-xl-3 my-3">
                <div class="card shadow">
                    <div class="card-header card-header-blog p-0">
                        <img src="<?= $url_images ?>/kabar/<?= $resultKabar['gambar'] ?>" alt="Gambar <?= $resultKabar['judul'] ?>" class="image-zoom-on-hover img-thumbnail rounded-top-5">
                    </div>
                    <div class="card-body bg-primary">
                        <small class="text-warning"><i class="fa-solid fa-calendar-days"></i> <?= indoTgl($resultKabar['tgl_terbit']) ?></small>

                        <h5 class="fw-bolder lh-sm text-warning"><?= $resultKabar['judul'] ?></h5>

                        <small class="text-light"><?= $myDeskripsi ?></small>

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
                    }
                } catch (Exception $e) {
                    var_dump($e);
                }
            ?>

        </div>
    </div>
</section>

<?php
            break;
        case 'read':

        try {
            $stmtData  = $pdo->prepare("
                    SELECT judul, gambar, img_share, deskripsi, slug, tgl_update
                    FROM page
                    WHERE id_page = ?");

            $stmtData->bindValue(1, $_GET['id']);
            $stmtData->execute();

            if ($stmtData->rowCount()>0) {
                $resultData = $stmtData->fetch(PDO::FETCH_ASSOC);

                try {
                    $stmtDetail = $pdo->prepare("
                            SELECT judul, gambar, deskripsi, tgl_terbit
                            FROM kabar
                            WHERE slug = ?
                            LIMIT 1
                        ");

                    $stmtDetail->bindValue(1, $_GET['slug']);
                    $stmtDetail->execute();

                    if ($stmtDetail->rowCount()>0) {
                        $resultDetail = $stmtDetail->fetch(PDO::FETCH_ASSOC);
                    }else{
                        echo "<script>window.location = '404';</script>";
                    }
                } catch (Exception $e) {
                    var_dump($e);
                    die();
                    exit();
                }
            }else{
                echo "<script>window.location = '404';</script>";
            }
        }catch(Exception $e) {
            var_dump($e);
            die();
            exit();
        }
?>

<section class="container-fluid px-0">
    <div class="card bg-dark text-white">
        <div class="card-header img-card-img-overlay card-header-blog-lg p-0">
            <img src="<?= $url_images; ?>/kabar/<?= $resultDetail['gambar'] ?>" class="card-img rounded-0" alt="Gambar <?= $resultDetail['judul'] ?>">
        </div>
        <div class="card-img-overlay text-center">
            <h1 class="text-light text-uppercase fw-bolder"><?= $resultDetail['judul'] ?></h1>
        </div>
    </div>
</section>

<section class="container-fluid mt-5">
    <div class="container px-0 px-sm-2">

        <div class="row justify-content-center my-5">
            <div class="col-12 mb-3">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb bg-light rounded p-3">
                        <li class="breadcrumb-item"><a href="<?= $base_url; ?>" class="link-success fw-bold text-decoration-none"><i class="fa-solid fa-house"></i> Beranda</a></li>
                        <li class="breadcrumb-item"><a href="<?= $base_url; ?>/kabar/" class="link-success fw-bold text-decoration-none"><?= $resultData['judul'] ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $resultDetail['judul'] ?></li>
                    </ol>
                </nav>
            </div>

            <div class="col-12">
                <div class="card-body p-0">
                    <div class="card-title text-center">
                        <h1 class="fw-bold text-success text-uppercase"><?= $resultDetail['judul'] ?></h1>
                    </div>

                    <div class="d-flex justify-content-between py-4 border-top">
                        <div>
                            <span class="fw-bold text-muted">Bagikan ke: </span>
                            <ul class="list-unstyled d-inline-flex">
                                <li><a target="_blank" href="https://wa.me/?text=<?= $resultData['judul']; ?>%0A%0ASelengkapnya%20di%3A%20<?= $base_url.'/'.$resultData['slug'].'/'; ?>" title="Bagikan ke Whatsapp" class="btn btn-sm btn-success rounded-pill ms-1"><i class="fa-brands fa-whatsapp"></i></a></li>
                                <li>
                                    <button id="copyLink" class="btn btn-sm btn-secondary rounded-pill ms-1" data-clipboard-text="<?= $base_url.'/'.$resultData['slug'].'/'; ?>">
                                        <i class="fa-solid fa-copy"></i> Salin URL
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <small class="text-muted"><i class="fa-solid fa-calendar-days"></i> <?= indoTgl($resultDetail['tgl_terbit']) ?></small>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card sticky-top-sidebar">
                    <div class="card-header p-0">
                        <img src="<?= $url_images; ?>/kabar/<?= $resultDetail['gambar'] ?>" class="card-img rounded-0" alt="Gambar <?= $resultDetail['judul'] ?>">
                    </div>
                    <div class="card-body">
                        <small class="text-muted"><em>Gambar <?= $resultDetail['judul'] ?></em></small>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body p-0">
                        <?= $resultDetail['deskripsi'] ?>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mt-5">
                <div class="card">
                    <div class="card-footer">
                        <?php $uri = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?>
                        <div class="fb-comments" data-href="<?php echo $uri; ?>" data-width="100%" data-numposts="100">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<?php
            break;
    }
?>