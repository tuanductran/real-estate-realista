jQuery(document).ready(function($){
	jQuery('.mobile-menu').prepend("<a href='#' title='' class='close-nav-toggle' aria-expanded='true'><i class='fa fa-close'></i></a>");
});

jQuery(window).on('load', function( $ ){


	if(jQuery(".container").length){
		var gap = jQuery(".container").offset().left;

		jQuery(".pop-slider .slick-prev").css({
			"left": gap
		});
		jQuery(".pop-slider .slick-next").css({
			"right": gap
		});
	}
 
    /*==============================================
                      Custom Dropdown
    ===============================================*/

    jQuery('.drop-menu').on('click', function () {
        jQuery(this).attr('tabindex', 1).focus();
        jQuery(this).toggleClass('active');
        jQuery(this).find('.dropeddown').slideToggle(300);
    });
    jQuery('.drop-menu').on("focusout", function () {
        jQuery(this).removeAttr('tabindex', 1).focus();
        jQuery(this).removeClass('active');
        jQuery(this).find('.dropeddown').slideUp(300);
    });
    jQuery('.drop-menu .dropeddown li').on('click', function () {
        jQuery(this).parents('.drop-menu').find('span').text(jQuery(this).text());
        jQuery(this).parents('.drop-menu').find('span').addClass("selected");
        jQuery(this).parents('.drop-menu').find('input').attr('value', jQuery(this).attr('id'));
    });


    /*==============================================
                      DROPDOWN EFFECT
    ===============================================*/


    jQuery('.dropdown').on('show.bs.dropdown', function(e){
      jQuery(this).find('.dropdown-menu').first().stop(true, true).slideDown(300);
    });

    jQuery('.dropdown').on('hide.bs.dropdown', function(e){
      jQuery(this).find('.dropdown-menu').first().stop(true, true).slideUp(200);
    });


    /*==============================================
                SIGN / REGISTER POPUP
    ===============================================*/

    /*
    jQuery(".sign_in").on("click", function() {
        jQuery(".popup-from").addClass("show");
        jQuery(".wrapper").addClass("body-overlay");
        return false;
    });
    */
    jQuery(".close-form").on("click", function() {
        jQuery(".popup-from").removeClass("show");
        jQuery(".wrapper").removeClass("body-overlay");
        return false;
    });

    jQuery(".menu-btn,.close-nav-toggle,.mob_nav_mask").on("click", function(e) {
        e.preventDefault();
        jQuery(".mobile-menu").toggleClass("active");
        jQuery("body").toggleClass("mobmenu_show");

        setTimeout (function(){
        jQuery(".close-nav-toggle").eq(0).attr('tabindex', -1).trigger('focus');
        },500);
         
        return false;
    });
    
    jQuery('.menu-menu-1-container .menu a').on('mouseover focus', function(e){
        e.preventDefault();
        //e.stopPropagation();
        jQuery(this).parent().siblings().removeClass('is-focused').find('.menu-item').removeClass('is-focused');
        jQuery(this).parent().toggleClass('is-focused');
        
        var nex_el = jQuery(this).closest('.menu-menu-1-container');
            jQuery(document).unbind('mouseout').on('mouseout', function(e){
            if(!jQuery(e.target).closest('.menu-menu-1-container').length) {
                nex_el.find('li').removeClass('is-focused');
                jQuery(document).unbind('mouseout')
            }
        })
    })
    
    /* mobile menu events */

	jQuery(".mobile-menu > a/*, html*/").on("click", function() {
		jQuery(".mobile-menu").removeClass("active");
		return false;
	});
	
	jQuery(".mobile-menu").on("click focus", function(e) {
		e.stopPropagation();
	});

    jQuery(".mobile-menu ul.sub-menu").parent().addClass("has-sub-menu");

    var real_estate_realista_menu_is_focus = false;
/*
    jQuery(".mobile-menu li.has-sub-menu > a").on("click", function(e) {
        if(!real_estate_realista_menu_is_focus){
            jQuery(this).next("ul").slideToggle();
        }
        return false;
    });

    jQuery(".mobile-menu li.has-sub-menu > a").on("focus", function(e) {
        jQuery(this).next("ul").slideToggle();
        real_estate_realista_menu_is_focus = true;
        setTimeout(()=>{ real_estate_realista_menu_is_focus = false;}, 500);
        return false;
    });

    jQuery(".mobile-menu li.has-sub-menu > a").on("click focus", function() {
        jQuery(this).parent().siblings().removeClass('active').find('ul').slideUp();
        return false;
    });*/


    
    jQuery('.mobile-menu li.has-sub-menu > a').on('keydown', function(e){
        var keyCode = e.keyCode || e.which; 

        if (!e.shiftKey && keyCode == 9) {
            if(jQuery(this).parent().hasClass('active')  &&  (jQuery(this).attr('href') != '' &&  jQuery(this).attr('href') != '#')){
                /* open link */

            } else {
                e.preventDefault();
                jQuery(this).parent().siblings().removeClass('active').find('ul').slideUp();
                jQuery(this).next("ul").slideToggle();

                jQuery(this).next("ul").find(" > li").first().find('a').eq(0).attr('tabindex', -1).trigger('focus');
            }
        }
    })

    jQuery('.mobile-menu li.has-sub-menu > a').on('click', function(e){
        if(jQuery(this).parent().hasClass('active')  &&  (jQuery(this).attr('href') != '' &&  jQuery(this).attr('href') != '#')){
            /* open link */

        } else {
            e.preventDefault();
            jQuery(this).parent().siblings().removeClass('active').find('ul').slideUp();
            jQuery(this).next("ul").slideToggle();
        }
    })

    /* end mobile menu events */
	
    jQuery(".reply").on('click', function() {
        jQuery('html, body').animate({
            scrollTop: jQuery("#reply-sec").offset().top
        }, 2000);
    });

    jQuery(".more-btn").on("click", function() {
        jQuery(".banner2 .filter-section, .filter-section").slideToggle();
        return false;
    });
	
    jQuery('.menu-all-pages-container > ul > li a').on( "focus", function() {
        var jQuery = jQuery;
        var focused_class = 'is-focused';
        if(jQuery(this).closest('.menu-item-has-children')){
            var that,parent;
            that = jQuery(this);
            parent = that.parent();
            parent.addClass(focused_class);
            parent.siblings().each(function(){
                jQuery(this).removeClass(focused_class)
                jQuery(this).find('li').removeClass(focused_class)
            })
        } else {
            jQuery('.menu-all-pages-container li').removeClass(focused_class)
        }

    });
      
    jQuery('form.sw_search_secondary select').each(function (i) {
        if(!jQuery(this).parent().find('.ss-main').length)
            new SlimSelect({
                select: 'form.sw_search_secondary select[name="'+jQuery(this).attr('name')+'"]'
            });
    })
    
    jQuery('form.sw_search_primary select').each(function (i) {
        if(!jQuery(this).parent().find('.ss-main').length)
            new SlimSelect({
                select: 'form.sw_search_primary select[name="'+jQuery(this).attr('name')+'"]'
            });
    })  

    jQuery('.search-form').on('submit', function () {
        jQuery(this).find('.search-submit').addClass('loading-show'); 
    });

    /* mobile menu keys nav */ 

    /* first menu item, when nav pre element, trigger to close btn */
    jQuery(".mobile-menu .menu > li").first().find('a').on('keydown', function(e) { 
        var keyCode = e.keyCode || e.which; 
        if(e.shiftKey && keyCode == 9) { 
            //shift was down when tab was pressed
            e.preventDefault(); 
            jQuery(".close-nav-toggle").eq(0).attr('tabindex', -1).trigger('focus');
        }
    });

    /* first menu item, when nav next element, trigger to close btn */
    jQuery(".mobile-menu li a").last().on('keydown', function(e) { 
        var keyCode = e.keyCode || e.which; 
        if (!e.shiftKey && keyCode == 9) { 
            e.preventDefault(); 
            jQuery(".close-nav-toggle").eq(0).attr('tabindex', -1).trigger('focus');
        } 
    });
    
    /* keyboard nav from close btn, trigger to first/last menu element */
    jQuery(".close-nav-toggle").on('keydown', function(e) { 
        var keyCode = e.keyCode || e.which; 
        if (!e.shiftKey && keyCode == 9) { 
            e.preventDefault(); 
            jQuery(".mobile-menu .menu > li").first().find('a').eq(0).trigger('focus');
        } else if(e.shiftKey && keyCode == 9) {
            e.preventDefault(); 
            jQuery(".mobile-menu .menu > li").last().find('a').eq(0).trigger('focus');
        }
    });
    
});