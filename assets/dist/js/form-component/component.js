const Standard =
	`<div class="uk-animation-slide-bottom-small" style="margin-top: 10px">
    <div class="uk-card uk-card-default uk-card-body uk-grid-small" uk-grid>
        <div class="uk-width-1-2@s">
            <label class="uk-form-label" for="form-stacked-text">Title</label>
            <input class="uk-input" type="text" placeholder="Title" name="title_detail[]"
                value="{{@$detaildata ? $detaildata->title : ''}}">
        </div>

        <div class="uk-width-1-2@s">
            <label class="uk-form-label" for="form-stacked-text">Sub Title</label>
            <input class="uk-input" type="text" placeholder="Sub Title" name="subtitle_detail[]"
                value="{{@$detaildata ? $detaildata->subtitle : ''}}">
        </div>

        <div class="uk-width-1-1">
            <label class="uk-form-label" for="form-stacked-text">Description</label>
            <textarea class="uk-textarea" rows="5"
                name="description_detail[]">{{@$detaildata ? $detaildata->description : ''}}</textarea>
        </div>

        <div class="uk-width-1-2@s">
            <label class="uk-form-label" for="form-stacked-text">Link</label>
            <input class="uk-input" type="text" placeholder="Link" name="link_detail[]"
                value="{{@$detaildata ? $detaildata->link : ''}}">
        </div>

        <div class="uk-width-1-2@s">
            <label class="uk-form-label" for="form-stacked-text">Link Text</label>
            <input class="uk-input" type="text" placeholder="Link Text" name="link_text_detail[]"
                value="{{@$detaildata ? $detaildata->link_text : ''}}">
        </div>

        <div class="uk-width-1-2@s">
            <label class="uk-form-label" for="form-stacked-text">Image</label>
            <input class="uk-input" type="file" id="input_image_detail-${id}" name="image_detail[]" data-img-type='detail' data-detail-id='${id}' onchange="previewImage(this)">
        </div>

        <div class="uk-width-1-2@s">
            <label class="uk-form-label" for="form-stacked-text">Image Preview</label>	
            <div id="preview_image_detail-${id}">
                <div class="uk-placeholder uk-text-center" style="margin-top:0; height: 50px">Your Image</div>
            </div>	
        </div>
    </div>
</div>`;


export {
	Standard
}