<div class="wrapper col4">
	<br class="clear" />
	<div id="services">
			<?php
			error_reporting(0);
			if(!isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])){
				$stok = mysql_query("SELECT id_barang FROM barang");
				$stok = mysql_num_rows($stok); //9
				$bagi = $stok /3; // 3
				$intbagi = (int)$bagi;// 3
				$kali = $intbagi * 3; //9
				
				$barang = mysql_query("SELECT * FROM barang ORDER BY id_barang DESC LIMIT $kali") ;
				$mulai= 1;
				$tiga = 3;
				echo "<ul>";
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
				echo "</ul>";
			}else if((isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])) AND ($_SESSION['sebagai'] == 'pengurus')){
				if(!isset($_GET['proses'])){
					echo "
					<table border=\"1\" style=\"color:#000;\">
					<tr style=\"background:#ccc;\">
						<th width=\"15%\" style=\"border:1px solid #000;\">
							<a style=\"float:left;\" href=\"barang-order-id_barang-desc\"><img src=\"images/top.png\"/></a>ID Barang
							<a style=\"float:right;\" href=\"barang-order-id_barang-asc\"><img src=\"images/down.png\"/></a>
						</th>
						<th width=\"20%\" style=\"border:1px solid #000;\">
							<a style=\"float:left;\" href=\"barang-order-nama_barang-desc\"><img src=\"images/top.png\"/></a>Nama Barang
							<a style=\"float:right;\" href=\"barang-order-nama_barang-asc\"><img src=\"images/down.png\"/></a>
						</th>
						<th width=\"20%\" style=\"border:1px solid #000;\">
							<a style=\"float:left;\" href=\"barang-order-stok_barang-desc\"><img src=\"images/top.png\"/></a>Stok Barang
							<a style=\"float:right;\" href=\"barang-order-stok_barang-asc\"><img src=\"images/down.png\"/></a>
						</th>
						<th width=\"15%\" style=\"border:1px solid #000;\">
							<a style=\"float:left;\" href=\"barang-order-harga_jual-desc\"><img src=\"images/top.png\"/></a>Harga
							<a style=\"float:right;\" href=\"barang-order-harga_jual-asc\"><img src=\"images/down.png\"/></a>
						</th>
						<th width=\"30%\" style=\"border:1px solid #000;\">Proses</th>
					</tr>";
						if(!isset($_GET['order'])){
							$barang = mysql_query("SELECT * FROM barang ");
						}else{
							$order = addslashes($_GET['order']);
							$sort = addslashes($_GET['sort']);
							$barang = mysql_query("SELECT * FROM barang ORDER BY $order $sort");
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
					echo "</table>";
					?>
					<form action="users/pengurus/proses/tambah.barang.php" method="post">
					<style>.input{padding:4px;width:100%;}</style>
						<table border="1" style="color:#000;">
							<tr class='light'>
								<th colspan='2'><center><h1>Masukkan Data Barang baru</h1></center></th>
							</tr>
							<tr class='dark'>
								<td>Id Barang</td>
								<td><input class="input" type="text" name="id" /></td>
							</tr>
							<tr class='light'>
								<td>Nama Barang</td>
								<td><input class="input" type="text" name="nama"/></td>
							</tr>
							<tr class='dark'>
								<td>Stok</td>
								<td><input class="input" type="text" name="stok"/></td>
							</tr>
							<tr class='light'>
								<td>Harga Jual</td>
								<td><input class="input" type="text" name="harga"/></td>
							</tr>
							<tr class='dark'>
								<td></td>
								<td><input type="submit" name="submit" value="Tambah" /></td>
							</tr>
						</table>
					</form>
					<?php
				}else if($_GET['proses']=='edit'){
					if(!isset($_GET['id'])){
						echo "<script>document.location='barang';</script>";
					}else{
						$id= addslashes($_GET['id']);
						$barang = mysql_query("SELECT * FROM barang WHERE id_barang='$id'");
						$jbarang = mysql_num_rows($barang);
						if($jbarang == 1){
							$b = mysql_fetch_array($barang);?>
							<form action="users/pengurus/proses/edit.barang.php" method="post">
							<style>.input{padding:4px;width:100%;}</style>
								<table border="1" style="color:#000;">
									<tr class='light'>
										<th colspan='2'><center><h1>Data Barang</h1></center></th>
									</tr>
									<tr class='dark'>
										<td>Id Barang</td>
										<td><input type="hidden" name="id" value="<?php echo $b['id_barang']?>"/><?php echo $b['id_barang'];?></td>
									</tr>
									<tr class='light'>
										<td>Nama Barang</td>
										<td><input class='input' type="text" name="nama" value="<?php echo $b['nama_barang']?>"/></td>
									</tr>
									<tr class='dark'>
										<td>Stok</td>
										<td><input class='input' type="text" name="stok" value="<?php echo $b['stok_barang']?>"/></td>
									</tr>
									<tr class='light'>
										<td>Harga Jual</td>
										<td><input class='input' type="text" name="harga" value="<?php echo $b['harga_jual']?>"/></td>
									</tr>
									<tr class='dark'>
										<td></td>
										<td><input type="submit" value="Edit" /></td>
									</tr>
								</table>
							</form>
							<br>
							
							
							<?php
						}else{
							echo "<script>alert('Data tidak ditemukan');document.location='barang';</script>";
						}
					}
				}else if($_GET['proses']=='hapus'){
					if(!isset($_GET['id'])){
						echo "<script>document.location='barang';</script>";
					}else{
						$id= addslashes($_GET['id']);
						$barang = mysql_query("SELECT * FROM barang WHERE id_barang='$id'");
						$jbarang = mysql_num_rows($barang);
						if($jbarang == 1){
							$titip = mysql_query("SELECT id_barang FROM titip_barang WHERE id_barang='$id'");
							$jtitip = mysql_num_rows($titip);
							if($jtitip == 0){
								$delete = mysql_query("DELETE FROM barang WHERE id_barang='$id'");
								if($delete){
									echo "<script>alert('Data berhasil dihapus');document.location='barang';</script>";
								}else{
									echo "<script>alert('Data gagal dihapus');document.location='barang';</script>";
								}
							}else{
															}
						}else{
							echo "<script>alert('Data tidak ditemukan');document.location='barang';</script>";
						}
					}
				}
			}
			?>
			<br class="clear" />
			<br class="clear" />
	</div>
</div>
