</div>
</div>
<audio id="macthAudio">
  <source src="../sound/NewMatch.mp3" type="audio/mpeg">
  Your browser does not support the audio element.
</audio>
<?php
$pagearray = explode('@', Route::currentRouteAction());
$currentpage = $pagearray[1];
?>
<!-- Core  -->

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
<script src="<?php echo PUBLIC_PATH; ?>/datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?php echo PUBLIC_PATH . '/assets' ?>/js/sections/sidebar.js"></script>
<script src="<?php echo PUBLIC_PATH . '/assets' ?>/js/components/asscrollable.js"></script>
<script src="<?php echo PUBLIC_PATH . '/assets' ?>/vendor/asscroll/jquery-asScroll.js"></script>
<script src="<?php echo PUBLIC_PATH . '/assets' ?>/vendor/ashoverscroll/jquery-asHoverScroll.js"></script>
<script src="<?php echo PUBLIC_PATH . '/assets' ?>/js/components/slidepanel.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo PUBLIC_PATH . '/assets' ?>/js/ajax-bootstrap-select.js"></script>
<script>
  (function(document, window, $) {
    'use strict';
    var Site = window.Site;
    $(document).ready(function($) {
      Site.run();
    });
  })(document, window, jQuery);
</script>
<script src="<?php echo PUBLIC_PATH . '/assets' ?>/js/tweb.js"></script>
</body>

