<?php echo !defined("ADMIN") ? die("Hacking?") : null; ?>
<?php

	$id = g("id");
	$query = query("SELECT * FROM sayfalar WHERE sayfa_id = '$id'");
	if (mysql_affected_rows() < 1){
		go(URL."/admin");
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
	<header><h3>Sayfa Düzenle</h3></header>
		<?php
		
			if ($_POST){
				
				$sayfa_baslik = p("sayfa_baslik");
				$sayfa_link = sef_link($sayfa_baslik);
				$sayfa_icerik = p("sayfa_icerik");
				
				if (!$sayfa_baslik){
					echo '<h4 class="alert_error">Bir sayfa adı girmelisiniz..</h4>';
				}else {
				
					$query = query("SELECT sayfa_id FROM sayfalar WHERE sayfa_link = '$sayfa_link' && sayfa_id != '$id'");
					if (mysql_affected_rows()){
						echo '<h4 class="alert_error">Böyle bir sayfa bulunuyor, başka bir isim deneyin..</h4>';
					}else {
					
						$update = query("UPDATE sayfalar SET
						sayfa_baslik = '$sayfa_baslik',
						sayfa_link = '$sayfa_link',
						sayfa_icerik = '$sayfa_icerik'
						WHERE sayfa_id = '$id'");
						
						if ($update){
							echo '<h4 class="alert_success">Sayfa başarıyla güncellendi.. Yönlendiriliyorsunuz..</h4>';
							go(URL."/admin/index.php?do=sabit_sayfalar", 1);
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
					<label>SAYFA BAŞLIĞI</label>
					<input type="text" name="sayfa_baslik" value="<?php echo ss($row["sayfa_baslik"]); ?>" />
				</fieldset>
				<fieldset>
					<label>SAYFA İÇERİĞİ</label>
					<textarea rows="50" name="sayfa_icerik"><?php echo ss($row["sayfa_icerik"]); ?></textarea>
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
<?php }else{ ?>
	<h4 class="alert_info">Bu sayfayı görüntüleyemeye yetkiniz bulunmamaktadır!</h4>
<?php } ?>