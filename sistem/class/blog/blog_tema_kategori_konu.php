<?php 
	## Tema Kategori Konu Fonksiyonu ##
	function blog_tema_kategori_konu($katid){
	
		$sayfa = g("s") ? g("s") : 1;
		$ksayisi = rows(query("SELECT konu_id FROM konular WHERE konu_onay = 1 && konu_kategori = '$katid'"));
		if (mysql_affected_rows()){
			$limit = KATEGORI_LIMIT;
			$ssayisi = ceil($ksayisi/$limit);
			$baslangic = ($sayfa*$limit)-$limit;
			$query = query("SELECT * FROM konular INNER JOIN uyeler ON uyeler.uye_id = konular.konu_ekleyen INNER JOIN kategoriler ON kategoriler.kategori_id = konular.konu_kategori WHERE konu_onay = 1 && konu_anasayfa = 1 && konu_kategori = '$katid' ORDER BY konu_id DESC LIMIT $baslangic, $limit");
			while ($row = row($query)){
				$konuid = $row["konu_id"];
				$konu = explode("-------------------------------", $row["konu_aciklama"]);
				$konu = $konu[0];
				$baslik = ss($row["konu_baslik"]);
				$link = BLOG_URL."/".$row["konu_link"].".html";
				$katlink = BLOG_URL."/kategori/".$row["kategori_link"];
				$kategori = ss($row["kategori_adi"]);
				$yazar = $row["uye_adi"];
				$okunma = number_format($row["konu_hit"]);
				$tarihExplode = explode(" ", $row["konu_tarih"]);
				$tarih = $tarihExplode[0];
				$zaman = $tarihExplode[1];
				$yorumsayisi = rows(query("SELECT yorum_id FROM yorumlar WHERE yorum_konu_id = '$konuid' && yorum_onay = 1"));
				if ($row["blog_kategori_anasayfa_konu"]){
					require PATH."/".$row["blog_kategori_anasayfa_konu"].".php";
				}else {
					require PATH."/konu_anasayfa.php";
				}
			}
		}else {
			echo"Henüz bu kategoriye içerik eklenmemiş.";
		}
		
	}
?>