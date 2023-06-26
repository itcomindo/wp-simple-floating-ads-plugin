window.addEventListener('DOMContentLoaded', (event) => {
    jQuery(function () {
        const sfaclose = jQuery('#sfaclose');
        const sfapr = jQuery('#sfapr');
        jQuery(sfaclose).click(function () {
            jQuery(sfaclose).hide();
            jQuery(sfapr).addClass('inactive');
        });

    });
});