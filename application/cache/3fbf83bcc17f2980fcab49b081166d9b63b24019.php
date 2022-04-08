<nav class="navbar navbar-expand-lg">
    <div class="container-fluid container-sm navbar-container">
        <button class="navbar-toggler border-0 col-2" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand mb-auto col-4 mr-4" href="<?php echo base_url() ?>">
            <img src="<?php echo base_url() ?>assets/webpage/icons/12/new-logo.png" class="img-fluid small--hide" width="170">
            <img src="<?php echo base_url() ?>assets/webpage/icons/12/new-logo.png" class="img-fluid medium-up--hide">
        </a>
      <!-- <a href="https://wa.me/+6281805757585" target="_blank" rel="noopener noreferrer">
          <button type="button" class="btn bdd-primary-btn ml-4 mr-4 medium-up--hide">Get Started</button>
      </a> -->
      <div class="collapse navbar-collapse w-small-100 small--text-center m-mobile-auto" id="navbarNav">
        <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
          <li class="nav-item">
          <a class="nav-link p-3 font-medium <?php echo e($about ?? ''); ?>" aria-current="page" href="<?php echo base_url() ?>about">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link p-3 font-medium <?php echo e($whatwedo ?? ''); ?>" href="<?php echo base_url() ?>what-we-do">What We Do</a>
          </li>
          <li class="nav-item">
            <a class="nav-link p-3 font-medium <?php echo e($casestudy ?? ''); ?>" href="<?php echo base_url() ?>case-study">Case Study</a>
          </li>
          <li class="nav-item">
            <a class="nav-link p-3 font-medium <?php echo e($news ?? ''); ?>" href="<?php echo base_url() ?>news-and-update">5-Mins Essentials</a>
          </li>
        </ul>
        <!-- <a class="small--hide" href="https://wa.me/+6281805757585" target="_blank" rel="noopener noreferrer">
          <button type="button" class="btn bdd-primary-btn ml-4 small--hide">Get Started</button>
        </a> -->
      </div>
    </div>
  </nav><?php /**PATH /home/u6065760/public_html/bolehdicoba.com/application/views/webpage/layouts/navbar.blade.php ENDPATH**/ ?>