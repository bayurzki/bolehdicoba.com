@extends('webpage.layouts.app')
@section('title', "About | Boleh Dicoba Digital")
@section('content')
    @include('webpage.layouts.navbar', ['about' => 'active'])
    
    <hr class="spacing small--hide">

    <!-- section banner -->
    <section id="what-we-do">
      <div class="container container-no-left small--hide">
        <div class="row justify-content-center">
          <div class="col-sm-5">
            <img src="<?php echo base_url() ?>assets/webpage/images/About Us 1210x1300.jpg" class="img-fluid">
          </div>
          <div class="col-sm-7 d-flex align-items-center padding-wwd">
            <div data-aos="fade-left">
              <span class="heading text-secondary-small">OUR METHOD</span>
              <h1>Create short term impacts while building long term values through performance branding.</h1>
            </div>
          </div>
        </div>
      </div>
      <div class="medium-up--hide">
        <div class="row">
          <div class="col-sm d-flex flex-column align-items-center mt-mobile-5 px-5">
            <div data-aos="fade-left">
              <span class="heading text-secondary-small">OUR METHOD</span>
              <h1>Create short term impacts while building long term values through performance branding.</h1>
            </div>
            <hr class="spacing">
          </div>
          <div class="col-sm w-small--90">
            <img src="<?php echo base_url() ?>assets/webpage/images/About Us 1210x1300.jpg" class="img-fluid">
          </div>
        </div>
      </div>
    </section>
    <!-- end section -->

    <hr class="spacing">

    <!-- section benefit -->
    <div class="container container-fluid-mobile" id="benefit">
      <div class="row align-items-center">
        <div class="col-md-6">
          <span data-aos="fade-right" data-aos-delay="200" class="heading text-secondary-small">OUR VALUES</span>
          <h3 data-aos="fade-right" data-aos-delay="250">Actionable strategies with simple delivery and clear measurement.</h3>
          <p data-aos="fade-right" data-aos-delay="400" class="mt-4 mb-5">
            From founded in 2017, we are a team of practitioners. We know the game. We play the game. We live in the game.
            <br/><br/>
            Effective actions means exponential growth, while holistic understanding will maintain it. Our values help us to maintain both for our clients.
          </p>
        </div>
        <!-- first -->
        <div class="col-md-5">
          <div class="mt-6-custom">
            <div class="row mb-4 mb-mobile-2">
              <div data-aos="fade-left" data-aos-delay="300" class="col-6 col-sm-5">
                <img src="<?php echo base_url() ?>assets/webpage/icons/18/check@3x.svg">
                <span>Collaboration</span>
              </div>
              <div data-aos="fade-left" data-aos-delay="450" class="col-6 col-sm-5">
                <img src="<?php echo base_url() ?>assets/webpage/icons/18/check@3x.svg">
                <span>Communication</span>
              </div>
            </div>
            <!-- second -->
            <div class="row mb-4 mb-mobile-2">
              <div data-aos="fade-left" data-aos-delay="600" class="col-6 col-sm-5">
                <img src="<?php echo base_url() ?>assets/webpage/icons/18/check@3x.svg">
                <span>Reliability</span>
              </div>
              <div data-aos="fade-left" data-aos-delay="750" class="col-6 col-sm-5">
                <img src="<?php echo base_url() ?>assets/webpage/icons/18/check@3x.svg">
                <span>Problem Solving</span>
              </div>
            </div>
            <!-- third -->
            <div class="row mb-4 mb-mobile-2">
              <div data-aos="fade-left" data-aos-delay="900" class="col-6 col-sm-5">
                <img src="<?php echo base_url() ?>assets/webpage/icons/18/check@3x.svg">
                <span>Progressive</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end section -->

    <hr class="spacing">

    <!-- section our culture -->
    <div class="container container-no-right" id="our-culture">
      <div class="row p-mobile-3 p-desktop-5 position-relative zindex-1">
         <div class="bdd-primary-bg p-absolute"></div>
          <div class="col-lg-7 col-12">
              <div class="row">
               <div class="col-1 small--hide"></div>
                <div class="col-3">
                    <img src="<?php echo base_url() ?>assets/webpage/image-mobile/mbl-abt-image-1@2x.png" class="img-fluid medium-up--hide">
                    <img src="<?php echo base_url() ?>assets/webpage/images/about-image-1@2x.png" class="img-fluid small--hide">
                </div>
                <div class="col-3">
                    <img src="<?php echo base_url() ?>assets/webpage/image-mobile/mbl-abt-image-2@2x.png" class="img-fluid medium-up--hide">
                    <img src="<?php echo base_url() ?>assets/webpage/images/about-banner-2@2x.png" class="img-fluid small--hide">
                </div>
                <div class="col-5">
                    <img src="<?php echo base_url() ?>assets/webpage/image-mobile/mbl-abt-image-3@2x.png" class="img-fluid medium-up--hide">
                    <img src="<?php echo base_url() ?>assets/webpage/images/about-banner-3@2x.png" class="img-fluid small--hide">
                </div>
             </div>
          </div>
          <div class="col-lg-5 col-12">
            <div class="col-md-12 mx-auto mt-mobile-5 p-desktop-4">
              <div class="description pl-mobile-5">
                <span data-aos="fade-left" class="heading text-secondary-small">OUR CULTURE</span>
                <h4 data-aos="fade-left" data-aos-delay="200">Inform the truth, talk in numbers, and aim for continuous improvement.</h4>
                <h4 data-aos="fade-left" data-aos-delay="350">We listen carefully and tailor every strategy. We are always open to every condition and seek to create better results by refusing to settle on a single approach. Our culture is growth.</h4>
              </div>
            </div>
          </div>
        <!-- <div class="col-sm-6">
          <div class="row position-absolute mt-mobile-5">
            <div class="col-sm-2 col-3">
              <img src="<?php echo base_url() ?>assets/webpage/image-mobile/mbl-abt-image-1@2x.png" class="img-fluid medium-up--hide">
              <img src="<?php echo base_url() ?>assets/webpage/images/about-image-1@2x.png" class="img-fluid small--hide">
            </div>
            <div class="col-sm-2 col-3">
              <img src="<?php echo base_url() ?>assets/webpage/image-mobile/mbl-abt-image-2@2x.png" class="img-fluid medium-up--hide">
              <img src="<?php echo base_url() ?>assets/webpage/images/about-banner-2@2x.png" class="img-fluid small--hide">
            </div>
            <div class="col-sm-3 col-5">
              <img src="<?php echo base_url() ?>assets/webpage/image-mobile/mbl-abt-image-3@2x.png" class="img-fluid medium-up--hide">
              <img src="<?php echo base_url() ?>assets/webpage/images/about-banner-3@2x.png" class="img-fluid small--hide">
            </div>
          </div>
        </div>
        <div class="col-sm-6 bdd-primary-bg h-600 ml-5-mobile">
          <div class="col-md-7 mx-auto mt-mobile-15 p-4">
            <div class="description">
              <span class="heading text-secondary-small">OUR CULTURE</span>
              <h3>We will align our work with your needs and deliver on the promise to care for your brand better than anyone else.</h3>
              <p>When we get into the office each morning, we walk past this mission statement and our clients’ real dreams. This means that we will align our work with your needs and deliver on the promise to care for your brand better than anyone else.</p>
            </div>
          </div>
        </div> -->
      </div>
    </div>
    <!-- end section -->

    <hr class="spacing">

    <!-- section what-we-do -->
		<div class="container dmt-8em" id="what-we-do">
			<div class="heading-small mb-3">
				<span class="heading">What we do</span>
			</div>
			<h3 class="pb-3">
				We are here to reach your goal through digital marketing.
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
		<!-- end section -->

    <hr class="spacing">

    <!-- section why work with us -->
    <div class="container-full-width bdd-why_work-bg position-relative" id="why-work">
      <div class="container">
        <div class="row py-desktop-5 pt-mobile-5">
          <div class="col-sm small--hide">
            <img src="<?php echo base_url() ?>assets/webpage/images/About Us 605x583.jpg">
          </div>
          <div class="col-sm m-auto">
            <div class="description">
               <div data-aos="fade-left" class="heading-small">
                  <span class="heading text-white">Why Work With Us</span>
               </div>
              <h3 data-aos="fade-left" data-aos-delay="200" class="text-white">Creating sustainable partnerships with our clients</h3>
              <p data-aos="fade-left" data-aos-delay="350" class="text-white">From colocation in our studio to co-creation of your product - transparency, honesty, and real talk are part of our collaborative DNA.</p>
              <br>
              <p data-aos="fade-left" data-aos-delay="350" class="text-white">“We added a lot of value by bringing in BDD’s full suite of services. The level of trust that comes from working with a partner like them is remarkable.”</p>
            </div>
            <div data-aos="fade-left" data-aos-delay="450" class="brand-founder d-flex align-items-center">
              <div class="founder-img mr-3">
                <img src="<?php echo base_url() ?>assets/webpage/image-mobile/adityara.jpg">
              </div>
              <div class="founder-text">
                <span class="founder-title text-white">Adityara</span><br>
                <span class="text-white">NIION - Founder & CEO</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div data-aos="fade-right" data-aos-delay="200" class="col-10 medium-up--hide">
        <img src="<?php echo base_url() ?>assets/webpage/images/About Us 605x583.jpg" class="img-fluid">
      </div>
    </div>
    <!-- end section -->

    <hr class="spacing">

    <!-- section meet the team -->
    <div class="container-full-width mt-custom" id="meet-the-team">
      <div class="container">
        <div class="small--text-center py-5">
          <div class="title-section position-relative">
            <span class="heading text-secondary-small">MEET OUR TEAM</span>
            <h3 class="small--hide">Meet some of the digital marketers you’ll be working with</h3>
            <h6 class="medium-up--hide">Meet some of the digital marketers you’ll be working with</h6>
            <div class="py-2 opacity-0 small--hide position-absolute btn-banner">
              <button type="button" class="btn bg-white">
                <img src="<?php echo base_url() ?>assets/webpage/icons/12/blackright_arrow_ic@3x.svg" class="img-fluid" style="opacity: 0.5; transform: rotate(-180deg);">
              </button>
              <button type="button" class="btn bdd-primary-btn">
                <img src="<?php echo base_url() ?>assets/webpage/icons/12/blackright_arrow_ic@3x.svg" class="img-fluid">
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="container-team">
        <div class="container-fluid-mobile">
          <div class="row">
            <div class="team-memba owl-carousel owl-theme">
            <!-- Team Member 1 -->
            @php
                $teams = array([
                    'nama' => 'Muhammad Rizki Fahrurrozi',
                    'jabatan' => 'Chief Executive Officer (CEO)',
                    'image' => base_url('assets/webpage/images/team/ONI.JPG')
                  ], [
                    'nama' => 'Kreshna Bayu Aji',
                    'jabatan' => 'Chief Operating Officer (COO)',
                    'image' => base_url('assets/webpage/images/team/[BDD]-Bayu.jpg')
                  ], [
                    'nama' => 'Jenzo Andika',
                    'jabatan' => 'Head of Digital Marketing Team',
                    'image' => base_url('assets/webpage/images/team/JENZO.JPG')
                  ], [
                    'nama' => 'Hanny',
                    'jabatan' => 'Finance',
                    'image' => base_url('assets/webpage/images/team/HANNY.JPG')
                  ], [
                    'nama' => 'Kirana Paramitha',
                    'jabatan' => 'Business Development',
                    'image' => base_url('assets/webpage/images/team/KIRANA.JPG')
                  ], [
                    'nama' => 'Dani Aprianto',
                    'jabatan' => 'Digital Marketing Specialist',
                    'image' => base_url('assets/webpage/images/team/[BDD]-Dani.jpg')
                  ], [
                    'nama' => 'Yolanda',
                    'jabatan' => 'Account Manager',
                    'image' => base_url('assets/webpage/images/team/[BDD]-Yola.jpg')
                  ], [
                    'nama' => 'Imam Suripto',
                    'jabatan' => 'Digital Marketing Specialist',
                    'image' => base_url('assets/webpage/images/team/IMAM.JPG')
                  ], [
                    'nama' => 'Larasati Caesar Utoro',
                    'jabatan' => 'Account Manager',
                    'image' => base_url('assets/webpage/images/team/LARAS.JPG')
                  ], [
                    'nama' => 'Harry Nugraha',
                    'jabatan' => 'Digital Marketing Specialist',
                    'image' => base_url('assets/webpage/images/team/HARRY.JPG')
                  ], [
                    'nama' => 'Reza Adithya Utama',
                    'jabatan' => 'Digital Marketing Specialist',
                    'image' => base_url('assets/webpage/images/team/[BDD]-Reza.jpg')
                  ], [
                    'nama' => 'Hiesqi Noorzikria Leviriyant',
                    'jabatan' => 'Account Manager',
                    'image' => base_url('assets/webpage/images/team/HIESQI.JPG')
                  ], [
                    'nama' => 'Moch. Dicky Robbiana',
                    'jabatan' => 'Account Manager',
                    'image' => base_url('assets/webpage/images/team/dicky.jpg')
                  ], [
                    'nama' => 'Regina Pricillia',
                    'jabatan' => 'Digital Marketing Specialist',
                    'image' => base_url('assets/webpage/images/team/REGINA.JPG')
                  ], [
                    'nama' => 'Putra',
                    'jabatan' => 'Digital Marketing Specialist',
                    'image' => base_url('assets/webpage/images/team/[BDD]-Putra.jpg')
                  ], [
                    'nama' => 'Fory',
                    'jabatan' => 'Digital Marketing Specialist',
                    'image' => base_url('assets/webpage/images/team/[BDD]-Fory.jpg')
                  ], [
                    'nama' => 'Elsa',
                    'jabatan' => 'Account Manager',
                    'image' => base_url('assets/webpage/images/team/[BDD]-Elsa.jpg')
                  ], [
                    'nama' => 'Nurul',
                    'jabatan' => 'Account Manager',
                    'image' => base_url('assets/webpage/images/team/[BDD]-Nurul.jpg')
                  ], [
                    'nama' => 'Fadhil Hasan Elgianda',
                    'jabatan' => 'Head of Account Manager',
                    'image' => base_url('assets/webpage/images/team/FADHIL.JPG')
                  ]);
            @endphp
            @foreach ($teams as $team)
              <div class="card mb-4 mr-2 mt-mobile-4 border-0" style="padding: 12px; width: 299px;">
                <img src="{{ $team['image'] }}" class="card-img-top" alt="..." style="height: 275px; object-fit: cover; width: 100%;">
                <div class="card-body text-center">
                  <div class="card-title">
                    <h5 class="mb-0">{{ $team['nama'] }}</h5>
                    <span class="text-secondary-small mb-3"></span>
                  </div>
                  <p class="card-text p-2">
                    {{ $team['jabatan'] }}
                  </p>
                </div>
              </div>                
              @endforeach
            </div>                
          </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end section -->

    <hr class="spacing">

    <!-- section brand works -->
    <div class="bg-light py-4 d-flex align-items-center" id="brand-works">
      <div class="container container-fluid-mobile">
        <div class="row">
          <div class="p-mobile-25 text-center">
            <span class="heading text-secondary-small text-center">OUR CLIENT</span>
            <h3 class="text-center">Brands We've Worked With</h3>
          </div>
          <hr class="spacing small--hide">
          <div class="small--hide">
            <div class="d-flex align-items-center justify-content-center">
              <img src="<?php echo base_url() ?>assets/webpage/images/clients-desktop.png" />
            </div>
              <!-- <div class="text-center col-sm-3">
                <img src="<?php echo base_url() ?>assets/webpage/images/lovefair.png">
              </div>
              <div class="text-center col-sm-2">
                <img src="<?php echo base_url() ?>assets/webpage/images/iwearzule.png">
              </div>
              <div class="text-center col-sm-2">
                <img src="<?php echo base_url() ?>assets/webpage/images/eiger.png">
              </div>
              <div class="text-center col-sm-2">
                <img src="<?php echo base_url() ?>assets/webpage/images/untold.png">
              </div>
              <div class="text-center col-sm-2">
                <img src="<?php echo base_url() ?>assets/webpage/images/imagery.png">
              </div>
              <div class="text-center col-sm-2">
                <img src="<?php echo base_url() ?>assets/webpage/images/kickavenue.png">
              </div>
            </div>
            <hr class="spacing">
            <div class="d-flex align-items-center justify-content-center">
              <div class="text-center col-sm-2">
                <img src="<?php echo base_url() ?>assets/webpage/images/niion.png">
              </div>
              <div class="text-center col-sm-2">
                <img src="<?php echo base_url() ?>assets/webpage/images/bridges.png">
              </div>
              <div class="text-center col-sm-2">
                <img src="<?php echo base_url() ?>assets/webpage/images/ntl.png">
              </div>
              <div class="text-center col-sm-2">
                <img src="<?php echo base_url() ?>assets/webpage/images/rata.png">
              </div>
              <div class="text-center col-sm-2">
                <img src="<?php echo base_url() ?>assets/webpage/images/cottonink.png">
              </div>
            </div> -->
          </div>
          <div class="medium-up--hide">
            <div class="row d-flex align-items-center">
              <img src="<?php echo base_url() ?>assets/webpage/images/clients-mobile.png" />
            </div>
              <!-- <div class="col-4 p-3 text-center">
                <img src="<?php echo base_url() ?>assets/webpage/image-mobile/lovefair@2x.png" class="img-fluid">
              </div>
              <div class="col-4 p-3 text-center">
                <img src="<?php echo base_url() ?>assets/webpage/image-mobile/iwearzule@2x.png" class="img-fluid">
              </div>
              <div class="col-4 p-3 text-center">
                <img src="<?php echo base_url() ?>assets/webpage/image-mobile/eiger@2x.png" class="img-fluid">
              </div>
            </div>
            <div class="mb-3"></div>
            <div class="row d-flex align-items-center">
              <div class="col-4 p-3 text-center">
                <img src="<?php echo base_url() ?>assets/webpage/image-mobile/untold@2x.png" class="img-fluid">
              </div>
              <div class="col-4 p-3 text-center">
                <img src="<?php echo base_url() ?>assets/webpage/image-mobile/imagery@2x.png" class="img-fluid">
              </div>
              <div class="col-4 p-3 text-center">
                <img src="<?php echo base_url() ?>assets/webpage/image-mobile/kickavenue@2x.png" class="img-fluid">
              </div>
            </div>
            <div class="mb-3"></div>
            <div class="row d-flex align-items-center">
              <div class="col-4 p-3 text-center">
                <img src="<?php echo base_url() ?>assets/webpage/image-mobile/niion@2x.png" class="img-fluid">
              </div>
              <div class="col-4 p-3 text-center">
                <img src="<?php echo base_url() ?>assets/webpage/image-mobile/bridges@2x.png" class="img-fluid">
              </div>
              <div class="col-4 p-3 text-center">
                <img src="<?php echo base_url() ?>assets/webpage/image-mobile/rata@2x.png" class="img-fluid">
              </div>
            </div>
            <div class="mb-3"></div>
            <div class="row d-flex align-items-center">
              <div class="col-12 p-3 text-center">
                <img src="<?php echo base_url() ?>assets/webpage/image-mobile/cottonink.png" class="img-fluid">
              </div>
            </div> -->
            <div class="mb-3"></div>
          </div>
        </div>
      </div>
    </div>
    <!-- end section -->

    @include('webpage.layouts.footer')
@endsection