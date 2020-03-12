<?php echo !defined("ADMIN") ? die("Hacking?") : null; ?>
<?php

	$id = g("id");
	$query = query("SELECT * FROM mesajlar WHERE mesaj_id = '$id'");
	if (mysql_affected_rows() < 1){
		go(URL."/admin/index.php?do=mesajlar");
		exit;
	}
	
	$row = row($query);

?>
<?php 
	$sessionID = session("uye_id");
	$rutbe = query("SELECT * FROM uyeler WHERE uye_id = '$sessionID'");
	$row2 = row($rutbe);
	$rutbeKodu = $row2["uye_yazar"];
	if($rutbeKodu == 1){
?>
<article class="module width_full">
	<header><h3>Gelen Mesaj</h3></header>
	<?php
		
			if ($_POST){
				
				
				$mesaj_durumu = p("mesaj_durumu");
				
			
						$insert = query("UPDATE mesajlar SET
						mesaj_durumu = '$mesaj_durumu'
						WHERE mesaj_id = '$id'");
						
						if ($insert){
							echo '<h4 class="alert_success">Mesaj başarıyla güncellendi.. Yönlendiriliyorsunuz..</h4>';
							go(URL."/admin/index.php?do=mesajlar", 1);
						}else {
							echo '<h4 class="alert_error">Mysql Hatası: '.mysql_Error().'</h4>';
						}
				
			}
		
		?>
	<form action="" method="post">
			<div class="module_content">
				<fieldset>
					<label>Gönderen Adı Soyadı</label>
					<input type="text" value="<?php echo ss($row["mesaj_adsoyad"]) ?>" />
				</fieldset>
				<fieldset>
					<label>Konusu</label>
					<input type="text" value="<?php echo ss($row["mesaj_konu"]) ?>" />
				</fieldset>
				<fieldset>
					<label>Gönderen E-posta</label>
					<input type="text" value="<?php echo ss($row["mesaj_eposta"]) ?>" />
				</fieldset>
				<fieldset>
					<label>Gönderen Telefon</label>
					<input type="text" value="<?php echo ss($row["mesaj_telefon"]) ?>" />
				</fieldset>
				<fieldset>
					<label>Mesaj İçerik</label>
					<textarea rows="6" name="icerik"><?php echo ss($row["mesaj_icerik"]) ?></textarea>
				</fieldset>
				<fieldset>
					<label>Tarih</label>
					<input type="text" value="<?php echo ss($row["mesaj_tarih"]) ?>" />
				</fieldset>
				<fieldset>
				<label>Mesajı Okundu Olarak Seç</label>
						<select name="mesaj_durumu" >
							<option value="1" <?php echo $row["mesaj_durumu"] == 1 ? 'selected' : null; ?>>Okudum</option>
							<option value="0" <?php echo $row["mesaj_durumu"] == 0 ? 'selected' : null; ?>>Okumadım!</option>
						</select>
				</fieldset>
			</div>
			<footer>
				<div class="submit_link">
					<input type="submit" value="Mesajı Güncelle" class="alt_btn">
				</div>
			</footer>
			</form>
</article>

<div class="spacer"></div>
<?php }else{ ?>
	<h4 class="alert_info">Bu sayfayı görüntüleyemeye yetkiniz bulunmamaktadır!</h4>
<?php } ?>