<?php echo '<?xml version="1.0" encoding="UTF-8"?>' ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">
<?php foreach ($news as $key => $value) { 
$title = preg_replace('/[^\da-z ]/i', '', $value->title);
$title = strtolower($title);
$slug = str_replace(' ', '-', strtolower($value->category)) . '/' . str_replace(' ', '-', preg_replace('/:|&\s|,|;|\./', '', $title));
$time = new DateTime($value->created_at);
$time = $time->format(DateTime::ATOM);
?>
  <url>
    <loc><?php echo base_url().'news-and-update/'.$slug.'/'.$value->id?></loc>
    <lastmod><?php echo $time ?></lastmod>
	<changefreq>weekly</changefreq>
  </url>
<?php } ?>
</urlset>
