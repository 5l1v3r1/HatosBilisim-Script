<?php echo !defined("ADMIN") ? die("Hacking?") : null; ?>
<article  class="module width_3_quarter" style="padding-bottom: 20px; width: 95%">
<header>
<div style="float: right; font-size: 14px; font-weight: bold; padding: 6px 10px">
	<a href="<?php echo URL; ?>/admin/index.php?do=icerik_ekle">İçerik Ekle</a>
</div>
<h3 class="tabs_involved">
ONAY BEKLEYEN İÇERİKLER
</h3></header>
<div class="tab_container">
	
	<?php
	$sayfa = g("s") ? g("s") : 1;
	$ksayisi = rows(query("SELECT konu_id FROM konular WHERE konu_onay = 0"));
	$limit = 10;
	$ssayisi = ceil($ksayisi/$limit);
	$baslangic = ($sayfa * $limit) - $limit;
	$query = query("SELECT * FROM konular INNER JOIN uyeler ON uyeler.uye_id = konular.konu_ekleyen INNER JOIN kategoriler ON kategoriler.kategori_id = konular.konu_kategori WHERE konu_onay = 0 ORDER BY konu_id DESC LIMIT $baslangic, $limit");
	if (mysql_affected_rows()){
	?>
	<form action="" method="post">
	<div id="tab1" class="tab_content">
	<table class="tablesorter" cellspacing="0"> 
	<thead> 
		<tr> 
			<th width="20px"></th> 
			<th width="50%">Başlık</th> 
			<th width="10%">Ekleyen</th> 
			<th width="10%">Kategori</th> 
			<th>Tarih</th> 
			<th>İşlemler</th> 
		</tr> 
	</thead> 
	<tbody> 
		<?php
			while ($row = row($query)){
		?>
		<tr> 
			<td><input type="checkbox" name="yorumid[]" value="<?php echo $row["konu_id"]; ?>" ></td> 
			<td width="350"><a target="_blank" href="<?php echo BLOG_URL."/".ss($row["konu_link"]); ?>.html"><?php echo ss($row["konu_baslik"]); ?></a></td> 
			<td><a href="<?php echo URL; ?>/admin/index.php?do=uye_duzenle&id=<?php echo $row["uye_id"]; ?>"><?php echo ss($row["uye_kadi"]); ?></a></td> 
			<td><a href="<?php echo URL; ?>/admin/index.php?do=kategori_duzenle&id=<?php echo $row["kategori_id"]; ?>"><?php echo $row["kategori_adi"]; ?></a></td> 
			<td><?php echo $row["konu_tarih"]; ?></td> 
			<td>
				<a href="<?php echo URL; ?>/admin/index.php?do=icerik_duzenle&id=<?php echo $row["konu_id"]; ?>" title="Düzene"><img src="images/icn_edit.png" alt=""/></a>
				<a onclick="return confirm('İçeriği Silmek İstediğinize Emin misiniz?');" style="margin-left: 10px" href="<?php echo URL; ?>/admin/index.php?do=icerik_sil&id=<?php echo $row["konu_id"]; ?>" title="Sil"><img src="images/icn_trash.png" alt=""/></a>
			</td> 
		</tr>
		<?php } ?>
	</tbody> 
	</table>
	<?php
		if ($_POST){
		
			$yorumid = $_POST["yorumid"];
			if (p("onay")){
				foreach ($yorumid as $id){
					$update = query("UPDATE konular SET 
					konu_onay = 1
					WHERE konu_id = '$id'");
				}
				echo '<h4 class="alert_success">İçerik başarıyla onaylandı..</h4>';
				go(URL."/admin/index.php?do=icerikler",1);
			}elseif (p("sil")){
				foreach ($yorumid as $id){
					$delete = query("DELETE FROM konular WHERE konu_id = '$id'");
				}
				echo '<h4 class="alert_success">İçerik başarıyla silindi..</h4>';
				go(URL."/admin/index.php?do=onay_bekleyen_icerikler",1);
			}
		
		}
	?>
	<div style="padding-top: 15px; padding-left: 15px">
		<button type="submit" name="onay" value="1">Seçilenleri Onayla</button>
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
	<h4 class="alert_info">Onay bekleyen içerik bulunmuyor.</h4>
	<?php } ?>
	
</div>
</article>