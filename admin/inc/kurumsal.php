<?php
	
	echo !defined("ADMIN") ? die("Hacking?") : null;
	$query = query("SELECT * FROM kurumsal");
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
	<header><h3>Kurumsal</h3></header>
		<?php
		
			if ($_POST){
				
				$kurum_icerik = p("kurum_icerik", true);

				if (!$kurum_icerik){
					echo '<h4 class="alert_error">Gerekli alanları doldurmanız gerekiyor..</h4>';
				}else {
				
					$update = query("UPDATE kurumsal SET
					kurum_icerik = '$kurum_icerik'
					");
					
					if ($update){
						echo '<h4 class="alert_success">Değişiklikler başarıyla kaydedildi.. Yönlendiriliyorsunuz..</h4>';
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
						<label>Kurumsal İçerik</label>
						<textarea rows="25" name="kurum_icerik"><?php echo ss($row["kurum_icerik"]); ?></textarea>
					</fieldset>
			</div>
			<footer>
				<div class="submit_link">
					<input type="submit" value="Değişiklikleri Kaydet" class="alt_btn">
				</div>
			</footer>
		</form>
</article>

<div class="spacer"></div>
<?php }else{ ?>
	<h4 class="alert_info">Bu sayfayı görüntüleyemeye yetkiniz bulunmamaktadır!</h4>
<?php } ?>