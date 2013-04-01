<?php
	if(!isset($_GET['act'])){
		echo "Selamat Datang di ";
	}else if($_GET['act']=='home'){
		echo "Homepage | ";
	}else if($_GET['act']=='barang'){
		echo "Product | ";
	}else if($_GET['act']=='layanan'){
		echo "Contact | ";
	}else if($_GET['act']=='cari'){
		echo "Pencarian | ";
	}
?>