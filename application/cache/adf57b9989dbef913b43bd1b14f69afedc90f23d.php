<?php
  $CI = &get_instance();     
  
  $url = $_SERVER['REQUEST_URI'];

  switch ($url) {
    case stripos($url, 'login') == true:
        $key = 'login';
        break;
    case stripos($url, 'dashboard') == true:
        $key = 'dashboard';
        break;
    case stripos($url, 'news') == true:
        $key = 'news';
        break;
    default:
        $key = 'dashboard';
        break;
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url() ?>assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url() ?>assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url() ?>assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo base_url() ?>assets/favicon/site.webmanifest">
    <link rel="mask-icon" href="<?php echo base_url() ?>assets/favicon/safari-pinned-tab.svg" color="#ffbd40">
    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/bdd-logo.ico" />
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffbd40">
    <title>
        <?php echo $__env->yieldContent('title'); ?>
    </title>
    <!-- CSS -->
    <!-- Ui Kit css -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/uikit.min.css?<?=time(); ?>">
    <!-- material design -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/materialdesignicons.min.css?<?= time(); ?>">    
    <!-- custom css -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/app.min.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/main.css?<?=time(); ?>">
    <!-- datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.uikit.min.css">
    <!-- datrangepicker -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/daterangepicker.css?<?= time(); ?>">
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/daterangepicker_custom.css?<?= time(); ?>">
    <?php echo $__env->yieldPushContent('stylesheet'); ?>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>
    <script src="<?php echo base_url() ?>assets/dist/js/utilities/jquery.min.js?<?=time(); ?>"></script>
    <script src="<?= base_url() ?>assets/dist/js/utilities/jquerysession.js?<?= time(); ?>"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js" charset="utf-8"></script>

    
</head>

<body>
    <?php if ($CI->session->userdata('username') != '') { ?>
    <?php echo $__env->make('layouts.navbar', [$key => 'active'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div id="bodyCamp" class="tm-main uk-background-default">
    <?php } else { ?>
    <div id="bodyCamp" class="uk-background-default">
    <?php } ?>
        <div class="uk-width-expand@s">
            <?php if ($CI->session->userdata('username') != '') { ?>
            <div class="uk-background-default bdd-padding-header" style="padding-top: 20px; z-index: 980;"
                uk-sticky="top: 0; animation: uk-animation-slide-top; bottom: #sticky-on-scroll-up">
                <div uk-scrollspy="cls:uk-animation-fade">
                    <div class="uk-inline" style="margin-bottom:10px">    
                        <?php echo $__env->yieldContent('go-back'); ?>
                        <span class="uk-text-meta bdd-badges" id="menu"><?php echo $__env->yieldContent('page-title'); ?></span>
                    </div>
                </div>            
            </div>              
            <?php } ?>
            <?php echo $__env->yieldContent('content'); ?>
        </div>
        <?php
            if ($CI->session->userdata('username') != '') {
        ?>
        <?php echo $__env->make('layouts.panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php
            }
        ?>
    </div>
    <?php echo $__env->yieldContent('toast'); ?>
    <?php
        if ($CI->session->userdata('username') == '') {
    ?>
    <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php
        }
    ?>
    <?php echo $__env->yieldPushContent('script'); ?>
    <?php echo $__env->make('layouts.jspart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <!-- custom js -->
    <script src="<?= base_url() ?>assets/dist/js/utilities/moment.min.js?<?= time(); ?>"></script>
    <script src="<?= base_url() ?>assets/dist/js/utilities/date.js?<?= time(); ?>"></script>
    <!-- Ui kit js -->
    <script src="<?php echo base_url() ?>assets/dist/js/uikit/uikit.min.js?<?=time(); ?>"></script>
    <script src="<?php echo base_url() ?>assets/dist/js/uikit/uikit-icons.min.js?<?=time(); ?>"></script>
    <!-- daterangepicker -->
    <script src="<?= base_url() ?>assets/dist/js/daterange/daterangepicker.js?<?= time(); ?>"></script>
    <script src="<?= base_url() ?>assets/dist/js/daterange/daterangepicker_custom.js?<?= time(); ?>"></script>
    <!-- Datatables -->
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.uikit.min.js" charset="utf-8"></script>
</body>
</html><?php /**PATH /home/u5891500/public_html/application/views/layouts/app.blade.php ENDPATH**/ ?>