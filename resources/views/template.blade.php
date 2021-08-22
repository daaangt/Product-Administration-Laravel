<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <link rel="icon" href="\images\cropped-icone-32x32.png" sizes="32x32" />
    <link rel="icon" href="\images\cropped-icone-192x192.png" sizes="192x192" />
    <link rel="apple-touch-icon" href="\images\cropped-icone-180x180.png" />

    <title>pA - @yield('title')</title>

    <style>
        .bg-blue {
            background-color: rgba(13, 110, 253, .7);
        }

        .text-blue {
            color: rgba(13, 110, 253, .7);
        }

        @media (max-width: 768px) {
            .card-direction {
                flex-direction: column;
            }
        }

    </style>
</head>

<body>
    <div class="container-fluid p-0">
        @yield('main')
    </div>
</body>

</html>
