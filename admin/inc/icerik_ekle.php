<?php echo !defined("ADMIN") ? die("Hacking?") : null; ?>
<article class="module width_full">
	<header><h3>İçerik Ekle</h3></header>
		<?php
		
			if ($_POST){
				
				$konu_baslik = p("konu_baslik");
				$konu_link = sef_link($konu_baslik);
				$konu_kategori = p("konu_kategori");
				$konu_anasayfa_aciklama = p("konu_anasayfa_aciklama");
				$konu_full_aciklama = p("konu_full_aciklama");
				$konu_aciklama = $konu_anasayfa_aciklama."-------------------------------".$konu_full_aciklama;
				$konu_etiket = p("konu_etiket");
				$konu_onay = p("konu_onay");
				$konu_anasayfa = p("konu_anasayfa");
				$konu_ekleyen = session("uye_id");
				
				if (!$konu_baslik || !$konu_full_aciklama || !$konu_anasayfa_aciklama){
					echo '<h4 class="alert_error">Gerekli alanları doldurmanız gerekiyor..</h4>';
				}else {
				
					$varmi = query("SELECT * FROM konular WHERE konu_link = '$konu_link'");
					if (mysql_affected_rows()){
						echo '<h4 class="alert_error"><strong>'.ss($konu_baslik).'</strong> adlı konu zaten sitede bulunuyor, başka bir tane deneyin.</h4>';
					}else {
					
						$insert = query("INSERT INTO konular SET
						konu_baslik = '$konu_baslik',
						konu_link = '$konu_link',
						konu_kategori = '$konu_kategori',
						konu_aciklama = '$konu_aciklama',
						konu_etiket = '$konu_etiket',
						konu_onay = '$konu_onay',
						konu_ekleyen = '$konu_ekleyen',
						konu_anasayfa = '$konu_anasayfa'");
						
						if ($insert){
						
							$id = mysql_insert_id();
						
							$alanQuery = query("SELECT * FROM ilave_alanlar");
							if (mysql_affected_rows()){
								while ($alanRow = row($alanQuery)){
									if (p("alan_".$alanRow["alan_id"])){
										
										$deger = p("alan_".$alanRow["alan_id"]);
										$insert = query("INSERT INTO alan_degerler SET
										deger_alan_id = '".$alanRow["alan_id"]."',
										deger_icerik = '$deger',
										deger_konu_id = '$id'");
										
									}
								}
							}
							
							echo '<h4 class="alert_success">Konu başarıyla eklendi.. Yönlendiriliyorsunuz..</h4>';
							go(URL."/admin/index.php?do=icerikler", 1);
							
							
							
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
						<label>KONU BAŞLIĞI</label>
						<input type="text" name="konu_baslik" />
					</fieldset>
					<fieldset>
						<label>KONU KATEGORİSİ</label>
						<select name="konu_kategori">
							<?php
								$katQuery = query("SELECT * FROM kategoriler ORDER BY kategori_adi ASC");
								while ($katRow = row($katQuery)){
									echo '<option value="'.$katRow["kategori_id"].'">'.ss($katRow["kategori_adi"]).'</option>';
								}
							?>
						</select>
					</fieldset>
					<?php
					$alanQuery = query("SELECT * FROM ilave_alanlar");
					if (mysql_affected_rows()){
						echo '<h2>Konu Anasayfa Resmi</h2>';
						while ($alanRow = mysql_fetch_array($alanQuery)){
							if ($alanRow["alan_tip"] == 1){
								$form = '<input type="text" name="alan_'.$alanRow["alan_id"].'" />';
							}else {
								$form = '<textarea rows="5" name="alan_'.$alanRow["alan_id"].'"></textarea>';
							}
							echo '<fieldset>
								<label>İlave Alan - ('.ss($alanRow["alan_adi"]).')</label>
								'.$form.'
							</fieldset>';
						}
					}
					?>
					<fieldset>
						<label>KONU ANASAYFA AÇIKLAMASI</label>
						<textarea class="OEditor" rows="3" name="konu_anasayfa_aciklama"></textarea>
					</fieldset>
					<fieldset>
						<label>KONU FULL AÇIKLAMASI</label>
						<textarea class="OEditor" rows="<1></1>0" name="konu_full_aciklama"></textarea>
					</fieldset>
					<fieldset>
						<label>KONU ETİKETLERİ</label>
						<input type="text" name="konu_etiket" />
					</fieldset>
					<fieldset>
						<label>KONU ONAYI</label>
						<select name="konu_onay">
							<option value="1" selected>Onaylı</option>
							<option value="0">Onaylı Değil</option>
						</select>
					</fieldset>
					<fieldset>
						<label>KONU ANASAYFA GÖRÜNÜMÜ</label>
						<select name="konu_anasayfa">
							<option value="1" selected>Evet, Gözüksün</option>
							<option value="0">Hayır, Gözükmesin</option>
						</select>
					</fieldset>
			</div>
			<footer>
				<div class="submit_link">
					<input type="submit" value="Konu Ekle" class="alt_btn">
				</div>
			</footer>
		</form>
</article>

<div class="spacer"></div>