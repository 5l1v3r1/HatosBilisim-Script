<?php 
require_once "../sistem/ayar.php";
require_once "../sistem/fonksiyon.php";
define("ADMIN", true);

session_start();

$girilen_kod	= trim(strip_tags($_POST['security']));
$guvenlik_kodu	= trim(strip_tags($_SESSION['koruma']));


if($girilen_kod != $guvenlik_kodu)
	{
		echo 'Güvenlik Kodu Yanlýþ';
	}
	else
	{
		
		$eposta = p("eposta");
		$sifre = md5("omnyvz_".p("sifre"));
		
		if (!$eposta || !$sifre){
			echo "Kullanýcý adý ve Þifre Boþ Býrakýlamaz..";
		}else {
			$query = query("SELECT * FROM uyeler WHERE uye_eposta = '$eposta' && uye_sifre = '$sifre' && uye_rutbe = 1");
			if (mysql_affected_rows()){
			$row = row($query);
			$session = array(
						"login" => true,
						"uye_id" => $row["uye_id"],
						"uye_rutbe" => $row["uye_rutbe"],
						"uye_adi" => $row["uye_adi"],
						"uye_eposta" => $row["uye_eposta"]
							);
			session_olustur($session);
			go(URL."/admin");
			}else {
					echo "<font color='red'>Eposta veya Þifre Hatalý!</font>";
			}
		}
						//
	}
?>