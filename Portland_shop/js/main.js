$(document).ready(function(){$(".slider").bxSlider()}),$(document).ready(function(){$(".accordeon_trigger").on("click",function(e){e.preventDefault();var c=$(this),o=c.closest(".accordeon_item"),a=c.closest(".accordeon_list"),i=(a.find(".accordeon_item"),o.find(".accordeon_inner")),n=a.find(".accordeon_inner");o.hasClass("active")?(i.slideUp(300),o.removeClass("active")):(o.removeClass("active"),o.addClass("active"),n.slideUp(300),i.slideDown(300))})}),$(document).ready(function(){var e;e=$(".accordion").attr("data-accordion"),$(".accordion-header").on("click",function(){"close"===e&&(alert(),$(".accordion-body").slideUp(),$(this).hasClass("active")||$(".accordion-header").removeClass("active")),$(this).toggleClass("active"),$(this).next(".accordion-body").not(":animated").slideToggle(800)})});
//# sourceMappingURL=main.js.map