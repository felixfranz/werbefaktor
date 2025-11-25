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

  //////////////// CURSOR SNAP
  const cursor = document.querySelector('.cursor');
  const snapLinks = document.querySelectorAll('.snap a');

  let targetX = 0;
  let targetY = 0;
  let currentX = 0;
  let currentY = 0;
  const speed = 0.2;

  let activeLink = null;
  let isSnapping = false;

  function animate_snap() {
    currentX += (targetX - currentX) * speed;
    currentY += (targetY - currentY) * speed;
    cursor.style.transform = `translate(${currentX}px, ${currentY}px)`;
    requestAnimationFrame(animate_snap);
  }

  document.addEventListener('mousemove', (e) => {
    if (!isSnapping) {
      targetX = e.clientX;
      targetY = e.clientY;
    }
  });

  snapLinks.forEach(link => {
    link.addEventListener('mouseenter', () => {
      activeLink = link;
      isSnapping = true;

      const rect = link.getBoundingClientRect();

      // 🟡 Position at TOP LEFT instead of center
      targetX = rect.left;
      targetY = rect.top;

      // Match the link shape
      cursor.style.width = `${rect.width}px`;
      cursor.style.height = `${rect.height}px`;
      cursor.style.background = '#ff25db';
      cursor.style.opacity = '1';
      cursor.style.borderRadius = window.getComputedStyle(link).borderRadius || '0px';

      // Inherit background color
      const bgColor = window.getComputedStyle(link).backgroundColor;
      //cursor.style.background = bgColor !== 'rgba(0, 0, 0, 0)' ? bgColor : '#0ff';

      link.classList.add('is-snapped');
    });

    link.addEventListener('mouseleave', () => {
      activeLink = null;
      isSnapping = false;

      // Reset to small circle
      cursor.style.width = `20px`;
      cursor.style.height = `20px`;
      cursor.style.borderRadius = `50%`;
      cursor.style.background = `#fff`;
      cursor.style.opacity = `0`;
      link.classList.remove('is-snapped');
    });
  });

  animate_snap();

///// END SNAP

/////// X

  const layers = document.querySelectorAll('#start-section .layer');
  const container = document.querySelector('#start-section .container');

  layers.forEach(layer => {
    if (layer.classList.contains('layer-1')) {
      layer.setAttribute('data-speed', '20');
    }
    else if (layer.classList.contains('layer-2')) {
      layer.setAttribute('data-speed', '12');
    }

    else if (layer.classList.contains('layer-3')) {
      layer.setAttribute('data-speed', '9');
    }

    else if (layer.classList.contains('layer-4')) {
      layer.setAttribute('data-speed', '6');
    }
    else if (layer.classList.contains('layer-5')) {
      layer.setAttribute('data-speed', '3');
    }

  });

  let targetX_forX = 0, targetY_forX = 0;
  let currentX_forX = 0, currentY_forX = 0;
  let rect = container.getBoundingClientRect();

  window.addEventListener('resize', () => {
    rect = container.getBoundingClientRect();
  });


  container.addEventListener('mousemove', (e) => {
    const x = e.clientX - rect.left;
    const y = e.clientY - rect.top;

    targetX_forX = x - rect.width / 2;
    targetY_forX = y - rect.height / 2;
  });

  container.addEventListener('mouseleave', () => {
    targetX_forX = 0;
    targetY_forX = 0;
  });

  function animate_x() {

    currentX_forX += (targetX_forX - currentX_forX) * 0.1;
    currentY_forX += (targetY_forX - currentY_forX) * 0.1;

    layers.forEach(layer => {
      const speed = layer.getAttribute('data-speed');
      const moveX = currentX_forX * (speed / 60);
      const moveY = currentY_forX * (speed / 60);

      layer.style.transform = `
      translate(${moveX}px, ${moveY}px)
    `;
    });

    requestAnimationFrame(animate_x);
  }

  animate_x();

/////// END X


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
