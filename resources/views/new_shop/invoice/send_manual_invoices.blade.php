<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Invoice | Orderr360</title>
     <link rel="icon" href="{{ asset('image/favicon.png') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style8.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style77.css') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
            backdrop-filter: blur(5px);
            /* Applying blur to background */
        }

        .modal-content {
            background-color: #fefefe;
            padding: 20px;
            border: 1px solid #888;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            /* Shadow effect */
            width: 80%;
            /* Taking 60% of screen width */
            max-width: 600px;
            /* For larger screens */
            position: relative;
            /* To position the close button */
            margin: 10% auto;
            /* Centering the modal */
        }

        .close {
            color: #a00;
            margin: 15px;
            font-size: 28px;
            font-weight: bold;
            position: absolute;
            top: -10px;
            right: 0;
            border-radius: 20%;
            padding: 5px;
            cursor: pointer;
            transition: color 0.3s;
            z-index: 10;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            transform: scale(1.1);
        }

    </style>

    <!-- Ensure you're using the full version of jQuery -->


    <header>
        <div class="header-row">
            <div class="header-item">
                <a href="{{ url()->previous() }}"> <i class="fa-solid fa-arrow-left"></i> </a>
                <span> Send Invoice </span>
                <a href="<?php echo '/main' ?>"> <img src="/image/logo-phone.png" alt="Logo"> </a>
            </div>
        </div>
    </header>

    @include('layouts.partials.footer')

    <div class="container">
        @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
        @if(session('go_back'))
        <script>
            setTimeout(function() {
                window.location.href = '/invoice/all';
            }, 1000);

        </script>
        @endif
        @endif

        <!-- Modal Structure -->
        <div id="amountNotesModal" class="modal  mt-5 pt-4">
            <div class="modal-content">
                <span class="close">&times;</span>

                <!-- Laravel Form Starts Here -->
                <div class="alert alert-warning">
                    <p>Your Total Remaining Due: ${{ number_format($invoice->total_due ?? '0' - $totalAmountMain , 2) }}</p>
                </div>

                <form id="amountNotesForm" action="{{ route('invoicePayment.store') }}" method="POST">
                    @csrf
                    <!-- CSRF Token for security -->

                    <div>
                        <label for="amount" class="form-label">Amount: <span class="text-danger " style="font-size: 1.2em">*</span></label>
                        <input type="text" step="0.01" class="custom-input" id="amount_main" name="amount_main" required value="">

                    </div>

                    <div class="mt-3">
                        <label for="notes" class="form-label">Notes: </label>
                        <input type="text" class="custom-input" id="notes" name="notes" required name="notes" value="">

                    </div>
                    <input type="text" class="custom-input" name="parent_amount" required value="@if ($invoice)  {{ number_format($invoice->total_due, 2) }} @endif" hidden>
                    <input type="text" class="custom-input" name="invoice_id" required value="@if ($invoice) {{ $invoice->id }} @endif" hidden>

                    <center>
                        <button type="submit" class="btn btn-primary w-50 mt-4 align-center" name="action" value="save"> Submit</button>
                    </center>

                </form>
                <!-- Laravel Form Ends Here -->

            </div>
        </div>

         @if(request()->is('/manual_invoice/' . $invoice->id))
                <form action="{{ route('manual_invoice_store', ['id' => $invoice->id]) }}" method="POST" enctype="multipart/form-data">
        @else
                <form action="{{ route('manual_invoice_job_store', ['id' => $invoice->id]) }}" method="POST" enctype="multipart/form-data">
        @endif
            @csrf
            <input type="hidden" name="referrer" value="{{ url()->current() }}">
            <fieldset class="m-3">
                <div class="row mb-3 mt-2">
                    <div class="col-2 d-flex align-items-center justify-content-center">
                        <label class="form-label"> To : </label>
                    </div>
                    <div class="col-10">
                        <input name="customer_id" type="text" value="{{$invoice->customer_id}}" class="custom-input" readonly>
                    </div>
                </div>
                <div class="row mb-3 mt-2">
                    <div class="col-2 d-flex align-items-center justify-content-center">
                        <label class="form-label"> Email <span style="color:red;">*</span> : </label>
                    </div>



                    <div class="col-10">
                        <input name="send_email" type="text" value="{{$invoice->send_email}}" class="custom-input">
                    </div>
                </div>

                <!-- Invoice Number -->

                <div class="row mb-3">
                    <div class="col-2 d-flex align-items-center justify-content-center">
                        <label class="form-label"><i class="fas fa-file-invoice"> </i> <span style="color:red;">*</span> </label>
                    </div>
                    <div class="col-10">
                        <input type="text" class="custom-input" value="@if ($invoice) {{ $invoice->inv_number }} @endif" id="invoiceNumber" name="inv_number" readonly>

                    </div>
                </div>


                <div class="row mb-3">
                    <div class="col-2 d-flex align-items-center justify-content-center">
                        <label class="form-label"><i class="fas fa-file-invoice"> </i> <span style="color:red;">*</span> </label>
                    </div>
                    <div class="col-10">
                        <input type="date" class="custom-input" id="dateInput" value="{{ $invoice ? $invoice->date : '' }}" name="date">
                    </div>
                </div>

                <!-- Due Date -->
                <div class="row mb-3">
                    <div class="col-2 d-flex align-items-center justify-content-center">
                        <label class="form-label"><i class="far fa-clock"></i></label>
                    </div>
                    <div class="col-10">
                        <input type="text" class="custom-input editable" value="{{$invoice->purchase_order}}" placeholder="Purchase Oder" name="purchase_order">
                    </div>
                </div>


                <!-- Address -->
                <div class="row mb-3">
                    <div class="col-2 d-flex align-items-center justify-content-center">
                        <label class="form-label"><i class="fas fa-map-marker-alt"></i> <span style="color:red;">*</span> </label>
                    </div>
                    <input type="hidden" value="" name="job_id">
                    <div class="col-10">
                        <input type="text" class="custom-input editable" value="{{$invoice->address}}" name="address" required>
                    </div>
                </div>



                <!-- Description -->
                <div class="row mb-3">
                    <div class="col-2 d-flex align-items-center justify-content-center">
                        <label class="form-label"><i class="fa-regular fa-bookmark"></i> <span style="color:red;">*</span> </label>
                    </div>
                    <div class="col-10">
                        <input type="text" class="custom-input editable" placeholder="Your description here" value="{{$invoice->description}}" name="description" required>
                    </div>
                </div>




                <div class="row">
                    <div class="col-4 mb-1">
                        @if (!empty($invoice->attachment))
                        <div class="position-relative" style="text-align: center;">

                            <a href="{{ asset('uploads/' . $invoice->attachment) }}" download>
                                <img class="responsive-image" src="{{ asset('uploads/' . $invoice->attachment) }}" style=" width: 100%; height: 100px; object-fit: cover;">

                            </a>
                            @if($invoice && $invoice->status && $invoice->status == '1')
                                <p onclick="deleteAttachment('{{ $invoice->id }}', 'attachment')" style="position: absolute; right: -15px; top: -25px; background: transparent; border: none; color: red; padding: 15px; font-size: 1.25em;">
                                    <i class="fas fa-times-circle fa-1x"></i>
                                </p>
                            @endif
                        </div>
                        @endif
                    </div>
                    <div class="col-4 mb-1">
                        @if (!empty($invoice->attachment1))
                        <div class="position-relative" style="text-align: center;">
                            <a href="{{ asset('uploads/' . $invoice->attachment1) }}" download>
                                <img src="{{ asset('uploads/' . $invoice->attachment1) }}" style=" width: 100%; height: 100px; object-fit: cover;">
                            </a>
                            @if($invoice && $invoice->status && $invoice->status == '1')
                                <p  onclick="deleteAttachment('{{ $invoice->id }}', 'attachment1')" style="position: absolute; right: -25px; top: -25px; background: transparent; border: none; color: red; padding: 15px; font-size: 1.25em;">
                                     <i class="fas fa-times-circle fa-1x"></i>
                                </p>
                             @endif

                        </div>
                        @endif
                    </div>

                    <div class="col-4 mb-1">

                        @if (!empty($invoice->attachment2))
                        <div class="position-relative" style="text-align: center;">

                            <a href="{{ asset('uploads/' . $invoice->attachment2) }}" download>
                                <img class="responsive-image" src="{{ asset('uploads/' . $invoice->attachment2) }}" style=" width: 100%; height: 100px; object-fit: cover;">


                            </a>
                            @if($invoice && $invoice->status && $invoice->status == '1')
                             <p onclick="deleteAttachment('{{ $invoice->id }}', 'attachment2')" style="position: absolute; right: -25px; top: -25px; background: transparent; border: none; color: red; padding: 15px; font-size: 1.25em;">
                                 <i class="fas fa-times-circle fa-1x"></i>
                             </p>
                            @endif

                        </div>
                        @endif
                    </div>
                </div>



            @if($invoice && $invoice->status && $invoice->status == '1')

              <div class="row my-2" id="imarow" style="margin: 0px; padding: 0px;">
                    <div class="col-4" style="padding: 4px;">
                        <img id="previewImg1" class="img-fluid"  style="width: 100%; height: 100%; object-fit: cover; display: none;">
                    </div>
                    <div class="col-4" style="padding: 4px;">
                        <img id="previewImg2" class="img-fluid"  style="width: 100%; height: 100%; object-fit: cover; display: none;">
                    </div>
                    <div class="col-4" style="padding: 4px;">
                        <img id="previewImg3" class="img-fluid"  style="width: 100%; height: 100%; object-fit: cover; display: none;">
                    </div>
                </div>
                <div class="row">
                     <div class="col-md-4 mb-1">
                         <input type="file" class="form-control" id="attachmentInput1" name="attachment" onchange="previewFile(this, 'previewImg1')">
              
                     </div>
                     <div class="col-md-4 mb-1">
                         <input type="file" class="form-control" id="attachmentInput2" name="attachment1" onchange="previewFile(this, 'previewImg2')">
                
                     </div>
                     <div class="col-md-4 mb-1">
                         <input type="file" class="form-control" id="attachmentInput3" name="attachment2" onchange="previewFile(this, 'previewImg3')">
                     
                     </div>
                 </div>

            @endif

    <hr>

    <!-- Total Due -->
    <div class="row mb-3">

        <div class="col-12">
            <label class="form-label">Job Details:</label>
        </div>
        <div class="col-12">
            <input type="text" class="custom-input editable @error('job_details') is-invalid @enderror" value="{{$invoice->job_details}}" placeholder="Extra description (Optional)" name="job_details">

            @error('job_details')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>


    <div class="row mb-3">
        <!-- Amount Input -->
        <div class="col-6">
            <label class="form-label">Amount <span style="color:red;">*</span> :</label>
        </div>
        <div class="col-6">
            <div class="input-group">
                <span class="input-group-text no-background"><i class="fas fa-dollar-sign"></i> </span>
                <input type="text" id="amountInput" class="custom-input form-control text-right editable" name="amount" value="{{$invoice->amount}}" placeholder="Enter Amount">
            </div>
        </div>

        <!-- GST Input -->
        <div class="col-6">
            <label class="form-label">GST :</label>
        </div>
        <div class="col-6">
            <div class="input-group">
                <span class="input-group-text no-background"><i class="fas fa-dollar-sign"></i></span>
                <input type="text" id="gstInput" class="custom-input form-control text-right editable" value="{{ $invoice->gst }}" name="gst" readonly>
            </div>
        </div>
    </div>
    <!-- Total Due Input -->
    <div class="row ">
        <div class="col-6">
            <label class="form-label">Total Amount:</label>
        </div>
        <div class="col-6">
            <div class="input-group">
                <span class="input-group-text no-background"><i class="fas fa-dollar-sign"></i></span>
                <input type="text" id="totalDueInput" class="custom-input form-control text-right editable" value="{{ $invoice->total_due }}" name="total_due" readonly>
            </div>
        </div>
    </div>
    <hr />
    <!-- Status filde -->
    @if ($invoice)
    <input type="text" name="status" value="{{ $invoice->status !== null ? $invoice->status : 1 }}" class="form-control @error('status') is-invalid @enderror" hidden>
    @else
    <input type="text" name="status" value="1" class="form-control @error('status') is-invalid @enderror" hidden>
    @endif

    <div class="col-12 px-0">

        @if($invoice && $invoice->status == 2)


        @if($invoicePaymentHistorys)

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">Notes</th>
                    <th scope="col">Date</th>
                    <th scope="col">Amount</th>

                </tr>
            </thead>
            <tbody>
                @foreach($invoicePaymentHistorys as $invoicePaymentHistory)
                <tr>
                    <td>{{ $invoicePaymentHistory->notes }}</td>
                    <td>{{ $invoicePaymentHistory->date }}</td>
                    <td>$ {{ number_format($invoicePaymentHistory->amount_main, 2) }}</td>

                </tr>
                @endforeach
            </tbody>
        </table>

        @endif

        {{-- <div class="alert alert-warning">  --}}
        {{-- <p class="text-center">Email Has Already Been Sent to Customer.</p> --}}
        {{-- </div> --}}

        @if($invoice && $invoice->status == 2 && $invoice->status !== 3)
        <button type="submit" name="action" class="btn btn-success btn-block btnshow" value="paid" style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
            <span style="display: inline-block; padding-left: 15px;">Got Paid</span>
            <span style="display: inline-block; padding-right: 15px;">${{ number_format($invoice->total_due - $totalAmountMain , 2) }} </span>
        </button>


        @endif

        @if($invoice && $invoice->status == 2 && $invoice->status !== 3)
        {{-- <a class="btn btn-success btn-block btnshow" href="{{ route('stripe.checkout', [
                                'price' => ($invoice ?? ($poItem->price + ($poItem->price * 0.10))),
                                'product' => $invoice->address, 'invoice_id'=> $invoice->id,
                            ]) }}">
        Got Paid
        </a> --}}
        <p id="addInvoicePaidLessButton" class="btn btn-block btnshow" style="cursor: pointer; background-color: #12d7b3 !important; color:#fff;">Got Paid Less</p>
        @endif

        @elseif($invoice && $invoice->status == 1 && $invoice->status !== 3)
        <button type="submit" name="action" class="btn btn-primary btn-block btnshow" value="send"> Send Invoice</button>
        @elseif($invoice && $invoice->status != 3)
        <button type="submit" name="action" class="btn btn-primary btn-block btnshow" value="send&save">Save and Send Invoice</button>
        @endif


        <div class="row mt-3">
            <div class="col-4">
                <button type="submit" name="action" class="btn btn-danger btn-block btnshow" id="deleteButton1" value="delete">Delete</button>
            </div>
            <div class="col-4">

            </div>
            @if($invoice && $invoice->status !== null)
            <div class="col-4">
                <button type="submit" name="action" class="btn btn-warning btn-block btnshow" value="update">Edit</button>
            </div>
            @else
            <div class="col-4">
                <button type="submit" name="action" class="btn btn-warning btn-block btnshow" value="save">Save</button>
            </div>

            @endif

        </div>
    </div>
    </fieldset>
    </form>



    </div>




    <div style="margin: 20px 0px 300px 0px;"></div>



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var deleteButton = document.getElementById('deleteButton1');
            deleteButton.addEventListener('click', function(event) {
                // Show a confirmation dialog
                var confirmDeletion = confirm('Are you sure you want to delete this invoice?');
                if (!confirmDeletion) {
                    event.preventDefault(); // Prevent form submission if the user cancels
                }
            });
        });
    </script>


    <script>
        var modal = document.getElementById("amountNotesModal");
        var btn = document.getElementById("addInvoicePaidLessButton");
        var span = document.getElementsByClassName("close")[0];
        btn.onclick = function() {
            modal.style.display = "block";
        }

        span.onclick = function() {
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }


   
        var dateInput = document.getElementById("dateInput");
        if (!dateInput.value) {
            var currentDate = new Date();
            // Format the current date as YYYY-MM-DD
            var year = currentDate.getFullYear();
            var month = (currentDate.getMonth() + 1).toString().padStart(2, "0");
            var day = currentDate.getDate().toString().padStart(2, "0");
            var formattedDate = year + "-" + month + "-" + day;
            dateInput.value = formattedDate;
        }

    </script>


    <script src="{{ asset('js/script.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<script>
    function previewFile(input, previewId) {
        var file = input.files[0];
        var preview = document.getElementById(previewId);

        if (file) {
            var reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block'; // Display the image element
                 preview.style.maxHeight = '100px';
                 preview.style.width = '100%';
            };

            reader.readAsDataURL(file); // Convert image to base64 string
        } else {
            preview.style.display = 'none'; // Hide the image element if no file is selected
        }
    }

