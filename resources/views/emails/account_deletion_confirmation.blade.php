<!DOCTYPE html>
<html>

<head>
    <title>Account Deletion Confirmation</title>
</head>

<body>
    <p>Hello {{ $user->name }},</p>
    <p>You have requested to delete your account. To confirm this action, please click the link below:</p>
    <a href="{{ $url }}">Confirm Account Deletion</a>
    <p>If you did not request this, please ignore this email.</p>
</body>

</html>
