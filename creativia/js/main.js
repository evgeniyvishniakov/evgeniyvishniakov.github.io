$(document).ready(function() {
				var menuBtn = $('.top-nav_btn');
				var menu = $('.top-nav_menu');
			
				menuBtn.on('click', function(event) {
					event.preventDefault();
					menu.toggleClass('top-nav__active');
				});
			});


$('.home_slid').slick({
				arrows: true,
				dots: true
			});


$(document).ready(function() {
  $(".top_nav").on("click", "a", function(event) {
    event.preventDefault();
    var id = $(this).attr("href"),
        top = $(id).offset().top;
    $("body,html").animate({scrollTop: top}, 1000);
  });
});


		//    АКОРДИОН

$(document).ready(function() {
 $('.accordeon_trigger').on('click', function(e){
 	e.preventDefault();

 	var $this = $(this),
 		item = $this.closest('.accordeon_item'),
 		list = $this.closest('.accordeon_list'),
 		items = list.find('.accordeon_item'),
 		content = item.find('.accordeon_inner'),
 		otherContent = list.find('.accordeon_inner'),
 		duration = 300;

 	if(!item.hasClass('active')){
 		item.removeClass('active');
 		item.addClass('active');

 		otherContent.slideUp(duration);
 		content.slideDown(duration);
 	}	else{
 		content.slideUp(duration);
 		item.removeClass('active');
 	}
	});
 });

		// ФИЛЬТР

$(document).ready(function(){
  $(".all").click(function(){
    $(".art").show("slow");
    $(".web").show("slow");
    $(".ill").show("slow");
  });
});
$(document).ready(function(){
  $(".ill").click(function(){
    $(".art").hide("slow");
    $(".web").hide("slow");
    $(".ill").show("slow");
  });
});
$(document).ready(function(){
  $(".art").click(function(){
    $(".ill").hide("slow");
    $(".web").hide("slow");
    $(".art").show("slow");
  });
});
$(document).ready(function(){
  $(".web").click(function(){
    $(".ill").hide("slow");
    $(".art").hide("slow");
    $(".web").show("slow");
  });
});

$('.client_slid').slick({
				arrows: false,
				dots: true
			});