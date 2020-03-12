<!doctype html>
<html lang="en-US">
<head>
	<?php tdk(); ?>
    <meta charset="UTF-8">
    <title><?php echo SITE_TITLE; ?></title>

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
<body background="<?php echo TEMA_URL; ?>/assets/images/bg.png">
    
<!-- navbar -->
<div class="navbar">
        <div class="center">
            
            <!-- header -->
            <div class="header">

                <!-- contact -->
                <div class="left">
                    <ul>
                        <li>
                            <img src="<?php echo TEMA_URL; ?>/assets/images/phone.png" height="32" width="32" alt="" />
                            <span title="telefon numarası"><?php telefon2(); ?></span>
                        </li>
                    </ul>
                    <ul>
                        <li>
                            <img src="<?php echo TEMA_URL; ?>/assets/images/message.png" height="32" width="32" alt=""/>
                            <a href="<?php echo URL; ?>/iletisim" title="iletişim">
                                <span>İletişim</span>
                            </a>
                        </li>
                    </ul> 
					<ul>
                        <li>
                            <img src="<?php echo TEMA_URL; ?>/assets/images/application6.png" height="32" width="32" alt=""/>
                            <a href="<?php echo URL; ?>/iletisim" title="iletişim">
                                <span>Teklif Formu</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- social -->
                <div class="right">
                    <ul>
                        <li>
                            <a href="<?php facebookProfil(); ?>" title="facebook" target="_blank" >
                                <img class="faceActive" src="" height="32" width="32" alt=""/>
                            </a>
                        </li>
                    </ul>
                    <ul>
                        <li>
                            <a href="<?php youtubeProfil(); ?>" title="youtube" target="_blank">
                                <img class="youActive" src="" height="32" width="32" alt=""/>
                            </a>
                        </li>
                    </ul>
                    <ul>
                        <li>
                            <a href="<?php twitterProfil(); ?>" title="twitter" target="_blank">
                                <img class="twitActive" src="" height="32" width="32" alt=""/>
                            </a>
                        </li>
                    </ul>
                    <ul>
                        <li>
                            <a href="<?php googleProfil(); ?>" title="google+" target="_blank">
                                <img class="goActive" src="" height="32" width="32" alt=""/>
                            </a>
                        </li>
                    </ul>
                    <ul>
                        <li>
                            <a href="#" title="rss" target="_blank" >
                                <img class="rssActive" src="" height="32" width="32" alt=""/>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
			
            <!-- header down -->
            <div class="headerDown">

                <!-- logo -->
                <div class="logo">
                    <h1 class="logo">
                        <a href="<?php echo URL; ?>/index" title="HatOS Bilişim Logo">
                            <img src="<?php echo TEMA_URL; ?>/assets/images/logo.png" height="116" width="402" alt="HatOS Bilişim"/>
                        </a>
                    </h1>
                </div>

                <!-- menuler -->
                <div class="menuler">
                    <ul class="<?php echo !g("do") ? 'active' : null; ?>">
                        <a href="<?php echo URL; ?>/index.php">
                            <li>Anasayfa</li>
                            <span>homepage</span>
                        </a>
                    </ul>
                    <ul class="<?php echo g("do") == "kurumsal" ? 'active' : null; ?>">
                        <a href="<?php echo URL; ?>/kurumsal">
                            <li>Kurumsal</li>
                            <span>instituional</span>
                        </a>
                    </ul>
                    <ul class="<?php echo g("do") == "hizmetlerimiz" ? 'active' : null; ?>">
                        <a href="<?php echo URL; ?>/hizmetlerimiz">
                            <li>Hizmetlerimiz</li>
                            <span>services</span>
                        </a>
                    </ul>
                    <ul class="<?php echo g("do") == "referanslar" ? 'active' : null; ?>">
                        <a href="<?php echo URL; ?>/referanslar">
                            <li>Referanslar</li>
                            <span>references</span>
                        </a>
                    </ul>
					<ul class="<?php echo g("do") == "programlar" ? 'active' : null; ?>">
                        <a href="<?php echo URL; ?>/programlar">
                            <li>Bizden</li>
                            <span>project</span>
                        </a>
                    </ul>
                    <ul class="<?php echo g("do") == "blog" ? 'active' : null; ?>">
                        <a href="<?php echo BLOG_URL; ?>">
                            <li>Blog</li>
                            <span>blog</span>
                        </a>
                    </ul>
                    <ul class="<?php echo g("do") == "iletisim" ? 'active' : null; ?>">
                        <a href="<?php echo URL; ?>/iletisim">
                            <li>İletişim</li>
                            <span>contact</span>
                        </a>
                    </ul>

                </div>

            </div>
        </div>
</div>

    <!-- content -->
    <div class="content">
        <?php tema_icerik(); ?>
    </div>

<!-- footer -->
<div class="footer">
    <div class="center">

        <!-- fast menu -->
        <ul>

            <div class="fastMenu">
            <h2>Hızlı Menüler</h2>
            <ul>
                <li>
                    <a href="<?php echo URL; ?>/index" title="anasayfa" >Anasayfa</a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="<?php echo URL; ?>/kurumsal" title="kurumsal">Kurumsal</a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="<?php echo URL; ?>/hizmetlerimiz" title="hizmetlerimiz">Hizmetlerimiz</a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="<?php echo URL; ?>/referanslar" title="referanslar">Referanslar</a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="<?php echo URL; ?>/blog" title="blog">Blog</a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="<?php echo URL; ?>/iletisim" title="iletişim">İletişim</a>
                </li>
            </ul>
        </div>
        </ul>

        <!-- blog recently -->
        <ul>
			<div class="blogRecently">
				<h2>Blog Son Konular</h2>
				<?php tema_blog_konuları(); ?>
			</div>
        </ul>

        <!-- contact -->
        <ul>
            <div class="contact">
                <h2>Bize Ulaşın!</h2>
                <ul>
                    <li class="adress">
                        <?php adres(); ?>
                    </li>
                    <li class="phone">
                        <?php telefon(); ?>
                    </li>
                    <li class="mail">
                        <?php site_Mail(); ?>
                    </li>
                </ul>
            </div>
        </ul>

    </div>
</div>

<!-- copyright -->
<div class="copyright">
    <div class="center">
        <span>
            <b>HatOS Bilişim</b> olarak tüm haklarımız saklıdır &copy; <br>
            İzin alınmadan içeriklerin alınması ve kopyalanması yasaktır. <br>
            Tespit edildiğinde yasal işlem başlatılacaktır.
	    </span>
    </div>
</div>

</body>
</html>