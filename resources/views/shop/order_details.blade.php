<?php
// require public_path() . '/admin/header.blade.php';
require public_path() . '/s_shop/header.blade.php';

?>
<style>
    .button-navigation button.active {
        background-color: gray;
        color: white;
    }

</style>
<div class="page-header">
    <h1 class="page-title">
        Chose paint account then builder to upload A New Job form Builder
    </h1>
    <br />
    <div class="row">
        <div class="col-sm-12 mx-3">
            <form method="post" id="add_shop" action="{{ route('shop.shop.storePaintOrder') }}" enctype="multipart/form-data">

                @csrf
                @if(isset($product))
                @method('PUT')
                @endif



                {{-- Uncomment for update --}}
                {{-- @if($painterjob->id)
        @method('PUT')
    @endif --}}

                {{-- Update Button --}}
                <div class="row">
                    <div class="form-group justify-content-end">
                        <div class="col-sm-12 text-right">
                            <button type="submit" class="btn btn-primary">
                                {{ $painterjob->id ? 'Update Order' : 'Create Order' }}
                            </button>
                        </div>
                    </div>
                </div>
                {{-- End Update Button --}}

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Date Stamp:</label>
                            <div class="col-sm-9">
                                <input type="date" name="date" value="{{ old('date') ?? ($painterjob ? $painterjob->date : now()->toDateString()) }}" class="form-control form-control-lg">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Painter:</label>
                            <div class="col-sm-9">
                                <select name="painter_id" id="painter_id" required class="form-control painter">
                                    @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ $user->id == old('user_id', $painterjob->user_id) ? 'selected' : '' }}>
                                        {{ $user->first_name . ' ' . $user->last_name }} - ({{ $user->company_name }})
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Painters Address: </label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="searchTextField" name="painter_address" id="painter_address" rows="1">{{ old('painter_address', $painterjob->painter_address) }}</textarea>
                                <input type="hidden" name="painter_longitude" id="Lat" value="">
                                <input type="hidden" name="painter_latitude" id="Lng" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Job Address: </label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="searchTextField" name="job_address" id="job_address" rows="1">{{ old('job_address', $painterjob->job_address) }}</textarea>
                                <input type="hidden" name="job_longitude" id="Lat" value="">
                                <input type="hidden" name="job_latitude" id="Lng" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Brand: </label>
                            <div class="col-sm-9">
                                <select name="brand_id" id="brand_id" required class="form-control brand">


                                    <option value="" selected>Select</option>
                                    @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}" {{ $brand->id == old('brand_id', $painterjob->brand_id) ? 'selected' : '' }}>

                                        {{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Touch Up Kit:</label>
                            <div class="col-sm-9">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="kit_status" value="1" {{ old('touch_up_kit', $painterjob->touch_up_kit ?? '') == '1' ? 'checked' : '' }}>

                                        Yes, include a Touch Up Kit
                                    </label>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="col-sm-5">
                        <div class="form-group mt-5 pt-5">
                            <label class="col-sm-3 control-label">Auto Order Number:
                            </label>
                            <div class="col-sm-9">
                                {{-- <input name="price" value="{{ old('price') ?? ($painterjob ? $painterjob->price : '') }}" min="1" max="50000000000000" type="number" step="0.01" class="form-control form-control-lg"> --}}

                            </div>
                        </div>

                    </div>
                </div>
            </form>










        </div>

        </form>


        <div class="row">
            <label class="col-sm-12 control-label">
                <h2>Outside Paint & Undercoat:</h2>
            </label>
            <div class="col-sm-12">
                <div id="inside" class="no-more-tables mt-50 pull-left visible-lg table-responsive" style="width: 100%;">
                    <table class="col-md-12 table-bordered  table-condensed cf">
                        <thead class="cf">
                            <tr>
                                <th>Size</th>
                                <th>Amount</th>
                                <th>Product</th>
                                <th>Colour Name</th>
                                <th>Sheen Level</th>
                                <th>Brand</th>
                                <th>Notes</th>
                                <th>Area</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($outside as $key => $value) :
                            ?>
                            <tr>
                                <td data-title="Size">
                                    <div class="">
                                        <select name="outside[<?php echo $key; ?>][size]" class=" form-control s_h clickget ">
                                            <!-- <option value="" selected>Select</option> -->
                                            <option value="100" {{ old('outside[$key][size]', (array_key_exists($key, $data['outside']) ? $data['outside'][$key]->size : '') == 100 ? 'selected' : '') }}>
                                                Select</option>
                                            <option value="101" {{ old('outside[$key][size]', (array_key_exists($key, $data['outside']) ? $data['outside'][$key]->size : '') == 101 ? 'selected' : '') }}>
                                                None</option>
                                            <option value="102" {{ old('outside[$key][size]', (array_key_exists($key, $data['outside']) ? $data['outside'][$key]->size : '') == 102 ? 'selected' : '') }}>
                                                Call me</option>
                                            <option value="15" {{ old('outside[$key][size]', (array_key_exists($key, $data['outside']) ? $data['outside'][$key]->size : '') == 15 ? 'selected' : '') }}>
                                                15 L</option>
                                            <option value="10" {{ old('outside[$key][size]', (array_key_exists($key, $data['outside']) ? $data['outside'][$key]->size : '') == 10 ? 'selected' : '') }}>
                                                10 L</option>
                                            <option value="4" {{ old('outside[$key][size]', (array_key_exists($key, $data['outside']) ? $data['outside'][$key]->size : '') == 4 ? 'selected' : '') }}>
                                                4 L</option>
                                            <option value="2" {{ old('outside[$key][size]', (array_key_exists($key, $data['outside']) ? $data['outside'][$key]->size : '') == 2 ? 'selected' : '') }}>
                                                2 L</option>
                                            <option value="1" {{ old('outside[$key][size]', (array_key_exists($key, $data['outside']) ? $data['outside'][$key]->size : '') == 1 ? 'selected' : '') }}>
                                                1 L</option>
                                        </select>
                                    </div>
                                </td>

                                <td data-title="Amount">
                                    <div class="">
                                        <select name="outside[<?php echo $key; ?>][qty]" class=" form-control s_h clickget ">
                                            <?php
                                                echo '<option value="" selected >Select</option>';
                                                for ($i = 0; $i <= 20; $i++) {
                                                    if (@$data['outside'][$key]->qty == '' || @$data['outside'][$key]->qty == NULL) {
                                                        $select = '';
                                                    } else {
                                                        // {{old('outside[$key][qty]', (array_key_exists($key, $data['outside']) ? $data['outside'][$key]->qty : "")== $i? 'selected' : '')}}
                                                        $select = old('outside[$key][qty]', (array_key_exists($key, $data['outside']) ? $data['outside'][$key]->qty : '') == $i ? 'selected' : '');
                                                    }
                                                ?>
                                            <option value="<?php echo $i; ?>" <?php echo $select; ?>>
                                                <?php echo $i; ?></option>
                                            <?php

                                                }
                                                ?>
                                        </select>
                                    </div>
                                </td>




                                <td data-title="Product" class="border1px">
                                    <div class="input-field col s12">
                                        <input id="product-{{ $key }}" type="text" value='{{ old("outside[$key][product]", array_key_exists($key, $data['outside']) ? $data['outside'][$key]->product : '') }}' name="outside[<?php echo $key; ?>][product]" class="validate clickget os_<?php echo $key; ?>">
                                    </div>
                                </td>


                                <td data-title="Colour Name" class="border1px">
                                    <div class="input-field col s12">
                                        <input id="color-name-{{ $key }}" name="outside[<?php echo $key; ?>][color]" value='{{ old("outside[$key][color]", array_key_exists($key, $data['outside']) ? $data['outside'][$key]->color : '') }}' type="text" class=" clickget os_<?php echo $key; ?> validate">
                                    </div>
                                </td>



                                <td data-title="sheen" class="border1px">

                                    <div class="input-field col s12">
                                        <input id="sheen" name="outside[<?php echo $key; ?>][sheen]" value='{{ old("outside[$key][product]", array_key_exists($key, $data['outside']) ? $data['outside'][$key]->sheen_level : '') }}' type="text" class=" clickget os_<?php echo $key; ?> ">
                                    </div>
                                </td>

                                <td data-title="Brand">
                                    <div class="">
                                        <select name="outside[<?php echo $key; ?>][brand_id]" data-key="<?php echo $key; ?>" class=" form-control s_h clickget brand-cst">
                                            <option value="" selected>Select</option>
                                            <?php foreach ($brands as $bkey => $bvalue) {
                                                ?>
                                            <option value="<?php echo $bvalue->id; ?>" {{ old('outside[$key][brand_id]', (array_key_exists($key, $data['outside']) ? $data['outside'][$key]->brand_id : $painterjob->brand_id) == $bvalue->id ? 'selected' : '') }}>
                                                <?php echo $bvalue->name; ?></option>';
                                            <?php  } ?>
                                        </select>
                                    </div>
                                </td>


                                <td data-title="Note" class="border1px">
                                    <div class="input-field col s12">
                                        <input id="Note" name="outside[<?php echo $key; ?>][note]" value='{{ old("outside[$key][product]", array_key_exists($key, $data['outside']) ? $data['outside'][$key]->note : '') }}' type="text" class=" clickget os_<?php echo $key; ?> ">
                                    </div>
                                </td>

                                <td data-title="Area" class="border1px">
                                    <div class="input-field col s12">

                                        {{ $value }}
                                        <input id="area-{{ $key }}" type="hidden" value="{{ $value }}" name="outside[{{ $key }}][area]" class="validate clickget os_{{ $key }}">
                                    </div>
                                </td>

                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label class="col-sm-12 control-label">
                    <h2>Inside Paint & Undercoat:</h2>
                </label>
                <div class="col-sm-12">
                    <div id="inside" class="no-more-tables mt-50 pull-left visible-lg table-responsive" style="width: 100%;">
                        <table class="col-md-12 table-bordered  table-condensed cf">
                            <thead class="cf">
                                <tr>
                                    <th>Size</th>
                                    <th>Amount</th>
                                    <th>Product</th>
                                    <th>Colour Name</th>
                                    <th>Sheen Level</th>
                                    <th>Brand</th>
                                    <th>Notes</th>
                                    <th>Area</th>
                                </tr>
                            </thead>
                            <tbody>



                                <?php
                                //  $inside = [];
                                foreach ($inside as $key => $value) :  ?>
                                <tr>


                                    {{-- size colume --}}

                                    <td data-title="Size">
                                        <div class="">
                                            <select name="inside[<?php echo $key; ?>][size]" data-key="<?php echo $key . '_1'; ?>" class="clickget form-control s_h ">
                                                <!-- <option value="" selected>Select</option> -->
                                                <option value="100" {{ old('inside[$key][size]', (array_key_exists($key, $data['inside']) ? $data['inside'][$key]->size : '') == 100 ? 'selected' : '') }}>
                                                    select</option>
                                                <option value="101" {{ old('inside[$key][size]', (array_key_exists($key, $data['inside']) ? $data['inside'][$key]->size : '') == 101 ? 'selected' : '') }}>
                                                    None</option>
                                                <option value="102" {{ old('inside[$key][size]', (array_key_exists($key, $data['inside']) ? $data['inside'][$key]->size : '') == 102 ? 'selected' : '') }}>
                                                    Call me</option>
                                                <option value="15" {{ old('inside[$key][size]', (array_key_exists($key, $data['inside']) ? $data['inside'][$key]->size : '') == 15 ? 'selected' : '') }}>
                                                    15 L</option>
                                                <option value="10" {{ old('inside[$key][size]', (array_key_exists($key, $data['inside']) ? $data['inside'][$key]->size : '') == 10 ? 'selected' : '') }}>
                                                    10 L</option>
                                                <option value="4" {{ old('inside[$key][size]', (array_key_exists($key, $data['inside']) ? $data['inside'][$key]->size : '') == 4 ? 'selected' : '') }}>
                                                    4 L</option>
                                                <option value="2" {{ old('inside[$key][size]', (array_key_exists($key, $data['inside']) ? $data['inside'][$key]->size : '') == 2 ? 'selected' : '') }}>
                                                    2 L</option>
                                                <option value="1" {{ old('inside[$key][size]', (array_key_exists($key, $data['inside']) ? $data['inside'][$key]->size : '') == 1 ? 'selected' : '') }}>
                                                    1 L</option>
                                            </select>
                                        </div>
                                    </td>

                                    {{-- Amount colume --}}

                                    <td data-title="Amount">
                                        <div class="">
                                            <select name="inside[<?php echo $key; ?>][qty]" data-key="<?php echo $key . '_1'; ?>" class="clickget form-control s_h  ">
                                                <?php
                                                    echo '<option value="" selected >Select</option>';
                                                    for ($i = 0; $i <= 20; $i++) {

                                                        if (@$data['inside'][$key]->qty == '' || @$data['inside'][$key]->qty == NULL) {
                                                            $select = '';
                                                        } else {
                                                            // {{old('inside[$key][qty]', (array_key_exists($key, $data['inside']) ? $data['inside'][$key]->qty : "")== $i? 'selected' : '')}}
                                                            $select = old('inside[$key][qty]', (array_key_exists($key, $data['inside']) ? $data['inside'][$key]->qty : '') == $i ? 'selected' : '');
                                                        }
                                                    ?>
                                                <option value="<?php echo $i; ?>" <?php echo $select; ?>>
                                                    <?php echo $i; ?></option>
                                                <?php
                                                    }
                                                    ?>
                                            </select>
                                        </div>
                                    </td>

                                    {{-- product name --}}
                                    <td data-title="Product" class="border1px">
                                        <div class="input-field col s12">
                                            <input id="product-{{ $key }}" type="text" value='{{ old("inside[$key][product]", array_key_exists($key, $data['inside']) ? $data['inside'][$key]->product : '') }}' name="inside[<?php echo $key; ?>][product]" class="validate clickget os_<?php echo $key; ?>">
                                        </div>
                                    </td>

                                    {{-- color name --}}
                                    <td data-title="Colour Name" class="border1px">
                                        <div class="input-field col s12">
                                            <input id="color-name-{{ $key }}" name="inside[<?php echo $key; ?>][color]" value='{{ old("inside[$key][color]", array_key_exists($key, $data['inside']) ? $data['inside'][$key]->color : '') }}' type="text" class=" clickget os_<?php echo $key; ?> validate">
                                        </div>
                                    </td>

                                    {{-- sheen level --}}

                                    <td data-title="Colour Name" class="border1px">
                                        <div class="input-field col s12">
                                            <input id="color-name-{{ $key }}" name="inside[<?php echo $key; ?>][color]" value='{{ old("inside[$key][color]", array_key_exists($key, $data['inside']) ? $data['inside'][$key]->color : '') }}' type="text" class=" clickget os_<?php echo $key; ?> validate">
                                        </div>
                                    </td>

                                    {{-- band name --}}

                                    <td data-title="Brand">
                                        <div class="">
                                            <select name="inside[<?php echo $key; ?>][brand_id]" data-key="<?php echo $key; ?>" class=" form-control s_h clickget brand-cst">
                                                <option value="" selected>Select</option>
                                                <?php foreach ($brands as $bkey => $bvalue) {
                                                    ?>
                                                <option value="<?php echo $bvalue->id; ?>" {{ old('inside[$key][brand_id]', (array_key_exists($key, $data['inside']) ? $data['inside'][$key]->brand_id : $painterjob->brand_id) == $bvalue->id ? 'selected' : '') }}>
                                                    <?php echo $bvalue->name; ?></option>';
                                                <?php  } ?>
                                            </select>
                                        </div>
                                    </td>

                                    {{-- notes name  --}}
                                    <td data-title="Note" class="border1px">
                                        <div class="input-field col s12">
                                            <input id="Note" name="inside[<?php echo $key; ?>][note]" value='{{ old("inside[$key][note]", array_key_exists($key, $data['inside']) ? $data['inside'][$key]->note : '') }}' type="text" class=" clickget os_<?php echo $key; ?> ">
                                        </div>
                                    </td>

                                    {{-- Area name  --}}
                                    <td data-title="Area" class="border1px">
                                        <div class="input-field col s12">
                                            {{ $value }}
                                            <input id="area-{{ $key }}" type="hidden" value='<?php echo $value; ?>' name="inside[<?php echo $key; ?>][area]" class="validate clickget os_<?php echo $key; ?>">
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class=" mt-50">
                    <p class="">Please select a order</p>
                    <select name="order_id" id="order_id" required class="form-control">
                        @foreach ($order as $user)
<option value="{{ $user->id }}" {{ $user->id == old($user->id, $painterjob->order_id) ? 'selected' : '' }}>{{ $user->address }}</option>
@endforeach
                    </select>
                </div> -->
        <div class="row">
            <div class="form-group">
                <div class="col-sm-12  text-center "><br>
                    <button type="submit" class=" btn btn-primary">
                        {{ $painterjob->id ? 'Update Job' : 'Create Job' }}</button>
                </div>
            </div>
        </div>

        {{-- </form> --}}
    </div>
</div>
</div>
</div>
<script>
    function formatPrice() {
        var input = document.getElementById('priceInput');
        var value = parseFloat(input.value);
        if (!isNaN(value)) {
            input.value = value.toFixed(2);
        }
    }

</script>
<script>
    $(document).ready(function() {
        var a = $(location).attr('href');
        var part = a.substring(a.lastIndexOf('/') + 1);
        if (part == 'create') {
            setBuilderAccount();
            $('#user_id').change(function() {
                setBuilderAccount();
            });

            function setBuilderAccount() {
                var selected_user = $('select#user_id option:selected').val();
                if (!selected_user) {
                    selected_user = $('select#user_id').val();
                }
                $('select#builder_id > option').each(function() {
                    $(this).removeClass('active');
                    if ($(this).hasClass(selected_user)) {
                        $(this).addClass('active');
                    }
                });
                if ($('select#builder_id .active').length) {
                    $('select#builder_id .no_account').removeClass('show');
                    $('select#builder_id').find('.active:first').prop('selected', true);
                } else {
                    $('select#builder_id .no_account').addClass('show');
                    $('select#builder_id').find('.no_account').prop('selected', true);
                }
            }
        } else {
            var selected_user = $('select#user_id option:selected').val();
            $('select#builder_id > option').each(function() {
                var attr = $(this).attr('data-id');
                var val = $(this).val();
                $(this).removeClass('active');
                if ($(this).hasClass(selected_user)) {
                    $(this).addClass('active');
                }
            });
            if ($('select#builder_id .active').length) {
                $('select#builder_id .no_account').removeClass('show');
                // $('select#builder_id').find('.active:first').prop('selected', true);
            } else {
                $('select#builder_id .no_account').addClass('show');
                $('select#builder_id').find('.no_account').prop('selected', true);
            }

            $('#user_id').on('change', function() {
                var selected_user = $('select#user_id option:selected').val();
                if (!selected_user) {
                    selected_user = $('select#user_id').val();
                }
                $('select#builder_id > option').each(function() {
                    $(this).removeClass('active');
                    if ($(this).hasClass(selected_user)) {
                        $(this).addClass('active');
                    }
                });
                if ($('select#builder_id .active').length) {
                    $('select#builder_id .no_account').removeClass('show');
                    $('select#builder_id').find('.active:first').prop('selected', true);
                } else {
                    $('select#builder_id .no_account').addClass('show');
                    $('select#builder_id').find('.no_account').prop('selected', true);
                }
            });
        }
    });

</script>

<?php
require public_path() . '/admin/footer.blade.php';
?>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCb7MpXPNGT9y6LKzg_bi8R1Q_hwmLKMgk&libraries=places&callback=initialize" async defer></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script>
    // Default selection for section 1


    // Default selection for section 2
    window.onload = function() {
        showAssingPainter(1);
        showCard(1);
    };



    function showCard(cardNumber) {
        var cards = document.querySelectorAll('#section1 .po-wrap');
        for (var i = 0; i < cards.length; i++) {
            cards[i].style.display = 'none';
        }
        document.querySelector('#section1 #card' + cardNumber).style.display = 'block';
        updateNavigation('section1', cardNumber);
    }

    function showAssingPainter(cardNumber) {
        var cards = document.querySelectorAll('#section2 .po-wrap');
        for (var i = 0; i < cards.length; i++) {
            cards[i].style.display = 'none';
        }
        document.querySelector('#section2 #card' + cardNumber).style.display = 'block';
        updateNavigation('section2', cardNumber);
    }

    function updateNavigation(section, cardNumber) {
        var buttons = document.querySelectorAll('#' + section + ' .button-navigation button');
        for (var i = 0; i < buttons.length; i++) {
            buttons[i].classList.remove('active');
        }
        document.querySelector('#' + section + ' .button-navigation button:nth-child(' + (cardNumber) + ')').classList
            .add('active');
    }



    document.addEventListener('DOMContentLoaded', function() {

        var builderCompanySelect = document.getElementById('builder_company');

        builderCompanySelect.addEventListener('change', function() {

            var selectedCompanyId = this.value;
            var assignCompanySelect = document.getElementById('assign_company_id');
            for (var i = 0; i < assignCompanySelect.options.length; i++) {
                if (assignCompanySelect.options[i].value === selectedCompanyId) {
                    assignCompanySelect.selectedIndex = i;
                    break;
                }
            }
        });
    });

</script>


<script>
    $(document).ready(function() {
        // Function to populate supervisors based on selected company for main painters
        function populateSupervisorsForMainPainter(company_id) {
            $('#supervisor option').hide();
            if (company_id !== '') {
                $('.empty_supervisor').show();
                $('.supervisor_' + company_id).show();
            } else {
                $('.empty_supervisor').hide();
            }
        }

        // Handle change event for main painter's company selection
        $('#builder_company').on('change', function(e) {
            var company_id = $(this).val();
            var selectedOption = $(this).find('option:selected');
            var dataBrandValue = selectedOption.data('brand');
            $('#brand_id').val(dataBrandValue).change();

            // Call function to populate supervisors for main painters
            populateSupervisorsForMainPainter(company_id);
        });

        // Function to populate supervisors based on selected company for assigned painters
        function populateSupervisorsForAssignPainter(company_id) {
            $('#assigned_supervisor option').hide();
            if (company_id !== '') {
                $('.empty_supervisor2').show();
                $('.supervisor_2' + company_id).show();
            } else {
                $('.empty_supervisor2').hide();
            }
        }

        // Handle change event for assigned painter's company selection
        $('#assign_company_id').on('change', function(e) {
            var company_id = $(this).val();
            var selectedOption = $(this).find('option:selected');
            var dataBrandValue = selectedOption.data('brand2');

            // Call function to populate supervisors for assigned painters
            populateSupervisorsForAssignPainter(company_id);
        });

        // Additional code for initializing supervisor options based on company selection for assigned painter
        $('#assign_builder_company').change(function() {
            var builder_id = $(this).val();
            if (builder_id === '') {
                $('#assign_supervisor').val(builder_id);
                $('#assign_supervisor option').hide();
            } else {
                $('#assign_supervisor option').hide();
                $('.empty_supervisor2').show().prop('selected', true);
                $('.supervisor_2' + builder_id).show();
            }
        });
    });

    $(document).ready(function() {
        // Function to populate supervisors based on selected company for assigned painters
        function populateSupervisorsForAssignPainter(company_id) {
            $('#assigned_supervisor option').hide();
            if (company_id !== '') {
                $('.empty_supervisor2').show();
                $('.supervisor_' + company_id).show();
            } else {
                $('.empty_supervisor2').hide();
            }
        }

        // Handle change event for assigned painter's company selection
        $('#assign_company_id').on('change', function(e) {
            var company_id = $(this).val();

            // Call function to populate supervisors for assigned painters
            populateSupervisorsForAssignPainter(company_id);
        });

        // Additional code for initializing supervisor options based on company selection for assigned painter
        $('#assign_builder_company').change(function() {
            var builder_id = $(this).val();
            if (builder_id === '') {
                $('#assign_supervisor').val(builder_id);
                $('#assign_supervisor option').hide();
            } else {
                $('#assign_supervisor option').hide();
                $('.empty_supervisor2').show().prop('selected', true);
                $('.supervisor_2' + builder_id).show();
            }
        });
    });

</script>






<script>
    $(document).ready(function() {
        $('.brand').on('change', function(e) {
            var val = $(this).val();
            $('.brand-cst').val(val);
        });

        $('#builder_company').on('change', function(e) {
            var val = $(this).val();
            var selectedOption = $(this).find('option:selected');
            var dataBrandValue = selectedOption.data('brand');
            $('#brand_id').val(dataBrandValue).change();
        });

        $('#assign_builder_company').on('change', function(e) {
            var val = $(this).val();
            var selectedOption = $(this).find('option:selected');
            var dataBrandValue = selectedOption.data('brand');
        });

        function initialize() {
            var input = document.getElementById('searchTextField');
            var autocomplete = new google.maps.places.Autocomplete(input);
            google.maps.event.addListener(autocomplete, 'place_changed', function() {
                var place = autocomplete.getPlace();
                document.getElementById('Lat').value = place.geometry.location.lat();
                document.getElementById('Lng').value = place.geometry.location.lng();
            });
        }
        google.maps.event.addDomListener(window, 'load', initialize);

        $('#assign_supervisor option').hide();
        var selectedOptionValue = $('#assign_builder_company').val();
        if (selectedOptionValue != '') {
            $('.empty_supervisor2').show();
            $('.supervisor_2' + selectedOptionValue).show();
        }

        $('#supervisor option').hide();
        var selectedOptionValue = $('#builder_company').val();
        if (selectedOptionValue != '') {
            $('.empty_supervisor').show();
            $('.supervisor_' + selectedOptionValue).show();
        }

        $('#assign_builder_company').change(function() {
            var builder_id = $(this).val();
            if (builder_id === '') {
                $('#assign_supervisor').val(builder_id);
                $('#assign_supervisor option').hide();
            } else {
                $('#assign_supervisor option').hide();
                $('.empty_supervisor2').show().prop('selected', true);
                $('.supervisor_2' + builder_id).show();
            }
        });

        $('#builder_company').change(function() {
            var builder_id = $(this).val();
            if (builder_id === '') {
                $('#supervisor').val(builder_id);
                $('#supervisor option').hide();
            } else {
                $('#supervisor option').hide();
                $('.empty_supervisor').show().prop('selected', true);
                $('.supervisor_' + builder_id).show();
            }
        });
    });

</script>
