<!-- <section class="container-fluid px-0">
    <div class="card bg-dark text-white">
        <div class="card-header img-card-img-overlay card-header-blog-lg p-0">
            <img src="<?= $url_images; ?>/pages/<?= $result['gambar'] ?>" class="card-img rounded-0" alt="Gambar <?= $result['judul'] ?>">
        </div>
        <div class="card-img-overlay text-center">
            <h1 class="text-light text-uppercase fw-bolder"><?= $result['judul'] ?></h1>
        </div>
    </div>
</section> -->

<section class="container-fluid mt-5">
    <div class="container px-0 px-sm-2">
        <div class="row justify-content-center my-5">

            <!-- <div class="col-lg-10 mb-3">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb bg-light rounded p-3">
                        <li class="breadcrumb-item"><a href="<?= $base_url; ?>" class="link-success fw-bold text-decoration-none"><i class="fa-solid fa-house"></i> Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $result['judul'] ?></li>
                    </ol>
                </nav>
            </div> -->

            <?php

                try{
                    $stmtGaleriJudul = $pdo->prepare("
                            SELECT id_galeri_judul, judul
                            FROM galeri_judul
                            WHERE slug = ?
                        ");

                    $stmtGaleriJudul->bindValue(1, $_GET['slug']);
                    $stmtGaleriJudul->execute();
                    while($resultGaleriJudul = $stmtGaleriJudul->fetch(PDO::FETCH_ASSOC)){
            ?>

            <div class="col-lg-10 my-3">
                <div class="card border-top border-bottom border-success">
                    <div class="card-body px-0">
                        <div class="card-title">
                            <h3 class="fw-bold text-success text-uppercase"><?= $resultGaleriJudul['judul'] ?></h3>
                        </div>
                        <div class="card-body p-0 my-4">
                            <div class="port">
                                <div class="row portfolioContainer">

                                    <?php
                                        try{
                                            $stmtGaleri = $pdo->prepare("
                                                    SELECT ket, gambar
                                                    FROM galeri
                                                    WHERE id_galeri_judul = ?
                                                    ORDER BY id_galeri DESC
                                                ");

                                            $stmtGaleri->bindValue(1, $resultGaleriJudul['id_galeri_judul']);
                                            $stmtGaleri->execute();
                                            while($resultGaleri = $stmtGaleri->fetch(PDO::FETCH_ASSOC)){
                                    ?>

                                    <div class="post col-sm-6 col-lg-4 col-xl-3 my-2" data-aos="fade-in" data-aos-duration="2000">
                                        <div class="gal-detail thumb shadow-sm">
                                            <a href="<?= $url_images; ?>/galeri/<?= $resultGaleri['gambar'] ?>" class="image-popup" title="<?= $resultGaleriJudul['judul'] ?>: <?= $resultGaleri['ket'] ?>">
                                                <div class="card-header card-header-blog-sm p-0">
                                                    <img src="<?= $url_images; ?>/galeri/<?= $resultGaleri['gambar'] ?>" alt="Gambar <?= $resultGaleri['ket'] ?>" class="img-fluid image-zoom-on-hover">
                                                </div>
                                            </a>
                                        
                                            <div class="text-center pt-2">
                                                <p class="text-muted small"><?= $resultGaleri['ket'] ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                            }
                                        }catch(Exception $e){
                                            var_dump($e);
                                        }
                                    ?>

                                </div><!-- end portfoliocontainer-->
                            </div> <!-- End row -->
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

        </div>
    </div>
</section>