</html>
<script>
  $(document).ready(function() {
    $(document.body).on('click', '.update_status a', function(e) {
      e.preventDefault();
      //return false;
      _this = $(this);
      _id = _this.attr('rel');
      _model = _this.attr('model');
      _this.addClass('disabled');
      $.ajax({
        url: "<?php echo PUBLIC_PATH; ?>/shop/ajaxUpdateStatus",
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
    });
    var options = {
      ajax: {
        url: '<?php echo PUBLIC_PATH; ?>/shop/ajaxuserlist',
        headers: {
          'X-CSRF-Token': "<?php echo csrf_token() ?>"
        },
        type: 'POST',
        dataType: 'json',
        // Use "{{{q}}}" as a placeholder and Ajax Bootstrap Select will
        // automatically replace it with the value of the search query.
        data: {
          q: '{{{q}}}'
        }
      },
      locale: {
        emptyTitle: 'Select and Begin Typing'
      },
      log: 3,
      preprocessData: function(data) {
        var i, l = data.length,
          array = [];
        if (l) {
          for (i = 0; i < l; i++) {
            array.push($.extend(true, data[i], {
              text: data[i].first_name + ' ' + data[i].last_name,
              value: data[i].id,
              data: {
                subtext: data[i].company_name
              }
            }));
          }
        }
        // You must always return a valid array when processing data. The
        // data argument passed is a clone and cannot be modified directly.
        return array;
      }
    };
    $('.selectpicker').selectpicker().filter('.with-ajax').ajaxSelectPicker(options);
    $('select').trigger('change');
    $(document.body).on('click', '.add_btn', function() {
      var order_id = $("#order_id").val();
      var product = $(this).closest('tr').find('.product').val();
      var color = $(this).closest('tr').find('.color').val();
      var size = $(this).closest('tr').find('.size').val();
      var qty = $(this).closest('tr').find('.qty').val();
      var brand = $(this).closest('tr').find('.brand').val();
      var note = $(this).closest('tr').find('.note').val();
      var area = $(this).closest('tr').find('.area').val();
      if (brand == '' || size == '' || qty == '' || color == '' || product == '') {
        alert('Please fill all required fileds');
        return false;
      }
      $.ajax({
        url: "<?php echo PUBLIC_PATH; ?>/shop/ajaxAddOrder",
        headers: {
          'X-CSRF-Token': "<?php echo csrf_token() ?>"
        },
        type: "post",
        data: {
          'brand': brand,
          'note': note,
          'area': area,
          'qty': qty,
          'size': size,
          'color': color,
          'product': product,
          'order_id': order_id
        },
        success: function(data) {
          if (data == 1) {
            location.reload();
            //window.location.reload();
          }
        }
      });
    });
    function badgecount() {
      var old_badge = $('#badge1').val();
      $.ajax({
        url: "<?php echo PUBLIC_PATH; ?>/shop/ajax",
        headers: {
          'X-CSRF-Token': "<?php echo csrf_token() ?>"
        },
        type: "post",
        data: {
          'old': old_badge
        },
        success: function(data) {
          var badge = '(' + data.count + ')'
          $('#badge').html(badge);
          $('#badge1').val(data.count);
          if (data.new_order) {
            var vid = document.getElementById("macthAudio");
            vid.play();
          }
        }
      });
    }
    badgecount();
    setInterval(function() {
      badgecount();
    }, 3000);
    $('.del_row').click(function() {
      var row_id = $(this).data('id');
      $(this).closest('tr').hide();
      $.ajax({
        url: "<?php echo PUBLIC_PATH; ?>/shop/ajaxDeleteOrder",
        headers: {
          'X-CSRF-Token': "<?php echo csrf_token() ?>"
        },
        type: "post",
        data: {
          'id': row_id
        },
        success: function(data) {
          if (data == 1) {
            location.reload();
          }
        }
      });
    });
    $('.edit_class').click(function() {
      var row_id = $(this).data('id');
      $(this).hide();
      $(".del_row_" + row_id).hide();
      $("#btn_" + row_id).show();
      $(this).closest('tr').find('input').prop('readonly', false);
      $(this).closest('tr').find('input').removeClass("no_border");
      $(this).closest('tr').find('select').prop('disabled', false);
      $(this).closest('tr').find('select').removeClass("no_border");
    });
    $('.add_row').click(function(e) {
      e.preventdefault;
      var newRow = '<tr>' + $('#newRow tr').html() + '</tr>';
      $("#vieworder tbody").append(newRow);
    });
    $('.edit_btn').click(function() {
      var row_id = $(this).data('btid');
      var brand = $("#brand_" + row_id).val();
      var note = $("#note_" + row_id).val();
      var area = $("#area_" + row_id).val();
      var qty = $("#qty_" + row_id).val();
      var size = $("#size_" + row_id).val();
      var color = $("#color_" + row_id).val();
      var product = $("#product_" + row_id).val();
      $.ajax({
        url: "<?php echo PUBLIC_PATH; ?>/shop/ajaxUpdateOrder",
        headers: {
          'X-CSRF-Token': "<?php echo csrf_token() ?>"
        },
        type: "post",
        data: {
          'brand': brand,
          'note': note,
          'area': area,
          'qty': qty,
          'size': size,
          'color': color,
          'product': product,
          'id': row_id
        },
        //data:{ 'brand' : brand, 'note' : "'"+note+"'" , 'area' : "'"+area+"'", 'qty' : "'"+qty+"'", 'size' : "'"+size+"'", 'color' : "'"+color+"'", 'product' : "'"+product+"'", 'id' : "'"+row_id+"'" },
        success: function(data) {
          if (data == 1) {
            location.reload();
            //window.location.reload();
          }
        }
      });
    });
    $('#painter_select').change(function() {
      var user_id = $(this).val();
      $.ajax({
        url: "<?php echo PUBLIC_PATH; ?>/shop/ajaxPainterDetail",
        headers: {
          'X-CSRF-Token': "<?php echo csrf_token() ?>"
        },
        type: "post",
        data: {
          'user_id': user_id
        },
        success: function(data) {
          $('.builders_data').html("");
          //var res = JSON.parse(data);
          console.log(data)
          $('.first_name').html(data.user.first_name);
          $('.last_name').html(data.user.last_name);
          $('.company_name').html(data.user.company_name);
          $('.address').html(data.user.address);
          $('.phone').html(data.user.phone);
          $('.email').html(data.user.email);
          $('.this_week').html(data.thisWeek);
          $('.last_month').html(data.lastmonth);
          $('.monthly_avg').html(data.monthlyavg);
          $('.last_year').html(data.lastyear);
          $('.this_year').html(data.thisyear);
          $('.builders_data').append(data.builders_data);
        }
      });
    });
    $(".alert_msg").show().delay(30000).fadeOut();

    // $("#painter_table").DataTable();
    var currentpage = "<?php echo $currentpage; ?>";
    if (currentpage == 'orders' || currentpage == 'today_orders') {
      var tabletest = $('#painter_table').DataTable({
        "ajax": {
          "url": "ajaxorders?page=<?php echo $currentpage; ?>",
          "dataSrc": "data"
        },
        "order": [
          [0, "desc"]
        ]
      });

      tabletest.draw();

      setInterval(function() {
        tabletest.ajax.reload(null, false);
      }, 5000);
    }


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

    $('body').on('click', 'button.close', function() {
      $('.edit_class').css("display", "block");
    });



    // $.validator.addMethod("regex", function(value, element, regexpr) {          
    //   return regexpr.test(value);
    //   }, "Please enter a valid email address.");

    $("#emp_table").DataTable();
    $("#add_brand").validate({
      rules: {
        brand_name: {
          required: true,
        }
      },
      messages: {
        "brand_name": {
          required: "Brand name is required",
        },
      },
      errorElement: "span",
      errorClass: "help-inline",
    });






  });
</script>