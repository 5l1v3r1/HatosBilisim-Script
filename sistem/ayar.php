<?php
	
	session_start();
	if (extension_loaded('zlib')) { 
        ob_end_clean();
        ob_start('ob_gzhandler'); 
    }  
	
	## Hataları Gizle ##
	error_reporting(0);
	
	## Bağlantı Değişkenleri ##
	$host 	= "mysql.hostinger.web.tr";
	$user 	= "u867635817_osman";
	$pass 	= "holocaust32";
	$db		= "u867635817_hatos";
	
	## Mysql Bağlantısı ##
	$baglan = mysql_connect($host, $user, $pass) or die (mysql_Error());
	
	## Veritabanı Seçimi ##
	mysql_select_db($db, $baglan) or die (mysql_Error());
	
	## Karakter Sorunu ##
	mysql_query("SET CHARACTER SET 'utf8'");
	mysql_query("SET NAMES 'utf8'");
	
	## Genel Ayarları ##
	$query = mysql_query("SELECT * FROM ayarlar");
	$ayar = mysql_fetch_array($query);
	$sayfaBol = explode("|", $ayar["tema_sayfalama"]);
	
		## Sabitler ##
		define("PATH", realpath("."));
		define("URL", $ayar["site_url"]);
		define("SITE_BASLIK", $ayar["site_baslik"]);
		define("TEMA_URL", $ayar["site_url"]."/tema/".$ayar["site_tema"]);
		define("TEMA", PATH."/tema/".$ayar["site_tema"]);
		define("ANASAYFA_LIMIT", $sayfaBol[0]);
		define("KATEGORI_LIMIT", $sayfaBol[1]);
		define("ARAMA_LIMIT", $sayfaBol[2]);
		define("ETIKET_LIMIT", $sayfaBol[3]);
		define("SITE_TITLE", $ayar["site_baslik"]);
		define("SITE_DESC", $ayar["site_desc"]);
		define("SITE_KEYW", $ayar["site_keyw"]);
		define("YAPIMCI_WEB", $ayar["site_yapimci_web"]);
		define("YAPIMCI", $ayar["site_yapimci"]);
		
		## Blog Sabitler ##
		//define("BLOG_URL", $ayar["site_url"]."/blog");
		define("BLOG_URL", "http://blog.hatosbilisim.com");
		define("BLOG_TITLE", "Blog | HatOSBilisim.com");
		
		
?>