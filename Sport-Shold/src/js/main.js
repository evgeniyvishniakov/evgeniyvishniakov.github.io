$(document).ready(function() {
        var menuBtn = $('.header-bottom_btn');
        var menu = $('.header-bottom_nav_menu > li');
      
        menuBtn.on('click', function(event) {
          event.preventDefault();
          menu.toggleClass('active');
        });
      });

var comp = $('.components > ul > li');
 
   comp.click(function (){
     $(this).toggleClass('components_active');
     $('.components > ul > li').not($(this)).removeClass('components_active');
 });

$(document).ready(function(){
  $(".components > ul > li.components_new").click(function(){
    $(".new").show("slow");
    $(".popular").hide("slow");
    $(".top_picks").hide("slow");
  });
});
$(document).ready(function(){
  $(".components > ul > li.components_popular").click(function(){
    $(".popular").show("slow");
    $(".new").hide("slow");
    $(".top_picks").hide("slow");
  });
});
$(document).ready(function(){
  $(".components > ul > li.components_top_picks").click(function(){
    $(".top_picks").show("slow");
    $(".popular").hide("slow");
    $(".new").hide("slow");
  });
});   