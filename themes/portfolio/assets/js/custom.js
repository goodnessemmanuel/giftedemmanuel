'use strict';
 $(window).on('load',function(){
    $(".load").delay(2000).fadeOut("slow");
     $("#preloader").delay(2000).fadeOut("slow");         
 });

 $(function($){
    function my_gallery(){
        if ( $('.port_area').length ){
          // Activate isotope in container
        $(".port_item_wrapper").imagesLoaded( function() {
                $(".port_item_wrapper").isotope({
                                itemSelector: ".col-lg-4",
                 }); 
          }); 
        // Add isotope click function
       $(".port_menu ul li").on('click',function(){
               $(".port_menu ul li").removeClass("active");
                   $(this).addClass("active");
               var selector = $(this).attr("data-filter");
                $(".port_item_wrapper").isotope({
                                filter: selector,
                                animationOptions: {
                                    duration: 450,
                                    easing: "linear",
                                    queue: false,
                                }
                            });
                            return false;
                            });
                        }
                    }
                my_gallery();
                enableRadialProgress();
                
                //tilt the contact image when it is hovered on.
                $(".contact_pic").tilt({
                    scale: 1.1
                });


                $('.header_area nav .nav.navbar-nav li a[href^="#"]:not([href="#"])').on('click', function(event){
                   var anchor = $(this);
                   $('html, body').stop().animate({
                       scrollTop: $(anchor.attr('href')).offset().top - 80
                    }, 1500);
                    event.preventDefault();
                });

                function bodyScrollAnimation() {
                    var scrollAnimate = $('body').data('scroll-animation');
                    if (scrollAnimate === true) {
                        new WOW({
                            mobile: false
                        }).init()
                    }
                }
                bodyScrollAnimation();
  });

 function enableRadialProgress(){
                
                $(".radial-progress").each(function(){
                    var $this = $(this),
                    	progPercent = $this.data('prog-percent');
                        
                    var bar = new ProgressBar.Circle(this, {
                        color: '#def2f1',
                        strokeWidth: 3,
                        trailWidth: 1,
                        easing: 'easeInOut',
                        duration: 1400,
                        text: {				
                        },
                        from: { color: '#def2f1', width: 1 },
                        to: { color: '#3aafa9', width: 3 },
                        // Set default step function for all animate calls
                        step: function(state, circle) {
                            circle.path.setAttribute('stroke', state.color);
                            circle.path.setAttribute('stroke-width', state.width);

                            var value = Math.round(circle.value() * 100);
                            if (value === 0) {
                                circle.setText('');
                            } else {
                                circle.setText(value);
                            }
                        }
                    });
            
                bar.animate(progPercent); 
 
      });
}