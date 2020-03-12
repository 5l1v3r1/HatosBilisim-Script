$(function(){

	$.ajaxSetup({
		type: "post",
		url: "http://hatosbilisim.com/sistem/ajax.php",
		dataType: "json"
	});

	$.Site = {
	
		
		iletisim: function(){
			var $adsoyad = $("input[name=adsoyad]").val();
				$adsoyad = $.trim($adsoyad);
			var $konu = $("select[name=konu]").val();
				$konu = $.trim($konu);
			var $mesaj = $("textarea[name=mesaj]").val();
				$mesaj = $.trim($mesaj);
			var $eposta = $("input[name=eposta]").val();
				$eposta = $.trim($eposta);
			var $telefon = $("input[name=telefon]").val();
				$telefon = $.trim($telefon);
				
			if (!$adsoyad || !$mesaj || !$eposta){
				$("span#sonuc").html("Boş alan bırakmayınız!!!");
			}else {
				$.ajax({
					data: {"adsoyad":$adsoyad, "konu":$konu, "mesaj":$mesaj, "eposta":$eposta, "telefon":$telefon, "tip":"iletisim"},
					success: function(cevap){
						if (cevap.hata){
							$("span#sonuc").html(cevap.hata);
						}else {
							$("span#sonuc").html(cevap.ok);
						}
					}
				});
			}
		}
	
	}

});