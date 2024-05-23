<!DOCTYPE html>
<html>
<head>
    <title>Your Invoice</title>

</head>
<body>
    <div class="container">
        <div class="header">
            Hello {{ $assign_painter ?? 'Valued Painter' }},
        </div>
        <div class="content">
            <p>You have an extra message:</p>
            <p>{{ $extrasMessage ?? 'No additional messages at this time.' }}</p>
        </div>
        <div class="footer">
            <p>Regards,</p>
            <p>{{ $main_painter ?? 'The Team' }}</p>
        </div>
    </div>
</body>
</html>
