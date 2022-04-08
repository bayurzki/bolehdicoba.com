<?php $__env->startSection('title', "Case Study | Boleh Dicoba Digital"); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startPush('stylesheet'); ?>
        <link
          rel="stylesheet"
          href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        />
    <?php $__env->stopPush(); ?>
    <?php echo $__env->make('webpage.layouts.navbar', ['casestudy' => 'active'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php
    if (empty($data)) {
        $data = (object) array("once" => 0);
    }
    ?>
    <hr class="spacing small--hide">

    <!-- section banner -->
    <section id="niion-banner">
      <div class="container container-no-left pl-mobile-0">
        <div class="row justify-content-center justify-content-end">
          <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                
          <div class="col-sm small--hide">
              <img src="<?php echo base_url() . 'assets/images/' . $row->img_path ?>" width="605" height="650">              
          </div>
          <div class="col-sm d-flex align-items-center padding-about-us pt-mobile-5">
            <div class="pl-mobile-3 pb-mobile-4">              
                <span class="heading text-secondary-small"><?php echo e($row->category); ?></span>
                <h1 class="small--hide"><?php echo e($row->title); ?></h1>
                <h2 class="medium-up--hide"><?php echo e($row->title); ?></h2>
                <a href="<?php echo base_url('case-study/' . $row->name . '/' . $row->id); ?>" class="btn bdd-primary-btn mt-5 small--hide" style="font-family: Gelion-SemiBold;">Read More <img src="<?php echo base_url() ?>assets/webpage/icons/12/blackright_arrow_ic@3x.svg"> </a>
                <a href="<?php echo base_url('case-study/' . $row->name . '/' . $row->id); ?>" class="btn bdd-primary-btn mt-3 medium-up--hide" style="font-family: Gelion-SemiBold;">See Case Studies <img src="<?php echo base_url() ?>assets/webpage/icons/12/blackright_arrow_ic@3x.svg"> </a>                
            </div>
          </div>
          <div class="banner-mobile col-11 pl-mobile-0 medium-up--hide">
            <img src="<?php echo base_url() ?>assets/webpage/image-mobile/mbl-cs-banner@2x.png" class="img-fluid">
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
    </section>
    <!-- end section -->

    <hr class="spacing">

    <!-- section richtext  -->
    <?php if(!empty($component)): ?>        
    <?php
        $count = 0
    ?>
    <?php $__currentLoopData = $component; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($row->name == 'clients-says' && $count == 0): ?>        
    <section id="what-out-client-says">
      <div class="container">
        <div class="text-left mb-3">
          <div class="text-left d-flex flex-column">
            <span class="heading text-secondary-small mb-4">WHAT OUR CLIENTS SAYS</span>
            <h1 class="small--hide">“<?php echo e($row->title); ?>”</h1>
            <h3 class="medium-up--hide">“<?php echo e($row->title); ?>”</h3>
          </div>
        </div>
        <div class="text-right d-flex flex-column">
          <h5 class="font-medium bdd-font-blue small--hide">- <?php echo e($row->sub_title); ?></h5>
          <h5 class="font-medium bdd-font-blue medium-up--hide">- <?php echo $row->description; ?></h5>
          <h6 class="small--hide"><?php echo $row->description; ?></h6>
        </div>
      </div>
    </section>
    <?php
        $count++;
    ?>
    <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
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
  				<h3 class="medium-up--hide">
  					Meet Base Data Dashboard, Our specialize AI to analyse your business in digital.
  				</h3>
  				<div class="row dml-n2 mt-5 medium-up--hide">
  					<div class="w-100 p-0 pl-2 position-relative">
  						<div class="mobile-sc-card">
  							<img src="<?php echo base_url() ?>assets/webpage/images/cs-image-3@2x.png" class="img-fluid">
  							<div class="mobile-brand-cs p-4 zindex-1">
  								<img src="<?php echo base_url() ?>assets/webpage/images/bodypack-logo@2x.png" class="img-fluid" width="40">
  								<span class="brand-title">
  									BODYPACK
  								</span>
  								<span class="brand-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi.</span>
  							</div>
  						</div>
  					</div>
  				</div>
  				<div class="row m-0 dml-n2 mt-5 small--hide ">
          <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>            
          <?php
          if (empty($row->img_path)) {
            $row->img_path = 'default.png';
          }
          ?>
          <?php if($loop->index == 2): ?>                
          <div class="width-40 p-0 pl-2">
          <?php else: ?> 
            <div class="width-15 p-0 pl-2">
          <?php endif; ?>
  						<div class="sc-card">
  							<img src="<?php echo base_url() . 'assets/images/' . $row->img_path ?>" class="banner-title overlay-img">
  							<div class="brand-cs p-3">
  								<img src="<?php echo base_url() ?>assets/webpage/images/brodo-logo@2x.png" class="img-fluid" width="40">
  								<span class="brand-title">
  									<?php echo e($row->name); ?>

                  </span>
                  <?php if($loop->index == 2): ?>
                    <span class="brand-description"><?php echo e($row->title); ?></span>                      
                  <?php endif; ?>
  							</div>
  						</div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  				</div>
          
          <a href="<?php echo base_url() . 'case-study/' . $results[0]->name . '/' . $results[0]->id ?>">
            <button type="button" class="btn bdd-primary-btn mt-5">
                Explore More
                <img src="<?php echo base_url() ?>assets/webpage/icons/12/blackright_arrow_ic.png" class="pl-4 img-fluid" width="34">
            </button>
          </a>
  			</div>
  		</div>
    </section>
    <!-- end section -->

    <hr class="spacing">

    <!-- section Case Studies -->
    <section id="news-and-blog">
      <div class="container">
        <div class="header-custom row">
          <span class="text-secondary-small">OUR CASE STUDIES</span>
          <h3 class="title-post h3 mb-3 col-sm-9">We take digital experiences to the next level</h3>
          <div class="filter col-sm-3">
            <select id="filter-menu" class="selectpicker">              
              <?php
                  $temp = '';
                  $categories = array();
              ?>
              <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
              <?php if(!in_array($row->category, $categories)): ?>                  
              <?php
                array_push($categories, $row->category);
              ?>
              <option value="<?php echo e($row->category); ?>"><?php echo e($row->category); ?></option>
              <?php endif; ?>
              <?php
                  $temp = $row->category;
              ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
    <!-- end section -->

    <?php echo $__env->make('webpage.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__env->startPush('script'); ?>
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

              filterTag.innerHTML += `
                <div key="${new Date().getTime()}" class="case-studies col-6 col-sm-8 col-md-6 col-lg-4 mb-4">
                  <div style="overflow: hidden;">
                    <a href="<?= base_url('case-study/${item.name.replace(" ", "-")}/${item.id}') ?>">
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
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('webpage.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Panji\xampp\htdocs\bdd-v2\application\views/webpage/case-study.blade.php ENDPATH**/ ?>