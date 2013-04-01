<div class="wrapper col1">
	<div id="header">
		<div id="logo">
			<h1><a href="home">DownTown Boutique</a></h1>
			<h2>Your fashion gallery <a href="http://twitter.com/DownTown" target="_blank">@DownTown</a></h2>
			
		</div>
		<?php
		if(!isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])){
			include "includes/login.php";
		}else{
			include "users/welcome.php";
		}
		?>
		<br class="clear" />
	</div>
</div>