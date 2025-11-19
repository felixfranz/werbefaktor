/*
 * Get Viewport Dimensions
 * returns object with viewport dimensions to match css in width and height properties
 * ( source: http://andylangton.co.uk/blog/development/get-viewport-size-width-and-height-javascript )
*/
function updateViewportDimensions() {
  var w = window, d = document, e = d.documentElement, g = d.getElementsByTagName('body')[0], x = w.innerWidth || e.clientWidth || g.clientWidth, y = w.innerHeight || e.clientHeight || g.clientHeight;
  return { width: x, height: y };
}
// setting the viewport width
var viewport = updateViewportDimensions();


/*
 * Throttle Resize-triggered Events
 * Wrap your actions in this function to throttle the frequency of firing them off, for better performance, esp. on mobile.
 * ( source: http://stackoverflow.com/questions/2854407/javascript-jquery-window-resize-how-to-fire-after-the-resize-is-completed )
*/
var waitForFinalEvent = (function () {
  var timers = {};
  return function (callback, ms, uniqueId) {
    if (!uniqueId) { uniqueId = "Don't call this twice without a uniqueId"; }
    if (timers[uniqueId]) { clearTimeout(timers[uniqueId]); }
    timers[uniqueId] = setTimeout(callback, ms);
  };
})();

// how long to wait before deciding the resize has stopped, in ms. Around 50-100 should work ok.
var timeToWaitForLast = 100;



jq2 = jQuery.noConflict();
jq2(function ($) {


  // NAVI AUF UND ZU

  // Get the nav toggle element
  var navToggle = document.querySelector('.nav-toggle');

  function toggle_menu() {
    document.body.classList.toggle('body__menu_open');
    document.documentElement.classList.toggle('menu_open'); // 'html' element
  }

  // Add click event listener
  if (navToggle) {
    navToggle.addEventListener('click', function (event) {
      event.preventDefault(); // Equivalent to returning false in jQuery
      toggle_menu();
    });
  }


  ///////////////////////
  // switch header style
  ///////////////////////
  var scrolled_class = "body__scrolled";

  $(function () {
    var pageHeader = 150;

    $(window).scroll(function () {

      var scroll = getCurrentScroll();
      if (scroll >= pageHeader) {
        $('body').addClass(scrolled_class);
      }
      else {
        $('body').removeClass(scrolled_class);
      }

    });

    // function to geht scrol position
    function getCurrentScroll() {
      return window.pageYOffset || document.documentElement.scrollTop;
    }
  });



  ////////////////////////////////////
  // SETTING UP NAV FOR ACCESIBILITY
  ////////////////////////////////////

  // add aria-expanded to all submenues
  var sub_menu = $(".sub-menu");
  var toplevel_a = $(".menu>li>a");

  sub_menu.attr("aria-expanded", "false");

  // on focus on top-level a
  toplevel_a.on("focus", function () {

    // get sub-menu
    var menu = $(this).closest(".menu-item").find(sub_menu);

    // set state
    var isOpen = false;

    // reset all sub-menus
    sub_menu.css("display", "none");
    sub_menu.attr("aria-expanded", "false");
    sub_menu.removeClass("open");
    $("li").remove(".tab_nav_point");
    
    me = $(this);

    // on keydown while still top-level
    $(this).on("keydown", function (event) {
     
      var keycode = (event.keyCode ? event.keyCode : event.which);
       
      if (keycode == '13') {
        event.preventDefault();
        
          if (isOpen) {
            
            menu.removeClass("open");
            menu.css("display", "none");
            menu.attr("aria-expanded", "false");
            sub_menu.remove(".tab_nav_point");
            sub_menu.removeClass("open");
            isOpen = false;
          } else {
            $("li").remove(".tab_nav_point");
            me.clone().prependTo(menu);
            menu.find("> a").wrap('<li class="tab_nav_point"></li>');
            menu.addClass("open");
            menu.css("display", "block");
            menu.attr("aria-expanded", "true");
            isOpen = true;
          }
     
      } // end keydown 13 // enter

      if (keycode == '27') {
        event.preventDefault();

          menu.removeClass("open");
          menu.css("display", "none");
          menu.attr("aria-expanded", "false");
          sub_menu.remove(".tab_nav_point");
          sub_menu.removeClass("open");
          isOpen = false;

      } // end keydown 13 // enter

    }); // keydown event

  }); // end focus


  // on focus on sub-level a // to close the sub menu
  $(".sub-menu li a").on("focus", function () {

    // get sub-menu
    var menu = $(this).closest(sub_menu);
    var parent_item = $(this).closest(".menu-item-has-children").find(">a");
  
    // on keydown while still sub-level
    $(this).on("keydown", function (event) {
     
    var keycode = (event.keyCode ? event.keyCode : event.which);

    if (keycode == '27') {
     
        console.log("down");
        event.preventDefault();

          menu.removeClass("open");
          menu.css("display", "none");
          menu.attr("aria-expanded", "false");
          sub_menu.remove(".tab_nav_point");
          sub_menu.removeClass("open");
          isOpen = false;
        parent_item.focus();
      } // end keydown 27 // escape

    }); // keydown event

  }); // end focus

  ////////////////////////////////////
  // END ACCESIBILITY
  ////////////////////////////////////


}); 
