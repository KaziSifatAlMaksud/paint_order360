<form id="supervise-edit-form" action="javascript:void(0)">
    @csrf
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Name </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="name" placeholder="Supervisor Name" value="{{$superviser->name}}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Email: </label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" name="email" placeholder="Supervisor Email" value="{{$superviser->email}}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Phone Number: </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="phone" placeholder="Phone Number" value="{{$superviser->phone}}" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12 text-center"><br>
                        <button type="submit" class="btn btn-primary" data-superviser-id="{{$superviser->id}}" id="superviser-edit">Edit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</form>