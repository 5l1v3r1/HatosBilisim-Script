
$(document).ready(function(){
	
	<!-- Hareketli yaptığımız kısım  -->
	var say = 1;
	$.Slider = function(adet){ // slider adında fonksiyon oluşturuyoruz
			$("#slider ul#buttonlar li").removeClass("aktif"); // tüm aktif claslarını temizle
			$("#slider ul#resimler li").hide(); // tüm lileri gizle
		if(say < adet){
			$("#slider ul#buttonlar li:eq("+say+")").addClass("aktif"); // say'ıncı indisdeki liye aktif clasını ata
			$("#slider ul#resimler li:eq("+say+")").fadeIn(); // say'ıncı indisdeki liyi göster
			say++;
		}else{
			$("#slider ul#buttonlar li:first").addClass("aktif"); // Birinci liye aktif clası ata
			$("#slider ul#resimler li:first("+say+")").fadeIn(); // birinci liyi göster
			say = 1;
		}
	}
	
	var liAdet = $("#slider ul#resimler li").length; // toplam li adeti
	var calistir = setInterval('$.Slider('+liAdet+')', 2500); // 2.5 Saniye de bir çalıştır
	
	<!-- Hareketli yaptığımız kısım bitiş  -->
	
	
	<!-- Üzerine geldiğinde durması için -->
	
	$("#slider").hover(function(){ // Sliderin üzerine gelindiğinde
		clearInterval(calistir); // Intervali temizle
		
	}, function(){
		calistir = setInterval('$.Slider('+liAdet+')', 2500); // 2.5 saniye de bir çalıştır
	});
	<!-- Üzerine geldiğinde durması için bitiş -->
	
	<!-- Sayılara tıklandığında geçiş -->
	
	$("#slider ul#buttonlar li:first").addClass("aktif"); // aktif classımızı birinci li ye atadık
	$("#slider ul#buttonlar li").click(function(){ // button tıkladığında
		var indisNo = $(this).index(); // indis nosunu al
		$("#slider ul#buttonlar li").removeClass("aktif"); // tüm aktif classlarını siliyoruz
		$(this).addClass("aktif"); // aktif clasını atıyoruz
		$("#slider ul#resimler li").hide(); // li leri gizliyoruz
		$("#slider ul#resimler li:eq("+indisNo+")").fadeIn(); // görüntülenecek li
		say = indisNo+1; // indis no +1 değerini say değişkenine atıyoruz
		return false;
	});


});