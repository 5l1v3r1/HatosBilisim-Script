<?php 
	
	## Tema BAŞLIK - DESC - KEYW Fonksiyonu ##
	function tdk(){
	
		$do = g("do");
		Switch ($do){
		
			case "kurumsal":
			$title = "Kurumsal | ".SITE_TITLE;
			$desc = ss(SITE_DESC);
			$keyw = ss(SITE_KEYW);
			$canonical = ss(URL)."/kurumsal/";
			break;
			
			case "hizmetlerimiz":
			$title = "Hizmetlerimiz | ".SITE_TITLE;
			$desc = ss(SITE_DESC);
			$keyw = ss(SITE_KEYW);
			$canonical = ss(URL)."/hizmetlerimiz/";
			break;
			
			case "referanslar":
			$title = "Referanslar | ".SITE_TITLE;
			$desc = ss(SITE_DESC);
			$keyw = ss(SITE_KEYW);
			$canonical = ss(URL)."/referanslar/";
			break;
			
			
			case "iletisim":
			$title = "İletişim | ".SITE_TITLE;
			$desc = ss(SITE_DESC);
			$keyw = ss(SITE_KEYW);
			$canonical = ss(URL)."/iletisim/";
			break
			
			;case "programlar":
			$title = "Bunlarda Bizden | ".SITE_TITLE;
			$desc = ss(SITE_DESC);
			$keyw = ss(SITE_KEYW);
			$canonical = ss(URL)."/programlar/";
			break;
			
			case "sayfa":
			if ($link = g("link")){
				$query = query("SELECT * FROM sayfalar WHERE sayfa_link = '$link'");
				if (mysql_affected_rows()){
					$row = row($query);
					
					$title = ss($row["sayfa_baslik"])." | ".SITE_TITLE;
					$desc = strip_tags(kisalt(ss($row["sayfa_icerik"]), 220));
					$keyw = implode(", ", explode(" ", $title));
					$canonical = ss(URL)."/sayfa/".ss($row["sayfa_link"]);
				}else {
					$title = "Sayfa Bulunamadı - ".SITE_TITLE;
				}
			}
			break;
			
			default:
			$title = ss(SITE_TITLE);
			$desc = ss(SITE_DESC);
			$keyw = ss(SITE_KEYW);
			$canonical = ss(URL);
			break;
			
			
		}
		
		echo '<title>'.$title.'</title>
		<meta name="description" content="'.$desc.'" />
		<meta name="keywords" content="'.$keyw.'" />
		<link rel="canonical" href="'.$canonical.'" /> 
		';
	
	}


?>