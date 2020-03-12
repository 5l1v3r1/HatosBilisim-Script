<?php
	require_once "../sistem/ayar.php";
	require_once "../sistem/fonksiyon.php";
	define("ADMIN", true);
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<title><?php echo SITE_BASLIK; ?> - YÖNETİM PANELİ</title>
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo TEMA_URL; ?>/assets/images/icon.ico" />
    <link rel="icon" type="image/png" href="<?php echo TEMA_URL; ?>/assets/images/icon.ico">
	<link rel="stylesheet" href="css/layout.css" type="text/css" media="screen" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script src="js/jquery-1.5.2.min.js" type="text/javascript"></script>
	<script src="ckeditor/ckeditor.js" type="text/javascript"></script>
	<script src="ckeditor/adapters/jquery.js" type="text/javascript"></script>
	<script src="js/hideshow.js" type="text/javascript"></script>
	<script src="js/jquery.tablesorter.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/jquery.equalHeight.js"></script>
	<script type="text/javascript">
	$(document).ready(function() 
    	{ 
      	  $(".tablesorter").tablesorter(); 
   	 } 
	);
	$(document).ready(function() {
	
	$("textarea.OEditor").ckeditor();

	//When page loads...
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});

});
    </script>
    <script type="text/javascript">
    $(function(){
        $('.column').equalHeight();
    });
</script>
<script language="javascript">
	function ChangeCode(){
		var NewSecurity= "<img src='security.php?rnd="+Math.random()+"' alt='guvenlik' style='border: 1px solid #999999;' />";
		$("#security").html(NewSecurity);
		return false;
	}
</script>
</head>
<body>
<?php
	
	if (session("login") && session("uye_rutbe") == 1){
		require_once "inc/default.php";
	}else {
?>
		<div id="giris_yap">
		<form action="kontrol.php" method="POST">
			<table cellpadding="0" cellspacing="0">
				<tr>
					<td>Eposta:</td>
					<td><input type="text" name="eposta" /></td>
				</tr>
				<tr>
					<td>Şifre:</td>
					<td><input type="password" name="sifre" /></td>
				</tr>
				<tr>
					<th>Güvenlik : </th>
					<td>
					<div id="security"><img src="security.php" alt="guvenlik" style="border: 1px solid #999999;"></div>
					</td>
				</tr>
				<tr>
					<th></th>
					<td><input type="text" name="security"/></td>
				</tr>
				<tr>
					<td><button type="submit" name="giris">Giriş Yap</button></td>
				</tr>
			</table>
		</form>
		</div>
<?php } ?>
</body>
</html>