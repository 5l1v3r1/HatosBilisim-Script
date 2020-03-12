<?php echo !defined("ADMIN") ? die("Hacking?") : null; ?>
<?php

	$id = g("id");
	$query = query("SELECT * FROM referanslar WHERE ref_id = '$id'");
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
	<header><h3>Referans Düzenle</h3></header>
		<?php
		
			if ($_POST){
				
				$ref_baslik = p("ref_baslik");
				$ref_resim = p("ref_resim");
				$ref_aciklama = p("ref_aciklama");
				$ref_adres = p("ref_adres");
				
				if (!$ref_baslik){
					echo '<h4 class="alert_error">Bir referans adı girmelisiniz..</h4>';
				}else {
				
					$query = query("SELECT ref_id FROM referanslar WHERE ref_baslik = '$ref_baslik' && ref_id != '$id'");
					if (mysql_affected_rows()){
						echo '<h4 class="alert_error">Böyle bir sayfa bulunuyor, başka bir isim deneyin..</h4>';
					}else {
					
						$update = query("UPDATE referanslar SET
						ref_baslik = '$ref_baslik',
						ref_resim = '$ref_resim',
						ref_aciklama = '$ref_aciklama',
						ref_adres = '$ref_adres'
						WHERE ref_id = '$id'");
						
						if ($update){
							echo '<h4 class="alert_success">Referans başarıyla güncellendi.. Yönlendiriliyorsunuz..</h4>';
							go(URL."/admin/index.php?do=referanslar", 1);
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
					<label>Başlığı</label>
					<input type="text" name="ref_baslik" value="<?php echo ss($row["ref_baslik"]); ?>" />
				</fieldset>
				<fieldset>
					<label>Resmi</label>
					<input type="text" name="ref_resim" value="<?php echo ss($row["ref_resim"]); ?>" />
				</fieldset>
				<fieldset>
					<label>Adresi</label>
					<input type="text" name="ref_adres" value="<?php echo ss($row["ref_adres"]); ?>" />
				</fieldset>
				<fieldset>
					<label>Açıklama</label>
					<textarea rows="5" name="ref_aciklama"><?php echo ss($row["ref_aciklama"]); ?></textarea>
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