<?php 
	## Konu Etiketler Fonksiyonu ##
	function blog_konu_etiketler($etiketler){
		$bol = explode(",", $etiketler);
		$etikets = array();
		foreach ($bol as $etiket){
			$etiket = '<a href="'.BLOG_URL.'/etiket/'.ss(trim($etiket)).'">'.ss(trim($etiket)).'</a>';
			array_push($etikets, $etiket);
		}
		echo implode(",", $etikets);
	}
?>