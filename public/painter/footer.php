</div>
<!-- /#wrapper 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
<script src="<?php echo PUBLIC_PATH; ?>/js/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo PUBLIC_PATH; ?>/js/bootstrap.min.js"></script>
<script src="<?php echo PUBLIC_PATH; ?>/DataTables/media/js/jquery.dataTables.min.js"></script>
<script src="<?php echo PUBLIC_PATH; ?>/DataTables/media/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo PUBLIC_PATH; ?>/js/comman.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<script src="<?php echo PUBLIC_PATH; ?>/js/jquery-validation/dist/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo PUBLIC_PATH; ?>/js/image-upload.js"></script>

<script>
    $('.dropzone').html5imageupload({
        onAfterInitImage: function() {},
        onSave: function(data) {
            $.ajax({
                url: "<?php echo PUBLIC_PATH; ?>/upload_image_ajax",
                type: "post",
                headers: {
                    'X-CSRF-Token': "<?php echo csrf_token() ?>"
                },
                data: data,
                success: function(data) {
                    $("#photo_name").val(data.name);
                    $("#place_order_btn").prop("disabled", false);
                }
            });
        }
    });
</script>

<script>
    $(document).ready(function() {
        var quantitiy = 0;
        $(document).on('click', '.quantity-right-plus', function(e) {
            // Stop acting like a button
            e.preventDefault();
            var value_to_set = $(this).parent().parent().find(".quantity");
            // Get the field name
            var quantity = parseInt($(value_to_set).val());
            // If is not undefined
            $(value_to_set).val(quantity + 1);
            // Increment
        });

        $(document).on('click', '.quantity-left-minus', function(e) {
            // Stop acting like a button
            e.preventDefault();
            var value_to_set = $(this).parent().parent().find(".quantity");
            // Get the field name
            var quantity = parseInt($(value_to_set).val());
            // If is not undefined
            // Increment
            if (quantity > 0) {
                $(value_to_set).val(quantity - 1);
            }
        });
    });
</script>


