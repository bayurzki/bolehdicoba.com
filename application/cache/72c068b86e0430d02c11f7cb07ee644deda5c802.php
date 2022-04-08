
<?php $__env->startSection('title', "2021 Digital Marketing Insights | Boleh Dicoba Digital"); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('webpage.layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <section class="pt-25">
    	<div class="container">
    		<h2 class="mb-4 text-center"><?php echo $title ?></h2>

    		<div class="row">
    			<div class="col-md-6">
    				<a href="<?php echo e(base_url() . 'assets/images/events/ramadhan-insights.jpeg'); ?>" target="_blank">
    					<img src="<?php echo e(base_url() . 'assets/images/events/marketing-insights.jpeg'); ?>" class="img-fluid">
    				</a>
    			</div>
    			<div class="col-md-6 pt-mobile-4">
    				<form class="pb-mobile-4 w-90" style="margin: auto;" action="https://docs.google.com/forms/u/5/d/e/1FAIpQLSc9TvgnJKJjmrMnw0O5kyFQhIejj4btFuXijvZYcT73mT8_1A/formResponse">
    					<h5 class="text-center"><?php echo $teks ?></h5>
		    			<div class="form-group mb-4">
		    				<label class="label-control">Name</label>
		    				<input type="text" name="entry.2049672045" class="form-control" />
		    			</div>

		    			<div class="form-group mb-4">
		    				<label class="label-control">No. HP / No. Whatsapp</label>
		    				<input type="text" inputmode="numeric" name="entry.11297993" class="form-control" />
		    			</div>

		    			<div class="form-group mb-4">
		    				<label class="label-control">Email</label>
		    				<input type="email" inputmode="email" name="entry.410317758" class="form-control" />
		    			</div>

		    			<div class="form-group mb-4">
		    				<label class="label-control">Brand / Bisnis / Company</label>
		    				<input type="text" name="entry.1076596951" class="form-control" />
		    			</div>

		    			<div class="form-group mb-4">
		    				<button type="submit" class="btn bdd-primary-btn mt-3">Submit</button>
		    			</div>
		    		</form>
    			</div>
    		</div>
    	</div>
    </section>
    <?php echo $__env->make('webpage.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('webpage.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u5891500/public_html/application/views/webpage/marketing-insight.blade.php ENDPATH**/ ?>