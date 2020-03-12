<?php 
	require_once "../sistem/ayar.php"; 
	require_once "../sistem/sistem.php"; 
	
	if($ayar["site_blog_durum"] == 1){
			
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<?php blog_tdk(); ?>
    <meta charset="UTF-8">
    <title><?php echo BLOG_TITLE; ?></title>

    <!-- icon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo TEMA_URL; ?>/assets/images/icon.ico" />
    <link rel="icon" type="image/png" href="<?php echo TEMA_URL; ?>/assets/images/icon.ico">
	
    <!-- styles -->
    <link rel="stylesheet" href="<?php echo TEMA_URL; ?>/assets/styles/custom.css"/>
	
    <!-- Script -->
	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	<script type="text/javascript" src="<?php echo URL; ?>/sistem.js"></script>
	<script type="text/javascript" src="<?php echo TEMA_URL; ?>/assets/scripts/slider.js"></script>
</head>
	
<body class="blogBG" style="background-repeat: no-repeat;background-attachment: fixed;" background="<?php echo TEMA_URL; ?>/assets/images/blogBG.png">
	
	<!-- Navbar -->
	<div class="blogNavBar"></div>
	
	<!-- Blog Header -->
	<div class="blogHeader">
		<div class="blogCenter">
			<!-- Blog Logo -->
			<div class="blogLogo">
				<a title="<?php echo SITE_TITLE;?>" href="<?php echo BLOG_URL;?>"><img src="<?php echo TEMA_URL; ?>/assets/images/logo.png" alt="Logo" width="402" height="116" /></a>
				<img class="blogIcon" src="<?php echo TEMA_URL; ?>/assets/images/blogIcon.png" alt="Blog" width="383" height="70" /> 
				<span><b>Bize Ilaşın</b> <br /><?php site_Mail(); ?></span>
			</div>
		</div>
	</div>
	
	<!-- Blog Menu -->
	<div class="blogCenter">
		<div class="blogMenu">
			<ul class="menu">
				<li class="<?php echo !g("d") ? 'active' : null; ?>"><a href="<?php echo BLOG_URL;?>">Anasayfa</a></li>
				<!--<li class="<?php echo g("d") == "yazarlarimiz" ? 'active' : null; ?>"><a href="<?php echo BLOG_URL;?>/yazarlarimiz">Yazarlarımız</a></li>-->
				<li><a href="<?php echo URL;?>/kurumsal">Hakkımızda</a></li>
				<li><a href="<?php echo URL;?>/iletisim">İletişim</a></li>
			</ul>
			<form action="<?php echo BLOG_URL; ?>" method="GET">
				<ul class="ara">
					<input type="hidden" name="d" value="ara" />
					<li><input type="text" name="kelime" placeholder="Birşeyler arayın.." /></li>
				</ul>
			</form>
		</div>
	</div>
	
	<!-- Blog Middle -->
	<div class="blogMiddle">
		<div class="blogCenter">
			<!-- Blog Left -->
			<div class="blogLeft">
				<?php  blog_tema_icerik(); ?>
			</div>
		
			<!-- Blog Right -->
			<div class="blogRight">
				<!-- Categories -->
				<div class="blogBox">
					<h2><img src="<?php echo TEMA_URL; ?>/assets/images/list.png" alt="Kategoriler" width="20" height="20" />Kategoriler</h2>
					<ul>
						<?php blog_tema_kategoriler(); ?>
					</ul>
				</div>
				<!-- Read Articles -->
				<div class="blogBox">
					<h2><img src="<?php echo TEMA_URL; ?>/assets/images/okuma.png" alt="Yazılar" width="20" height="20" />Popüler Yazılar</h2>
					<ul>
						<?php blog_tema_cok_okunanlar(); ?>
					</ul>
				</div>
				<!-- Labels -->
				<div class="blogBox">
					<h2><img src="<?php echo TEMA_URL; ?>/assets/images/etiket.png" alt="Etiketler" width="20" height="20" />Etiketler</h2>
					<ul class="blogEtiketler">
						<?php blog_etiket_bulutu(); ?>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<!-- Clear -->
	<div class="clear"></div>
	<!-- Blog Foother -->
	<div class="blogFoother">
		<div class="blogCenter">
			<a href="<?php echo URL;?>">HatOS Bilişim</a> olarak tüm haklarımız saklıdır.
		</div>
	</div>
</body>
</html>
<?php 

}else {
	echo "Blogumuzda şuan bakım çalışması yapılmaktadır. <a href=".URL.">Siteye git.</a>";
}
?>