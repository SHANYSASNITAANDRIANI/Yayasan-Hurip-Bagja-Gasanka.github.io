<?php

	switch ($_SESSION['_level__']) {
		case 'Administrator':

			if($_GET['module']=='dashboard') { 
				include("appweb/Views/dashboard.php");
			}elseif($_GET['module']=='halaman') { 
				include("appweb/Views/pages.php");
			}elseif($_GET['module']=='program') { 
				include("appweb/Views/program.php");
			}elseif($_GET['module']=='galeri') { 
				include("appweb/Views/galeri.php");
			}elseif($_GET['module']=='kontak') { 
				include("appweb/Views/kontak.php");
			}elseif($_GET['module']=='kabar') { 
				include("appweb/Views/kabar.php");
			}elseif($_GET['module']=='pengaturan') { 
				include("appweb/Views/settings.php");
			}elseif($_GET['module']=='sitemap') { 
				include("appweb/Views/sitemap.php");
			}elseif($_GET['module']=='pegawai') { 
				include("appweb/Views/pegawai.php");
			}else{
				echo "<script>window.location = '404';</script>";
			}

			break;
		
		default:
		
			echo "<script>window.location = '404';</script>";

			break;
	}

?>