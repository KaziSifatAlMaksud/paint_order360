</div>
</div>
<!-- Core  -->
<script src="<?php echo PUBLIC_PATH . '/assets' ?>/vendor/animsition/jquery.animsition.js"></script>
<script src="<?php echo PUBLIC_PATH . '/assets' ?>/vendor/mousewheel/jquery.mousewheel.js"></script>
<!-- Plugins -->
<script src="<?php echo PUBLIC_PATH . '/assets' ?>/vendor/switchery/switchery.min.js"></script>
<script src="<?php echo PUBLIC_PATH . '/assets' ?>/vendor/intro-js/intro.js"></script>
<script src="<?php echo PUBLIC_PATH . '/assets' ?>/vendor/screenfull/screenfull.js"></script>
<script src="<?php echo PUBLIC_PATH . '/assets' ?>/vendor/peity/jquery.peity.min.js"></script>
<!-- Scripts -->
<script src="<?php echo PUBLIC_PATH . '/assets' ?>/js/core.js"></script>
<script src="<?php echo PUBLIC_PATH . '/assets' ?>/js/site.js"></script>
<script src="<?php echo PUBLIC_PATH . '/assets' ?>/js/sections/menu.js"></script>
<script src="<?php echo PUBLIC_PATH . '/assets' ?>/js/sections/menubar.js"></script>
<script src="<?php echo PUBLIC_PATH . '/assets' ?>/js/configs/config-colors.js"></script>
<script src="<?php echo PUBLIC_PATH . '/assets' ?>/js/configs/config-tour.js"></script>
<script src="<?php echo PUBLIC_PATH . '/assets' ?>/js/components/clockpicker.js"></script>
<script src="<?php echo PUBLIC_PATH . '/assets' ?>/js/components/animsition.js"></script>
<script src="<?php echo PUBLIC_PATH . '/assets' ?>/js/components/switchery.js"></script>
<script src="<?php echo PUBLIC_PATH . '/assets' ?>/js/components/peity.js"></script>
<script src="<?php echo PUBLIC_PATH . '/assets' ?>/vendor/toastr/toastr.js"></script>
<script src="<?php echo PUBLIC_PATH . '/assets' ?>/js/components/toastr.js"></script>
<script src="<?php echo PUBLIC_PATH . '/assets' ?>/js/components/bootstrap-datepicker.js"></script>
<script src="<?php echo PUBLIC_PATH . '/assets' ?>/js/components/multi-select.js"></script>
<script src="<?php echo PUBLIC_PATH . '/assets' ?>/js/components/select2.js"></script>
<script src="<?php echo PUBLIC_PATH . '/assets' ?>/js/components/panel.js"></script>
<script src="<?php echo PUBLIC_PATH . '/assets' ?>/js/components/alertify-js.js"></script>
<script src="<?php echo PUBLIC_PATH . '/assets' ?>/vendor/asscrollable/jquery.asScrollable.all.js"></script>
<script src="<?php echo PUBLIC_PATH . '/assets' ?>/vendor/slidepanel/jquery-slidePanel.js"></script>
<script src="<?php echo PUBLIC_PATH; ?>/bootstrap/js/moment.js"></script>
<script src="<?php echo PUBLIC_PATH; ?>/bootstrap/js/src/locale/ru.js"></script>
<script src="<?php echo PUBLIC_PATH; ?>/datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?php echo PUBLIC_PATH . '/assets' ?>/js/sections/sidebar.js"></script>
<script src="<?php echo PUBLIC_PATH . '/assets' ?>/js/components/asscrollable.js"></script>
<script src="<?php echo PUBLIC_PATH . '/assets' ?>/vendor/asscroll/jquery-asScroll.js"></script>
<script src="<?php echo PUBLIC_PATH . '/assets' ?>/vendor/ashoverscroll/jquery-asHoverScroll.js"></script>
<script src="<?php echo PUBLIC_PATH . '/assets' ?>/js/components/slidepanel.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script>
  (function(document, window, $) {
    'use strict';
    var Site = window.Site;
    $(document).ready(function($) {
      Site.run();
      setTimeout(function() {
        $(".alert .close").click();
      }, 2000);
    });
  })(document, window, jQuery);
