<?php 

	require_once "sistem/ayar.php"; 
	require_once "sistem/sistem.php"; 
	
	//header("Content-type: text/xml; charset=utf8");
   
   
	$query = query("SELECT * FROM konular WHERE konu_onay = 1 && konu_anasayfa = 1 ORDER BY konu_id DESC LIMIT 10");
			
			echo '<?xml version="1.0" encoding="UTF-8"?>
		<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';
			
			while ($row = row($query)){
				echo '<url>
						<loc>'.BLOG_URL.'/'.$row["konu_link"].'.html</loc>
					</url>';
			}
			echo '</urlset>';
   
 ?>
  