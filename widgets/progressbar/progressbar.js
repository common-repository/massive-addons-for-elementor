(function($) {

    var maeProgressBar = function($scope, $) {
            
        var b = $(".mae-waypoint");
        b.each(function() {
            var b = $(this);
            var waypoint = new Waypoint({
                element: b[0],
                handler: function(direction) {
                    b.trigger("mae.init");
                    waypoint.disable();
                },
                offset: '75%'
            });
        });

        $('.mae-progress-bar').on('mae.init', function() {
            var rate = $(this).data('rate');
            $(this).find('.mae-progress__complete').css('width', rate + '%');
        });
    }
    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction( 'frontend/element_ready/massive_progress.default', maeProgressBar);
    });
})(jQuery);