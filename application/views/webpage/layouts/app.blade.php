<?php
    $CI = &get_instance();
    if (isset($title)) {
        $meta_title = "Boleh Dicoba Digital - ".$title;
    }else{
        $meta_title = "Boleh Dicoba Digital";
    }

    if (isset($description)) {
        $meta_description = $description;
    }else{
        $meta_description = "";
    }
    $url = $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0 , minimum-scale=1.0 , maximum-scale=1.0" />
    <meta name="google-site-verification" content="fpTDHmbGVDwBCmkxJREoo_AgaeRPr1BGo2hPKEZsSqk" />
    <meta property="og:site_name" content="Boleh Dicoba Digital">
    <meta property="og:title" content="<?php echo $meta_title ?>" />
    <meta property="og:description" content="<?php echo $meta_description ?>" />
    <meta property="og:image" itemprop="image" content="<?php echo base_url() ?>assets/favicon/favicon-32x32.png">
    <meta property="og:type" content="website" />

    <meta property="twitter:title" content="<?php echo $meta_title ?>" />
    <meta property="twitter:description" content="<?php echo $meta_description ?>" />
    <meta property="twitter:image" itemprop="image" content="<?php echo base_url() ?>assets/favicon/favicon-32x32.png">
    <meta property="twitter:card" itemprop="image" content="<?php echo base_url() ?>assets/favicon/favicon-32x32.png">
    <meta property="og:type" content="website" />
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url() ?>assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url() ?>assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url() ?>assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo base_url() ?>assets/favicon/site.webmanifest">
    <link rel="mask-icon" href="<?php echo base_url() ?>assets/favicon/safari-pinned-tab.svg" color="#ffbd40">
    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/favicon/favicon.ico" />
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffbd40">
    <title>
        @yield('title')
    </title>    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/webpage/css/style.css?v=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/webpage/css/owl.carousel.min.css">
    <style type="text/css">

        .bdd-primary-btn:hover {
            color: #fff !important;
        }
    </style>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    @stack('stylesheet')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>
</head>

<body>
    <?php
        if ($CI->session->flashdata("success")) {
    ?>
        @include('webpage.layouts.toast')
    <?php
        }
    ?>
    @yield('content')
    @include('webpage.layouts.whatsapp-button')
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js"></script></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/webpage/js/style.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/webpage/js/yall.min.js"></script>
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", yall);

        // AOS init
        AOS.init({
            delay: 100,
            disable: 'mobile',
            duration: 800
        });

        window.addEventListener('load', AOS.refresh)
    </script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-125338485-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-125338485-1');
    </script>
    <!-- Global site tag (gtag.js) - Google Ads: 677996974 -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-677996974"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'AW-677996974');
    </script>

    <!-- Facebook Pixel Code -->
  <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '561693097677002');
    fbq('track', 'PageView');
  </script>
  <noscript>
    <img height="1" width="1" style="display:none" 
         src="https://www.facebook.com/tr?id=561693097677002&ev=PageView&noscript=1"/>
  </noscript>
  <!-- End Facebook Pixel Code -->
    @stack('script')    
</body>

<script type="application/ld+json">
    {
    "@context": "http://schema.org",
    "@type": "Organization",
    "mainEntityOfPage": "https://bolehdicoba.com<?php echo $url ?>",
    "logo": "https://bolehdicoba.com/assets/webpage/icons/12/new-logo.png",
    "address": "Lima Building, Jl. Sunda No.56-61, Kb. Pisang, Kec. Sumur Bandung, Kota Bandung, Jawa Barat 40112, Indonesia",
    "email": "hi@bolehdicoba.com",
    "telephone": "081805757585"
    }
</script>
</html>