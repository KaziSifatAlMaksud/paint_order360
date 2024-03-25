<?php
require public_path() . '/admin/header.blade.php';
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
            <form method="post" id="add_shop" action="{{ $painterjob->id ? route('admins.painterJob.update', ['painterJob' => $painterjob->id]) : route('admins.painterJob.store') }}" enctype="multipart/form-data">
                @csrf
                {{-- /*Update Button*/ --}}
                <div class="row">
                    <div class="form-group justify-content-end">
                        <div class="col-sm-12  text-right">
                            <button type="submit" class=" btn btn-primary">
                                {{ $painterjob->id ? 'Update Job' : 'Create Job' }}</button>
                        </div>
                    </div>
                </div>
                {{-- End Update Button --}}
                @if ($painterjob->id)
                @method('PUT')
                @endif
                <div class="row">
                    <div class="col-sm-6">
                        <center> <b for="Main painter"> Main Painter: </b> </center>
                        <br>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Painter: </label>
                            <div class="col-sm-9">
                                <select name="user_id" id="user_id" required class="form-control painter">
                                    @foreach ($users as $user)
                                    <option class="painter-val" value="{{ $user->id }}" {{ $user->id == old('user_id', $painterjob->user_id) ? 'selected' : '' }}>
                                        {{ $user->first_name . ' ' . $user->last_name }} -
                                        ({{ $user->company_name }})
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-3 control-label"> Company Name </label>

                            <div class="col-sm-9">
                                <select name="company_id" id="builder_company" class="form-control brand">
                                    <option value="" selected>Select</option>
                                    @foreach ($admin_buliders as $admin_bulider)
                                    <option data-brand="{{ $admin_bulider->brand ? $admin_bulider->brand->id : '0' }}" value="{{ $admin_bulider->id }}" {{ $admin_bulider->id == old('id', $painterjob->company_id) ? 'selected' : '' }}>
                                        {{ $admin_bulider->company_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- <div class="form-group">
                    <label class="col-sm-3 control-label">Company Name</label>

                    <div class="col-sm-9">
                        <select name="company_id" id="main_painter_company" class="form-control brand">
                            <option value="" selected>Select</option>
                            @foreach ($admin_buliders as $admin_bulider)
                            <option data-brand="{{ $admin_bulider->brand ? $admin_bulider->brand->id : '0' }}" value="{{ $admin_bulider->id }}" {{ $admin_bulider->id == old('id', $painterjob->company_id) ? 'selected' : '' }}>
                        {{ $admin_bulider->company_name }}</option>
                        @endforeach

                        </select>
                    </div>
                </div> --}}


                <div class="form-group">
                    <label class="col-sm-3 control-label">Supervisor </label>
                    <div class="col-sm-9">
                        <select name="supervisor_id" id="supervisor" class="form-control ">
                            <option class="empty_supervisor" value="" selected>Select</option>
                            @foreach ($supervisors as $supervisor)
                            <option value="{{ $supervisor->id }}" class="all_supervisors supervisor_{{ $supervisor->builder_id }}" {{ $supervisor->id == old('supervisor_id', $painterjob->supervisor_id) ? 'selected' : '' }}>
                                {{ $supervisor->name }}</option>
                            @endforeach
                        </select>
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
                {{-- main Painter Job Price --}}
                <div class="form-group">
                    <label class="col-sm-3 control-label">Job Price Ex Gst:
                        {{-- inc gst --}}
                    </label>
                    <div class="col-sm-9">
                        <input name="price" value="{{ old('price') ?? ($painterjob ? $painterjob->price : '') }}" min="1" max="50000000000000" type="number" step="0.01" class="form-control form-control-lg">

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">House Size</label>
                    <div class="col-sm-9">
                        <input name='house_size' class="form-control form-control-lg" id="house_size" type="text" value="{{ old('house_size', $painterjob->house_size) }}">
                    </div>
                </div>

                {{-- <div class="form-group">
                            <label class="col-sm-3 control-label">Price For Total job:</label>
                            <div class="col-sm-9">
                                <input type="number" min="1" max="50000000000000" name='price' class="form-control form-control-lg" value="{{ old('price',$painterjob->price)}}">
        </div>
    </div> --}}




    {{-- <div class="form-group">
                            <label class="col-sm-3 control-label">Received Date: </label>
                            <div class="col-sm-9">
                                <input name="received_date" value="{{ old('received_date',  $painterjob->received_date )}}" type="date" id="received_date" class="form-control">
</div>
</div> --}}



