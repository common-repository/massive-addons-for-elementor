(function($) {
    var maeAccordion = function($scope, $) {

        $scope.find('.mae-accordion-item.active .mae-accordion-body').slideDown();

        $scope.find('.mae-accordion-header').click(function() {
            $(this).parents('.mae-accordion-single').find('.mae-accordion-item').not($(this).parent()).removeClass('active').find('.mae-accordion-body').slideUp();
            $(this).parent().toggleClass('active');
            $(this).next('.mae-accordion-body').slideToggle();
        });

    }

    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction( 'frontend/element_ready/massive_accordion.default', maeAccordion);
    });   
})(jQuery);