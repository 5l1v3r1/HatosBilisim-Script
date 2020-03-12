<?php 
	if ($_POST){
			$adsoyad = p("adsoyad", true);
			$eposta = p("eposta", true);
			$yorum = p("yorum", true);
			$konuid = p("konuid", true);
			if (session("login")){
				$adsoyad = "uye";
				$eposta = "1";
			}
			
			if (!$adsoyad || !$eposta || !$yorum || is_numeric($adsoyad)){
				$sonuc = "Lütfen boş alan bırakmayınız..";
			}else {
				
				if (session("login")){
					$adsoyad = session("uye_id");
				}
			
				/* Konu Var mı ? */
				$query = query("SELECT konu_id FROM konular WHERE konu_id = '$konuid'");
				if (mysql_affected_rows()){
					
					$insert = query("INSERT INTO yorumlar SET
					yorum_konu_id = '$konuid',
					yorum_ekleyen = '$adsoyad',
					yorum_icerik = '$yorum',
					yorum_eposta = '$eposta',
					yorum_onay = 0");
					
					if ($insert){
					
						$yorumid = mysql_insert_id();
					
						$avatar = TEMA_URL."/images/noavatar.png";
						if (session("login")){
							$adsoyad = session("uye_kadi");
							$uid = session("uye_id");
							$query = query("SELECT uye_avatar FROM uyeler WHERE uye_id = '$uid'");
							$row = row($query);
							$avatar = $row["uye_avatar"] ? URL."/upload/avatar/".$row["uye_avatar"] : TEMA_URL."/images/noavatar.png";
							go($link,2);
						}
						$sonuc = "Yorum başarıyla gönderildi. Yöneticiler tarafından onaylandığında yorumunuz gözükecektir.";
					}else {
						$sonuc = "Bir sorun oluştu ve yorumunuz eklenemedi.";
					}
					
				}else {
					$sonuc = "Geçersiz Konu ID";
				}
			}
	}		
?>