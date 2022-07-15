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
    }elseif((isset($_POST['_submit_special_ARPATEAM_'])) OR ($_GET['act']==="delete")){
        require '../Libraries/others.php';
        require "../Libraries/fungsi_form.php";

        switch ($_GET['act']) {
            case "add":

                // Data file
                $link       = $base_url_admin."/program/";
                $database   = "program";
                // Data file

                $no_urut    = htmlspecialchars($_POST['___in_no_urut_special_ARPATEAM']);
                $judul      = htmlspecialchars($_POST['___in_judul_special_ARPATEAM']);

                $deskripsi  = $_POST['___in_deskripsi_special_ARPATEAM'];
                $seo        = seo($judul);

                if (empty($_POST['___in_slug_special_ARPATEAM']) || $_POST['___in_slug_special_ARPATEAM']===NULL || $_POST['___in_slug_special_ARPATEAM']===0) {
                    $slug   = $seo;
                    cekSlug($database, $slug);
                }else{
                    $slug   = seo($_POST['___in_slug_special_ARPATEAM']);
                    cekSlug($database, $slug);
                }

                seoKeyword($_POST['___in_keyword_special_ARPATEAM'], $deskripsi);
                seoDescription($_POST['___in_description_special_ARPATEAM'], $deskripsi);

                try{
                    $stmt = $pdo->prepare("INSERT INTO $database
                                    (no_urut,judul,deskripsi,slug,keyword,description,tgl_update)
                                    VALUES(:no_urut,:judul,:deskripsi,:slug,:keyword,:description,NOW())" );
                            
                    $stmt->bindParam(":no_urut", $no_urut, PDO::PARAM_STR);
                    $stmt->bindParam(":judul", $judul, PDO::PARAM_STR);
                    $stmt->bindParam(":deskripsi", $deskripsi, PDO::PARAM_STR);
                    $stmt->bindParam(":slug", $slug, PDO::PARAM_STR);
                    $stmt->bindParam(":keyword", $keyword, PDO::PARAM_STR);
                    $stmt->bindParam(":description", $description, PDO::PARAM_STR);
                        
                    $count = $stmt->execute();
                            
                    $insertId = $pdo->lastInsertId();

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

            case "edit":

                // Data file
                $database   = "program";
                // Data file

                if ($_POST['___in_slug_special_ARPATEAM']===$_POST['___in_slug_lama_special_ARPATEAM']) {
                    $slug   = $_POST['___in_slug_special_ARPATEAM'];
                }else{
                    $slug   = seo($_POST['___in_slug_special_ARPATEAM']);
                    cekSlug($database, $slug);
                }

                // Data file
                $link       = $base_url_admin."/program/".$slug;
                // Data file

                $id_program = htmlspecialchars($_POST['___in_id_program_special_ARPATEAM']);
                $no_urut    = htmlspecialchars($_POST['___in_no_urut_special_ARPATEAM']);
                $judul      = htmlspecialchars($_POST['___in_judul_special_ARPATEAM']);

                $deskripsi  = $_POST['___in_deskripsi_special_ARPATEAM'];
                $seo        = seo($judul);

                seoKeyword($_POST['___in_keyword_special_ARPATEAM'], $deskripsi);
                seoDescription($_POST['___in_description_special_ARPATEAM'], $deskripsi);

                try {
                    $sql = "UPDATE $database
                            SET no_urut         = :no_urut,
                                judul           = :judul,
                                deskripsi       = :deskripsi,
                                slug            = :slug,
                                keyword         = :keyword,
                                description     = :description,
                                tgl_update      = NOW()
                            WHERE id_$database  = :id_program
                        ";
                                  
                    $statement = $pdo->prepare($sql);

                    $statement->bindParam(":id_program", $id_program, PDO::PARAM_INT);
                    $statement->bindParam(":no_urut", $no_urut, PDO::PARAM_STR);
                    $statement->bindParam(":judul", $judul, PDO::PARAM_STR);
                    $statement->bindParam(":deskripsi", $deskripsi, PDO::PARAM_STR);
                    $statement->bindParam(":slug", $slug, PDO::PARAM_STR);
                    $statement->bindParam(":keyword", $keyword, PDO::PARAM_STR);
                    $statement->bindParam(":description", $description, PDO::PARAM_STR);

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

            case "delete":

                // Data file
                $link       = $base_url_admin."/program/";
                $database   = "program";
                // Data file

                try{
                    $del = $pdo->query("DELETE FROM $database WHERE id_$database='$_GET[id]'");
                    $del->execute();

                    $_SESSION['_msg__']  = "Berhasil";
                    echo "<script>window.location = '$link'</script>";
                    die();
                    exit();
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