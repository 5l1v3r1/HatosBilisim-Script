<?php
	
	echo !defined("ADMIN") ? die("Hacking?") : null;
	$query = query("SELECT * FROM ayarlar");
	$row = row($query);
	
	$sayfa = explode("|", $row["tema_sayfalama"]);

?>
<?php 
	$sessionID = session("uye_id");
	$rutbe = query("SELECT * FROM uyeler WHERE uye_id = '$sessionID'");
	$row2 = row($rutbe);
	$rutbeKodu = $row2["uye_yazar"];
	if($rutbeKodu == 1){
?>
<article class="module width_full">
	<header><h3>Genel Ayarlar</h3></header>
		<?php
		
			if ($_POST){
				
				$site_url = p("site_url", true);
				$site_baslik = p("site_baslik", true);
				$site_desc = p("site_desc", true);
				$site_keyw = p("site_keyw", true);
				$site_durum = p("site_durum", true);
				$site_yapimci = p("site_yapimci", true);
				$site_yapimci_web = p("site_yapimci_web", true);
				$anasayfa_limit = p("anasayfa_limit");
				$kategori_limit = p("kategori_limit");
				$arama_limit = p("arama_limit");
				$etiket_limit = p("etiket_limit");
				$tema_sayfalama = $anasayfa_limit."|".$kategori_limit."|".$arama_limit."|".$etiket_limit;
				
				if (!$site_url || !$site_baslik){
					echo '<h4 class="alert_error">Gerekli alanları doldurmanız gerekiyor..</h4>';
				}else {
				
					$update = query("UPDATE ayarlar SET
					site_url = '$site_url',
					site_baslik = '$site_baslik',
					site_desc = '$site_desc',
					site_keyw = '$site_keyw',
					site_durum = '$site_durum',
					site_yapimci = '$site_yapimci',
					site_yapimci_web = '$site_yapimci_web',
					tema_sayfalama =  '$tema_sayfalama'
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
						<label>SİTE URL</label>
						<input type="text" name="site_url" value="<?php echo $row["site_url"]; ?>" />
					</fieldset>
					<fieldset>
						<label>SİTE BAŞLIK</label>
						<input type="text" name="site_baslik" value="<?php echo ss($row["site_baslik"]); ?>" />
					</fieldset>
					<fieldset>
						<label>SİTE AÇIKLAMASI</label>
						<textarea rows="3" name="site_desc"><?php echo ss($row["site_desc"]); ?></textarea>
					</fieldset>
					<fieldset>
						<label>SİTE KEYWORDS</label>
						<textarea rows="3" name="site_keyw"><?php echo ss($row["site_keyw"]); ?></textarea>
					</fieldset>
					<fieldset> <!-- to make two field float next to one another, adjust values accordingly -->
						<label>SİTE DURUMU</label>
						<select name="site_durum">
							<option value="1" <?php echo $row["site_durum"] ? 'selected' : null; ?>>Online</option>
							<option value="0" <?php echo !$row["site_durum"] ? 'selected' : null; ?>>Offline</option>
						</select>
					</fieldset>
					<fieldset>
						<label>SİTE YAPIMCI</label>
						<input type="text" name="site_yapimci" value="<?php echo $row["site_yapimci"]; ?>" />
					</fieldset>
					<fieldset>
						<label>SİTE YAPIMCI WEB</label>
						<input type="text" name="site_yapimci_web" value="<?php echo ss($row["site_yapimci_web"]); ?>" />
					</fieldset>
					<fieldset>
						<label>ANASAYFA SAYFA LİMİT</label>
						<input type="text" name="anasayfa_limit" value="<?php echo $sayfa[0]; ?>" />
					</fieldset>
					<fieldset>
						<label>KATEGORİ SAYFA LİMİT</label>
						<input type="text" name="kategori_limit" value="<?php echo $sayfa[1]; ?>" />
					</fieldset>
					<fieldset>
						<label>ARAMA SAYFA LİMİT</label>
						<input type="text" name="arama_limit" value="<?php echo $sayfa[2]; ?>" />
					</fieldset>
					<fieldset>
						<label>ETİKET SAYFA LİMİT</label>
						<input type="text" name="etiket_limit" value="<?php echo $sayfa[3]; ?>" />
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