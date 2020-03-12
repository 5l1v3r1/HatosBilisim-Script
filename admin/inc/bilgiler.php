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
	<header><h3>İletişim Bilgileri</h3></header>
		<?php
		
			if ($_POST){
				
				$site_telefon = p("site_telefon", true);
				$site_adres = p("site_adres", true);
				$site_mail = p("site_mail", true);
				$site_footer = p("site_footer", true);
				
				if (!$site_telefon){
					echo '<h4 class="alert_error">Gerekli alanları doldurmanız gerekiyor..</h4>';
				}else {
				
					$update = query("UPDATE bilgiler SET
					site_telefon = '$site_telefon',
					site_adres = '$site_adres',
					site_mail = '$site_mail',
					site_footer = '$site_footer'
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
						<label>Telefon Numarası</label>
						<input type="text" name="site_telefon" value="<?php echo $row["site_telefon"]; ?>" />
					</fieldset>
					<fieldset>
						<label>Adres</label>
						<input type="text" name="site_adres" value="<?php echo ss($row["site_adres"]); ?>" />
					</fieldset>
					<fieldset>
						<label>E-Posta</label>
						<input type="text" name="site_mail" value="<?php echo ss($row["site_mail"]); ?>" />
					</fieldset>
					<fieldset>
						<label>Site Footer</label>
						<textarea rows="3" name="site_footer"><?php echo ss($row["site_footer"]); ?></textarea>
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