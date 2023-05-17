<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Verify Email</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/body_header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/body_footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/77b9f618ff.js" crossorigin="anonymous"></script>
</head>


<body>
    @csrf

    @component('mail::message')

    <div>
        # Verify your email address

        Please click the button below to verify your email address:

        @component('mail::button', ['url' => $verificationUrl])
            Verify Email Address
        @endcomponent

        If you did not create an account, no further action is required.

        Thanks,
        {{ config('app.name') }}
    @endcomponent
</body>

</html>


