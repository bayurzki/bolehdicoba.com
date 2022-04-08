<?php
    $CI = &get_instance();
?>
<footer class="dmt-7em bdd-purple-bg" id="footer">
    <div class="container">
        <div class="row py-5">
            <div class="col-md-8 mt-5 pr-desktop-5 contact-form">
                <form action="<?php echo e(base_url('webpage/kirim_email')); ?>" method="post" enctype="multipart/form-data">
                    <h6 class="text-white">
                        Send us a message to get start.
                    </h6>
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group py-3">
                            <input type="text" name="full_name" class="form-control input-custom px-0 py-2" id="full-name" required="required">
                            <label for="full-name" class="text-label">Full Name</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group py-3">
                            <input type="email" name="email" class="form-control input-custom px-0 py-2" id="email-address" required="required">
                            <label for="email-address" class="text-label">Email Address</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group py-3">
                            <input type="text" name="subject" class="form-control input-custom px-0 py-2" id="subject" required="required">
                            <label for="subject" class="text-label">Subject</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group py-3">
                            <textarea class="form-control input-custom px-0 py-2" id="message" name="message" rows="4" required></textarea>
                            <label for="message" class="text-label">Your Message</label>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="g-recaptcha" data-sitekey="<?php echo $CI->config->item('google_key') ?>"></div> 
                    </div>
                    <div class="col-md-6 text-right">
                        <button type="submit" class="btn bdd-primary-btn mt-3">
                            Submit
                            <img src="<?php echo base_url() ?>assets/webpage/icons/12/blackright_arrow_ic.png" class="pl-4 img-fluid" width="34">
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-4 mt-5 pl-desktop-5">
            <div class="heading-small mb-3">
                <span class="heading text-white">Contact</span>
            </div>
            <h3 class="text-white mt-3 mb-4">
                Looking forward to hearing from you!
            </h3>
            <span class="text-white">Address</span>
            <p class="bdd-text-white m-0 mt-2"><i class="fas fa-map-marker-alt text-white mr-2"></i>Lima Building, Jl. Sunda No.56-61, Kb. Pisang, Kec. Sumur Bandung, Kota Bandung, Jawa Barat 40112, Indonesia</p>
            <!-- <p class="bdd-text-white m-0 ml-3 pl-1">Bandung, Indonesia</p>                  -->
            <p class="bdd-text-white m-0 mt-2"><i class="fas fa-map-marker-alt text-white mr-2"></i>Jl. Kemang Raya Selatan VIII No.55, Jakarta Selatan, Indonesia</p>
            <!-- <p class="bdd-text-white m-0 ml-3 pl-1">Jakarta Selatan, Indonesia</p>                  -->

            <p class="bdd-text-white m-0 mt-2">
                <span class="text-white font-medium">P.</span> +62818 0575 7585
            </p>
            <p class="bdd-text-white m-0">
                <span class="text-white font-medium">E.</span> hi@bolehdicoba.com
            </p>
            <div class="social-media mt-5">
                <a href="https://www.facebook.com/bolehdicobadigital/" target="_blank">
                    <img src="<?php echo base_url() ?>assets/webpage/images/wwd-fb@2x-edit.png" class="img-fluid">
                </a>
                <a href="https://www.instagram.com/bolehdicobadigital/" target="_blank">
                    <img src="<?php echo base_url() ?>assets/webpage/images/wwd-ig@2x-edit.png" class="img-fluid">
                </a>
                <!-- <a href="#">
                    <img src="<?php echo base_url() ?>assets/webpage/images/wwd-tw@2x-edit.png" class="img-fluid">
                </a> -->
                <a href="https://www.linkedin.com/company/bolehdicoba/?originalSubdomain=my" target="_blank">
                    <img src="<?php echo base_url() ?>assets/webpage/icons/44/linkedin-icon-team@2x.png" class="img-fluid">
                </a>
            </div>
        </div>
    </div>

        <div class="sub-footer border-top-darken mt-5">
            <nav class="row navbar navbar-expand-lg navbar-light change-justify py-4">
                <a class="col-12 col-md-5 text-center-mobile navbar-brand footer-brand text-small" href="#">
                    © Boleh Dicoba Digital
                </a>
                <div class="col-12 col-md-7 small--hide" id="footerNav">
                  <ul class="navbar-nav w-100 mb-2 mb-lg-0">
                    <li class="nav-item w-100">
                      <a class="nav-link p-3 text-small" aria-current="page" href="<?php echo base_url() ?>webpage/about">About Us</a>
                    </li>
                    <li class="nav-item w-100">
                      <a class="nav-link p-3 text-small" href="<?php echo base_url() ?>webpage/whatWeDo">What We Do</a>
                    </li>
                    <li class="nav-item w-100">
                      <a class="nav-link p-3 text-small" href="<?php echo base_url() ?>webpage/caseStudy">Case Study</a>
                    </li>
                    <li class="nav-item w-100">
                      <a class="nav-link p-3 text-small" href="<?php echo base_url() ?>webpage/newsAndUpdate">5-Mins Essentials</a>
                    </li>
                  </ul>
                </div>
            </nav>
        </div>
    </div>
</footer><?php /**PATH C:\xampp\htdocs\bolehdicoba.com\application\views/webpage/layouts/footer.blade.php ENDPATH**/ ?>