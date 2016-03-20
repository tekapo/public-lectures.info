jQuery(document).ready(function($) {
	
	$('table').addClass('table');
	$('button').addClass('btn btn-cls');
	$('a[type="button"]').addClass('btn-cls btn');
	$('textarea').addClass('form-control');
	$('input[type="text"],input[type="email"],input[type="number"],input[type="url"],input[type="tel"],input[type="search"]').addClass('form-control');
	$('input[type="submit"]').addClass('btn-cls btn')
	$('.pagination a').addClass('btn');
	$('div.nav ul').addClass('nav navbar-nav');
    $('div .more-link').addClass('btn btn-cls');
    $('.carousel').carousel();
    $('.attachment-shop_catalog').addClass('img-circle');


 	/*----------------------------------------------------------*/
	$('.form-group').hide();	
	
	$('.fa-search').click(function(event) {
		
		event.preventDefault();
		
		$(this).closest('.navbar-form').find('.form-group').toggle('fast');
		
	});




	//$('.main-nav').css('display', 'none');

	$('.menu-plus').click(function(event) {
		/* Act on the event */
		event.preventDefault();

		$('.main-nav').slideDown('slow');
		$(this).hide();
		$('.menu-minus').show();
	});

	$('.menu-minus').hide();

	$('.menu-minus').click(function(event) {
		/* Act on the event */
		event.preventDefault();

		$('.main-nav').slideUp('slow');
		$(this).hide();
		$('.menu-plus').show();
	});
	
	

    /******************slide drop down*****************/          

            if($('.navbar-toggle').css('display')=='none'){

              $('.nav > li').click(function(e) {

                  e.stopPropagation();

                  var $el = $('ul',this);

                  $('.nav > li > ul').not($el).slideUp();

                  $el.stop(true, true).slideToggle(500);
                  console.log('login ready');

              });

                  $('html').click(function() {

                  $('.nav > li > ul').slideUp();  

              });            
            }

    /******************END slide drop down****************/	

/*-------------------------*/
/*----------Masonry JS---------*/
/*-----------------------------*/

	


	var columns = 3,
	
	setColumns = function() { columns = $( window ).width() > 992 ? 3 : $( window ).width() >= 640 ? 2 : 1; };
		
	setColumns();
		
	$( window ).resize( setColumns );
	
	
	var container = document.querySelector('.list');
		
		  	$('container').masonry({
				// options
		  		columnWidth: function( containerWidth ) { return containerWidth / columns; },
		  	
		  		itemSelector: '.item',
		  	
		  		isAnimated: true,

		  		isResizable: true,
		  	
		  		animationOptions: {
		    	
		    		duration: 350,
		    	
		    		easing: 'linear',
		    	
		    		queue: false
		  		}
		  	});
	  			
		var $container = $('.list');
		// initialize Masonry after all images have loaded  
		$container.imagesLoaded( function() {
			$container.masonry();
		});

		//var $container = $('.list');

		/*$container.infinitescroll({
		  	navSelector  : '#nav-below',    // selector for the paged navigation 
		  	nextSelector : '#nav-below .nav-previous a',  // selector for the NEXT link (to page 2)
		  	itemSelector : '.item',     // selector for all items you'll retrieve
		  	animate : true,
		  	loading: {
		      	finishedMsg: 'No more pages to load.',
		      	img: 'http://i.imgur.com/6RMhx.gif'
		    }
		  },
		  // trigger Masonry as a callback
		 
			function( newElements ) {
			    var $newElems = $( newElements);
	
			    $newElems.imagesLoaded( function() {
			    	var msnry = new Masonry( container );
					msnry.appended( $newElems ,true);
					msnry.layout();
			    });
			    console.log($newElems);

				$newElems.closest('.post1').remove();
				
		  	}
		);*/

});
