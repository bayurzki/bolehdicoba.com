<?php
    $CI = &get_instance();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0 , minimum-scale=1.0 , maximum-scale=1.0" />
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
        <?php echo $__env->yieldContent('title'); ?>
    </title>    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/webpage/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/webpage/css/owl.carousel.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <?php echo $__env->yieldPushContent('stylesheet'); ?>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>
</head>

<body>
    <?php
        if ($CI->session->flashdata("success")) {
    ?>
        <?php echo $__env->make('webpage.layouts.toast', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php
        }
    ?>
    <?php echo $__env->yieldContent('content'); ?>
    <?php echo $__env->make('webpage.layouts.whatsapp-button', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
    <?php echo $__env->yieldPushContent('script'); ?>    
</body>
</html><?php /**PATH /home/u6065760/public_html/bolehdicoba.com/beta/application/views/webpage/layouts/app.blade.php ENDPATH**/ ?>