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
  var scrolled_class = "body--scrolled";

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




////////////////////
// PRODUCT FORM
////////////////////
if (document.body.classList.contains('single-product')) {



// get variables
const formatSelect = document.getElementById('format-select');

const priceSelect = document.getElementById( 'price-select');

const totalElement = document.getElementById( 'total' );

const perUnitElement = document.getElementById('per-unit' );


// populate second select
function populatePrices() {

  const formatId = formatSelect.value;

  const dataElement = document.getElementById( formatId );

  // Use optional chaining and fallback to an empty string to prevent an error
  const priceData = dataElement?.dataset?.price || '';

  // split by line break
  const entries =
    priceData
      .trim()
      .split('\n');

  // Filter out empty entries if the data was missing or had trailing newlines
  const validEntries = entries.filter(entry => entry.length > 0);

  priceSelect.innerHTML = '';

  // first option
  const placeholder = document.createElement('option');

  placeholder.value = '';

  placeholder.textContent = 'Bitte auswählen';

  placeholder.selected = true;

  priceSelect.appendChild( placeholder );


  entries.forEach(entry => {

    entry = entry.trim();

    if (!entry) return;

    // amount;price
    const parts = entry.split(';');

    const amount = parts[0];

    const price = parts[1];

    const option =  document.createElement('option');


    option.dataset.amount = amount;

    option.dataset.price =  price;  

    option.value = price;

    option.textContent = `${amount} Stk á ${price}€`;

   
    priceSelect.appendChild(option);
   
  });

  const freeAmount =
    document.createElement(
      'option'
    );

  freeAmount.textContent =
    "Ihre Auflage";

  priceSelect.appendChild(
    freeAmount
  );

  updateSummary();

}

// calculate total
function updateSummary() {

  const option =
    priceSelect.options[
    priceSelect.selectedIndex
    ];

  // Use the nullish coalescing operator (??) to provide a default empty string 
  // if the data attribute is missing
  const amountStr = option.dataset.amount ?? '';
  const priceStr = option.dataset.price ?? '';

  // Only attempt to calculate if the strings are not empty
  if (amountStr && priceStr) {
    const amount = parseFloat(amountStr.replace(',', '.'));
    const price = parseFloat(priceStr.replace(',', '.'));
    const total = amount * price;

    totalElement.textContent = total.toFixed(2);
    perUnitElement.textContent = price.toFixed(2);
  } else {
    // Optional: Reset the display if data is missing
    totalElement.textContent = '--,-- ';
    perUnitElement.textContent = '--,-- ';
  }

}

// Use optional chaining (?.) or an if-block to check if the element exists
formatSelect?.addEventListener(
  'change',
  () => {

    populatePrices();

    toggleCustomField();

    toggleExtraField();

    togglePriceSelect();

    clearCustomFields();

    validateForm();

    updateContactForm();

  }
);

// price select
priceSelect?.addEventListener(
  'change',
  () => {

    updateSummary();

    toggleExtraField();

    togglePriceSelect();

    clearCustomFields();

    validateForm();

    updateContactForm();

  }
);

// update on Input Change
const formatInput = document.getElementById('custom-format-input');
if (formatInput) {
  formatInput.addEventListener('input', 
   () => { 
    updateContactForm();
    validateForm()
  }
);
}

const amountInput = document.getElementById('custom-amount-input');
if (amountInput) {
  amountInput.addEventListener('input', 
   () => { 
    updateContactForm();
    validateForm()
  }
);
}


// show hidden custom Format field
function toggleCustomField() {

  const lastIndex = formatSelect.options.length - 1;

  const isLastOption =  formatSelect.selectedIndex ===  lastIndex;

  document.getElementById( 'custom-format' ).hidden = !isLastOption;

}

// Custom Amount Field
// Custom Amount Field - Added a check to ensure the element exists
const customAmountEl = document.getElementById('custom-amount');
if (customAmountEl) {
  customAmountEl.hidden = true;
}


// toggle the Hidden Fields
function toggleExtraField() {

  const lastFormatIndex = formatSelect.options.length - 1;

  const isLastFormat = formatSelect.selectedIndex === lastFormatIndex;

  const lastPriceIndex = priceSelect.options.length - 1;

  const isLastPrice = priceSelect.selectedIndex ===lastPriceIndex;


  document.getElementById('custom-amount').hidden = !(isLastFormat || isLastPrice);

}

// Auflage ausblenden wennn Custom Format
function togglePriceSelect() {

  const customVisible =  !document.getElementById( 'custom-format' ).hidden;

  document.getElementById( 'price-select-wrapper').hidden = customVisible;

}

const continueButton = document.getElementById( 'continue-button' );


function validateForm() {

  const formatValid = formatSelect.selectedIndex > 0;

  const priceValid = priceSelect.selectedIndex > 0;

  const customFormatFilled = document.getElementById( 'custom-format-input').value.trim() !== '';

  const customAmountFilled =  document.getElementById( 'custom-amount-input' ).value.trim() !== '';
  
  const customFormatVisible = !document.getElementById( 'custom-format').hidden;

  const customAmountVisible = !document.getElementById( 'custom-amount' ).hidden;

  let valid = false;

  // normal selects
  if (!customFormatVisible && !customAmountVisible  ) {

    valid =  formatValid &&  priceValid;

  }

  // custom Format visible
  else if (  customFormatVisible &&  customAmountVisible  ) {

    valid = formatValid && customFormatFilled && customAmountFilled;

  }

  // extra Amount visible
  else {

    valid =  formatValid &&  (priceValid && customAmountFilled);

  }

  continueButton.disabled = !valid;

}


// validate on change
formatSelect?.addEventListener(
  'change',
  validateForm
);

priceSelect?.addEventListener(
  'change',
  validateForm
);


// init
validateForm();


document.getElementById(
  'continue-button'
).addEventListener(
  'click',
  () => {

    // selected pricing option
    const selectedOption =
      priceSelect.options[
      priceSelect.selectedIndex
      ];


    // fill contact form
    document.getElementById(
      'contact-format'
    ).value =
      formatSelect.options[
        formatSelect.selectedIndex
      ].text;


    document.getElementById(
      'contact-pricing'
    ).value =
      selectedOption
        ? selectedOption.textContent
        : '';


    document.getElementById(
      'contact-total'
    ).value =
      totalElement.textContent;

    document.getElementById(
      'contact-number'
    ).value =
      document.querySelector(
        '.product__product-number'
      ).textContent.trim();

    document.getElementById(
      'contact-name'
    ).value =
      document.querySelector(
        '.product__product-title'
      ).textContent.trim();


    // For inputs you need to read from, check existence before accessing .value
    const customInput = document.getElementById('custom-format-input');
    const customValue = customInput ? customInput.value : '';

    if (customValue.trim() !== '') {
      const contactCustom = document.getElementById('contact-custom');
      if (contactCustom) contactCustom.value = customValue;
    }

    const extraInput = document.getElementById('custom-amount-input');
    const extraValue = extraInput ? extraInput.value : '';

    if (extraValue.trim() !== '') {
      const contactExtra = document.getElementById('contact-extra');
      if (contactExtra) contactExtra.value = extraValue;
    }

    // show contact form
    document.getElementById(
      'contact-form'
    ).hidden = false;

  }
);

// Update the contact form on any changes. 
function updateContactForm() {

  const selectedOption =
    priceSelect.options[
    priceSelect.selectedIndex
    ];

  document.getElementById(
    'contact-format'
  ).value =
    formatSelect.options[
      formatSelect.selectedIndex
    ].text;


  document.getElementById(
    'contact-pricing'
  ).value =
    selectedOption &&
      selectedOption.value !== ''
      ? selectedOption.textContent
      : '';


  document.getElementById(
    'contact-total'
  ).value =
    totalElement.textContent;


  // For inputs you need to read from, check existence before accessing .value
  const customInput = document.getElementById('custom-format-input');
  const customValue = customInput ? customInput.value : '';

  if (customValue.trim() !== '') {
    const contactCustom = document.getElementById('contact-custom');
    if (contactCustom) contactCustom.value = customValue;
  }

  const extraInput = document.getElementById('custom-amount-input');
  const extraValue = extraInput ? extraInput.value : '';

  if (extraValue.trim() !== '') {
    const contactExtra = document.getElementById('contact-extra');
    if (contactExtra) contactExtra.value = extraValue;
  }

}


function clearCustomFields() {

  // custom format field hidden
  if ( document.getElementById( 'custom-format' ).hidden) {

    document.getElementById( 'custom-format-input' ).value = '';

   // document.getElementById( 'contact-custom' ).value = '';

  }


  // custom Amount field hidden
  if ( document.getElementById( 'custom-amount' ).hidden) {

    document.getElementById('custom-amount-input' ).value = '';

   // document.getElementById( 'contact-extra' ).value = '';

  }

}
} // end single-product form
// END PRODUCT FORM 
////////////////////////////////////////////

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

