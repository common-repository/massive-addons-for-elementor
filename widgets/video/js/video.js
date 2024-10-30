(function ($) {

  var maeVideo = function ($scope, $) {
      $scope.find('.video-js').each(function () {

          var options = {
              techOrder: $(this).data('techorder'),
              type: $(this).data('type'),
              src: $(this).data('src'),
              autoplay: $(this).data('autoplay'),
              muted: $(this).data('muted'),
              controls: $(this).data('control'),
              loop: $(this).data('loop'),
          };

          //default
          var opts = $.extend({
              techOrder: '',
              type: '',
              src: '',
              autoplay: 0,
              muted: 0,
              controls: 1,
              loop: 0,
          }, options);

          //videojs initializer
          var player = videojs($(this)[0], {
              techOrder: [opts.techOrder],
              sources: [{
                  type: opts.type,
                  src: opts.src,
              }],
              autoplay: opts.autoplay,
              muted: opts.muted,
              controls: opts.controls,
              loop: opts.loop,

          }).ready(function () {
              var that = this;

              //media element
              $(this.el_).css('visibility', 'visible');
              $prev = $(this.el_).prev();

              //manual click
              $prev.click(function () {
                  $(this).hide();
                  that.play();
              });

              //autoplay
              if (opts.autoplay == true) {
                  $prev.hide();
                  if (window.elementorFrontend.config.isEditMode == '1') {
                      $(this.el_).find('.vjs-loading-spinner').hide();
                  }
                  that.play();
              }
          });
      });

      $('.vimeo-js').each(function () {
          var that = this;

          var options = {
              id: $(this).data('video'),
              autoplay: ($(this).data('autoplay') == true) ? true : false,
              muted: ($(this).data('muted') == true) ? true : false,
              loop: ($(this).data('loop') == true) ? true : false,
              autopause: ($(this).data('autopause') == true) ? true : false,
              title: ($(this).data('title') == true) ? true : false,
              byline: ($(this).data('byline') == true) ? true : false,
              portrait: ($(this).data('portrait') == true) ? true : false,
              speed: ($(this).data('speed') == true) ? true : false,
              color: $(this).data('color'),

          };

          //default
          var opts = $.extend({
              id: '59777392',
              autoplay: false,
              muted: false,
              loop: false,
              autopause: false,
              title: true,
              byline: true,
              portrait: true,
              speed: false,
              color: '00adef',
              maxwidth: $(that).closest('.mae-video-container').width()
          }, options);

          var player = new Vimeo.Player(
              $(this),
              opts
          );

          player.ready().then(function () {
              //media element
              $prev = $(that).prev();
              $(that).css('visibility', 'visible');
              //manual click
              $prev.click(function () {
                  $(this).hide();
                  player.play();
              });
              //autoplay
              if (opts.autoplay == true) {
                  $prev.hide();
                  player.play();
              }
          });

          // player.on('pause',function(){
          //   $prev = $(that).prev();
          //   $prev.show();
          // });
      });
  }

  $(window).on('elementor/frontend/init', function () {
      elementorFrontend.hooks.addAction('frontend/element_ready/massive_video.default', maeVideo);
  });
})(jQuery);