<script type="text/javascript">
    function readURL(input, id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                //$(id).attr('src', e.target.result);
                $(id).css("background-image", "url(" + e.target.result + ")");
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    //  var reader = new FileReader();
    $('#file-input').change(function() {
        var img_id = '#profile_img_bg'
        readURL(this, img_id);
    });
    $(document).on('click', '.pn-ProductNav_Link', function() {
        $(this).parent().find(".pn-ProductNav_Link").removeClass("active_li");
        $(this).parent().find(".pn-ProductNav_Link").attr("aria-selected", "false");
        $(this).attr("aria-selected", "true");
        $(this).addClass("active_li");
        var selected_val = $(this).attr("rel");
        $(this).parent().parent().find(".brand_value").val(selected_val);
    });

    $(document).on('click', '.size_li', function() {
        //$(".size_li").removeClass("active_l");
        $(this).parent().find(".size_li").removeClass("active_l");
        $(this).addClass("active_l");
        var selected_val = $(this).attr("rel");
        $(this).parent().parent().find(".size_value").val(selected_val);
    });
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo MAP_API_KEY; ?>&libraries=places&callback=initAutocomplete" async defer></script>
<script>
    // This example displays an address form, using the autocomplete featureorder_table
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
    var options = $("#selectVendor > option");
    var optionssub = $("#selectVendor2 > option");
    var random = Math.floor(options.length * (Math.random() % 1));
    var random2 = Math.floor(optionssub.length * (Math.random() % 1));
    $("#selectVendor > option").attr('selected', false).eq(random).attr('selected', true);
    $("#selectVendor2 > option").attr('selected', false).eq(random2).attr('selected', true);

    function changeval1() {
        var test = '<div id="outside" class="no-more-tables pull-left hidden-lg rr">' + $('#cell > #outside').last().html() + '</div>';
        // + '<div id="inside" class="no-more-tables pull-left hidden-lg">' + $('#cell > #inside').last().html() + '</div>';
        $('#cell').append(test);
        $('#more-paint').attr('checked', false)
    }

    $(window).on('resize', function() {
        var win = $(this); //this = window
        // if(win.width() >= 1200){
        //       $('.tab_btn').hide();
        //       $('.tab1, .tab2, .tab3').show();
        //       $('.mobile_form input, .mobile_form select').prop("disabled", "disabled");
        //       $('.web_form input, .web_form select').removeAttr("disabled");
        // }else{
        //    $('.tab_btn').show();
        //      var activetab =  $('.tab_btn button.btn-warning').val();
        //     $('.tab1,.tab2, .tab3').hide();
        //     $('.tab'+activetab).show();
        //     $('.mobile_form input, .mobile_form select').removeAttr("disabled");;
        //     $('.web_form input, .web_form select').prop("disabled", "disabled");
        // }
    });

    function changeTab(data) {
        var activetab = $('.tab_btn button.btn-warning').val();
        var is_error = false;
        var is_filed = '';
        $(".tab" + activetab + " input , .tab" + activetab + " select ").each(function() {
            if ($(this).attr("required")) {
                if ($(this).val() == '' || $(this).val() == undefined) {
                    is_error = true;
                    is_filed = this;
                }
            }
        });
        if (is_error) {
            alert('This field is required.');
            $(is_filed).focus();
            return false;
        }
        $('.tab_btn button').removeClass('btn-warning');
        $('#tab_btn' + data).removeClass('outer');
        $('#tab_btn' + activetab).html('<i class="fa fa-check" aria-hidden="true"></i>');
        $('#tab_btn' + data).addClass('btn-warning');
        $('.tab1, .tab2, .tab3').hide(1000);
        $('.tab' + data).show(1000);
        $('.la_buttons .la_button').removeClass('active');
        $('.la_buttons .la_button.la_button_' + data).addClass('active');
    }

    $(document).on('click', '#finish', function(e) {
        e.preventDefault();
        var data = $(this).val();
        var activetab = $('.tab_btn button.btn-warning').val();
        var is_error = false;
        var is_filed = '';
        $(".tab" + activetab + " input , .tab" + activetab + " select ").each(function() {
            if ($(this).attr("required")) {
                if ($(this).val() == '' || $(this).val() == undefined) {
                    is_error = true;
                    is_filed = this;
                }
            }
        });
        if (is_error) {
            alert('This field is required.');
            $(is_filed).focus();
            return false;
        }
        $('.tab_btn button').removeClass('btn-warning');
        $('#tab_btn' + data).removeClass('outer');
        $('#tab_btn' + activetab).html('<i class="fa fa-check" aria-hidden="true"></i>');
        $('#tab_btn' + data).addClass('btn-warning');
        $('.tab1, .tab2, .tab3').hide(1000);
        $('.tab' + data).show(1000);
        $('.la_buttons .la_button').removeClass('active');
        $('.la_buttons .la_button.la_button_' + data).addClass('active');

    });

   

    $(document).ready(function() {
        $(".alert_msg").show().delay(30000).fadeOut();
        var order_table = $("#order_table").DataTable({
            "order": [
                [1, "desc"]
            ],
            "lengthChange": false,
            "autoWidth": false,
            "columnDefs": [{
                    "width": "200",
                    "targets": 0
                },
                //   { "width": "200", "targets": 1 },
                //   { "width": "50", "targets": 2 }
            ],
            "scrollX": true,
            "scrollCollapse": true,
            "info": false

        });

        var builder_table = $("#builder_table").DataTable({
            "order": [
                [1, "desc"]
            ],
            "lengthChange": false,
            "autoWidth": false,
            "columnDefs": [{
                    "width": "200",
                    "targets": 0
                },
                {
                    "width": "200",
                    "targets": 1
                },
                {
                    "width": "50",
                    "targets": 2
                }
            ],
            "scrollX": true,
            "scrollCollapse": true,
            "info": false,
            "searching": false,
        });
        $("#shop_table").DataTable({
            "order": [
                [1, "asc"]
            ],
            "lengthChange": false
        });
        $("#order_table_data").DataTable({
            "order": [
                [2, "desc"]
            ],
            "searching": true,
            "info": false,
            "lengthChange": false,
        });

        if ($(window).width() >= 1200) {
            $(".select-style").addClass("input-field");
            $(".input-field").removeClass("select-style");
            $('.input-field').parent("td").addClass("pd-0");
            $('.tab_btn').hide();
            $('.tab1, .tab2, .tab3').show();
        } else {
            a = $(location).attr('href');
            var part = a.substring(a.lastIndexOf('/') + 1);
            var partnew = a.substring(a.lastIndexOf('=') + 1);
            if (partnew == 'new' || part == 'chose_shop') {
                // console.log('hello');
                // $('.tab_btn').show();
                // $('div').remove('.la_button_2');
                // $('div').remove('.la_button_1');
                // $(".la_button_3").css({
                //     width: "100%"
                // });
            } else if (part != 'new_order') {
                // console.log('world');
                $('.tab_btn').show();
                $('.tab1, .tab3').hide();
                $('.la_buttons .la_button.la_button_' + 2).addClass('active');
                $('.la_buttons .la_button.la_button_' + 1).removeClass('active');
                $(".size-cst li").each(function(index) {
                    value = $(this).attr('value');
                    if ($(this).attr("rel") == value) {
                        $(this).addClass("active_l");
                    }
                });
            } else {
                $('.tab_btn').show();
                $('.tab2, .tab3').hide();
            }
        }

        $(window).ready(function() {
            a = $(location).attr('href');
            var partnew = a.substring(a.lastIndexOf('=') + 1);
            if (partnew == 'new') {
                $('.tab_btn').show();
                $('div').remove('.la_button_2');
                $('div').remove('.la_button_1');
                $(".la_button_3").css({
                    width: "100%"
                });
            }
        });

        $('.select-amount').material_select();
        //$('.input-field select').material_select();
        //$(".input-field select[required]").css({position: 'absolute', display: 'inline', height: 0, padding: 0, width: 0});
        $('select').change(function() {
            var key = $(this).data('key');
            if (key != 'undefined') {
                $('.os_' + key).prop('required', true);
                //$('select').prop('required',true);
            }
        });
        $('.mobile_form input').change(function() {
            var key = $(this).closest('table').find('input:lt(2)').prop('required', true);
            //var key = $(this).closest('table').find('select').prop('required',true);
        });
        $('input').change(function() {
            var key = $(this).data('key');
            //alert(key);
            if (key != 'undefined') {
                $('.os_' + key).prop('required', true);
                //$('select').prop('required',true);
            }
        });

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
        $.validator.addMethod("regex", function(value, element, regexpr) {
            return regexpr.test(value);
        }, "Please enter a valid email address.");
        var book = $("#signup-from").validate({
            rules: {
                first_name: {
                    required: true,
                },
                last_name: {
                    required: true,
                },
                company_name: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true,
                    regex: /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/,
                    //remote:"config/check.php?action=emailExists"
                },
                password: {
                    required: true,
                    minlength: 6,
                    maxlength: 15,
                },
                cpassword: {
                    required: true,
                    minlength: 6,
                    equalTo: "#password",
                },
            },
            messages: {
                "first_name": {
                    required: "First name is required",
                },
                "last_name": {
                    required: "Last name is required",
                },
                "company_name": {
                    required: "Company name is required",
                },
                "email": {
                    required: "E-mail Name is required",
                    //remote: "E-mail already exist"
                },
                "password": {
                    required: "Password is required",
                },
                "cpassword": {
                    required: "Confirm Password is required",
                }
            },
            errorElement: "span",
            errorClass: "help-inline",
        });
    });
</script>
</body>

</html>