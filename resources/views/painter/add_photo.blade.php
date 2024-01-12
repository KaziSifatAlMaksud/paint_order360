<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> |Shop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <link rel="stylesheet" href="{{ asset('css/style8.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style77.css') }}">

    
</head>
<body>
    <header>
			<div class="header-row">
				<div class="header-item">
			    <a href="{{ url()->previous() }}"> <i class="fa-solid fa-arrow-left"></i> </a>	
				<span> Take Photo </span>
	        	<a href="<?php echo '/main' ?>">   <img src="/image/logo-phone.png" alt="Logo"> </a>   
			</div>
		</div>
   </header>
            @include('layouts.partials.footer')  	
   <div class="container">
       <div id="successAlert" class="alert alert-success" role="alert" style="display: none;"></div>
        <div id="errorAlert" class="alert alert-danger" role="alert" style="display: none;"></div>


        <div class="container-fluid edit-detail">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="text-center mt-4 mb-3">
                        <h2>Take Photo</h2>
                        <p class="text-muted">Take a photo of the job, this will show on the main page and helps you to remember the job</p>
                    </div>
                    <div class="text-center mt-5">
                        <div id="imagePreview"></div>
                        <form   id="myForm" action="{{ route('jobs.photos.store', $painterJob) }}"  method="POST" enctype="multipart/form-data">
                            @csrf

                           <div class="form-group">
                                <label for="photo">Photo:</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="imageInput" name="images" required>
                                    <label class="custom-file-label" for="imageInput">Choose file</label>
                                </div>
                            </div>

                            {{-- <div class="form-group">
                                <label for="order">Order:</label>
                                <input type="text" class="form-control" id="orderInput" name="order">
                            </div> --}}
                            <button type="submit" class="btn btn-success">Upload Photo</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="margin: 20px 0px 300px 0px;"></div>

<div style="margin: 20px 0px 300px 0px;"></div>

</body>



  <script src="{{ asset('js/script.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>




<script>
    $(document).ready(function() {
        // Preview image before submitting
        $('#imageInput').change(function() {
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').html('<img src="' + e.target.result + '" width="200" height="200"/>');
                }
                reader.readAsDataURL(this.files[0]);
            }
        });

        // Function to show success message
        function showSuccess(message) {
            $('#successAlert').text(message).show();
            $('#errorAlert').hide();
        }

        // Function to show error message
        function showError(message) {
            $('#errorAlert').text(message).show();
            $('#successAlert').hide();
        }

        // Ajax form submission
        $('#myForm').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);

            // Check if an image already exists for the job_id
            $.ajax({
                type: 'GET',
                url: "{{ route('check.image.exists', $painterJob) }}",
                success: function(response) {
                    if (response.exists) {
                        var confirmed = confirm('An image already exists for this job. Do you want to update it?');
                        if (confirmed) {
                            $.ajax({
                                type: 'POST',
                                url: "{{ route('jobs.photos.store', $painterJob) }}",
                                data: formData,
                                cache: false,
                                contentType: false,
                                processData: false,
                                success: function(response) {
                                    showSuccess(response.message);
                                    $('#imageInput').val('');
                                    $('#imagePreview').html('');
                                },
                                error: function(response) {
                                    showError('An error occurred while uploading the image.');
                                    console.log('Error:', response);
                                }
                            });
                        }
                    } else {
                        $.ajax({
                            type: 'POST',
                            url: "{{ route('jobs.photos.store', $painterJob) }}",
                            data: formData,
                            cache: false,
                            contentType: false,
                            processData: false,
                            success: function(response) {
                                showSuccess(response.message);
                                $('#imageInput').val('');
                                $('#imagePreview').html('');
                            },
                            error: function(response) {
                                showError('An error occurred while uploading the image.');
                                console.log('Error:', response);
                            }
                        });
                    }
                },
                error: function(response) {
                    showError('An error occurred during the request.');
                    console.log('Error:', response);
                }
            });
        });
    });
</script>




</html>


