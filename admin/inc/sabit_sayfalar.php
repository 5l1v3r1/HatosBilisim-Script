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
	<a href="<?php echo URL; ?>/admin/index.php?do=sayfa_ekle">Sayfa Ekle</a>
</div>
<h3 class="tabs_involved">
SABİT SAYFALAR
</h3></header>
<div class="tab_container">
	
	<?php
	$query = query("SELECT * FROM sayfalar ORDER BY sayfa_id DESC");
	if (mysql_affected_rows()){
	?>
	
	<div id="tab1" class="tab_content">
	<table class="tablesorter" cellspacing="0"> 
	<thead> 
		<tr> 
			<th width="20px"></th> 
			<th width="70%">Sayfa Başlığı</th> 
			<th>Tarih</th> 
			<th>İşlemler</th> 
		</tr> 
	</thead> 
	<tbody> 
		<?php
			while ($row = row($query)){
		?>
		<tr> 
			<td><input type="checkbox"></td> 
			<td><a target="_blank" href="<?php echo URL.'/sayfa/'.ss($row["sayfa_link"]); ?>"><?php echo ss($row["sayfa_baslik"]); ?></a></td> 
			<td><?php echo $row["sayfa_tarih"]; ?></td> 
			<td>
				<a href="<?php echo URL; ?>/admin/index.php?do=sayfa_duzenle&id=<?php echo $row["sayfa_id"]; ?>" title="Düzene"><img src="images/icn_edit.png" alt=""/></a>
				<a onclick="return confirm('<?php echo $row["sayfa_baslik"];?> Sayfayı Silmek İstediğinize Emin misiniz?');" style="margin-left: 10px" href="<?php echo URL; ?>/admin/index.php?do=sayfa_sil&id=<?php echo $row["sayfa_id"]; ?>" title="Sil"><img src="images/icn_trash.png" alt=""/></a>
			</td> 
		</tr>
		<?php } ?>
	</tbody> 
	</table>
	</div>
	
	<?php }else { ?>
	<h4 class="alert_warning">Siteye henüz hiç sayfa eklenmemiş.</h4>
	<?php } ?>
	
</div>
</article>
<?php }else{ ?>
	<h4 class="alert_info">Bu sayfayı görüntüleyemeye yetkiniz bulunmamaktadır!</h4>
<?php } ?>