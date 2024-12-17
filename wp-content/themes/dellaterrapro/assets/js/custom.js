jQuery(document).ready(function ($) {
  // $('.menu-item-has-children > a').on('click touchstart', function(e) {
  //     var $this = $(this);
  //     if ($this.hasClass('open')) {
  //         return true; // If already open, allow link click
  //     } else {
  //         e.preventDefault(); // Prevent link click on first touch/click
  //         $this.addClass('open'); // Add class to indicate it's open
  //         $this.next('.sub-menu').slideToggle(); // Toggle submenu
  //     }
  // });
  // jQuery(document).ready(function($) {
  $(".menu-arrow").on("click touchstart", function (e) {
    e.preventDefault();
    var $this = $(this).parent();
    $this.next(".sub-menu").toggleClass("show");
  });
  $(".sub-menu .menu-link").on("click touchstart", function (e) {
    e.preventDefault();
    window.location.href = $(this).attr("href");
  });
  // });
});

$(document).ready(function () {
  // $('.menu-item-has-children').click(function() {
  //    $(this).find('.sub-menu').toggle(); // Toggle the sub-menu
  //    $(this).toggleClass('active'); // Add or remove 'active' class
  // });

  // Header sticky
  $(window).scroll(function () {
    if ($(this).scrollTop() >= 1) {
      $(".header-section").addClass("sticky");
    } else {
      $(".header-section").removeClass("sticky");
    }
  });

  // customer Reviews slider
  var swiper = new Swiper(".reviewsSwiper", {
    loop: true,
    centeredSlides: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    },
    slidesPerView: 1.5,
    spaceBetween: 10,
    breakpoints: {
      767: {
        slidesPerView: 1.5,
        spaceBetween: 20,
      },
      992: {
        slidesPerView: 2.5,
        spaceBetween: 30,
      },
    },
  });

  jQuery(document).on(
    "click",
    "#category-filters li span.pro-btn",
    function () {
      window.location.href = jQuery(this).data("category");
    }
  );

  // jQuery(document).ready(function($) {
  // 	$(document).on('click', '#category-filters li span.pro-btn', function() {
  // 	var categoryUrl = $(this).data('category');
  // 	if (categoryUrl) {
  // 	window.location.href = categoryUrl;
  // 	} else {
  // 	console.error('Category URL is not defined.');
  // 	}
  // 	});
  // 	});

  //Post Load More
  var page = 2;

  var $loadmoreButton = $("#load-more");

  $("#load-more").on("click", function (e) {
    e.preventDefault();

    var category = jQuery(this).attr("category");

    $.ajax({
      url: ajaxfilter.ajaxurl,
      type: "POST",
      data: {
        action: "filter_posts",
        paged: page,
        category: category,
      },
      success: function (response) {
        $(".col-lg-6 recent-post").append(response.content);
        if (response.has_more_posts) {
          page++;
        } else {
          $loadmoreButton.remove();
        }
      },
    });
  });

  //Review Lode More
  var rpage = 2;
  var $rloadmoreButton = $("#review_lodemore");
  $("#review_lodemore").on("click", function (e) {
    e.preventDefault();

    $.ajax({
      url: ajaxfilter.ajaxurl,
      type: "POST",
      data: {
        action: "filter_review",
        rpaged: rpage,
      },
      success: function (response) {
        $(".reviews-list-boxs").append(response.content);
        if (response.has_more_posts) {
          rpage++;
        } else {
          $rloadmoreButton.remove();
        }
      },
    });
  });

  // $('form.wpcf7-form').on('submit', function(event) {
  //     console.log('Form is being submitted');
  //     var submitButton = $(this).find('button[type="submit"]');
  //     var loader = $('.page-loader');

  //     // Show loader overlay
  //     loader.show();
  //     submitButton.prop('disabled', true);
  // });

  // // After the form is successfully submitted (using the wpcf7submit event)
  // $(document).on('wpcf7submit', function(event) {
  //     console.log('Form has been successfully submitted');
  //     var submitButton = $(event.target).find('button[type="submit"]');
  //     var loader = $('.page-loader');

  //     // Hide the loader overlay and re-enable the button
  //     loader.hide();
  //     submitButton.prop('disabled', false);
  // });
  // jQuery('.wpcf7-form').submit(function() {
  // 	jQuery(this).find('.della-btn').prop('disabled', true);
  // 	var wpcf7Elm = document.querySelector('.wpcf7');
  // 	wpcf7Elm.addEventListener('wpcf7submit', function(event) {
  // 		jQuery('.della-btn').prop("disabled", false);
  // 	}, false);
  // 	wpcf7Elm.addEventListener('wpcf7invalid', function() {
  // 		jQuery('.della-btn').prop("disabled", false);
  // 	}, false);
  // });
  // var wpcf7Elm = document.querySelector('.wpcf7');

  // wpcf7Elm.addEventListener('wpcf7submit', function(event) {
  // 	jQuery('.page-loader').hide();
  // 	$form.find('.della-btn').prop('disabled', false);
  // }, false);

  // wpcf7Elm.addEventListener('wpcf7invalid', function() {

  // 	jQuery('.page-loader').hide();
  // 	$form.find('.della-btn').prop('disabled', false);
  // }, false);
  $(".wpcf7-form").submit(function (event) {
    var $form = $(this);
    console.log("Form is being submitted...");

    // Show loader
    $(".page-loader-gallery").show();

    // Disable the submit button
    $form.find(".della-btn").prop("disabled", true);
  });

  // When form is successfully submitted (via AJAX)
  var wpcf7Elm = document.querySelector(".wpcf7");
  wpcf7Elm.addEventListener(
    "wpcf7submit",
    function (event) {
      console.log("Form submitted successfully");

      // Hide the loader after form submission
      $(".page-loader-gallery").hide();

      // Re-enable the submit button
      $(event.target).find(".della-btn").prop("disabled", false);
    },
    false
  );

  // When form submission fails (validation or other errors)
  wpcf7Elm.addEventListener(
    "wpcf7invalid",
    function () {
      console.log("Form submission failed");

      // Hide the loader
      $(".page-loader-gallery").hide();

      // Re-enable the submit button
      $(".della-btn").prop("disabled", false);
    },
    false
  );
  // //Loder Airbnb Reviews
  // function removeLoader(target) {
  // 	$(target).fadeOut(500, function() {

  // 		$(this).remove();
  // 	});
  // }
  jQuery(".wpcf7-form").submit(function (event) {
    event.preventDefault();
    var $form = jQuery(this);

    // Show loader
    jQuery(".page-loader").show();
    $form.find(".della-btn").prop("disabled", true);

    jQuery.ajax({
      type: "POST",
      url: $form.attr("action"),
      data: $form.serialize(),
      timeout: 3000, // Set timeout to 3000 ms (3 seconds)
      success: function (response) {
        // Hide loader
        jQuery(".page-loader").hide();
        // Redirect after success
        // window.location.href = '/thank-you'; // Change this to your thank you page URL
      },
      error: function (jqXHR, textStatus) {
        // Hide loader and enable button if there's an error
        jQuery(".page-loader").hide();
        $form.find(".della-btn").prop("disabled", false);

        // if (textStatus === 'timeout') {
        //     alert('The request timed out. Please try again.');
        // } else {
        //     alert('There was an error submitting the form. Please try again.');
        // }
      },
    });
  });

  // $(window).on('load', function(){

  // 	setTimeout(function() {
  // 		removeLoader('.page-loader');
  // 	}, 2000);
  // });

  //Project Gallery Filter

  jQuery("#pcategory-filters a").click(function (e) {
    e.preventDefault();
    var $this = jQuery(this);

    pgpaged = 2;

    $("#pcategory-filters a").removeClass("active");
    $(this).addClass("active");

    var term_id = $this.data("category") || "";

    jQuery("#gallery_lodemore").data("category", term_id).show();

    jQuery.ajax({
      url: ajaxfilter.ajaxurl,
      data: {
        action: "filter_projectcat",
        category: term_id,
      },
      method: "POST",
      success: function (response) {
        if (response.success) {
          $(".project-list-box").html(response.data.content);
          $("#gallery_lodemore").toggle(response.data.has_more_posts);
        } else {
          console.log("No posts found.");
        }

        $("[data-fancybox]").fancybox({
          buttons: [
            "slideShow",
            "thumbs",
            "zoom",
            "fullScreen",
            "share",
            "close",
          ],
          loop: false,
          protect: true,
        });
      },
    });
  });

  //Project Gallery Lode More
  var pgpaged = 2;
  var pcategory = $(this).attr("category");
  var $ploadmoreButton = $("#gallery_lodemore");
  $("#gallery_lodemore").on("click", function (e) {
    e.preventDefault();

    var pcategory = jQuery(this).data("category");

    $.ajax({
      url: ajaxfilter.ajaxurl,
      type: "POST",
      data: {
        action: "filter_projectgallery",
        pgpage: pgpaged,
        pcategory: pcategory,
      },
      success: function (response) {
        if (response && response.content) {
          if (pgpaged === 1) {
            $(".project-list-box").html(response.content);
          } else {
            $(".project-list-box").append(response.content);
          }
          pgpaged++;
          $("#gallery_lodemore").toggle(response.has_more_posts);
        } else {
          console.log("No posts found.");
        }

        $("[data-fancybox]").fancybox({
          buttons: [
            "slideShow",
            "thumbs",
            "zoom",
            "fullScreen",
            "share",
            "close",
          ],
          loop: false,
          protect: true,
        });
      },
    });
  });

  $("[data-fancybox]").fancybox({
    buttons: ["slideShow", "thumbs", "zoom", "fullScreen", "share", "close"],
    loop: false,
    protect: true,
  });
  // function loadPosts(pcategory) {
  // 	$.ajax({
  // 		url: ajaxfilter.ajaxurl,
  // 		type: 'POST',
  // 		data: {
  // 			action: 'filter_projectgallery',
  // 			pgpage: pgpaged,
  // 			pcategory: pcategory
  // 		},
  // 		success: function(response) {
  // 			if (response && response.content) {

  // 				if (pgpaged === 1) {
  // 					$('.project-list-box').html(response.content);
  // 				} else {
  // 					$('.project-list-box').append(response.content);
  // 				}
  // 				pgpaged++;
  // 				$('#gallery_lodemore').toggle(response.has_more_posts);
  // 			}
  // 		}
  // 	});
  // }
  // $('.pro-gallery').on('click', function(e) {
  // 	e.preventDefault();
  // 	var pcategory = $(this).data('category');
  // 	pgpaged = 1;
  // 	loadPosts(pcategory);
  // });
});