<div class="form-group">
    <label class="col-sm-3 control-label">Job Discription: </label>
    <div class="col-sm-9">
        <input name="builder_company_name" value="{{ old('builder_company_name', $painterjob->builder_company_name ? $painterjob->builder_company_name : '') }}" type="text" class="form-control">

    </div>
</div>



<div class="form-group">
    <label class="col-sm-3 control-label">Start Date: </label>
    <div class="col-sm-9">
        <input name="start_date" value="{{ old('start_date', $painterjob->start_date) }}" type="date" id="start_date" class="form-control">
    </div>
</div>


<div class="form-group">
    <label class="col-sm-3 control-label">Job Address: </label>
    <div class="col-sm-9">
        <textarea class="form-control" id="searchTextField" name="address" id="address" rows="1">{{ old('address', $painterjob->address) }}</textarea>
        <input type="hidden" name="latitude" id="Lat" value="">
        <input type="hidden" name="longitude" id="Lng" value="">
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label">My job notes( only you will see ):</label>

    <div class="col-sm-9">
        <input name="assign_job_description" type="text" class="form-control" value="{{ old('assign_job_description') ?? ($assign_painter ? $assign_painter->assign_job_description : '') }}">
    </div>
</div>


{{-- <div class="form-group">
                            <label class="col-sm-3 control-label">Stairs stained:</label>
                            <div class="col-sm-9">
                                <div class="form-check col-sm-6">
                                    <input {{old("stairs_stained", $painterjob->stairs_stained) ==1 ? 'checked': '' }} class="form-check-input" type="radio" name="stairs_stained" value=1 id="flexRadioDefault1">
<label class="form-check-label" for="flexRadioDefault1">
    Yes
</label>
</div>
<div class="form-check col-sm-6">
    <input {{old("stairs_stained", $painterjob->stairs_stained) ==0? 'checked': '' }} class="form-check-input" type="radio" name="stairs_stained" value=0 id="flexRadioDefault2">
    <label class="form-check-label" for="flexRadioDefault2">
        No
    </label>
</div>
</div>
</div> --}}
{{--
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Cladding:</label>
                                <div class="col-sm-9">
                                    <div class="form-check col-sm-6">
                                        <input {{old("cladding", $painterjob->cladding) ==1 ? 'checked': '' }} class="form-check-input" type="radio" name="cladding" value=1 id="cladding1">
<label class="form-check-label" for="cladding1">
    Yes
</label>
</div>
<div class="form-check col-sm-6">
    <input {{old("cladding", $painterjob->cladding) ==0? 'checked': '' }} class="form-check-input" type="radio" name="cladding" value=0 id="cladding2">
    <label class="form-check-label" for="cladding2">
        No
    </label>
</div>
</div>
</div> --}}

{{--
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Render:</label>
                                <div class="col-sm-9">
                                    <div class="form-check col-sm-6">
                                        <input {{old("render", $painterjob->render) ==1 ? 'checked': '' }} class="form-check-input" type="radio" name="render" value=1 id="render1">
<label class="form-check-label" for="render1">
    Yes
</label>
</div>
<div class="form-check col-sm-6">
    <input {{old("render", $painterjob->render) ==0? 'checked': '' }} class="form-check-input" type="radio" name="render" value=0 id="render2">
    <label class="form-check-label" for="render2">
        No
    </label>
</div>
</div>
</div> --}}


