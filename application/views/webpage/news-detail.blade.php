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
    
    <section id="title-case" class="container">
        <div class="row">
            <div class="col-md-8 col-sm-12"> 
                @foreach ($result->result() as $row)
                    @switch($row->name)
                        @case('category-and-title')
                            <!-- title case -->
                            <div class="title text-left pt-25 p-mobile-3 ">
                                <span class="heading text-secondary-small">{{ $row->sub_title }}</span>
                                <h3 class="w-75 w-small--100">{{ $row->title }}</h3>
                            </div>
                        @break
                        @case('banner')
                            <!-- image banner -->
                            <div class="news-banner position-relative">
                                <img src="{{ base_url() . 'assets/images/' . $row->img_path }}" class="img-fluid w-100">
                            </div>

                            <hr class="spacing">
                        @break
                        @case('description-with-side-sosmed')
                            {!! $row->description !!}

                            <hr class="spacing">
                        @break
                        @case('gallery')
                            <div class="gajelas">  
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

                            <hr class="spacing">
                        @break
                        @case('reguler-description')
                            <!-- richtext -->
                            {!! $row->description !!}
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

                <div class="row bottom-detail-news">
                    <div class="col-md-7">
                        <?php 
                        $pb_share = 'pb-5';
                        if ($newsna->tags != NULL) {
                        $tags = explode(',', $newsna->tags);
                        $pb_share = '';
                        ?>
                        <div class="tags">
                            <span class="title">Tags</span>
                            <span class="content">
                            <?php
                            for ($i=0; $i < sizeof($tags); $i++) { 
                                echo '<span>'.$tags[$i].'</span>';
                            }
                            ?>        
                            </span>
                        </div>
                        <?php } ?>
                        <?php 
                        if ($newsna->category != NULL) {?>
                        <div class="category-detail">
                            <span class="title">Categories</span>
                            <span class="content"><?=$newsna->category?></span>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="col-md-5 share mb-mobile-5 <?=$pb_share?>">
                        <span class="title">Share</span>
                        <div class="icon-sosmed">
                            <a href="<?='https://twitter.com/intent/tweet?text='.base_url().''.$_SERVER['REQUEST_URI']?>"><img src="<?=base_url().'/assets/webpage/images/tw.png'?>" width="30" /></a>
                            <a href="<?='https://www.facebook.com/sharer/sharer.php?u='.base_url().''.$_SERVER['REQUEST_URI']?>"><img src="<?=base_url().'/assets/webpage/images/fb.png'?>" width="30" /></a>
                            <a href="#" onclick="copy()"><img src="<?=base_url().'/assets/webpage/images/link.png'?>" width="30" /></a>
                        </div>
                    </div>
                </div>
            </div> 
            <div class="col-md-4 small--hide">
                <!-- title case -->
                <div class="featured-news pt-25 pl-3">
                    <div class="title text-left">
                        <h3 class="w-75 w-small--100">Featured News</h3>
                    </div>
                    <div class="list-news">
                        @foreach ($featNews->result() as $carousel_row)    
                        @if ($carousel_row->id == $news_id)
                            @continue;
                        @endif
                        <div class="row pt-5">
                            <div class="col-md-7 mt-2">
                                <div class="list-title">{{ $carousel_row->title }}</div>
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
                            <div class="col-md-5" style="max-height: 110px; overflow: hidden;">
                                @if (empty($carousel_row->img_path))
                                <img src="{{ base_url() . 'assets/images/default.png' }}" class="img-fluid">                                    
                                @else
                                <img src="{{ base_url() . 'assets/images/' . $carousel_row->img_path }}" class="img-fluid">
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>                             
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="container-full-width d-flex flex-column justify-content-center bg-light pb-mobile-5">
                    <div class="position-relative pt-5">
                        <div class="title-post pb-3">
                            <h4 class="text-left">Related Articles</h4>
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

<script type="text/javascript">
    function copy(){
        /* Get the text field */
          var copyText = <?=base_url().''.$_SERVER['REQUEST_URI']?>;

          /* Select the text field */
          copyText.select();
          copyText.setSelectionRange(0, 99999); /* For mobile devices */

           /* Copy the text inside the text field */
          navigator.clipboard.writeText(copyText.value);
          console.log(copyText.value)
    }
</script>