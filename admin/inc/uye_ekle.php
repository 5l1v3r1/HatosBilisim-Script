<?php echo !defined("ADMIN") ? die("Hacking?") : null; ?>
<?php 
	$sessionID = session("uye_id");
	$rutbe = query("SELECT * FROM uyeler WHERE uye_id = '$sessionID'");
	$row = row($rutbe);
	$rutbeKodu = $row["uye_yazar"];
	if($rutbeKodu == 1){
?>
<article class="module width_full">
	<header><h3>Üye Ekle</h3></header>
		<?php
		
			if ($_POST){
				
				$uye_kadi = p("uye_kadi");
				$uye_link = sef_link($uye_kadi);
				$uye_sifre = md5("omnyvz_".p("uye_sifre"));
				$uye_eposta = p("uye_eposta");
				$uye_avatar = p("uye_avatar");
				$uye_cinsiyet = p("uye_cinsiyet");
				$uye_hakkinda = p("uye_hakkinda");
				$uye_rutbe = p("uye_rutbe");
				$uye_yazar = p("uye_yazar");
				$uye_onay = p("uye_onay");
				$uye_face = p("uye_face");
				$uye_twitter = p("uye_twitter");
				$uye_google = p("uye_google");
				$uye_adi = p("uye_adi");
				$uye_unvan = p("uye_unvan");
				
				if (!$uye_kadi || !$uye_sifre || !$uye_eposta || !$uye_adi){
					echo '<h4 class="alert_error">Tüm alanları doldurmanız gerekiyor..</h4>';
				}else {
				
					$varmi = query("SELECT * FROM uyeler WHERE uye_link = '$uye_link'");
					if (mysql_affected_rows()){
						echo '<h4 class="alert_error"><strong>'.ss($uye_kadi).'</strong> adlı kullanıcı adı mevcut, başka bir kullanıcı adı deneyiniz.</h4>';
					}else {
					
						$insert = query("INSERT INTO uyeler SET
						uye_kadi = '$uye_kadi',
						uye_link = '$uye_link',
						uye_sifre = '$uye_sifre',
						uye_eposta = '$uye_eposta',
						uye_avatar = '$uye_avatar',
						uye_cinsiyet = '$uye_cinsiyet',
						uye_hakkinda = '$uye_hakkinda',
						uye_rutbe = '$uye_rutbe',
						uye_yazar = '$uye_yazar',
						uye_face = '$uye_face',
						uye_twitter = '$uye_twitter',
						uye_google = '$uye_google',
						uye_adi = '$uye_adi',
						uye_unvan = '$uye_unvan',
						uye_onay = '$uye_onay'");
						
						if ($insert){
							echo '<h4 class="alert_success">'.$uye_kadi.' İsimlii Üye Başarıyla Eklendi.. Yönlendiriliyorsunuz..</h4>';
							go(URL."/admin/index.php?do=uyeler", 1);
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
					<label>ÜYE ADI SOYADI</label>
					<input type="text" name="uye_adi" />
				</fieldset>
				<fieldset>
					<label>ÜYE KULLANICI ADI</label>
					<input type="text" name="uye_kadi" />
				</fieldset>
				<fieldset>
					<label>ÜYE ŞİFRE</label>
					<input type="text" name="uye_sifre" />
				</fieldset>
				<fieldset>
					<label>ÜYE E-POSTA</label>
					<input type="text" name="uye_eposta" />
				</fieldset>
				<fieldset>
					<label>ÜYE Avatar(link)</label>
					<input type="text" name="uye_avatar" />
				</fieldset>
				<fieldset>
					<label>ÜYE Cinsiyet</label>
					<select name="uye_cinsiyet">
						<option value="1" selected>Erkek</option>
						<option value="2">Kadın</option>
					</select>
				</fieldset>
				<fieldset>
					<label>Üye Hakkında</label>
					<textarea rows="5" name="uye_hakkinda"></textarea>
				</fieldset>
				<fieldset>
					<label>Üye Ünvan</label>
					<input type="text" name="uye_unvan" />
				</fieldset>
				<fieldset>
					<label>Üye Facebook Adresi</label>
					<input type="text" name="uye_face" />
				</fieldset>
				<fieldset>
					<label>Üye Twitter Adresi</label>
					<input type="text" name="uye_twitter" />
				</fieldset>
				<fieldset>
					<label>Üye Google+ Adresi</label>
					<input type="text" name="uye_google" />
				</fieldset>
				<fieldset>
					<label>ÜYE RÜTBE</label>
					<select name="uye_rutbe">
						<option value="1">Yönetici</option>
						<option value="2">Üye</option>
					</select>
				</fieldset>
				<fieldset>
					<label>ÜYE Yazar Olsun mu ?</label>
					<select name="uye_yazar">
						<option value="1">Olsun</option>
						<option value="0">Olmasın</option>
					</select>
				</fieldset>
				<fieldset>
					<label>ÜYE ONAY</label>
					<select name="uye_onay">
						<option value="1" selected>Onaylı</option>
						<option value="0">Onaylı Değil</option>
					</select>
				</fieldset>
			</div>
			<footer>
				<div class="submit_link">
					<input type="submit" value="Üye Ekle" class="alt_btn">
				</div>
			</footer>
		</form>
</article>

<div class="spacer"></div>
<?php }else{ ?>
	<h4 class="alert_info">Bu sayfayı görüntüleyemeye yetkiniz bulunmamaktadır!</h4>
<?php } ?>