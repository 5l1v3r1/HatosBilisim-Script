<?php
	## Referanslar ##
		function referanslar(){
			$query = query("SELECT * FROM referanslar");
			
			if(mysql_affected_rows()){
				while ($row = row($query)){
					$refBaslik = $row["ref_baslik"];
					$refResim = $row["ref_resim"];
					$refAciklama = $row["ref_aciklama"];
					$refAdres = $row["ref_adres"];
					
					echo '
					<ul>
						<li>
							<img class="refResim" src="'.$refResim.'" alt="'.$refBaslik.'" width="300" height="250" />
							<span class="refBaslik">'.$refBaslik.'</span><br>
							<p class="refAciklama">'.$refAciklama.'</p><br>
							<a class="refAdres" rel="nofollow" href="'.$refAdres.'" target="_blank">'.$refAdres.'</a>
						</li>
					</ul>
					';
					
				}
			}
		}
		
?>