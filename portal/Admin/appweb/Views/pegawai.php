<?php
    switch ($_GET['act']) {
        case "detail-pegawai":
            $hal                = "Detail Pegawai";
            $hal2               = "Pegawai";
            $penyimpananGambar  = "$base_url/assets/files/images/avatar";
            $database           = "data_admin";
            $link               = "pegawai";

            $query  = $pdo->prepare("
                    SELECT *
                    FROM $database
                    WHERE id_data_admin = ? ");

            $query->bindValue(1, $_GET['id']);
            $query->execute();
            $rows   = $query->rowCount();

            if ($rows>0) {
                $result = $query->fetch(PDO::FETCH_ASSOC);
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
                    <li class="breadcrumb-item active" aria-current="page"><?= $result['nama'] ?></li>
                </ol>
            </nav>
        </div>

        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="card">
                    <div class="bg-picture card-body">
                        <div class="d-flex align-items-top">
                            <img src="<?= $penyimpananGambar ?>/<?= $result['avatar'] ?>" class="flex-shrink-0 rounded-circle avatar-xl img-thumbnail float-start me-3" alt="Avatar <?= $result['nama'] ?>">

                            <div class="flex-grow-1 overflow-hidden">
                                <h4 class="m-0"><?= $result['nama'] ?></h4>
                                <span class="text-muted"><i><?= $result['level'] ?></i></span>

                                <?php if ($result['status']==="Active"): ?>
                                    <p class="mt-1"><small class="badge bg-success p-1"><i class="far fa-check-circle"></i> Active</small></p>
                                <?php else: ?>
                                    <p class="mt-1"><small class="badge bg-danger p-1"><i class="fas fa-ban"></i> Non-Active</small></p>
                                <?php endif ?>

                                <small class="text-secondary"><i class="fas fa-info-circle"></i> Terakhir Login: <?= indoTglWithTime($result['terakhir_login']) ?></small>

                                <hr />

                                <!-- item-->
                                <a role="button" data-bs-toggle="modal" data-bs-target="#UbahPegawai" class="btn btn-outline-primary rounded-pill"><i class="fas fa-edit"></i> Ubah Profil</a>
                                <a role="button" data-bs-toggle="modal" data-bs-target="#UbahPassword" class="btn btn-outline-pink rounded-pill"><i class="fas fa-lock"></i> Ubah Password</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="UbahPegawai" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form action="editPegawai/" method="POST" data-parsley-validate="" class="modal-content" enctype="multipart/form-data">
                            <div class="modal-header">
                                <h4 class="modal-title">Form Ubah <?= $hal." ".$result['nama'] ?></h4>
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

                                <div class="col-md-6 my-1">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="nama" name="___in_nama_special_ARPATEAM" placeholder="Cth: Aldi Febriyanto" value="<?= $result['nama'] ?>" required="">
                                        <label for="nama">Nama Pegawai</label>
                                    </div>
                                </div>
                                <div class="col-md-6 my-1">
                                    <div class="form-floating">
                                        <select class="form-select" id="jenis_kelamin" name="___in_jenis_kelamin_special_ARPATEAM" required="">
                                            <option value="Laki-Laki" <?php if ($result['jenis_kelamin']==="Laki-Laki") { echo "selected"; } ?>>Laki-Laki</option>
                                            <option value="Perempuan" <?php if ($result['jenis_kelamin']==="Perempuan") { echo "selected"; } ?>>Perempuan</option>
                                        </select>
                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                    </div>
                                </div>

                                <div class="col-md-6 my-1">
                                    <div class="form-floating">
                                        <select class="form-select" id="level" name="___in_level_special_ARPATEAM" required="">
                                            <option value="Administrator" <?php if ($result['level']==="Administrator") { echo "selected"; } ?>>Administrator</option>
                                        </select>
                                        <label for="level">Level Pegawai</label>
                                    </div>
                                </div>
                                <div class="col-md-6 my-1">
                                    <div class="form-floating">
                                        <select class="form-select" id="status_pegawai" name="___in_status_pegawai_special_ARPATEAM" required="">
                                            <option value="Active" <?php if ($result['status']==="Active") { echo "selected"; } ?>>Active</option>
                                            <option value="Non-Active" <?php if ($result['status']==="Non-Active") { echo "selected"; } ?>>Non-Active</option>
                                        </select>
                                        <label for="status_pegawai">Status?</label>
                                    </div>
                                </div>

                                <!-- file preview template -->
                                <div class="col-12 my-3">
                                    <div class="form-floating">
                                        <input type="file" data-plugins="dropify" data-default-file="<?= $penyimpananGambar ?>/<?= $result['avatar'] ?>" data-height="300" id="avatar" accept="image/webp, image/jpeg, image/jpg, image/png, image/gif" name="___in_gambar_special_ARPATEAM">
                                        <label for="avatar">Image Share</label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal"><i class="fas fa-times"></i> BATAL</button>
                                <input type="hidden" name="___in_id_data_admin_special_ARPATEAM" value="<?= $result['id_data_admin']; ?>">
                                <input type="hidden" name="___in_gambar_lama_special_ARPATEAM" value="<?= $result['avatar']; ?>">
                                <button type="submit" name="_submit_special_ARPATEAM_" class="btn btn-info waves-effect waves-light"><i class="fas fa-save"></i> SIMPAN PERUBAHAN</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.modal -->

            <div id="UbahPassword" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form action="editPassword/" method="POST" data-parsley-validate="" class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Form Ubah Password <?= $result['nama'] ?></h4>
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

                                <div class="col-md-12 my-1">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="username" name="___in_username_special_ARPATEAM" placeholder="Cth: arpateam15" minlength="5" maxlength="20" onkeyup="this.value=this.value.replace(/[^a-z][^0-9]/g,'');" value="<?= $result['username'] ?>" readonly>

                                        <label for="username">Username Pegawai</label>
                                    </div>
                                </div>

                                <!-- Password -->
                                <div class="col-md-6 my-2">
                                    <label class="font-weight-bold" for="pass">Password <span id="buttonShowPassword" onclick="showPassword()"><i class="fas fa-eye-slash"></i></span></label>
                                    <input type="password" id="pass" name="___in_password_special_ARPATEAM" class="form-control" placeholder="Masukkan Password anda..." pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" minlength="10" maxlength="20" required>
                                    <div class="p-1" role="alert">
                                        <h5 class="font-weight-bold text-warning"><i class="fas fa-exclamation-circle"></i> Ketentuan Password:</h5>

                                        <span id="length" class="invalid">Minimal <strong>10 Karakter</strong>
                                        </span>
                                        <br />
                                        <span id="letter" class="invalid">Kombinasi <strong>huruf kecil</strong></span>
                                        <br />
                                        <span id="capital" class="invalid">Kombinasi <strong>huruf besar</strong></span>
                                        <br />
                                        <span id="number" class="invalid">Kombinasi <strong>angka</strong>
                                        </span>
                                        <br />
                                    </div>
                                </div>
                                <!-- Password -->

                                <!-- Ulangi Password -->
                                <div class="col-md-6 my-2">
                                    <label class="font-weight-bold" for="passUlangi">Ulangi Password <span id="buttonShowUlangiPassword" onclick="showUlangiPassword()"><i class="fas fa-eye-slash"></i></span></label>
                                    <input type="password" id="passUlangi" name="___in_ulangi_password_special_ARPATEAM" class="form-control" placeholder="Ulangi Password anda..." pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" minlength="10" maxlength="20" required>
                                    <div class="form-text confirm-message p-1"></div>
                                </div>
                                <!-- Ulangi Password -->

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal"><i class="fas fa-times"></i> BATAL</button>
                                <input type="hidden" name="___in_id_data_admin_special_ARPATEAM" value="<?= $result['id_data_admin']; ?>">
                                <input type="hidden" name="___in_gambar_lama_special_ARPATEAM" value="<?= $result['avatar']; ?>">
                                <button type="submit" name="_submit_special_ARPATEAM_" class="btn btn-info waves-effect waves-light"><i class="fas fa-save"></i> SIMPAN PERUBAHAN</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.modal -->
        </div> 
        <!-- end row -->
    </div> <!-- container-fluid -->
</div> <!-- content -->

<?php
            break;
        case "profil":
            $hal                = "Profil";
            $hal2               = "Pegawai";
            $penyimpananGambar  = "$base_url/assets/files/images/avatar";
            $database           = "data_admin";
            $link               = "pegawai";

            $query  = $pdo->prepare("
                    SELECT *
                    FROM $database
                    WHERE id_data_admin = ? ");

            $query->bindValue(1, $_SESSION['_id_data_admin__']);
            $query->execute();
            $rows   = $query->rowCount();

            if ($rows>0) {
                $result = $query->fetch(PDO::FETCH_ASSOC);
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
                    <li class="breadcrumb-item"><a href="<?= $base_url_admin ?>/pegawai/profil"><?= $hal2 ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $result['nama'] ?></li>
                </ol>
            </nav>
        </div>

        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="card">
                    <div class="bg-picture card-body">
                        <div class="d-flex align-items-top">
                            <img src="<?= $penyimpananGambar ?>/<?= $result['avatar'] ?>" class="flex-shrink-0 rounded-circle avatar-xl img-thumbnail float-start me-3" alt="Avatar <?= $result['nama'] ?>">

                            <div class="flex-grow-1 overflow-hidden">
                                <h4 class="m-0"><?= $result['nama'] ?></h4>
                                <span class="text-muted"><i><?= $result['level'] ?></i></span>

                                <?php if ($result['status']==="Active"): ?>
                                    <p class="mt-1"><small class="badge bg-success p-1"><i class="far fa-check-circle"></i> Active</small></p>
                                <?php else: ?>
                                    <p class="mt-1"><small class="badge bg-danger p-1"><i class="fas fa-ban"></i> Non-Active</small></p>
                                <?php endif ?>

                                <small class="text-secondary"><i class="fas fa-info-circle"></i> Terakhir Login: <?= indoTglWithTime($result['terakhir_login']) ?></small>

                                <hr />

                                <!-- item-->
                                <a role="button" data-bs-toggle="modal" data-bs-target="#UbahPegawai" class="btn btn-outline-primary rounded-pill"><i class="fas fa-edit"></i> Ubah Profil</a>
                                <a role="button" data-bs-toggle="modal" data-bs-target="#UbahPassword" class="btn btn-outline-pink rounded-pill"><i class="fas fa-lock"></i> Ubah Password</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="UbahPegawai" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form action="editProfil/" method="POST" data-parsley-validate="" class="modal-content" enctype="multipart/form-data">
                            <div class="modal-header">
                                <h4 class="modal-title">Form Ubah <?= $hal." ".$result['nama'] ?></h4>
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

                                <div class="col-md-6 my-1">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="nama" name="___in_nama_special_ARPATEAM" placeholder="Cth: Aldi Febriyanto" value="<?= $result['nama'] ?>" required="">
                                        <label for="nama">Nama Pegawai</label>
                                    </div>
                                </div>
                                <div class="col-md-6 my-1">
                                    <div class="form-floating">
                                        <select class="form-select" id="jenis_kelamin" name="___in_jenis_kelamin_special_ARPATEAM" required="">
                                            <option value="Laki-Laki" <?php if ($result['jenis_kelamin']==="Laki-Laki") { echo "selected"; } ?>>Laki-Laki</option>
                                            <option value="Perempuan" <?php if ($result['jenis_kelamin']==="Perempuan") { echo "selected"; } ?>>Perempuan</option>
                                        </select>
                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                    </div>
                                </div>

                                <div class="col-md-6 my-1">
                                    <div class="form-floating">
                                        <select class="form-select" id="level" name="___in_level_special_ARPATEAM" required="">
                                            <option value="Administrator" <?php if ($result['level']==="Administrator") { echo "selected"; } ?>>Administrator</option>
                                        </select>
                                        <label for="level">Level Pegawai</label>
                                    </div>
                                </div>
                                <div class="col-md-6 my-1">
                                    <div class="form-floating">
                                        <select class="form-select" id="status_pegawai" name="___in_status_pegawai_special_ARPATEAM" required="">
                                            <option value="Active" <?php if ($result['status']==="Active") { echo "selected"; } ?>>Active</option>
                                            <option value="Non-Active" <?php if ($result['status']==="Non-Active") { echo "selected"; } ?>>Non-Active</option>
                                        </select>
                                        <label for="status_pegawai">Status?</label>
                                    </div>
                                </div>

                                <!-- file preview template -->
                                <div class="col-12 my-3">
                                    <div class="form-floating">
                                        <input type="file" data-plugins="dropify" data-default-file="<?= $penyimpananGambar ?>/<?= $result['avatar'] ?>" data-height="300" id="avatar" accept="image/webp, image/jpeg, image/jpg, image/png, image/gif" name="___in_gambar_special_ARPATEAM">
                                        <label for="avatar">Image Share</label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal"><i class="fas fa-times"></i> BATAL</button>
                                <input type="hidden" name="___in_id_data_admin_special_ARPATEAM" value="<?= $result['id_data_admin']; ?>">
                                <input type="hidden" name="___in_gambar_lama_special_ARPATEAM" value="<?= $result['avatar']; ?>">
                                <button type="submit" name="_submit_special_ARPATEAM_" class="btn btn-info waves-effect waves-light"><i class="fas fa-save"></i> SIMPAN PERUBAHAN</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.modal -->

            <div id="UbahPassword" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form action="editPasswordProfil/" method="POST" data-parsley-validate="" class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Form Ubah Password <?= $result['nama'] ?></h4>
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

                                <div class="col-md-12 my-1">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="username" name="___in_username_special_ARPATEAM" placeholder="Cth: arpateam15" minlength="5" maxlength="20" onkeyup="this.value=this.value.replace(/[^a-z][^0-9]/g,'');" value="<?= $result['username'] ?>" readonly>

                                        <label for="username">Username Pegawai</label>
                                    </div>
                                </div>

                                <!-- Password -->
                                <div class="col-md-6 my-2">
                                    <label class="font-weight-bold" for="pass">Password <span id="buttonShowPassword" onclick="showPassword()"><i class="fas fa-eye-slash"></i></span></label>
                                    <input type="password" id="pass" name="___in_password_special_ARPATEAM" class="form-control" placeholder="Masukkan Password anda..." pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" minlength="10" maxlength="20" required>
                                    <div class="p-1" role="alert">
                                        <h5 class="font-weight-bold text-warning"><i class="fas fa-exclamation-circle"></i> Ketentuan Password:</h5>

                                        <span id="length" class="invalid">Minimal <strong>10 Karakter</strong>
                                        </span>
                                        <br />
                                        <span id="letter" class="invalid">Kombinasi <strong>huruf kecil</strong></span>
                                        <br />
                                        <span id="capital" class="invalid">Kombinasi <strong>huruf besar</strong></span>
                                        <br />
                                        <span id="number" class="invalid">Kombinasi <strong>angka</strong>
                                        </span>
                                        <br />
                                    </div>
                                </div>
                                <!-- Password -->

                                <!-- Ulangi Password -->
                                <div class="col-md-6 my-2">
                                    <label class="font-weight-bold" for="passUlangi">Ulangi Password <span id="buttonShowUlangiPassword" onclick="showUlangiPassword()"><i class="fas fa-eye-slash"></i></span></label>
                                    <input type="password" id="passUlangi" name="___in_ulangi_password_special_ARPATEAM" class="form-control" placeholder="Ulangi Password anda..." pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" minlength="10" maxlength="20" required>
                                    <div class="form-text confirm-message p-1"></div>
                                </div>
                                <!-- Ulangi Password -->

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal"><i class="fas fa-times"></i> BATAL</button>
                                <input type="hidden" name="___in_id_data_admin_special_ARPATEAM" value="<?= $result['id_data_admin']; ?>">
                                <input type="hidden" name="___in_gambar_lama_special_ARPATEAM" value="<?= $result['avatar']; ?>">
                                <button type="submit" name="_submit_special_ARPATEAM_" class="btn btn-info waves-effect waves-light"><i class="fas fa-save"></i> SIMPAN PERUBAHAN</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.modal -->
        </div> 
        <!-- end row -->
    </div> <!-- container-fluid -->
</div> <!-- content -->

<?php
            break;
        default:
            $hal                = "Pegawai";
            $penyimpananGambar  = "$base_url/assets/files/images/avatar";
            $database           = "data_admin";
            $link               = "pegawai";
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
                            <li class="breadcrumb-item active" aria-current="page"><?= $hal ?></li>
                        </ol>
                    </nav>
                </div>
                <div class="col-auto my-auto">
                    <a role="button" href="resetSession/" class="btn btn-outline-primary rounded-pill waves-effect waves-light"><i class="fas fa-sync"></i> Reset Session</a>

                    <button type="button" class="btn btn-primary rounded-pill waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#TambahPegawai"><i class="fas fa-plus"></i> Tambah <?= $hal ?></button>

                    <div id="TambahPegawai" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-lg">
                            <form action="addPegawai/" method="POST" data-parsley-validate="" class="modal-content" enctype="multipart/form-data">
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
                                                <li>Ukuran File Gambar maksimal <strong>2MB</strong>!</li>
                                            </ul>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    </div>

                                    <div class="col-md-6 my-1">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="nama" name="___in_nama_special_ARPATEAM" placeholder="Cth: Aldi Febriyanto" required="">
                                            <label for="nama">Nama Pegawai</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 my-1">
                                        <div class="form-floating">
                                            <select class="form-select" id="jenis_kelamin" name="___in_jenis_kelamin_special_ARPATEAM" required="">
                                                <option value="Laki-Laki">Laki-Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                            <label for="jenis_kelamin">Jenis Kelamin</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6 my-1">
                                        <div class="form-floating">
                                            <select class="form-select" id="level" name="___in_level_special_ARPATEAM" required="">
                                                <option value="Administrator">Administrator</option>
                                            </select>
                                            <label for="level">Level Pegawai</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 my-1">
                                        <div class="form-floating">
                                            <select class="form-select" id="status_pegawai" name="___in_status_pegawai_special_ARPATEAM" required="">
                                                <option value="Active">Active</option>
                                                <option value="Non-Active">Non-Active</option>
                                            </select>
                                            <label for="status_pegawai">Status?</label>
                                        </div>
                                    </div>

                                    <!-- file preview template -->
                                    <div class="col-12 my-3">
                                        <div class="form-floating">
                                            <input type="file" data-plugins="dropify" data-height="300" id="gambar" accept="image/webp, image/jpeg, image/jpg, image/png, image/gif" name="___in_gambar_special_ARPATEAM" required="">
                                            <label for="gambar">Avatar</label>
                                        </div>
                                    </div>

                                    <hr />

                                    <div class="col-md-12 my-1">
                                        <div class="alert alert-warning d-flex align-items-center" role="alert">
                                            <h4 class="alert-heading">
                                                <i class="fas fa-lock"></i> PENGATURAN KEAMANAN AKUN
                                            </h4>
                                        </div>
                                    </div>

                                    <div class="col-md-12 my-1">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="username" name="___in_username_special_ARPATEAM" placeholder="Cth: arpateam15" minlength="5" maxlength="20" onkeyup="this.value=this.value.replace(/[^a-z][^0-9]/g,'');" required="">

                                            <label for="username">Username Pegawai <small>(Cth: arpateam15)</small></label>
                                        </div>
                                    </div>

                                    <!-- Password -->
                                    <div class="col-md-6 my-2">
                                        <label class="font-weight-bold" for="pass">Password <span id="buttonShowPassword" onclick="showPassword()"><i class="fas fa-eye-slash"></i></span></label>
                                        <input type="password" id="pass" name="___in_password_special_ARPATEAM" class="form-control" placeholder="Masukkan Password anda..." pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" minlength="10" maxlength="20" required>
                                        <div class="p-1" role="alert">
                                            <h5 class="font-weight-bold text-warning"><i class="fas fa-exclamation-circle"></i> Ketentuan Password:</h5>

                                            <span id="length" class="invalid">Minimal <strong>10 Karakter</strong>
                                            </span>
                                            <br />
                                            <span id="letter" class="invalid">Kombinasi <strong>huruf kecil</strong></span>
                                            <br />
                                            <span id="capital" class="invalid">Kombinasi <strong>huruf besar</strong></span>
                                            <br />
                                            <span id="number" class="invalid">Kombinasi <strong>angka</strong>
                                            </span>
                                            <br />
                                        </div>
                                    </div>
                                    <!-- Password -->

                                    <!-- Ulangi Password -->
                                    <div class="col-md-6 my-2">
                                        <label class="font-weight-bold" for="passUlangi">Ulangi Password <span id="buttonShowUlangiPassword" onclick="showUlangiPassword()"><i class="fas fa-eye-slash"></i></span></label>
                                        <input type="password" id="passUlangi" name="___in_ulangi_password_special_ARPATEAM" class="form-control" placeholder="Ulangi Password anda..." pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" minlength="10" maxlength="20" required>
                                        <div class="form-text confirm-message p-1"></div>
                                    </div>
                                    <!-- Ulangi Password -->
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
                        ORDER BY status ASC");
                while($result = $query->fetch(PDO::FETCH_ASSOC)){
            ?>

            <div class="col-xl-4">
                <div class="card">
                    <div class="text-center card-body">
                        <div class="dropdown float-end">
                            <a href="#" class="dropdown-toggle arrow-none card-drop position-absolute"  data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a role="button" href="pegawai/<?= $result['id_data_admin'] ?>" class="dropdown-item"><i class="far fa-file-alt"></i>  Detail <?= $hal ?></a>
                                <!-- item-->
                                <?php if ($result['status']==="Active"): ?>
                                    <a href="nonAktifkanPegawai/<?= $result['id_data_admin'] ?>" class="dropdown-item text-danger"><i class="fas fa-toggle-off"></i> Non-Aktifkan</a>
                                <?php else: ?>
                                    <a href="aktifkanPegawai/<?= $result['id_data_admin'] ?>" class="dropdown-item text-success"><i class="fas fa-toggle-on"></i> Aktifkan</a>
                                <?php endif ?>
                            </div>
                        </div>
                        <div>
                            <img src="<?= $penyimpananGambar ?>/<?= $result['avatar'] ?>" class="rounded-circle avatar-xl img-thumbnail mb-2" alt="Avatar <?= $result['nama'] ?>">

                            <h4 class="m-0"><?= $result['nama'] ?></h4>
                            <p class="text-muted"><i><?= $result['level'] ?></i></p>

                            <small class="text-secondary"><i class="fas fa-info-circle"></i> Terakhir Login: <?= indoTglWithTime($result['terakhir_login']) ?></small>

                            <hr>

                            <?php if ($result['status']==="Active"): ?>
                                <span class="badge bg-success p-1"><i class="far fa-check-circle"></i> Active</span>
                            <?php else: ?>
                                <span class="badge bg-danger p-1"><i class="fas fa-ban"></i> Non-Active</span>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->

            <?php } ?>
        </div>
        <!-- end row -->
    </div> <!-- container-fluid -->
</div> <!-- content -->

<?php } ?>