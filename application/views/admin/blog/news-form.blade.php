@extends('layouts.app')
@section('title', "BDD | News Study")
@section('page-title', 'News Study')
@section('go-back')
    <a href="<?= base_url('admin/newsUpdate') ?>">
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
		action="{{ !empty(@$row) ? base_url('newsUpdate/editNews/' . $row->id) : base_url('newsUpdate/addNews')}}"
		method="post" enctype="multipart/form-data">
		<!-- Main Title -->
        <div class="main-title" style="z-index: 980;" uk-sticky="bottom: #offset;animation: uk-animation-slide-bottom-small">
            <div class="uk-card uk-card-default uk-card-body" style="padding: 10px 20px 0px 20px">
                <div class="uk-float-left">
                	<h3 class="uk-text-muted">{{ !empty(@$row) ? 'Edit News' : 'Add News'}}</h3>
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
					<input class="uk-input" type="text" placeholder="Name" name="name" required
						value="{{ !empty(@$row) ? $row->name : ''}}">
				</div>

				<div class="uk-width-1-2@s">
                    <label class="uk-form-label" for="form-stacked-text">Category</label>
                <input id="input-category" type="text" list="category" placeholder="Category" name="category" value="{{ !empty(@$row) ? $row->category : ''}}" />
					<datalist name="category" id="category">
                        @foreach ($category as $category_row)      
                        <option value="{{ $category_row->category }}" {{ @$category_row->category == @$row->category ? 'selected' : '' }}>
                            {{ $category_row->category }}
                        </option>
                        @endforeach
					</datalist>
				</div>

				<div class="uk-width-1-1@s">
					<label class="uk-form-label" for="form-stacked-text">Title</label>
					<input class="uk-input" type="text" placeholder="Title" name="title"
						value="{{ !empty(@$row) ? $row->title : ''}}">
                </div>

                <div class="uk-width-1-1@s">
                    <label class="uk-form-label" for="form-stacked-text">Visibility</label>
                    <select class="uk-input" name="is_public">
                        <option value="0">Public</option>
                        <option value="1">Limited</option>
                    </select>
                </div>
                
                <div class="uk-width-1-1@s">
                    <label class="uk-form-label" for="form-stacked-text">Set as Primary Post</label>
                    <select class="uk-input" name="primary_post">
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                </div>

                <div class="uk-width-1-1@s">
					<label class="uk-form-label" for="form-stacked-text">Streatments</label>
					<input class="uk-input" type="text" placeholder="Streatments" name="streatments"
						value="{{ !empty(@$row) ? $row->streatments : ''}}">
				</div>

				<div class="uk-width-1-2@s">
					<label class="uk-form-label">Image <small>size recommended: 605x650</small></label>
                    <input type="file" name="img_path" id="image" data-img-type='main' hidden>
                    <label class="uk-margin-small-top file-control-label" for="image">Image Upload</label>
                    <p class="file-output uk-margin-medium-left">{{ !empty(@$row) ? $row->img_path : ''}}</p>
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
    // output image preview
    let imagePreview = (e) => {
        if (e.target.files && e.target.files[0]) {
            let reader = new FileReader();
            
            reader.onload = function(e) {
                $('#image-preview').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(e.target.files[0]); // convert to base64 string
        }
    }

        // output filename
    let loader = (e) => {
        imagePreview(e)
        let file = e.target.files

        let output = document.getElementsByClassName('file-output')[0]
        output.innerHTML = file[0].name
    }

    console.log("");
    let fileInput = document.getElementById('image')
    fileInput.addEventListener('change', loader)
</script>
@endpush