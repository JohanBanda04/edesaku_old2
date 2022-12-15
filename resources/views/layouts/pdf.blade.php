<!doctype html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>e-Desaku</title>
    <style>
        body {
            margin: 0;
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        }
        table, th, td {
            border: 1px solid #777;
            border-collapse: collapse;
            padding: 5px 10px;
        }
        th {
            text-align: left;
            font-size: 1rem;
            font-weight: 400;
        }
    </style>
</head>

<body>
    <div>
        @include('partials.alert')
        @yield('main_section')
    </div>
    @yield('script_section')
</body>

</html>