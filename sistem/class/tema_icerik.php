<?php 


	## Tema İçerik Fonksiyonu ##
	function tema_icerik(){
	
		$do = g("do");
		Switch ($do){
			
			case "kurumsal":
				require_once TEMA."/kurumsal.php";
			break;
			
			case "hizmetlerimiz":
				require_once TEMA."/hizmetlerimiz.php";
			break;
			
			case "referanslar":
				require_once TEMA."/referanslar.php";
			break;
			
			case "iletisim":
				require_once TEMA."/iletisim.php";
			break;
			
			case "blog":
				go(BLOG_URL);
			break;
			
			case "programlar":
				require_once TEMA."/programlar.php";
			break;
			
			default:
			if (!g("do")){
				require_once TEMA."/default.php";
			}else {
				go(URL);
			}
			break;
			
			case "sayfa":
			if ($link = g("link")){
				$query = query("SELECT * FROM sayfalar WHERE sayfa_link = '$link'");
				if (mysql_affected_rows()){
					$row = row($query);
					$baslik = ss($row["sayfa_baslik"]);
					$icerik = nl2br(ss($row["sayfa_icerik"]));
					require_once TEMA."/sayfa.php";
				}else {
					go(URL);
				}
			}else {
				go(URL);
			}
			break;
		}
	
	}
	
	?>