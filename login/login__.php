<?php 
	include "data/database.php";
	include "data/session.php";

	$user = $_POST[usern];
	$pss = $_POST[pss];

	if(isset($_POST[submit]))
	{
		$login = new db;
		echo $queryLogin = $login->BuatQuery("SELECT * FROM admin WHERE user='$user' && password='$pss'");
		$arrayLogin = $login->BuatArray();
		$cekJml 	= $login->MencariJumlah();

		if($cekJml > 0)
		{
			// session_start();
			// $_SESSION[user] = $user;
			// $_SESSION[pss] = $pss;			
			$cekS = new session($arrayLogin[user],$arrayLogin[password]);
			$cekS->startSession();
			echo "<meta http-equiv='refresh' content='0;url=index.php' />";
		}
		else
		{
			echo "
				<script>alert('Login Gagal');</script>
				<meta http-equiv='refresh' content='0;url=login.php' />
			";
		}
		
	}

?>