@extends('webpage.layouts.app')
@section('title', "Case Study | Boleh Dicoba Digital")
@section('content')
    @push('stylesheet')
        <link
          rel="stylesheet"
          href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        />
    @endpush
    @include('webpage.layouts.navbar', ['casestudy' => 'active'])
    @php
    if (empty($data)) {
        $data = (object) array("once" => 0);
    }
    @endphp
    <hr class="spacing small--hide">

    <!-- section banner -->
    <section id="niion-banner">
      <div class="container container-no-left pl-mobile-0">
        <div class="row justify-content-center justify-content-end">
          @foreach ($data as $row)                
          <div class="col-sm-5 small--hide">
              <img src="<?php echo base_url() . 'assets/images/' . $row->img_path ?>" width="605" height="650">              
          </div>
          <div class="col-sm-7 d-flex align-items-center padding-about-us pt-mobile-5">
            <div class="pl-mobile-3 pb-mobile-4">              
                <span data-aos="fade-left" data-aos-delay="200" class="heading text-secondary-small">{{ $row->category }}</span>
                <h1 data-aos="fade-left" data-aos-delay="350"><span style="text-transform: uppercase;font-weight: bold;">{{ $row->name }}</span>: Deliver the value of #CarryNewFun to reach the right audience.</h1>
                <h2 data-aos="fade-left" data-aos-delay="350" class="medium-up--hide">{{ $row->title }}</h2>
                <!-- <a href="@php echo base_url('case-study/' . str_replace(' ', '-', strtolower($row->category)) . '/' . str_replace(' ', '-', preg_replace('/:|&\s|,|;|\.|#/', '', $row->title)) . '/' . $row->id); @endphp" class="btn bdd-primary-btn mt-5 small--hide" style="font-family: Gelion-SemiBold;">Read More <img src="<?php echo base_url() ?>assets/webpage/icons/12/blackright_arrow_ic@3x.svg"> </a>
                <a href="@php echo base_url('case-study/' . str_replace(' ', '-', strtolower($row->category)) . '/' . str_replace(' ', '-', preg_replace('/:|&\s|,|;|\./', '', $row->title)) . '/' . $row->id); @endphp" class="btn bdd-primary-btn mt-3 medium-up--hide" style="font-family: Gelion-SemiBold;">See Case Studies <img src="<?php echo base_url() ?>assets/webpage/icons/12/blackright_arrow_ic@3x.svg"> </a>                 -->
            </div>
          </div>
          <div class="banner-mobile col-11 pl-mobile-0 medium-up--hide">
            <img src="<?php echo base_url() ?>assets/webpage/image-mobile/mbl-cs-banner@2x.png" class="img-fluid">
          </div>
          @endforeach
        </div>
      </div>
    </section>
    <!-- end section -->

    <hr class="spacing">

    <!-- section richtext  -->
    @if (!empty($component))        
    @php
        $count = 0
    @endphp
    @foreach ($component as $row)
    @if ($row->name == 'clients-says' && $count == 0)        
    <section id="what-out-client-says">
      <div class="container">
        <div class="text-left mb-3">
          <div class="text-left d-flex flex-column">
            <span data-aos="fade-right" data-aos-delay="200" class="heading text-secondary-small mb-4">WHAT OUR CLIENTS SAYS</span>
            <h1 data-aos="fade-right" data-aos-delay="350" class="small--hide">{!! $row->description !!}</h1>
            <h3 data-aos="fade-right" data-aos-delay="350" class="medium-up--hide">{!! $row->description !!}</h3>
          </div>
        </div>
        <div class="text-right d-flex flex-column">
          <h5 data-aos="fade-left" data-aos-delay="350" class="font-medium bdd-font-blue small--hide">- {{ $row->sub_title }}</h5>
          <h5 data-aos="fade-left" data-aos-delay="350" class="font-medium bdd-font-blue medium-up--hide">- {{ $row->title }}</h5>
          <p data-aos="fade-left" data-aos-delay="350" >NIION - Founder & CEO</p>
        </div>
      </div>
    </section>
    @php
        $count++;
    @endphp
    @endif
    @endforeach
    @endif
    <!-- end section -->

    <!-- section case studies -->
    <section id="case-studies">
      <div class="bbd-blue_dark-bg py-5 mt-5 pmy-6em dmt-7em" id="case-studies">
  			<div class="mw-100 w-100 text-center">
  				<div class="heading-small mb-3">
  					<span class="heading">Case Studies</span>
  				</div>
  				<h3 class="small--hide">
  					Explore more about our partner success stories.
  				</h3>
  				<h3 class="px-4 medium-up--hide">
  					Meet Base Data Dashboard, Our specialize AI to analyse your business in digital.
  				</h3>
  				<div class="case-studies-slider owl-carousel owl-theme m-0 dml-n2 mt-5">
          @foreach ($results as $row)            
          @php
          if (empty($row->img_path)) {
            $row->img_path = 'default.png';
          }
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
          
          <!-- <a href="@php echo base_url() . 'case-study/' . str_replace(' ', '-', strtolower($results[0]->category)) . '/' . str_replace(' ', '-', preg_replace('/:|&\s|,|;|\./', '', $results[0]->title)) . '/' . $results[0]->id @endphp">
            <button type="button" class="btn bdd-primary-btn mt-5">
                Explore More
                <img src="<?php echo base_url() ?>assets/webpage/icons/12/blackright_arrow_ic.png" class="pl-4 img-fluid" width="34">
            </button>
          </a> -->
  			</div>
  		</div>
    </section>
    <!-- end section -->

    <!-- section Case Studies -->
    <!--
    <section id="news-and-blog">
      <div class="container">
        <div class="header-custom row">
          <span class="text-secondary-small">OUR CASE STUDIES</span>
          <h3 class="title-post h3 mb-3 col-sm-9">We take digital experiences to the next level</h3>
          <div class="filter col-sm-3">
            <select id="filter-menu" class="selectpicker">              
              @php
                  $temp = '';
                  $categories = array();
              @endphp
              @foreach ($results as $row)  
              @if (!in_array($row->category, $categories))                  
              @php
                array_push($categories, $row->category);
              @endphp
              <option value="{{ $row->category }}">{{ $row->category }}</option>
              @endif
              @php
                  $temp = $row->category;
              @endphp
              @endforeach
            </select>
          </div>
        </div>
        <div class="mb-4"></div>
        <div class="row case-studies" id="filtered-list"></div>
        <div class="row">
          <div class="pagging">
            <nav aria-label="Page navigation example">
              <ul class="pagination justify-content-center align-items-center pt-5" id="pagination">
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </section>
  -->
    <!-- end section -->

    @include('webpage.layouts.footer')
    @push('script')
    <script type="text/javascript">
    $(document).ready(function() {
      let filterTag = document.getElementById('filtered-list')
      let pagination = document.getElementById('pagination')

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

      const getCaseByCategory = (val = '', page = 1) => {
        const limit = 9
        
        const data = {
          limit,
          offset: (page - 1) * limit,
          page
        }

        $.ajax({
          dataType: "JSON",
          url: "<?= base_url('post/getCaseByCategory/') ?>" + val,
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

            filterTag.innerHTML = ``
            pagination.innerHTML = ``

            res.filtered.map((item, i) => {
              if (!item.img_path) item.img_path = 'default.png'
              // let url = `${item.category.toLowerCase().replace(/\s/g, '-')}/${item.title.replace(/:|&\s|,|;|\./g, '').replace(/\s/g, '-')}/${item.id}`

              // temp
              // <a href="<?= base_url('case-study/${url}') ?>">

              filterTag.innerHTML += `
                <div key="${new Date().getTime()}" class="case-studies col-6 col-sm-8 col-md-6 col-lg-4 mb-4">
                  <div style="overflow: hidden;">
                    <a href="#">
                      <div class="img-box">
                        <img class="card-img" src="<?php echo base_url(); ?>assets/images/${item.img_path}" class="img-fluid">
                      </div>
                    </a>
                      <div class="card-body">
                        <span class="text-secondary-small">${item.category}</span>
                        <div class="mb-3"></div>
                        <h5 class="card-title" style="border-bottom: 0;">${item.title}</h5>
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
      getCaseByCategory()

      // get category selection
      $('#filter-menu').change(function() {
        let selectedVal = $(this).val();        

        getCaseByCategory(selectedVal)
      })            

      // do pagination
      $(window).load(function() {        
        $(document).on('click', '.page-item a.page-link', function(e) {
          e.preventDefault()

          const page = $(this).data('number')

          getCaseByCategory($('#filter-menu').val(), page)
        })
      })
    })
    
    </script>
    @endpush
@endsection