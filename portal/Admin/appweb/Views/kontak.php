<?php

    switch ($_GET['method']) {
        case 'list':
            $halActive  = "Data Kotak Pesan";
            $database   = "pesan";
            $link       = "kontak";

            try {
                $stmtAll = $pdo->prepare("
                        SELECT id_pesan
                        FROM $database");

                $stmtAll->execute();
                $rowsAll = $stmtAll->rowCount();

                try {
                    $stmtRead = $pdo->prepare("
                            SELECT id_pesan
                            FROM $database
                            WHERE status = ?");

                    $stmtRead->bindValue(1, "Read");
                    $stmtRead->execute();
                    $rowsRead = $stmtRead->rowCount();

                    try {
                        $stmtUnread = $pdo->prepare("
                                SELECT id_pesan
                                FROM $database
                                WHERE status = ?");

                        $stmtUnread->bindValue(1, "Unread");
                        $stmtUnread->execute();
                        $rowsUnread = $stmtUnread->rowCount();
                    } catch (Exception $e) {
                        echo "<script>window.location.href = '$base_url_admin/$link/';</script>";
                        die();
                        exit();
                    }

                } catch (Exception $e) {
                    echo "<script>window.location.href = '$base_url_admin/$link/';</script>";
                    die();
                    exit();
                }
            } catch (Exception $e) {
                echo "<script>window.location.href = '$base_url_admin/$link/';</script>";
                die();
                exit();
            }

?>

<div class="content">
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="container">
            <h3><?= $halActive ?></h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= $base_url_admin; ?>/dashboard/"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $halActive ?></li>
                </ol>
            </nav>
        </div>
        <div class="container">
            <div class="row mt-3">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header border-bottom text-center">
                            <button class="btn btn-outline-primary rounded-pill" disabled>All <span class="badge bg-primary rounded-pill pt-1"><?= $rowsAll; ?></span></button>
                            <button class="btn btn-outline-success rounded-pill" disabled>Read <span class="badge bg-success rounded-pill pt-1"><?= $rowsRead; ?></span></button>
                            <button class="btn btn-outline-warning rounded-pill" disabled>Unread <span class="badge bg-warning rounded-pill pt-1"><?= $rowsUnread; ?></span></button>
                        </div>

                        <div class="card-body">
                            <table id="datatable" class="table table-bordered table-striped dt-responsive table-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th width="25">#</th>
                                        <th width="150">Identitas</th>
                                        <th>Pesan</th>
                                        <th width="50">Status</th>
                                        <th width="100">Waktu</th>
                                        <th width="150">Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                        $no=1;
                                        $queryData = $pdo->prepare("
                                                SELECT *
                                                FROM $database
                                                ORDER BY tgl_update DESC");
                                        $queryData->execute();
                                        while($resultData = $queryData->fetch(PDO::FETCH_ASSOC)){  
                                    ?>

                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td>
                                            <strong><?= $resultData['nama'] ?></strong>
                                            <br />
                                            <a href="mailto:<?= $resultData['email'] ?>" title="Email <?= $resultData['nama'] ?>" class="badge bg-pink"><small><i class="fas fa-envelope"></i> <?= $resultData['email'] ?></small></a>
                                        </td>
                                        <td>
                                            <?php
                                                if (strlen($resultData['pesan'])>35) {
                                                    echo substr($resultData['pesan'], 0, 35)." ...";
                                                }else{
                                                    echo $resultData['pesan'];
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php if ($resultData['status']==="Read"): ?>
                                                <span class="badge bg-success"><i class="fas fa-check"></i> Read</span>
                                            <?php else: ?>
                                                <span class="badge bg-warning"><i class="fas fa-times"></i> Unread</span>
                                            <?php endif ?>
                                                
                                        </td>
                                        <td><?= indoTgl($resultData['tgl_update']) ?></td>
                                        <td>
                                            <a role="button" href="<?= $base_url_admin; ?>/kontak/detail/<?= $resultData['id_pesan'] ?>/" class="btn btn-sm btn-pink"><i class="fas fa-book-open"></i> Baca</a>
                                            <a role="button" onclick="confirmHapusKotakPesan('<?= $resultData['id_pesan']; ?>')" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> Hapus</a>
                                        </td>
                                    </tr>

                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div> <!-- container-fluid -->
</div> <!-- content -->

<?php
            break;
        case 'detail':
            $hal                = "Kotak Pesan";
            $database           = "pesan";
            $link               = "kontak";

            try {
                $stmt  = $pdo->prepare("
                        SELECT *
                        FROM $database
                        WHERE id_pesan = ?");

                $stmt->bindValue(1, $_GET["id"]);
                $stmt->execute();
                $rows   = $stmt->rowCount();

                if ($rows>0) {
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                    $status = "Read";
                    try {
                        $sql = "UPDATE $database
                                SET status = :status
                                WHERE id_$database  = :id_pesan
                            ";
                                      
                        $statement = $pdo->prepare($sql);

                        $statement->bindParam(":id_pesan", $_GET["id"], PDO::PARAM_INT);
                        $statement->bindParam(":status", $status, PDO::PARAM_STR);

                        $count = $statement->execute();
                    }catch(PDOException $e){
                        $_SESSION['_msg__']  = "Gagal";
                        echo "<script>window.location(history.back(0))</script>";
                        die();
                        exit();
                    }
                }else{
                    echo "<script>window.location.href = '$base_url_admin/$link/';</script>";
                    die();
                    exit();
                }
            } catch (Exception $e) {
                echo "<script>window.location.href = '$base_url_admin/$link/';</script>";
                die();
                exit();
            }

?>

<div class="content">
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="container">
            <h3>Detail <?= $hal ?></h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= $base_url_admin; ?>/dashboard/"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?= $base_url_admin; ?>/<?= $link; ?>/"><?= $hal ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $result['nama'] ?></li>
                </ol>
            </nav>
        </div>
        <div class="container">
            <div class="row mt-3">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="bg-picture card-body">
                                <div class="d-flex align-items-top">
                                    <div class="flex-grow-1 overflow-hidden">
                                        <h3 class="m-0"><?= $result['nama'] ?></h3>
                                        <span class="text-muted"><i><?= $result['email'] ?></i></span>

                                        <ul class="nav nav-tabs mt-3">
                                            <li class="nav-item">
                                                <a href="#home" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                                    PESAN
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="home">
                                                <table class="table table-bordered table-striped">
                                                    <tbody>
                                                        <tr>
                                                            <td><?= $result['pesan'] ?></td>
                                                        </tr>
                                                </table>
                                            </div>
                                        </div>

                                        <hr />

                                        <!-- item-->
                                        <a role="button" href="<?= $base_url_admin; ?>/kontak/" class="btn btn-secondary rounded-pill"><i class="fas fa-arrow-left"></i> Kembali</a>
                                        <!-- item-->
                                        <a role="button" onclick="confirmHapusKotakPesan('<?= $result['id_pesan']; ?>')" class="btn btn-outline-danger rounded-pill"><i class="fas fa-trash-alt"></i> Hapus</a>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
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
            header("location: $base_url_admin/keluar-edit");
            die();
            exit();
            break;
    }
?>