
<?php $__env->startSection('title', "BDD | Case Study"); ?>
<?php $__env->startSection('page-title', 'Case Study'); ?>
<?php $__env->startSection('go-back'); ?>
    <a href="<?= base_url('admin/dashboard') ?>">
        <span class="go-back" uk-icon="icon: chevron-left"></span>
    </a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startPush('stylesheet'); ?>
    <link rel="stylesheet" href="<?= base_url('assets/dist/css/case-form.min.css') ?>">
<?php $__env->stopPush(); ?>
<?php
    if (empty($data)) {
        $data = (object) array("once" => 0);
    }
?>
<div id="case-form-app" class="uk-background-default" style="padding-top: 20px !important">
    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>        
	<form id="content_form"
		action="<?php echo e(!empty(@$row) ? base_url('caseStudy/editCase/' . $row->id) : base_url('caseStudy/addCase')); ?>"
		method="post" enctype="multipart/form-data">
		<!-- Main Title -->
        <div class="main-title" style="z-index: 980;" uk-sticky="bottom: #offset;animation: uk-animation-slide-bottom-small">
            <div class="uk-card uk-card-default uk-card-body" style="padding: 10px 20px 0px 20px">
                <div class="uk-float-left">
                	<h3 class="uk-text-muted"><?php echo e(!empty(@$row) ? 'Edit Case Study' : 'Add New Case Study'); ?></h3>
                </div>
                <div class="uk-float-right">
                	<button type="submit" class="uk-button uk-button-primary uk-float-right"
                        style="margin-left: 15px">
                        Submit
                    </button>
                </div>
            </div>			
		</div>

		<!-- Main Page Content -->
		<div class="uk-animation-slide-bottom-small">
			<div class="uk-card uk-card-default uk-card-body uk-grid-small" uk-grid>
				<div class="uk-width-1-2@s">
					<label class="uk-form-label" for="form-stacked-text">Name</label>
					<input class="uk-input" type="text" placeholder="Name" name="name"
						value="<?php echo e(!empty(@$row) ? $row->name : ''); ?>">
				</div>

				<div class="uk-width-1-2@s">
                    <label class="uk-form-label" for="form-stacked-text">Category</label>
                <input id="input-category" type="text" list="category" placeholder="Category" name="category" value="<?php echo e(!empty(@$row) ? $row->category : ''); ?>" />
					<datalist name="category" id="category">
                        <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category_row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>      
                        <option value="<?php echo e($category_row->category); ?>" <?php echo e(@$category_row->category == @$row->category ? 'selected' : ''); ?>>
                            <?php echo e($category_row->category); ?>

                        </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</datalist>
				</div>

				<div class="uk-width-1-1@s">
					<label class="uk-form-label" for="form-stacked-text">Title</label>
					<input class="uk-input" type="text" placeholder="Title" name="title"
						value="<?php echo e(!empty(@$row) ? $row->title : ''); ?>">
				</div>

				<div class="uk-width-1-2@s">
					<label class="uk-form-label">Logo <span class="size-recommended">size recommended: 50x50</span></label>
                    <input type="file" name="logo" class="upload-file" id="image-logo" data-img-type='main' hidden>
                    <label class="uk-margin-small-top file-control-label" for="image-logo">Logo Upload</label>
                    <p class="file-output-image-logo uk-margin-medium-left"><?php echo e(!empty(@$row) ? $row->logo : ''); ?></p>
                </div>

				<div class="uk-width-1-2@s">
                    <label class="uk-form-label" for="form-stacked-text">Logo Preview</label>	
                    <img id="preview-logo" class="w-100"
                    <?php if(!empty($row->logo)): ?>                        
                        src="<?php echo base_url() . 'assets/images/logo/' . $row->logo ?>" 
                    <?php else: ?>
                        src="https://via.placeholder.com/50x50.png" 
                    <?php endif; ?>
                     alt="image_preview" style="height: 50px; object-fit: contain" />
                </div>       

				<div class="uk-width-1-2@s">
					<label class="uk-form-label">Image <span class="size-recommended">size recommended: 605x650</span></label>
                    <input type="file" name="img_path" class="upload-file" id="image" data-img-type='main' hidden>
                    <label class="uk-margin-small-top file-control-label" for="image">Image Upload</label>
                    <p class="file-output-image uk-margin-medium-left"><?php echo e(!empty(@$row) ? $row->img_path : ''); ?></p>
                </div>

				<div class="uk-width-1-2@s">
                    <label class="uk-form-label" for="form-stacked-text">Image Preview</label>	
                    <img id="image-preview"
                    <?php if(!empty($row->img_path)): ?>                        
                        src="<?php echo base_url() . 'assets/images/' . $row->img_path ?>" 
                    <?php else: ?>
                        src="https://via.placeholder.com/150x150.png" 
                    <?php endif; ?>
                     alt="image_preview" style="object-fit: contain" />
                </div>           				
			</div>		
		</div>
    </form>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>

<?php
    $CI = &get_instance();

    if ($CI->session->flashdata("success")) {
?>
    <?php $__env->startSection('toast'); ?>
        <?php echo $__env->make('admin.toast', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__env->stopSection(); ?>
<?php
    }
?>

<?php $__env->startPush('script'); ?>
<script>
    // output image preview
    let imagePreview = (ev) => {
        if (ev.target.files && ev.target.files[0]) {
            let reader = new FileReader();

            console.log("EV target ID", [ev.target.id, typeof ev.target.id]);
            
            reader.onload = function(e) {
                if (ev.target.id == 'image') {
                    $('#image-preview').attr('src', e.target.result);
                } else {
                    $('#preview-logo').attr('src', e.target.result);
                }
            }
            
            reader.readAsDataURL(ev.target.files[0]); // convert to base64 string
        }
    }

        // output filename
    let loader = (e) => {
        imagePreview(e)
        let file = e.target.files

        let output = document.getElementsByClassName(`file-output-${e.target.id}`)[0]
        
        output.innerHTML = file[0].name
    }

    // let fileInput = document.getElementById('image')
    // let logoInput = document.getElementById('image-logo')
    // fileInput.addEventListener('change', loader)
    // logoInput.addEventListener('change', loader)
    let uploads = document.getElementsByClassName('upload-file')

    Array.from(uploads).forEach(function(el) {
      el.addEventListener('change', loader);
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u6065760/public_html/bolehdicoba.com/application/views/admin/case-form.blade.php ENDPATH**/ ?>