<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset ('css/body_header.css') }}">
    <link rel="stylesheet" href="{{ asset ('css/body_footer.css') }}">
    <link rel="stylesheet" href="{{ asset ('css/main.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/77b9f618ff.js" crossorigin="anonymous"></script>
</head>


<body>
    <!--HEADER-->
    @php
        $body_header = file_get_contents(public_path('html/body_header.html'));
        echo $body_header;
    @endphp

    @php
        $main = file_get_contents(public_path('html/main.html'));
        echo $main;
    @endphp

    <!-- FOOTER-->
    @php
        $body_footer = file_get_contents(public_path('html/body_footer.html'));
        echo $body_footer;
    @endphp

    @php
        $footer = file_get_contents(public_path('html/footer.html'));
        echo $footer;
    @endphp
</body>

</html>
