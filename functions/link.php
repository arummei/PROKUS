<?php
//session_start();
	//include "configurasi/conn.php";
	if(!isset($_GET['act'])){
		include "includes/intro.php";
		include "includes/contents.php";
	}else if($_GET['act']=='home'){
		include "includes/intro.php";
		include "includes/contents.php";
	}else if($_GET['act']=='barang'){
		include "includes/contents/barang.php";
	}else if($_GET['act']=='layanan'){
		include "includes/contents/contact.php";
	}else if($_GET['act']=='cari'){
		include "functions/cari.php";
	}else if($_GET['act']=='logout'){
		include "functions/logout.php";
	}
?>