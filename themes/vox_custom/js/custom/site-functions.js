jQuery(document).ready(function () {

    /*------------------------------------------------*/
    // Developed by Vox Teneo
    /*------------------------------------------------*/

    jQuery('#nav-fullwidth').click(function (event) {
        event.stopPropagation();
    });

    jQuery('.navbar-toggle, #overlay').click(function (event) {
        jQuery('.navbar-toggle').toggleClass('navbar-on');
        jQuery('#overlay').fadeToggle("fast", "linear");
        jQuery('#overlay').removeClass('nav-hide');
    });

});