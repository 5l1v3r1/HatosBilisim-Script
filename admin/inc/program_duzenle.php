<?php echo !defined("ADMIN") ? die("Hacking?") : null; ?>
<?php

	$id = g("id");
	$query = query("SELECT * FROM programlar WHERE prog_id = '$id'");
	if (mysql_affected_rows() < 1){
		go(URL."/admin");
		exit;
	}
	
	$row = row($query);
	

?>
<article class="module width_full">
	<header><h3>Program Düzenle</h3></header>
		<?php
		
			if ($_POST){
				
				$prog_adi = p("prog_adi");
				$prog_icerik = p("prog_icerik");
				$prog_surum = p("prog_surum");
				$prog_link = p("prog_link");
				$prog_onay = p("prog_onay");
				
				if (!$prog_adi || !$prog_icerik || !$prog_surum){
					echo '<h4 class="alert_error">Gerekli alanları doldurmanız gerekiyor..</h4>';
				}else {
				
					
						$insert = query("UPDATE programlar SET
						prog_adi = '$prog_adi',
						prog_icerik = '$prog_icerik',
						prog_surum = '$prog_surum',
						prog_link = '$prog_link',
						prog_onay = '$prog_onay' WHERE prog_id = '$id'
						");
						
						if ($insert){
						
							echo '<h4 class="alert_success">Program başarıyla güncellendi.. Yönlendiriliyorsunuz..</h4>';
							go(URL."/admin/index.php?do=programlar", 1);
						}else {
							echo '<h4 class="alert_error">Mysql Hatası: '.mysql_Error().'</h4>';
						}
					
					
				
				}
				
			}
		
		?>
		<form action="" method="post">
			<div class="module_content">
					<fieldset>
						<label>Program Adı</label>
						<input type="text" name="prog_adi" value="<?php echo $row["prog_adi"]; ?>" />
					</fieldset>
					<fieldset>
						<label>Program İçerik</label>
						<textarea class="OEditor" rows="3" name="prog_icerik"><?php echo $row["prog_icerik"]; ?></textarea>
					</fieldset>
					<fieldset>
						<label>Program Sürümü</label>
						<input type="text" name="prog_surum" value="<?php echo $row["prog_surum"]; ?>"/>
					</fieldset>
					<fieldset>
						<label>Program Link</label>
						<input type="text" name="prog_link" value="<?php echo $row["prog_link"]; ?>"/>
					</fieldset>
					<fieldset>
						<label>Program Tarih</label>
						<input type="text" name="prog_tarih" value="<?php echo $row["prog_tarih"]; ?>"/>
					</fieldset>
					<fieldset>
						<label>Program ONAYI</label>
						<select name="prog_onay">
							<option value="1" <?php echo $row["prog_onay"] ? 'selected' : null; ?>>Onaylı</option>
							<option value="0" <?php echo !$row["prog_onay"] ? 'selected' : null; ?>>Onaylı Değil</option>
						</select>
					</fieldset>
			</div>
			<footer>
				<div class="submit_link">
					<input type="submit" value="Programı Güncelle" class="alt_btn">
				</div>
			</footer>
		</form>
</article>

<div class="spacer"></div>