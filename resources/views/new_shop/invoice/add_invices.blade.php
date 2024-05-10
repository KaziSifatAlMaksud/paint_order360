<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Invoice | Orderr360</title>
     <link rel="icon" href="{{ asset('image/favicon.png') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style8.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style77.css') }}">
    <style>
        /* Modal Style */
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

        /* Modal Content */
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            /* Could be more or less, depending on screen size */
        }

        /* The Close Button */
        .close {
            color: red;
            margin: 15px;
            font-size: 28px;
            font-weight: bold;
            position: absolute;
            top: 0;
            right: 0;
            border-radius: 20%;
            padding: 5px;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
        }

    </style>
</head>
<body>
    <header>
        <div class="header-row">
            <div class="header-item">
                <a href="{{ url()->previous() }}"> <i class="fa-solid fa-arrow-left"></i> </a>
                <span> Create Invoice </span>
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
        @endif
        @if(session('go_back'))
        <script>
            setTimeout(function() {
                window.location.href = '/invoice/all?reload=true';
            }, 1000);

        </script>
        @elseif(session('go_back_invoiceing'))
        <script>
            setTimeout(function() {
                window.location.href = '/invoiceing/{{ $job_number ?? '
                ' }}?reload=true';
            }, 1000);

        </script>
        @endif

        <!-- Modal Structure -->
        <div id="myModal" class="modal mt-4 pt-4">
            <div class="modal-content">
                <span class="close">&times;</span>

                <!-- Laravel Form Starts Here -->
                <form id="customerForm" action="{{ route('customer.popsotre') }}" method="POST">
                    @csrf
                    <!-- CSRF Token for security -->

                    <div>
                        <label for="companyName" class="form-label">Customer Company Name: <span class="text-danger " style="font-size: 1.2em">*</span></label>
                        <input type="text" class="custom-input" id="companyName" required value=" {{ isset($customer) ? $customer->companyName : '' }}" required name="companyName">
                    </div>

                    <div class="mt-3">
                        <label for="name" class="form-label">Customer Name: <span class="text-danger " style="font-size: 1.2em">*</span> </label>
                        <input type="text" class="custom-input" id="name" required value="{{ isset($customer) ? $customer -> name : '' }} " required name="name">
                    </div>

                    <div class="mt-3">
                        <label for="email" class="form-label">Customer Email Address : <span class="text-danger " style="font-size: 1.2em">*</span></label>
                        <input type="email" class="custom-input" id="email" required value=" {{ isset($customer) ? $customer -> email : '' }} " required name="email">
                    </div>

                    <div class=" mt-3">
                        <label for="mobile" class="form-label">Mobile Number:<span class="text-danger " style="font-size: 1.2em">*</span> </label>
                        <input type="text" class="custom-input" id="mobile" value=" {{ isset($customer) ? $customer -> mobile : ' ' }}" required name="mobile">
                    </div>


                    <div class="mt-3">
                        <label for="abn" class="form-label">ABN: <span class="text-danger " style="font-size: 1.2em">*</span> </label>
                        <input type="text" class="custom-input" id="abn" value=" {{ isset($customer) ? $customer -> abn : ' ' }} " required name="abn">
                    </div>

                    <div class="mt-3">
                        <label for="schedule" class="form-label">Payment Schedule:</label>
                        <select class="custom-input" id="schedule" name="schedule">

                            <option value="5" {{ isset($customer) && $customer->schedule == '5' ? 'selected' : '' }}>5 days</option>
                            <option value="7" {{ isset($customer) && $customer->schedule == '7' ? 'selected' : '' }}>1 week</option>
                            <option value="14" {{ isset($customer) && $customer->schedule == '14' ? 'selected' : '' }}>2 weeks</option>
                            <option value="14" {{ isset($customer) && $customer->schedule == '21' ? 'selected' : '' }}>3 weeks</option>
                            <option value="14" {{ isset($customer) && $customer->schedule == '30' ? 'selected' : '' }}>1 Month</option>

                            <!-- Add more options as needed -->
                        </select>
                    </div>
                    <center>
                        <button type="submit" class="btn btn-primary w-50 mt-4 align-center" name="action" value="save"> Submit</button>
                    </center>

                </form>
                <!-- Laravel Form Ends Here -->

            </div>
        </div>

        <form action="{{ route('invoices.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <fieldset class="m-3">
                <div class="row mb-3 mt-3">
                    <div class="col-2 d-flex align-items-center justify-content-center">
                        <label class="form-label"> To <span style="color: red;">*</span> </label>
                    </div>

                    <div class="col-7">
                        <select name="customer_id" class="custom-input" id="customerSelect">
                            <option value="" selected>Select a Customer</option>
                            @foreach ($customers as $customer)
                            <option value="{{ $customer->companyName }}" data-email="{{ $customer->email }}">
                                {{ $customer->companyName }}
                            </option>
                            @endforeach
                        </select>
                    </div>



                    <div class="col-3 d-flex align-items-center justify-content-center">
                        <p href="" id="addCustomerButton" class="form-label" style="cursor: pointer;">
                            <i class="fas fa-user-plus"></i> ADD
                        </p>
                    </div>
                </div>


                <div class="row mb-3">
                    <div class="col-2 d-flex align-items-center justify-content-center">
                        <label class="form-label"><i class="fa-solid fa-envelope"></i> <span style="color:red;">*</span> </label>
                    </div>
                    <div class="col-10">
                        <input type="email" class="custom-input editable" id="customer_email" name="send_email" placeholder="Enter Email" required>

                        <span id="email-error" class="error-message text-danger"></span>
                    </div>
                </div>

                <!-- Invoice Number -->
                <div class="row mb-3">
                    <div class="col-2 d-flex align-items-center justify-content-center">
                        <label class="form-label"><i class="fas fa-file-invoice"> </i> <span style="color: red;">*</span></label>
                    </div>
                    <div class="col-10">
                        <input type="text" class="custom-input" value="INV: {{ isset($inv_numbers) ? str_pad($inv_numbers + 1, 5, '0', STR_PAD_LEFT) : 'Default Value' }}" id="invoiceNumber" name="inv_number" readonly>
                    </div>
                </div>

                <!-- Date -->
                <div class="row mb-3">
                    <div class="col-2 d-flex align-items-center justify-content-center">
                        <label class="form-label text-center">
                            <i class="fas fa-calendar-alt"></i> <span style="color: red;">*</span>
                        </label>
                    </div>

                    <div class="col-10">
                        <input type="date" class="custom-input editable" id="dateInput" name="date">
                    </div>
                </div>

                <!-- Due Date -->
                <div class="row mb-3">
                    <div class="col-2 d-flex align-items-center justify-content-center">
                        <label class="form-label"><i class="far fa-clock"></i></label>
                    </div>
                    <div class="col-10">
                        <input type="text" class="custom-input editable" placeholder="Purchase Order Number" name="purchase_order">
                    </div>
                </div>


                <!-- Address -->
                <div class="row mb-3">
                    <div class="col-2 d-flex align-items-center justify-content-center">
                        <label class="form-label"><i class="fas fa-map-marker-alt"></i> <span style="color: red;">*</span></label>
                    </div>
                    <div class="col-10">
                        <textarea class="custom-input editable" name="address" rows="1" placeholder="Job Address" name="job_selection" required></textarea>
                        <!--id="searchTextField" id="address" -->

                        <input type="hidden" name="latitude" id="Lat" value="">
                        <input type="hidden" name="longitude" id="Lng" value="">

                    </div>
                </div>



                <!-- Description -->
                <div class="row mb-3">
                    <div class="col-2 d-flex align-items-center justify-content-center">
                        <label class="form-label"><i class="fa-regular fa-bookmark"></i> <span style="color: red;">*</span></label>
                    </div>
                    <div class="col-10">
                        <input type="text" required class="custom-input editable" placeholder="Short description of work " name="description">
                    </div>
                </div>

                <!-- Attachment Field -->
                {{-- <div class="row mb-3">
                    <div class="col-2 d-flex align-items-center justify-content-center">
                        <label class="form-label text-center">
                            <i class="fas fa-paperclip"></i>
                        </label>
                    </div>
                        <div class="col-10">
                        <input type="file" class="form-control" id="attachmentInput" name="attachment">
                        @error('attachment')
                            <div class="text-danger">{{ $message }}
    </div>
    @enderror
    </div>
    </div> --}}

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





    <!-- Total Due -->
    <div class="row mb-3">
        <div class="col-12">
            <label class="form-label">Job Details :</label>
        </div>
        <div class="col-12">
            <input type="text" class="custom-input editable" class="form-control" placeholder="Extra description (Optional)" name="job_details">
        </div>
    </div>

    <input type="hidden" value="{{ $job_number ?? '' }}" name="job_id">


    {{--
            <input type="text" value="@if($jobs) {{$jobs->id}} @endif" name="job_id"> --}}
    <div class="row mb-3">
        <!-- Amount Input -->
        <div class="col-6">
            <label class="form-label">Amount <span style="color: red;">*</span> :</label>
        </div>
        <div class="col-6">
            <div class="input-group">
                <span class="input-group-text no-background"><i class="fas fa-dollar-sign"></i></span>
                <input type="text" id="amountInput" required class="custom-input form-control text-right editable" name="amount" placeholder="Enter Amount">
            </div>
        </div>

        <!-- GST Input -->
        <div class="col-6">
            <label class="form-label">GST :</label>
        </div>
        <div class="col-6">
            <div class="input-group">
                <span class="input-group-text no-background"><i class="fas fa-dollar-sign"></i></span>
                <input type="text" id="gstInput" class="custom-input form-control text-right editable" value="0.00" name="gst" readonly>
            </div>
        </div>
    </div>

    <hr />




    <!-- Total Due Input -->
    <div class="row mb-3">
        <div class="col-6">
            <label class="form-label">Total Due:</label>
        </div>
        <div class="col-6">
            <div class="input-group">
                <span class="input-group-text no-background"><i class="fas fa-dollar-sign"></i></span>
                <input type="text" id="totalDueInput" class="custom-input form-control text-right editable" value="0.00" name="total_due" readonly>
            </div>
        </div>
    </div>

    <!-- Status filde -->

    <input type="text" name="status" value="1" class="form-control @error('status') is-invalid @enderror" hidden>

    <div class="row mt-3">
        <div class="col-5">
            <button type="submit" name="action" class="btn btn-primary btn-block btnshow" value="save">Save</button>
        </div>
        <div class="col-2">

        </div>
        <div class="col-5">
            <button type="submit" name="action" class="btn btn-success btn-block btnshow" value="send&save">Send</button>
        </div>
    </div>
    </fieldset>
    </form>
    </div>


    <div style="margin: 20px 0px 300px 0px;"></div>




