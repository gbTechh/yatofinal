(function ($) {
  function initMap() {
    $('.acf-map').each(function () {
      var map = new google.maps.Map(this, {
        zoom: parseInt($(this).attr('data-zoom')),
        center: new google.maps.LatLng(
          $(this).find('.marker').attr('data-lat'),
          $(this).find('.marker').attr('data-lng')
        )
      });
      var marker = new google.maps.Marker({
        position: new google.maps.LatLng(
          $(this).find('.marker').attr('data-lat'),
          $(this).find('.marker').attr('data-lng')
        ),
        map: map
      });
    });
  }
  $(document).ready(initMap);
})(jQuery);