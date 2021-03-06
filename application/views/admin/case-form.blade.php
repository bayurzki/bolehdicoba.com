@extends('layouts.app')
@section('title', "BDD | Case Study")
@section('page-title', 'Case Study')
@section('go-back')
    <a href="<?= base_url('admin/dashboard') ?>">
        <span class="go-back" uk-icon="icon: chevron-left"></span>
    </a>
@endsection
@section('content')
@push('stylesheet')
    <link rel="stylesheet" href="<?= base_url('assets/dist/css/case-form.min.css') ?>">
@endpush
@php
    if (empty($data)) {
        $data = (object) array("once" => 0);
    }
@endphp
<div id="case-form-app" class="uk-background-default" style="padding-top: 20px !important">
    @foreach ($data as $row)        
	<form id="content_form"
		action="{{ !empty(@$row) ? base_url('caseStudy/editCase/' . $row->id) : base_url('caseStudy/addCase')}}"
		method="post" enctype="multipart/form-data">
		<!-- Main Title -->
        <div class="main-title" style="z-index: 980;" uk-sticky="bottom: #offset;animation: uk-animation-slide-bottom-small">
            <div class="uk-card uk-card-default uk-card-body" style="padding: 10px 20px 0px 20px">
                <div class="uk-float-left">
                	<h3 class="uk-text-muted">{{ !empty(@$row) ? 'Edit Case Study' : 'Add New Case Study'}}</h3>
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
				<div class="uk-width-1-1@s">
					<label class="uk-form-label" for="form-stacked-text">Name</label>
					<input class="uk-input" type="text" placeholder="Name" name="name"
						value="{{ !empty(@$row) ? $row->name : ''}}">
				</div>

                <div class="uk-width-1-1@s">
                    <label class="uk-form-label" for="form-stacked-text">Excerpt</label>
                    <input class="uk-input" type="text" placeholder="Excerpt" name="excerpt"
                        value="{{ !empty(@$row) ? $row->excerpt : ''}}">
                </div>

                <div class="uk-width-1-2@s">
                    <label class="uk-form-label" for="form-stacked-text">Product</label>
                    <input id="input-category" type="text" list="product" placeholder="product" name="product" value="{{ !empty(@$row) ? $row->product : ''}}" />
                    <datalist name="product" id="product">
                        <?php for ($i=0; $i < sizeof($product) ; $i++) { ?>    
                        <option value="<?=$product[$i] ?>" {{ @$product[$i] == @$row->category ? 'selected' : '' }} >
                            <?=$product[$i] ?>
                        </option>
                        <?php } ?>
                    </datalist >
                </div>

				<div class="uk-width-1-2@s">
                    <label class="uk-form-label" for="form-stacked-text">Industry</label>
                    <input id="input-category" type="text" list="category" placeholder="Category" name="category" value="{{ !empty(@$row) ? $row->category : ''}}" />
					<datalist name="category" id="category">
                        <?php for ($i=0; $i < sizeof($industry) ; $i++) { ?>    
                        <option value="<?=$industry[$i] ?>" {{ @$industry[$i] == @$row->category ? 'selected' : '' }}>
                            <?=$industry[$i] ?>
                        </option>
                        <?php } ?>
					</datalist >
				</div>

				<!-- <div class="uk-width-1-1@s">
					<label class="uk-form-label" for="form-stacked-text">Title</label>
					<input class="uk-input" type="text" placeholder="Title" name="title"
						value="{{ !empty(@$row) ? $row->title : ''}}" required autocomplete="off">
				</div> -->

                <div class="uk-width-1-2@s">
                    <label class="uk-form-label" for="form-stacked-text">Business Size</label>
                    <input id="input-category" type="text" list="bisnis_size" placeholder="Business Size" name="bisnis_size" value="{{ !empty(@$row) ? $row->bisnis_size : ''}}" required autocomplete="off"/>
                    <datalist name="bisnis_size" id="bisnis_size">
                        <?php for ($i=0; $i < sizeof($bisnis_size) ; $i++) { ?>    
                        <option value="<?=$bisnis_size[$i] ?>" {{ @$bisnis_size[$i] == @$row->bisnis_size ? 'selected' : '' }}>
                            <?=$bisnis_size[$i] ?>
                        </option>
                        <?php } ?>
                    </datalist >
                </div>
                
                <div class="uk-width-1-2@s">
                    <label class="uk-form-label" for="form-stacked-text">Region</label>
                    <input id="input-category" type="text" list="region" placeholder="region" name="region" value="{{ !empty(@$row) ? $row->region : ''}}" autocomplete="off" />
                    <datalist name="region" id="region">
                        <?php for ($i=0; $i < sizeof($region) ; $i++) { ?>    
                        <option value="<?=$region[$i]['name'] ?>" {{ @$region[$i]['name']== @$row->region ? 'selected' : '' }}>
                            <?=$region[$i]['name'] ?>
                        </option>
                        <?php } ?>
                    </datalist >
                </div>


                <div class="uk-width-1-1@s">
                    <label class="uk-form-label" for="form-stacked-text">Objective</label>
                    <input id="input-category" type="email" list="objective" placeholder="objective" name="objective" value="{{ !empty(@$row) ? $row->objective : ''}}" class="multidatalist" multiple required autocomplete="off"/>
                    <datalist name="objective" id="objective">
                        <?php for ($i=0; $i < sizeof($objective) ; $i++) { ?>    
                        <option value="<?=$objective[$i]['parent'] ?>" {{ @$objective[$i]['parent']== @$row->objective ? 'selected' : '' }}>
                            <?=$objective[$i]['parent'] ?>
                        </option>
                        <?php 
                            for ($x=0; $x < sizeof($objective[$i]['child']); $x++) { 
                        ?>
                            <option value="<?= $objective[$i]['child'][$x] ?>"></option>
                        <?php
                            }
                        } 
                        ?>
                    </datalist >
                </div>



				<div class="uk-width-1-2@s">
					<label class="uk-form-label">Logo <span class="size-recommended">size recommended: 50x50</span></label>
                    <input type="file" name="logo" class="upload-file" id="image-logo" data-img-type='main' hidden>
                    <label class="uk-margin-small-top file-control-label" for="image-logo">Logo Upload</label>
                    <p class="file-output-image-logo uk-margin-medium-left">{{ !empty(@$row) ? $row->logo : ''}}</p>
                </div>

				<div class="uk-width-1-2@s">
                    <label class="uk-form-label" for="form-stacked-text">Logo Preview</label>	
                    <img id="preview-logo" class="w-100"
                    @if (!empty($row->logo))                        
                        src="@php echo base_url() . 'assets/images/logo/' . $row->logo @endphp" 
                    @else
                        src="https://via.placeholder.com/50x50.png" 
                    @endif
                     alt="image_preview" style="height: 50px; object-fit: contain" />
                </div>       

				<div class="uk-width-1-2@s">
					<label class="uk-form-label">Image <span class="size-recommended">size recommended: 605x650</span></label>
                    <input type="file" name="img_path" class="upload-file" id="image" data-img-type='main' hidden>
                    <label class="uk-margin-small-top file-control-label" for="image">Image Upload</label>
                    <p class="file-output-image uk-margin-medium-left">{{ !empty(@$row) ? $row->img_path : ''}}</p>
                </div>

				<div class="uk-width-1-2@s">
                    <label class="uk-form-label" for="form-stacked-text">Image Preview</label>	
                    <img id="image-preview"
                    @if (!empty($row->img_path))                        
                        src="@php echo base_url() . 'assets/images/' . $row->img_path @endphp" 
                    @else
                        src="https://via.placeholder.com/150x150.png" 
                    @endif
                     alt="image_preview" style="object-fit: contain" />
                </div>           				
			</div>		
		</div>
    </form>
    @endforeach
</div>
@endsection

<?php
    $CI = &get_instance();

    if ($CI->session->flashdata("success")) {
?>
    @section('toast')
        @include('admin.toast')
    @endsection
<?php
    }
?>

@push('script')
<script>
    $(".multidatalist").focusin ( function() { $(this).attr("type","email"); });    
    $(".multidatalist").focusout( function() { $(this).attr("type","text"); });
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
@endpush