// Utility Functions
function clamp(number, min, max) {
  return Math.max(min, Math.min(number, max));
}

// jQuery
(($) => {
  function handleScroll() {
    const scrollAmount = $(window).scrollTop();

    // Animate Jumbotron Background
    const fadeAt = $("#jumbotron-header-background").attr("data-fade-at");
    const backgroundOpacity = 1 - clamp(scrollAmount, 0, fadeAt) / fadeAt;
    $("#jumbotron-header-background").css("opacity", backgroundOpacity);

    // Animate Blob Overlay
    if (backgroundOpacity <= 0) {
      $(".blob-overlay").addClass("closed");
    } else {
      $(".blob-overlay").removeClass("closed");
    }

    // Animate Blog Heading with Scroll
    const blogHeadingUpperLimit = 4320;
    const blogHeadingMarginRight = (clamp(scrollAmount, 0, blogHeadingUpperLimit) / blogHeadingUpperLimit) * 1000;
    $("#blog-post-heading").css("margin-right", blogHeadingMarginRight + "px");
  }

  $(document).ready(function () {
    // AnimateOnScroll
    AOS.init();

    handleScroll();

    // Scroller Event
    $(window).scroll(handleScroll);
  });
})(jQuery);
