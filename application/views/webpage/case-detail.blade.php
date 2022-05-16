@extends('webpage.layouts.app')
@section('title', "Case | Boleh Dicoba Digital")
@section('content')
    @include('webpage.layouts.navbar')
    @php
        $url = $_SERVER['REQUEST_URI'];
        preg_match('/\d+$/', $url, $case_id);

        if (empty($result)) {
            $result = (object) array("once" => 0);
        }
    @endphp
    <?php //var_dump($result->result()) ?>
    <section id="case-detail">
        @foreach ($result->result() as $row)
            @switch(@$row->name)
                @case('category-and-title')
                    <!-- title case -->

                    <div class="container">
                        <div class="row">
                            <div class="col-md-1 col-sm-1">
                                <div class="text-left pt-25 pt-mobile-3 ">
                                    <img src="<?=base_url().'/assets/images/logo/'.$row->logo?>" class="img-fluid" >
                                </div>
                            </div>
                            <div class="col-md-11 col-sm-11">
                                <div class="title text-left p-25 p-mobile-3 ">
                                    <h3 class="w-75 w-small--100">{{ @$row->titlena }}</h3>
                                    <span class="heading text-secondary-small">{{ @$row->sub_title }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @break
                @case('banner')
                    <!-- image banner -->
                    <div class="banner">
                        <img src="{{ base_url() . 'assets/images/' . @$row->post_img }}" class="img-fluid small--hide w-100">
                        <img src="{{ base_url() . 'assets/images/' . @$row->post_img }}" class="img-fluid medium-up--hide p-25">
                    </div>

                    <hr class="spacing">
                @break
                @case('banner-centered')
                <div class="container">
                    <!-- image banner -->
                    <div class="banner">
                        <img src="{{ base_url() . 'assets/images/' . @$row->post_img }}" class="img-fluid small--hide w-100">
                        <img src="{{ base_url() . 'assets/images/' . @$row->post_img }}" class="img-fluid medium-up--hide p-25">
                    </div>

                    <hr class="spacing">
                </div>
                @break
                @case('description-with-side-sosmed')
                <div class="container">
                    <div class="row">
              
                      <!-- social media -->
                      <div class="col-sm-2">
                        <div class="small--hide social-media my-3 d-flex flex-column align-items-center">
                            @if (!empty(@$row->facebook))                                
                            <a href="https://instagram.com/{{ @$row->facebook }}" target="_blank" class="pb-3">
                              <img src="<?php echo base_url() ?>assets/webpage/images/wwd-fb@2x-edit.png" class="img-fluid">
                            </a>
                            @endif
                            @if (!empty(@$row->instagram))                                
                            <a href="https://facebook.com/{{ @$row->instagram }}" target="_blank" class="pb-3">
                                <img src="<?php echo base_url() ?>assets/webpage/images/wwd-ig@2x-edit.png" class="img-fluid">
                            </a>
                            @endif
                            @if (!empty(@$row->twitter))                                
                            <a href="https://twitter.com/{{ @$row->twitter }}" target="" class="pb-3">
                                <img src="<?php echo base_url() ?>assets/webpage/images/wwd-tw@2x-edit.png" class="img-fluid">
                            </a>
                            @endif
                        </div>
                      </div>
                      <!-- end -->
              
                      <!-- richtext -->
                      <div class="col-sm-9">
                          {!! @$row->description !!}
                      </div>
                      <!-- end -->
                    </div>
                </div>

                <hr class="spacing">
                @break
                @case('image-with-right-content')
                <!-- services -->
                <div class="container-full-width h-550 bg-light">
                    <div class="row">
                    <div class="col-sm-6 text-center small--hide">
                        <img src="{{ base_url() . 'assets/images/' . @$row->img_path }}" class="img-fluid">
                    </div>
                    <div class="col-sm-6 col-11 d-flex align-items-center w-small--100">
                        <div class="padding-large p-mobile-25">
                        <p class="heading text-secondary-small mb-2 text-uppercase">{{ @$row->sub_title }}</p>
                        <h3 class="w-75 w-small--100 mb-4">{{ @$row->title }}</h3>
                        <div class="w-75 w-small--100 mb-4">
                            @php echo @$row->description @endphp
                        </div>
                        <div class="row">
                            @foreach (explode(',', @$row->lists) as $item)                                
                            <div class="col-6 col-sm-5 font-14 pb-3">
                                <img src="<?php echo base_url() ?>assets/webpage/icons/18/check@3x.svg" class="pr-2">{{ $item }}
                            </div>
                            @endforeach
                        </div>
                        </div>
                    </div>
                    <div class="col-11">
                        <img src="{{ base_url() . 'assets/images/' . @$row->img_path }}" class="img-fluid">
                    </div>
                    </div>
                </div>

                <hr class="spacing">
                @break
                @case('reguler-description')
                    <!-- richtext -->
                    <div class="container">
                        {!! @$row->description !!}
                    </div>
                
                    <hr class="spacing">
                @break
                @case('clients-says')
                <!-- what our client says -->
                <div class="container">
                    <div class="text-left mb-3">
                    <div class="text-left d-flex flex-column">
                        <span class="heading text-secondary-small mb-4">WHAT OUR CLIENTS SAYS</span>
                        <h1>{!! @$row->description !!}</h1>
                    </div>
                    </div>
                    <div class="text-right d-flex flex-column">
                    <h5 class="font-medium bdd-font-blue">- {{ @$row->title }}</h5>
                    <h6>{{ @$row->sub_title }}</h6>
                    </div>
                </div>

                <hr class="spacing">
                @break
                @default
                @break                    
            @endswitch
        @endforeach

        <!-- <div class="container-full-width h-550 d-flex flex-column justify-content-center bg-light pb-mobile-5">
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
                    @foreach ($carousel_items->result() as $carousel_row)    
                    @if ($carousel_row->id == $case_id[0])
                        @continue;
                    @endif
                    <a href="#">
                        <div class="post">
                            @if (empty($carousel_row->img_path))
                            <img src="{{ base_url() . 'assets/images/default.png' }}" width="370" height="270">                                    
                            @else
                            <img src="{{ base_url() . 'assets/images/' . $carousel_row->img_path }}" width="370" height="270">
                            @endif
                            <div class="post-description">
                            <p><strong>{{ $carousel_row->title }}</strong></p>
                            <span class="text-secondary-small">
                                @php
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
                                @endphp
                            </span>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div> -->
        <div style="background-color: #FFB14C!important;" class=" pt-5 pb-5 text-center d-flex flex-column justify-content-center">
            <div class="container" style="background-color: #FFB14C!important;">
                <h2 style="color: #fff !important;">Start Using Our Services</h2>
                <p style="color: #fff !important;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                <a href="https://wa.me/6281805757585" class="btn bdd-third-btn btn-rounded" target="_blank">Reach Out Now <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
    </section>

    @include('webpage.layouts.footer')
@endsection