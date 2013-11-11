$(document).ready(function() {

	/***************************************************************
	 Home
	 **************************************************************/

	// homepage slideshow
	$('.slideshow-nav').mouseenter( function(){ slideIn($(this)); });
	$('.slideshow-nav').mouseleave( function(){ slideOut($(this)); });

	/***************************************************************
	 Menus
	 **************************************************************/

	// initialization
	$('#quickmenu').prepend('<div class="backLava"></div>');
	$('#quickmenu .backLava').css({
			"position": "absolute",
			"left": $('#quickmenu .active').offset().left,
			"top": $('#quickmenu .active').offset().top,
			"width": $('#quickmenu .active').outerWidth(),
			"height": $('#quickmenu .active').outerHeight()
		});
	$('#quickmenu .active').addClass('selectedLava');

	$('#quickmenu li').hover(function(){
		$('#quickmenu li').removeClass('active');
		$(this).addClass('active');

		var backLavaGoto = $(this).offset();
		var backLavaW = $(this).outerWidth();
		var backLavaH = $(this).outerHeight();
		$('#quickmenu .backLava').animate(
			{
			"width": backLavaW,
			"height": backLavaH,
			"top": backLavaGoto.top,
			"left": backLavaGoto.left
			},
			{
				speed: '700',
				easing: "easeOutBack",
				queue: false
			}
		);

		if($(this).find('.qty').text() != "0") { // le panier descend seulement si il est plein
			// trouver quel sous menu il faut ouvrir
			var menuId = $(this).attr('id');
			var submenuId = '#'+menuId+'-submenu';
			if( $(submenuId).length != 0) {
				// arrow
				var activeW = $(this).outerWidth();
				var activePos = $(this).offset();
				if( $('#arrow').length == 0 ) { $('body').append('<div id="arrow"></div>'); }
				$('#arrow').css({
					"left": backLavaGoto.left+backLavaW/2-5, // 5px = largeur de arrow
					"top": backLavaGoto.top+backLavaH+10
				});
			} else {
				$('#arrow').remove();
			}
			// tout refermer sauf le menu actif
			$('.submenu-box.open:not('+submenuId+')').slideUp().removeClass('open');
			$(submenuId).slideDown().addClass('open');

		}
	});

	// submenus stay visible until one clicks outside
	$('.submenu-box').click(function(e){
		e.stopPropagation();
	});

	$(document).click(function(){
		var backLavaGoto = $('#quickmenu .selectedLava').offset();
		var backLavaW = $('#quickmenu .selectedLava').outerWidth();
		var backLavaH = $('#quickmenu .selectedLava').outerHeight();

		$('#quickmenu .backLava').animate(
			{
			"width": backLavaW,
			"height": backLavaH,
			"top": backLavaGoto.top,
			"left": backLavaGoto.left
			},
			{
				speed: '700',
				easing: "easeOutBack",
				queue: false
			}
		);
		$('.submenu-box.open').slideUp().removeClass('open');
		$('#quickmenu li').removeClass('active');
		$('#arrow').remove();
	});

	// sidebar menu
	$('#mainmenu').prepend('<div class="backLava"></div>');
	$('#mainmenu .backLava').css({
			"position": "absolute",
			"left": $('#mainmenu .active').offset().left,
			"top": $('#mainmenu .active').offset().top,
			"width": $('#mainmenu .active').outerWidth(),
			"height": $('#mainmenu .active').outerHeight()
		});
	$('#mainmenu .active > a').addClass('selectedLava');

	$('#mainmenu li').hover(function(){
		$('#mainmenu li').removeClass('active');
		$(this).addClass('active');
		if($(this).hasClass('open')) {
			var backLavaH = $('.open > a').outerHeight();
			console.log($('.open > a').outerHeight());
		} else {
			var backLavaH = $(this).outerHeight();
		}
		var backLavaGoto = $(this).offset();
		var backLavaW = $(this).outerWidth();
		$('#mainmenu .backLava').animate(
			{
			"width": backLavaW,
			"height": backLavaH,
			"top": backLavaGoto.top,
			"left": backLavaGoto.left
			},
			{
				speed: '700',
				easing: "easeOutBack",
				queue: false
			}
		);
	});

	// carousel sousmenus de la sidebar s'ouvrent en cliquant
	$('#mainmenu li').click(function(){
		$(this).find('ul').slideToggle();
		if ($(this).find('ul').length != 0) {
			$(this).toggleClass('open');
		}
	});

	// on page load open the first menu
	// FIXME check ou est le "active" et ouvrir le menu en question si necessaire
	$('#mainmenu ul > li:first-child ul').slideToggle();
	$('#mainmenu ul > li:first-child').addClass('open');

	// topmenu submenu content vertically aligned
	var boxheight = $('.submenu-box .inner').height();
	var menuheight = $('.submenu-box .inner .menu').height();
	var formheight = $('.submenu-box .inner #loginform').height();
	var mainmenuheight = $('#quickmenu').height();
	var middle = boxheight/2-mainmenuheight-menuheight;
	$('.submenu-box .inner .menu').css('margin-top', middle+'px');

	/***************************************************************
	 Social interactions
	 **************************************************************/

	$('.interaction-button').css('top', '-35px');
	$('#social-menu #fb-show').mouseenter(function(){
		$('.interaction-button').animate({ top: 0 });
		$('.interaction-text').animate({ top: 40 });
	});
	$('#social-menu #fb-show').mouseleave(function(){
		$('.interaction-button').animate({ top: -35 });
		$('.interaction-text').animate({ top: 0 });
	});

	/***************************************************************
	 Panier
	 **************************************************************/

	checkPanierQty();

	// supprimer un produit dans le panier
	$('.product .delete-product').click(function(){
		$(this).parent().fadeOut().remove();
		checkPanier();
		// FIXME : callback pour supprimer le produit reellement
		// FIXME : faire en sorte que le block panier ne se referme pas de suite
	})
	$('.product .less').click(function(){
		incrementInput('substract', '1', $(this).parent().find('input'));
		// FIXME add callback
	})
	$('.product .more').click(function(){
		incrementInput('add', '1', $(this).parent().find('input'));
		// FIXME add callback
	})

	/***************************************************************
	 Divers
	 **************************************************************/

	// empty loginform inputs on click
	$('#loginform .form').click(function(){
		$(this).val('');
	});

	// add a class "clicked" to all submit buttons for styling
	$('.submit').mousedown(function() {
		$(this).addClass('clicked');
	});
	$('.submit').mouseup(function() {
		$(this).removeClass('clicked');
	});
	$('.selectbox-wrapper li').mousedown(function() {
		$(this).addClass('clicked');
	});
	$('.selectbox-wrapper li').mouseup(function() {
		$(this).removeClass('clicked');
	});

	// creer des custom selectboxes pour les styles
	$('#lang').selectbox();
	$('#country').selectbox();

	// message pour IE6 et vieux Safari
	var version = parseInt($.browser.version, 10);
	if ($.browser.msie) {
		if(version < 7) {
			$('#browser-upgrade').show();
		}
	}
	if ($.browser.safari) {
		if(version < 3) {
			$('#browser-upgrade').show();
		}
	}
})

