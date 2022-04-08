$(document).ready(function(){
  
  $('.news-update').owlCarousel({
    loop: false,
    nav: false,
    items: 1,
    responsive:{
        0: {
            items: 2,
            navText: ["<button type='button' class='btn'> <img src='https://bolehdicoba.com/assets/webpage/icons/12/yellowleft_arrow_ic@3x.svg' class='img-fluid'> </button>","<button type='button' class='btn bdd-primary-btn'><img src='https://bolehdicoba.com/assets/webpage/icons/12/blackright_arrow_ic@3x.svg'></button>"]
        }
    }
  });

  $('.meet-team').owlCarousel({
    loop:true,
    margin:20,
    items: 1,
    stagePadding: 150,
    responsiveClass:true,
    responsive:{
      0:{
          items: 1,
          stagePadding: 50
      },
      1000: {
        items: 4
      }
    }
  });

  $('.popular-post').owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    navText: ["<div class='btn bdd-secondary-btn'><img src='https://bolehdicoba.com/assets/webpage/icons/12/yellowleft_arrow_ic.png'></div>","<div class='btn bdd-primary-btn'><img src='https://bolehdicoba.com/assets/webpage/icons/12/blackright_arrow_ic.png'></div>"],
    responsive: {
      0: {
          items: 2,
          navText: ["<button type='button' class='btn'> <img src='https://bolehdicoba.com/assets/webpage/icons/12/yellowleft_arrow_ic@3x.svg' class='img-fluid'> </button>","<button type='button' class='btn bdd-primary-btn'><img src='https://bolehdicoba.com/assets/webpage/icons/12/blackright_arrow_ic@3x.svg'></button>"]
      },
      750: {
        items: 3,
        stagePadding: 100
      }
    }
  });

  $('.news-detail').owlCarousel({
    items: 3,
    loop: false,
    margin: 10,
    nav: true,
    navText: ["<div class='btn bdd-secondary-btn'><img src='https://bolehdicoba.com/assets/webpage/icons/12/yellowleft_arrow_ic.png'></div>","<div class='btn bdd-primary-btn'><img src='https://bolehdicoba.com/assets/webpage/icons/12/blackright_arrow_ic.png'></div>"],
    responsive: {
      0: {
          items: 2,
          navText: ["<button type='button' class='btn'> <img src='https://bolehdicoba.com/assets/webpage/icons/12/yellowleft_arrow_ic@3x.svg' class='img-fluid'> </button>","<button type='button' class='btn bdd-primary-btn'><img src='https://bolehdicoba.com/assets/webpage/icons/12/blackright_arrow_ic@3x.svg'></button>"]
      },
      750: {
        items: 3,
      }
    }
  });

  $('.case-detail').owlCarousel({
    items: 3,
    loop: false,
    margin: 10,
    nav: true,
    navText: ["<div class='btn bdd-secondary-btn'><img src='https://bolehdicoba.com/assets/webpage/icons/12/yellowleft_arrow_ic.png'></div>","<div class='btn bdd-primary-btn'><img src='https://bolehdicoba.com/assets/webpage/icons/12/blackright_arrow_ic.png'></div>"],
    responsive: {
      0: {
          items: 2,
          navText: ["<button type='button' class='btn'> <img src='https://bolehdicoba.com/assets/webpage/icons/12/yellowleft_arrow_ic@3x.svg' class='img-fluid'> </button>","<button type='button' class='btn bdd-primary-btn'><img src='https://bolehdicoba.com/assets/webpage/icons/12/blackright_arrow_ic@3x.svg'></button>"]
      },
      750: {
        items: 3,
      }
    }
  });6

  $('.team-memba').owlCarousel({
    items: 6,
    loop: true,
    nav: true,
    autoWidth: true,
    navText: ["<div class='btn bdd-secondary-btn'><img src='https://bolehdicoba.com/assets/webpage/icons/12/yellowleft_arrow_ic.png'></div>","<div class='btn bdd-primary-btn'><img src='https://bolehdicoba.com/assets/webpage/icons/12/blackright_arrow_ic.png'></div>"],
    // navText: ["<button type='button' class='btn'> <img src='https://bolehdicoba.com/assets/webpage/icons/12/yellowleft_arrow_ic@3x.svg' class='img-fluid'> </button>","<button type='button' class='btn bdd-primary-btn'><img src='https://bolehdicoba.com/assets/webpage/icons/12/blackright_arrow_ic@3x.svg'></button>"],
    center: true,
    responsive: {
      0: {
        autoWidth: true,
        items: 1
      },
      748: {
        items: 6
      }
    }
  })

  $('.grid-gallery').owlCarousel({   
    margin: 10,
    items: 1,
    nav: true,
    navText: ["<div class='btn bdd-secondary-btn'><img src='https://bolehdicoba.com/assets/webpage/icons/12/yellowleft_arrow_ic.png'></div>","<div class='btn bdd-primary-btn'><img src='https://bolehdicoba.com/assets/webpage/icons/12/blackright_arrow_ic.png'></div>"],
    responsive: {
      0: {
        items: 1,
        nav: true,
        navText: ["<div class='btn bdd-secondary-btn'><img src='https://bolehdicoba.com/assets/webpage/icons/12/yellowleft_arrow_ic.png'></div>","<div class='btn bdd-primary-btn'><img src='https://bolehdicoba.com/assets/webpage/icons/12/blackright_arrow_ic.png'></div>"],
      }
    }
  })

  $('.grid-gallery-mobile').owlCarousel({   
    margin: 10,
    items: 1,
    nav: false,
    navText: ["<div class='btn bdd-secondary-btn'><img src='https://bolehdicoba.com/assets/webpage/icons/12/yellowleft_arrow_ic.png'></div>","<div class='btn bdd-primary-btn'><img src='https://bolehdicoba.com/assets/webpage/icons/12/blackright_arrow_ic.png'></div>"]
  })

  $('.case-studies-slider').owlCarousel({
    loop: true,
    margin: 10,
    items: 1,
    nav: true,
    center: false,
    navText: ["<div class='btn bdd-secondary-btn'><img src='https://bolehdicoba.com/assets/webpage/icons/12/yellowleft_arrow_ic.png'></div>","<div class='btn bdd-primary-btn'><img src='https://bolehdicoba.com/assets/webpage/icons/12/blackright_arrow_ic.png'></div>"],
    responsive: {
      748: {
        items: 5,
        center: true
      }
    }
  })
  
    // refresh AOS when resizes
    $(window).resize(function() {
        console.log("Resized", AOS)
        // AOS.init({
        //   disable: 'mobile'
        // })
        
        // AOS.refresh()
    })
});
