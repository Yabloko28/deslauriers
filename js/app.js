( function( $ ) {
	console.log('w');
$(document).ready(function() {
	$("li.menu-item-has-children").children('a').removeAttr("href");
    $('.grid').imagesLoaded( function(){
    	console.log('work');
        $container.isotope({
        	itemSelector: '.grid-item',
            packery: {
                gutter: 20
            }
        }); 
    });
})
})

// var $grid = $('.grid').isotope({
//         itemSelector: '.grid-item',
//         packery: {
//             gutter: 20
//         }
//   });
  // layout Isotope after each image loads
