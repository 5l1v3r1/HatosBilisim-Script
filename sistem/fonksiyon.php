<?php	
	
	## POST Method ##
	function p($par, $st = false){
		if ($st){
			return htmlspecialchars(addslashes(trim($_POST[$par])));		
		}else{			
			return addslashes(trim($_POST[$par]));		
		}	
	}		
	
	## GET Method ##
	function g($par){      
		return trim(strip_tags(addslashes(mysql_real_escape_string($_GET[$par]))));
	}	
	
	## MySQL Query ##
	function query($query){		
		return mysql_query($query);	
	}		
	
	## MySQL Fetch Array ##
	function row($query){		
		return mysql_fetch_array($query);	
	}		
	
	## MySQL Num Rows ##
	function rows($query){		
		return mysql_num_rows($query);	
	}	
	
	## Kısalt #
	function kisalt($par, $uzunluk = 50){
		if (strlen($par) > $uzunluk){
			$par = mb_substr($par, 0, $uzunluk, "UTF-8")."..";		
		}		
		return $par;	
	}		
	
	## Go Header ##
	function go($par, $time = 0){
		if ($time == 0){
			header("Location: {$par}");		
		}else {
			header("Refresh: {$time}; url={$par}");		
		}	
	}		
	
	## Session ##
	function session($par){
		if ($_SESSION[$par]){
			return $_SESSION[$par];		
		}else {	
			return false;		
		}	
	}		
	
	## Cookie ##
	function cookie($par){
		if ($_COOKIE[$par]){
			return $_COOKIE[$par];		
		}else {		
			return false;		
		}	
	}	

	## stripslashes ##
	function ss($par){		
		return stripslashes($par);	
	}		
	
	## addslashes ##
	function ads($par){		
		return addslashes($par);	
	}	
	
	## Session Oluşturma ##
	function session_olustur($par){		
		foreach ($par as $anahtar => $deger){
			$_SESSION[$anahtar] = $deger;		
		}	
	}		
	
	## Sef Link ##
	function sef_link($baslik){		
		$bul = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '-');		
		$yap = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', ' ');		
		$perma = strtolower(str_replace($bul, $yap, $baslik));		
		$perma = preg_replace("@[^A-Za-z0-9\-_]@i", ' ', $perma);		
		$perma = trim(preg_replace('/\s+/',' ', $perma));		
		$perma = str_replace(' ', '-', $perma);		return $perma;	
	}		
	
	
?>