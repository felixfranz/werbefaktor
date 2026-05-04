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



// jq2 = jQuery.noConflict();
// jq2(function ($) {


  // NAVI AUF UND ZU

  // Get the nav toggle element
  var navToggle = document.querySelector('.nav-toggle');

  function toggle_menu() {
    document.body.classList.toggle('body__menu_open');
    document.documentElement.classList.toggle('menu_open'); // 'html' element

    const text = document.body.classList.contains("body__menu_open") ? "CLOSE" : "MENU";
    document.querySelectorAll(".nav-toggle .type").forEach(el => el.textContent = text);

  }

  // Add click event listener
  if (navToggle) {
    navToggle.addEventListener('click', function (event) {
      event.preventDefault(); // Equivalent to returning false in jQuery
      toggle_menu();

      document.querySelectorAll(".menu__mobile_menu li").forEach((el, i) => {
        setTimeout(() => {
          el.classList.toggle("animate_menu");
        }, i * 40);
    });

    });
  }

  // Prepend toggle button to each .mobile-nav > li
  document.querySelectorAll(".menu__mobile_menu > li.menu-item-has-children").forEach(li => {
    li.insertAdjacentHTML("afterbegin", '<a href="#" class="sub_menu-toggle"></a>');
  });

  // Add click event to each toggle button
  document.querySelectorAll(".sub_menu-toggle").forEach(toggle => {
    toggle.addEventListener("click", function (event) {
      event.preventDefault();

      const li = this.closest("li");
      const target = li.querySelector("ul");

      // If submenu is already open
      if (target.classList.contains("menu-active")) {
        target.classList.remove("menu-active");
        this.classList.remove("toggle-active");
      }
      else {
        // Close all other menus
        document.querySelectorAll(".mobile-nav ul").forEach(ul => {
          ul.classList.remove("menu-active");
        });

        document.querySelectorAll(".mobile-nav .sub_menu-toggle").forEach(btn => {
          btn.classList.remove("toggle-active");
        });

        // Open this menu
        target.classList.add("menu-active");
        this.classList.add("toggle-active");
      }
    });
  });

  ///////////////////////
  // switch header style
  ///////////////////////
  var scrolled_class = "body__scrolled";

document.addEventListener('DOMContentLoaded', function () {
  const pageHeader = 150;
  const body = document.body;

  window.addEventListener('scroll', function () {
    const scroll = getCurrentScroll();

    if (scroll >= pageHeader) {
      body.classList.add(scrolled_class);
    } else {
      body.classList.remove(scrolled_class);
    }
  });

  // function to get scroll position
  function getCurrentScroll() {
    return window.pageYOffset || document.documentElement.scrollTop;
  }
});

  //////////////// CURSOR SNAP
  const cursor = document.querySelector('.cursor');
  const snapLinks = document.querySelectorAll('.snap a, a.snap');

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
      link.classList.add('is-snapped');
    });

    link.addEventListener('mouseleave', () => {
      activeLink = null;
      isSnapping = false;

      // Reset to small circle
      cursor.style.width = `10px`;
      cursor.style.height = `10px`;
      cursor.style.borderRadius = `50%`;
      //cursor.style.background = `#fff`;
      //cursor.style.opacity = `0`;
      link.classList.remove('is-snapped');
    });
  });

 // animate_snap();

///// END SNAP

/////// X
if (document.body.classList.contains('home')) {



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
}

/////// LIST FOLLOWER

  const highlight = document.querySelector('.highlight');
  const links = document.querySelectorAll('.page-menu a');

  links.forEach(link => {
    link.addEventListener('mouseenter', () => {
      const rect = link.getBoundingClientRect();
      const containerRect = link.closest('.page-menu-container').getBoundingClientRect();
      const offsetTop = rect.top - containerRect.top + 50;

      highlight.style.top = `${offsetTop}px`;
      highlight.style.opacity = 1;
    });

    link.addEventListener('mouseleave', () => {
      highlight.style.opacity = 0;
    });
  });


/////// END LIST FOLLOWER

  ////////////////////////////////////
  // PARALLAX
  ////////////////////////////////////


// SCROLL TO
  document.querySelectorAll('a.arrow[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (event) {
      const target = document.querySelector(this.getAttribute('href'));

      if (target) {
        event.preventDefault();

        window.scrollTo({
          top: target.offsetTop,
          behavior: 'smooth'
        });
      }
    });
  });




// }); 
