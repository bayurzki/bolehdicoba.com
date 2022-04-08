<?php
    $CI = &get_instance();
?>

<?php $__env->startSection('title', "BDD | News Posts"); ?>
<?php $__env->startSection('page-title', 'News Posts'); ?>
<?php $__env->startSection('go-back'); ?>
    <a href="<?= base_url('admin/newsPosts/' . $CI->session->userdata('news_name') . '/' . $CI->session->userdata('news_id')) ?>">
        <span class="go-back" uk-icon="icon: chevron-left"></span>
    </a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startPush('stylesheet'); ?>
    <link rel="stylesheet" href="<?= base_url('assets/dist/css/component-form.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/webpage/css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/webpage/css/owl.carousel.min.css') ?>">
<?php $__env->stopPush(); ?>
<?php
    $cond = true;

    if (empty($data)) {
        $cond = false;
        $data = (object) array('once' => 0);
    }
?>
<?php if($cond): ?>
    <div id="component-form-app" class="uk-background-default" style="padding-top: 20px !important" x-data="initState('<?php echo e($data[0]->style_id); ?>')">    
<?php else: ?>
    <div id="component-form-app" class="uk-background-default" style="padding-top: 20px !important" x-data="initState('1')">    
<?php endif; ?>
    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>        
	<form id="content_form"
		action="<?php echo e(!empty(@$row) ? base_url('post/editNewsPosts/' . $row->id) : base_url('post/addNewsPosts')); ?>"
        method="POST" 
        enctype="multipart/form-data"
        >
		<!-- Main Title -->
        <div class="main-title" style="z-index: 980;" uk-sticky="bottom: #offset;animation: uk-animation-slide-bottom-small">
            <div class="uk-card uk-card-default uk-card-body" style="padding: 10px 20px">
                <div class="uk-float-left">
                	<h3 class="uk-text-muted"><?php echo e(!empty(@$row) ? 'Edit News Posts' : 'Add News Posts'); ?></h3>
                </div>
                <div class="uk-float-right">
                	<button type="submit" class="uk-button uk-button-primary uk-float-right"
                        style="margin-left: 15px" :disabled="submit">
                        <span id="loading-spinner"></span>
                        Submit
                    </button>
                </div>
                <div class="uk-float-right">
                	<button type="button" class="uk-button uk-float-right"
                        style="margin-left: 15px"
                        @click="setToggleForm"
                        >
                        <span id="loading-spinner"></span>
                        <p style="margin: 1.2px 0" x-show="toggleForm">Preview</p>
                        <p style="margin: 1.2px 0" x-show="!toggleForm">Back to Form</p>
                    </button>
                </div>
            </div>			
        </div>

        <!-- This is the modal -->
        <div class="modal uk-animation-slide-bottom-small" id="component-modal" tabindex="-1" aria-labelledby="componentModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h2 class="modal-title">Component Preview</h2>   
                    <button style="position: absolute;
                    right: 0;
                    top: 0;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">                    
                    <div x-show="style == 1 ? true : false" class="container">
                        <div class="news-banner position-relative">
                            <img src="<?= base_url('assets/images/default.png') ?>" class="img-fluid small--hide p-mobile-25 w-100">
                        </div>
                    </div>
                    <div x-show="style == 2 ? true : false" class="container">
                        <div class="title text-left p-25 p-mobile-3">
                            <span class="heading text-secondary-small d-block">Category/Sub Title</span>
                            <h1 class="w-75 w-small--100 m-0">Title</h1>
                        </div>
                    </div>
                    <div x-show="style == 3 ? true : false" class="container">
                        <div class="row">                    
                            <div class="col-sm-2">
                                <div class="social-media my-3 d-flex flex-column align-items-center">
                                    <a href="https://facebook.com/bolehdicobadigital" target="_blank" class="pb-3">
                                        <img src="<?php echo base_url() ?>assets/webpage/images/wwd-fb@2x-edit.png" class="img-fluid">
                                    </a>
                                    <a href="https://instagram.com/bolehdicobadigital" target="_blank" class="pb-3">
                                        <img src="<?php echo base_url() ?>assets/webpage/images/wwd-ig@2x-edit.png" class="img-fluid">
                                    </a>
                                    <a href="https://twitter.com/bolehdicobadigital" target="_blank" class="pb-3">
                                        <img src="<?php echo base_url() ?>assets/webpage/images/wwd-tw@2x-edit.png" class="img-fluid">
                                    </a>
                                </div>
                            </div>
                    
                            <div class="col-sm-9 component-description">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque lobortis nunc nisl, quis malesuada magna egestas eu. Nunc cursus libero in urna pharetra ultricies non in nunc. Nulla volutpat ultricies metus vel ullamcorper. Nunc sem orci, euismod eu magna nec, lacinia faucibus risus. Nullam convallis ac lacus ut pulvinar. Proin velit dolor, rutrum eu finibus nec, ornare quis arcu. Sed dignissim congue purus molestie fringilla. Suspendisse vel laoreet orci, ac congue sapien. Sed sapien orci, dignissim a sem pellentesque, aliquet hendrerit lectus. Vestibulum ullamcorper velit nec neque luctus hendrerit. \r\nNulla neque leo, laoreet vel eros quis, interdum bibendum lacus. Curabitur posuere lacus id est lacinia, sit amet consectetur nunc euismod. Mauris tempus tellus a lectus sollicitudin, et porttitor ex pellentesque. Nam pulvinar nibh nec justo luctus, vel facilisis risus dignissim. Etiam nisi ipsum, lacinia at porta nec, feugiat nec justo. Proin quis facilisis justo, eget dapibus nisl. Nullam sit amet eros turpis. Vivamus semper felis nisl, id ullamcorper urna dictum nec. Integer luctus, quam quis viverra lacinia, est massa egestas arcu, vel aliquet est quam et felis. Vestibulum ut sodales elit. Vivamus ut tincidunt sem, at dictum nunc. Nam vitae odio viverra, aliquet lorem eu, tincidunt tellus. Ut fringilla erat eu massa placerat, vel elementum lorem rhoncus. Duis finibus ultricies pulvinar.
                            </div>
                        </div>
                    </div>
                    <div x-show="style == 5 ? true : false" class="container">                        
                        <div class="row">
                            <div class="col-sm-2 small--hide"></div>
                            <div class="col-12 col-sm-9">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque lobortis nunc nisl, quis malesuada magna egestas eu. Nunc cursus libero in urna pharetra ultricies non in nunc. Nulla volutpat ultricies metus vel ullamcorper. Nunc sem orci, euismod eu magna nec, lacinia faucibus risus. Nullam convallis ac lacus ut pulvinar. Proin velit dolor, rutrum eu finibus nec, ornare quis arcu. Sed dignissim congue purus molestie fringilla. Suspendisse vel laoreet orci, ac congue sapien. Sed sapien orci, dignissim a sem pellentesque, aliquet hendrerit lectus. Vestibulum ullamcorper velit nec neque luctus hendrerit. \r\nNulla neque leo, laoreet vel eros quis, interdum bibendum lacus. Curabitur posuere lacus id est lacinia, sit amet consectetur nunc euismod. Mauris tempus tellus a lectus sollicitudin, et porttitor ex pellentesque. Nam pulvinar nibh nec justo luctus, vel facilisis risus dignissim. Etiam nisi ipsum, lacinia at porta nec, feugiat nec justo. Proin quis facilisis justo, eget dapibus nisl. Nullam sit amet eros turpis. Vivamus semper felis nisl, id ullamcorper urna dictum nec. Integer luctus, quam quis viverra lacinia, est massa egestas arcu, vel aliquet est quam et felis. Vestibulum ut sodales elit. Vivamus ut tincidunt sem, at dictum nunc. Nam vitae odio viverra, aliquet lorem eu, tincidunt tellus. Ut fringilla erat eu massa placerat, vel elementum lorem rhoncus. Duis finibus ultricies pulvinar.
                            </div>
                        </div>
                    </div>
                    <div x-show="style == 7 ? true : false" class="container custom-position position-relative pt-mobile-5">
                        <div class="title-post pb-3">
                            <h4 class="small--hide">More Articles</h4>
                            <h4 class="medium-up--hide text-center">Articles Suggestion</h4>
                            <div class="button medium-up--hide text-center">
                                <button type="button" class="btn"> <img src="<?php echo base_url() ?>assets/webpage/icons/12/yellowleft_arrow_ic@3x.svg" class="img-fluid"> </button>
                                <button type="button" class="btn bdd-primary-btn"> <img src="<?php echo base_url() ?>assets/webpage/icons/12/blackright_arrow_ic@3x.svg" class="img-fluid"> </button>
                            </div>
                        </div>
                        <div class="append-nav"></div>
                        <div class="case-detail-preview owl-carousel owl-theme">
                            <div class="post1" style="margin: 3%;">
                                <img src="<?php echo base_url() ?>assets/webpage/images/nw-post-1.png">
                                <div class="post-description">
                                    <p>Holiday Marketing Ecommerce Strategy: How to Set a Foundation ...</p>
                                    <span class="text-secondary-small">Yesterday, by Nathaniel</span>
                                </div>
                            </div>
                            <div class="post2" style="margin: 3%;">
                                <img src="<?php echo base_url() ?>assets/webpage/images/nw-post-2.png">
                                <div class="post-description">
                                    <p>Holiday Marketing Ecommerce Strategy: How to Set a Foundation ...</p>
                                    <span class="text-secondary-small">Yesterday, by Nathaniel</span>
                                </div>
                            </div>
                            <div class="post3" style="margin: 3%;">
                                <img src="<?php echo base_url() ?>assets/webpage/images/nw-post-3.png">
                                <div class="post-description">
                                    <p>Holiday Marketing Ecommerce Strategy: How to Set a Foundation ...</p>
                                    <span class="text-secondary-small">Yesterday, by Nathaniel</span>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </div>
            </div>
        </div>

		<!-- Main Page Content -->        
		<div class="uk-animation-slide-bottom-small" x-show="toggleForm">
			<div class="uk-card uk-card-default uk-card-body uk-grid-small" uk-grid>
            <input type="hidden" name="news_id" value="<?php echo e($CI->session->userdata()['news_id']); ?>">

				<div class="uk-width-1-1@s">
                    <label class="uk-form-label" for="form-stacked-text">Style</label>
					<select id="style" class="uk-select" name="style_id" @change="setStyle" required>
                        <?php $__currentLoopData = @$styles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $style_row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($style_row->name != 'image-with-right-content' && $style_row->name != 'clients-says' && $style_row->name != 'comments-section' && $style_row->name != 'carousel'): ?> {
                            <option value="<?php echo e($style_row->id); ?>" <?php echo e(@$style_row->id == @$row->style_id ? 'selected' : ''); ?>>
                                <?php echo e($style_row->name); ?>

                            </option>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</select>
                </div>   

                <div class="uk-width-1-1@s">
                    <label class="uk-form-label" for="form-stacked-text">Component Preview</label>                            
                    <!-- Button trigger modal -->
                    <button type="button" class="d-block btn btn-info" data-toggle="modal" data-target="#component-modal">
                        Open
                    </button>                    
                </div>

				<div class="uk-grid-margin uk-width-1-2@s" x-show="!title">
                    <?php
                        $title = "Title";                    
                    ?>
					<label class="uk-form-label" for="form-stacked-text">Title</label>
                    <input id="title" class="onchange uk-input" type="text" placeholder="<?php echo e($title); ?>" name="title"
						value="<?php echo e(!empty(@$row) ? $row->title : ''); ?>">
				</div>           
                
				<div class="uk-grid-margin uk-width-1-2@s" x-show="!title">
                    <?php
                        $sub_title = "Category/Sub Title";                        
                    ?>
					<label class="uk-form-label" for="form-stacked-text">Sub Title</label>
                    <input id="sub_title" class="onchange uk-input" type="text" placeholder="<?php echo e($sub_title); ?>" name="sub_title"
						value="<?php echo e(!empty(@$row) ? $row->sub_title : ''); ?>">
				</div>      
                
				<div class="uk-grid-margin uk-width-1-1@s" x-show="!description">
                    <?php
                        $description = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque lobortis nunc nisl, quis malesuada magna egestas eu. Nunc cursus libero in urna pharetra ultricies non in nunc. Nulla volutpat ultricies metus vel ullamcorper. Nunc sem orci, euismod eu magna nec, lacinia faucibus risus. Nullam convallis ac lacus ut pulvinar. Proin velit dolor, rutrum eu finibus nec, ornare quis arcu. Sed dignissim congue purus molestie fringilla. Suspendisse vel laoreet orci, ac congue sapien. Sed sapien orci, dignissim a sem pellentesque, aliquet hendrerit lectus. Vestibulum ullamcorper velit nec neque luctus hendrerit. \r\nNulla neque leo, laoreet vel eros quis, interdum bibendum lacus. Curabitur posuere lacus id est lacinia, sit amet consectetur nunc euismod. Mauris tempus tellus a lectus sollicitudin, et porttitor ex pellentesque. Nam pulvinar nibh nec justo luctus, vel facilisis risus dignissim. Etiam nisi ipsum, lacinia at porta nec, feugiat nec justo. Proin quis facilisis justo, eget dapibus nisl. Nullam sit amet eros turpis. Vivamus semper felis nisl, id ullamcorper urna dictum nec. Integer luctus, quam quis viverra lacinia, est massa egestas arcu, vel aliquet est quam et felis. Vestibulum ut sodales elit. Vivamus ut tincidunt sem, at dictum nunc. Nam vitae odio viverra, aliquet lorem eu, tincidunt tellus. Ut fringilla erat eu massa placerat, vel elementum lorem rhoncus. Duis finibus ultricies pulvinar.";                        
                    ?>
					<label class="uk-form-label" for="form-stacked-text">Description</label>
					<textarea id="description" class="onchange uk-input" placeholder="<?php echo e($description); ?>" name="description">
                        <?php echo e(!empty(@$row) ? $row->description : ''); ?>

                    </textarea>
				</div>    
                
				<div class="uk-grid-margin uk-width-1-3@l uk-width-1-2@m uk-width-1-1" x-show="!sosmed">                    
                    <label class="uk-form-label" for="form-stacked-text">Instagram</label>
                    <div class="uk-block">
                        <span class="uk-form-icon" uk-icon="icon: instagram"></span>
                        <input id="instagram" class="onchange uk-input" type="text" placeholder="Username" name="instagram"
						value="<?php echo e(!empty(@$row) ? $row->instagram : ''); ?>">
                    </div>
				</div>  
                
				<div class="uk-grid-margin uk-width-1-3@l uk-width-1-2@m uk-width-1-1" x-show="!sosmed">                    
                    <label class="uk-form-label" for="form-stacked-text">Facebook</label>
                    <div class="uk-block">
                        <span class="uk-form-icon" uk-icon="icon: facebook"></span>
                        <input id="facebook" class="onchange uk-input" type="text" placeholder="Username" name="facebook"
                        value="<?php echo e(!empty(@$row) ? $row->facebook : ''); ?>">
                    </div>
				</div>  
                
				<div class="uk-grid-margin uk-width-1-3@l uk-width-1-3@m uk-width-1-1" x-show="!sosmed">                    
                    <label class="uk-form-label" for="form-stacked-text">Twitter</label>
                    <div class="uk-block">
                        <span class="uk-form-icon" uk-icon="icon: twitter"></span>
                        <input id="twitter" class="onchange uk-input" type="text" placeholder="Username" name="twitter"
                        value="<?php echo e(!empty(@$row) ? $row->twitter : ''); ?>">
                    </div>
				</div>

                <div class="uk-width-1-2@s" x-show="!image">
                    <label id="label-image" class="uk-form-label">Image<span class="size-recommended">size recommended: 1596x720</span></label>
                    <input type="file" name="img_path[]" id="image" data-img-type='main' hidden>
                    <label class="uk-margin-small-top file-control-label" for="image">Image Upload</label>
                    <p class="file-output uk-margin-medium-left"><?php echo e(!empty(@$row->img_path) ? $row->img_path : ''); ?></p>
                </div>

				<div class="uk-width-1-2@s image-preview-container" x-show="!image">
                    <label class="uk-form-label" for="form-stacked-text">Image Preview</label>	
                    <?php if(!empty($row->img_path)): ?>                        
                    <img class="image-preview"
                        id="image-preview"
                        src="<?php echo base_url() . 'assets/images/' . $row->img_path ?>"                     
                        alt="image_preview" style="object-fit: contain" />
                    <?php elseif(!empty($gallery)): ?>   
                    <div class="uk-flex uk-flex-wrap gallery-container">
                        <?php $__currentLoopData = $gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery_row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <img 
                            class="image-preview gallery"
                            id="image-preview"
                            src="<?php echo base_url() . 'assets/images/gallery/' . $gallery_row->img_path ?>"                     
                            alt="image_preview" />                                                    
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>                     
                    <?php else: ?>
                    <img class="delete-selector image-preview"
                        id="image-preview"
                        src="https://via.placeholder.com/150x150.png" 
                        alt="image_preview" style="object-fit: contain" />
                    <?php endif; ?>
                </div>                				
			</div>		
		</div>
    </form>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <div class="component-preview-app" x-show="!toggleForm">
        <section id="title-case" class="uk-animation-slide-bottom-small pt-25">
        </section>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php
    if ($CI->session->flashdata("success") || $CI->session->flashdata("failed")) {
?>
    <?php $__env->startSection('toast'); ?>
        <?php echo $__env->make('admin.toast', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__env->stopSection(); ?>
<?php
    }
?>

<?php $__env->startPush('script'); ?>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js"></script>
<script src="<?php echo base_url() ?>assets/ckeditor/ckeditor.js"></script>        
<script>
    // Replace the <textarea id="description"> with a CKEditor 4 instance
    // Configuration
    const config = {}
    config.toolbar = [
            { name: 'clipboard', items: [ 'Cut', 'Copy', 'Paste', 'Undo', 'Redo' ] },
            { name: 'editing', items: [ 'Find', 'Replace' ] },		
            { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript' ] },
            '/',
            { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'] },
            { name: 'links', items: [ 'Link', 'Unlink'] },
            '/',
            { name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
            { name: 'colors', items: [ 'TextColor', 'BGColor' ] }
        ]
    // config.extraPlugins = 'placeholder'
    CKEDITOR.replace( 'description', config );

    // output image preview
    let imagePreview = (ev) => {
        if (ev.target.files && ev.target.files[0]) {
            
            if (ev.target.files.length > 1) {  
                // create new elements for the preview
                for (let i = 0; i < ev.target.files.length; i++) {

                    let reader = new FileReader();
                    const img = $(`<img id="image-preview-${i}" class="delete-selector image-preview gallery" alt="image_preview">`)

                    reader.onload = function(e) {   
                        img.attr('src', e.target.result)        

                        if (i == 0) {
                            document.getElementsByClassName('second-banner')[0].innerHTML = `                                
                                <img src="${e.target.result}" class="delete-selector img-fluid" style="width: 100%" />
                                <div class="row no-wrap pb-4 mt-4 thumbnail-container">
                                </div>
                            `
                        } else {
                            document.getElementsByClassName('thumbnail-container')[0].innerHTML += `                                
                                <div class="col-sm-2 col-4">
                                    <a href="#" class="thumbnail">
                                        <img src="${e.target.result}" class="delete-selector img-fluid">
                                    </a>
                                </div>
                            `
                        }
                    }                                                                
                    
                    reader.readAsDataURL(ev.target.files[i]); // convert to base64 string
                    if ($('.gallery-container').length) {
                        $('.gallery-container').append(img)
                    } else {
                        $('.image-preview-container').append(img)
                    }
                }
            } else {
                let reader = new FileReader();
                const img = $('<img class="delete-selector image-preview" id="image-preview" alt="image_preview">')
            
                reader.onload = function(e) {
                    img.attr('src', e.target.result);  
                    document.getElementById('image-banner').src = e.target.result
                }
                
                reader.readAsDataURL(ev.target.files[0]); // convert to base64 string
                $('.image-preview-container').append(img)
            }
        }
    }

    // output filename
    let loader = async (e) => {
        let imagePreviews = $('.image-preview')
        // removes the old preview
        for (let i = 0; i < imagePreviews.length; i++) {
            await imagePreviews[i].remove()
        }

        imagePreview(e)
        let files = e.target.files
        let output = document.getElementsByClassName('file-output')[0]                      


        if (files.length > 1) {
            output.innerHTML = ''

            for (let i = 0; i < files.length; i++) {                
                output.innerHTML += `<p>${files[i].name}</p>`
            }
        } else {
            output.innerHTML = files[0].name            
        }
    }

    let fileInput = document.getElementById('image')
    fileInput.addEventListener('change', loader)

    const initState = (val) => {       
        let style = val

        /*
        ==============
        List Styles Id
        ==============
        1 = Banner
        2 = Category-and-title
        3 = Description-with-side-sosmed
        5 = Reguler-description
        7 = Carousel
        8 = Gallery
        9 = Comment Section
        */

        const resetValue = () => {
            // reset value for all input
            document.getElementById('title').value = ''
            document.getElementById('sub_title').value = ''
            CKEDITOR.instances['description'].setData("")
            document.getElementById('instagram').value = ''
            document.getElementById('facebook').value = ''
            document.getElementById('twitter').value = ''
            document.getElementById('image').value = ''

            // Delete file name
            const fileOutput = document.getElementsByClassName('file-output')
            for (let i = 0; i < fileOutput.length; i++) {
                document.getElementsByClassName('file-output')[i].textContent = ""
            }

            // Delete exists images
            $('.delete-selector').remove()
            // Append default images
            const img = `
                <img class="delete-selector image-preview"
                    id="image-preview"
                    src="https://via.placeholder.com/150x150.png" 
                    alt="image_preview" style="object-fit: contain" />
                `
            $('.image-preview-container').append(img)
        }

        const setDefault = (value) => {
            let result

            switch (parseInt(style)) {
                case 1:
                    switch (value) {
                        case 'title':
                            result = true
                            break;
                        case 'description':
                            result = true
                            break;
                        case 'image':
                            result = false
                            break;
                        case 'sosmed':
                            result = true
                            break;
                        case 'list':
                            result = true
                            break;
                        case 'submit':
                            result = false
                            break;
                        default:
                            break;
                        }
                    break;
                case 2:
                    switch (value) {
                        case 'title':
                            result = false
                            break;
                        case 'description':
                            result = true
                            break;
                        case 'image':
                            result = true
                            break;
                        case 'sosmed':
                            result = true
                            break;
                        case 'list':
                            result = true
                            break;
                        case 'submit':
                            result = false
                            break;
                        default:
                            break;
                        }
                    break;
                case 3:
                    switch (value) {
                        case 'title':
                            result = true
                            break;
                        case 'description':
                            result = false
                            break;
                        case 'image':
                            result = true
                            break;
                        case 'sosmed':
                            result = false
                            break;
                        case 'list':
                            result = true
                            break;
                        case 'submit':
                            result = false
                            break;
                        default:
                            break;
                    }
                    break;
                case 5:
                    switch (value) {
                        case 'title':
                            result = true
                            break;
                        case 'description':
                            result = false
                            break;
                        case 'image':
                            result = true
                            break;
                        case 'sosmed':
                            result = true
                            break;
                        case 'list':
                            result = true
                            break;
                        case 'submit':
                            result = false
                            break;
                        default:
                            break;
                        }
                    break;
                case 7:
                    switch (value) {
                        case 'title':
                            result = true
                            break;
                        case 'description':
                            result = true
                            break;
                        case 'image':
                            result = true
                            break;
                        case 'sosmed':
                            result = true
                            break;
                        case 'list':
                            result = true
                            break;
                        case 'submit':
                            result = false
                            break;
                        default:
                            break;
                        }
                    break;
                case 8:
                    // set multiple attribute for gallery
                    document.getElementById('image').setAttribute('multiple', 'multiple')
                    // set label for gallery
                    $('#label-image').html('Image <span class="size-recommended">size recommended: 900x560</span>')

                    switch (value) {
                        case 'title':
                            result = true
                            break;
                        case 'description':
                            result = true
                            break;
                        case 'image':
                            result = false
                            break;
                        case 'sosmed':
                            result = true
                            break;
                        case 'list':
                            result = true
                            break;
                        case 'submit':
                            result = false
                            break;
                        default:
                            break;
                        }
                    break;
                case 9:
                    switch (value) {
                        case 'title':
                            result = true
                            break;
                        case 'description':
                            result = true
                            break;
                        case 'image':
                            result = true
                            break;
                        case 'sosmed':
                            result = true
                            break;
                        case 'list':
                            result = true
                            break;
                        case 'submit':
                            result = false
                            break;
                        default:
                            break;
                        }
                    break;
                default:
                    result = true
                    break;
            }

            return result
        }

        return {
            toggleForm: true,
            style,
            toggleModal: true,
            title: setDefault('title'),
            description: setDefault('description'),
            image: setDefault('image'),
            sosmed: setDefault('sosmed'),
            submit: setDefault('submit'),
            setToggleForm() {
                this.toggleForm = !this.toggleForm
            },
            setStyle({ target }) {
                this.style = target.value

                this.toggleModal = !this.toggleModal

                this.check()
            },
            check() {
                switch (parseInt(this.style)) {            
                    case 1:
                        // set default for banner scale
                        $('#label-image').html('Image <span class="size-recommended">size recommended: 1596x720</span>')
                        this.title = true
                        this.description = true
                        this.image = false
                        this.sosmed = true
                        this.submit = false
                        
                        // Reset all value
                        resetValue()
                        // Delete attribute multiple
                        document.getElementById('image').removeAttribute('multiple')
                        break;
                    case 2:
                        // set default for banner scale
                        $('#label-image').html('Image <span class="size-recommended">size recommended: 1596x720</span>')
                        this.title = false
                        this.description = true
                        this.image = true
                        this.sosmed = true
                        this.submit = false

                        resetValue()
                        break;
                    case 3:
                        // set default for banner scale
                        $('#label-image').html('Image <span class="size-recommended">size recommended: 1596x720</span>')
                        this.title = true
                        this.description = false
                        this.image = true
                        this.sosmed = false
                        this.submit = false

                        resetValue()
                        break;                    
                    case 5:
                        // set default for banner scale
                        $('#label-image').html('Image <span class="size-recommended">size recommended: 1596x720</span>')
                        this.title = true
                        this.description = false
                        this.image = true
                        this.sosmed = true
                        this.submit = false

                        resetValue()
                        break;
                    case 7:
                        // set default for banner scale
                        $('#label-image').html('Image <span class="size-recommended">size recommended: 1596x720</span>')
                        this.title = true
                        this.description = true
                        this.image = true
                        this.sosmed = true
                        this.submit = false

                        resetValue()
                        break;
                    case 8:
                        // set label for gallery
                        $('#label-image').html('Image <span class="size-recommended">size recommended: 900x560</span>')
                        this.title = true
                        this.description = true
                        this.image = false
                        this.sosmed = true
                        this.submit = false

                        resetValue()
                        // add multiple attribute for gallery
                        document.getElementById('image').setAttribute('multiple', 'multiple')

                        break;
                    case 9:
                        // set default for banner scale
                        $('#label-image').html('Image <span class="size-recommended">size recommended: 1596x720</span>')
                        this.title = true
                        this.description = true
                        this.image = true
                        this.sosmed = true
                        this.submit = false

                        resetValue()
                        break;
                    default:
                        // set default for banner scale
                        $('#label-image').html('Image <span class="size-recommended">size recommended: 1596x720</span>')
                        this.title = true
                        this.description = true
                        this.image = true
                        this.sosmed = true
                        this.submit = true

                        resetValue()
                        break;
                }
            }
        }
    }

    $(document).ready(function() {
        let styleVal = $('#style').val()
        let styleContainer = document.getElementById('title-case');

        const componentLiveInject = (val) => {
            const lorem = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque lobortis nunc nisl, quis malesuada magna egestas eu. Nunc cursus libero in urna pharetra ultricies non in nunc. Nulla volutpat ultricies metus vel ullamcorper. Nunc sem orci, euismod eu magna nec, lacinia faucibus risus. Nullam convallis ac lacus ut pulvinar. Proin velit dolor, rutrum eu finibus nec, ornare quis arcu. Sed dignissim congue purus molestie fringilla. Suspendisse vel laoreet orci, ac congue sapien. Sed sapien orci, dignissim a sem pellentesque, aliquet hendrerit lectus. Vestibulum ullamcorper velit nec neque luctus hendrerit. \r\nNulla neque leo, laoreet vel eros quis, interdum bibendum lacus. Curabitur posuere lacus id est lacinia, sit amet consectetur nunc euismod. Mauris tempus tellus a lectus sollicitudin, et porttitor ex pellentesque. Nam pulvinar nibh nec justo luctus, vel facilisis risus dignissim. Etiam nisi ipsum, lacinia at porta nec, feugiat nec justo. Proin quis facilisis justo, eget dapibus nisl. Nullam sit amet eros turpis. Vivamus semper felis nisl, id ullamcorper urna dictum nec. Integer luctus, quam quis viverra lacinia, est massa egestas arcu, vel aliquet est quam et felis. Vestibulum ut sodales elit. Vivamus ut tincidunt sem, at dictum nunc. Nam vitae odio viverra, aliquet lorem eu, tincidunt tellus. Ut fringilla erat eu massa placerat, vel elementum lorem rhoncus. Duis finibus ultricies pulvinar.";
            styleContainer.innerHTML = ''

            switch (parseInt(val)) {
                // Banner
                case 1:   
                    styleContainer.innerHTML = `
                        <div class="container">
                            <div class="news-banner position-relative">
                                <img id="image-banner" src="<?= base_url('assets/images/default.png') ?>" class="img-fluid small--hide p-mobile-25 w-100">
                            </div>
                        </div>
                    `
                    break;
                // Category-and-title
                case 2:
                    styleContainer.innerHTML = `
                        <div class="container">
                            <div class="title text-left p-25 p-mobile-3">
                            <span class="heading text-secondary-small d-block">${$('#sub_title').val() != '' ? $('#sub_title').val() : 'Category/Sub Title' }</span>
                            <h1 class="w-75 w-small--100 m-0">${$('#title').val() != '' ? $('#title').val() : 'Title'}</h1>
                            </div>
                        </div>
                    `;
                    break;
                // Description-with-side-sosmed
                case 3:
                    styleContainer.innerHTML = `                        
                        <div class="container">
                            <div class="row">
                    
                            <div class="col-sm-2">
                                <div class="social-media my-3 d-flex flex-column align-items-center">
                                    ${$('#facebook').val().length > 0 ? 
                                    '<a href="https://facebook.com/' + $('#facebook').val() + '" target="_blank" class="pb-3">\
                                        <img src="<?php echo base_url() ?>assets/webpage/images/wwd-fb@2x-edit.png" class="img-fluid">\
                                    </a>'
                                    : 
                                    `<a href="https://facebook.com/bolehdicobadigital" target="_blank" class="pb-3">
                                        <img src="<?php echo base_url() ?>assets/webpage/images/wwd-fb@2x-edit.png" class="img-fluid">
                                    </a>`
                                    }                                    
                                    ${$('#instagram').val().length > 0 ? 
                                    '<a href="https://instagram.com/bolehdicobadigital" target="_blank" class="pb-3">\
                                        <img src="<?php echo base_url() ?>assets/webpage/images/wwd-ig@2x-edit.png" class="img-fluid">\
                                    </a>'
                                    : 
                                    `<a href="https://instagram.com/bolehdicobadigital" target="_blank" class="pb-3">
                                        <img src="<?php echo base_url() ?>assets/webpage/images/wwd-ig@2x-edit.png" class="img-fluid">
                                    </a>`
                                    }
                                    ${$('#twitter').val().length > 0 ? 
                                    '<a href="https://twitter.com/bolehdicobadigital" target="_blank" class="pb-3">\
                                        <img src="<?php echo base_url() ?>assets/webpage/images/wwd-tw@2x-edit.png" class="img-fluid">\
                                    </a>'
                                    : 
                                    `<a href="https://twitter.com/bolehdicobadigital" target="_blank" class="pb-3">
                                        <img src="<?php echo base_url() ?>assets/webpage/images/wwd-tw@2x-edit.png" class="img-fluid">
                                    </a>`
                                    }
                                </div>
                            </div>
                    
                            <div class="col-sm-9 component-description">
                                ${CKEDITOR.instances["description"].getData() != '' ? CKEDITOR.instances["description"].getData() : lorem}
                            </div>
                            </div>
                        </div>
                    `
                    break;
                // Reguler-description
                case 5:
                    styleContainer.innerHTML = `
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-2 small--hide"></div>
                                <div class="col-12 col-sm-9">
                                    ${CKEDITOR.instances["description"].getData() != '' ? CKEDITOR.instances["description"].getData() : lorem}
                                </div>
                            </div>
                        </div>
                    `
                    break;
                // Carousel
                case 7:
                    styleContainer.innerHTML = ` 
                        <div class="container-full-width h-550 d-flex flex-column justify-content-center bg-light pb-mobile-5">
                            <div class="container custom-position position-relative pt-mobile-5">
                            <div class="title-post pb-3">
                                <h4 class="small--hide">More Articles</h4>
                                <h4 class="medium-up--hide text-center">Articles Suggestion</h4>
                                <div class="button medium-up--hide text-center">
                                    <button type="button" class="btn"> <img src="<?php echo base_url() ?>assets/webpage/icons/12/yellowleft_arrow_ic@3x.svg" class="img-fluid"> </button>
                                    <button type="button" class="btn bdd-primary-btn"> <img src="<?php echo base_url() ?>assets/webpage/icons/12/blackright_arrow_ic@3x.svg" class="img-fluid"> </button>
                                </div>
                            </div>
                            <div class="append-nav"></div>
                                <div class="case-detail owl-carousel owl-theme">
                                    <?php 
                                    foreach ($carousel_items as $carousel_row) {
                                        if ($carousel_row->id == $CI->session->userdata()['news_id']) {
                                            continue;
                                        }
                                    ?>
                                    <a href="#">
                                        <div class="post">
                                            <?php
                                                if (empty($carousel_row->img_path)) {
                                            ?>
                                                <img src="<?php echo e(base_url() . 'assets/images/default.png'); ?>" width="370" height="270">                                    
                                            <?php
                                                } else {
                                            ?>
                                                <img src="<?php echo e(base_url() . 'assets/images/' . $carousel_row->img_path); ?>" width="370" height="270">
                                            <?php
                                                }
                                            ?>
                                            <div class="post-description">
                                            <p><?= $carousel_row->title ?></p>
                                            <span class="text-secondary-small">
                                                <?php
                                                    $created_at = new DateTime( $carousel_row->created_at );
                                                    $now = new DateTime( date( 'Y-m-d h:i:s', time() )) ; 

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
                                                ?>
                                            </span>
                                            </div>
                                        </div>
                                    </a>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    `
                    
                    $('.case-detail').owlCarousel({
                        items: 3,
                        loop: false,
                        margin: 10,
                        nav: true,
                        navText: ["<div class='btn bdd-secondary-btn'><img src='https://bolehdicoba.com/beta/assets/icons/12/yellowleft_arrow_ic.png'></div>","<div class='btn bdd-primary-btn'><img src='https://bolehdicoba.com/beta/assets/icons/12/blackright_arrow_ic.png'></div>"],
                        responsive:{
                            0: {
                                items:2,
                                nav:false
                            },
                            750: {
                                items: 3,
                            }
                        }
                    });

                    // For in component preview in modal
                    $('.case-detail-preview').owlCarousel({
                        items: 3,
                        loop: false,
                        nav: true,
                        navText: ["<div class='btn bdd-secondary-btn'><img src='https://bolehdicoba.com/beta/assets/icons/12/yellowleft_arrow_ic.png'></div>","<div class='btn bdd-primary-btn'><img src='https://bolehdicoba.com/beta/assets/icons/12/blackright_arrow_ic.png'></div>"],
                        responsive:{
                            0: {
                                items:2,
                                nav:false
                            },
                            750: {
                                items: 3,
                            }
                        }
                    });
                    break;
                // Gallery
                case 8:
                    let data = []

                    <?php 
                        $index = 0; 
                        foreach($gallery as $row) {
                    ?>
                        data.push("<?= $row->img_path ?>")
                    <?php
                        }
                    ?>                        
                                         
                    styleContainer.innerHTML = `                        
                        <div class="gajelas">   
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-sm-2 small--hide"></div>
                                    <div class="col-12 col-sm-9 second-banner position-relative">
                                        <div class="row no-wrap pb-4 mt-4 thumbnail-container">
                                        </div>
                                    </div>                 
                                </div>
                            </div>
                        </div>
                    `

                    if (!$('#image').val()) {                        
                        if (data.length) {
                            for (let i = 0; i < data.length; i++) {
                                if (i == 0) {
                                    document.getElementsByClassName('second-banner')[0].innerHTML = `
                                        <img src="<?= base_url('assets/images/gallery/') ?>${data[i]}" class="delete-selector img-fluid" style="width: 100%" />                                                                        
                                        <div class="row no-wrap pb-4 mt-4 thumbnail-container">
                                        </div>
                                    `
                                } else {
                                    document.getElementsByClassName('thumbnail-container')[0].innerHTML += `
                                        <div class="col-sm-2 col-4">
                                            <a href="#" class="thumbnail">
                                                <img src="<?= base_url('assets/images/gallery/') ?>${data[i]}" class="delete-selector img-fluid">
                                            </a>
                                        </div>
                                    `
                                }
                            }
                        }
                    }
                    break;
                // Comment Section
                case 9:
                    break;
                default:
                    break;
            }
        }

        // run first time
        componentLiveInject(styleVal)

        // every input onChange to re-render
        $('#style').change(function(e) {
            styleVal = e.target.value

            componentLiveInject(styleVal)
        })

        $('.onchange').change(function(e) {
            componentLiveInject(styleVal)
        })

        CKEDITOR.instances['description'].on('change', function() { 
            componentLiveInject(styleVal)
        })
    })
        
    // $(document).ready(function() {
    //     $('#content_form').submit(function(e) {
    //         e.preventDefault()

    //         let form = $(this)
    //         let url = form.attr('action')

    //         $.ajax({
    //             dataType: "JSON",
    //             url,
    //             method: "POST",
    //             data: new FormData(this),              
    //             processData: false,  
    //             beforeSend() {
    //                 $('#loading-spinner').append("<div uk-spinner></div>")
    //             },
    //             complete(data) {                    
    //                 console.log("Complete", data.responseText);
    //                 $('#loading-spinner').html("")
    //                 // window.location.reload(true)
    //             },
    //             success(data) {
    //                 console.log("Success", data);
    //                 // window.location.reload(true)
    //             }
    //         })
    //     })
    // })
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u5891500/public_html/application/views/admin/blog/component-news-form.blade.php ENDPATH**/ ?>