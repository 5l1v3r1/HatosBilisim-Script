<?php 
	## Konu Yorumları Fonksiyonu ##
	function blog_konu_yorumlar($konuid){
	
		$query = query("SELECT * FROM yorumlar WHERE yorum_konu_id = '$konuid' && yorum_onay = 1");
		if (mysql_affected_rows()){
			while ($row = row($query)){
				if (is_numeric($row["yorum_ekleyen"])){
					$uyeQuery = query("SELECT uye_kadi, uye_avatar, uye_link, uye_adi FROM uyeler WHERE uye_id = '".$row["yorum_ekleyen"]."'");
					$uyeRow = row($uyeQuery);
					$avatar = $uyeRow["uye_avatar"] ? URL."/upload/avatar/".$uyeRow["uye_avatar"] : URL."/images/noavatar.png";
					
				}else {
					
					$avatar = URL."/upload/avatar/noavatar.png";
					$uyelink = "mailto:".$row["yorum_eposta"];
				}
				
				if(!is_numeric(ss($uyeRow["yorum_ekleyen"]))){
					$yazan = $row["yorum_ekleyen"];
				}else{
						$yazan = $uyeRow["uye_adi"];
				}
				$yorum = $row["yorum_icerik"];
				$yorumtarih = explode(" ",$row["yorum_tarih"]);
				$tarih = $yorumtarih[0];
				require PATH."/yorum.php";
			}
		}else {
			echo "Henüz kimse yorum yapmamış.";
		}
	
	}
?>