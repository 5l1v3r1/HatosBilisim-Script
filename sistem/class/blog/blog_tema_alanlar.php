<?php 
 ## Tema İlave Alan Fonksiyonu ##
	function ilave_alan($konuid, $alanid){
		$query = query("SELECT * FROM alan_degerler WHERE deger_konu_id = '$konuid' && deger_alan_id = '$alanid'");
		if (mysql_affected_rows()){
			$row = row($query);
			echo $row["deger_icerik"];
		}else {
			return false;
		}
	}
	
	function get_ilave($konuid, $alanid){
		$query = query("SELECT deger_id FROM alan_degerler WHERE deger_konu_id = '$konuid' && deger_alan_id = '$alanid' && deger_icerik != ''");
		if (mysql_affected_rows()){
			return true;
		}else {
			return false;
		}
	}
?>