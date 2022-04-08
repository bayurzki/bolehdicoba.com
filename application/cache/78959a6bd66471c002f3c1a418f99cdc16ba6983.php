<?php $__env->startSection('title', "BDD | Add Component"); ?>
<?php $__env->startSection('stylesheet'); ?>
   <?php echo $__env->make('layouts.adminlte_stylesheet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/add-component.min.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.navbar', ['addComponent' => 'active'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Main Sidebar Container -->  
    <div id="add-component-app" class="content-wrapper" x-data="initState()">
        <div class="container">
            <div class="title text-center">
                <h1>
                    Add Components
                </h1>
            </div>
            <form action="<?php echo base_url() ?>post/addPost" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="text" name="name" id="name" required />
                    <label class="control-label-not-empty">Component Name</label>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <select name="style" id="style" @change="setStyle" required>
                                <option value="">Select style</option>
                                <option value="banner">Banner</option>
                                <option value="banner-with-title">Banner-with-title</option>
                                <option value="category-and-title">Category-and-title</option>
                                <option value="description-with-sosmed">Description-with-side-sosmed</option>
                                <option value="image-with-right-content">Image-with-right-content</option>
                                <option value="reguler-description">Reguler-description</option>
                                <option value="clients-says">Clients-says</option>
                                <option value="carousel">Carousel</option>
                            </select>
                            <label class="control-label-not-empty">Component Style</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group pr-desktop-3">
                            <input type="text" name="title" id="title" placeholder="Title" :disabled="title" />
                            <label class="control-label">Title</label>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <input type="text" name="sub_title" id="sub-title" placeholder="Sub Title" :disabled="title" />
                            <label class="control-label">Sub Title</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <textarea class="w-100" name="description" id="description" placeholder="Ceritanya ini rich text"></textarea>
                    <label class="control-label">Description</label>
                </div>
                <div class="form-group">
                    <input type="text" name="lists" id="list" placeholder="Digital Campaign Strategy,Another List,Etc ..." :disabled="list" />
                    <label class="control-label">Lists</label>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group pr-desktop-3">
                            <i class="fab fa-instagram"></i>
                            <input class="pl-4" type="text" name="instagram" id="instagram" placeholder="username" :disabled="sosmed" />
                            <label class="control-label">Instagram</label>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group pr-desktop-3">
                            <i class="fab fa-facebook"></i>
                            <input class="pl-4" type="text" name="facebook" id="facebook" placeholder="username" :disabled="sosmed" />
                            <label class="control-label">Facebook</label>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group">
                            <i class="fab fa-twitter"></i>
                            <input class="pl-4" type="text" name="twitter" id="twitter" placeholder="username" :disabled="sosmed" />
                            <label class="control-label">Twitter</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="order-2 order-md-1 col-12 col-md-6">
                        <div class="form-group pr-desktop-3">
                            <input type="file" name="img_path" id="image" hidden :disabled="image" />
                            <label class="file-control-label" for="image">Image Upload</label>
                            <p class="file-output"></p>
                        </div>
                    </div>
                    <div class="order-1 order-md-2 col-12 col-md-6">
                        <div class="form-group">
                            <label class="control-label-not-empty">Image Preview</label>
                            <img id="image-preview" src="https://via.placeholder.com/150x150.png" alt="image_preview" width="150" height="150" style="object-fit: cover" />
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

<?php $__env->startSection('script'); ?>
    <?php echo $__env->make('layouts.adminlte_script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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

        const initState = () => {
            return {
                style: "",
                title: true,
                description: true,
                image: true,
                sosmed: true,
                list: true,
                submit: true,
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
                        case "carousel":                        
                            this.title = true
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Panji\xampp\htdocs\bdd-v2\application\views/admin/add-component.blade.php ENDPATH**/ ?>