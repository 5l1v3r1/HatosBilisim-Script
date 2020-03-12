<?php
	## Programlar ##
		function programlar(){
			$query = query("SELECT * FROM programlar WHERE prog_onay = 1 ORDER BY prog_id DESC");
			
			if(mysql_affected_rows()){
				while ($row = row($query)){
					$prog_adi = $row["prog_adi"];
					$prog_icerik = $row["prog_icerik"];
					$prog_surum = $row["prog_surum"];
					$prog_tarih = $row["prog_tarih"];
					$prog_link = $row["prog_link"];
					
					echo '
					<ul>
						<li><h2>'.$prog_adi.'</h2></li>
						<li><b>İçerik: </b>'.$prog_icerik.'</li>
						<li><b>Sürüm: </b>'.$prog_surum.'</li>
						<li><b>Tarih: </b>'.$prog_tarih.'</li>
						<li><b>İndirme: </b><a rel="nofollow" target="_blank" href="'.$prog_link.'">'.$prog_link.'</a></li>
					</ul>
					';
					
				}
			}
		}
		
?>