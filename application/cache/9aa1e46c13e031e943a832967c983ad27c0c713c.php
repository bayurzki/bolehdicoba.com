<div class="tm-head uk-visible@m uk-background-default uk-card">
  <div class="uk-width-expands@m">
    <div class="uk-inline uk-width-expands@m">
      <button class="uk-width-expands@m uk-flex uk-text-muted uk-text-capitalize uk-button uk-button-small uk-button-default uk-background-default uk-padding-remove uk-border-rounded" style="padding:5px !important;    align-items: center;">
				<div style="display: inline-block;border: 2px solid;padding: 5px;height: 35px;width: 35px;border-radius: 50px;background-image:url(<?= base_url()?>assets/images/bdd-logo-no-text.png);background-size: cover;background-position: center;background-repeat: no-repeat;">
				</div>
				<span class="uk-text-middle uk-margin-small-left">Hi, </span>
				<span class="mdi mdi-arrow-down-drop-circle mdi-16px bdd-color-3" style="position: absolute;right: 0;margin-right: 10px;"></span>
			</button>
      <div uk-drop="pos: bottom-justify">
        <div class="uk-card uk-card-default uk-padding-small uk-text-small">
          <div class="uk-width-expands">
						<span class="mdi mdi-email mdi-16px ">
             Admin
            </span>
					</div>
          <hr>
          <div class="uk-width-expands">
            <a href="<?= base_url('admin/logout') ?>" class="uk-text-muted uk-button uk-button-small uk-padding-remove uk-border-rounded" uk-tooltip="title: logout; pos: bottom; offset: -5" style="background-color: rgb(0,0,0,0);">
							<span class="mdi mdi-logout mdi-16px uk-margin-small-right uk-text-capitalize" > Sign Out</span>
						</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php /**PATH /home/u5891500/public_html/application/views/layouts/panel.blade.php ENDPATH**/ ?>