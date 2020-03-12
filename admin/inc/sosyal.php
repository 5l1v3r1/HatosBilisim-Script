<?php
	
	echo !defined("ADMIN") ? die("Hacking?") : null;
	$query = query("SELECT * FROM bilgiler");
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
	<header><h3>Sosyal Bağlantı Bilgileri</h3></header>
		<?php
		
			if ($_POST){
				
				$site_facebook = p("site_facebook", true);
				$site_twitter = p("site_twitter", true);
				$site_youtube = p("site_youtube", true);
				$site_google = p("site_google", true);
				
				if (!$site_facebook){
					echo '<h4 class="alert_error">Gerekli alanları doldurmanız gerekiyor..</h4>';
				}else {
				
					$update = query("UPDATE bilgiler SET
					site_facebook = '$site_facebook',
					site_twitter = '$site_twitter',
					site_youtube = '$site_youtube',
					site_google = '$site_google'
					");
					
					if ($update){
						echo '<h4 class="alert_success">Yeni ayarlar başarıyla kaydedildi.. Yönlendiriliyorsunuz..</h4>';
						go(URL."/admin/index.php?do=".g("do"), 1);
					}else {
						echo '<h4 class="alert_error">Mysql Hatası: '.mysql_Error().'</h4>';
					}
				
				}
				
			}
		
		?>
		<form action="" method="post">
			<div class="module_content">
					<fieldset>
						<label>Facebook Adresi</label>
						<input type="text" name="site_facebook" value="<?php echo $row["site_facebook"]; ?>" />
					</fieldset>
					<fieldset>
						<label>Twitter Adresi</label>
						<input type="text" name="site_twitter" value="<?php echo ss($row["site_twitter"]); ?>" />
					</fieldset>
					<fieldset>
						<label>Youtube Adresi</label>
						<input type="text" name="site_youtube" value="<?php echo ss($row["site_youtube"]); ?>" />
					</fieldset>
					<fieldset>
						<label>Google+ Adresi</label>
						<input type="text" name="site_google" value="<?php echo ss($row["site_google"]); ?>" />
					</fieldset>
			</div>
			<footer>
				<div class="submit_link">
					<input type="submit" value="Ayarları Güncelle" class="alt_btn">
				</div>
			</footer>
		</form>
</article>

<div class="spacer"></div>
<?php }else{ ?>
	<h4 class="alert_info">Bu sayfayı görüntüleyemeye yetkiniz bulunmamaktadır!</h4>
<?php } ?>