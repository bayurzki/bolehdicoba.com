@extends('webpage.layouts.app')
@section('title', "What We Do | Boleh Dicoba Digital")
@section('content')
    @include('webpage.layouts.navbar', ['whatwedo' => 'active'])
        
    <hr class="spacing small--hide">

    <!-- section banner -->
    <section id="what-we-do">
      <div class="container container-no-left">
        <div class="row justify-content-center">
          <div class="col-sm-5 small--hide">
            <img src="<?php echo base_url() ?>assets/webpage/images/What We Do 605x605.jpg">
          </div>
          <div class="col-sm-7 d-flex align-items-center padding-wwd">
            <div data-aos="fade-left" class="p-mobile-3">
              <span class="heading text-secondary-small">Together with BDD</span>
              <h1>Generate visitors, improve conversion rate and maintain lifetime values to boost your business</h1>
            </div>
          </div>
          <div class="col medium-up--hide">
            <img src="<?php echo base_url() ?>assets/webpage/images/What We Do 605x605.jpg" class="img-fluid">
          </div>
        </div>
      </div>
    </section>
    <!-- end section -->

    <hr class="spacing">

    <!-- section our core values -->
    <section id="our-core-values">
      <div class="container">
        <div class="row p-25 p-mobile-25">
          <span data-aos="fade-left" data-aos-delay="200" class="heading text-secondary-small text-uppercase">Performance branding</span>
          <h1 data-aos="fade-left" data-aos-delay="300" class="small--hide">Work with us to spare the same digital marketing budget, but gain optimum results!</h1>
          <h4 data-aos="fade-left" data-aos-delay="400" class="medium-up--hide">Work with us to spare the same digital marketing budget, but gain optimum results!</h4>
        </div>
      </div>
    </section>
    <!-- end section -->

    <hr class="spacing">

    <!-- section what we do -->
    <section id="what-we-do">
      <div class="container-full-width bg-light h-628">
        <div class="container">
          <div class="row">
            <div class="text-center p-25">
              <h3>Our services</h3>
            </div>
            <div class="col-sm-6 position-relative small--hide">
              <img src="<?php echo base_url() ?>assets/webpage/images/What We Do 400x334.jpg" alt="">
              <div class="img-wwd zindex-1">
                <img src="<?php echo base_url() ?>assets/webpage/images/wwd-image-2.png" alt="">
              </div>
            </div>
            <div class="col-12 position-relative medium-up--hide">
              <img src="<?php echo base_url() ?>assets/webpage/images/What We Do 400x334.jpg" class="img-fluid">
              <div class="img-wwd">
                <img src="<?php echo base_url() ?>assets/webpage/image-mobile/mbl-wwd-img-2.png" class="img-fluid">
              </div>
            </div>
            <div class="col-sm-6 mb-5 mt-mobile-10">
              <div data-aos="fade-left" data-aos-delay="200" class="img-box-icon-circle shadow bg-white p-2 mb-3">
                  <img src="<?php echo base_url() ?>assets/webpage/illustrations/72/ecomm_web@3x.svg" class="img-fluid">
              </div>              
              <h4 data-aos="fade-left" data-aos-delay="350">Digital ads strategy</h4>
              <p data-aos="fade-left" data-aos-delay="500">Create an effective advertising strategy by finding suitable audience, utilizing the right tools, scheduling optimum time, distributing to the right channel and building the action plan.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end section -->

    <hr class="spacing">

    <!-- section digital marketing -->
    <section id="digital-marketing">
      <div class="container-full-width">
          <div class="container">
            <div class="row">
              <div class="col-sm-6">
                <div data-aos="fade-right" data-aos-delay="200" class="img-box-icon-circle shadow bg-white p-2 mb-3">
                  <img src="<?php echo base_url() ?>assets/webpage/illustrations/72/digital_marketing_optimize@3x.svg" class="img-fluid">
                </div>                
                <h4 data-aos="fade-right" data-aos-delay="350">Digital ads placement</h4>
                <p data-aos="fade-right" data-aos-delay="500">Manage and operate ads using your ad account, optimize the result, create monthly reports to summarize the performance, and evaluate to build future strategies.</p>                
              </div>
              <div class="col-sm-6">
                <div class="wwd-social-media position-relative">
                  <img src="<?php echo base_url() ?>assets/webpage/images/What We Do 605x500.jpg" class="img-fluid">
                  <div class="mt-4 d-flex justify-content-evenly medium-up--hide">
                      <img src="<?php echo base_url() ?>assets/webpage/image-mobile/mbl-wwd-fb@3x.png" class="img-fluid" style="max-width: 50px;">
                      <img src="<?php echo base_url() ?>assets/webpage/image-mobile/mbl-wwd-tw@3x.png" class="img-fluid" style="max-width: 50px;">
                      <img src="<?php echo base_url() ?>assets/webpage/image-mobile/mbl-wwd-ig@3x.png" class="img-fluid" style="max-width: 50px;">
                  </div>
                </div>
              </div>
              <div class="wwd-icon-fb">
                <img src="<?php echo base_url() ?>assets/webpage/images/wwd-fb@3x.svg" class="img-fb p-25 small--hide">
              </div>
              <div class="wwd-icon-twitter">
                <img src="<?php echo base_url() ?>assets/webpage/images/wwd-tw@3x.svg" class="img-tw p-25 small--hide">
              </div>
              <div class="wwd-icon-ig">
                <img src="<?php echo base_url() ?>assets/webpage/images/wwd-ig@3x.svg" class="img-ig p-25 small--hide">
              </div>
            </div>
          </div>
      </div>
    </section>
    <!-- end section -->

    <hr class="spacing">

    <!-- section digital advertisement -->
    <section id="digital-advertisement">
      <div class="container-full-width">
        <div class="container-no-right">
          <div class="row position-relative">
            <div class="bg-light position-absolute left"></div>
            <div class="bdd-light-purple-bg position-absolute right"></div>
            <div class="col-sm-4 d-flex align-items-center small--hide">
              <div class="col-sm-6">
                <div class="img-box">
                  <img src="<?php echo base_url() ?>assets/webpage/images/wwd-image-4.png" class="img-fluid">
                </div>
              </div>
              <div class="col-sm-6 zindex-1">
                <div class="img-box">
                  <img src="<?php echo base_url() ?>assets/webpage/images/wwd-image-5.png" class="img-fluid">
                </div>
              </div>
            </div>
            <div class="col-sm-8 padding-wwd h-628 d-flex align-items-center ml-5-mobile">
              <div class="digital-advertisement-description">
                <div class="medium-up--hide py-5 d-flex align-items-center position-relative digital-advertisement">
                  <div class="col-4 mr-3">
                    <img src="<?php echo base_url() ?>assets/webpage/image-mobile/mbl-wwd-img-4@2x.png" class="img-fluid">
                  </div>
                  <div class="w-53">
                    <img src="<?php echo base_url() ?>assets/webpage/image-mobile/mbl-wwd-img-5@2x.png" class="img-fluid">
                  </div>
                </div>
                <div class="mobile-digital-advertisement">
                    <div data-aos="fade-left" data-aos-delay="200" class="img-box-icon-circle shadow bdd-purple-bg p-2 mb-3">
                        <img src="<?php echo base_url() ?>assets/webpage/illustrations/72/digi_ads@3x.svg" class="img-fluid">
                    </div>
                    <h4 data-aos="fade-left" data-aos-delay="350" class="text-white">Digital marketing and organic strategy consultation</h4>                  
                    <p data-aos="fade-left" data-aos-delay="500" class="text-white">Provide recommendation and advice on your whole digital marketing strategy to help you nurture organic growth and create suitable brand strategy. <br><br>
                      Give suggestions and references based on marketing funnel to help you create better ads content. <br><br>
                      Provide insights and ideas for your promotion and brand gimmick to help you generate better campaign results.
                    </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end section -->

    <!-- section Digital Marketing and Digital Campaign Strategy -->
    <section id="digital-strategy">
      <div class="container-full-width bg-light">
        <div class="container-no-right mt-6-custom">
          <div class="row">
            <div class="col-sm-5 d-flex align-items-center pt-mobile-5 mt-custom medium-up--hide position-relative">
              <div class="icon">
                <img src="<?php echo base_url() ?>assets/webpage/image-mobile/mbl-wwd-img-6@2x.png" class="icon1 img-fluid">
                <img src="<?php echo base_url() ?>assets/webpage/image-mobile/mbl-wwd-puzzle@3x.svg" class="icon2 img-fluid">
              </div>
              <div class="position-relative pl-mobile-5">
                <img src="<?php echo base_url() ?>assets/webpage/image-mobile/mbl-wwd-img-7@2x.png" class="img-fluid">
              </div>
            </div>
            <div class="col-sm-7 padding-wwd pt-mobile-5 pl-mobile-4 pr-mobile-4 mt-custom pb-mobile-5">
                <div data-aos="fade-right" data-aos-delay="200" class="img-box-icon-circle shadow bg-white p-2 mb-3">                    
                    <img src="<?php echo base_url() ?>assets/webpage/illustrations/72/digital_marketing@3x.svg" class="img-fluid">
                </div>
                <h4 data-aos="fade-right" data-aos-delay="350">Web Development</h4>
                <p data-aos="fade-right" data-aos-delay="500">Build an e-commerce website using Shopify platform that suits your brand identities, facilitate online transaction process, and create better online presence.</p>              
            </div>
            <div class="col-sm-5 d-flex align-items-center small--hide">
              <div class="position-relative">
                <img src="<?php echo base_url() ?>assets/webpage/images/What We Do 600x500.jpg" class="main-img img-fluid">
              </div>
              <div class="icon">
                <img src="<?php echo base_url() ?>assets/webpage/images/wwd-image-7.png" class="icon1 img-fluid">
                <img src="<?php echo base_url() ?>assets/webpage/images/wwd-puzzle@3x.svg" class="icon2 img-fluid">
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end section -->

    <!-- section brand works -->
    <div class="mt-5 mb-mobile-4 mt-mobile-2 d-flex align-items-center" id="brand-works">
      <div class="container container-fluid-mobile">
        <div class="row">
          <div class="p-mobile-25 text-center">
            <span class="heading text-secondary-small text-center">OUR CLIENT</span>
            <h3 data-aos="fade-left" data-aos-delay="200" class="text-center">Brands We've Worked With</h3>
          </div>

          
          <div class="small--hide">
            <img src="<?php echo base_url() ?>assets/webpage/images/clients-desktop.png" class="img-fluid"/>
          </div>

          <div class="medium-up--hide">
            <img src="<?php echo base_url() ?>assets/webpage/images/clients-mobile.png" class="img-fluid"/>
          </div>
          <!-- <hr class="spacing small--hide">
          <div class="small--hide">
            <div class="d-flex align-items-center justify-content-center">
              <div class="text-center col-sm-12">
                <img src="<?php echo base_url() ?>assets/webpage/images/clients-desktop.png" class="img-fluid"/>

              </div>
            </div>
            <hr class="spacing">
          </div>
          <div class="medium-up--hide">
            <div class="row d-flex align-items-center">
              <img src="<?php echo base_url() ?>assets/webpage/images/clients-mobile.png" />
            </div>
            <div class="mb-3"></div>
          </div> -->
        </div>
      </div>
    </div>
    <!-- end section -->

    @include('webpage.layouts.footer')
@endsection