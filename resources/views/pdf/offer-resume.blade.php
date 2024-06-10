<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>{{ $offer->title }}</title>

    <style>
        @page {
            margin: 0mm 0mm;
            padding: 0;
        }

        * {
            margin: 0;
        }

        html {
            font-size: 62.5%;
            /* 62.5% de 16px (valor por defecto) es 10px */
            margin: 0;
        }

        body {
            color: black;
            margin: 0;
            padding: 20mm 19mm 20mm 19mm;
        }

        a.title {
            font-size: 2rem;
            font-weight: bold;
            text-align: center;
            margin: 0 auto 2rem auto;
            text-decoration: none;
            color: rgb(50, 64, 222);
            cursor: pointer;
            text-decoration: underline;
        }

        .section {
            margin-bottom: 2rem;
        }

        p {
            font-size: 1.7rem;
            margin-bottom: 1.2rem;
        }

        span {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="section">
        <a class="title" href="{{ route('offers.show', $offer->id) }}">{{ $offer->title }}</a>
    </div>

    <div class="section">
        <p>{{ __('Company') }}: <span>{{ $offer->company }}</span></p>

        <p>{{ __('Available until') }}: <span>{{ $offer->expireFormated() }}</span></p>

        <p>{{ __('Category') }}: <span>{{ $offer->category->category }}</span></p>

        <p>{{ __('Salary') }}: <span>{{ $offer->salary->salary }}</span></p>
    </div>

    <div class="section">
        <p>{{ $offer->description }}</p>
    </div>
</body>

</html>
