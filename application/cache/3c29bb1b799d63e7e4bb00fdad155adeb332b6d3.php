<?php $__env->startSection('title', "Edit Component"); ?>
<?php $__env->startPush('stylesheet'); ?>
   <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/edit-component.min.css">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Main Sidebar Container -->  
    <div id="edit-component-app" class="content-wrapper" x-data="initState('<?php echo e($data->result()[0]->style); ?>')">
        <div class="container">
            <div class="title text-center">
                <h1>
                    Edit Components
                </h1>
            </div>
            <form action="<?php echo base_url() ?>post/editPost/<?php echo $data->result()[0]->id ?>" method="POST" enctype="multipart/form-data">
                <?php $__currentLoopData = $data->result(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                    
                <div class="form-group">
                <input type="text" name="name" id="name" required value="<?php echo e($row->name); ?>" />
                    <label class="control-label-not-empty">Component Name</label>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <select name="style" id="style" @change="setStyle" required>
                                <option value="">Select style</option>
                                <option value="banner" <?php echo e($row->style == 'banner' ? 'selected' : ''); ?>>Banner</option>
                                <option value="banner-with-title" <?php echo e($row->style == 'banner-with-title' ? 'selected' : ''); ?>>Banner-with-title</option>
                                <option value="category-and-title" <?php echo e($row->style == 'category-and-title' ? 'selected' : ''); ?>>Category-and-title</option>
                                <option value="description-with-sosmed" <?php echo e($row->style == 'description-with-sosmed' ? 'selected' : ''); ?>>Description-with-sosmed</option>
                                <option value="image-with-right-content" <?php echo e($row->style == 'image-with-right-content' ? 'selected' : ''); ?>>Image-with-right-content</option>
                                <option value="reguler-description" <?php echo e($row->style == 'reguler-description' ? 'selected' : ''); ?>>Reguler-description</option>
                                <option value="clients-says" <?php echo e($row->style == 'clients-says' ? 'selected' : ''); ?>>Clients-says</option>
                                <option value="carousel" <?php echo e($row->style == 'carousel' ? 'selected' : ''); ?>>Carousel</option>
                            </select>
                            <label class="control-label-not-empty">Component Style</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group pr-desktop-3">
                        <input type="text" name="title" id="title" placeholder="Title" value="<?php echo e($row->title); ?>" :disabled="title" />
                            <label class="control-label">Title</label>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <input type="text" name="sub_title" id="sub-title" placeholder="Sub Title" value="<?php echo e($row->sub_title); ?>" :disabled="title" />
                            <label class="control-label">Sub Title</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <textarea class="w-100" name="description" id="description" placeholder="Ceritanya ini rich text"><?php echo e($row->description); ?></textarea>
                    <label class="control-label">Description</label>
                </div>
                <div class="form-group">
                    <input type="text" name="lists" id="list" placeholder="Digital Campaign Strategy,Another List,Etc ..." value="<?php echo e($row->lists); ?>" :disabled="list" />
                    <label class="control-label">Lists</label>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group pr-desktop-3">
                            <i class="fab fa-instagram"></i>
                            <input class="pl-4" type="text" name="instagram" id="instagram" placeholder="username" value="<?php echo e($row->instagram); ?>" :disabled="sosmed" />
                            <label class="control-label">Instagram</label>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group pr-desktop-3">
                            <i class="fab fa-facebook"></i>
                            <input class="pl-4" type="text" name="facebook" id="facebook" placeholder="username" value="<?php echo e($row->facebook); ?>" :disabled="sosmed" />
                            <label class="control-label">Facebook</label>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group">
                            <i class="fab fa-twitter"></i>
                            <input class="pl-4" type="text" name="twitter" id="twitter" placeholder="username" value="<?php echo e($row->twitter); ?>" :disabled="sosmed" />
                            <label class="control-label">Twitter</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="order-2 order-md-1 col-12 col-md-6">
                        <div class="form-group pr-desktop-3">
                            <input type="file" name="img_path" id="image" hidden :disabled="image" />
                            <label class="file-control-label" for="image">Image Upload</label>
                            <p class="file-output"><?php echo e($row->img_path); ?></p>
                        </div>
                    </div>
                    <div class="order-1 order-md-2 col-12 col-md-6">
                        <div class="form-group">
                            <label class="control-label-not-empty">Image Preview</label>
                            <img id="image-preview" src="<?php echo base_url() . 'assets/images/' . $row->img_path ?>" alt="image_preview" width="150" height="150" style="object-fit: cover" />
                        </div>
                    </div>
                </div>
                <div class="form-group text-right">
                    <button class="btn-primary" type="submit" :disabled="submit">
                        Submit
                    </button>
                </div>
                <?php
                    $CI = &get_instance();

                    if ($CI->session->flashdata("failed")) {
                ?>
                        <div class="text-center">
                            <h2 class="text-danger">
                                <?php
                                    echo $CI->session->flashdata("failed")['message'];
                                ?>                                
                            </h2>
                        </div>
                <?php
                    }
                ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </form>
        </div>  
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
    <script src="<?php echo base_url() ?>assets/ckeditor/ckeditor.js"></script>
    <script>
        // Replace the <textarea id="description"> with a CKEditor 4
        // instance, using default configuration.
        CKEDITOR.replace( 'description', {
            toolbar: [
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
        } );

        const initState = (val) => {
            let style = val

            const setDefault = (value) => {
                let result

                switch (style) {
                    case 'banner':
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
                    case 'banner-with-title':
                        switch (value) {
                            case 'title':
                                result = false
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
                    case 'category-and-title':
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
                    case 'description-with-sosmed':
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
                    case 'image-with-right-content':
                        switch (value) {
                            case 'title':
                                result = false
                                break;
                            case 'description':
                                result = false
                                break;
                            case 'image':
                                result = false
                                break;
                            case 'sosmed':
                                result = true
                                break;
                            case 'list':
                                result = false
                                break;
                            case 'submit':
                                result = false
                                break;
                            default:
                                break;
                            }
                        break;
                    case 'reguler-description':
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
                    case 'clients-says':
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
                    default:
                        result = true
                        break;
                }

                return result
            }

            return {
                style,
                title: setDefault('title'),
                description: setDefault('description'),
                image: setDefault('image'),
                sosmed: setDefault('sosmed'),
                list: setDefault('list'),
                submit: setDefault('submit'),
                setStyle({ target }) {
                    this.style = target.value

                    this.check()
                },
                check() {
                    switch (this.style) {
                        case "banner":
                            this.title = true
                            this.description = true
                            this.image = false
                            this.sosmed = true
                            this.list = true
                            this.submit = false
                            break;                            
                        case "banner-with-title":
                            this.title = false
                            this.description = true
                            this.image = false
                            this.sosmed = true
                            this.list = true
                            this.submit = false
                            break;
                        case "category-and-title":
                            this.title = false
                            this.description = true
                            this.image = true
                            this.sosmed = true
                            this.list = true
                            this.submit = false
                            break;
                        case "description-with-sosmed":
                            this.title = true
                            this.description = false
                            this.image = true
                            this.sosmed = false
                            this.list = true
                            this.submit = false
                            break;
                        case "image-with-right-content":
                            this.title = false
                            this.description = false
                            this.image = false
                            this.sosmed = true
                            this.list = false
                            this.submit = false
                            break;
                        case "reguler-description":
                            this.title = true
                            this.description = false
                            this.image = true
                            this.sosmed = true
                            this.list = true
                            this.submit = false
                            break;
                        case "clients-says":
                            this.title = false
                            this.description = true
                            this.image = true
                            this.sosmed = true
                            this.list = true
                            this.submit = false
                            break;
                        default:
                            this.title = true
                            this.description = true
                            this.image = true
                            this.sosmed = true
                            this.list = true
                            this.submit = true
                            break;
                    }
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
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Panji\xampp\htdocs\bdd-v2\application\views/admin/edit-component.blade.php ENDPATH**/ ?>