<?php echo !defined("ADMIN") ? die("Hacking?") : null; ?>
<?php 
	$query = query("SELECT * FROM ilave_alanlar ORDER BY alan_id DESC");
	$alan = row($query);
	$id = $alan["alan_id"];
	$sessionID = session("uye_id");
	$rutbe = query("SELECT * FROM uyeler WHERE uye_id = '$sessionID'");
	$row = row($rutbe);
	$rutbeKodu = $row["uye_yazar"];
	if($rutbeKodu == 1){
?>
<article class="module width_full">
	<header><h3>İlave Alan Ekle</h3></header>
		<?php
		
			if ($_POST){
				
				$alan_adi = p("alan_adi");
				$alan_tip = p("alan_tip");
				
				if (!$alan_adi){
					echo '<h4 class="alert_error">Gerekli alanları doldurmanız gerekiyor..</h4>';
				}else {
				
					
						$insert = query("UPDATE ilave_alanlar SET
						alan_adi = '$alan_adi',
						alan_tip = '$alan_tip' WHERE alan_id = '$id'");
						
						if ($insert){
							echo '<h4 class="alert_success">Alan başarıyla güncellendi.. Yönlendiriliyorsunuz..</h4>';
							go(URL."/admin/index.php?do=ilave_alanlar", 1);
						}else {
							echo '<h4 class="alert_error">Mysql Hatası: '.mysql_Error().'</h4>';
						}
					
					
				
				}
				
			}
		
		?>
		<form action="" method="post">
			<div class="module_content">
					<fieldset>
						<label>ALAN BAŞLIĞI</label>
						<input type="text" name="alan_adi" value="<?php echo $alan["alan_adi"]; ?>" />
					</fieldset>
					<fieldset>
						<label>ALAN TİPİ</label>
						<select name="alan_tip">
							<option value="1" <?php echo $alan["alan_tip"] ? 'selected' : null; ?>>Input</option>
							<option value="2" <?php echo !$alan["alan_tip"] ? 'selected' : null; ?>>Textarea</option>
						</select>
					</fieldset>
			</div>
			<footer>
				<div class="submit_link">
					<input type="submit" value="İlave Alan Güncelle" class="alt_btn">
				</div>
			</footer>
		</form>
</article>

<div class="spacer"></div>
<?php }else{ ?>
	<h4 class="alert_info">Bu sayfayı görüntüleyemeye yetkiniz bulunmamaktadır!</h4>
<?php } ?>