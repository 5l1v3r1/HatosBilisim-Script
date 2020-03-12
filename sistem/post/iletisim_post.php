
<?php

	if (isset($_POST["gonder"])){
			$adsoyad = p("adsoyad");
			$konu = p("konu");
			$eposta = p("eposta");
			$mesaj = p("mesaj");
			$telefon = p("telefon");
			if (!$adsoyad || !$konu || !$eposta || !$mesaj){
				$sonuc["hata"] = "Eksik alanlar mevcut!";
			}else {

				$insert = query("INSERT INTO mesajlar SET
					mesaj_adsoyad = '$adsoyad',
					mesaj_konu = '$konu',
					mesaj_eposta = '$eposta',
					mesaj_icerik = '$mesaj',
					mesaj_telefon = '$telefon'
					");

				if($insert){
					echo "<font color='white'>Mesajınız iletildi, teşekkürler mesajınız için.</font>";
				}else{
					echo "<font color='red'>Bir sorun oluştu ve mesaj gönderilemedi!</font>";
				}

			}
	}

?>