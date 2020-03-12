<?php echo !defined("ADMIN") ? die("Hacking?") : null; ?>
<?php 
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
				
					$query = query("SELECT alan_id FROM ilave_alanlar WHERE alan_adi = '$alan_adi'");
					if (mysql_affected_rows()){
						echo '<h4 class="alert_error">Böyle bir ilave alan var gözüküyor..</h4>';
					}else {
					
						$insert = query("INSERT INTO ilave_alanlar SET
						alan_adi = '$alan_adi',
						alan_tip = '$alan_tip'");
						
						if ($insert){
							echo '<h4 class="alert_success">Alan başarıyla eklendi.. Yönlendiriliyorsunuz..</h4>';
							go(URL."/admin/index.php?do=ilave_alanlar", 1);
						}else {
							echo '<h4 class="alert_error">Mysql Hatası: '.mysql_Error().'</h4>';
						}
					
					}
				
				}
				
			}
		
		?>
		<form action="" method="post">
			<div class="module_content">
					<fieldset>
						<label>ALAN BAŞLIĞI</label>
						<input type="text" name="alan_adi" />
					</fieldset>
					<fieldset>
						<label>ALAN TİPİ</label>
						<select name="alan_tip">
							<option value="1" selected>Input</option>
							<option value="2">Textarea</option>
						</select>
					</fieldset>
			</div>
			<footer>
				<div class="submit_link">
					<input type="submit" value="İlave Alan Ekle" class="alt_btn">
				</div>
			</footer>
		</form>
</article>

<div class="spacer"></div>
<?php }else{ ?>
	<h4 class="alert_info">Bu sayfayı görüntüleyemeye yetkiniz bulunmamaktadır!</h4>
<?php } ?>