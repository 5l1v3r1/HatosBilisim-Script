<?Php
	session_start();
	$kod=substr(md5(rand(0,999999)),0,6);
	$font="HoboStd.otf";
	$_SESSION["kod"]=$kod;

	$rsm=imagecreate(100,40);
	$beyaz=ImageColorAllocate($rsm,rand(0,255),rand(0,255),rand(0,255));
	$mavi=ImageColorAllocate($rsm,rand(0,255),rand(0,255),rand(0,255));

	imagefill($rsm,4,5,$mavi);

	imagettftext($rsm,15,rand(-15,15),10,30,$beyaz,$font,$kod);


	header("Content-type: image/png");
	ImagePNG($rsm);
	ImageDestroy($rsm);

?>