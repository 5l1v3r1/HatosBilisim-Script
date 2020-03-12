<?php echo !defined("ADMIN") ? die("Hacking?") : null; ?>
<?php 
	$sessionID = session("uye_id");
	$rutbe = query("SELECT * FROM uyeler WHERE uye_id = '$sessionID'");
	$row = row($rutbe);
	$rutbeKodu = $row["uye_yazar"];
	if($rutbeKodu == 1){
?>
<article class="module width_full">
	<header><h3>Referans Ekle</h3></header>
		<?php
		
			if ($_POST){
				
				$ref_baslik = p("ref_baslik");
				$ref_resim = p("ref_resim");
				$ref_aciklama = p("ref_aciklama");
				$ref_adres = p("ref_adres");
				
				if (!$ref_baslik){
					echo '<h4 class="alert_error">Bir sayfa adı girmelisiniz..</h4>';
				}else {
				
					$query = query("SELECT ref_id FROM referanslar WHERE ref_baslik = '$ref_baslik'");
					if (mysql_affected_rows()){
						echo '<h4 class="alert_error">Böyle bir referans bulunuyor, başka bir isim deneyin..</h4>';
					}else {
					
						$insert = query("INSERT INTO referanslar SET
						ref_baslik = '$ref_baslik',
						ref_resim = '$ref_resim',
						ref_aciklama = '$ref_aciklama',
						ref_adres = '$ref_adres'
						");
						
						if ($insert){
							echo '<h4 class="alert_success">Rerefans başarıyla eklendi.. Yönlendiriliyorsunuz..</h4>';
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
					<input type="text" name="ref_baslik" />
				</fieldset>
				<fieldset>
					<label>Resmi</label>
					<input type="text" name="ref_resim" />
				</fieldset>
				<fieldset>
					<label>Adresi</label>
					<input type="text" name="ref_adres" />
				</fieldset>
				<fieldset>
					<label>Açıklama</label>
					<textarea rows="5" name="ref_aciklama"></textarea>
				</fieldset>
			</div>
			<footer>
				<div class="submit_link">
					<input type="submit" value="Referans Ekle" class="alt_btn">
				</div>
			</footer>
		</form>
</article>

<div class="spacer"></div>
<?php }else{ ?>
	<h4 class="alert_info">Bu sayfayı görüntüleyemeye yetkiniz bulunmamaktadır!</h4>
<?php } ?>