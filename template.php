<?php
    error_reporting(0);
    require "appweb/Config/SetWebsite.php";
    require "appweb/Config/Db.php";
    require "appweb/Config/AssetsWebsite.php";
    require "appweb/Functions/others.php";
    require "appweb/Functions/paging.php";

    if (($_GET['module']==="home") OR ($_GET['module']==="alumni") OR ($_GET['module']==="ppdb")) {
        session_start();

        if ($_SESSION['_msg__']==="Gagal") {
            $_SESSION['_alert__']   = 0;
            $_SESSION['_msg__']     = NULL;
        }elseif ($_SESSION['_msg__']==="Berhasil") {
            $_SESSION['_alert__']   = 1;
            $_SESSION['_msg__']     = NULL;
        }else{
            $_SESSION['_alert__']   = NULL;
            $_SESSION['_msg__']     = NULL;
        }
    }else{
        session_start();
        unset($_SESSION['_alert__']);
        unset($_SESSION['_msg__']);
    }
?>

<!DOCTYPE html>
<html lang="id">
<head>

    <?php require "appweb/Controllers/SEO_v6.php"; ?>

    <link rel="icon" type="image/x-icon" href="<?= $url_images; ?>/<?= $icon; ?>" />

    <link rel="stylesheet" href="<?= $base_url; ?>/assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?= $base_url; ?>/assets/css/paging.css">

    <!--Plugins -->
    <style>@import url('https://fonts.googleapis.com/css2?family=Nunito+Sans&display=swap');</style>
    <link href="<?= $base_url; ?>/assets/plugins/fontawesome-6.0.0/css/all.css" rel="stylesheet">
    <link href="<?= $base_url; ?>/assets/plugins/aos/dist/aos.css" rel="stylesheet">

        <!-- Slick JS Home -->
        <?php if ($_GET['module']==='home'): ?>
            <link href="<?= $base_url; ?>/assets/plugins/slick/slick.min.css" rel="stylesheet">
            <link href="<?= $base_url; ?>/assets/plugins/slick/slick-theme.min.css" rel="stylesheet">
        <?php elseif ($_GET['module']==='galeri'): ?>
            <link href="<?= $base_url_admin ?>/assets/libs/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css" />
        <?php elseif ($_GET['module']==='kabar'): ?>
            <div id="fb-root"></div>
            <script async defer crossorigin="anonymous" src="https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v10.0&appId=549893359334626&autoLogAppEvents=1" nonce="CM6hx8lh"></script>
        <?php endif ?>
        <!-- Slick JS Home -->
    <!--End Plugins -->
    <base href="<?= $base_url; ?>/">
</head>
<body>

    <div class="container-fluid px-0">
        <?php require "appweb/Models/Header.php"; ?>
        <?php require "appweb/Controllers/Contents.php"; ?>
        <?php require "appweb/Models/Footer.php"; ?>
    </div>


    <a href="javascript:" id="return-to-top"><i class="fa-solid fa-angle-up"></i></a>

    <script src="<?= $base_url; ?>/assets/js/jquery-3.6.0.min.js"></script>
    <script src="<?= $base_url; ?>/assets/js/bootstrap.bundle.js"></script>
    <script type="text/javascript">
        // Popover
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl)
        })
        // Popover

        document.addEventListener("DOMContentLoaded", function(){
            // make it as accordion for smaller screens
            if (window.innerWidth > 992) {
                document.querySelectorAll('.navbar .nav-item').forEach(function(everyitem){
                    everyitem.addEventListener('mouseover', function(e){
                        let el_link = this.querySelector('a[data-bs-toggle]');
                        if(el_link != null){
                            let nextEl = el_link.nextElementSibling;
                            el_link.classList.add('show');
                            nextEl.classList.add('show');
                        }
                    });
                    everyitem.addEventListener('mouseleave', function(e){
                        let el_link = this.querySelector('a[data-bs-toggle]');
                        if(el_link != null){
                            let nextEl = el_link.nextElementSibling;
                            el_link.classList.remove('show');
                            nextEl.classList.remove('show');
                        }
                    })
                });
            }
            // end if innerWidth
            
            window.addEventListener("scroll", function() {
                if (window.scrollY > 100) {
                    document.getElementById("navbar_top").classList.add("fixed-top", "bg-white");

                    document.getElementById("navbar_brand").classList.add("navbar-brand-65");
                    document.getElementById("navbar_brand").classList.remove("navbar-brand-100");

                    // add padding top to show content behind navbar
                    navbar_height = document.querySelector(".navbar").offsetHeight;
                    document.body.style.paddingTop = navbar_height + "px";
                } else {
                    document.getElementById("navbar_top").classList.remove("fixed-top", "bg-white");

                    document.getElementById("navbar_brand").classList.remove("navbar-brand-65");
                    document.getElementById("navbar_brand").classList.add("navbar-brand-100");

                    // remove padding top from body
                    document.body.style.paddingTop = "0";
                } 
            });
        });

        // ===== Scroll to Top ==== 
        $(window).scroll(function() {
            if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
                $('#return-to-top').fadeIn(200);    // Fade in the arrow
            } else {
                $('#return-to-top').fadeOut(200);   // Else fade out the arrow
            }
        });
        $('#return-to-top').click(function() {      // When arrow is clicked
            $('body,html').animate({
                scrollTop : 0                       // Scroll to top of body
            }, 500);
        });
        // ===== Scroll to Top ====
    </script>

    <!-- Plugins -->
        <!-- Slick JS Home -->
        <?php if ($_GET['module']==='home'): ?>
            <script src="<?= $base_url; ?>/assets/plugins/slick/slick.min.js"></script>
            <script type="text/javascript">
                $(document).ready(function(){
                    // portofolio kami
                        $('.slider').slick({
                            dots: true,
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            infinite: true,
                            arrows: true,
                            autoplay: true,
                            autoplaySpeed: 2000,
                            pauseOnHover: true
                        });
                    // portofolio kami
                });
            </script>
        <?php elseif ($_GET['module']==='galeri'): ?>
            <script src="<?= $base_url_admin; ?>/assets/libs/magnific-popup/jquery.magnific-popup.min.js"></script>
            <script src="<?= $base_url_admin; ?>/assets/js/pages/gallery.init.js"></script>
        <?php endif ?>
        <!-- Slick JS Home -->

        <script src="<?= $base_url_admin ?>/assets/libs/parsleyjs/parsley.min.js"></script>
        <script src="<?= $base_url_admin ?>/assets/js/pages/form-validation.init.js"></script>
        <script src="<?= $base_url_admin ?>/assets/libs/sweetalert2/sweetalert2.all.min.js"></script>
        <script src="<?= $base_url; ?>/assets/plugins/clipboard/clipboard.min.js"></script>
        <script type="text/javascript">
            var clipboard = new ClipboardJS('#copyLink');

            clipboard.on('success', function(e) {
                Swal.fire(
                    'Disalin!',
                    'URL telah disalin!!',
                    'success'
                )
            });
        </script>

        <?php if ($_SESSION['_alert__']===0): ?>
            <script>
                Swal.fire({ title: "GAGAL!", text: "Silahkan coba lagi!", icon: "error" });
            </script>
        <?php elseif ($_SESSION['_alert__']===1): ?>
            <script>
                Swal.fire({ title: "BERHASIL!", text: "Data anda terkirim dan telah kami terima!", icon: "success" });
            </script>
        <?php endif ?>
    <!--End Plugins -->
</body>
</html>