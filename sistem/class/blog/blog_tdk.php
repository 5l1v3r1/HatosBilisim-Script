<?php 
	
	## Tema BAŞLIK - DESC - KEYW Fonksiyonu ##
	function blog_tdk(){
	
		$d = g("d");
		Switch ($d){
			
			
			case "konu":
			if ($link = g("link")){
				
				$query = query("SELECT * FROM konular WHERE konu_link = '$link'");
				if (mysql_affected_rows()){
				
					$row = row($query);
					$konu = explode("-------------------------------", $row["konu_aciklama"]);
					$title = ss($row["konu_baslik"])." : ".BLOG_TITLE;
					$desc = strip_tags(kisalt(ss($konu[1]), 220));
					$keyw = implode(", ", explode(" ", ss($row["konu_baslik"])));
					$canonical = ss(BLOG_URL)."/".ss($row["konu_link"]).".html";
				}
				
			}
			break;
			
			case "kategori":
			if ($link = g("link")){
				$query = query("SELECT * FROM kategoriler WHERE kategori_link = '$link'");
				if (mysql_affected_rows()){
					$row = row($query);
					$title = ss($row["kategori_adi"])." Kategorisi : ".BLOG_TITLE;
					$desc = ss($row["kategori_desc"]);
					$keyw = ss($row["kategori_keyw"]);
					$canonical = ss(BLOG_URL)."/kategori/".ss($row["kategori_link"]);
				}
			}
			break;
			
			case "etiket":
			if ($etiket = g("link")){
				$title = ss($etiket)." ile İlgili Konular : ".BLOG_TITLE;
				$desc = ss($etiket)." ile İlgili Konular";
				$keyw = implode(", ", explode(" ", $kelime));
				$canonical = ss(BLOG_URL)."/etiket/".ss($etiket);

			}
			break;
			
			case "arama":
			if ($kelime = g("kelime")){
				$title = ss($kelime)." İle İlgili Arama Sonuçları : ".BLOG_TITLE;
				$desc = ss($kelime)." İle İlgili Arama Sonuçları";
				$keyw = implode(", ", explode(" ", ss($kelime)));
				$canonical = ss(BLOG_URL)."/arama/".ss($kelime);
			}
			break;
						
			case "yazarlarimiz":
			$title = "Yazarlarımız : ".BLOG_TITLE;
			$desc = ss(SITE_DESC);
			$keyw = ss(SITE_KEYW);
			$canonical = ss(BLOG_URL)."/yazarlarimiz/";
			break;
			
			default:
			$title = ss(BLOG_TITLE);
			$desc = ss(SITE_DESC);
			$keyw = ss(SITE_KEYW);
			$canonical = ss(BLOG_URL);
			break;
			
			
		}
		
		echo '<title>'.$title.'</title>
		<meta name="description" content="'.$desc.'" />
		<meta name="keywords" content="'.$keyw.'" />
		<link rel="canonical" href="'.$canonical.'" /> 
		';
	
	}


?>