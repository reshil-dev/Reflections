<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" value="{{ csrf_token() }}" />
    <title>{{env('APP_NAME')}}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link href="{{ mix('css/app.css') }}" type="text/css" rel="stylesheet" />
</head>

<body>

    @if (Auth::check())
    @php
    $user_auth_data = [
    'isLoggedin' => true,
    'user' => Auth::user()
    ];
    @endphp
    @else
    @php
    $user_auth_data = [
    'isLoggedin' => false
    ];
    @endphp
    @endif
    <script>
        window.Laravel = JSON.parse(atob('{{ base64_encode(json_encode($user_auth_data)) }}'));
    </script>

    <div id="app">

        <app-header></app-header>

        <section class="section">
            <div class="container">
                <router-view></router-view>
            </div>
        </section>

    </div>
    </div>
    <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
</body>

</html>
