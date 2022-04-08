
<?php $__env->startSection('title', "BDD | Dashboard"); ?>
<?php $__env->startSection('page-title', 'Dashboard'); ?>
<?php $__env->startPush('stylesheet'); ?>
   <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/dashboard.min.css">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<div id="dashboard-app" class="bdd-padding-header uk-background-default" style="padding-top: 20px !important">  
	<!-- Main Title -->
	<div class="main-title uk-clearfix uk-margin-small-bottom">
		<div class="uk-float-left">
			<h3 class="uk-text-muted">Case Study List</h3>
		</div>
		<div class="uk-float-right">
			<a href="<?= base_url('admin/caseForm'); ?>" class="uk-button uk-button-primary uk-rounded">Add New Case Study</a>
		</div>
	</div>

	<!-- Main Page Content -->
	<div class="uk-animation-slide-bottom-small">
		<div class="uk-card uk-card-default uk-card-body">
			<div class="Table uk-overflow-auto">
				<table class="uk-table uk-table-striped" id="main-content-list-table">
					<thead>
						<tr>
                            <th>No</th>
                            <th>Name</th>		
                            <th>Category</th>					
                            <th>Title</th>
                            <th>Posted At</th>
                            <th></th>
						</tr>
                    </thead>
                    <tbody>
                        <?php if(empty($data)): ?>
                        <tr class="text-center">
                            <td colspan="8">
                                Tidak ada data.
                            </td>
                        </tr>
                        <?php else: ?>
                        <?php
                            $option = array();
                        ?>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            if (!in_array($item->category, $option)) {
                                array_push($option, $item->category);
                            }
                        ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td>
                                <a href="<?php echo e(base_url('admin/component/' . $item->name . '/' . $item->id)); ?>">
                                    <?php echo e(ucfirst($item->name)); ?>

                                </a>
                            </td>
                            <td><?php echo e($item->category ? $item->category : '-'); ?></td>
                            <td><?php echo e($item->title ? $item->title : '-'); ?></td>
                            <td><?php echo e($item->created_at ? date('d M Y', strtotime($item->created_at)) : '-'); ?></td>
                            <td>
                                <a href="<?= base_url('admin/caseForm/' . $item->id) ?>">Edit</a>
                                <a onclick="deleteConfirm(<?php echo e($item->id); ?>)" href="#!">Delete</a>
                                <a id="delete-<?php echo e($item->id); ?>" href="<?= base_url('admin/deleteCase/' . $item->id) ?>" hidden></a>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                        <?php endif; ?>             
                    </tbody>
				</table>
			</div>
        </div>        
        
  </div>
  
    <div id="my-id" class="uk-modal-container" uk-modal>
        <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
            <button class="uk-modal-close-default" type="button" uk-close></button>        
        </div>
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
    <script>
        $(document).ready(function() {
            const main_content_table = $('#main-content-list-table').DataTable({
                dom: '<"toolbar">rtp',
                "pageLength": 10
            });
    
            $('#main-content-list-table_wrapper > div.toolbar').html(
                `<div class="uk-child-width-expand@s uk-grid-small" uk-grid>
                    <div class='uk-width-1-4@m'>
                        <select class="uk-select" placeholder='Select Category' id="page-filter">
                            <option value="" selected>All Category</option>                                                
                            <?php 
                                foreach ($option as $val) {
                            ?>
                                    <option value="<?= $val ?>" ><?= $val ?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>    
                    <div class="uk-width-3-4@m">                                  
                        <input class="uk-input" type="text" placeholder="Search" id="content-search">                
                    </div>      
                </div>`
            );
    
            //Function to filter page
            $("#page-filter").change(function (e) {
                e.preventDefault();
                if ($(this).val() == ' ') {
                    $['#main-content-list-table'].DataTable().ajax.reload();
                } else {
                    main_content_table.column(2).search($(this).val()).draw();
                }
            });
        
            //Function to search on table
            $(document).on('keyup', '#content-search', function (e) {
                e.preventDefault();
                main_content_table.search($(this).val()).draw();
            });
        });

        function deleteConfirm(id) {        
        UIkit.modal.confirm('The current data will be deleted. Are you sure?')
        .then(function () {          
                const link = document.querySelector('#delete-' + id);
                link.click();
            });
        }    
  
        function showData(element){
            console.log(element.dataset.style);
        }
  </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u5891500/public_html/application/views/admin/dashboard.blade.php ENDPATH**/ ?>