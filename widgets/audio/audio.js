(function($) {

    var maeAudio = function($scope, $) {

        $scope.find('.mae-audio-container').each(function(){
            $(this).find('.mae-audio').audioPlayer({
                fullWidth: true,
                timeReverse: '',
                volume: $(this).data('muted'),
            });
        });
    }

    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction( 'frontend/element_ready/massive_audio.default', maeAudio);
    });   
})(jQuery); 