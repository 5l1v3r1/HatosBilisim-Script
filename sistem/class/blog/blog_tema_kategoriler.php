<?php 

## Tema Kategoriler Fonksiyonu ##
	function blog_tema_kategoriler(){
		$query = query("SELECT * FROM kategoriler");
		while ($row = row($query)){
			echo '<a href="'.BLOG_URL.'/kategori/'.$row["kategori_link"].'" title="'.ss($row["kategori_adi"]).'"><li>'.ss($row["kategori_adi"]).'</li></a>';
		}
	}
	
?>