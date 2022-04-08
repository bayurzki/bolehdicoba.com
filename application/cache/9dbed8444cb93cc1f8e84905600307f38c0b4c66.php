
<?php $__env->startSection('title', "Login Page"); ?>
<?php $__env->startPush('stylesheet'); ?>
   <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/login.min.css" />
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>   
	<div class="uk-padding">
		<div class="uk-width-expand@s">
			<div class="uk-grid-small uk-child-width-1-2@s uk-flex-center uk-text-center mx-auto" uk-grid>
				<div class="mx-auto">
					<div class="uk-card uk-card-default uk-card-body uk-border-rounded">
						<div class="uk-width-expands@m uk-animation-scale-up uk-padding uk-text-left">
							<div class="uk-text-center uk-margin-large">
								<img src="<?= base_url() ?>assets/images/bdd-logo-no-text.png" alt="" width="100"
									class="uk-align-center uk-margin-bottom">
								<h2 class="uk-margin-remove bdd-color-1" style="font-family: Gelion-Medium;">BDD Agency CMS
								</h2>
								<span class="bdd-color-2" style="font-family: Gelion-Regular;">Sign in Now</span>
							</div>
							<form action="<?= base_url('admin/login'); ?>" method="post">
								<div>
									<div class="uk-margin">
										<label class="uk-form-label bdd-label-1" for="email">Your Email</label>
										<div class="uk-form-controls">
											<input type="email" name="username" id="username" placeholder="you@example.com"
												class="uk-input bdd-input-1 uk-form-small uk-margin-small uk-margin-remove-top">
                                 <p class="text-danger"><?php echo form_error('username') ?></p>
										</div>										
									</div>

									<div class="uk-margin uk-margin-remove-bottom">
										<label class="uk-form-label bdd-label-1" for="password">Password</label>
										<div class="uk-form-controls">
											<input type="password" name="password" id="password" placeholder="Enter your password"
                                    class="uk-input bdd-input-1 uk-form-small uk-margin-small uk-margin-remove-top">
                                 <p class="text-danger"><?php echo form_error('password') ?></p>
										</div>										
									</div>
                           
                           <p class="text-danger">
                              <?php
                                 $CI = &get_instance();
                                 echo $CI->session->flashdata("errors");
                              ?>
                           </p>

									<div class="uk-width-expands@m uk-margin-large uk-text-center">
										<button
											class="uk-button uk-width-expands@m bdd-button-login-1 uk-box-shadow-medium uk-text-capitalize"
											type="submit" name="login">Sign In</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u6065760/public_html/bolehdicoba.com/application/views/admin/login.blade.php ENDPATH**/ ?>