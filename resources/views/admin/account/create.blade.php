<?php
require  public_path() . '/admin/header.blade.php';
?>

<div class="page-header">
    <h1 class="page-title">
        {{$account->id? 'Update' : 'Add'}} {{$painter->first_name. " ".$painter->last_time}}
    </h1>
    <br />
    <div class="row">
        <div class="col-sm-9">

            <div class="row">
                <form action="{{route($account->id?'admins.accounts.update':'admins.accounts.store', ['painter'=> $painter->id, 'account' => $account->id])}}" method="post" id="add_brand">
                    @if ($account->id)
                    @method('put')
                    @endif
                    @csrf
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Brand Name </label>
                        <div class="col-sm-9">
                            <select required class="form-control select-amount" name="brand_id">
                                @foreach ($brands as $brand)
                                <option value="{{$brand->id}}" {{$brand->id==$account->brand_id ? 'selected' : ''}}>{{$brand->name}}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Account Number: </label>
                        <div class="col-sm-9">
                            <input type="text" required name="account_no" class="form-control" value="{{old('account_no', $account->account_no)}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3 text-center "><br>
                            <button type="submit" class=" btn btn-primary">{{$account->id? 'Update' : 'Add'}} </button>
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