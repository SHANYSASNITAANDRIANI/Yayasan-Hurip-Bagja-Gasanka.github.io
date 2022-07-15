 <div class="left-side-menu">
    <div class="h-100" data-simplebar>
        <!-- User box -->
        <div class="user-box text-center">
            <img src="<?= $base_url ?>/assets/files/images/avatar/<?= $_SESSION['_avatar__'] ?>" alt="<?= $_SESSION['_nama__'] ?>" title="Mat Helme" class="rounded-circle img-thumbnail avatar-md">
                <div class="dropdown">
                    <a href="<?= $base_url_admin ?>/#" class="user-name dropdown-toggle h5 mt-2 mb-1 d-block" data-bs-toggle="dropdown"  aria-expanded="false"><?= $_SESSION['_nama__'] ?></a>
                </div>

            <p class="text-muted left-user-info"><?= $_SESSION['_level__'] ?></p>

            <ul class="list-inline">
                <li class="list-inline-item">
                    <a href="<?= $base_url_admin ?>/pegawai/profil" class="text-muted left-user-info">
                        <i class="mdi mdi-cog"></i>
                    </a>
                </li>

                <li class="list-inline-item">
                    <a href="<?= $base_url_admin ?>/keluar-admin">
                        <i class="mdi mdi-power"></i>
                    </a>
                </li>
            </ul>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <?php if ($_SESSION['_level__']==="Administrator"): ?>
                <ul id="side-menu">
                    <li>
                        <a href="<?= $base_url_admin ?>/dashboard" class="<?php if($_GET['module']=='dashboard'){ echo 'text-light'; } ?>">
                            <i class="mdi mdi-view-dashboard-outline"></i>
                            <span> Dashboard </span>
                        </a>
                    </li>

                    <li class="menu-title bg-body mt-2">MANAJEMEN KONTEN</li>
                    <li>
                        <a href="<?= $base_url_admin ?>/page/beranda/" class="<?php if($_GET['module']=='tentang' AND $_GET['id']=='1'){ echo 'text-light'; } ?>">
                            <i class="mdi mdi-home-edit"></i>
                            <span> Beranda </span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= $base_url_admin ?>/#tentang" data-bs-toggle="collapse" class="<?php if(($_GET['module']=='tentang' AND $_GET['id']=='2') OR ($_GET['module']=='tentang' AND $_GET['id']=='3') OR ($_GET['module']=='tentang' AND $_GET['id']=='4') OR ($_GET['module']=='tentang' AND $_GET['id']=='5')){ echo 'text-light'; } ?>">
                            <i class="mdi mdi-file-account-outline"></i>
                            <span> Tentang </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="tentang">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="<?= $base_url_admin ?>/page/visi-dan-misi/" class="<?php if($_GET['module']=='tentang' AND $_GET['id']=='2'){ echo 'text-light'; } ?>">
                                        <i class="mdi mdi-arrow-right-bold"></i>
                                        <span> Visi dan Misi </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= $base_url_admin ?>/page/arti-nama-yayasan/" class="<?php if($_GET['module']=='tentang' AND $_GET['id']=='3'){ echo 'text-light'; } ?>">
                                        <i class="mdi mdi-arrow-right-bold"></i>
                                        <span> Arti Nama Yayasan </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= $base_url_admin ?>/page/struktur-pengurus/" class="<?php if($_GET['module']=='tentang' AND $_GET['id']=='4'){ echo 'text-light'; } ?>">
                                        <i class="mdi mdi-arrow-right-bold"></i>
                                        <span> Struktur Pengurus </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= $base_url_admin ?>/page/fasilitas/" class="<?php if($_GET['module']=='tentang' AND $_GET['id']=='5'){ echo 'text-light'; } ?>">
                                        <i class="mdi mdi-arrow-right-bold"></i>
                                        <span> Fasilitas </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="<?= $base_url_admin ?>/#program" data-bs-toggle="collapse" class="<?php if(($_GET['module']=='program') OR ($_GET['module']=='tentang' AND $_GET['id']=='7')){ echo 'text-light'; } ?>">
                            <i class="mdi mdi-charity"></i>
                            <span> Program </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="program">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="<?= $base_url_admin ?>/program/" class="<?php if($_GET['module']=='program'){ echo 'text-light'; } ?>">
                                        <i class="mdi mdi-arrow-right-bold"></i>
                                        <span> Daftar Program </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= $base_url_admin ?>/page/program/" class="<?php if($_GET['module']=='tentang' AND $_GET['id']=='6'){ echo 'text-light'; } ?>">
                                        <i class="mdi mdi-arrow-right-bold"></i>
                                        <span> SEO Program </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="<?= $base_url_admin ?>/#galeri" data-bs-toggle="collapse" class="<?php if(($_GET['module']=='galeri') OR ($_GET['module']=='tentang' AND $_GET['id']=='7')){ echo 'text-light'; } ?>">
                            <i class="mdi mdi-folder-multiple-image"></i>
                            <span> Galeri </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="galeri">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="<?= $base_url_admin ?>/galeri/" class="<?php if($_GET['module']=='galeri'){ echo 'text-light'; } ?>">
                                        <i class="mdi mdi-arrow-right-bold"></i>
                                        <span> Daftar Galeri </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= $base_url_admin ?>/page/galeri/" class="<?php if($_GET['module']=='tentang' AND $_GET['id']=='7'){ echo 'text-light'; } ?>">
                                        <i class="mdi mdi-arrow-right-bold"></i>
                                        <span> SEO Galeri </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="<?= $base_url_admin ?>/#kontak" data-bs-toggle="collapse" class="<?php if(($_GET['module']=='kontak') OR ($_GET['module']=='tentang' AND $_GET['id']=='8')){ echo 'text-light'; } ?>">
                            <i class="mdi mdi-card-account-phone"></i>
                            <span> Kontak </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="kontak">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="<?= $base_url_admin ?>/kontak/" class="<?php if($_GET['module']=='kontak'){ echo 'text-light'; } ?>">
                                        <i class="mdi mdi-arrow-right-bold"></i>
                                        <span> Daftar Kotak Pesan </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= $base_url_admin ?>/page/kontak/" class="<?php if($_GET['module']=='tentang' AND $_GET['id']=='8'){ echo 'text-light'; } ?>">
                                        <i class="mdi mdi-arrow-right-bold"></i>
                                        <span> SEO Kontak </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="<?= $base_url_admin ?>/#kabar" data-bs-toggle="collapse" class="<?php if(($_GET['module']=='kabar') OR ($_GET['module']=='tentang' AND $_GET['id']=='8')){ echo 'text-light'; } ?>">
                            <i class="mdi mdi-newspaper-variant-multiple-outline"></i>
                            <span> Kabar </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="kabar">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="<?= $base_url_admin ?>/kabar/" class="<?php if($_GET['module']=='kabar'){ echo 'text-light'; } ?>">
                                        <i class="mdi mdi-arrow-right-bold"></i>
                                        <span> Daftar Kabar </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= $base_url_admin ?>/page/kabar/" class="<?php if($_GET['module']=='tentang' AND $_GET['id']=='8'){ echo 'text-light'; } ?>">
                                        <i class="mdi mdi-arrow-right-bold"></i>
                                        <span> SEO Kabar </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="menu-title bg-body mt-2">FITUR WEBSITE</li>
                    <li>
                        <a href="<?= $base_url_admin ?>/pengaturan" class="<?php if($_GET['module']=='pengaturan'){ echo 'text-light'; } ?>">
                            <i class="mdi mdi-cogs"></i>
                            <span> Pengaturan Website </span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= $base_url_admin ?>/sitemap" class="<?php if($_GET['module']=='sitemap'){ echo 'text-light'; } ?>">
                            <i class="mdi mdi-sitemap"></i>
                            <span> Sitemap </span>
                        </a>
                    </li>

                    <li class="menu-title bg-body mt-2">MANAJEMEN PEGAWAI</li>
                    <li>
                        <a href="<?= $base_url_admin ?>/pegawai" class="<?php if($_GET['module']=='pegawai'){ echo 'text-light'; } ?>">
                            <i class="mdi mdi-card-account-details-star"></i>
                            <span> Data Pegawai </span>
                        </a>
                    </li>
                </ul>
            <?php endif ?>
        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>
    </div>
    <!-- Sidebar -left -->
</div>