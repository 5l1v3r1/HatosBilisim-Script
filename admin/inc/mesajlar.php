<?php echo !defined("ADMIN") ? die("Hacking?") : null; ?>
<?php 
	$sessionID = session("uye_id");
	$rutbe = query("SELECT * FROM uyeler WHERE uye_id = '$sessionID'");
	$row = row($rutbe);
	$rutbeKodu = $row["uye_yazar"];
	if($rutbeKodu == 1){
?>
<article  class="module width_3_quarter" style="padding-bottom: 20px; width: 95%">
<header>
<div style="float: right; font-size: 14px; font-weight: bold; padding: 6px 10px">
</div>
<h3 class="tabs_involved">
Mesajlar
</h3></header>
<div class="tab_container">
<?php
	$query = query("SELECT * FROM mesajlar ORDER BY mesaj_id DESC LIMIT 100");
	if (mysql_affected_rows()){
	?>
	<div id="tab1" class="tab_content">
	<table class="tablesorter" cellspacing="0"> 
	<thead> 
		<tr> 
			<th>Gönderen</th>
			<th>Mesaj</th>
			<th>Durumu</th>
			<th>Tarihi</th>
			<th>İşlemler</th> 
		</tr> 
	</thead> 
	<tbody> 
		<?php
			while ($row = row($query)){
		?>
		<tr> 
			<td><?php echo $row["mesaj_adsoyad"]; ?></td>
			<td width="400"><?php echo ss($row["mesaj_icerik"]); ?></td>
			<td>
				<?php echo $row["mesaj_durumu"] == 1 ? '<font color=green>Okunmuş</font>' : null; ?>
				<?php echo $row["mesaj_durumu"] == 0 ? '<font color=red>Okunmamış</font>' : null; ?>
			</td>
			<td><?php echo $row["mesaj_tarih"]; ?></td> 
			<td>
				<a href="<?php echo URL; ?>/admin/index.php?do=mesajlari_duzenle&id=<?php echo $row["mesaj_id"]; ?>" title="Mesajı Oku"><img src="images/icn_edit.png" alt=""/></a>
				<a onclick="return confirm('Mesajı Silmek İstediğinize Emin misiniz?');" style="margin-left: 10px" href="<?php echo URL; ?>/admin/index.php?do=mesajlari_sil&id=<?php echo $row["mesaj_id"]; ?>" title="Sil"><img src="images/icn_trash.png" alt=""/></a>
			</td> 
		</tr>
		<?php } ?>
	</tbody> 
	</table>
	</div>
	
	<?php }else { ?>
	<h4 class="alert_info">Siteye henüz hiç mesaj gönderilmemiş.</h4>
	<?php } ?>
	
</div>
</article>
<?php }else{ ?>
	<h4 class="alert_info">Bu sayfayı görüntüleyemeye yetkiniz bulunmamaktadır!</h4>
<?php } ?>