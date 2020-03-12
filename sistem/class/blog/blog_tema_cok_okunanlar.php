<?php 
	## Tema Çok Okunanlar Fonksiyonu ##
	function blog_tema_cok_okunanlar($limit = 5){
		$query = query("SELECT * FROM konular INNER JOIN alan_degerler ON alan_degerler.deger_konu_id = konular.konu_id WHERE konu_onay = 1 && deger_alan_id = 1 ORDER BY konu_hit DESC LIMIT $limit");
		if (mysql_affected_rows()){
			while ($row = row($query)){
				$konuid = $row["konu_id"];
				$link = BLOG_URL."/".$row["konu_link"].".html";
				$resim = $row["deger_icerik"];
				$baslik = ss($row["konu_baslik"]);
				$yorumsayisi = rows(query("SELECT yorum_id FROM yorumlar WHERE yorum_konu_id = '$konuid' && yorum_onay = 1"));
				$hit = number_format($row["konu_hit"]);
				require PATH."/cok_okunanlar.php";
			}
		}else {
			return false;
		}
	}
?>	