<?php
	
	echo !defined("ADMIN") ? die("Hacking?") : null;
	
	$id = g("id");
	$query = query("SELECT * FROM yorumlar WHERE yorum_id = '$id'");
	if (mysql_affected_rows() < 1){
		go(URL."/admin");
		exit;
	}
	
	$row = row($query);
	
?>
<?php
			
			if (is_numeric($row["yorum_ekleyen"])){
				$uyeQuery = query("SELECT uye_kadi FROM uyeler WHERE uye_id = '".$row["yorum_ekleyen"]."'");
				$uyeRow = row($uyeQuery);
				$yazan = ss($uyeRow["uye_kadi"]);
			}else {
				$yazan = $row["yorum_ekleyen"];
			}
		?>
<article class="module width_full">
	<header><h3>Yorum Düzenle</h3></header>
		<?php
		
			if ($_POST){
				
				$yorum_icerik = p("yorum_icerik", true);
				$yorum_onay = p("yorum_onay", true);
				
				if (!$yorum_icerik){
					echo '<h4 class="alert_error">Gerekli alanları doldurmanız gerekiyor..</h4>';
				}else {
				
					$update = query("UPDATE yorumlar SET
					yorum_icerik = '$yorum_icerik',
					yorum_onay = '$yorum_onay'
					WHERE yorum_id = '$id'");
					
					if ($update){
						echo '<h4 class="alert_success">Yorum başarıyla güncellendi.. Yönlendiriliyorsunuz..</h4>';
						go(URL."/admin/index.php?do=yorumlar", 1);
					}else {
						echo '<h4 class="alert_error">Mysql Hatası: '.mysql_Error().'</h4>';
					}
				
				}
				
			}
		
		?>
		<form action="" method="post">
			<div class="module_content">
					<fieldset>
						<label>Yorum Yapan</label>
						<input type="text" name="uye_adi" value="<?php echo ss($yazan); ?>" />
					</fieldset>
					<fieldset>
						<label>YORUM İÇERİK</label>
						<textarea rows="3" name="yorum_icerik"><?php echo ss($row["yorum_icerik"]); ?></textarea>
					</fieldset>
					<fieldset>
						<label>Yorum Tarihi</label>
						<input type="text" name="uye_adi" value="<?php echo $row["yorum_tarih"]; ?>" />
					</fieldset>
					<fieldset>
						<label>YORUM ONAY</label>
						<select name="yorum_onay">
							<option value="1" <?php echo $row["yorum_onay"] == 1 ? 'selected' : null; ?>>Onaylı</option>
							<option value="0" <?php echo $row["yorum_onay"] == 0 ? 'selected' : null; ?>>Onaylı Değil</option>
						</select>
					</fieldset>
			</div>
			<footer>
				<div class="submit_link">
					<input type="submit" value="Düzenlemeyi Bitir" class="alt_btn">
				</div>
			</footer>
		</form>
</article>

<div class="spacer"></div>