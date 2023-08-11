<?php 
	if(isset($_GET['menu'])){
		$menu=$_GET['menu'];
		if($menu=='penghuni'){
			include "tujuan/penghuni.php";
		}elseif ($menu=='trans') {
			include "tujuan/trans.php";
		}elseif ($menu=='kamar') {
			include "tujuan/kamar.php";
		}elseif ($menu=='home') {
			include "tujuan/home.php";
		}elseif ($menu=='login') {
			include "login.php";
		}elseif ($menu=='edit') {
			include "tujuan/edits.php";
		}elseif ($menu=='kasir') {
			include "data/transaksi.php";
		}elseif ($menu=='kassa') {
			include "data/nota.php";
	}	
	}else{
		include "tujuan/home.php";
	}
?>

