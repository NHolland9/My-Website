$(document).ready(function() {


  //  SLIDES

  //  REVEAL
  if (window.location.pathname == "/") {
    $(".blanket").hide();
  } else {
    $(function() {
      $(".blanket").hide("blind", {direction: "down", easing: "easeOutQuint"}, 750);
    });
  }


  //  HIDE
  $(".top-nav__link, .dropdown__link").click(function(evt) {

    evt.preventDefault();
    var link = $(this).attr("href");

    setTimeout(function() {
      $(".blanket").show("blind", {direction: "up", easing: "easeOutQuint"}, 750);
    }, 300);

    setTimeout(function() {
      window.location.href = link;
    }, 1050);

  });




  //  TITLE FADES
  setTimeout(function() {

    $(".title").show("fade", 1800);//FADE ON SCROLL?

    setTimeout(function() {
      $(".title--2nd").show("fade", 1300);
    }, 800);
  }, 300);




  //  DROPDOWN
  $(".dropdown__button").click(function() {

    if ($(".dropdown__button").hasClass("dropdown__button--expanded")) {

      setTimeout(function() {
        $(".dropdown__button").removeClass("dropdown__button--expanded");
      }, 150);

      $(".dropdown__link-wrapper").toggle("blind", 150);

    } else {

      $(".dropdown__button").addClass("dropdown__button--expanded");

      $(".dropdown__link-wrapper").toggle("blind", 150);

    };

  });




  //  HEIGHT CALCULATOR
  var footerPos = $(".footer").offset();
  var contentPos = $(".height").offset();
  var diff = footerPos.top - contentPos.top;
  var offset = 90 - diff;

  if (diff <= 90) {
    $(".about, .portfolio, .contact-page").css("margin-bottom", offset);
  };


});
