<?php 
		require_once "sistem/ayar.php"; 
		require_once "sistem/sistem.php"; 
		
		if($ayar["site_durum"] == 1){
			// Site A��k
			require(TEMA."/index.php");
		}else {
			// Site Kapal�
			echo "Site kapal�.";
		}
		
?>