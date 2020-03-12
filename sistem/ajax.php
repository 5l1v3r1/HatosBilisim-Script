<?php
	
	define("GUVENLIK", true);
	
	require_once "ayar.php";
	require_once "fonksiyon.php";
	
	if ($_POST && $_SERVER["HTTP_X_REQUESTED_WITH"] == "XMLHttpRequest"){
	
		$tip = p("tip", true);
		$sonuc = array();
		Switch ($tip){
		
			
			case "iletisim":
			$adsoyad = p("adsoyad");
			$konu = "Önemli";
			$eposta = p("eposta");
			$telefon = p("telefon");
			$mesaj = p("mesaj");
			
			if (!$adsoyad || !$konu || !$eposta || !$mesaj){
				$sonuc["hata"] = "Eksik alanlar mevcut!";
			}else {
			
				$insert = query("INSERT INTO mesajlar SET
					mesaj_adsoyad = '$adsoyad',
					mesaj_konu = '$konu',
					mesaj_eposta = '$eposta',
					mesaj_telefon = '$telefon',
					mesaj_icerik = '$mesaj'
					");

				if($insert){
					$sonuc["ok"] = "<font color='white'>Mesajınız iletildi, mesajınız için teşekkürler.</font>";
				}else{
					$sonuc["hata"] = "<font color='black'>Bir sorun oluştu ve mesaj gönderilemedi!</font>";
				}
			
			}
			break;
		
		}
		
		echo json_encode($sonuc);
	
	}else {
		die("Hacked");
	}

?>