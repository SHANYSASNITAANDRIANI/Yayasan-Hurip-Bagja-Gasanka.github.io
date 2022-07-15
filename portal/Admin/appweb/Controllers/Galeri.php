<?php

    session_start();
    // error_reporting(0);
    require "../../../../appweb/Config/Db.php";
    require "../../../../appweb/Config/AssetsWebsite.php";
    require "../../../../appweb/Config/SetWebsite.php";

    if (empty($_SESSION['_session__'])) {
        header("location: $base_url_admin/keluar-edit");
        die();
        exit();
    }elseif((isset($_POST['_submit_special_ARPATEAM_'])) OR ($_GET['act']==="delete-galeri")){
        require '../Libraries/others.php';
        require "../Libraries/fungsi_upload_gambar.php";
        require '../Libraries/fungsi_sitemap.php';
        require "../Libraries/fungsi_form.php";

        switch ($_GET['act']) {
            case "add-judul-galeri":

                // Data file
                $link       = "$base_url_admin/galeri";
                $database   = "galeri_judul";
                // Data file

                $no_urut    = $_POST['___in_no_urut_special_ARPATEAM'];
                $judul      = $_POST['___in_judul_special_ARPATEAM'];
                $seo        = seo($judul);

                if (empty($_POST['___in_slug_special_ARPATEAM']) || $_POST['___in_slug_special_ARPATEAM']===NULL || $_POST['___in_slug_special_ARPATEAM']===0) {
                    $slug   = $seo;
                    cekSlug($database, $slug);
                }else{
                    $slug   = seo($_POST['___in_slug_special_ARPATEAM']);
                    cekSlug($database, $slug);
                }

                try{
                    $stmt = $pdo->prepare("INSERT INTO $database
                                    (no_urut,judul,slug,tgl_update)
                                    VALUES(:no_urut,:judul,:slug,NOW())");
                            
                    $stmt->bindParam(":no_urut", $no_urut, PDO::PARAM_STR);
                    $stmt->bindParam(":judul", $judul, PDO::PARAM_STR);
                    $stmt->bindParam(":slug", $slug, PDO::PARAM_STR);
                        
                    $count = $stmt->execute();
                            
                    $insertId = $pdo->lastInsertId();

                    if ($count>0) {
                        $_SESSION['_msg__'] = 'Berhasil';
                        header("Location: $link");
                        die();
                        exit();
                    }     
                }catch(PDOException $e){
                    $_SESSION['_msg__'] = 'Gagal';
                    echo "<script>window.location(history.back(0))</script>";
                    die();
                    exit();
                }

                break;

            case "edit-judul-galeri":

                // Data file
                $link       = "$base_url_admin/galeri";
                $database   = "galeri_judul";
                // Data file

                $id_galeri_judul    = htmlspecialchars($_POST['___in_id_galeri_judul_special_ARPATEAM']);
                $no_urut            = $_POST['___in_no_urut_special_ARPATEAM'];
                $judul              = $_POST['___in_judul_special_ARPATEAM'];
                $seo                = seo($judul);

                if ($seo===$_POST['___in_slug_lama_special_ARPATEAM']) {
                    $slug   = $seo;
                }else{
                    $slug   = $seo;
                    cekSlug($database, $slug);
                }

                try {
                    $sql = "UPDATE $database
                            SET no_urut         = :no_urut,
                                judul           = :judul,
                                slug            = :slug,
                                tgl_update      = NOW()
                            WHERE id_$database  = :id_galeri_judul
                        ";
                                  
                    $statement = $pdo->prepare($sql);

                    $statement->bindParam(":id_galeri_judul", $id_galeri_judul, PDO::PARAM_INT);
                    $statement->bindParam(":no_urut", $no_urut, PDO::PARAM_STR);
                    $statement->bindParam(":judul", $judul, PDO::PARAM_STR);
                    $statement->bindParam(":slug", $slug, PDO::PARAM_STR);

                    $count = $statement->execute();

                    if ($count>0) {
                        $_SESSION['_msg__']  = "Berhasil";
                        header("Location: $link");
                        die();
                        exit();
                    }
                }catch(PDOException $e){
                    $_SESSION['_msg__']  = "Gagal";
                    echo "<script>window.location(history.back(0))</script>";
                    die();
                    exit();
                }

                break;
            
            case "add-galeri":

                // Data file
                $link       = $base_url_admin."/galeri/".$_POST['___in_slug_galeri_judul_special_ARPATEAM'];
                $penyimpananGambar  = "../../../../assets/files/images/galeri";
                $database   = "galeri";
                // Data file

                $id_galeri_judul    = htmlspecialchars($_POST['___in_id_galeri_judul_special_ARPATEAM']);
                $galeri_judul       = htmlspecialchars($_POST['___in_galeri_judul_special_ARPATEAM']);
                $ket    = $_POST['___in_deskripsi_special_ARPATEAM'];
                $seo    = seo($id_galeri_judul." ".$galeri_judul." ".substr($ket, 0, 25));

                // Gambar
                    $lokasi_file    = $_FILES['___in_gambar_special_ARPATEAM']['tmp_name'];
                    $lokasi_upload  = "$penyimpananGambar/";
                    $nama_file      = $_FILES['___in_gambar_special_ARPATEAM']['name'];
                    $tipe_file      = strtolower($_FILES['___in_gambar_special_ARPATEAM']['type']);
                    $tipe_file2     = seo2($tipe_file); // ngedapetin png / jpg / jpeg
                    $ukuran         = $_FILES['___in_gambar_special_ARPATEAM']['size'];
                    $nama_file_unik = $seo.".".$tipe_file2;

                    // Cek jenis file yang di upload
                    cekFile($tipe_file);
                    // Cek jenis file yang di upload

                    // Cek ukuran file yang di upload
                    cekUkuranFile2mb($ukuran);
                    // Cek ukuran file yang di upload

                    $gambar = $nama_file_unik;
                // Gambar

                try{
                    $stmt = $pdo->prepare("INSERT INTO $database
                                    (id_galeri_judul,ket,gambar,tgl_update)
                                    VALUES(:id_galeri_judul,:ket,:gambar,NOW())" );
                            
                    $stmt->bindParam(":id_galeri_judul", $id_galeri_judul, PDO::PARAM_STR);
                    $stmt->bindParam(":ket", $ket, PDO::PARAM_STR);
                    $stmt->bindParam(":gambar", $gambar, PDO::PARAM_STR);
                        
                    $count = $stmt->execute();
                            
                    $insertId = $pdo->lastInsertId();

                    // Upload gambar
                    uploadGambarAsli($gambar, $tipe_file, $lokasi_file, $lokasi_upload);
                    // Upload gambar

                    if ($count>0) {
                        $_SESSION['_msg__'] = 'Berhasil';
                        echo "<script>window.location = '$link'</script>";
                        die();
                        exit();
                    }     
                }catch(PDOException $e){
                    $_SESSION['_msg__'] = 'Gagal';
                    echo "<script>window.location(history.back(0))</script>";
                    die();
                    exit();
                }

                break;

            case "edit-galeri":

                // Data file
                $link               = $base_url_admin."/galeri/".$_POST['___in_slug_special_ARPATEAM'];
                $penyimpananGambar  = "../../../../assets/files/images/galeri";
                $database           = "galeri";
                // Data file

                $id_galeri      = htmlspecialchars($_POST['___in_id_galeri_special_ARPATEAM']);
                $id_galeri_judul= htmlspecialchars($_POST['___in_id_galeri_judul_special_ARPATEAM']);
                $galeri_judul   = htmlspecialchars($_POST['___in_galeri_judul_special_ARPATEAM']);
                $ket    = $_POST['___in_deskripsi_special_ARPATEAM'];

                $seo    = seo($id_galeri_judul." ".$galeri_judul." ".substr($ket, 0, 25));

                // Gambar
                    $lokasi_file    = $_FILES['___in_gambar_special_ARPATEAM']['tmp_name'];
                    $lokasi_upload  = "$penyimpananGambar/";
                    $nama_file      = $_FILES['___in_gambar_special_ARPATEAM']['name'];
                    $tipe_file      = strtolower($_FILES['___in_gambar_special_ARPATEAM']['type']);
                    $tipe_file2     = seo2($tipe_file); // ngedapetin png / jpg / jpeg
                    $ukuran         = $_FILES['___in_gambar_special_ARPATEAM']['size'];
                    $nama_file_unik = $seo.".".$tipe_file2;

                    $in_gambar_lama     = $_POST['___in_gambar_lama_special_ARPATEAM'];
                    $cariExtensiGambar  = explode(".", $in_gambar_lama);
                    $extensiGambarnya   = $cariExtensiGambar[1];

                    if (empty($nama_file)){
                        // Ubah nama gambar
                        rename("$penyimpananGambar/$in_gambar_lama", "$penyimpananGambar/$nama_file_unik$extensiGambarnya");
                        // Ubah nama gambar

                        $gambar = $nama_file_unik.$extensiGambarnya;
                    }else{
                        // Cek jenis file yang di upload
                        cekFile($tipe_file);
                        // Cek jenis file yang di upload

                        // Cek ukuran file yang di upload
                        cekUkuranFile2mb($ukuran);
                        // Cek ukuran file yang di upload

                        // Hapus gambar
                        unlink("$penyimpananGambar/$in_gambar_lama");
                        // Hapus gambar

                        // Upload gambar
                        uploadGambarAsli($nama_file_unik, $tipe_file, $lokasi_file, $lokasi_upload);
                        // Upload gambar

                        $gambar = $nama_file_unik;
                    }
                // Gambar

                try {
                    $sql = "UPDATE $database
                            SET ket             = :ket,
                                gambar          = :gambar,
                                tgl_update      = NOW()
                            WHERE id_$database  = :id_galeri
                        ";
                                  
                    $statement = $pdo->prepare($sql);

                    $statement->bindParam(":id_galeri", $id_galeri, PDO::PARAM_INT);
                    $statement->bindParam(":ket", $ket, PDO::PARAM_STR);
                    $statement->bindParam(":gambar", $gambar, PDO::PARAM_STR);

                    $count = $statement->execute();

                    if ($count>0) {
                        $_SESSION['_msg__']  = "Berhasil";
                        echo "<script>window.location = '$link'</script>";
                        die();
                        exit();
                    }
                }catch(PDOException $e){
                    $_SESSION['_msg__']  = "Gagal";
                    echo "<script>window.location(history.back(0))</script>";
                    die();
                    exit();
                }

                break;

            case "delete-galeri":

                // Data file
                $link               = $base_url_admin."/galeri/".$_GET['slug'];
                $penyimpananGambar  = "../../../../assets/files/images/galeri";
                $database           = "galeri";
                // Data file

                $Data           = $pdo->query("SELECT gambar FROM $database WHERE id_$database ='$_GET[id]'");
                $resultData     = $Data->fetch(PDO::FETCH_ASSOC);
                $gambarHapus    = $resultData["gambar"];

                try{
                    $del = $pdo->query("DELETE FROM $database WHERE id_$database='$_GET[id]'");
                    $del->execute();

                    // Hapus gambar
                    unlink("$penyimpananGambar/$gambarHapus");
                    // Hapus gambar

                    if ($del>0) {
                        $_SESSION['_msg__']  = "Berhasil";
                        echo "<script>window.location = '$link'</script>";
                        die();
                        exit();
                    }
                }catch(PDOException $e){
                    $_SESSION['_msg__'] = 'Gagal';
                    echo "<script>window.location(history.back(0))</script>";
                    die();
                    exit();
                }

                break;

            default:
                header("location: $base_url_admin/keluar-edit");
                die();
                exit();
        }
    }else{
        header("location: $base_url_admin/keluar-edit");
        die();
        exit();
    }