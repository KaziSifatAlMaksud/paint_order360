<?php
require  public_path() . '/admin/header.blade.php';
?>



<div class="page-header">
    <h1 class="page-title">
        Assign Builder List
    </h1>

    <br />

</div>
</div>
<div class="panel">
    <div class="panel-body container-fluid">
        <div class="row row-lg">
            <div class="col-md-12">
                <!-- Example Basic -->
                <div class="example-wrap">
                    <div class="example table-responsive">
                        <table class="table table-bordered table-striped tbale-responsive">
                            <thead>
                                <tr>
                                    <th>User Name</th>
                                    <th>Builder/Customer Company Name </th>
                                    <th>Assign Builder</th>                            
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $key => $user)
                                        <tr>
                                            <td>{{ $user->company_name }}</td>
                                            <td>
                                                <form class="assignBuilderForm">
                                                    @csrf 
                                                    <label for="company">Select a Company:</label>
                                                    <select name="admin_builder_id" id="company">
                                                        @foreach($admin_builders as $key => $admin_builder)
                                                            <option value="{{ $admin_builder['id'] }}">{{ $admin_builder['company_name'] }}</option>
                                                        @endforeach
                                                    </select>

                                                    <div id="confirmationPopup" style="display: none;">
                                                        <p>Entry already exists. Do you want to update it?</p>
                                                        <button id="confirmUpdate">Yes</button>
                                                        <button id="cancelUpdate">No</button>
                                                    </div>

                                                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                                                    <p type="button" style=" float: right; margin-right:20%; cursor: pointer;" class="ajaxSubmit label label-success">Add</p>

                                                </form>
                                            </td>
                                          <td>
                                            @foreach($customers as $key => $customer)
                                                @if($customer->user_id == $user->id)
                                                    <div class="d-flex justify-content-between mb-2" style="display: flex; justify-content: space-between;">
                                                        <span>{{ $customer->name }}</span>
                                                        <form id="deleteCustomerForm-{{ $customer->id }}" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            {{-- <input type="hidden" name="customer_id" value="{{ $customer->id }}"> --}}
                                                            <p type="button" style="cursor: pointer;" class="delete-customer label label-warning border-0 delete-btn" data-customer-id="{{ $customer->id }}">Delete</p>
                                                        </form>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </td>

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
</div>
<script>
$(document).ready(function() {
    $('.delete-customer').click(function(e) {
        e.preventDefault();

        var customerId = $(this).data('customer-id');
        var token = $("#deleteCustomerForm-" + customerId).find('input[name="_token"]').val();

        $.ajax({
            url: 'admin/assign_builder/' + customerId, // Update this URL as per your routing
            type: 'DELETE',
            data: {
                "_token": token,
                "customer_id": customerId // Ensure this matches with your controller's expected parameter
            },
            success: function(response) {
                alert("Customer deleted successfully");
                $("#deleteCustomerForm-" + customerId).closest('div').remove();
            },
            error: function(xhr) {
                alert("Error: " + xhr.responseText);
            }
        });
    });
});
</script>


<script>
$(document).ready(function() {
    $('.ajaxSubmit').click(function(e) {
        e.preventDefault();

        let form = $(this).closest('form');
        let data = form.serialize(); // Serialize the form data

        $.ajax({
            url: "{{ url('admin/assign_builder') }}",
            type: 'post',
            data: data,
            success: function(response) {
                // Show success message in alert
                alert('Customer created successfully');
                location.reload();
            },
            error: function(response) {
                // Handle errors
                alert('Error: ' + response.responseText);
                location.reload();
            }
        });
    });
});



</script>





{{-- s --}}
<?php
require  public_path() . '/admin/footer.blade.php';
?>



