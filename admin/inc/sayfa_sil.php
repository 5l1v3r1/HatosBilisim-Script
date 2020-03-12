<?php echo !defined("ADMIN") ? die("Hacking?") : null;?>
<?php 
	$sessionID = session("uye_id");
	$rutbe = query("SELECT * FROM uyeler WHERE uye_id = '$sessionID'");
	$row = row($rutbe);
	$rutbeKodu = $row["uye_yazar"];
	if($rutbeKodu == 1){
?>
<article style="padding-bottom: 20px" class="module width_full">
	<header><h3>Sayfa Sil</h3></header>
	<?php
			
		$id = g("id");
		$delete = query("DELETE FROM sayfalar WHERE sayfa_id = '$id'");
		if ($delete){
			echo '<h4 class="alert_success">Yorum başarıyla silindi.. Yönlendiriliyorsunuz..</h4>';
			go(URL."/admin/index.php?do=sabit_sayfalar", 1);
		}else {
			echo '<h4 class="alert_error">Mysql Hatası: '.mysql_Error().'</h4>';
		}
		
	?>
</article>

<div class="spacer"></div>
<?php }else{ ?>
	<h4 class="alert_info">Bu sayfayı görüntüleyemeye yetkiniz bulunmamaktadır!</h4>
<?php } ?>