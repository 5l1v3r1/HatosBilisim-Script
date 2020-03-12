<?php 


	## Blog Tema İçerik Fonksiyonu ##
	function blog_tema_icerik(){
	
		$d = g("d");
		Switch ($d){
			case "konu":
			if ($link = g("link")){
				
				$query = query("SELECT * FROM konular INNER JOIN kategoriler ON kategoriler.kategori_id = konular.konu_kategori INNER JOIN uyeler ON uyeler.uye_id = konular.konu_ekleyen WHERE konu_link = '$link'");
				if (mysql_affected_rows()){
				
					$row = row($query);
					$konuid = $row["konu_id"];
					$konuid2 = $row["konu_id"];
					$konu = explode("-------------------------------", $row["konu_aciklama"]);
					$konu = $konu[1];
					$sayfanumarasi = g("s") ? g("s") - 1 : 0;
					$konu = explode("-----", $konu);
					$konu = $konu[$sayfanumarasi];
					$baslik = ss($row["konu_baslik"]);
					$link = BLOG_URL."/".$row["konu_link"].".html";
					$katlink = BLOG_URL."/kategori/".$row["kategori_link"];
					$kategori = ss($row["kategori_adi"]);
					$yazar = ss($row["uye_adi"]);
					$eposta = ss($row["uye_eposta"]);
					$okunma = number_format($row["konu_hit"]);
					$tarihExplode = explode(" ", $row["konu_tarih"]);
					$tarih = $tarihExplode[0];
					$zaman = $tarihExplode[1];
					$tarih2 = explode("-", $tarih);
					$etiketler = $row["konu_etiket"];
					$sifre = $row["konu_sifre"];
					$yorumsayisi = rows(query("SELECT yorum_id FROM yorumlar WHERE yorum_konu_id = '$konuid' && yorum_onay = 1"));
					
					if (!cookie("konu_".$konuid)){
						$hitUpdate = query("UPDATE konular SET konu_hit = konu_hit + 1 WHERE konu_id = '$konuid'");
						setcookie("konu_".$konuid, "_", time()+988989);
					}
					
					
						require PATH."/konu_full.php";
					
				
				}else {
					go(BLOG_URL);
				}
				
			}else {
				go(BLOG_URL);
			}
			break;
			
			case "yazarlarimiz":
				require_once PATH."/yazarlarimiz.php";
			break;
			
			case "etiket":
			if ($etiket = g("link")){
				require_once PATH."/etiket.php";
			}else {
				go(BLOG_URL);
			}
			break;
			
			case "kategori":
			if ($link = g("link")){
				$query = query("SELECT * FROM kategoriler WHERE kategori_link = '$link'");
				if (mysql_affected_rows()){
					$row = row($query);
					$katid = $row["kategori_id"];
					$katlink = $row["kategori_link"];
					require_once PATH."/kategori.php";
				}else {
					go(BLOG_URL);
				}
			}else {
				go(BLOG_URL);
			}
			break;
			
			case "ara":
			if ($kelime = g("kelime")){
				go(BLOG_URL."/arama/".$kelime);
			}else {
				go(BLOG_URL);
			}
			break;
			
			case "arama":
			if ($kelime = g("kelime")){
				require_once PATH."/arama.php";
			}else {
				go(BLOG_URL);
			}
			break;
			
			default:
			if (!g("d")){
				require_once PATH."/default.php";
				//echo "Anasayfa";
			}else {
				go(BLOG_URL);
			}
			break;
			
		}
		
	}
	
	?>