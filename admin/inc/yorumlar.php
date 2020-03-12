<?php echo !defined("ADMIN") ? die("Hacking?") : null; ?>
<article  class="module width_3_quarter" style="padding-bottom: 20px; width: 95%">
<header>
<h3 class="tabs_involved">
YORUM LİSTESİ
</h3></header>
<div class="tab_container">
	
	<?php
	$sayfa = g("s") ? g("s") : 1;
	$ksayisi = rows(query("SELECT yorum_id FROM yorumlar WHERE yorum_onay = 1"));
	$limit = 10;
	$ssayisi = ceil($ksayisi/$limit);
	$baslangic = ($sayfa * $limit) - $limit;
	$query = query("SELECT * FROM yorumlar INNER JOIN konular ON konular.konu_id = yorumlar.yorum_konu_id WHERE yorum_onay = 1 ORDER BY yorum_id DESC LIMIT $baslangic, $limit");
	if (mysql_affected_rows()){
	?>
	
	<form action="" method="post">
	<div id="tab1" class="tab_content">
	<table class="tablesorter" cellspacing="0"> 
	<thead> 
		<tr> 
			<th width="20px"></th> 
			<th width="40%">Yorum İçeriği</th> 
			<th width="10%">Yazan</th> 
			<th width="15%">Tarih</th> 
			<th width="20%">Konu</th> 
			<th>İşlemler</th> 
		</tr> 
	</thead> 
	<tbody> 
		<?php
			while ($row = row($query)){
			if (is_numeric($row["yorum_ekleyen"])){
				$uyeQuery = query("SELECT uye_kadi FROM uyeler WHERE uye_id = '".$row["yorum_ekleyen"]."'");
				$uyeRow = row($uyeQuery);
				$yazan = ss($uyeRow["uye_kadi"]);
			}else {
				$yazan = $row["yorum_ekleyen"];
			}
		?>
		<tr> 
			<td><input type="checkbox" name="yorumid[]" value="<?php echo $row["yorum_id"]; ?>" ></td> 
			<td><?php echo ss($row["yorum_icerik"]); ?></td> 
			<td><?php echo ss($yazan); ?></td>
			<td><?php echo $row["yorum_tarih"]; ?></td> 
			<td><a target="_blank" href="<?php echo BLOG_URL,'/',ss($row["konu_link"]),'.html';?>"><?php echo ss($row["konu_baslik"]); ?></a></td>
			<td>
				<a href="<?php echo URL; ?>/admin/index.php?do=yorum_duzenle&id=<?php echo $row["yorum_id"]; ?>" title="Düzene"><img src="images/icn_edit.png" alt=""/></a>
				<a onclick="return confirm('Yorumu Silmek İstediğinize Emin misiniz?');" style="margin-left: 10px" href="<?php echo URL; ?>/admin/index.php?do=yorum_sil&id=<?php echo $row["yorum_id"]; ?>" title="Sil"><img src="images/icn_trash.png" alt=""/></a>
			</td> 
		</tr>
		<?php } ?>
	</tbody> 
	</table>
	<?php
		if ($_POST){
			
			$yorumid = $_POST["yorumid"];
			if (p("onay")){
				
			}elseif (p("sil")){
				echo "çalışıyor";
				foreach ($yorumid as $id){
					$delete = query("DELETE FROM yorumlar WHERE yorum_id = '$id'");
				}
				echo '<h4 class="alert_success">Yorumlar başarıyla silindi..</h4>';
				go(URL."/admin/index.php?do=yorumlar",1);
			}
		
		}
	?>
	<div style="padding-top: 15px; padding-left: 15px">
		
		<button type="submit" name="sil" value="1">Seçilenleri Sil</button>
	</div>
	</form>
	<?php if ($ksayisi > $limit){ ?>
	<form action="" method="get">
		<input type="hidden" value="<?php echo g("do"); ?>" name="do" />
		<ul class="sayfala">
			<li><select name="s">
				<?php
					for ($i = 1; $i <= $ssayisi; $i++){
						echo '<option ';
						echo $i == $sayfa ? 'selected ' : null;
						echo 'value="'.$i.'">'.$i.'. Sayfa</option>';
					}
				?>
			</select></li>
			<li><button type="submit">GÖSTER</button></li>
		</ul>
		
	</form>
	<?php } ?>
	
	</div>
	
	<?php }else { ?>
	<h4 class="alert_warning">Siteye henüz hiç yorum eklenememiş.</h4>
	<?php } ?>
	
</div>
</article>