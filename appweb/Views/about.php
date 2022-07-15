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
?>

<?php
    switch ($_GET['id']) {
        case '2':
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

        <div class="row justify-content-center my-5">
            <div class="col-lg-10 mb-3">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb bg-light rounded p-3">
                        <li class="breadcrumb-item"><a href="<?= $base_url; ?>" class="link-success fw-bold text-decoration-none"><i class="fa-solid fa-house"></i> Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $result['judul'] ?></li>
                    </ol>
                </nav>
            </div>
            <div class="col-lg-10 card">
                <div class="card-body p-0">
                    <div class="card-title text-center">
                        <h1 class="fw-bold text-success"><?= $result['judul'] ?></h1>
                    </div>
                    <div class="card-body p-0 my-4">
                        <?= $result['deskripsi'] ?>

                        <div class="d-flex justify-content-between my-4 py-4 border-top">
                            <div>
                                <span class="fw-bold text-muted">Bagikan ke: </span>
                                <ul class="list-unstyled d-inline-flex">
                                    <li><a target="_blank" href="https://wa.me/?text=<?= $result['judul']; ?>%0A%0ASelengkapnya%20di%3A%20<?= $base_url.'/'.$result['slug'].'/'; ?>" title="Bagikan ke Whatsapp" class="btn btn-sm btn-success rounded-pill ms-1"><i class="fa-brands fa-whatsapp"></i></a></li>
                                    <li>
                                        <button id="copyLink" class="btn btn-sm btn-secondary rounded-pill ms-1" data-clipboard-text="<?= $base_url.'/'.$result['slug'].'/'; ?>">
                                            <i class="fa-solid fa-copy"></i> Salin URL
                                        </button>
                                    </li>
                                </ul>
                            </div>
                            <small class="text-muted"><i class="fa-solid fa-calendar-days"></i> <?= indoTgl($result['tgl_update']) ?></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<?php
            break;
        case '3':
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

        <div class="row justify-content-center my-5">
            <div class="col-lg-10 mb-3">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb bg-light rounded p-3">
                        <li class="breadcrumb-item"><a href="<?= $base_url; ?>" class="link-success fw-bold text-decoration-none"><i class="fa-solid fa-house"></i> Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $result['judul'] ?></li>
                    </ol>
                </nav>
            </div>
            <div class="col-lg-10 card">
                <div class="card-body p-0">
                    <div class="card-title text-center">
                        <h1 class="fw-bold text-success"><?= $result['judul'] ?></h1>
                    </div>
                    <div class="card-body p-0 my-4">
                        <?= $result['deskripsi'] ?>

                        <div class="d-flex justify-content-between my-4 py-4 border-top">
                            <div>
                                <span class="fw-bold text-muted">Bagikan ke: </span>
                                <ul class="list-unstyled d-inline-flex">
                                    <li><a target="_blank" href="https://wa.me/?text=<?= $result['judul']; ?>%0A%0ASelengkapnya%20di%3A%20<?= $base_url.'/'.$result['slug'].'/'; ?>" title="Bagikan ke Whatsapp" class="btn btn-sm btn-success rounded-pill ms-1"><i class="fa-brands fa-whatsapp"></i></a></li>
                                    <li>
                                        <button id="copyLink" class="btn btn-sm btn-secondary rounded-pill ms-1" data-clipboard-text="<?= $base_url.'/'.$result['slug'].'/'; ?>">
                                            <i class="fa-solid fa-copy"></i> Salin URL
                                        </button>
                                    </li>
                                </ul>
                            </div>
                            <small class="text-muted"><i class="fa-solid fa-calendar-days"></i> <?= indoTgl($result['tgl_update']) ?></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<?php

            break;
        case '4':
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

        <div class="row justify-content-center my-5">
            <div class="col-lg-10 mb-3">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb bg-light rounded p-3">
                        <li class="breadcrumb-item"><a href="<?= $base_url; ?>" class="link-success fw-bold text-decoration-none"><i class="fa-solid fa-house"></i> Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $result['judul'] ?></li>
                    </ol>
                </nav>
            </div>
            <div class="col-lg-10 card">
                <div class="card-body p-0">
                    <div class="card-title text-center">
                        <h1 class="fw-bold text-success"><?= $result['judul'] ?></h1>
                    </div>
                    <div class="card-body p-0 my-4">
                        <img src="<?= $url_images; ?>/pages/<?= $result['img_share'] ?>" class="card-img rounded-5" alt="Gambar <?= $result['judul'] ?>">

                        <div class="d-flex justify-content-between my-4 py-4 border-top">
                            <div>
                                <span class="fw-bold text-muted">Bagikan ke: </span>
                                <ul class="list-unstyled d-inline-flex">
                                    <li><a target="_blank" href="https://wa.me/?text=<?= $result['judul']; ?>%0A%0ASelengkapnya%20di%3A%20<?= $base_url.'/'.$result['slug'].'/'; ?>" title="Bagikan ke Whatsapp" class="btn btn-sm btn-success rounded-pill ms-1"><i class="fa-brands fa-whatsapp"></i></a></li>
                                    <li>
                                        <button id="copyLink" class="btn btn-sm btn-secondary rounded-pill ms-1" data-clipboard-text="<?= $base_url.'/'.$result['slug'].'/'; ?>">
                                            <i class="fa-solid fa-copy"></i> Salin URL
                                        </button>
                                    </li>
                                </ul>
                            </div>
                            <small class="text-muted"><i class="fa-solid fa-calendar-days"></i> <?= indoTgl($result['tgl_update']) ?></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<?php

            break;
        case '5':
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

        <div class="row justify-content-center my-5">
            <div class="col-lg-10 mb-3">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb bg-light rounded p-3">
                        <li class="breadcrumb-item"><a href="<?= $base_url; ?>" class="link-success fw-bold text-decoration-none"><i class="fa-solid fa-house"></i> Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $result['judul'] ?></li>
                    </ol>
                </nav>
            </div>
            <div class="col-lg-10 card">
                <div class="card-body p-0">
                    <div class="card-title text-center">
                        <h1 class="fw-bold text-success"><?= $result['judul'] ?></h1>
                    </div>
                    <div class="card-body p-0 my-4">
                        <?= $result['deskripsi'] ?>

                        <div class="d-flex justify-content-between my-4 py-4 border-top">
                            <div>
                                <span class="fw-bold text-muted">Bagikan ke: </span>
                                <ul class="list-unstyled d-inline-flex">
                                    <li><a target="_blank" href="https://wa.me/?text=<?= $result['judul']; ?>%0A%0ASelengkapnya%20di%3A%20<?= $base_url.'/'.$result['slug'].'/'; ?>" title="Bagikan ke Whatsapp" class="btn btn-sm btn-success rounded-pill ms-1"><i class="fa-brands fa-whatsapp"></i></a></li>
                                    <li>
                                        <button id="copyLink" class="btn btn-sm btn-secondary rounded-pill ms-1" data-clipboard-text="<?= $base_url.'/'.$result['slug'].'/'; ?>">
                                            <i class="fa-solid fa-copy"></i> Salin URL
                                        </button>
                                    </li>
                                </ul>
                            </div>
                            <small class="text-muted"><i class="fa-solid fa-calendar-days"></i> <?= indoTgl($result['tgl_update']) ?></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<?php
            break;
        default:
            header("location: $base_url/404");
            break;
    }

?>