<div id="section1">
    @for ($i = 1; $i <= 4; $i++) <div class="container mt-3 po-wrap col-sm-12" id="card{{ $i }}" style="display: none; border: 2px solid #ff8e0a;">
        {{-- <div class="po-wrap col-sm-12"> --}}

        <div class="form-group">
            <label class="col-sm-3 control-label">PO Number {{ $i }}: </label>

            <div class="col-sm-9">
                <input name="po_item[{{ $i }}][ponumber]" value="{{ old('po_item[$i][ponumber]', count($painterjob->poItems) > 0 ? $painterjob->poItems->values()[$i - 1]->ponumber : '') }}" type="text" class="form-control">

            </div>

        </div>


        <div class="form-group">
            <label class="col-sm-3 control-label">Job description {{ $i }}:
            </label>
            <div class="col-sm-9">
                <input name="po_item[{{ $i }}][description]" value="{{ old('po_item[$i][description]', count($painterjob->poItems) > 0 ? $painterjob->poItems->values()[$i - 1]->description : '') }}" type="text" class="form-control">

            </div>
        </div>




        <div class="form-group">
            <label class="col-sm-3 control-label">Long description {{ $i }}:
            </label>
            <div class="col-sm-9">
                <input name="po_item[{{ $i }}][job_details]" value="{{ old('po_item[$i][job_details]', count($painterjob->poItems) > 0 ? $painterjob->poItems->values()[$i - 1]->job_details : '') }}" type="text" class="form-control">
            </div>
        </div>



        <div class="form-group">
            <label class="col-sm-3 control-label">P.O upload {{ $i }}:</label>
            <div class="col-sm-9">
                <input name="po_item[{{ $i }}][file]" class="form-control form-control-lg" id="po" type="file">
                @if (count($painterjob->poItems) > 0 && $painterjob->poItems->values()[$i - 1]->file)
                <a href="{{ asset('/uploads/' . $painterjob->poItems->values()[$i - 1]->file) }}" download>
                    <i class="fa-solid fa-file"></i>
                </a>
                @endif
            </div>
        </div>


        <div class="form-group">
            <label class="col-sm-3 control-label">Price {{ $i }}:
                {{-- inc gst --}}
            </label>
            <div class="col-sm-9">
                <input name="po_item[{{ $i }}][price]" value="{{ old('po_item[' . $i . '][price]', count($painterjob->poItems) > 0 ? $painterjob->poItems->values()[$i - 1]->price : '') }}" min="1" max="50000000000000" type="number" step="0.01" class="form-control form-control-lg" onblur="formatPrice()">

            </div>
        </div>


</div>
@endfor

<center>
    <div class="button-navigation btn-group" role="group" aria-label="Card navigation">
        <button type="button" class="btn btn-secondary active" onclick="showCard(1)">1</button>
        <button type="button" class="btn btn-secondary" onclick="showCard(2)">2</button>
        <button type="button" class="btn btn-secondary" onclick="showCard(3)">3</button>
        <button type="button" class="btn btn-secondary" onclick="showCard(4)">4</button>
    </div>
</center>

</div>
</div>


<div class="col-sm-6">
    <center> <b for="Main painter"> Assinged Painter: </b> </center>
    <br>
    <div class="form-group">
        <label class="col-sm-3 control-label">Assigned Painter:</label>
        <div class="col-sm-9">
            <select name="assigned_painter_name" id="assign_painter" class="form-control painter">
                @if ($users->isEmpty())
                <option value="" selected disabled>Select to assign Painter</option>
                @else
                <option value="">Select to assign Painter</option>
                @foreach ($users as $user)
                <option class="painter-val" value="{{ $user->id }}" {{ $assign_painter !== null && $user->id == old('assigned_painter_name', $assign_painter->assigned_painter_name) ? 'selected' : '' }}>
                    {{ $user->first_name . ' ' . $user->last_name }} - ({{ $user->company_name }})
                </option>
                @endforeach
                @endif
            </select>
        </div>
    </div>


    <div class="form-group">
        <label class="col-sm-3 control-label">A. Company Name</label>
        <div class="col-sm-9">
            <select name="assign_company_id" id="assign_company_id" class="form-control brand2">
                <option value="" selected>Select</option>
                @foreach ($admin_buliders as $admin_bulider)
                <option data-brand2="{{ $admin_bulider->brand ? $admin_bulider->brand->id : '0' }}" value="{{ $admin_bulider->id }}" {{ $assign_painter !== null && $admin_bulider->id == old('assign_company_id', $assign_painter->assign_company_id) ? 'selected' : '' }}>
                    {{ $admin_bulider->company_name }}
                </option>
                @endforeach
            </select>
        </div>
    </div>


    {{--
    <div class="form-group">
        <label class="col-sm-3 control-label">A. Supervisor:</label>
        <div class="col-sm-9">
            <select name="assigned_supervisor" id="assigned_supervisor" class="form-control">
                <option class="empty_supervisor2" value="" selected>Select</option>
                @foreach ($supervisors as $supervisor)
                <option value="{{ $supervisor->id }}" class="all_supervisors supervisor_{{ $supervisor->builder_id }}" {{ $assign_painter !== null && $supervisor->id == old('assigned_supervisor', $assign_painter->assign_company_id) ? 'selected' : '' }}>
    {{ $supervisor->name }}
    </option>
    @endforeach
    </select>
</div>
</div> --}}





