<?php
error_reporting(0);
	if(isset($_POST['go'])){
		$cari =addslashes($_POST['cari']);
		if($cari==''){
			echo "<div class=\"wrapper col4\">
				<br class=\"clear\" />
				<div id=\"services\">
					<h1>harap isi data pencariannya terlebih dahulu</h1>
					<br class=\"clear\" />
				</div>
			</div>";
		}else{
			
			if(!isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])){
				$cr = preg_replace("/\s/","%",$cari);
				$jumlah = mysql_query("SELECT nama_barang FROM barang WHERE nama_barang LIKE '%$cr%'");
				$jml = mysql_num_rows($jumlah); //9
				$bagi = $jml /3; // 3
				$intbagi = (int)$bagi;// 3
				$kali = $intbagi * 3; //9
				$barang = mysql_query("SELECT * FROM barang WHERE nama_barang LIKE '%$cr%' ORDER BY id_barang DESC LIMIT $kali");
				$mulai= 1;
				$tiga = 3;
				echo "<div class=\"wrapper col4\">
					<br class=\"clear\" />
					<div id=\"services\">
						<h1>Hasil Pencarian data : $cari</h1><ul>";
							while($b = mysql_fetch_array($barang)){
								if($mulai == 1){
									echo "<li>";
								}else if($mulai == $tiga){
									echo "<li class=\"last\">";
									$tambah = $mulai + $tiga;
								}else if($mulai == $tambah){
									echo "<li class=\"last\">";
									$tambah = $mulai + $tiga;
								}else{
									echo "<li>";
								}
								echo "<div>
									<h2>$b[nama_barang]</h2>
									<p>Stok : $b[stok_barang]<br>
									Harga : $b[harga_jual]</p>";
								include "functions/isset_link.php";
								echo "</div></li>";
								$mulai++;
							}
						echo "</ul><br class=\"clear\" />
					</div>
				</div>";
			}else if((isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])) AND ($_SESSION['sebagai'] == 'pengurus')){
				$cr = preg_replace("/\s/","%",$cari);
				echo "
				<div class=\"wrapper col4\">
					<br class=\"clear\" />
					<div id=\"services\">
				<table border=\"1\" style=\"color:#000;\">
				<tr style=\"background:#ccc;\">
					<th width=\"15%\" style=\"border:1px solid #000;\">
						<a style=\"float:left;\" href=\"cari-order-id_barang-desc\"><img src=\"images/top.png\"/></a>ID Barang
						<a style=\"float:right;\" href=\"cari-order-id_barang-asc\"><img src=\"images/down.png\"/></a>
					</th>
					<th width=\"20%\" style=\"border:1px solid #000;\">
						<a style=\"float:left;\" href=\"cari-order-nama_barang-desc\"><img src=\"images/top.png\"/></a>Nama Barang
						<a style=\"float:right;\" href=\"cari-order-nama_barang-asc\"><img src=\"images/down.png\"/></a>
					</th>
					<th width=\"20%\" style=\"border:1px solid #000;\">
						<a style=\"float:left;\" href=\"cari-order-stok_barang-desc\"><img src=\"images/top.png\"/></a>Stok Barang
						<a style=\"float:right;\" href=\"cari-order-stok_barang-asc\"><img src=\"images/down.png\"/></a>
					</th>
					<th width=\"15%\" style=\"border:1px solid #000;\">
						<a style=\"float:left;\" href=\"cari-order-harga_jual-desc\"><img src=\"images/top.png\"/></a>Harga
						<a style=\"float:right;\" href=\"cari-order-harga_jual-asc\"><img src=\"images/down.png\"/></a>
					</th>
					<th width=\"30%\" style=\"border:1px solid #000;\">Proses</th>
				</tr>";
					if(!isset($_GET['order'])){
						$barang = mysql_query("SELECT * FROM barang WHERE nama_barang LIKE '%$cr%'");
					}else{
						$order = addslashes($_GET['order']);
						$sort = addslashes($_GET['sort']);
						$barang = mysql_query("SELECT * FROM barang WHERE nama_barang LIKE '%$cr%' ORDER BY $order $sort");
					}
					$mulai=1;
					while($b = mysql_fetch_array($barang)){
						if($mulai%2==0){echo "<tr class=\"dark\">";}else{echo "<tr class=\"light\">";}
						echo "<td style=\"border:1px solid #000;\">$b[id_barang]</td>
						<td style=\"border:1px solid #000;\">$b[nama_barang]</td>
						<td style=\"text-align:center;border:1px solid #000;\">$b[stok_barang]</td>
						<td style=\"text-align:center;border:1px solid #000;\">Rp. $b[harga_jual] ,-</td>
						<td style=\"text-align:center;border:1px solid #000;\">
						<a href=\"barang-$b[id_barang]-edit\">Edit</a> | 
						<a href=\"barang-$b[id_barang]-hapus\">Hapus</a> 
						
						</td></tr>";
						$mulai++;
					}
				echo "</table>
			<br class=\"clear\" />
			<br class=\"clear\" />
	</div>
</div>";}
		}
	}
?>