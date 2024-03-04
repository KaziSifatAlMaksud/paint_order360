<?php
require  public_path() . '/admin/header.blade.php';
?>
<div class="page-header">
    <h1 class="page-title">
        Edit Builder
    </h1>
    <br />

    <div class="row">
        <div class="col-sm-9">

            <div class="row">
                <form id="add_builder" action="javascript:void(0)">
                    @csrf
                             <!-- Icon Image Upload Field -->
                   <div class="form-group row"> <!-- Added row class for proper alignment with Bootstrap if you're using it -->
                        <label for="img_log" class="col-sm-3 col-form-label">Icon Image</label> <!-- Added 'for' attribute and updated class to 'col-form-label' -->
                        <div class="col-sm-9">
                            <input type="file" class="form-control" value="{{old('img_log',$builders->img_log)}}" name="img_log" id="img_log">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Company Name </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="company_name" value="{{old('company_name',$builders->company_name)}}" placeholder="Company Name" required>
                        </div>
                    </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Builder Name </label>
                   
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="builder_name" value="{{old('builder_name',$builders->builder_name)}}" placeholder="Builder Name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Builder Email: </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="builder_email" value="{{old('builder_email',$builders->builder_email)}}" placeholder="Builder email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Painter/Builder Account: </label>




                        <div class="col-sm-9">
                            <select class="form-control" name="brand_id" required>
                                @foreach ($brands as $brand)

                                <option {{old('brand_id',$builders->brand_id) ==$brand->id ? "selected" : '' }} value={{$brand->id}}>{{$brand->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Builder Phone Number: </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="phone_number" value="{{old('phone_number',$builders->phone_number)}}" placeholder="Phone Number" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Builder Address: </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="address" value="{{old('address',$builders->address)}}" placeholder="Address" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Abn: </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="abn" value="{{old('abn',$builders->abn)}}" placeholder="Abn" required>
                        </div>
                    </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Gate Code: </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="gate" value="{{old('gate',$builders->gate)}}" placeholder="Gate Code" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="schedule" class="col-sm-3 control-label">Payment Schedule:</label>
                        @if ($errors->has('schedule'))
                        <p class="error">{{ $errors->first('schedule') }}</p>
                        @endif
                        <div class="col-sm-9">
                            <select class="form-control" id="schedule" name="schedule">
                                <option value="5" @if(old('schedule', $builders->schedule) == '5') selected @endif>5 days</option>
                                <option value="7" @if(old('schedule', $builders->schedule) == '7') selected @endif>1 week</option>
                                <option value="14" @if(old('schedule', $builders->schedule) == '14') selected @endif>2 weeks</option>
                                <option value="21" @if(old('schedule', $builders->schedule) == '21') selected @endif>3 weeks</option>
                                <option value="30" @if(old('schedule', $builders->schedule) == '30') selected @endif>1 Month</option>
                                <!-- Add more options as needed -->
                            </select>
                        </div>
                    </div>



                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3 text-center "><br>
                            <button type="submit" class="builder-update-button btn btn-primary" data-builder-id="{{$builders->id}}">Update</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<?php
require  public_path() . '/admin/footer.blade.php';
?>
 <script>
    $(document).on('click', '.builder-update-button', function(e) {
        var id = $(this).data("builder-id");
        var url = "{{route('admins.admin_builder.update',['admin_builder' =>'_id_'])}}";
        url = url.replace('_id_', id);
        var form = $("#add_builder");
        $.ajax(url, {
            type: 'PUT', // http method 
            data: form.serialize(), // http method 
            success: function(data, status, xhr) {
                location.href = "{{route('admins.admin_builder.index')}}"
            },
            error: function(jqXhr, textStatus, errorMessage) {
                // $('p').append('Error' + errorMessage);
            }
        });
    });
</script>
