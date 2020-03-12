<?php

	require_once "fonksiyon.php";
	
	require_once "class/tdk.php";
	require_once "class/tema_icerik.php";
	require_once "class/iletisimBilgileri.php";
	require_once "class/tema_referanslar.php";
	require_once "class/tema_programlar.php";
	
		function xml_olustur(){
			$query = query("SELECT * FROM konular WHERE konu_onay = 1 && konu_anasayfa = 1 ORDER BY konu_id DESC LIMIT 10");
			
			echo '<?xml version="1.0" encoding="UTF-8"?>
		<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';
			
			while ($row = row($query)){
				echo '<url>
						<loc>'.BLOG_URL.'/'.$row["konu_link"].'.html</loc>
					</url>';
			}
			echo '</urlset>';
		}
	
		## Anasayfa Blog Konuları ##
		function tema_blog_konuları(){
				$query = query("SELECT * FROM konular WHERE konu_onay = 1 && konu_anasayfa = 1 ORDER BY konu_id DESC LIMIT 10");
				while ($row = row($query)){
					
					$baslik = ss($row["konu_baslik"]);
					$link = BLOG_URL."/".$row["konu_link"].".html";
					echo 
						'<ul>
							<li>
								<a href="'.$link.'" title='.$baslik.'>'.$baslik.'</a>
							</li>
						</ul>	
						';
				}
				
		}
		
		## Kurumsal ##
		function tema_kurumsal_icerik(){
			$query = query("SELECT * FROM kurumsal");
			$row = row($query);
			$konu= nl2br(ss($row["kurum_icerik"]));
			if(mysql_affected_rows()){
				echo '<p class="contentText">'.$konu.'</p>';
			}
		}
		
		## Ekibimiz ##
		function ekibimiz(){
			$query = query("SELECT * FROM uyeler WHERE uye_rutbe = 1 ORDER BY uye_id ASC");
			if(mysql_affected_rows()){
				while($row = row($query)){
					$uye_adi = ss($row["uye_adi"]);
					$uye_hakkinda = ss($row["uye_hakkinda"]);
					$uye_unvan = ss($row["uye_unvan"]);
					$uye_avatar = ss($row["uye_avatar"]);
					$face = ss($row["uye_face"]);
					$twitter = ss($row["uye_twitter"]);
					$google = ss($row["uye_google"]);
					
					echo '
					<ul>
						<li title="'.$uye_adi.'">
							<img src="'.$uye_avatar.'" alt="'.$uye_adi.'" width="170" height="170"/>
							<span>'.$uye_adi.'</span><br>
							<b>'.$uye_unvan.'</b><br>
							<p>'.$uye_hakkinda.'</p><br>
							<a href="'.$face.'" target="_blank" title="Facebook"><img src="'.TEMA_URL.'/assets/images/facebookAktif.png" alt="facebook" width="25" height="25" /></a>
							<a href="'.$twitter.'" target="_blank" title="Twitter"><img src="'.TEMA_URL.'/assets/images/twitterAktif.png" alt="twitter" width="25" height="25" /></a>
							<a href="'.$google.'" target="_blank" title="Google+"><img src="'.TEMA_URL.'/assets/images/googleAktif.png" alt="google+" width="25" height="25" /></a>
						</li>
					</ul>
					';
				}
			}
		}
		
		## Referans Resimleri ##
		function referansResimleri(){
			$query = query("SELECT * FROM referanslar");
			if(mysql_affected_rows()){
				while($row = row($query)){
					$resim = $row["ref_resim"];
					$adress = $row["ref_adres"];
					echo '<li><a rel="nofollow" target="_blank" href="'.$adress.'"><img src="'.$resim.'" alt="" height="219" width="340" /></a></li>';
				}
			}
		}

	## Blog Class ##
	require_once "class/blog/blog_tema_icerik.php";
	require_once "class/blog/blog_tema_kategoriler.php";
	require_once "class/blog/blog_tema_anasayfa_konu.php";
	require_once "class/blog/blog_tema_alanlar.php";
	require_once "class/blog/blog_tema_kategori_konu.php";
	require_once "class/blog/blog_tema_sayfalama.php";
	require_once "class/blog/blog_tema_arama_konu.php";
	require_once "class/blog/blog_tema_etiket_konu.php";
	require_once "class/blog/blog_konu_etiketler.php";
	require_once "class/blog/blog_konu_etiketler.php";
	require_once "class/blog/blog_etiket_bulutu.php";
	require_once "class/blog/blog_tema_cok_okunanlar.php";
	require_once "class/blog/blog_konu_sayfalama.php";
	require_once "class/blog/blog_konu_yorumlar.php";
	require_once "class/blog/blog_tdk.php";

	
?>