<?php 
		require_once "sistem/ayar.php"; 
		require_once "sistem/sistem.php"; 
		
		if($ayar["site_durum"] == 1){
			// Site Açýk
			require(TEMA."/index.php");
		}else {
			// Site Kapalý
			echo "Site kapalý.";
		}
		
?>