{{-- Assign Painter Job Price --}}
<div class="form-group">
    <label class="col-sm-3 control-label">Price for Job Ex Gst:
        {{-- inc gst --}}
    </label>
    <div class="col-sm-9">
        <input name="assign_price_job" value="{{ old('assign_job_description') ?? ($assign_painter ? $assign_painter->assign_price_job : '') }}" min="1" max="50000000000000" type="number" step="0.01" class="form-control form-control-lg" onblur="formatPrice()">

    </div>
</div>



{{-- Here is the question will be there..  --}}

{{-- <div class="form-group">
                            <label class="col-sm-12 control-label">Does the Painter Buy the Paint?</label>
                            <div class="col-sm-12">
                                <div class="form-check col-sm-6">
                                    <input {{old("stairs_stained", $painterjob->stairs_stained) ==1 ? 'checked': '' }} class="form-check-input" type="radio" name="stairs_stained" value=1 id="flexRadioDefault1">
<label class="form-check-label" for="flexRadioDefault1">
    Yes
</label>
</div>
<div class="form-check col-sm-6">
    <input {{old("stairs_stained", $painterjob->stairs_stained) ==0? 'checked': '' }} class="form-check-input" type="radio" name="stairs_stained" value=0 id="flexRadioDefault2">
    <label class="form-check-label" for="flexRadioDefault2">
        No
    </label>
</div>
</div>
</div>

<div class="form-group">
    <label class="col-sm-12 control-label">Does the Painter orders the paint or me ?</label>
    <div class="col-sm-12">
        <div class="form-check col-sm-6">
            <input {{old("stairs_stained", $painterjob->stairs_stained) ==1 ? 'checked': '' }} class="form-check-input" type="radio" name="stairs_stained" value=1 id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">
                Yes
            </label>
        </div>
        <div class="form-check col-sm-6">
            <input {{old("stairs_stained", $painterjob->stairs_stained) ==0? 'checked': '' }} class="form-check-input" type="radio" name="stairs_stained" value=0 id="flexRadioDefault2">
            <label class="form-check-label" for="flexRadioDefault2">
                No
            </label>
        </div>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-12 control-label">Is Paint order is sent to me or paint shop ?</label>
    <div class="col-sm-12">
        <div class="form-check col-sm-6">
            <input {{old("stairs_stained", $painterjob->stairs_stained) ==1 ? 'checked': '' }} class="form-check-input" type="radio" name="stairs_stained" value=1 id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">
                Yes
            </label>
        </div>
        <div class="form-check col-sm-6">
            <input {{old("stairs_stained", $painterjob->stairs_stained) ==0? 'checked': '' }} class="form-check-input" type="radio" name="stairs_stained" value=0 id="flexRadioDefault2">
            <label class="form-check-label" for="flexRadioDefault2">
                No
            </label>
        </div>
    </div>
</div> --}}

