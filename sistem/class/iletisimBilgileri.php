<?php
## Bilgiler ##
		
		## Telefon ##
		function telefon(){
			$query = query("SELECT * FROM bilgiler");
			
			if (mysql_affected_rows()){
				while ($row = row($query)){
					$telefon = $row["site_telefon"];
					$ayir = explode(",",$telefon);
					echo $ayir[0]."</br>".$ayir[1]."</br>".$ayir[2]."</br>".$ayir[3];
				}
			}
		} 
		function telefon2(){
			$query = query("SELECT * FROM bilgiler");
			
			if (mysql_affected_rows()){
				while ($row = row($query)){
					$telefon = $row["site_telefon"];
					$ayir = explode(",",$telefon);
					echo $ayir[0];
				}
			}
		} 
	
		## Adres ##
		function adres(){
			$query = query("SELECT * FROM bilgiler");
			
			if (mysql_affected_rows()){
				while ($row = row($query)){
					echo $row["site_adres"];
				}
			}
		} 
		
		## Mail ##
		function site_Mail(){
			$query = query("SELECT * FROM bilgiler");
			
			if (mysql_affected_rows()){
				while ($row = row($query)){
					$mail = $row["site_mail"];
					$ayir = explode(",",$mail);
					echo $ayir[0]."</br>".$ayir[1]."</br>".$ayir[2]."</br>".$ayir[3];
				}
			}
		} 
		
		## Footer ##
		function altBilgi(){
			$query = query("SELECT * FROM bilgiler");
			
			if (mysql_affected_rows()){
				while ($row = row($query)){
					echo ss($row["site_footer"]);
				}
			}
		} 
	
		## Facebook ##
		function facebookProfil(){
			$query = query("SELECT * FROM bilgiler");
			
			if (mysql_affected_rows()){
				while ($row = row($query)){
					echo $row["site_facebook"];
				}
			}
		} 
		
		## Twitter ##
		function twitterProfil(){
			$query = query("SELECT * FROM bilgiler");
			
			if (mysql_affected_rows()){
				while ($row = row($query)){
					echo $row["site_twitter"];
				}
			}
		} 
	
		## Youtube ##
		function youtubeProfil(){
			$query = query("SELECT * FROM bilgiler");
			
			if (mysql_affected_rows()){
				while ($row = row($query)){
					echo $row["site_youtube"];
				}
			}
		} 
	
		## Google ##
		function googleProfil(){
			$query = query("SELECT * FROM bilgiler");
			
			if (mysql_affected_rows()){
				while ($row = row($query)){
					echo $row["site_google"];
				}
			}
		} 
?>