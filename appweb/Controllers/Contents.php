<?php

	if($_GET['module']=='home') { 
		include("appweb/Views/home.php");
	}elseif($_GET['module']=='tentang') { 
		include("appweb/Views/about.php");
	}elseif($_GET['module']=='program') { 
		include("appweb/Views/program.php");
	}elseif($_GET['module']=='galeri') { 
		include("appweb/Views/galeri.php");
	}elseif($_GET['module']=='kontak') { 
		include("appweb/Views/kontak.php");
	}elseif($_GET['module']=='kabar') { 
		include("appweb/Views/kabar.php");
	}else{
		echo "<script>window.location = '404';</script>";
	}

?>