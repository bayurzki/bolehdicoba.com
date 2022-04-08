@extends('webpage.layouts.app')
@section('title', "2021 Digital Marketing Insights | Boleh Dicoba Digital")
@section('content')
    @include('webpage.layouts.navbar')
    <section class="pt-25">
    	<div class="container">
    		<h2 class="mb-4 text-center">@php echo $title @endphp</h2>

    		<div class="row">
    			<div class="col-md-6">
    				<a href="{{ base_url() . 'assets/images/events/ramadhan-insights.jpeg' }}" target="_blank">
    					<img src="{{ base_url() . 'assets/images/events/marketing-insights.jpeg' }}" class="img-fluid">
    				</a>
    			</div>
    			<div class="col-md-6 pt-mobile-4">
    				<form class="pb-mobile-4 w-90" style="margin: auto;" action="https://docs.google.com/forms/u/5/d/e/1FAIpQLSc9TvgnJKJjmrMnw0O5kyFQhIejj4btFuXijvZYcT73mT8_1A/formResponse">
    					<h5 class="text-center">@php echo $teks @endphp</h5>
		    			<div class="form-group mb-4">
		    				<label class="label-control">Name</label>
		    				<input type="text" name="entry.2049672045" class="form-control" />
		    			</div>

		    			<div class="form-group mb-4">
		    				<label class="label-control">No. HP / No. Whatsapp</label>
		    				<input type="text" inputmode="numeric" name="entry.11297993" class="form-control" />
		    			</div>

		    			<div class="form-group mb-4">
		    				<label class="label-control">Email</label>
		    				<input type="email" inputmode="email" name="entry.410317758" class="form-control" />
		    			</div>

		    			<div class="form-group mb-4">
		    				<label class="label-control">Brand / Bisnis / Company</label>
		    				<input type="text" name="entry.1076596951" class="form-control" />
		    			</div>

		    			<div class="form-group mb-4">
		    				<button type="submit" class="btn bdd-primary-btn mt-3">Submit</button>
		    			</div>
		    		</form>
    			</div>
    		</div>
    	</div>
    </section>
    @include('webpage.layouts.footer')
@endsection