<?php 
	## Tema Anasayfa Sayfalama ##
	function blog_tema_sayfalama($tip = "anasayfa", $id = null){
		$sayfa = g("s") ? g("s") : 1;
		if ($tip == "anasayfa"){
			$ksayisi = rows(query("SELECT konu_id FROM konular WHERE konu_onay = 1 && konu_anasayfa = 1"));
		}elseif ($tip == "kategori"){
			$ksayisi = rows(query("SELECT konu_id FROM konular WHERE konu_onay = 1 && konu_kategori = '$id'"));
		}elseif ($tip == "arama"){
			$ksayisi = rows(query("SELECT konu_id FROM konular WHERE konu_onay = 1 && konu_baslik like '%$id%'"));
		}elseif ($tip == "etiket"){
			$ksayisi = rows(query("SELECT konu_id FROM konular WHERE konu_onay = 1 && konu_etiket like '%$id%'"));
		}
		
		if ($tip == "anasayfa"){
			$limit = ANASAYFA_LIMIT;
		}elseif ($tip == "kategori"){
			$limit = KATEGORI_LIMIT;
		}elseif ($tip == "arama"){
			$limit = ARAMA_LIMIT;
		}elseif ($tip == "etiket"){
			$limit = ETIKET_LIMIT;
		}
		$ssayisi = ceil($ksayisi/$limit);
		if ($ksayisi > $limit){
		
			## Önceki Sayfa
			$oncekiSayfa = $sayfa > 1 ? $sayfa - 1 : 1;
			if ($tip == "anasayfa"){
				$onceki = BLOG_URL.'/s/'.$oncekiSayfa;
			}elseif ($tip == "kategori"){
				$onceki = BLOG_URL.'/kategori/'.g("link").'/sayfa/'.$oncekiSayfa;
			}elseif ($tip == "arama"){
				$onceki = BLOG_URL.'/arama/'.g("kelime").'/sayfa/'.$oncekiSayfa;
			}elseif ($tip == "etiket"){
				$onceki = BLOG_URL.'/etiket/'.g("link").'/sayfa/'.$oncekiSayfa;
			}
			
			## Sonraki Sayfa
			$sonrakiSayfa = $sayfa < $ssayisi ? $sayfa + 1 : $ssayisi;
			if ($tip == "anasayfa"){
				$sonraki = BLOG_URL.'/s/'.$sonrakiSayfa;
			}elseif ($tip == "kategori"){
				$sonraki = BLOG_URL.'/kategori/'.g("link").'/sayfa/'.$sonrakiSayfa;
			}elseif ($tip == "arama"){
				$sonraki = BLOG_URL.'/arama/'.g("kelime").'/sayfa/'.$sonrakiSayfa;
			}elseif ($tip == "etiket"){
				$sonraki = BLOG_URL.'/etiket/'.g("link").'/sayfa/'.$sonrakiSayfa;
			}
			
			require_once PATH."/sayfala.php";
		}
	}
?>