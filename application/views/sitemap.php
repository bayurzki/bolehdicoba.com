<?php echo '<?xml version="1.0" encoding="UTF-8"?>' ?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  <!-- This is the parent sitemap linking to additional sitemaps for products, collections and pages as shown below. The sitemap can not be edited manually, but is kept up to date in real time. -->
  <sitemap>
    <loc><?php echo base_url().'sitemap/pages.xml'?></loc>
  </sitemap>
  <sitemap>
    <loc><?php echo base_url().'sitemap/news.xml'?></loc>
  </sitemap>
</sitemapindex>
