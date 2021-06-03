<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{env("APP_NAME")}} @hasSection("ex-title")
            - @yield("ex-title")
        @endif
    </title>
    @include("layouts.master.css")
</head>
<body>
<div class="container">
    <div class="row p-3">
        <nav class="navbar navbar-expand-sm bg-light navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Users</a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="row">
        @yield("body")
    </div>
</div>
@include("layouts.master.js")
</body>
</html>