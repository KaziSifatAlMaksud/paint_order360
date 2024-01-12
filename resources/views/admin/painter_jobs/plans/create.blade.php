<?php
require  public_path() . '/admin/header.blade.php';
?>

<div class="page-header">
    <h1 class="page-title">
        Add/update
    </h1>
    <br />
    <div class="row">
        <div class="col-sm-9">

            <div class="row">
                <form action="{{route($gallaryPlan->id?'admins.plans.update':'admins.plans.store', ['painterJob'=> $painterJob->id, 'gallaryPlan' => $gallaryPlan->id])}}" method="post" id="add_brand" enctype="multipart/form-data">


                    @if($gallaryPlan->id)
                    @method('put')
                    @endif
                    @csrf
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Image</label>
                        <div class="col-sm-9">
                            <input class="form-control" name="img" id="img" type="file" accept="image/*" required>
                        </div>
                    </div>

                    @if ($errors->any())
                    <div class="form-group">
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Order:</label>
                        <div class="col-sm-9">
                            <input type="number" step="1" required name="order" class="form-control" value="{{old('order', $gallaryPlan->order)}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3 text-center "><br>
                            <button type="submit" class=" btn btn-primary">Add </button>
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