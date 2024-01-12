<?php
require  public_path() . '/admin/header.blade.php';
?>
<style>
    .cst-address {
        color: red;
        font-weight: 500;
        text-align: center !important;
    }

    td.data-cols span {
        width: 50%;
        display: inline-block;
        float: left;
        text-align: left;
    }
</style>
<div class="page-header">
    <h1 class="page-title">
        You Are Looking At Orders From :
        <div class="pull-right">
            <!-- <a href="<?php //echo $this->webroot.'admin/Admins/add' 
                            ?>" class="btn btn-primary" >Add New Painter</a> -->
        </div>
        <br />
</div>
<div class="panel">
    <div class="panel-body container-fluid">
        <div class="row row-lg">
            <div class="col-md-12">
                <!-- Example Basic -->
                <div class="example-wrap">
                    <div class="example table-responsive">
                        <table class="table table-bordered table-striped tbale-responsive" id="painter_table">
                            <thead>
                                <tr>
                                    <th>Customer Name</th>
                                    <th>Company</th>
                                    <th>Open Order</th>
                                    <th>Job Address</th>
                                    <th>#Order Number</th>
                                    <!-- <th>Shop Name</th> -->
                                    <th width="20x">Items In Order</th>
                                    <th>Order Date</th>
                                    <th>Pick Up / Delivery</th>
                                    <th>photo_order</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($orders as $key => $value) {
                                ?>
                                    <tr>
                                        <td><?php echo $value->first_name . ' ' . $value->last_name; ?></td>
                                        <td><?php echo $value->company_name; ?></td>
                                        <td> <a href="view_order/<?php echo $value->id; ?>">Open</a> </td>
                                        <!-- <td><?php echo $value->address; ?></td> -->

                                        <td class="data-cols">
                                            <span>
                                                <?php echo $value->address; ?>
                                            </span>
                                            <span class=" cst-address"> <?php if ($value->type == 0) echo ($value->parent_id == null || $value->parent_id == '') ?
                                                                            'Master' : $value->index ?></span>
                                        </td>
                                        <td>
                                            <div class="del-icon-id"><?php echo $value->id; ?><a class="delete-btn" data-target="#exampleModal" data-id=<?php echo $value->id; ?>><span class="deletebtn"><i class="fa-regular fa-trash"></i></span></a></div>
                                        </td>
                                        <!-- <td><?php echo $value->name; ?></td> -->
                                        <td><?php echo $value->count; ?></td>
                                        <td><?php echo  $value->created_at; ?></td>
                                        <td><?php if ($value->pickup == 0) echo 'From Shop';
                                            elseif ($value->pickup == 1) echo 'Deliver To Home';
                                            else echo 'Deliver To Job Address'; ?></td>
                                        <td><?php if ($value->type == 1) echo '<svg xmlns="http://www.w3.org/2000/svg" width="20px" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M149.1 64.8L138.7 96H64C28.7 96 0 124.7 0 160V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V160c0-35.3-28.7-64-64-64H373.3L362.9 64.8C356.4 45.2 338.1 32 317.4 32H194.6c-20.7 0-39 13.2-45.5 32.8zM256 192a96 96 0 1 1 0 192 96 96 0 1 1 0-192z"/></svg>';
                                            else echo '' ?></td>
                                        <!-- <td>@if($value->type == 1)<img class='photo_order_icon' src="{{asset('assets/images/photo_order.jpg')}}">@endif</td> -->
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->

<div class="modal fade cstm-modl-design" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <input type='hidden' class='hidden-field' value="">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h6 class="modal-data"> Are You Sure To Delete</h6>
            </div>
            <div class="modal-footer">
                <a type="button" class="btn btn-danger delete-record" href="<?php echo PUBLIC_PATH . '/admin/delete_order/' ?>">Delete</a>
            </div>
        </div>
    </div>
</div>

<script>
    $('.delete-btn').on('click', function() {
        var id = $(this).attr('data-id');
        var url = $('.delete-record').attr('href');
        var delete_url = url + id;
        $('.delete-record').attr('href', delete_url)
        $('#deleteModal').modal('show');
    });
</script>
<style>
    .del-icon-id {
        display: flex;
        align-items: center;
        justify-content: space-around;
    }

    button {
        background-color: #04AA6D;
        color: white;
        padding: 3px 3px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
        opacity: 0.9;
    }

    .cstm-modl-design .modal-header {
        position: relative;
    }

    .cstm-modl-design .modal-header .close {
        position: absolute;
        right: 10px;
        top: 10px;
        width: 20px;
    }

    .cstm-modl-design h5.modal-title {
        font-size: 26px;
        font-weight: 400;
        color: #f96868;
    }

    h6.modal-data {
        font-size: 22px;
        font-weight: 400;
    }

    .cstm-modl-design .modal-body {
        padding: 0 20px;
    }

    .deletebtn i {
        font-size: 20px;
        color: #f44336;
    }

    @media (min-width:350px) {
        .cstm-modl-design .modal-dialog {

            width: 340px;
            margin: 30px auto;
        }
    }

    @media (min-width:768px) {
        .cstm-modl-design .modal-dialog {
            width: 450px !important;
        }
    }
</style>
<?php
require  public_path() . '/admin/footer.blade.php';
?>