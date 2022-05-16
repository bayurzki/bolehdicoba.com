@extends('webpage.layouts.app')
@section('title', "Case Study | Boleh Dicoba Digital")
@section('content')
    @push('stylesheet')
        <link
          rel="stylesheet"
          href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        />
    @endpush
    @include('webpage.layouts.navbar', ['casestudy' => 'active'])
 <?php
if ($filter != NULL) {
	$search = $filter['search'];
}else{
	$search = '';
}
?>

<hr class="spacing small--hide">
<section id="case-study">
	<div class="container">
		<div class="head-page">
			<div class="row">
				<div class="col-md-3">
					<h2>Case Study</h2>
				</div>
				<div class="col-md-9">
					<p>Stories like these inspire and motivate us. See how businesses <br>similar to yours are growing with Facebook marketing.</p>
				</div>
			</div>
		</div>

		<div class="body-page">
			<div class="row">
				<div class="col-md-3">
					<div class="box-grey">
						<div class="sec-search">
							<span class="inline-box"><i class="fa fa-search"></i></span><input type="text" name="search" class="form-control" placeholder="Find a Case Study" value="<?=$search?>" />
						</div>

						<div class="sec-filter">
							<h4>Filter</h4>
							<div class="form-group">
								<label class="label-control">Business Size</label>
								<select class="form-control" name="bisnis_size" class="select2">
									<option value="all">All</option>
									<?php foreach ($bisnis_size as $key => $value) {
										if ($filter['bisnis_size'] == $value){
											$selected = 'selected';
										}else{
											$selected = '';
										}
									?>
									<option value="<?=$value?>" <?=$selected?>><?=$value?></option>
									<?php
									} ?>
								</select>
							</div>

							<div class="form-group">
								<label class="label-control">Objective</label>
								<select class="form-control" name="objective" class="select2">
									<option value="all" style="font-weight: bold;">All</option>
									<?php foreach ($objective as $key => $value) {
										if ($filter['objective'] == $value['parent']){
											$selected = 'selected';
										}else{
											$selected = '';
										}
									?>
									<option value="<?=$value['parent']?>" style="font-weight: bold;" <?=$selected?>><?=$value['parent']?></option>
									<?php
										foreach ($value['child'] as $x => $y) {
											if ($filter['objective'] == $y){
												$selected = 'selected';
											}else{
												$selected = '';
											}
									?>
									<option value="<?=$y?>" style="margin-left: 5px;" <?=$selected?>><?=$y?></option>
									<?php
										}
									} ?>
								</select>
							</div>

							<div class="form-group">
								<label class="label-control">Industry</label>
								<select class="form-control" name="category" class="select2">
									<option value="all">All</option>
									<?php foreach ($industry as $key => $value) {
										if ($filter['industry'] == $value){
											$selected = 'selected';
										}else{
											$selected = '';
										}
									?>
									<option value="<?=$value?>" <?=$selected?>><?=$value?></option>
									<?php
									} ?>
								</select>
							</div>

							<div class="form-group">
								<label class="label-control">Product</label>
								<select class="form-control" name="product" class="select2">
									<option value="all">All</option>
									<?php foreach ($product as $key => $value) {
										if ($filter['product'] == $value){
											$selected = 'selected';
										}else{
											$selected = '';
										}
									?>
									<option value="<?=$value?>" <?=$selected?>><?=$value?></option>
									<?php
									} ?>
								</select>
							</div>

							<div class="form-group">
								<label class="label-control">Region</label>
								<select class="form-control" name="region" class="select2">
									<option value="all">All</option>
									<?php foreach ($region as $key => $value) {
										if ($filter['region'] == $value['name']){
											$selected = 'selected';
										}else{
											$selected = '';
										}
									?>
									<option value="<?=$value['name']?>" <?=$selected?>><?=$value['name']?></option>
									<?php
									} ?>
								</select>
							</div>

							<div class="form-group">
								<a href="#" class="btn bdd-third-btn mt-3" onclick="filter()">Filter</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-9">
					<?php 
					if ($data!=NULL){ ?>
					<p class="count-result">Showing <span style="font-weight:bold; color: #000;"><?=sizeof($data)?></span> Case Study</p>
					<div class="row">
						<?php 
						foreach ($data as $key => $value) {
							$string = str_replace(' ', '-', $value->name); // Replaces all spaces with hyphens.
							$string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

							$urlna = preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
							$urlna = base_url('case-study/' . str_replace(' ', '-', strtolower($value->category)) . '/' . $urlna . '/' . $value->id);
						?>
						<div class="col-md-6">
							<div class="list-case">
								<a href="<?=$urlna?>">
									<img src="<?=base_url().'/assets/images/'.$value->img_path?>" class="img-fluid" />
								</a>
								<a href="<?=$urlna?>"><h3 class="title"><?= $value->name ?></h3></a>
								<div class="excerpt">
									<?= $value->excerpt ?>
								</div>
							</div>
						</div>
						<?php } ?>
					</div>
					<?php }else{
						echo 'no data';
					} ?>
				</div>
			</div>
		</div>
	</div>
</section>

<script type="text/javascript">
	function filter(){
		var search = $('[name="search"]').val();
		var bisnis_size = $('[name="bisnis_size"]').find(":selected").val();
		var industry = $('[name="category"]').find(":selected").val();
		var product = $('[name="product"]').find(":selected").val();
		var region = $('[name="region"]').find(":selected").val();
		var objective = $('[name="objective"]').find(":selected").val();

		var par = 'search='+search+'&bisnis_size='+bisnis_size+'&industry='+industry+'&product='+product+'&region='+region+'&objective='+objective; 
		window.location.href = "<?=base_url().'case-study?'?>"+par;
	}
</script>