</body>

<script src="{{ asset('js/script.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCb7MpXPNGT9y6LKzg_bi8R1Q_hwmLKMgk&libraries=places&callback=initialize" async defer></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

<script>
    $(document).ready(function() {
        $('#customerForm').on('submit', function(e) {
            e.preventDefault();

            var formData = new FormData(this);

            // Store email and customer name in local storage for later use
            localStorage.setItem('customer_email', formData.get('email'));
            localStorage.setItem('customerSelect', formData.get('companyName'));

            $.ajax({
                url: '{{ route("customer.popsotre") }}'
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
                        alert('Success: Customer saved successfully!');

                        // Assuming `data.customerId` and `data.customerName` are returned from the server
                        $('#customerSelect').append($('<option>', {
                            value: data.customerName
                            , text: data.customerName
                        }));

                        // Set the email in the customer_email input
                        $('#customer_email').val(data.customerEmail);

                        // Optionally, select the newly added customer in the dropdown
                        $('#customerSelect').val(data.customerName);
                        $('#customerForm')[0].reset();
                        var modal = document.getElementById('myModal'); // Replace 'yourModalId' with the actual ID of your modal
                        modal.style.display = "none";

                    } else {
                        alert('Error: ' + data.error); // Handle any custom error message from the server
                    }
                },

                error: function(error) {
                    console.error('Error:', error);
                    alert('Error: An error occurred while saving the customer.');
                }
            });
        });
    });