/***************************************************************
 Resize de fenetre : replacer tout bien
 **************************************************************/

$(window).on('load', function(){
	$('#quickmenu .active').trigger('mouseenter');
	placeSlideNav();
	placeSubmenus();
	adjustSidebarH();

});

$(window).on('resize', function(){
	$('#quickmenu .active').trigger('mouseenter');
	placeSlideNav();
	placeSubmenus();
	adjustSidebarH();
});

/***************************************************************
 Function definitions
 **************************************************************/

// function for incrementing inputs panier
function incrementInput(operation, incrementValue, element) {
	var oldVal = element.val();
	if(oldVal >= 0) {
		if(operation == "add") {
			var newVal = parseInt(oldVal)+parseInt(incrementValue);
		} else {
			var newVal = parseInt(oldVal)-parseInt(incrementValue);
		}
		return element.val(newVal);
	}
}

// sidebar doit toujours faire 100% de hauteur de la fenetre
function adjustSidebarH() {
	var viewportH = $(window).height();
	var sidebarH = $('#sidebar').height();
	if(sidebarH <= viewportH) {
		$('#sidebar').css('height', viewportH);
		$('#legal').css('margin-top', viewportH-sidebarH-30);
	} else {
		$('#legal').css('margin-top', 0);
	}
}

// alligner de maniere verticale les prev/next du slideshow de la homepage
function placeSlideNav(){
	var prevNextH = $('.slideshow-nav').height();
	var arrowH = $('.slideshow-nav span').height();
	$('.slideshow-nav span').css('top', (prevNextH/2)-(arrowH/2)+'px');
	$('.slideshow-nav b').css('top', (prevNextH/2)-(arrowH/2)+'px');
}

// FIXME faire ca seulement pour les écrans superieurs a 640px
function placeSubmenus() {
	// positionner la boite de sousmenu par rapport au deuxieme lien du menu principal
	var placement_menu_elm = $('#link-service').offset();
	var menuleft = placement_menu_elm.left;
	$('.submenu-box').css('left', menuleft+'px');
}
// navigation slideshow homepage
function slideIn(elm){
	elm.find('span').animate({
		width: '100%'
	});
}
function slideOut(elm){
	elm.find('span').animate({
		width: '0'
	});
}

// si il y a plus d'un produit dans la box la couleur du chiffre change, on ajoute une classe.
function checkPanierQty() {
	var elm = $('#link-panier .qty');
	if(elm.text() == "0") {
		elm.addClass('packed');
	} else {
		elm.removeClass('packed');
	}

	// pagination du panier
	$('#product-list').css('overflow', 'hidden');
	var pager = 0;
	var itemsPerPage = 3; // how many items do we need to show
	var products = $('#product-list .product');
	var total = products.length; // how many items are there
	var productH = $('.product').outerHeight(); // height of one item
	var listH = productH*total; // height of the product list
	var scrollH = productH*itemsPerPage; // height of one page
	var lastPage = Math.floor(total/itemsPerPage);
	if(total > itemsPerPage) {
		$('<a class="nextp"></a>').insertAfter('#product-list');
		$('<a class="prevp" style="display: none;"></a>').insertBefore('#product-list');
		$('.nextp').click(function(){
			pager = pager+1;
			$('#product-list').animate({scrollTop:'+='+scrollH+'px'}, 500);
			if(pager == lastPage) {
				$(this).hide();
			}
			if (pager > 0) {
				$('.prevp').show();
			}
		});
		$('.prevp').click(function(){
			pager = pager-1;
			$('#product-list').animate({scrollTop:'-='+scrollH+'px'}, 500);
			if(pager == 0) {
				$(this).hide();
				$('.nextp').show();
			}
		});
	}
	// quand on supprime un produit il faudrait recalculer la hauteur de listH et aussi le nombre total d'éléments

}
