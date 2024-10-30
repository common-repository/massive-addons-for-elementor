(function($) {
    
    var maeMaps=function($scope,$){

        map = new_map($scope.find('.mae-markers'));
    
        function new_map( $el ) {
            $wrapper = $scope.find('.mae-markers');
            var zoom = $wrapper.data('zoom');
            var $markers = $el.find('.marker');
            var styles = $wrapper.data('style');
            var prevent_scroll = $wrapper.data('scroll')

            var args = {
                zoom		: zoom,
                center		: new google.maps.LatLng(0, 0),
                mapTypeId	: google.maps.MapTypeId.ROADMAP,
                styles		: styles
            };

            var map = new google.maps.Map( $el[0], args);

            map.markers = [];

            $markers.each(function(){
                
                add_marker( jQuery(this), map );
            });

            center_map( map, zoom );

            return map;
        }
        

        function add_marker( $marker, map ) { 
            

            var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

            icon_img = $marker.attr('data-icon');
            if(icon_img != ''){
                var icon = {
                    url : $marker.attr('data-icon'),
                    scaledSize: new google.maps.Size($marker.attr('data-icon-size'), $marker.attr('data-icon-size'))
                };
            }

            var marker = new google.maps.Marker({
                position	: latlng,
                map			: map,
                animation: google.maps.Animation.DROP,
                icon        : icon
            });

            map.markers.push( marker );              
            var geocoder = new google.maps.Geocoder;            

            geocoder.geocode({'location': latlng}, function(results, status) {
                if (status === google.maps.GeocoderStatus.OK) {
                    if (results[1]) {

                    var infowindow = new google.maps.InfoWindow();
                    var service = new google.maps.places.PlacesService(map);                     
                    
                    service.getDetails({
                        placeId: results[1].place_id
                        }, function(place, status) {
                        if (status === google.maps.places.PlacesServiceStatus.OK) {

                            $scope.find(".placecard__business-name").text(place.name);
                            $scope.find(".placecard__info").text(place.formatted_address);
                            $scope.find(".placecard__view-large").attr("href",place.url);

                            google.maps.event.addListener(marker, 'click', function() { 
                                $scope.find(".placecard__business-name").text(place.name);
                            $scope.find(".placecard__info").text(place.formatted_address);
                            $scope.find(".placecard__view-large").attr("href",place.url);                               
                            });
                        }
                        });
                    } 
                
                } 
                
                });   
            
    
        }

        function center_map( map, zoom ) {
            
            // vars
            var bounds = new google.maps.LatLngBounds();
            // loop through all markers and create bounds
            jQuery.each( map.markers, function( i, marker ){
                var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );
                bounds.extend( latlng );
            });

            // only 1 marker?
            if( map.markers.length == 1 )
            {
                // set center of map
                map.setCenter( bounds.getCenter() );
                map.setZoom( zoom );
            }
            else
            {
                // fit to bounds
                map.fitBounds( bounds );
            }
        }
    }

    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction( 'frontend/element_ready/massive_gmaps.default', maeMaps);
    });   
})(jQuery);