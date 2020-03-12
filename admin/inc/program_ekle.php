<?php echo !defined("ADMIN") ? die("Hacking?") : null; ?>
<article class="module width_full">
	<header><h3>Program Ekle</h3></header>
		<?php
		
			if ($_POST){
				
				$prog_adi = p("prog_adi");
				$prog_icerik = p("prog_icerik");
				$prog_surum = p("prog_surum");
				$prog_link = p("prog_link");
				$prog_onay = p("prog_onay");
				
				if (!$prog_adi || !$prog_icerik || !$prog_surum){
					echo '<h4 class="alert_error">Gerekli alanları doldurmanız gerekiyor..</h4>';
				}else {
				
					$varmi = query("SELECT * FROM programlar WHERE prog_adi = '$prog_adi'");
					if (mysql_affected_rows()){
						echo '<h4 class="alert_error"><strong>'.ss($prog_adi).'</strong> adlı program sitede bulunuyor, başka bir tane deneyin.</h4>';
					}else {
					
						$insert = query("INSERT INTO programlar SET
						prog_adi = '$prog_adi',
						prog_icerik = '$prog_icerik',
						prog_surum = '$prog_surum',
						prog_link = '$prog_link',
						prog_onay = '$prog_onay'
						");
						
						if ($insert){
						
							echo '<h4 class="alert_success">Program başarıyla eklendi.. Yönlendiriliyorsunuz..</h4>';
							go(URL."/admin/index.php?do=programlar", 1);
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
						<label>Program Adı</label>
						<input type="text" name="prog_adi" />
					</fieldset>
					<fieldset>
						<label>Program İçerik</label>
						<textarea class="OEditor" rows="3" name="prog_icerik"></textarea>
					</fieldset>
					<fieldset>
						<label>Program Sürümü</label>
						<input type="text" name="prog_surum" />
					</fieldset>
					<fieldset>
						<label>Program Link</label>
						<input type="text" name="prog_link" />
					</fieldset>
					<fieldset>
						<label>Program ONAYI</label>
						<select name="prog_onay">
							<option value="1" selected>Onaylı</option>
							<option value="0">Onaylı Değil</option>
						</select>
					</fieldset>
			</div>
			<footer>
				<div class="submit_link">
					<input type="submit" value="Program Ekle" class="alt_btn">
				</div>
			</footer>
		</form>
</article>

<div class="spacer"></div>