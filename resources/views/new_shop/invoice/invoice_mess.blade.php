
<!DOCTYPE html>
<html>
<head>
    <title>Your Invoice</title>
</head>
<body>
    <p>Hello,</p>
    <!-- Check if $company_name is set, and provide a default value if not -->
    <p>You have just received the invoice from {{ $company_name ?? '' }}.</p>
    <p>Regards,</p>
    <!-- Assuming $user_name is always available; if not sure, handle similarly -->
    <p>{{ $user_name ?? '' }}</p>
</body>
</html>

