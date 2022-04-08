<?php
  $CI = &get_instance();  
?>

<?php if($CI->session->flashdata("success") != ""): ?>
<div class="uk-alert-success alert bdd-padding-header" uk-alert>
    <a class="uk-alert-close" uk-toggle="self-close" uk-close></a>
    <p><?php echo e($CI->session->flashdata("success")); ?></p>
</div>    
<?php endif; ?>

<?php if($CI->session->flashdata("failed") != ""): ?>
<div class="uk-alert-danger alert bdd-padding-header" uk-alert>
    <a class="uk-alert-close" uk-toggle="self-close" uk-close></a>
    <p><?php echo e($CI->session->flashdata("failed")); ?></p>
</div>    
<?php endif; ?>

<script>
    setTimeout(function() {
        UIkit.alert('.alert').close();
    }, 2000);
</script><?php /**PATH C:\Panji\xampp\htdocs\bdd-v2\application\views/layouts/alert.blade.php ENDPATH**/ ?>