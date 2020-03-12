<?php echo !defined("ADMIN") ? die("Hacking?") : null; ?>
<?php 
	$sessionID = session("uye_id");
	$rutbe = query("SELECT * FROM uyeler WHERE uye_id = '$sessionID'");
	$row = row($rutbe);
	$rutbeKodu = $row["uye_yazar"];
	if($rutbeKodu == 1){
?>
<h4 class="alert_info">Hoşgeldiniz! Yönetici Paneline Yazar ve Admin Olarak Giriş Yaptınız.</h4>

<?php }else{ ?>
<h4 class="alert_info">Hoşgeldiniz! Yönetici Paneline Yazar Olarak Giriş Yaptınız.</h4>
<?php } ?>