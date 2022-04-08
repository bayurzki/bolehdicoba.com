<div class="tm-sidebar-left uk-visible@m uk-background-default uk-text-center">
  
  <div class="uk-width-expand@m uk-margin-large">
    <ul class="uk-nav uk-nav-default" style="font-size:12px;">
      <li class="bdd-menu-<?php echo e($dashboard ?? 'inactive'); ?>" uk-tooltip="title: Case Study; pos: right; offset: 5">
        <a href="<?= base_url('admin/dashboard'); ?>" class="icon-flex">
           <img src="<?= base_url() ?>assets/images/icon/dashboard.svg" width="32px" height="32px" viewBox="0 0 32 32" version="1.1" ></svg>
        </a>
      </li>                                   

      <li class="bdd-menu-<?php echo e($news ?? 'inactive'); ?>" uk-tooltip="title: News & Update; pos: right; offset: 5">
        <a href="<?= base_url('admin/newsUpdate'); ?>" class="icon-flex">
          <img src="<?= base_url() ?>assets/images/icon/web-site.svg" width="32px" height="32px" viewBox="0 0 32 32" version="1.1" ></svg>
        </a>
      </li>

      <li class="bdd-menu-<?php echo e($website ?? 'inactive'); ?>" uk-tooltip="title: BDD Website; pos: right; offset: 5">
        <a href="<?= base_url('webpage'); ?>" target="_blank" class="icon-flex">
          <img src="<?= base_url() ?>assets/images/icon/baseline_web_black_18dp.png" width="32px" height="32px" viewBox="0 0 32 32" version="1.1" ></svg>          
        </a>
      </li>
    </ul>
  </div>
</div>
<?php /**PATH /home/u5891500/public_html/application/views/layouts/navbar.blade.php ENDPATH**/ ?>