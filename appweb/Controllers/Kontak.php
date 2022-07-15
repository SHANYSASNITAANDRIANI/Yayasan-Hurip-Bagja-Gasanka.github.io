<?php
    require "../../appweb/Config/SetWebsite.php";
    require "../../appweb/Config/Db.php";
    require "../../appweb/Config/AssetsWebsite.php";

    session_start();
    error_reporting(0);

    if (isset($_POST['submit'])) {

        // Data file
        $database   = "pesan";
        // Data file

        $nama   = htmlspecialchars($_POST['nama']);
        $email  = htmlspecialchars($_POST['email']);
        $pesan  = htmlspecialchars($_POST['pesan']);
        $status = "Unread";

        try{
            $stmt = $pdo->prepare("INSERT INTO $database
                            (nama,email,pesan,status,tgl_update)
                            VALUES(:nama,:email,:pesan,:status,NOW())" );
                    
            $stmt->bindParam(":nama", $nama, PDO::PARAM_STR);
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->bindParam(":pesan", $pesan, PDO::PARAM_STR);
            $stmt->bindParam(":status", $status, PDO::PARAM_STR);

            $count = $stmt->execute();
                    
            $insertId = $pdo->lastInsertId();

            if ($count>0) {
                $_SESSION['_msg__'] = 'Berhasil';
                echo "<script>window.location = '$base_url'</script>";
                die();
                exit();
            }     
        }catch(PDOException $e){
            $_SESSION['_msg__'] = 'Gagal';
            echo "<script>window.location(history.back(0))</script>";
            die();
            exit();
        }

    }

?>