<div id="section2">
    {{-- End Here is the question will be there..  --}}
    @for ($i = 1; $i <= 4; $i++) <div class="container mt-3 po-wrap col-sm-12 group-2" id="card{{ $i }}" style="display: none; border: 3px solid #ff0aba;">

        <div class="form-group">
            <label class="col-sm-3 control-label">PO {{ $i + 4 }}: </label>

            <div class="col-sm-9">

                <input name="po_item[{{ $i + 4 }}][ponumber]" value="{{ old('po_item[' . ($i + 4) . '][ponumber]', count($painterjob->poItems) > $i + 3 ? $painterjob->poItems->values()[$i + 3]->ponumber : '') }}" type="text" class="form-control">

            </div>

        </div>


        <div class="form-group">
            <label class="col-sm-3 control-label">Description{{ $i + 4 }}: </label>
            <div class="col-sm-9">
                <input name="po_item[{{ $i + 4 }}][description]" value="{{ old('po_item[' . ($i + 4) . '][description]', count($painterjob->poItems) > $i + 3 && isset($painterjob->poItems[$i + 3]) ? $painterjob->poItems->values()[$i + 3]->description : '') }}" type="text" class="form-control">

            </div>
        </div>




        <div class="form-group">
            <label class="col-sm-3 control-label">L.description{{ $i + 4 }}:
            </label>
            <div class="col-sm-9">
                <input name="po_item[{{ $i + 4 }}][job_details]" value="{{ old('po_item[' . ($i + 4) . '][job_details]', count($painterjob->poItems) > $i + 3 && isset($painterjob->poItems[$i + 3]) ? $painterjob->poItems->values()[$i + 3]->job_details : '') }}" type="text" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">P.O upload{{ $i + 4 }}:</label>
            <div class="col-sm-9">
                <input name="po_item[{{ $i + 4 }}][file]" class="form-control form-control-lg" id="po" type="file">
                @if (count($painterjob->poItems) > 0 &&
                isset($painterjob->poItems[$i + 3]) &&
                $painterjob->poItems->values()[$i + 3]->file)
                <a href="{{ asset('/uploads/' . $painterjob->poItems->values()[$i + 3]->file) }}" download>
                    <i class="fa-solid fa-file"></i>
                </a>
                @endif
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Price {{ $i + 4 }}:</label>
            <div class="col-sm-9">
                <input name="po_item[{{ $i + 4 }}][price]" value="{{ old('po_item[' . $i . '][price]', count($painterjob->poItems) > $i + 3 && isset($painterjob->poItems[$i + 3]) ? $painterjob->poItems->values()[$i + 3]->price : '') }}" min="1" max="50000000000000" type="number" step="0.01" class="form-control form-control-lg" onblur="formatPrice()">
            </div>
        </div>



</div>
@endfor

<center>
    <div class="button-navigation btn-group" role="group" aria-label="Card navigation">
        <button type="button" class="btn btn-secondary active group-2-btn" onclick="showAssingPainter(1)">1</button>
        <button type="button" class="btn btn-secondary group-2-btn" onclick="showAssingPainter(2)">2</button>
        <button type="button" class="btn btn-secondary group-2-btn" onclick="showAssingPainter(3)">3</button>
        <button type="button" class="btn btn-secondary group-2-btn" onclick="showAssingPainter(4)">4</button>
    </div>
</center>

</div>
</div>
</div>

{{-- Assign_painter Information  --}}

<br>
<section style="border: 3px solid blue; padding-top:15px;">
    <div class="row">
        <div class="col-md-6">
            {{-- House Plan --}}
            <div class="form-group">
                <label class="col-sm-5 control-label">House Plan:</label>
                <div class="col-sm-7">
                    <input name='plan' class="form-control form-control-lg" id="plan" type="file" value="{{ old('plan') }}">
                    @if ($painterjob->plan)
                    <a href="{{ asset('/uploads/' . $painterjob->plan) }}" download>
                        <i class="fa-solid fa-file"></i>
                    </a>
                    @endif
                </div>
            </div>
            {{-- House Plan 2nd/granny flat --}}
            <div class="form-group">
                <label class="col-sm-5 control-label">House Plan 2nd/granny flat:</label>
                <div class="col-sm-7">
                    <input name='plan_granny' class="form-control form-control-lg" id="plan_granny" type="file" value="{{ old('plan_granny') }}">
                    @if ($painterjob->plan_granny)
                    <a href="{{ asset('/uploads/' . $painterjob->plan_granny) }}" download>
                        <i class="fa-solid fa-file"></i>
                    </a>
                    @endif
                </div>

            </div>
            {{-- color space --}}
            <div class="form-group">
                <label class="col-sm-5 control-label">Color Spec:</label>
                <div class="col-sm-7">
                    <input name='colors_spec' class="form-control form-control-lg" id="colors_spec" type="file">
                    @if ($painterjob->colors_spec)
                    <a href="{{ asset('/uploads/' . $painterjob->colors_spec) }}" download>
                        <i class="fa-solid fa-file"></i>
                    </a>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-sm-5 control-label">Color Spec 2nd/granny flat:</label>
                <div class="col-sm-7">
                    <input name='colors_secound' class="form-control form-control-lg" id="colors_secound" type="file">
                    @if ($painterjob->colors_secound)
                    <a href="{{ asset('/uploads/' . $painterjob->colors_secound) }}" download>
                        <i class="fa-solid fa-file"></i>
                    </a>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-5 control-label">Color Spec Mark up:</label>
                <div class="col-sm-7">
                    <input name='colors' class="form-control form-control-lg" id="colors" type="file">
                    @if ($painterjob->colors)
                    <a href="{{ asset('/uploads/' . $painterjob->colors) }}" download>
                        <i class="fa-solid fa-file"></i>
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>