</script>



<script>
    // Get the modal
    var modal = document.getElementById("myModal");
    var btn = document.getElementById("addCustomerButton");
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


    const emailInput = document.getElementById('customer_email');
    const emailError = document.getElementById('email-error');
    emailInput.addEventListener('input', function() {
        const email = emailInput.value;
        const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        if (!emailPattern.test(email)) {
            emailError.textContent = 'Invalid email format';
        } else {
            emailError.textContent = '';
        }
    });


    document.addEventListener("DOMContentLoaded", function() {
        const customerSelect = document.getElementById('customerSelect');
        const customerEmailInput = document.getElementById('customer_email');

        customerSelect.addEventListener('input', function() {
            const selectedOption = customerSelect.options[customerSelect.selectedIndex];
            const selectedEmail = selectedOption.getAttribute('data-email');
            customerEmailInput.value = selectedEmail;
        });
    });


    //Defult todays date..

    var dateInput = document.getElementById("dateInput");

    // Create a new Date object to get the current date
    var currentDate = new Date();
    var year = currentDate.getFullYear();
    var month = (currentDate.getMonth() + 1).toString().padStart(2, "0");
    var day = currentDate.getDate().toString().padStart(2, "0");
    var formattedDate = year + "-" + month + "-" + day;
    dateInput.value = formattedDate;

    //celect the types

    var customerSelect = document.getElementById("customerSelect");
    var selectedTypeInput = document.getElementById("selectedType");

    customerSelect.addEventListener("change", function() {
        var selectedOption = this.options[this.selectedIndex];
        var optionType = selectedOption.getAttribute("data-type");
        selectedTypeInput.value = optionType;
    });

</script>




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



</html>