document.querySelectorAll("section a.scroll_down").forEach(link => {
  link.addEventListener("click", e => {
    e.preventDefault();

    const currentSection = link.closest("section");
    const nextSection = currentSection.nextElementSibling;

    if (nextSection?.tagName === "SECTION") {
      window.scrollTo({
        top: nextSection.offsetTop,
        behavior: "smooth"
      });
    }
  });
});



document.addEventListener('DOMContentLoaded', () => {

  document.querySelectorAll('.js-swiper').forEach(slider => {

    const autoplay = slider.dataset.autoplay;
    const pagination = slider.dataset.pagination === 'true';
    const navigation = slider.dataset.navigation === 'true';
    const loop = slider.dataset.loop === 'true';

    new Swiper(slider, {

      loop,

      autoplay: autoplay
        ? {
          delay: parseInt(autoplay, 10),
          disableOnInteraction: false
        }
        : false,

      pagination: pagination
        ? {
          el: slider.querySelector('.swiper-pagination'),
          clickable: true
        }
        : false,

      navigation: navigation
        ? {
          nextEl: slider.querySelector('.swiper-button-next'),
          prevEl: slider.querySelector('.swiper-button-prev')
        }
        : false

    });

  });

});

jQuery(document).ready(function ($) {
//////////////////////////////////////////////////////
// IMPULS FILTER --- MIX IT UP
//////////////////////////////////////////////////////
if ($(".projects-list").length) {

  var initialFilter = 'all';

  var hash = window.location.hash.replace(/^#/g, '');

  if (hash) {
    initialFilter = '.' + hash;
  }

  var mixer = mixitup('.projects-list', {
    controls: {
      toggleLogic: 'and'
    },
    pagination: {
      limit: 100 // impose a limit of 8 targets per page
    },
    load: {
      filter: initialFilter
    },
    callbacks: {
      onMixEnd: state => {
        paginationCallback_puls();
      }
    }
  });

  function paginationCallback_puls() {
    // do something only when pagination state has changed
    $("body,html").animate({
      scrollTop: $("#main").offset().top - 140

    }, 400);
  }

} // end impuls list

}); /* end of as page load scripts */