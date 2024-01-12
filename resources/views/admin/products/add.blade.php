<?php
require  public_path() . '/admin/header.blade.php';
?>
<div class="page-header">
    <h1 class="page-title">
        Add New Product
    </h1>
    <br />
    <div class="row">
        <div class="col-sm-9">
            <form method="post" id="add_shop" action="{{$product->id? route('admins.product.update', ['product' =>$product->id ]) : route('admins.product.store')}}" enctype="multipart/form-data">
                @csrf
                @if($product->id)
                @method('PUT')
                @endif
                <div class="row">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Product Title: </label>
                        <div class="col-sm-9">
                            <input type="text" required name="title" value="{{old('title', $product->title)}}" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Price: </label>
                        <div class="col-sm-9">
                            <input type="number" required name="price" value="{{old('price', $product->price)}}" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Sale Price: </label>
                        <div class="col-sm-9">
                            <input type="number" required name="sale_price" value="{{old('sale_price', $product->sale_price)}}" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Details: </label>
                        <div class="col-sm-9">
                            <textarea class="form-control" neme="details" id="details" rows="3">{{old('details', $product->details)}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Order: </label>
                        <div class="col-sm-9">
                            <input type="number" required value="{{old('order', $product->order)}}" name="order" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Url:</label>
                        <div class="col-sm-9">
                            <input type="text" required value="{{old('url', $product->url)}}" name="url" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Target:</label>
                        <div class="col-sm-9">
                            <div class="form-check">
                                <input {{old("target", $product->url) !='_self'? 'checked': '' }} class="form-check-input" type="radio" value='_self' name="target" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Same Page
                                </label>
                            </div>
                            <div class="form-check">
                                <input {{old("target", $product->url) =='_blank'? 'checked': '' }} class="form-check-input" type="radio" name="target" value='_blank' id="flexRadioDefault2">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    New Pages
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Upload Image:</label>
                        <div class="col-sm-9">
                            <input name='img' class="form-control form-control-lg" id="img" type="file">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3 text-center "><br>
                            <button type="submit" class=" btn btn-primary"> {{ $product->id? 'Update': 'Add'}}</button>
                        </div>
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