</script>
<script src="<?php echo PUBLIC_PATH . '/assets' ?>/js/tweb.js"></script>
</body>
</html>
<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo MAP_API_KEY; ?>&libraries=places&callback=initAutocomplete" async defer></script>
<script>
  // This example displays an address form, using the autocomplete feature
  // of the Google Places API to help users fill in the information.
  // This example requires the Places library. Include the libraries=places
  // parameter when you first load the API. For example:
  // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

  var placeSearch, autocomplete;
  var componentForm = {
    // route: 'long_name',
    locality: 'long_name',
    administrative_area_level_1: 'short_name',
    country: 'long_name',
    postal_code: 'short_name'
  };

  function initAutocomplete() {
    // Create the autocomplete object, restricting the search to geographical
    // location types.
    autocomplete = new google.maps.places.Autocomplete(
      /** @type {!HTMLInputElement} */
      (document.getElementById('autocomplete')), {
        types: ['geocode']
      });

    // When the user selects an address from the dropdown, populate the address
    // fields in the form.
    autocomplete.addListener('place_changed', fillInAddress);
  }

  function fillInAddress() {
    // Get the place details from the autocomplete object.
    var place = autocomplete.getPlace();
    console.log(place);
    /*for (var component in componentForm) {
        document.getElementById(component).value = '';
        document.getElementById(component).disabled = false;
    }
    // Get each component of the address from the place details
    // and fill the corresponding field on the form.
    for (var i = 0; i < place.address_components.length; i++) {
        var addressType = place.address_components[i].types[0];
        console.log(addressType);
        if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
        }
    }*/
    $("#latitude").val(place.geometry.location.lat());
    $("#longitude").val(place.geometry.location.lng());
  }

  // Bias the autocomplete object to the user's geographical location,
  // as supplied by the browser's 'navigator.geolocation' object.
  function geolocate() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function(position) {
        lat = position.coords.latitude;
        lng = position.coords.longitude;
        var geolocation = {
          lat: position.coords.latitude,
          lng: position.coords.longitude
        };
        $("#latitude").val(lat);
        $("#longitude").val(lng);
        var circle = new google.maps.Circle({
          center: geolocation,
          radius: position.coords.accuracy
        });
        autocomplete.setBounds(circle.getBounds());
      });
    }
  }
</script>

<script>
  $(document).ready(function() {
    $("#toggleMenubar").click(function() {
      // alert("test");
      if ($("#change").hasClass("unfolded")) {
        $("#logo").attr("src", "<?php echo PUBLIC_PATH ?>/image/logo-phone.png");
      } else {
        $("#logo").attr("src", "<?php echo PUBLIC_PATH ?>/image/logo-phone.png");
      }
    });
    $(document.body).on('click', '.update_status a', function(e) {
      e.preventDefault();
      if (confirm("Are you sure you want to perform this action ?")) {
        //return false;
        _this = $(this);
        _id = _this.attr('rel');
        _model = _this.attr('model');
        _this.addClass('disabled');
        $.ajax({
          url: "<?php echo PUBLIC_PATH; ?>/admin/ajaxUpdateStatus",
          cache: false,
          headers: {
            'X-CSRF-Token': "<?php echo csrf_token() ?>"
          },
          type: "POST",
          data: {
            'id': _id,
            'model': _model
          }
        }).done(function(html) {
          // alert(html);
          if (html === 1) {
            _this.removeClass('label-danger');
            _this.addClass('label-success');
            _this.text('Active');
          }
          if (html === 0) {
            _this.removeClass('label-success');
            _this.addClass('label-danger');
            _this.text('Inactive');
          }
          _this.removeClass('disabled');
        });
      }
    });
  });
</script>
<script>
  $(document).ready(function() {
    $(".alert_msg").show().delay(30000).fadeOut();
    $("#painter_table").DataTable();
    $('body').append('<div class="product-image-overlay"><span class="product-image-overlay-close">x</span><img src="" /></div>');
    var productImage = $('img');
    var productOverlay = $('.product-image-overlay');
    var productOverlayImage = $('.product-image-overlay img');
    $('body').on('click', '.pop', function() {
      var productImageSource = $(this).attr('src');
      productOverlayImage.attr('src', productImageSource);
      productOverlay.fadeIn(100);
      $('body').css('overflow', 'hidden');
      $('.product-image-overlay-close').click(function() {
        productOverlay.fadeOut(100);
        $('body').css('overflow', 'auto');
      });
    }); 

  });
</script>