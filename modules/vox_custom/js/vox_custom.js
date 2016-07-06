/*------------------------------------------------*/
// Developed by Vox Teneo
/*------------------------------------------------*/
jQuery(document).ready(function () {

    // TABS
    jQuery('ul.tabs').each(function () {
        var $active, $content, $links = jQuery(this).find('a');

        $active = jQuery($links.filter('[href=\"' + location.hash + '\"]')[0] || $links[0]);
        $active.addClass('active');

        $content = jQuery($active[0].hash);

        $links.not($active).each(function () {
            jQuery(this.hash).hide();
        });

        jQuery(this).on('click', 'a', function (e) {

            $active.removeClass('is-active');
            $content.hide();
            $active = jQuery(this);
            $content = jQuery(this.hash);

            $active.addClass('is-active');
            $content.show();

            e.preventDefault();
        });
    });
});