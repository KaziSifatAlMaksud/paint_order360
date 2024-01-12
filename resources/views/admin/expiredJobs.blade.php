<?php


require  public_path().'/admin/header.blade.php';
?>
<div class="page-header">
    <h1 class="page-title">
        You Are Looking At Expired Jobs  : 
       
       
  
    <div class="pull-right">
        <!-- <a href="<?php //echo $this->webroot.'admin/Admins/add' ?>" class="btn btn-primary" >Add New Painter</a> -->
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
                                <th>Painter Name</th>
                                    <th>Job Tittle</th>
                                    <th>started Date</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                
 
                                @foreach($expjobs as $key => $value)
                                <tr>
                                <td><?php if($value->users) echo $value->users->first_name .' '. $value->users->last_name  ;else echo ''?></td>
                                    <td><?php echo $value->title;?></td>
                                    <td><?php echo $value->start_date;?></td>
                                   
                                </tr>
                                @endforeach
                             
                            </tbody>
                        </table>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
</div>
<?php
require  public_path().'/admin/footer.blade.php';
?>