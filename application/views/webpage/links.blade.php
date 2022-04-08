@extends('webpage.layouts.links-app')
@section('title', "Boleh Dicoba Digital")
<style type="text/css">
    #body-links{
        margin-top: 5px; 
        padding-bottom: 15px;
        max-width: 980px;
    }

    .navbar-container{
        max-width: 250px;
    }

    @media only screen and (max-width: 1380px) {
        #body-links{
            max-width: 500px;
        }

        .navbar-container{
            max-width: 100px;
        }
    }

    @media only screen and (max-width: 890px) {
        .navbar-container{
            max-width: 180px;
        }
    }

</style>
<body>
@section('content')
    <nav class="navbar navbar-expand-lg bdd-purple-bg" style="margin-bottom: 2em;">
        <div class="navbar-container" style="display: block; margin: auto;">
            <!-- <button class="navbar-toggler border-0 col-2" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
              <span class="navbar-toggler-icon"></span>
              <span class="navbar-toggler-icon"></span>
            </button> -->
            <!-- <a class="navbar-brand mb-auto col-4 mr-4" href="<?php echo base_url() ?>"> -->
                <img src="<?php echo base_url() ?>assets/webpage/icons/12/new-logo.png" class="img-fluid small--hide" width="170">
                <img src="<?php echo base_url() ?>assets/webpage/icons/12/new-logo.png" class="img-fluid medium-up--hide">
            <!-- </a> -->
        </div>
    </nav>

    <div class="container" id="body-links">
        <div class="row mb-4">
            <div class="col-sm-6 col-6  ">
                <a href="https://wa.me/6281944345758" target="_blank" class="list-links">
                    <img src="<?php echo base_url().'assets/webpage/images/consultation2.jpg' ?>" onclick="consultation()" class="img-fluid lazy" />
                </a>
            </div>
            <div class="col-sm-6 col-6  ">
                <a href="https://wa.me/6281805757585" target="_blank" class="list-links">
                    <img src="<?php echo base_url().'assets/webpage/images/info2.jpg' ?>" onclick="info()" class="img-fluid lazy" />
                </a>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-sm-6 col-6  ">
                <a href="https://www.linkedin.com/company/bolehdicoba/?originalSubdomain=instagram-bolehdicobadigital" target="_blank" class="list-links">
                    <img src="<?php echo base_url().'assets/webpage/images/linkedin.jpg' ?>" onclick="linkedin()" class="img-fluid lazy" />
                </a>
            </div>

            <div class="col-sm-6 col-6  ">
                <a href="https://bolehdicoba.com" class="list-links" target="_blank" >
                    <img src="<?php echo base_url().'assets/webpage/images/web.jpg' ?>" onclick="web()" class="img-fluid lazy" />
                </a>
            </div>
        </div>
    </div>

   
@endsection
</body>

<script type="text/javascript">
    function consultation(){
        fbq('track', 'Consultation');
    }
    function info(){
        fbq('track', 'Info & service center');
    }
    function linkedin(){
        fbq('track', 'Linkedin');
    }
    function web(){
        fbq('track', 'Visit Web');
    }
</script>