</script>

<script>
    // Ensure that the document is ready before attaching event handlers
    jQuery(document).ready(function() {
        // Function can be defined here if it's only used after the document is ready
    });

    function deleteAttachment(invoiceId, attachmentField) {
        // Confirmation dialog to ensure the user wants to proceed
        if (!confirm('Are you sure you want to delete this attachment?')) return;

        // Proceed with AJAX call
        jQuery.ajax({
            url: '/attachment/delete-attachment', // Make sure the URL is correct and accessible
            type: 'POST',
                data: {
                invoice_id: invoiceId,
                attachment_field: attachmentField,
                _token: jQuery('meta[name="csrf-token"]').attr('content')
                }


            , success: function(response) {
                if (response.success) {
                    alert('Attachment deleted successfully.');
                    
                } else {
                    alert('Failed to delete attachment: ' + response.message);
                }
                 window.location.reload(true); 
            }
            , error: function(xhr) {
                alert('Error: ' + xhr.responseText); // Consider more detailed error handling
            }
        });
    }

</script>


    <script>
        $(document).ready(function() {
            $('#amountNotesForm').on('submit', function(e) {
                e.preventDefault();

                var formData = new FormData(this);

                var totalDue = < ? php echo json_encode(number_format($invoice - > total_due, 2)); ? > ;
                var amountMainValue = $('#amount_main').val();
                var remaningamout = totalDue - amountMainValue;
                $.ajax({
                    url: '{{ route("invoicePayment.store") }}'
                    , method: 'POST'
                    , headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                        , 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    , }
                    , data: formData
                    , contentType: false
                    , processData: false
                    , success: function(data) {
                        if (data.success) {
                            alert('Success: Payment saved successfully!');
                            $('#amountNotesForm')[0].reset();
                            var modal = document.getElementById('amountNotesModal');
                            modal.style.display = "none";
                            window.location.reload();
                        } else {
                            alert('Error: ' + data.error);
                        }
                    }
                    , error: function(error) {
                        console.error('Error:', error);
                        alert('Error: An error occurred while saving the customer.');
                    }
                });
            });
        });

    </script>


</html>
