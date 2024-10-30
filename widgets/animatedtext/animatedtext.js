(function($){

  var maeAnimatedText = function($scope, $) {
    
    $scope.find('.mae-animetext .mae-animeletters').each(function(){
      $(this).html($(this).text().replace(/([^\x00-\x80]|\w)/g, "<span class='mae-animeletter'>$&</span>"));
      
      var animLoop = ($(this).closest('.mae-animetext').data('loop') == 'yes') ? true : false;
      var AnimDurn = 800;
      var dataAnim = parseInt($(this).closest('.mae-animetext').data('anim'));
      var letterDelay = AnimDurn/$(this).find('.mae-animeletter').length;
      
      animateText(animLoop,AnimDurn,dataAnim,letterDelay);
    });

    function animateText(animLoop,AnimDurn,dataAnim,letterDelay){

      switch(dataAnim) {

        case 1:
          anime.timeline({loop: animLoop})
          .add({
            targets: '.mae-animetext.mae-animetext-1 .mae-animeletter',
            scale: [0.3,1],
            opacity: [0,1],
            translateZ: 0,
            easing: "linear",
            duration: AnimDurn,
            delay: function(el, i) {
              return letterDelay * (i+1)
            }
          });
          break;

        case 2:
          anime.timeline({loop: animLoop})
          .add({
            targets: '.mae-animetext.mae-animetext-2 .mae-animeletter',
            rotateY: [-90, 0],
            duration: AnimDurn,
            delay: function(el, i) {
              return letterDelay * i;
            }
          });
          break;

        case 3:
        anime.timeline({loop: animLoop})
        .add({
          targets: '.mae-animetext.mae-animetext-3 .mae-animeletter',
          scale: [2,1],
          opacity: [0,1],
          translateZ: 0,
          easing: "linear",
          duration: AnimDurn,
          delay: function(el, i) {
            return letterDelay*i;
          }
        });
        break;

      case 4:
        anime.timeline({loop: animLoop})
        .add({
          targets: '.mae-animetext.mae-animetext-4 .mae-animeletter',
          translateY: ["1.5em", 0],
          translateZ: 0,
          duration: AnimDurn,
          delay: function(el, i) {
            return letterDelay * i;
          }
        });
        break;

      case 5:
        var animeOffset = AnimDurn+(AnimDurn/10);
        anime.timeline({loop: animLoop})
        .add({
          targets: '.mae-animetext.mae-animetext-5 .mae-animeline',
          scaleY: [0,1],
          opacity: [0.5,1],
          easing: "linear",
          duration: AnimDurn/10
        })
        .add({
          targets: '.mae-animetext.mae-animetext-5 .mae-animeline',
          translateX: [0,$(".mae-animetext.mae-animetext-5 .mae-animeletters").outerWidth(true)],
          easing: "linear",
          duration: AnimDurn,
          delay: 100
        }).add({
          targets: '.mae-animetext.mae-animetext-5 .mae-animeletter',
          opacity: [0,1],
          easing: "linear",
          duration: AnimDurn-(AnimDurn/10),
          offset: '-='+animeOffset,
          delay: function(el, i) {
            return letterDelay * (i+1)
          }
        });
        break;

      case 6:
        anime.timeline({loop: animLoop})
        .add({
          targets: '.mae-animetext.mae-animetext-6 .mae-animeletter',
          translateY: ["1.1em", 0],
          translateX: ["0.55em", 0],
          translateZ: 0,
          rotateZ: [180, 0],
          duration: AnimDurn,
          easing: "linear",
          delay: function(el, i) {
            return letterDelay * i;
          }
        });
        break;

      case 7:
        anime.timeline({loop: animLoop})
        .add({
          targets: '.mae-animetext.mae-animetext-7 .mae-animeletter',
          translateY: [-100,0],
          easing: "linear",
          duration: AnimDurn,
          delay: function(el, i) {
            return letterDelay * i;
          }
        });
        break;
      }
    }
  }

	$(window).on('elementor/frontend/init', function () {
		elementorFrontend.hooks.addAction('frontend/element_ready/massive_animatedtext.default', maeAnimatedText);
	});
})(jQuery);