</section>



<div class="row">
    <label class="col-sm-12 control-label">
        <h2>Outside Paint & Undercoat:</h2>
    </label>
    <div class="col-sm-12">
        <div id="inside" class="no-more-tables mt-50 pull-left visible-lg table-responsive" style="width: 100%;">
            <table class="col-md-12 table-bordered  table-condensed cf">
                <thead class="cf">
                    <tr>
                        <th>Area</th>
                        <th>Product</th>
                        <th>Colour Name</th>
                        <th>Size</th>
                        <th>Amount</th>
                        <th>Brand</th>
                        <th>Notes</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($outside as $key => $value) :
                            ?>
                    <tr>
                        <td data-title="Area" class="border1px">
                            <div class="input-field col s12">
                                @if($value == '')



                                <input id="area-{{ $key }}" type="text" value="{{ $value }}" name="outside[{{ $key }}][]" class="validate clickget os_{{ $key }}">

                                @else
                                {{ $value }}
                                <input id="area-{{ $key }}" type="hidden" value="{{ $value }}" name="outside[{{ $key }}][area]" class="validate clickget os_{{ $key }}">
                                @endif
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
                            <th>Area</th>
                            <th>Product</th>
                            <th>Colour Name</th>
                            <th>Size</th>
                            <th>Amount</th>
                            <th>Brand</th>
                            <th>Notes</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                //  $inside = [];
                                foreach ($inside as $key => $value) :  ?>
                        <tr>
                            <td data-title="Area" class="border1px">
                                <div class="input-field col s12">
                                    {{ $value }}
                                    <input id="area-{{ $key }}" type="hidden" value='<?php echo $value; ?>' name="inside[<?php echo $key; ?>][area]" class="validate clickget os_<?php echo $key; ?>">
                                </div>
                            </td>
                            <td data-title="Product" class="border1px">
                                <div class="input-field col s12">
                                    <input id="product-{{ $key }}" type="text" value='{{ old("inside[$key][product]", array_key_exists($key, $data['inside']) ? $data['inside'][$key]->product : '') }}' name="inside[<?php echo $key; ?>][product]" class="validate clickget os_<?php echo $key; ?>">
                                </div>
                            </td>
                            <td data-title="Colour Name" class="border1px">
                                <div class="input-field col s12">
                                    <input id="color-name-{{ $key }}" name="inside[<?php echo $key; ?>][color]" value='{{ old("inside[$key][color]", array_key_exists($key, $data['inside']) ? $data['inside'][$key]->color : '') }}' type="text" class=" clickget os_<?php echo $key; ?> validate">
                                </div>
                            </td>
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
                            <td data-title="Note" class="border1px">
                                <div class="input-field col s12">
                                    <input id="Note" name="inside[<?php echo $key; ?>][note]" value='{{ old("inside[$key][note]", array_key_exists($key, $data['inside']) ? $data['inside'][$key]->note : '') }}' type="text" class=" clickget os_<?php echo $key; ?> ">
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
</form>
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






{{-- <script>
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

</script> --}}
