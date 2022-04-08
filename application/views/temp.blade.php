@extends('admin.component.app')
@section('page-title','Main Content Management')
@push('custom-scripts')
<script type="module" src="<?=base_url()?>assets/js/form-component/component.js"></script>

@if ( @$detail_data)
    <script>id = {{count($detail_data)+1}}</script>
@else
    <script>id = 1</script>
@endif

<script>    
	function onStyleChange(el) {
		const detail_button = document.querySelector('#detail_content_btn');
		const image_input = document.querySelector('#image_input');
		const detail_title = document.querySelector('#detail_content_title');

		const style_with_detail = ['image-carousel', 'pricing', 'detail-card-list', 'card-carousel',
			'card-carousel-review', 'content-image-left-wpoint', 'content-image-right-wpoint',
			'detail-card-list-big-left', 'detail-card-list-big-center'
		];
		const style_with_detail_and_image_upload = ['content-image-left-wpoint', 'content-image-right-wpoint']
		let selected_option = el.options[el.options.selectedIndex].text;


		if (style_with_detail.includes(selected_option)) {
			detail_title.removeAttribute('hidden');
			detail_button.removeAttribute('disabled');
			if (!style_with_detail_and_image_upload.includes(selected_option)) {
				image_input.setAttribute('disabled', '');
			}
		} else {
			detail_title.setAttribute('hidden', '');
			detail_button.setAttribute('disabled', '');
			image_input.removeAttribute('disabled');
		}
	}

	function addDetailContentForm(el) {
		const content_form = document.querySelector('#content_form');
		const HTML = `<div class="uk-animation-slide-bottom-small" style="margin-top: 10px">
        	<div class="uk-card uk-card-default uk-card-body uk-grid-small" uk-grid>
        		<div class="uk-width-1-2@s">
        			<label class="uk-form-label" for="form-stacked-text">Title</label>
        			<input class="uk-input" type="text" placeholder="Title" name="title_detail[]"
        				value="{{ @$detaildata ? $detaildata->title : ''}}">
        		</div>

        		<div class="uk-width-1-2@s">
        			<label class="uk-form-label" for="form-stacked-text">Sub Title</label>
        			<input class="uk-input" type="text" placeholder="Sub Title" name="subtitle_detail[]"
        				value="{{ @$detaildata ? $detaildata->subtitle : ''}}">
        		</div>

        		<div class="uk-width-1-1">
        			<label class="uk-form-label" for="form-stacked-text">Description</label>
        			<textarea class="uk-textarea" rows="5"
        				name="description_detail[]">{{ @$detaildata ? $detaildata->description : ''}}</textarea>
        		</div>

        		<div class="uk-width-1-2@s">
        			<label class="uk-form-label" for="form-stacked-text">Link</label>
        			<input class="uk-input" type="text" placeholder="Link" name="link_detail[]"
        				value="{{ @$detaildata ? $detaildata->link : ''}}">
        		</div>

        		<div class="uk-width-1-2@s">
        			<label class="uk-form-label" for="form-stacked-text">Link Text</label>
        			<input class="uk-input" type="text" placeholder="Link Text" name="link_text_detail[]"
        				value="{{ @$detaildata ? $detaildata->link_text : ''}}">
        		</div>

        		<div class="uk-width-1-2@s">
        			<label class="uk-form-label" for="form-stacked-text">Image</label>
        			<input class="uk-input" type="file"  name="image_detail[]" id="input_image_detail-${id}" data-img-type='detail' data-detail-id='${id}' onchange="previewImage(this)">
        		</div>

                <div class="uk-width-1-2@s">
                    <label class="uk-form-label" for="form-stacked-text">Image Preview</label>	
                    <div id="preview_image_detail-${id}">
                        <div class="uk-placeholder uk-text-center" style="margin-top:0; height: 50px">Your Image</div>
                    </div>	
                </div>
        	</div>
        </div>`;
		content_form.insertAdjacentHTML("beforeend", HTML);
        id++;
	}

    function previewImage(input){        
        const file = '';
        const placeholder = '';
        const item = ''

        if(input.dataset.imgType == 'main'){
            const file = $(".input_image_main").get(0).files[0];            
            const placeholder = document.querySelector('#preview_image_main');
            const item = placeholder.firstElementChild;        

            if(file){
                const reader = new FileReader();
    
                reader.onload = function(){
                    const image = document.createElement('IMG');
                    image.setAttribute("src", reader.result);
                    image.setAttribute("width", "60%");
                    image.setAttribute("height", "60%");
                    image.setAttribute("alt", "Main Image Preview");
                    placeholder.removeChild(item);
                    placeholder.appendChild(image);
                    // $("#previewImg").attr("src", reader.result);
                }
    
                reader.readAsDataURL(file);
            }
        }else{
            const imgId = input.dataset.detailId;
            const file = $("#input_image_detail-"+imgId).get(0).files[0];
            const placeholder = document.querySelector('#preview_image_detail-'+imgId);
            const item = placeholder.firstElementChild;

            if(file){
                const reader = new FileReader();
    
                reader.onload = function(){
                    const image = document.createElement('IMG');
                    image.setAttribute("src", reader.result);
                    image.setAttribute("width", "60%");
                    image.setAttribute("height", "60%");
                    image.setAttribute("alt", "Main Image Preview");
                    placeholder.removeChild(item);
                    placeholder.appendChild(image);
                    // $("#previewImg").attr("src", reader.result);
                }
    
                reader.readAsDataURL(file);
            }
        }

    }

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

    let fileInput = document.getElementById('image')
    fileInput.addEventListener('change', loader)
