<header class="container-fluid bg-warning">
    <div class="container px-0 px-sm-2">
        <div class="row justify-content-between py-2">
            <div class="col-auto">
                <a target="_blank" href="<?= $linkInstagram ?>" title="Instagram Kami" class="link-success text-decoration-none m-1"><i class="fa-brands fa-instagram"></i></a>
                <a target="_blank" href="<?= $linkFacebook ?>" title="Facebook Kami" class="link-success text-decoration-none m-1"><i class="fa-brands fa-facebook"></i></a>
                <a href="mailto:<?= $email ?>" title="Email Kami" class="link-success text-decoration-none m-1"><i class="fa-solid fa-envelope"></i></a>
            </div>

            <div class="col-auto">
                <a href="tel:<?= $nomorTelpSms ?>" title="Nomor Telpon Kami" class="link-success text-decoration-none small m-1"><i class="fa-solid fa-phone"></i> <span class="d-none d-lg-inline-block text-dark"><?= $nomorTelpSms ?></span></a>
                <a title="Lokasi Kami" class="link-success text-decoration-none small m-1"><i class="fa-solid fa-location-dot"></i> <span class="d-none d-lg-inline-block text-dark"><?= $alamat ?></span></a>
            </div>
        </div>
    </div>
</header>

<nav id="navbar_top" class="container-fluid navbar navbar-expand-lg navbar-light shadow-sm">
    <div class="container px-0 px-sm-2">
        <a class="navbar-brand" href="">
            <img src="<?= $base_url; ?>/assets/files/images/<?= $logoMobile ?>" title="<?= $judulLogoMobile; ?>" alt="Gambar <?= $judulLogoMobile; ?>" id="navbar_brand" class="navbar-brand-100">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <hr class="border border-warning d-block d-lg-none">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-uppercase <?php if($_GET['module']=='home'){ echo 'active'; } ?>" aria-current="page" href="<?= $base_url ?>" title="Beranda">
                        Beranda
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link text-uppercase text-uppercase dropdown-toggle <?php if(($_GET['module']=='tentang' AND $_GET['id']=='2') OR ($_GET['module']=='tentang' AND $_GET['id']=='3') OR ($_GET['module']=='tentang' AND $_GET['id']=='4') OR ($_GET['module']=='tentang' AND $_GET['id']=='5')){ echo 'active'; } ?>" role="button" title="DAFTAR HARGA" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Tentang
                    </a>
                    <ul class="dropdown-menu bg-warning fade-up shadow navbar-nav-scroll overflow-auto" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item text-uppercase <?php if($_GET['module']=='tentang' AND $_GET['id']=='2'){ echo 'active'; } ?>" href="visi-dan-misi/">Visi dan Misi</a>
                        </li>
                        <li>
                            <a class="dropdown-item text-uppercase <?php if($_GET['module']=='tentang' AND $_GET['id']=='3'){ echo 'active'; } ?>" href="arti-nama-yayasan/">Arti Nama Yayasan</a>
                        </li>
                        <li>
                            <a class="dropdown-item text-uppercase <?php if($_GET['module']=='tentang' AND $_GET['id']=='4'){ echo 'active'; } ?>" href="struktur-pengurus/">Struktur Pengurus</a>
                        </li>
                        <li>
                            <a class="dropdown-item text-uppercase <?php if($_GET['module']=='tentang' AND $_GET['id']=='5'){ echo 'active'; } ?>" href="fasilitas/">Fasilitas</a>
                        </li>
                    </ul>
                </li>
                 <li class="nav-item dropdown">
                    <a class="nav-link text-uppercase text-uppercase dropdown-toggle <?php if($_GET['module']=='program'){ echo 'active'; } ?>" role="button" title="Programs" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Programs
                    </a>
                    <ul class="dropdown-menu bg-warning fade-up shadow navbar-nav-scroll overflow-auto" aria-labelledby="navbarDropdown">
                        <?php
                            $no=1;
                            $query = $pdo->query("
                                    SELECT id_program, judul, slug
                                    FROM program
                                    ORDER BY no_urut ASC");
                            while($result = $query->fetch(PDO::FETCH_ASSOC)){
                                
                        ?>
                        <li>
                            <a class="dropdown-item text-uppercase <?php if($_GET['module']=='program' AND $_GET['slug']==$result['slug']){ echo 'active'; } ?>" href="<?= $base_url ?>/program/<?= $result['slug'] ?>"><?= $result['judul'] ?></a>
                        </li>
                        <?php } ?>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link text-uppercase text-uppercase dropdown-toggle <?php if($_GET['module']=='galeri'){ echo 'active'; } ?>" role="button" title="DAFTAR HARGA" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Galeri
                    </a>
                    <ul class="dropdown-menu bg-warning fade-up shadow navbar-nav-scroll overflow-auto" aria-labelledby="navbarDropdown">
                        <?php
                            $no=1;
                            $query2 = $pdo->query("
                                    SELECT id_galeri_judul, judul, slug
                                    FROM galeri_judul
                                    ORDER BY no_urut ASC");
                            while($result2 = $query2->fetch(PDO::FETCH_ASSOC)){
                                
                        ?>
                        <li>
                            <a class="dropdown-item text-uppercase <?php if($_GET['module']=='galeri' AND $_GET['slug']==$result2['slug']){ echo 'active'; } ?>" href="<?= $base_url ?>/galeri/<?= $result2['slug'] ?>"><?= $result2['judul'] ?></a>
                        </li>
                        <?php } ?>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase <?php if($_GET['module']=='kontak'){ echo 'active'; } ?>" href="kontak/" title="Kontak">Kontak</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase <?php if($_GET['module']=='kabar'){ echo 'active'; } ?>" href="kabar/" title="Kabar">Kabar</a>
                </li>
            </ul>
        </div>
    </div>
</nav>