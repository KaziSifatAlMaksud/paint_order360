<?php
require  public_path() . '/admin/header.blade.php';
?>
<div class="page-header">
    <h1 class="page-title">
        Accounts
    </h1>
    <div class="pull-right">
        <a href="{{route('admins.accounts.create', ['painter'=> $painter->id])}}" class="btn btn-primary">Add New Accounts</a>
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
                                    <th>Builders</th>
                                    <th>Account Nmuber</th>
                                    <th>Brand</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($accounts as $key => $value) {
                                ?>
                                    <tr>
                                        <td><?php echo $value->name; ?></td>
                                        <td><?php echo $value->account_no; ?></td>
                                        <td><?php echo $value->brand ? $value->brand->name : ''; ?></td>
                                        <td>
                                            <a class="label label-info full-width" href="{{route('admins.accounts.edit', ['painter'=> $painter->id, 'account' => $value->id])}}">edit</a>
                                            <form action="{{route('admins.accounts.destroy', ['painter'=> $painter->id, 'account' => $value->id])}}" method="Post">
                                                @csrf
                                                @method('delete')
                                                <button class="label full-width label-danger" type="sumbit">Delete</button>
                                            </form>
                                        </td>
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
<?php
require  public_path() . '/admin/footer.blade.php';
?>