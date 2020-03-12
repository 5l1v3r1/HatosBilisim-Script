<?php 
	## Tema Etiket Bulutu ##
	function blog_etiket_bulutu ($ayrac = ",", $limit = 20){
		
		$dosya = md5("tema_etiketbulutu").".html";
		$cache = PATH."/cache/".$dosya;
		$sure = 3600;
		
		if (time() - $sure < filemtime($cache)){
			readfile($cache);
		}else {
			
			ob_start();
			
			$query = query("SELECT konu_etiket FROM konular WHERE konu_onay = 1 LIMIT $limit");
			if (mysql_affected_rows()){
				$etiketler = array();
				while ($row = row($query)){
					$etiket = $row["konu_etiket"];
					$etiket = explode(",", $etiket);
					foreach ($etiket as $tag){
						if (!in_array('<a href="'.BLOG_URL.'/etiket/'.trim(ss($tag)).'">'.trim(ss($tag)).'</a>', $etiketler)){
							$etiketler[] = '<a href="'.BLOG_URL.'/etiket/'.trim(ss($tag)).'">'.trim(ss($tag)).'</a>';
						}
					}
				}
				if (count($etiketler) > 0){
					echo implode($ayrac, $etiketler);
				}else {
					echo "Etiket Bulunmuyor..";
				}
			}else {
				//echo "Henüz Konu Bulunmuyor..";
			}
			
			$ac = fopen($cache, "w+");
			fwrite($ac, ob_get_contents());
			fclose($ac);
			
			ob_end_flush();
			
		}
		
	}
?>
