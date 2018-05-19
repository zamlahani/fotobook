jQuery(document).ready(function($) {
   var $menu = $("#fotobook-menu").mmenu({
      // options.
      navbar: {
         title: "Judul"
      },
      "extensions": [
         "pagedim-black"
      ]
   }, {
      // configuration.
      offCanvas: {
         pageSelector: "#fotobook-page"
      },
      classNames: {
         fixedElements: {
            fixed: "mm-fixed",
            sticky: "mm-sticky"
         }
      }
   });
   var $icon = $(".hamburger-toggler");
   var API = $menu.data("mmenu");

   $icon.on("click", function() {
      API.open();
   });

   API.bind("open:finish", function() {
      setTimeout(function() {
         $icon.addClass("is-active");
      }, 100);
   });
   API.bind("close:finish", function() {
      setTimeout(function() {
         $icon.removeClass("is-active");
      }, 100);
   });
});