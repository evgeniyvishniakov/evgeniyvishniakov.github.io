$(document).ready(function() {
  $(".top-nav").on("click", "a", function(event) {
    event.preventDefault();
    var id = $(this).attr("href"),
        top = $(id).offset().top;
    $("body,html").animate({scrollTop: top}, 1000);
  });
});

$(document).ready(function() {
    $("#scroll").on("click", "a", function(event) {
      event.preventDefault();
      var id = $(this).attr("href"),
          top = $(id).offset().top;
      $("body,html").animate({scrollTop: top}, 1500);
    });
  });

$(document).ready(function(){
  $('.slider').bxSlider({
    mode: 'fade',
    autoDirection: 'next',
    auto: true,
    pause: 2000
  });
});

$(document).ready(function(){
  $(".webd").click(function(){
    $(".photo").hide("slow");
    $(".mobile").hide("slow");
    $(".web").show("slow");
  });
});
$(document).ready(function(){
  $(".mobiled").click(function(){
    $(".photo").hide("slow");
    $(".web").hide("slow");
    $(".mobile").show("slow");
  });
});
$(document).ready(function(){
  $(".photograpy").click(function(){
    $(".mobile").hide("slow");
    $(".web").hide("slow");
    $(".photo").show("slow");
  });
});
$(document).ready(function(){
  $(".all").click(function(){
    $(".mobile").show("slow");
    $(".web").show("slow");
    $(".photo").show("slow");
  });
});
