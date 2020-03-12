<?php 
	## Tema Arama Konu Fonksiyonu ##
	function blog_tema_arama_konu($kelime){
	
		$sayfa = g("s") ? g("s") : 1;
		$ksayisi = rows(query("SELECT konu_id FROM konular WHERE konu_baslik like '%$kelime%' && konu_onay = 1"));
		if (mysql_affected_rows()){
			$limit = ARAMA_LIMIT;
			$ssayisi = ceil($ksayisi/$limit);
			$baslangic = ($sayfa*$limit)-$limit;
			$query = query("SELECT * FROM konular INNER JOIN uyeler ON uyeler.uye_id = konular.konu_ekleyen INNER JOIN kategoriler ON kategoriler.kategori_id = konular.konu_kategori WHERE konu_onay = 1 && konu_baslik like '%$kelime%' ORDER BY konu_id DESC LIMIT $baslangic, $limit");
			while ($row = row($query)){
				$konuid = $row["konu_id"];
				$konu = explode("-------------------------------", $row["konu_aciklama"]);
				$konu = $konu[0];
				$baslik = ss($row["konu_baslik"]);
				$link = BLOG_URL."/".$row["konu_link"].".html";
				$katlink = BLOG_URL."/kategori/".$row["kategori_link"];
				$kategori = ss($row["kategori_adi"]);
				$yazar = ss($row["uye_adi"]);
				$okunma = number_format($row["konu_hit"]);
				$tarihExplode = explode(" ", $row["konu_tarih"]);
				$tarih = $tarihExplode[0];
				$zaman = $tarihExplode[1];
				$yorumsayisi = rows(query("SELECT yorum_id FROM yorumlar WHERE yorum_konu_id = '$konuid' && yorum_onay = 1"));
				require PATH."/konu_anasayfa.php";
			}
		}else {
			echo "<strong>".ss($kelime)."</strong> aramasına ait sonuç bulunamadı.";
		}
		
	}
?>