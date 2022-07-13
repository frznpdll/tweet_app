<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href={{ asset("css/vendor/bootstrap.min.css") }} rel="stylesheet">
    <link href={{ asset("css/flat-ui.css") }} rel="stylesheet">
    <link href={{ asset("css/style.css") }} rel="stylesheet">
    <title>{{ $title }}</title>
</head>
<body>

    <div class="container">
        {{ $slot }}
    </div>

{{-- <script src="https://unpkg.com/popper.js@1.14.1/dist/umd/popper.min.js" crossorigin="anonymous"></script> --}}

<script src="http://vjs.zencdn.net/6.6.3/video.js"></script>

<script src={{ asset("scripts/flat-ui.js") }}></script>
<script src={{ asset("scripts/main.js") }}></script>

</body>
</html>