document.addEventListener(
  "wpcf7mailsent",
  function (event) {
    location.replace("http://203.109.113.155/DellaTera/thank-you/");
  },
  false
);

jQuery(document).ready(function ($) {
  // Select the image by its class (Airbnb logo)
  $(".wpairbnb_t1_airbnb_logo").each(function () {
    // Check if the image doesn't already have an alt attribute
    if (!$(this).attr("alt") || $(this).attr("alt") === "") {
      // Get the image file name from the src attribute
      var src = $(this).attr("src");
      var fileName = src.substring(
        src.lastIndexOf("/") + 1,
        src.lastIndexOf(".")
      );

      // Add the alt attribute using the file name (with spaces instead of underscores)
      $(this).attr("alt", fileName.replace(/_/g, " "));
    }
  });

  // For the star images
  $(".wpairbnb_star_imgs_T1 img").each(function () {
    // Check if the image doesn't already have an alt attribute
    if (!$(this).attr("alt") || $(this).attr("alt") === "") {
      // Get the image file name from the src attribute
      var src = $(this).attr("src");
      var fileName = src.substring(
        src.lastIndexOf("/") + 1,
        src.lastIndexOf(".")
      );

      // Add the alt attribute using the file name (with spaces instead of underscores)
      $(this).attr("alt", fileName.replace(/_/g, " "));
    }
  });
});



const buttons = document.querySelectorAll(".accordion button");

function toggleAccordion() {
    const isExpanded = this.getAttribute("aria-expanded") === "true";
    
    // Collapse all accordion items
    buttons.forEach(button => {
        button.setAttribute("aria-expanded", "false");
    });
    
    // Expand the clicked item if it was not already expanded
    if (!isExpanded) {
        this.setAttribute("aria-expanded", "true");
    }
}

// Attach click event listeners to all accordion buttons
buttons.forEach(button => button.addEventListener("click", toggleAccordion));

