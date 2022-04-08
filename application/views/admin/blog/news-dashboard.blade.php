@extends('layouts.app')
@section('title', "BDD | Dashboard")
@section('page-title', 'Dashboard')
@push('stylesheet')
   <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/dashboard.min.css">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
@endpush
@section('content')
<div id="dashboard-app" class="bdd-padding-header uk-background-default" style="padding-top: 20px !important">  
	<!-- Main Title -->
	<div class="main-title uk-clearfix uk-margin-small-bottom">
		<div class="uk-float-left">
			<h3 class="uk-text-muted">News & Update List</h3>
		</div>
		<div class="uk-float-right">
			<a href="<?= base_url('admin/newsForm'); ?>" class="uk-button uk-button-primary uk-rounded">Add News</a>
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
                        @if (empty($data))
                        <tr class="text-center">
                            <td colspan="8">
                                Tidak ada data.
                            </td>
                        </tr>
                        @else
                        @php
                            $option = array();
                        @endphp
                        @foreach ($data as $item)
                        @php
                            if (!in_array($item->category, $option)) {
                                array_push($option, $item->category);
                            }
                        @endphp
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <a href="{{ base_url('admin/newsPosts/' . $item->name . '/' . $item->id) }}">
                                    {{ ucfirst($item->name) }}
                                </a>
                            </td>
                            <td>{{ $item->category ? $item->category : '-' }}</td>
                            <td>{{ $item->title ? $item->title : '-' }}</td>
                            <td>{{ $item->created_at ? date('d M Y', strtotime($item->created_at)) : '-' }}</td>
                            <td>
                                <a href="<?= base_url('admin/newsForm/' . $item->id) ?>">Edit</a>
                                <a onclick="deleteConfirm({{ $item->id }})" href="#!">Delete</a>
                                <a id="delete-{{ $item->id }}" href="<?= base_url('admin/deleteNews/' . $item->id) ?>" hidden></a>
                            </td>
                        </tr>
                        @endforeach 
                        @endif             
                    </tbody>
				</table>
			</div>
        </div>        
        {{-- <div class="row">
            <div class="col-12">
                <div class="text-right">
                    @php echo $pagination; @endphp
                </div>
            </div>
        </div> --}}
  </div>
  
    <div id="my-id" class="uk-modal-container" uk-modal>
        <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
            <button class="uk-modal-close-default" type="button" uk-close></button>        
        </div>
    </div>

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
  </script>
@endpush