@extends('webpage.layouts.app')
@section('title', "News Detail | Boleh Dicoba Digital")
@section('content')
    @include('webpage.layouts.navbar')
    @php
    $url = $_SERVER['REQUEST_URI'];
    preg_match('/\d+$/', $url, $news_id);

    if (empty($result)) {
        $result = (object) array("once" => 0);
    }
    @endphp
    
    <section id="title-case">
        @foreach ($result->result() as $row)
            @switch($row->name)
                @case('category-and-title')
                    <!-- title case -->
                    <div class="container">
                        <div class="title text-left p-25 p-mobile-3 ">
                        <span class="heading text-secondary-small">{{ $row->sub_title }}</span>
                        <h3 class="w-75 w-small--100">{{ $row->title }}</h3>
                        </div>
                    </div>
                @break
                @case('banner')
                    <!-- image banner -->
                    <div class="container">
                        <div class="news-banner position-relative">
                            <img src="{{ base_url() . 'assets/images/' . $row->img_path }}" class="img-fluid w-100">
                        </div>
                    </div>

                    <hr class="spacing">
                @break
                @case('description-with-side-sosmed')
                    <div class="container">
                        <div class="row">
                
                        <!-- social media -->
                        <div class="col-sm-2">
                            <div class="small--hide social-media my-3 d-flex flex-column align-items-center">
                                @if (!empty($row->facebook))                                
                                <a href="https://facebook.com/{{ $row->facebook }}" target="_blank" class="pb-3">
                                <img src="<?php echo base_url() ?>assets/webpage/images/wwd-fb@2x-edit.png" class="img-fluid">
                                </a>
                                @endif
                                @if (!empty($row->instagram))                                
                                <a href="https://instagram.com/{{ $row->instagram }}" target="_blank" class="pb-3">
                                    <img src="<?php echo base_url() ?>assets/webpage/images/wwd-ig@2x-edit.png" class="img-fluid">
                                </a>
                                @endif
                                @if (!empty($row->twitter))                                
                                <a href="https://twitter.com/{{ $row->twitter }}" target="" class="pb-3">
                                    <img src="<?php echo base_url() ?>assets/webpage/images/wwd-tw@2x-edit.png" class="img-fluid">
                                </a>
                                @endif
                            </div>
                        </div>
                        <!-- end -->
                
                        <!-- richtext -->
                        <div class="col-sm-9">
                            {!! $row->description !!}
                        </div>
                        <!-- end -->
                        </div>
                    </div>

                    <hr class="spacing">
                @break
                @case('gallery')
                    <div class="gajelas">   
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-sm-2 small--hide"></div>
                                <div class="col-12 col-sm-9 second-banner position-relative">
                                    @php
                                        $index = 0;
                                        $length = count($gallery);
                                        @endphp
                                    @foreach ($gallery as $gallery_row)                        
                                    @if ($index == 0)
                                    <img src="<?= base_url('assets/images/gallery/' . $gallery_row->img_path) ?>" class="img-fluid" style="width: 100%" />
                                    <div class="row no-wrap pb-4 mt-4 thumbnail-container">
                                        @elseif ($index < $length)
                                            <div class="col-sm-2 col-4">
                                                <a href="#" class="thumbnail">
                                                    <img src="<?= base_url('assets/images/gallery/' . $gallery_row->img_path) ?>" class="img-fluid">
                                                </a>
                                            </div>
                                        @else
                                    </div>
                                        @endif
                                        @php
                                            $index++;
                                        @endphp
                                    @endforeach
                                </div>                 
                            </div>
                        </div>
                    </div>

                    <hr class="spacing">
                @break
                @case('reguler-description')
                    <!-- richtext -->
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-2 small--hide"></div>
                            <div class="col-12 col-sm-9">
                                {!! $row->description !!}
                            </div>
                        </div>
                    </div>
                
                    <hr class="spacing">
                @break
                @default                  
                    <!-- what our client says -->
                    <h1>
                        Comments Section
                    </h1>

                    <hr class="spacing">
                @break   
            @endswitch
        @endforeach
                                         
        <div class="container-full-width h-550 d-flex flex-column justify-content-center bg-light pb-mobile-5">
            <div class="container custom-position position-relative pt-mobile-5">
            <div class="title-post pb-3">
                <h4 class="small--hide">More Articles</h4>
                <h4 class="medium-up--hide text-center">Articles Suggestion</h4>
                <div class="button opacity-0 medium-up--hide text-center">
                    <button type="button" class="btn"> <img src="<?php echo base_url() ?>assets/webpage/icons/12/yellowleft_arrow_ic@3x.svg" class="img-fluid"> </button>
                    <button type="button" class="btn bdd-primary-btn"> <img src="<?php echo base_url() ?>assets/webpage/icons/12/blackright_arrow_ic@3x.svg" class="img-fluid"> </button>
                </div>
            </div>
            <div class="append-nav"></div>
                <div class="news-detail owl-carousel owl-theme">
                    @foreach ($carousel_items->result() as $carousel_row)    
                    @if ($carousel_row->id == $news_id)
                        @continue;
                    @endif
                    <!-- <a href="<?php echo base_url() . 'news-and-update/' . str_replace(' ', '-', strtolower($carousel_row->category)) . '/' . str_replace(' ', '-', preg_replace('/:|&\s|,|;|\./', '', $carousel_row->title)) . '/' . $carousel_row->id ?>"> -->
                    <a href="#">
                        <div class="post">
                            @if (empty($carousel_row->img_path))
                            <img src="{{ base_url() . 'assets/images/default.png' }}" width="370" height="270">                                    
                            @else
                            <img src="{{ base_url() . 'assets/images/' . $carousel_row->img_path }}" width="370" height="270">
                            @endif
                            <div class="post-description">
                            <p>{{ $carousel_row->title }}</p>
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
                                        echo $months . ' months ago';
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
        </div>
    </section>
    @include('webpage.layouts.footer')
    @foreach ($result->result() as $row)
        @switch($row->name)
            @case('category-and-title')
            <script type="application/ld+json">
              {
                "@context": "http://schema.org",
                "@type": "BlogPosting",
                "mainEntityOfPage": "{{ $url }}",
                "articleSection": "{{ $row->sub_title }}",
                "keywords": "",
                "headline": "{{ $row->title }}",
                "description": "{{ $row->description }}",
                "dateCreated": "{{ $row->created_at }}",
                "datePublished": "{{ $row->created_at }}",
                "dateModified": "{{ $row->created_at }}",
                "image": {
                  "@type": "ImageObject",
                  "url": "{{ base_url() . 'assets/images/' . $row->img_path }}",
                  "image": "{{ base_url() . 'assets/images/' . $row->img_path }}",
                  "name": "{{ $row->title }}",
                  "width": "1024",
                  "height": "1024"
                },
                "author": {
                  "@type": "Person",
                  "name": "Bisdev",
                  "givenName": "Bisdev team",
                  "familyName": "Boleh Dicoba Digital"
                },
                "publisher": {
                  "@type": "Organization",
                  "name": "Boleh Dicoba Digital"
                },
                "commentCount": 0,
                "comment": []
              }
            </script>
            @break   
        @endswitch
    @endforeach
@endsection