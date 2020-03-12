<!-- iletişim -->
<div class="menuContact">
	<div class="center">
		<!-- title -->
		<div class="title2">
			<h2 class="title">İLETİŞİM</h2>
			<img src="<?php echo TEMA_URL; ?>/assets/images/ellipsis.png" height="54" width="60" alt="Kurumsal | <?php echo SITE_TITLE; ?>"/>
		</div>
		<div class="bosluk"></div>
		<!-- Maps -->
		<iframe src="https://www.google.com/maps/embed?pb=!1m22!1m12!1m3!1d788.5935623201275!2d30.52782104554882!3d37.75782201328248!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m7!1i0!3e0!4m0!4m3!3m2!1d37.7580646!2d30.5272927!5e0!3m2!1str!2s!4v1415628707862" width="1200" height="400" frameborder="0" style="border:0"></iframe>	<form action="" method="post" onsubmit="return false">

		<!-- Contact Form -->
		<div class="iletisimFormu">
			<form action="" method="post" onsubmit="return false">
				<ul>
					<h2>İletişim Formu</h2>
					<span>Ad Soyad *</span>
					<li><input type="text" name="adsoyad" placeholder="Ad Soyad" /></li>
					<span>E-Posta *</span>
					<li><input type="text" name="eposta" placeholder="adres@site.com"/></li>
					<span>Telefon</span>
					<li><input type="text" name="telefon" placeholder="0555 555 55 55"/></li>
					<span>Mesajınız *</span>
					<li><textarea name="mesaj" cols="30" rows="10" placeholder="Mesaj"></textarea></li>
					<li><button type="submit" onclick="$.Site.iletisim()">Gönder</button> <span style="margin-left: 10px; color: red" id="sonuc"></span></li>
					<li><input type="text" name="konu" value="of" style="display:none;"/></li>
				</ul>
			</form>
		</div>
		<div class="iletisimBilgilerim">
			<ul>
				<h2>İletişim Bilgileri</h2>
				<li>Adres:</li><span><?php adres(); ?></span>
				<li>Telefon:</li><span><?php telefon2(); ?></span>
				<li>Mail:</li><span><?php site_Mail(); ?></span>
				<li>Çalışma Saatleri:</li><span>09:00 - 18:00</span>
			</ul>
		</div>
	</div>
</div>