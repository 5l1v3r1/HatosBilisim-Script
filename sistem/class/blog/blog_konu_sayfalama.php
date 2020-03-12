<?php 
	## Tema Konu Sayfalama Fonksiyonu ##
	function blog_konu_sayfalama($konuid, $ayrac = ",", $sayfanumarasi, $link){
		$sayfanumarasi++;
		$query = query("SELECT konu_aciklama FROM konular WHERE konu_id = '$konuid'");
		if (mysql_affected_rows()){
			$row = row($query);
			$konu = explode("-------------------------------", $row["konu_aciklama"]);
			$konu = $konu[1];
			$konu = explode("-----", $konu);
			if (count($konu) > 1){
				$dizi = array();
				for ($i = 1; $i <= count($konu); $i++){
					$aktif = $sayfanumarasi == $i ? ' class="aktif"' : null;
					$dizi[] = '<li'.$aktif.'><a href="'.$link.'/'.$i.'">'.$i.'</a></li>';
				}
				echo '<div id="konuSayfalama"><ul>'.implode($ayrac, $dizi)."</ul></div>";
			}
		}else {
			echo "Geçersiz Konu ID";
		}
	}
?>