</script>
@endpush
@section('page-content')
<div class="uk-background-default" style="padding-top: 20px !important">
	<form id="content_form"
		action="{{ @$data ? base_url('post/editCase/' . $data->id) : base_url('post/addCase')}}"
		method="post" enctype="multipart/form-data">
		<!-- Main Title -->
        <div class="main-title" style="z-index: 980;" uk-sticky="bottom: #offset;animation: uk-animation-slide-bottom-small">
            <div class="uk-card uk-card-default uk-card-body" style="padding: 10px 20px 0px 20px">
                <div class="uk-float-left">
                	<h3 class="uk-text-muted">{{ @$data ? 'Edit Main Content' : 'Add New Main Content'}}</h3>
                </div>
                <div class="uk-float-right">
                	<button type="submit" class="uk-button uk-button-primary uk-float-right"
                		style="margin-left: 15px">Submit</button>
                	<button type="button" id="detail_content_btn" class="uk-button uk-button-secondary uk-float-right"
                        {{ @$detail_data? '' : 'disabled'}} onclick="addDetailContentForm(this)">Add Detail Content</button>
                </div>
            </div>			
		</div>

		<!-- Main Page Content -->
		<div class="uk-animation-slide-bottom-small">
			<div class="uk-card uk-card-default uk-card-body uk-grid-small" uk-grid>
				<div class="uk-width-1-2@s">
					<label class="uk-form-label" for="form-stacked-text">Menu</label>
					<select class="uk-select" name="menu_id">
						@foreach ($menu as $item)
						<option value="{{$item->id}}" {{$item->id ==  @$data->menu_id ? 'Selected' : ''}}>
							{{ucfirst($item->menu_name)}}</option>
						@endforeach
					</select>
				</div>

				<div class="uk-width-1-2@s">
					<label class="uk-form-label" for="form-stacked-text">Style</label>
					<select class="uk-select" name="style_id" id="style_select" onchange="onStyleChange(this)">
						@foreach ($style as $item)
						<option value="{{$item->id}}" {{$item->id ==  @$data->style_id ? 'Selected' : ''}}>
							{{$item->style_name}}</option>
						@endforeach
					</select>
				</div>

				<div class="uk-width-1-2@s">
					<label class="uk-form-label" for="form-stacked-text">Title</label>
					<input class="uk-input" type="text" placeholder="Title" name="title"
						value="{{ @$data ? $data->title : ''}}">
				</div>

				<div class="uk-width-1-2@s">
					<label class="uk-form-label" for="form-stacked-text">Sub Title</label>
					<input class="uk-input" type="text" placeholder="Sub Title" name="subtitle"
						value="{{ @$data ? $data->subtitle : ''}}">
				</div>

				<div class="uk-width-1-1">
					<label class="uk-form-label" for="form-stacked-text">Description</label>
					<textarea class="uk-textarea" rows="5"
						name="description">{{ @$data ? $data->description : ''}}</textarea>
				</div>

				<div class="uk-width-1-2@s">
					<label class="uk-form-label" for="form-stacked-text">Link</label>
					<input class="uk-input" type="text" placeholder="Link" name="link"
						value="{{ @$data ? $data->link : ''}}">
				</div>

				<div class="uk-width-1-2@s">
					<label class="uk-form-label" for="form-stacked-text">Link Text</label>
					<input class="uk-input" type="text" placeholder="Link Text" name="link_text"
						value="{{ @$data ? $data->link_text : ''}}">
				</div>

				<div class="uk-width-1-2@s">
					<label class="uk-form-label" for="form-stacked-text">Image</label>
                    <input class="uk-input input_image_main" type="file" name="image" id="image_input" data-img-type='main' onchange="previewImage(this);"
                    {{ @$detail_data ? 'disabled' :''}}>
					@if ( @$data)
					<input type="hidden" name="old_image" value="{{ @$data->image}}">
					@endif
                </div>

				<div class="uk-width-1-2@s">
                    <label class="uk-form-label" for="form-stacked-text">Image Preview</label>	
                    <div id="preview_image_main">
                        @if ( @$data->image != 'no-image' &&  @$data)
                            <img src="{{base_url('/assets/images/uploads/'. @$data->image)}}" width="50%" height="50%">
                        @else
                            <div class="uk-placeholder uk-text-center" style="margin-top:0; height: 50px">Your Image</div>			
                        @endif
                    </div>	
                </div>                				
			</div>

			<div id="detail_content_title" class="main-title uk-clearfix" style="margin-top: 30px;padding: 10px 30px 0px 30px;" hidden>
				<div class="uk-float-left">
					<h3 class="uk-text-muted">{{ @$data ? 'Edit Detail Content' : 'Add Detail Content'}}</h3>
				</div>
			</div>
			@if ( @$detail_data)
			@foreach ($detail_data as $item)
			<div class="uk-animation-slide-bottom-small" style="margin-top: 10px">
				<div class="uk-card uk-card-default uk-card-body uk-grid-small" uk-grid>
					<input type="hidden" type="text" value={{$item->id}} name="id_detail[]">
					<div class="uk-width-1-2@s">
						<label class="uk-form-label" for="form-stacked-text">Title</label>
						<input class="uk-input" type="text" placeholder="Title" name="title_detail[]"
							value="{{$item->title}}">
					</div>

					<div class="uk-width-1-2@s">
						<label class="uk-form-label" for="form-stacked-text">Sub Title</label>
						<input class="uk-input" type="text" placeholder="Sub Title" name="subtitle_detail[]"
							value="{{$item->subtitle}}">
					</div>

					<div class="uk-width-1-1">
						<label class="uk-form-label" for="form-stacked-text">Description</label>
						<textarea class="uk-textarea" rows="5"
							name="description_detail[]">{{$item->description}}</textarea>
					</div>

					<div class="uk-width-1-2@s">
						<label class="uk-form-label" for="form-stacked-text">Link</label>
						<input class="uk-input" type="text" placeholder="Link" name="link_detail[]"
							value="{{$item->link}}">
					</div>

					<div class="uk-width-1-2@s">
						<label class="uk-form-label" for="form-stacked-text">Link Text</label>
						<input class="uk-input" type="text" placeholder="Link Text" name="link_text_detail[]"
							value="{{$item->link_text}}">
					</div>

					<div class="uk-width-1-2@s">
						<label class="uk-form-label" for="form-stacked-text">Image</label>
                        <input class="uk-input" type="file" name="image_detail[]" onchange="previewImage(this)" id="input_image_detail-{{$loop->iteration}}" data-img-type='detail' data-detail-id='{{$loop->iteration}}'>
						<input type="hidden" name="old_image_detail[]" value="{{$item->image}}">
                    </div>
                    
                    <div class="uk-width-1-2@s">
                        <label class="uk-form-label" for="form-stacked-text">Image Preview</label>	
                        <div id="preview_image_detail-{{$loop->iteration}}">                            
                            <img src="{{base_url('/assets/images/uploads/'.$item->image)}}" width="50%" height="50%">                            
                        </div>	
                    </div>
				</div>
			</div>
			@endforeach
			@endif
		</div>
	</form>
</div>
@endsection
