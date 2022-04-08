
<?php $__env->startSection('title', "Case | Boleh Dicoba Digital"); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('webpage.layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php
        $url = $_SERVER['REQUEST_URI'];
        preg_match('/\d+$/', $url, $case_id);

        if (empty($result)) {
            $result = (object) array("once" => 0);
        }
    ?>
    
    <section id="title-case">
        <?php $__currentLoopData = $result->result(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php switch(@$row->name):
                case ('category-and-title'): ?>
                    <!-- title case -->
                    <div class="container">
                        <div class="title text-left p-25 p-mobile-3 ">
                        <span class="heading text-secondary-small"><?php echo e(@$row->sub_title); ?></span>
                        <h3 class="w-75 w-small--100"><?php echo e(@$row->title); ?></h3>
                        </div>
                    </div>
                <?php break; ?>
                <?php case ('banner'): ?>
                    <!-- image banner -->
                    <div class="banner">
                        <img src="<?php echo e(base_url() . 'assets/images/' . @$row->img_path); ?>" class="img-fluid small--hide w-100">
                        <img src="<?php echo e(base_url() . 'assets/images/' . @$row->img_path); ?>" class="img-fluid medium-up--hide p-25">
                    </div>

                    <hr class="spacing">
                <?php break; ?>
                <?php case ('description-with-side-sosmed'): ?>
                <div class="container">
                    <div class="row">
              
                      <!-- social media -->
                      <div class="col-sm-2">
                        <div class="small--hide social-media my-3 d-flex flex-column align-items-center">
                            <?php if(!empty(@$row->facebook)): ?>                                
                            <a href="https://instagram.com/<?php echo e(@$row->facebook); ?>" target="_blank" class="pb-3">
                              <img src="<?php echo base_url() ?>assets/webpage/images/wwd-fb@2x-edit.png" class="img-fluid">
                            </a>
                            <?php endif; ?>
                            <?php if(!empty(@$row->instagram)): ?>                                
                            <a href="https://facebook.com/<?php echo e(@$row->instagram); ?>" target="_blank" class="pb-3">
                                <img src="<?php echo base_url() ?>assets/webpage/images/wwd-ig@2x-edit.png" class="img-fluid">
                            </a>
                            <?php endif; ?>
                            <?php if(!empty(@$row->twitter)): ?>                                
                            <a href="https://twitter.com/<?php echo e(@$row->twitter); ?>" target="" class="pb-3">
                                <img src="<?php echo base_url() ?>assets/webpage/images/wwd-tw@2x-edit.png" class="img-fluid">
                            </a>
                            <?php endif; ?>
                        </div>
                      </div>
                      <!-- end -->
              
                      <!-- richtext -->
                      <div class="col-sm-9">
                          <?php echo @$row->description; ?>

                      </div>
                      <!-- end -->
                    </div>
                </div>

                <hr class="spacing">
                <?php break; ?>
                <?php case ('image-with-right-content'): ?>
                <!-- services -->
                <div class="container-full-width h-550 bg-light">
                    <div class="row">
                    <div class="col-sm-6 text-center small--hide">
                        <img src="<?php echo e(base_url() . 'assets/images/' . @$row->img_path); ?>" class="img-fluid">
                    </div>
                    <div class="col-sm-6 col-11 d-flex align-items-center w-small--100">
                        <div class="padding-large p-mobile-25">
                        <p class="heading text-secondary-small mb-2 text-uppercase"><?php echo e(@$row->sub_title); ?></p>
                        <h3 class="w-75 w-small--100 mb-4"><?php echo e(@$row->title); ?></h3>
                        <div class="w-75 w-small--100 mb-4">
                            <?php echo @$row->description ?>
                        </div>
                        <div class="row">
                            <?php $__currentLoopData = explode(',', @$row->lists); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                
                            <div class="col-6 col-sm-5 font-14 pb-3">
                                <img src="<?php echo base_url() ?>assets/webpage/icons/18/check@3x.svg" class="pr-2"><?php echo e($item); ?>

                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        </div>
                    </div>
                    <div class="col-11">
                        <img src="<?php echo e(base_url() . 'assets/images/' . @$row->img_path); ?>" class="img-fluid">
                    </div>
                    </div>
                </div>

                <hr class="spacing">
                <?php break; ?>
                <?php case ('reguler-description'): ?>
                    <!-- richtext -->
                    <div class="container">
                        <?php echo @$row->description; ?>

                    </div>
                
                    <hr class="spacing">
                <?php break; ?>
                <?php case ('clients-says'): ?>
                <!-- what our client says -->
                <div class="container">
                    <div class="text-left mb-3">
                    <div class="text-left d-flex flex-column">
                        <span class="heading text-secondary-small mb-4">WHAT OUR CLIENTS SAYS</span>
                        <h1><?php echo @$row->description; ?></h1>
                    </div>
                    </div>
                    <div class="text-right d-flex flex-column">
                    <h5 class="font-medium bdd-font-blue">- <?php echo e(@$row->title); ?></h5>
                    <h6><?php echo e(@$row->sub_title); ?></h6>
                    </div>
                </div>

                <hr class="spacing">
                <?php break; ?>
                <?php default: ?>
                <?php break; ?>                    
            <?php endswitch; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <div class="container-full-width h-550 d-flex flex-column justify-content-center bg-light pb-mobile-5">
            <div class="container custom-position position-relative pt-mobile-5">
            <div class="title-post pb-3">
                <h4 class="small--hide">More Case Studies</h4>
                <h4 class="medium-up--hide text-center">Case Study Suggestion</h4>
                <div class="button opacity-0 medium-up--hide text-center">
                    <button type="button" class="btn"> <img src="<?php echo base_url() ?>assets/webpage/icons/12/yellowleft_arrow_ic@3x.svg" class="img-fluid"> </button>
                    <button type="button" class="btn bdd-primary-btn"> <img src="<?php echo base_url() ?>assets/webpage/icons/12/blackright_arrow_ic@3x.svg" class="img-fluid"> </button>
                </div>
            </div>
            <div class="append-nav"></div>
                <div class="case-detail owl-carousel owl-theme">
                    <?php $__currentLoopData = $carousel_items->result(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $carousel_row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>    
                    <?php if($carousel_row->id == $case_id[0]): ?>
                        <?php continue; ?>;
                    <?php endif; ?>
                    <!-- <a href="<?php echo base_url() . 'case-study/' . str_replace(' ', '-', strtolower($carousel_row->category)) . '/' . str_replace(' ', '-', preg_replace('/:|&\s|,|;|\./', '', $carousel_row->title)) . '/' . $carousel_row->id ?>"> -->
                    <a href="#">
                        <div class="post">
                            <?php if(empty($carousel_row->img_path)): ?>
                            <img src="<?php echo e(base_url() . 'assets/images/default.png'); ?>" width="370" height="270">                                    
                            <?php else: ?>
                            <img src="<?php echo e(base_url() . 'assets/images/' . $carousel_row->img_path); ?>" width="370" height="270">
                            <?php endif; ?>
                            <div class="post-description">
                            <p><strong><?php echo e($carousel_row->title); ?></strong></p>
                            <span class="text-secondary-small">
                                <?php
                                    // Declare timestamps
                                    $created_at = new DateTime( $carousel_row->created_at );
                                    $now = new DateTime( date( 'Y-m-d h:i:s', time() )) ; 

                                    // Find difference
                                    $interval = $created_at->diff($now);

                                    $months = (int)$interval->format('%m');
                                    $days = (int)$interval->format('%d');
                                    $hours = (int)$interval->format('%H');

                                    if ($months > 0) {
                                        if ($months < 2) {
                                            echo 'A months ago';
                                        } else {
                                            echo $months . ' months ago';
                                        }
                                    } elseif ($days > 0) {
                                        echo $days . ' days ago';
                                    } elseif ($hours > 0) {
                                        echo $hours . ' hours ago';
                                    } else {
                                        echo "Some minutes ago";
                                    }
                                ?>
                            </span>
                            </div>
                        </div>
                    </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>

    </section>

    <?php echo $__env->make('webpage.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('webpage.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u6065760/public_html/bolehdicoba.com/beta/application/views/webpage/case-detail.blade.php ENDPATH**/ ?>