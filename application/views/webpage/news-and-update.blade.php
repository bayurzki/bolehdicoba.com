@extends('webpage.layouts.app')
@section('title', "News & Update | Boleh Dicoba Digital")
@section('content')
    @push('stylesheet')
        <link
          rel="stylesheet"
          href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        />
    @endpush
    @include('webpage.layouts.navbar', ['news' => 'active'])
    @php
    if (empty($data)) {
        $data = (object) array("once" => 0);
    }
    @endphp

    <hr class="spacing small--hide"></hr>

    <!-- section recently news -->
    <section id="recently-news">
      <div class="container container-no-left">
        <div class="row justify-content-center">
          @foreach ($data as $row)        
          <div class="col-sm-7 small--hide">
            <img src="<?php echo base_url('assets/images/' . @$row->img_path) ?>" width="100%">
          </div>
          <div class="col-sm-5 d-flex align-items-center padding-wwd pt-mobile-5 pb-mobile-4">
            <div>
              <span data-aos="fade-left" class="heading text-secondary-small">{{ @$row->category }}</span>
              <h1 data-aos="fade-left" data-aos-delay="200" class="title font-24">Collection of short readings about digital marketing fundamentals, curated news, and exciting stories.</h1>
              <a href="@php echo base_url('news-and-update/' . str_replace(' ', '-', strtolower(@$row->category)) . '/' . str_replace(' ', '-', preg_replace('/:|&\s|,|;|\./', '', @$row->title)) . '/' . @$row->id); @endphp"> 
                <button type="button" class="btn bdd-primary-btn mt3 text-uppercase mt-mobile-3">
                  read more 
                  <img src="<?php echo base_url() ?>assets/webpage/icons/12/blackright_arrow_ic.png" class="pl-4 img-fluid">
                </button>
              </a> 
            </div>
          </div>
          <div class="col mt-mobile-3 pl-mobile-0 pr-mobile-5 medium-up--hide">
            <img src="<?php echo base_url('assets/images/' . @$row->img_path) ?>" class="img-fluid">
          </div>
          @endforeach
        </div>
      </div>
    </section>
    <!-- end section -->

    <hr class="spacing">

    <!-- section our streatments -->
    <section id="our-streatments">
      <div class="container p-25">
          @foreach ($data as $row)              
          <h1 data-aos="fade-left" data-aos-delay="200" class="our-streatment font-20">“{{ @$row->streatments }}”</h1>
          @endforeach
      </div>
    </section>
    <!-- end section -->

    <hr class="spacing">

    <!-- section popular post -->
    <!-- <section id="popular-post">
      <div class="container-full-width h-550 d-flex flex-column justify-content-center bg-light">
        <div class="custom-position px-mobile-3 py-mobile-5 position-relative">
          <div class="title-post pb-3 pt-mobile-3 pb-mobile-3">
            <h4 class="small--text-center">Popular Posts</h4>
            <div class="py-2 opacity-0 medium-up--hide text-center">
              <button type="button" class="btn bg-white">
                <img src="<?php echo base_url() ?>assets/webpage/icons/12/blackright_arrow_ic@3x.svg" class="img-fluid" style="opacity: 0.5; transform: rotate(-180deg);">
              </button>
              <button type="button" class="btn bdd-primary-btn">
                <img src="<?php echo base_url() ?>assets/webpage/icons/12/blackright_arrow_ic@3x.svg" class="img-fluid">
              </button>
            </div>
          </div>
          <div class="posts position-relative">
            <div class="popular-post owl-carousel owl-theme">
              @foreach ($results as $row)                
              <div class="posts-content">
                <a href="{{ base_url( 'news-and-update/' . str_replace(' ', '-', strtolower(@$row->category)) . '/' . str_replace(' ', '-', preg_replace('/:|&\s|,|;|\./', '', @$row->title)) . '/' . @$row->id) }}">
                <a href="#">
                @if (empty($row->img_path))                  
                  <img src="<?php echo base_url() ?>assets/images/default.png">
                @else
                  <img src="<?php echo base_url('assets/images/' . $row->img_path) ?>">
                @endif
                </a>
                <div class="post-description">
                  <p><strong>{{ @$row->title }}</strong></p>
                  <span class="text-secondary-small">
                    @if (!empty($row->created_at))
                    @php
                      // Declare timestamps
                      $created_at = new DateTime( $row->created_at );
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
                    @endif
                  </span>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </section> -->
    <!-- end section -->

    <hr class="spacing">

    <!-- section news and blog -->
    <section id="news-and-blog">
      <div class="container">
        <div class="header-custom row mb-4">
          <!-- Mobile menu -->
          <ul id="mobile-menu" class="blog-nav d-flex p-0 overflow-mobile-auto medium-up--hide">
            <li class="blog-menu"> 
              <a href="#" class="nav-link active"> 
                All
              </a>
            </li>
          <!-- End of mobile menu -->            
            @php
                $option = array();
            @endphp
            @foreach ($results as $row)
              @if (!in_array($row->category, $option))                
              <li id="category-{{ $row->id }}-{{ $row->category }}" class="blog-menu"> 
                <a href="#" class="nav-link"> 
                  {{ $row->category }}
                </a>
              </li>
              @endif
              @php
                array_push($option, $row->category);                  
              @endphp
            @endforeach
          </ul>

          <h3 class="title-post h3 mb-3 col-sm-9">News & Blogs</h3>
          <div class="filter col-sm-3 pt-mobile-2">
            <select id="filter-menu" class="mb-mobile-5">      
              <option value="latest">Latest Post</option>     
            </select>
          </div>
        </div>
        <!-- Desktop menu -->
        <ul id="desktop-menu" class="blog-nav p-0 hide" style="display: none;">          
          <li class="blog-menu"> 
            <a href="#" class="nav-link active" data-category=""> 
              All
            </a>
          </li>
        </ul>
        <!-- End of desktop menu -->            
        <div class="row news-update" id="filtered-list">          
        </div>
      </div>
      <!-- pagination -->
        <div class="row">
          <div class="pagging">
            <nav aria-label="Page navigation example">
              <ul class="pagination justify-content-center align-items-center pt-5" id="pagination" style="display: none;">
              </ul>
            </nav>
          </div>
        </div>
        <!-- end of pagination -->
      </section>
    <!-- end section -->

    @include('webpage.layouts.footer')
    @push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous"></script>
    <script type="text/javascript">
    $(document).ready(function() {
      let filterTag = document.getElementById('filtered-list')
      let pagination = document.getElementById('pagination')
      let blogNav = document.getElementsByClassName('blog-nav')

      const getPagingRange = (current, { min = 1, total = 20, length = 5 } = {}) => {
        if (length > total) length = total;

        let start = current - Math.floor(length / 2);
        start = Math.max(start, min);
        start = Math.min(start, min + total - length);
      
        return Array.from({length: length}, (el, i) => start + i);
      }
      
      const getTotalPage = (total, limit) => {    
        let i = 0,
            temp = total,
            pageNumber = []

        if (total < limit) {
          pageNumber.push(1)
        } else {
          while(temp >= limit) {
            temp = temp - limit
            pageNumber.push(++i)
          }

          if (temp !== 0) {
            const addOne = pageNumber[pageNumber.length - 1] + 1
            pageNumber.push(addOne)
          }
        }

        return pageNumber.length
      }

      const getNewsByCategory = (val = '', page = 1) => {
        const limit = 9
        
        const data = {
          limit,
          offset: (page - 1) * limit,
          page
        }

        $.ajax({
          dataType: "JSON",
          url: "<?= base_url('post/getNewsByCategory/') ?>" + val,
          method: "POST",
          data: data,
          beforeSend() {
            filterTag.innerHTML = `
            <div class="text-center fa-5x">
              <i class="fas fa-spinner fa-spin"></i>
            </div>
            `
          },
          success(res) {
            let categoryTemp = []

            filterTag.innerHTML = ``
            pagination.innerHTML = ``
            for (let i = 0; i < blogNav.length; i++) {
              blogNav[i].innerHTML = `
                <li class="blog-menu"> 
                  <a href="#" class="nav-link active" data-category=""> 
                    All
                  </a>
                </li>
              `         
            }

            // remove active category if not default
            if (val !== '') {
              $('.blog-menu a.active').toggleClass('active')
            }
            
            // All category
            // res.categories.map((item, i) => {
            //   if (!categoryTemp.includes(item.category)) {
            //     for (let id = 0; id < blogNav.length; id++) {
            //       blogNav[id].innerHTML += `
            //         <li key="${id}" class="blog-menu"> 
            //           <a href="#" class="nav-link ${item.category.toLowerCase() == val.toLowerCase() ? 'active' : ''}" data-category="${item.category}"> 
            //             ${item.category}
            //           </a>
            //         </li>
            //       `
            //     }

            //   categoryTemp.push(item.category)
            //   }
            // })

            // Filtered Lists
            res.filtered.map((item, i) => {
              if (!item.img_path) item.img_path = 'default.png'

              let url = `${item.category.toLowerCase().replace(/\s/g, '-')}/${item.title.replace(/[&\/\\#,+()$~%.'":*?<>{}-]/g, '').replace(/\s/g, '-')}/${item.id}`
            
              // temp
              // <a href="<?= base_url('news-and-update/${url}') ?>">

              const created_at = new moment(item.created_at)
              const current = new moment()
              const hours_diff = current.diff(created_at, 'hours')
              const days_diff = current.diff(created_at, 'days')
              const months_diff = current.diff(created_at, 'months')
              const years_diff = current.diff(created_at, 'years')
              let diff
              
              if (years_diff > 0) {
                diff = years_diff + " years ago"
              } else if (months_diff > 0) {
                diff = months_diff + " months ago"                
              } else if (days_diff > 0) {
                if (days_diff < 2) {
                  diff = "Yesterday"                  
                } else {                  
                  diff = days_diff + " days ago"                
                }
              } else if (hours_diff < 24) {
                diff = hours_diff + " hours ago"
              }

              filterTag.innerHTML += `                 
                 <div key="` + url +`" class="mb-4 col-6 col-sm-8 col-md-6 col-lg-4">
                   <div style="overflow: hidden;">
                      <a href="news-and-update/` + url.toLowerCase() + `">
                        <img class="card-img" src="<?php echo base_url() ?>assets/images/${item.img_path}" class="img-fluid" />
                      </a>
                      <div class="card-body">
                        <a href="news-and-update/` + url.toLowerCase() + `">
                          <h5 class="card-title" style="border-bottom: 0;">${item.title}</h5>
                        </a>
                      </div>
                      <div class="card-footer text-muted d-flex justify-content-between bg-transparent border-top-0">
                        <div class="views text-secondary-small">    
                          ${diff}
                        </div>
                      </div>
                    </div>
                  </div>
                `
            })            

            // Paginating
            // method 1
            pageNumber = getPagingRange(parseInt(res.page), {
              total: getTotalPage(res.all_cases, limit), 
              length: limit 
            })

            pageNumber.map(number => 
              pagination.innerHTML += `
                <li class="page-item ${parseInt(res.page) == number ? 'active' : ''}">
                  <a class="page-link" href="#" data-number="${number}">
                    ${number}
                  </a>
                </li>`
            )
          }
        })
      }

      // Run first time
      getNewsByCategory('')

      // get category selection
      $('#filter-menu').change(function() {
        let selectedVal = $(this).val();        

        getNewsByCategory(selectedVal)
      })            

      // do pagination
      $(window).load(function() {        
        $(document).on('click', '.page-item a.page-link', function(e) {
          e.preventDefault()

          const page = $(this).data('number')

          getNewsByCategory($('.blog-menu a.nav-link').data('category'), page)
        })

        $(document).on('click', '.blog-menu a.nav-link', function (e) {
          e.preventDefault()

          const category = $(this).data('category')
          
          getNewsByCategory(category)
        })
      })
    })
    </script>        
    @endpush
@endsection