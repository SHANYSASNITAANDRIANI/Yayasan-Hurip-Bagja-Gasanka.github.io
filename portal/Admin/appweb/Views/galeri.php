<?php
    switch ($_GET['act']) {
        case "judul-galeri":
            $hal        = "Judul Galeri";
            $hal2       = "Galeri";
            $database   = "galeri_judul";
            $link       = "galeri";
?>

<div class="content">
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-auto">
                    <h3><?= $hal ?></h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?= $hal2 ?></li>
                        </ol>
                    </nav>
                </div>
                <div class="col-auto my-auto">
                    <button type="button" class="btn btn-primary rounded-pill waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#TambahJudulGaleri"><i class="fas fa-plus"></i> Tambah <?= $hal ?></button>

                    <div id="TambahJudulGaleri" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">
                            <form action="addJudulGaleri/" method="POST" data-parsley-validate="" class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Form Tambah <?= $hal ?></h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body row">
                                    <div class="col-12">
                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                            <h4 class="alert-heading">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                                                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                                </svg> PERHATIAN!
                                            </h4>
                                            <hr class="my-2">
                                            <ul class="mb-1">
                                                <li>Mohon pastikan anda mengisi <em>form</em> dibawah ini dengan lengkap dan benar!</li>
                                            </ul>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    </div>

                                    <div class="col-md-2 my-1">
                                        <div class="form-floating">
                                            <input type="number" class="form-control" id="no_urut" name="___in_no_urut_special_ARPATEAM" placeholder="Cth: Inspirasi Bisnis" required="">
                                            <label for="no_urut">No Urut</label>
                                        </div>
                                    </div>
                                    <div class="col-md-10 my-1">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="judul" name="___in_judul_special_ARPATEAM" placeholder="Cth: Inspirasi Bisnis" required="">
                                            <label for="judul">Judul Galeri</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal"><i class="fas fa-times"></i> BATAL</button>
                                    <button type="submit" name="_submit_special_ARPATEAM_" class="btn btn-info waves-effect waves-light"><i class="fas fa-save"></i> SIMPAN PERUBAHAN</button>
                                </div>
                            </form>
                        </div>
                    </div><!-- /.modal -->
                </div>
            </div>
        </div>
        <div class="row mt-3 justify-content-center">
            <!--Pricing Column-->
            <?php
                $query = $pdo->query("
                        SELECT *
                        FROM $database
                        ORDER BY no_urut ASC
                        ");
                while($result = $query->fetch(PDO::FETCH_ASSOC)){
                    
            ?>

            <article class="pricing-column col-xl-4 col-md-6">
                <div class="card">
                    <div class="inner-box card-body text-center">
                        <div class="dropdown float-end mt-2">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a role="button" data-bs-toggle="modal" data-bs-target="#UbahJudulGaleri<?= $result['slug'] ?>" class="dropdown-item"><i class="fas fa-edit"></i> Ubah</a>
                            </div>
                        </div>
                        <div class="plan-header my-4">
                            <h3 class="fw-bolder"><?= $result['judul'] ?></h3>
                        </div>

                        <div class="text-center">
                            <a href="<?= $link ?>/<?= $result['slug'] ?>" class="btn btn-sm btn-outline-primary rounded-pill waves-effect waves-light">Daftar <?= $hal2 ?> <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </article>

            <div id="UbahJudulGaleri<?= $result['slug'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-lg">
                    <form action="editJudulGaleri/" method="POST" data-parsley-validate="" class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Form Ubah <?= $hal ?></h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body row">
                            <div class="col-12">
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <h4 class="alert-heading">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                        </svg> PERHATIAN!
                                    </h4>
                                    <hr class="my-2">
                                    <ul class="mb-1">
                                        <li>Mohon pastikan anda mengisi <em>form</em> dibawah ini dengan lengkap dan benar!</li>
                                    </ul>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>

                            <div class="col-md-2 my-1">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="no_urut" name="___in_no_urut_special_ARPATEAM" placeholder="Cth: Inspirasi Bisnis" value="<?= $result['no_urut'] ?>" required="">
                                    <label for="no_urut">No Urut</label>
                                </div>
                            </div>
                            <div class="col-md-10 my-1">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="judul" name="___in_judul_special_ARPATEAM" placeholder="Cth: Inspirasi Bisnis" value="<?= $result['judul'] ?>" required="">
                                    <label for="judul">Judul Galeri</label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal"><i class="fas fa-times"></i> BATAL</button>
                                <input type="hidden" name="___in_id_galeri_judul_special_ARPATEAM" value="<?= $result['id_galeri_judul'] ?>">
                                <input type="hidden" name="___in_slug_lama_special_ARPATEAM" value="<?= $result['slug'] ?>">
                            <button type="submit" name="_submit_special_ARPATEAM_" class="btn btn-info waves-effect waves-light"><i class="fas fa-save"></i> SIMPAN PERUBAHAN</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal -->

            <?php } ?>
        </div>
        <!-- end row -->
    </div> <!-- container-fluid -->
</div> <!-- content -->

<?php
            break;
        case "daftar-galeri":
            $hal                = "Daftar Galeri";
            $hal2               = "Galeri";
            $penyimpananGambar  = "$base_url/assets/files/images/galeri";
            $database           = "galeri";
            $database2          = "galeri_judul";
            $link               = "galeri";

            try {
                $stmt  = $pdo->prepare("
                        SELECT id_galeri_judul, judul, slug
                        FROM $database2
                        WHERE slug = ?");

                $stmt->bindValue(1, $_GET["slug"]);
                $stmt->execute();
                $rows   = $stmt->rowCount();

                if ($rows>0) {
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                }else{
                    echo "<script>window.location.href = '$base_url_admin/$link';</script>";
                    die();
                    exit();
                }
            } catch (Exception $e) {
                echo "<script>window.location.href = '$base_url_admin/$link';</script>";
                die();
                exit();
            }
?>

<div class="content">
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-auto">
                    <h3><?= $hal." ".$result['judul'] ?></h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?= $link ?>"><?= $hal2 ?></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?= $result['judul'] ?></li>
                        </ol>
                    </nav>
                </div>
                <div class="col-auto my-auto">
                    <button type="button" class="btn btn-primary rounded-pill waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#addGaleri"><i class="fas fa-plus"></i> Tambah <?= $hal2 ?></button>

                    <div id="addGaleri" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">
                            <form action="addGaleri/" method="POST" data-parsley-validate="" class="modal-content" enctype="multipart/form-data">
                                <div class="modal-header">
                                    <h4 class="modal-title">Form Tambah <?= $hal." ".$result['judul'] ?></h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body row">
                                    <div class="col-12">
                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                            <h4 class="alert-heading">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                                                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                                </svg> PERHATIAN!
                                            </h4>
                                            <hr class="my-2">
                                            <ul class="mb-1">
                                                <li>Mohon pastikan anda mengisi <em>form</em> dibawah ini dengan lengkap dan benar!</li>
                                                <li>Ukuran File Gambar maksimal <strong>2MB</strong>!</li>
                                            </ul>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    </div>

                                    <div class="col-12 my-2">
                                        <div class="form-floating">
                                            <textarea class="form-control" style="height: 100px" placeholder="Leave a comment here" id="ket" name="___in_deskripsi_special_ARPATEAM" required=""></textarea>
                                            <label for="ket">Keterangan</label>
                                        </div>
                                    </div><!-- end col -->

                                    <!-- file preview template -->
                                    <div class="col-12 my-2">
                                        <div class="form-floating">
                                            <input type="file" data-plugins="dropify" data-height="300" id="gambar" accept="image/webp, image/jpeg, image/jpg, image/png, image/gif" name="___in_gambar_special_ARPATEAM" required="">
                                            <label for="gambar">Gambar</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal"><i class="fas fa-times"></i> BATAL</button>
                                    <input type="hidden" name="___in_id_galeri_judul_special_ARPATEAM" value="<?= $result['id_galeri_judul'] ?>">
                                    <input type="hidden" name="___in_galeri_judul_special_ARPATEAM" value="<?= $result['judul'] ?>">
                                    <input type="hidden" name="___in_slug_galeri_judul_special_ARPATEAM" value="<?= $result['slug'] ?>">
                                    <button type="submit" name="_submit_special_ARPATEAM_" class="btn btn-info waves-effect waves-light"><i class="fas fa-save"></i> SIMPAN PERUBAHAN</button>
                                </div>
                            </form>
                        </div>
                    </div><!-- /.modal -->
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <?php
                $queryData = $pdo->prepare("
                                SELECT *
                                FROM $database
                                WHERE id_galeri_judul = ?
                                ORDER BY id_galeri DESC
                            ");

                $queryData->bindValue(1, $result["id_galeri_judul"]);
                $queryData->execute();
                while($rst = $queryData->fetch(PDO::FETCH_ASSOC)){
                    if (strlen($rst['ket'])>25) {
                        $myKet = substr($rst['ket'], 0, 25)."...";
                    }else{
                        $myKet = $rst['ket'];
                    }
            ?>

            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="dropdown float-end">
                            <a href="#" class="dropdown-toggle arrow-none card-drop text-light" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a role="button" data-bs-toggle="modal" href="#UbahGaleri<?= $rst['id_galeri'] ?>" class="dropdown-item"><i class="fas fa-edit"></i> Ubah</a>
                                <!-- item-->
                                <a role="button" onclick="confirmHapusGaleri('<?= $rst['id_galeri']; ?>', '<?= $result['slug'] ?>')" class="dropdown-item"><i class="fas fa-trash-alt"></i> Hapus</a>
                            </div>
                        </div>
                        <div class="gal-detail thumb p-0">
                            <a href="<?= $penyimpananGambar.'/'.$rst['gambar']; ?>" class="image-popup" title="<?= $rst['ket'] ?>">
                                <img src="<?= $penyimpananGambar.'/'.$rst['gambar']; ?>" class="thumb-img img-fluid" alt="<?= $rst['ket'] ?>">
                            </a>
                        
                            <div class="text-center">
                                <h5 class="text-muted"><?= $myKet ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="UbahGaleri<?= $rst['id_galeri'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <form action="editGaleri/" method="POST" data-parsley-validate="" enctype="multipart/form-data" class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Form Ubah <?= $hal2 ?></h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body row">
                            <div class="col-12">
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <h4 class="alert-heading">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                        </svg> PERHATIAN!
                                    </h4>
                                    <hr class="my-2">
                                    <ul class="mb-1">
                                        <li>Mohon pastikan anda mengisi <em>form</em> dibawah ini dengan lengkap dan benar!</li>
                                        <li>Ukuran File Gambar maksimal <strong>2MB</strong>!</li>
                                    </ul>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>

                            <div class="col-12 my-2">
                                <div class="form-floating">
                                    <textarea class="form-control" style="height: 100px" placeholder="Leave a comment here" id="ket" name="___in_deskripsi_special_ARPATEAM" required=""><?= $rst['ket'] ?></textarea>
                                    <label for="ket">Keterangan</label>
                                </div>
                            </div><!-- end col -->

                            <!-- file preview template -->
                            <div class="col-12 my-2">
                                <div class="form-floating">
                                    <input type="file" data-plugins="dropify" data-default-file="<?= $penyimpananGambar ?>/<?= $rst['gambar'] ?>" data-height="300" id="gambar" accept="image/webp, image/jpeg, image/jpg, image/png, image/gif" name="___in_gambar_special_ARPATEAM">
                                    <label for="gambar">Gambar</label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal"><i class="fas fa-times"></i> BATAL</button>
                            <input type="hidden" name="___in_galeri_judul_special_ARPATEAM" value="<?= $result['judul'] ?>">
                            <input type="hidden" name="___in_id_galeri_special_ARPATEAM" value="<?= $rst['id_galeri'] ?>">
                            <input type="hidden" name="___in_gambar_lama_special_ARPATEAM" value="<?= $rst['gambar'] ?>">
                            <input type="hidden" name="___in_id_galeri_judul_special_ARPATEAM" value="<?= $result['id_galeri_judul'] ?>">
                            <input type="hidden" name="___in_slug_special_ARPATEAM" value="<?= $result['slug'] ?>">
                            <button type="submit" name="_submit_special_ARPATEAM_" class="btn btn-info waves-effect waves-light"><i class="fas fa-save"></i> SIMPAN PERUBAHAN</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal -->

            <?php } ?>
        </div>
        <!-- end row -->
    </div> <!-- container-fluid -->
</div> <!-- content -->

<?php
            break;
        case "edit-galeri":
            $hal                = "Galeri";
            $hal2               = "Judul Galeri";
            $penyimpananGambar  = "$base_url/assets/files/images/galeri";
            $database           = "galeri";
            $database2          = "galeri_judul";
            $link               = "galeri";

            $query  = $pdo->query("
                    SELECT judul, slug
                    FROM $database2
                    WHERE slug='$_GET[slug]'");
            $rows   = $query->rowCount();

            if ($rows>0) {
                $result     = $query->fetch(PDO::FETCH_ASSOC);

                $queryData  = $pdo->query("
                    SELECT *
                    FROM $database
                    WHERE slug='$_GET[slugedit]'");
                $rowsData   = $queryData->rowCount();

                if ($rowsData>0) {
                    $resultData = $queryData->fetch(PDO::FETCH_ASSOC);
                }else{
                    echo "<script>window.location.href = '$base_url_admin/$link';</script>";
                    die();
                    exit();
                }
            }else{
                echo "<script>window.location.href = '$base_url_admin/$link';</script>";
                die();
                exit();
            }
?>

<div class="content">
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="container">
            <h3><?= $hal ?></h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?= $link ?>"><?= $hal2 ?></a></li>
                    <li class="breadcrumb-item"><a href="<?= $link.'/'.$result['slug'] ?>"><?= $result['judul'] ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $resultData['judul'] ?></li>
                </ol>
            </nav>
        </div>

        <div class="container">
            <div class="row mt-3">
                <div class="col-lg-12">
                    <div class="card">
                        <form action="editGaleri/" method="POST" data-parsley-validate="" class="modal-content" enctype="multipart/form-data">
                            <div class="modal-header">
                                <h4 class="modal-title">Form Ubah <?= $hal ?></h4>
                            </div>
                            <div class="modal-body row">
                                <div class="col-12">
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <h4 class="alert-heading">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                            </svg> PERHATIAN!
                                        </h4>
                                        <hr class="my-2">
                                        <ul class="mb-1">
                                            <li>Mohon pastikan anda mengisi <em>form</em> dibawah ini dengan lengkap dan benar!</li>
                                            <li>Ukuran File Gambar maksimal <strong>2MB</strong>!</li>
                                            <li>Pengaturan <strong>SEO</strong> mohon di lengkapi dengan aturan yang berlaku!</li>
                                        </ul>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                </div>

                                    <div class="col-md-12 my-1">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="judul" name="___in_judul_special_ARPATEAM" placeholder="Lorem ipsum dolor sit amet" value="<?= $resultData['judul'] ?>" required="">
                                            <label for="judul">Judul <?= $hal ?></label>
                                        </div>
                                    </div>

                                <!-- file preview template -->
                                    <div class="col-12 my-3">
                                        <div class="form-floating">
                                            <input type="file" data-plugins="dropify" data-default-file="<?= $penyimpananGambar ?>/<?= $resultData['gambar'] ?>" data-height="450" id="gambar" accept="image/webp, image/jpeg, image/jpg, image/png, image/gif" name="___in_gambar_special_ARPATEAM">
                                            <label for="gambar">Gambar</label>
                                        </div>
                                    </div>
                                <!-- file preview template -->

                                <div class="col-12 my-2">
                                        <textarea name="___in_deskripsi_special_ARPATEAM" id="myEditorFroala" value="Test"><?= $resultData['deskripsi'] ?></textarea>
                                    </div><!-- end col -->

                                <div class="col-12 my-1">
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <button class="nav-link active" id="slug-<?= $resultData['slug']; ?>-tab" data-bs-toggle="tab" data-bs-target="#slug-<?= $resultData['slug']; ?>" type="button" role="tab" aria-controls="slug-<?= $resultData['slug']; ?>" aria-selected="true">Slug <span data-bs-toggle="tooltip" data-bs-placement="top" title="Slug adalah teks yang akan diletakkan setelah nama domain dan menjadi bagian dari permalink."><i class="fas fa-info-circle text-warning"></i></span></button>
                                            <button class="nav-link" id="keywords-<?= $resultData['slug']; ?>-tab" data-bs-toggle="tab" data-bs-target="#keywords-<?= $resultData['slug']; ?>" type="button" role="tab" aria-controls="keywords-<?= $resultData['slug']; ?>" aria-selected="false">Keywords <span data-bs-toggle="tooltip" data-bs-placement="top" title="Keyword adalah kata atau frasa yang diketikkan orang di kolom mesin pencarian seperti Google, Bing atau Yahoo."><i class="fas fa-info-circle text-warning"></i></span></button>
                                            <button class="nav-link" id="description-<?= $resultData['slug']; ?>-tab" data-bs-toggle="tab" data-bs-target="#description-<?= $resultData['slug']; ?>" type="button" role="tab" aria-controls="description-<?= $resultData['slug']; ?>" aria-selected="false">Description <span data-bs-toggle="tooltip" data-bs-placement="top" title="Description Galeri adalah sebuah keterangan singkat tentang apa isi sebuah Galeri. Tujuan dibuatnya mudah saja, untuk menggambarkan apa saja yang ditulis di dalam Galeri tersebut."><i class="fas fa-info-circle text-warning"></i></span></button>
                                        </div>
                                    </nav>
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="slug-<?= $resultData['slug']; ?>" role="tabpanel" aria-labelledby="slug-<?= $resultData['slug']; ?>-tab">
                                            <input type="text" class="form-control" name="___in_slug_special_ARPATEAM" value="<?= $resultData['slug']; ?>" placeholder="Cth: jasa-pembuatan-website-toko-online">
                                        </div>
                                        <div class="tab-pane fade" id="keywords-<?= $resultData['slug']; ?>" role="tabpanel" aria-labelledby="keywords-<?= $resultData['slug']; ?>-tab">
                                            <textarea class="form-control" rows="3" name="___in_keyword_special_ARPATEAM" placeholder="Cth: Website Toko Online, Toko Online Murah, Web Developer Toko Online Jogja"><?= $resultData['keyword']; ?></textarea>
                                        </div>
                                        <div class="tab-pane fade" id="description-<?= $resultData['slug']; ?>" role="tabpanel" aria-labelledby="description-<?= $resultData['slug']; ?>-tab">
                                            <textarea class="form-control" rows="3" name="___in_description_special_ARPATEAM" placeholder="Cth: Jasa Website Toko Online Murah di Jogja memerikan layanan terbaik untuk membantu usaha anda agar sukses di dunia Online"><?= $resultData['description']; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="___in_id_galeri_special_ARPATEAM" value="<?= $resultData['id_galeri']; ?>">
                                <input type="hidden" name="___in_id_galeri_judul_special_ARPATEAM" value="<?= $resultData['id_galeri_judul']; ?>">
                                <input type="hidden" name="___in_id_sitemap_special_ARPATEAM" value="<?= $resultData['id_sitemap']; ?>">
                                <input type="hidden" name="___in_gambar_lama_special_ARPATEAM" value="<?= $resultData['gambar']; ?>">
                                <input type="hidden" name="___in_slug_galeri_judul_special_ARPATEAM" value="<?= $result['slug'] ?>">
                                <input type="hidden" name="___in_slug_lama_special_ARPATEAM" value="<?= $resultData['slug']; ?>">
                                <button type="submit" name="_submit_special_ARPATEAM_" class="btn btn-info waves-effect waves-light"><i class="fas fa-save"></i> SIMPAN PERUBAHAN</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div> <!-- container-fluid -->
</div> <!-- content -->

<?php
            break;
        default:
            echo "<script>window.location = '404';</script>";
    }
?>