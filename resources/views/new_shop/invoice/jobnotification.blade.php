<!DOCTYPE html>
<html>
<head>
    <style>
        p {
            text-align: justify;
        }
        .button {
            display: block;
            width: 200px;
            margin: 20px auto;
            padding: 10px;
            background-color: #ff6107;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <p>Dear {{ $name }},</p>

    <p>Congratulations! You have received a new job assignment. The address is: <strong>{{ $address }}</strong>. <br> Please find the details below:</p>
    
    <strong>{{ $extrasMessage }}</strong>
    <p>Price: <strong>{{ $price }}</strong></p>

    <a href="https://testqa.orderr360.net/{{ $jobid }}" class="button">Press the button to see the Job</a>


    <p>If you have any questions or need further information, please do not hesitate to contact us.</p>

    <p>Best Regards,<br>
    The Team at Order360</p>
</body>
</html>
