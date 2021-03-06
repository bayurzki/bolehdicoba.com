@extends('webpage.layouts.app')
@section('title', "Boleh Dicoba Digital")
@section('content')
    @include('webpage.layouts.navbar')
    <hr class="spacing small--hide">

    <!-- bottom-header -->
    <div id="go-to-about">
        <div class="container">
            <h1 class="">
                We expand brands through digital performance branding.
            </h1>
            <button type="button" class="btn bdd-primary-btn mt-3">
                <a href="https://wa.me/+6281805757585" class="text-decoration-none">
                    Partner With Us
                    <img src="<?php echo base_url() ?>assets/webpage/icons/12/blackright_arrow_ic.png" class="pl-4 img-fluid" width="34">
                </a>
            </button>
        </div>
    </div>

    <hr class="spacing">

    <div class="home-banner bdd-primary-bg bg-transparent-mobile">
        <img src="<?php echo base_url() ?>assets/webpage/icons/12/new-logo.png" data-src="<?php echo base_url() ?>assets/webpage/images/Landing Page1439x900.jpg" class="w-100 img-fluid small--hide lazy">
        <div class="banner-mobile position-relative">
            <img src="<?php echo base_url() ?>assets/webpage/image-mobile/Landing-mobile.jpg" class="img-fluid medium-up--hide">
            <div class="bg-white p-25 w-75 medium-up--hide position-absolute text-banner">
                <p>We are passionate team to Excalate your business in digital.</p>
            </div>
        </div>
    </div>

    <div class="mw-100 w-100">
        <div class="row m-0">
            <!-- <div class="arrow-mobile medium-up--hide">
                <button type="button" class="btn bdd-secondary-btn"><img src="<?php echo base_url() ?>assets/webpage/icons/12/yellowleft_arrow_ic@3x.svg" class="img-fluid"></button>
                <button type="button" class="btn bdd-primary-btn"><img src="<?php echo base_url() ?>assets/webpage/icons/12/blackright_arrow_ic@3x.svg" class="img-fluid"></button>
            </div> -->
            <div class="col-md-5 width-42">
                <div class="img-minus small--hide">
                    <img data-aos="fade-right" src="<?php echo base_url() ?>assets/webpage/images/iphone-edit2.png" class="img-fluid">
                </div>
            </div>
            <div class="col-md-7 width-58 bdd-primary-bg ml-5-mobile">
                <div class="margin-custom small--hide">
                    <h3 data-aos="fade-left">
                        Not about HOW MUCH budget you spent, but HOW you spend them.
                    </h3>
                    <a data-aos="fade-left" data-aos-delay="250" href="<?= base_url('about') ?>">
                        <button type="button" class="btn bdd-secondary-btn mt-5">
                            About Us
                            <img src="<?php echo base_url() ?>assets/webpage/icons/12/yellowright_arrow_ic.png" class="pl-4 img-fluid" width="34">
                        </button>
                    </a>
                </div>
                <div class="margin-mobile-custom medium-up--hide p-25 h-500">
                    <div class="img-minus medium-up--hide">
                        <img data-aos="fade-right" src="<?php echo base_url() ?>assets/webpage/image-mobile/mobile-ip@2x.png" class="img-fluid">
                    </div>
                    <h4 class="mt-mobile-15">Our team consists of experts and experienced digital marketers. We are here to reach your goal through digital marketing.</h4>
                    <button type="button" class="btn bdd-secondary-btn mt-3">
                        Learn More
                        <img src="<?php echo base_url() ?>assets/webpage/icons/12/yellowright_arrow_ic.png" class="pl-4 img-fluid" width="34">
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- end -->

    <!-- what-we-do -->
    <div class="container container-fluid-mobile dmt-8em mt-mobile-5" id="what-we-do">
        <div class="heading-small mb-3">
            <span class="heading">What we do</span>
        </div>
        <h3 class="pb-3">
            Our method consists of multiple services and consultations.
        </h3>
        <div class="card-service mt-3">
            <div class="d-flex overflow-auto">
                <div class="col-12 col-md-3 pr-3">
                    <div data-aos="fade-right" data-aos-delay="200" class="card p-4 pt-2">
                        <img src="<?php echo base_url() ?>assets/webpage/illustrations/72/digital_marketing_optimize@2x.png" class="img-fluid" alt="..." width="80">
                        <div class="card-body mt-2 p-0">
                        <h5 class="card-title">Digital Advertising Strategy</h5>
                        <p class="card-text">
                            We create a suitable campaign, use optimum tools, and build action plan.
                        </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3 pr-3">
                    <div data-aos="fade-right" data-aos-delay="350" class="card p-4 pt-2">
                        <img src="<?php echo base_url() ?>assets/webpage/illustrations/72/digi_ads@2x.png" class="img-fluid" alt="..." width="80">
                        <div class="card-body mt-2 p-0">
                        <h5 class="card-title">Digital Advertising</h5>
                        <p class="card-text">
                            We manage your advertising platform and provide a monthly report.
                        </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3 pr-3">
                    <div data-aos="fade-right" data-aos-delay="500" class="card p-4 pt-2">
                        <img src="<?php echo base_url() ?>assets/webpage/illustrations/72/digital_marketing@2x.png" class="img-fluid" alt="..." width="80">
                        <div class="card-body mt-2 p-0">
                        <h5 class="card-title">Content Consultation</h5>
                        <p class="card-text">
                            We provide references and help you create better content.
                        </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3 pr-3">
                    <div data-aos="fade-right" data-aos-delay="650" class="card p-4 pt-2">
                        <img src="<?php echo base_url() ?>assets/webpage/illustrations/72/ecomm_web@2x.png" class="img-fluid" alt="..." width="80">
                        <div class="card-body mt-2 p-0">
                        <h5 class="card-title">Web Development</h5>
                        <p class="card-text">
                            We create an E-commerce website based on the needs of your brand.
                        </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end -->

    <!-- case-study -->
    <div class="overflow-hidden bbd-blue_dark-bg py-5 my-5 pmy-6em dmt-7em" id="case-studies">
        <div class="mw-100 w-100 text-center">
            <div class="heading-small mb-3">
                <span class="heading">Case Studies</span>
            </div>
            <h3 class="small--hide">
                Explore more about our partner success stories.
            </h3>
            <h3 class="medium-up--hide" style="margin-bottom: 65px; padding: 0 16px;">
                Meet Base Data Dashboard, Our specialize AI to analyse your business in digital.
            </h3>

            <div class="h-100 case-studies-slider owl-carousel owl-theme m-0 dml-n2 mt-5">
                @foreach ($results as $row)      
                @php
                    if (empty($row->logo)) {
                        $row->logo = 'default.png';
                    }
                @endphp              
                <div class="p-0 pl-2">
                    <!-- <a href="{{ base_url('case-study/' . str_replace(' ', '-', strtolower($row->category)) . '/' . str_replace(' ', '-', preg_replace('/:|&\s|,|;|\./', '', $row->title)) . '/' . $row->id) }}"> -->
                    <a href="#">
                        <div class="sc-card">
                            <img src="{{ !empty($row->img_path) ? base_url('assets/images/' . $row->img_path) : base_url('assets/images/default.png') }}" class="img-fluid overlay-img" style="height: 100%; object-fit: cover; width: 100%;">
                            <div class="brand-cs flex-column p-3">
                                <div class="d-flex w-100">
                                    <img src="<?php echo base_url('assets/images/logo/' . $row->logo) ?>" class="img-fluid mr-2" width="40">
                                    <span class="brand-title">
                                        {{ $row->name }}
                                    </span>
                                </div>
                                <p class="brand-title">
                                    {{ $row->title }}
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            <!--
            <a href="<?= base_url('case-study') ?>">
                <button type="button" class="btn bdd-primary-btn mt-5">
                    Explore More
                    <img src="<?php echo base_url() ?>assets/webpage/icons/12/blackright_arrow_ic.png" class="pl-4 img-fluid" width="34">
                </button>
            </a>
            -->

        </div>
    </div>
    <!-- end -->

    <!-- why-work -->
    <div class="container container-mobile-fluid bdd-why_work-bg ml-0" id="why-work">
        <div class="container">
            <div class="row py-5">
                <div class="col-md-6 col-12">
                    <div class="row mb-4">
                        <div class="col-md-6 col-6">
                            <div class="box-why-work p-20">
                                <a href="https://www.facebook.com/business/partner-directory/details?id=468056200558038" target="_blank" style="margin: auto;">
                                    <img src="<?php echo base_url() ?>assets/webpage/images/fbmp.jpeg" class="brand-partner img-fluid">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-6">
                            <div class="box-why-work p-20">
                                <a href="https://www.google.com/partners/agency?id=7344123065" target="_blank" style="width: 100%;">
                                    <img style="max-width: 130px; display: block; margin:auto;" src="<?php echo base_url() ?>assets/webpage/images/google_part.jpg" class="brand-partner img-fluid">
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6 col-6">
                            <div class="box-why-work p-20">
                                <img src="<?php echo base_url() ?>assets/webpage/images/tiktok-logo.png" class="brand-partner img-fluid">
                            </div>
                        </div>

                        <div class="col-md-6 col-6">
                            <div class="box-why-work p-20">
                                <img src="<?php echo base_url() ?>assets/webpage/images/shopify-logo.png" class="brand-partner img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-12 pt-4 pl-5 why-work">
                    <h3 data-aos="fade-left" data-aos-delay="200" class="text-white">
                        All strategies and advice are ???battle-tested??? for we are a team of business owners and certified professionals
                    </h3>
                    <a data-aos="fade-left" data-aos-delay="350" href="#footer">
                        <button type="button" class="btn bdd-primary-btn mt-5 mt-mobile-1">
                            Contact Us
                            <img src="<?php echo base_url() ?>assets/webpage/icons/12/blackright_arrow_ic.png" class="pl-4 img-fluid" width="34">
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- end -->

    @include('webpage.layouts.footer')
    
    @push('script')
        
    @endpush
@endsection