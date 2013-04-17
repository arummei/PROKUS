<?php

	if(!isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])){
		echo "<li class=\"last\"><a href=\"layanan\">Contact</a></li>";
	}else if((isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])) AND ($_SESSION['sebagai'] == 'pengurus')){
		
	}else if((isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])) AND ($_SESSION['sebagai'] == 'anggota')){
		echo "<li><a href=\"anggota\">Data Anggota</a></li>
		<li class=\"last\"><a href=\"layanan\">Pelayanan</a></li>";
	}else if((isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])) AND ($_SESSION['sebagai'] == 'kasir')){
		echo "
		<li class=\"last\"><a href=\"layanan\">Pelayanan</a></li>";
	}

?>