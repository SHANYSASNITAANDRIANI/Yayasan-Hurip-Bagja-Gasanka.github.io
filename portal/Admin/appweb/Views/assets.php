<?php

    switch ($_GET['act']) {
        case 'bulanan':

            $hal        = "bulan ini";
            $database   = "statistik_transaksi";
            $database2  = "statistik_aset";
            $link       = "aset";

?>

<div class="content">
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="container bg-pink rounded py-2 mb-3">
            <div class="row justify-content-between">
                <div class="col-auto">
                    <h5 class="text-light fw-normal"><i class="fas fa-exclamation-triangle"></i> Rekapan Terakhir: <strong><?= indoTglWithTime("2022-05-08 11:20:28") ?></strong></h5>
                </div>
                <div class="col-auto my-auto">
                    <a role="button" href="rekapLaporan/" title="Rekap Laporan" class="btn btn-info rounded-pill waves-effect waves-light"><i class="fas fa-sync-alt"></i> Rekap Laporan</a>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <div class="card">
                    <div class="card-body">
                        <a role="button" href="<?= $base_url_admin; ?>/<?= $link; ?>/bulanan/" title="Bulan Ini" class="btn btn-outline-pink rounded-pill waves-effect waves-light active">Bulan Ini</a>

                        <a role="button" href="<?= $base_url_admin; ?>/<?= $link; ?>/tahunan/" title="Tahun Ini" class="btn btn-outline-pink rounded-pill waves-effect waves-light">Tahun Ini</a>

                        <button type="button" class="btn btn-outline-pink rounded-pill waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#Kustom">Kustom</button>

                        <div id="Kustom" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Kustom Laporan</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item">
                                            <a href="#bulanan" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                                Laporan Bulanan
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#tahunan" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                                Laporan Tahunan
                                            </a>
                                        </li>
                                    </ul>

                                    <div class="tab-content border-start border-bottom border-end p-2">
                                        <form action="addLayanan/" method="POST" data-parsley-validate="" class="tab-pane show active" id="bulanan">
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-calendar-alt"></i></span>
                                                <input type="text" class="form-control form-control-lg" data-provide="datepicker" data-date-format="MM yyyy" data-date-min-view-mode="1">
                                            </div>

                                            <button type="submit" name="_submit_special_ARPATEAM_" class="btn btn-info waves-effect waves-light mt-2"><i class="fas fa-search"></i> CARI LAPORAN</button>
                                        </form>
                                        <form action="addLayanan/" method="POST" data-parsley-validate="" class="tab-pane" id="tahunan">
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-calendar-alt"></i></span>
                                                <input type="text" class="form-control form-control-lg" data-provide="datepicker" data-date-min-view-mode="2">
                                            </div>

                                            <button type="submit" name="_submit_special_ARPATEAM_" class="btn btn-info waves-effect waves-light mt-2"><i class="fas fa-search"></i> CARI LAPORAN</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.modal -->
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mt-0">Statistik Project <small class="badge bg-info"><?= $hal; ?></small></h4>

                        <div class="widget-chart text-center">
                            <div id="morris-donut-example" dir="ltr" style="height: 275px;" class="morris-chart"></div>
                            <ul class="list-inline chart-detail-list mb-0">
                                <li class="list-inline-item">
                                    <h5 style="color: #f9c851;"><i class="fa fa-circle me-1"></i>Pending</h5>
                                </li>
                                <li class="list-inline-item">
                                    <h5 style="color: #ff8acc;"><i class="fa fa-circle me-1"></i>On Progress</h5>
                                </li>
                                <li class="list-inline-item">
                                    <h5 style="color: #10c469;"><i class="fa fa-circle me-1"></i>Finish</h5>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div><!-- end col -->

            <div class="col-xl-8">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mt-0 mb-3">Transaksi Sukses</h4>

                                <div class="widget-box-2">
                                    <div class="widget-detail-2 text-end">
                                        <span class="badge bg-success rounded-pill float-start mt-3">32% <i class="mdi mdi-trending-up"></i> </span>
                                        <h2 class="fw-normal mb-1"> 21 </h2>
                                        <p class="text-muted mb-3">Transaksi <?= $hal; ?></p>
                                    </div>
                                    <div class="progress progress-bar-alt-success progress-sm">
                                        <div class="progress-bar bg-success" role="progressbar"
                                            aria-valuenow="32" aria-valuemin="0" aria-valuemax="100"
                                            style="width: 32%;">
                                            <span class="visually-hidden">32% Transaksi <?= $hal; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mt-0 mb-3">Penghasilan</h4>

                                <div class="widget-box-2">
                                    <div class="widget-detail-2 text-end">
                                        <span class="badge bg-secondary rounded-pill float-start mt-3">0% <i class="mdi mdi-trending-neutral"></i> </span>
                                        <h2 class="fw-normal mb-1"> Rp0 </h2>
                                        <p class="text-muted mb-3">Penghasilan <?= $hal; ?></p>
                                    </div>
                                    <div class="progress progress-bar-alt-secondary progress-sm">
                                        <div class="progress-bar bg-secondary" role="progressbar"
                                            aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                                            style="width: 0%;">
                                            <span class="visually-hidden">0% Penghasilan <?= $hal; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mt-0 mb-3">Pengeluaran</h4>

                                <div class="widget-box-2">
                                    <div class="widget-detail-2 text-end">
                                        <span class="badge bg-danger rounded-pill float-start mt-3">10% <i class="mdi mdi-trending-down"></i> </span>
                                        <h2 class="fw-normal mb-1"> Rp19.999 </h2>
                                        <p class="text-muted mb-3">Pengeluaran <?= $hal; ?></p>
                                    </div>
                                    <div class="progress progress-bar-alt-danger progress-sm">
                                        <div class="progress-bar bg-danger" role="progressbar"
                                            aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"
                                            style="width: 10%;">
                                            <span class="visually-hidden">10% Pengeluaran <?= $hal; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mt-0 mb-3">Laba Bersih</h4>

                                <div class="widget-box-2">
                                    <div class="widget-detail-2 text-end">
                                        <span class="badge bg-success rounded-pill float-start mt-3">99% <i class="mdi mdi-trending-up"></i> </span>
                                        <h2 class="fw-normal mb-1"> Rp119.999 </h2>
                                        <p class="text-muted mb-3">Laba bersih <?= $hal; ?></p>
                                    </div>
                                    <div class="progress progress-bar-alt-success progress-sm">
                                        <div class="progress-bar bg-success" role="progressbar"
                                            aria-valuenow="99" aria-valuemin="0" aria-valuemax="100"
                                            style="width: 99%;">
                                            <span class="visually-hidden">99% Laba bersih <?= $hal; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->
                </div>
            </div><!-- end col -->
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mt-0 mb-3">Laporan Project <small class="badge bg-info"><?= $hal; ?></small></h4>

                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Project Name</th>
                                    <th>Start Date</th>
                                    <th>Due Date</th>
                                    <th>Status</th>
                                    <th>Assign</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Adminto Admin v1</td>
                                        <td>01/01/2017</td>
                                        <td>26/04/2017</td>
                                        <td><span class="badge bg-danger">Released</span></td>
                                        <td>Coderthemes</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Adminto Frontend v1</td>
                                        <td>01/01/2017</td>
                                        <td>26/04/2017</td>
                                        <td><span class="badge bg-success">Released</span></td>
                                        <td>Adminto admin</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Adminto Admin v1.1</td>
                                        <td>01/05/2017</td>
                                        <td>10/05/2017</td>
                                        <td><span class="badge bg-pink">Pending</span></td>
                                        <td>Coderthemes</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Adminto Frontend v1.1</td>
                                        <td>01/01/2017</td>
                                        <td>31/05/2017</td>
                                        <td><span class="badge bg-purple">Work in Progress</span>
                                        </td>
                                        <td>Adminto admin</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Adminto Admin v1.3</td>
                                        <td>01/01/2017</td>
                                        <td>31/05/2017</td>
                                        <td><span class="badge bg-warning">Coming soon</span></td>
                                        <td>Coderthemes</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div> 
                </div>
            </div><!-- end col -->

            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mt-0 mb-3">Laporan Keuangan <small class="badge bg-info"><?= $hal; ?></small></h4>

                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Project Name</th>
                                    <th>Start Date</th>
                                    <th>Due Date</th>
                                    <th>Status</th>
                                    <th>Assign</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Adminto Admin v1</td>
                                        <td>01/01/2017</td>
                                        <td>26/04/2017</td>
                                        <td><span class="badge bg-danger">Released</span></td>
                                        <td>Coderthemes</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Adminto Frontend v1</td>
                                        <td>01/01/2017</td>
                                        <td>26/04/2017</td>
                                        <td><span class="badge bg-success">Released</span></td>
                                        <td>Adminto admin</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Adminto Admin v1.1</td>
                                        <td>01/05/2017</td>
                                        <td>10/05/2017</td>
                                        <td><span class="badge bg-pink">Pending</span></td>
                                        <td>Coderthemes</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Adminto Frontend v1.1</td>
                                        <td>01/01/2017</td>
                                        <td>31/05/2017</td>
                                        <td><span class="badge bg-purple">Work in Progress</span>
                                        </td>
                                        <td>Adminto admin</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Adminto Admin v1.3</td>
                                        <td>01/01/2017</td>
                                        <td>31/05/2017</td>
                                        <td><span class="badge bg-warning">Coming soon</span></td>
                                        <td>Coderthemes</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div> 
                </div>
            </div><!-- end col -->
        </div>
        <!-- end row -->
    </div> <!-- container-fluid -->
</div>

<?php

            break;
        case 'tahunan':

            $hal        = "tahun ini";
            $database   = "statistik_transaksi";
            $database2  = "statistik_aset";
            $link       = "aset";

?>

<div class="content">
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="container bg-pink rounded py-2 mb-3">
            <div class="row justify-content-between">
                <div class="col-auto">
                    <h5 class="text-light fw-normal"><i class="fas fa-exclamation-triangle"></i> Rekapan Terakhir: <strong><?= indoTglWithTime("2022-05-08 11:20:28") ?></strong></h5>
                </div>
                <div class="col-auto my-auto">
                    <a role="button" href="rekapLaporan/" title="Rekap Laporan" class="btn btn-info rounded-pill waves-effect waves-light"><i class="fas fa-sync-alt"></i> Rekap Laporan</a>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <div class="card">
                    <div class="card-body">
                        <a role="button" href="<?= $base_url_admin; ?>/<?= $link; ?>/bulanan/" title="Bulan Ini" class="btn btn-outline-pink rounded-pill waves-effect waves-light">Bulan Ini</a>

                        <a role="button" href="<?= $base_url_admin; ?>/<?= $link; ?>/tahunan/" title="Tahun Ini" class="btn btn-outline-pink rounded-pill waves-effect waves-light active">Tahun Ini</a>

                        <button type="button" class="btn btn-outline-pink rounded-pill waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#Kustom">Kustom</button>

                        <div id="Kustom" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Kustom Laporan</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item">
                                            <a href="#bulanan" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                                Laporan Bulanan
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#tahunan" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                                Laporan Tahunan
                                            </a>
                                        </li>
                                    </ul>

                                    <div class="tab-content border-start border-bottom border-end p-2">
                                        <form action="addLayanan/" method="POST" data-parsley-validate="" class="tab-pane show active" id="bulanan">
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-calendar-alt"></i></span>
                                                <input type="text" class="form-control form-control-lg" data-provide="datepicker" data-date-format="MM yyyy" data-date-min-view-mode="1">
                                            </div>

                                            <button type="submit" name="_submit_special_ARPATEAM_" class="btn btn-info waves-effect waves-light mt-2"><i class="fas fa-search"></i> CARI LAPORAN</button>
                                        </form>
                                        <form action="addLayanan/" method="POST" data-parsley-validate="" class="tab-pane" id="tahunan">
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-calendar-alt"></i></span>
                                                <input type="text" class="form-control form-control-lg" data-provide="datepicker" data-date-min-view-mode="2">
                                            </div>

                                            <button type="submit" name="_submit_special_ARPATEAM_" class="btn btn-info waves-effect waves-light mt-2"><i class="fas fa-search"></i> CARI LAPORAN</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.modal -->
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mt-0">Statistik Project <small class="badge bg-info"><?= $hal; ?></small></h4>

                        <div class="widget-chart text-center">
                            <div id="morris-donut-example" dir="ltr" style="height: 275px;" class="morris-chart"></div>
                            <ul class="list-inline chart-detail-list mb-0">
                                <li class="list-inline-item">
                                    <h5 style="color: #f9c851;"><i class="fa fa-circle me-1"></i>Pending</h5>
                                </li>
                                <li class="list-inline-item">
                                    <h5 style="color: #ff8acc;"><i class="fa fa-circle me-1"></i>On Progress</h5>
                                </li>
                                <li class="list-inline-item">
                                    <h5 style="color: #10c469;"><i class="fa fa-circle me-1"></i>Finish</h5>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div><!-- end col -->

            <div class="col-xl-8">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mt-0 mb-3">Transaksi Sukses</h4>

                                <div class="widget-box-2">
                                    <div class="widget-detail-2 text-end">
                                        <span class="badge bg-success rounded-pill float-start mt-3">32% <i class="mdi mdi-trending-up"></i> </span>
                                        <h2 class="fw-normal mb-1"> 21 </h2>
                                        <p class="text-muted mb-3">Transaksi <?= $hal; ?></p>
                                    </div>
                                    <div class="progress progress-bar-alt-success progress-sm">
                                        <div class="progress-bar bg-success" role="progressbar"
                                            aria-valuenow="32" aria-valuemin="0" aria-valuemax="100"
                                            style="width: 32%;">
                                            <span class="visually-hidden">32% Transaksi <?= $hal; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mt-0 mb-3">Penghasilan</h4>

                                <div class="widget-box-2">
                                    <div class="widget-detail-2 text-end">
                                        <span class="badge bg-secondary rounded-pill float-start mt-3">0% <i class="mdi mdi-trending-neutral"></i> </span>
                                        <h2 class="fw-normal mb-1"> Rp0 </h2>
                                        <p class="text-muted mb-3">Penghasilan <?= $hal; ?></p>
                                    </div>
                                    <div class="progress progress-bar-alt-secondary progress-sm">
                                        <div class="progress-bar bg-secondary" role="progressbar"
                                            aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                                            style="width: 0%;">
                                            <span class="visually-hidden">0% Penghasilan <?= $hal; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mt-0 mb-3">Pengeluaran</h4>

                                <div class="widget-box-2">
                                    <div class="widget-detail-2 text-end">
                                        <span class="badge bg-danger rounded-pill float-start mt-3">10% <i class="mdi mdi-trending-down"></i> </span>
                                        <h2 class="fw-normal mb-1"> Rp19.999 </h2>
                                        <p class="text-muted mb-3">Pengeluaran <?= $hal; ?></p>
                                    </div>
                                    <div class="progress progress-bar-alt-danger progress-sm">
                                        <div class="progress-bar bg-danger" role="progressbar"
                                            aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"
                                            style="width: 10%;">
                                            <span class="visually-hidden">10% Pengeluaran <?= $hal; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mt-0 mb-3">Laba Bersih</h4>

                                <div class="widget-box-2">
                                    <div class="widget-detail-2 text-end">
                                        <span class="badge bg-success rounded-pill float-start mt-3">99% <i class="mdi mdi-trending-up"></i> </span>
                                        <h2 class="fw-normal mb-1"> Rp119.999 </h2>
                                        <p class="text-muted mb-3">Laba bersih <?= $hal; ?></p>
                                    </div>
                                    <div class="progress progress-bar-alt-success progress-sm">
                                        <div class="progress-bar bg-success" role="progressbar"
                                            aria-valuenow="99" aria-valuemin="0" aria-valuemax="100"
                                            style="width: 99%;">
                                            <span class="visually-hidden">99% Laba bersih <?= $hal; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->
                </div>
            </div><!-- end col -->
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mt-0 mb-3">Laporan Project <small class="badge bg-info"><?= $hal; ?></small></h4>

                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Project Name</th>
                                    <th>Start Date</th>
                                    <th>Due Date</th>
                                    <th>Status</th>
                                    <th>Assign</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Adminto Admin v1</td>
                                        <td>01/01/2017</td>
                                        <td>26/04/2017</td>
                                        <td><span class="badge bg-danger">Released</span></td>
                                        <td>Coderthemes</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Adminto Frontend v1</td>
                                        <td>01/01/2017</td>
                                        <td>26/04/2017</td>
                                        <td><span class="badge bg-success">Released</span></td>
                                        <td>Adminto admin</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Adminto Admin v1.1</td>
                                        <td>01/05/2017</td>
                                        <td>10/05/2017</td>
                                        <td><span class="badge bg-pink">Pending</span></td>
                                        <td>Coderthemes</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Adminto Frontend v1.1</td>
                                        <td>01/01/2017</td>
                                        <td>31/05/2017</td>
                                        <td><span class="badge bg-purple">Work in Progress</span>
                                        </td>
                                        <td>Adminto admin</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Adminto Admin v1.3</td>
                                        <td>01/01/2017</td>
                                        <td>31/05/2017</td>
                                        <td><span class="badge bg-warning">Coming soon</span></td>
                                        <td>Coderthemes</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div> 
                </div>
            </div><!-- end col -->

            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mt-0 mb-3">Laporan Keuangan <small class="badge bg-info"><?= $hal; ?></small></h4>

                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Project Name</th>
                                    <th>Start Date</th>
                                    <th>Due Date</th>
                                    <th>Status</th>
                                    <th>Assign</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Adminto Admin v1</td>
                                        <td>01/01/2017</td>
                                        <td>26/04/2017</td>
                                        <td><span class="badge bg-danger">Released</span></td>
                                        <td>Coderthemes</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Adminto Frontend v1</td>
                                        <td>01/01/2017</td>
                                        <td>26/04/2017</td>
                                        <td><span class="badge bg-success">Released</span></td>
                                        <td>Adminto admin</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Adminto Admin v1.1</td>
                                        <td>01/05/2017</td>
                                        <td>10/05/2017</td>
                                        <td><span class="badge bg-pink">Pending</span></td>
                                        <td>Coderthemes</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Adminto Frontend v1.1</td>
                                        <td>01/01/2017</td>
                                        <td>31/05/2017</td>
                                        <td><span class="badge bg-purple">Work in Progress</span>
                                        </td>
                                        <td>Adminto admin</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Adminto Admin v1.3</td>
                                        <td>01/01/2017</td>
                                        <td>31/05/2017</td>
                                        <td><span class="badge bg-warning">Coming soon</span></td>
                                        <td>Coderthemes</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div> 
                </div>
            </div><!-- end col -->
        </div>
        <!-- end row -->
    </div> <!-- container-fluid -->
</div>

<?php

            break;
        case 'kustom':

            $hal        = "January 2022";
            $database   = "statistik_transaksi";
            $database2  = "statistik_aset";
            $link       = "aset";

?>

<div class="content">
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="container bg-pink rounded py-2 mb-3">
            <div class="row justify-content-between">
                <div class="col-auto">
                    <h5 class="text-light fw-normal"><i class="fas fa-exclamation-triangle"></i> Rekapan Terakhir: <strong><?= indoTglWithTime("2022-05-08 11:20:28") ?></strong></h5>
                </div>
                <div class="col-auto my-auto">
                    <a role="button" href="rekapLaporan/" title="Rekap Laporan" class="btn btn-info rounded-pill waves-effect waves-light"><i class="fas fa-sync-alt"></i> Rekap Laporan</a>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <div class="card">
                    <div class="card-body">
                        <a role="button" href="<?= $base_url_admin; ?>/<?= $link; ?>/bulanan/" title="Bulan Ini" class="btn btn-outline-pink rounded-pill waves-effect waves-light">Bulan Ini</a>

                        <a role="button" href="<?= $base_url_admin; ?>/<?= $link; ?>/tahunan/" title="Tahun Ini" class="btn btn-outline-pink rounded-pill waves-effect waves-light">Tahun Ini</a>

                        <button type="button" class="btn btn-outline-pink rounded-pill waves-effect waves-light active" data-bs-toggle="modal" data-bs-target="#Kustom">Kustom</button>

                        <div id="Kustom" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Kustom Laporan</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item">
                                            <a href="#bulanan" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                                Laporan Bulanan
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#tahunan" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                                Laporan Tahunan
                                            </a>
                                        </li>
                                    </ul>

                                    <div class="tab-content border-start border-bottom border-end p-2">
                                        <form action="addLayanan/" method="POST" data-parsley-validate="" class="tab-pane show active" id="bulanan">
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-calendar-alt"></i></span>
                                                <input type="text" class="form-control form-control-lg" data-provide="datepicker" data-date-format="MM yyyy" data-date-min-view-mode="1">
                                            </div>

                                            <button type="submit" name="_submit_special_ARPATEAM_" class="btn btn-info waves-effect waves-light mt-2"><i class="fas fa-search"></i> CARI LAPORAN</button>
                                        </form>
                                        <form action="addLayanan/" method="POST" data-parsley-validate="" class="tab-pane" id="tahunan">
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-calendar-alt"></i></span>
                                                <input type="text" class="form-control form-control-lg" data-provide="datepicker" data-date-min-view-mode="2">
                                            </div>

                                            <button type="submit" name="_submit_special_ARPATEAM_" class="btn btn-info waves-effect waves-light mt-2"><i class="fas fa-search"></i> CARI LAPORAN</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.modal -->
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mt-0">Statistik Project <small class="badge bg-info"><?= $hal; ?></small></h4>

                        <div class="widget-chart text-center">
                            <div id="morris-donut-example" dir="ltr" style="height: 275px;" class="morris-chart"></div>
                            <ul class="list-inline chart-detail-list mb-0">
                                <li class="list-inline-item">
                                    <h5 style="color: #f9c851;"><i class="fa fa-circle me-1"></i>Pending</h5>
                                </li>
                                <li class="list-inline-item">
                                    <h5 style="color: #ff8acc;"><i class="fa fa-circle me-1"></i>On Progress</h5>
                                </li>
                                <li class="list-inline-item">
                                    <h5 style="color: #10c469;"><i class="fa fa-circle me-1"></i>Finish</h5>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div><!-- end col -->

            <div class="col-xl-8">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mt-0 mb-3">Transaksi Sukses</h4>

                                <div class="widget-box-2">
                                    <div class="widget-detail-2 text-end">
                                        <span class="badge bg-success rounded-pill float-start mt-3">32% <i class="mdi mdi-trending-up"></i> </span>
                                        <h2 class="fw-normal mb-1"> 21 </h2>
                                        <p class="text-muted mb-3">Transaksi <?= $hal; ?></p>
                                    </div>
                                    <div class="progress progress-bar-alt-success progress-sm">
                                        <div class="progress-bar bg-success" role="progressbar"
                                            aria-valuenow="32" aria-valuemin="0" aria-valuemax="100"
                                            style="width: 32%;">
                                            <span class="visually-hidden">32% Transaksi <?= $hal; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mt-0 mb-3">Penghasilan</h4>

                                <div class="widget-box-2">
                                    <div class="widget-detail-2 text-end">
                                        <span class="badge bg-secondary rounded-pill float-start mt-3">0% <i class="mdi mdi-trending-neutral"></i> </span>
                                        <h2 class="fw-normal mb-1"> Rp0 </h2>
                                        <p class="text-muted mb-3">Penghasilan <?= $hal; ?></p>
                                    </div>
                                    <div class="progress progress-bar-alt-secondary progress-sm">
                                        <div class="progress-bar bg-secondary" role="progressbar"
                                            aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                                            style="width: 0%;">
                                            <span class="visually-hidden">0% Penghasilan <?= $hal; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mt-0 mb-3">Pengeluaran</h4>

                                <div class="widget-box-2">
                                    <div class="widget-detail-2 text-end">
                                        <span class="badge bg-danger rounded-pill float-start mt-3">10% <i class="mdi mdi-trending-down"></i> </span>
                                        <h2 class="fw-normal mb-1"> Rp19.999 </h2>
                                        <p class="text-muted mb-3">Pengeluaran <?= $hal; ?></p>
                                    </div>
                                    <div class="progress progress-bar-alt-danger progress-sm">
                                        <div class="progress-bar bg-danger" role="progressbar"
                                            aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"
                                            style="width: 10%;">
                                            <span class="visually-hidden">10% Pengeluaran <?= $hal; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mt-0 mb-3">Laba Bersih</h4>

                                <div class="widget-box-2">
                                    <div class="widget-detail-2 text-end">
                                        <span class="badge bg-success rounded-pill float-start mt-3">99% <i class="mdi mdi-trending-up"></i> </span>
                                        <h2 class="fw-normal mb-1"> Rp119.999 </h2>
                                        <p class="text-muted mb-3">Laba bersih <?= $hal; ?></p>
                                    </div>
                                    <div class="progress progress-bar-alt-success progress-sm">
                                        <div class="progress-bar bg-success" role="progressbar"
                                            aria-valuenow="99" aria-valuemin="0" aria-valuemax="100"
                                            style="width: 99%;">
                                            <span class="visually-hidden">99% Laba bersih <?= $hal; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->
                </div>
            </div><!-- end col -->
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mt-0 mb-3">Laporan Project <small class="badge bg-info"><?= $hal; ?></small></h4>

                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Project Name</th>
                                    <th>Start Date</th>
                                    <th>Due Date</th>
                                    <th>Status</th>
                                    <th>Assign</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Adminto Admin v1</td>
                                        <td>01/01/2017</td>
                                        <td>26/04/2017</td>
                                        <td><span class="badge bg-danger">Released</span></td>
                                        <td>Coderthemes</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Adminto Frontend v1</td>
                                        <td>01/01/2017</td>
                                        <td>26/04/2017</td>
                                        <td><span class="badge bg-success">Released</span></td>
                                        <td>Adminto admin</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Adminto Admin v1.1</td>
                                        <td>01/05/2017</td>
                                        <td>10/05/2017</td>
                                        <td><span class="badge bg-pink">Pending</span></td>
                                        <td>Coderthemes</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Adminto Frontend v1.1</td>
                                        <td>01/01/2017</td>
                                        <td>31/05/2017</td>
                                        <td><span class="badge bg-purple">Work in Progress</span>
                                        </td>
                                        <td>Adminto admin</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Adminto Admin v1.3</td>
                                        <td>01/01/2017</td>
                                        <td>31/05/2017</td>
                                        <td><span class="badge bg-warning">Coming soon</span></td>
                                        <td>Coderthemes</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div> 
                </div>
            </div><!-- end col -->

            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mt-0 mb-3">Laporan Keuangan <small class="badge bg-info"><?= $hal; ?></small></h4>

                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Project Name</th>
                                    <th>Start Date</th>
                                    <th>Due Date</th>
                                    <th>Status</th>
                                    <th>Assign</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Adminto Admin v1</td>
                                        <td>01/01/2017</td>
                                        <td>26/04/2017</td>
                                        <td><span class="badge bg-danger">Released</span></td>
                                        <td>Coderthemes</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Adminto Frontend v1</td>
                                        <td>01/01/2017</td>
                                        <td>26/04/2017</td>
                                        <td><span class="badge bg-success">Released</span></td>
                                        <td>Adminto admin</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Adminto Admin v1.1</td>
                                        <td>01/05/2017</td>
                                        <td>10/05/2017</td>
                                        <td><span class="badge bg-pink">Pending</span></td>
                                        <td>Coderthemes</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Adminto Frontend v1.1</td>
                                        <td>01/01/2017</td>
                                        <td>31/05/2017</td>
                                        <td><span class="badge bg-purple">Work in Progress</span>
                                        </td>
                                        <td>Adminto admin</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Adminto Admin v1.3</td>
                                        <td>01/01/2017</td>
                                        <td>31/05/2017</td>
                                        <td><span class="badge bg-warning">Coming soon</span></td>
                                        <td>Coderthemes</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div> 
                </div>
            </div><!-- end col -->
        </div>
        <!-- end row -->
    </div> <!-- container-fluid -->
</div>

<?php

            break;
        
        default:

            header("location: $base_url_admin/keluar-edit");
            die();
            exit();

            break;
    }

?>