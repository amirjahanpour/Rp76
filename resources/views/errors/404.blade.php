<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{env("APP_NAME")}} - 429</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset("assets/media/image/favicon.png")}}">

    <!-- Theme Color -->
    <meta name="theme-color" content="#5867dd">

    <!-- Plugin styles -->
    <link rel="stylesheet" href="{{asset("vendors/bundle.css")}}" type="text/css">

    <!-- App styles -->
    <link rel="stylesheet" href="{{asset("assets/css/app.css")}}" type="text/css">
</head>

<body class="bg-white h-100-vh p-t-0">

<!-- begin::page loader-->
<div class="page-loader">
    <div class="spinner-border"></div>
    <span>در حال بارگذاری ...</span>
</div>
<!-- end::page loader -->

<div class="container h-100-vh">
    <div class="row align-items-center h-100-vh">
        <div class="col-lg-6 p-t-b-25">
            <img class="img-fluid" src="{{asset("assets/media/svg/404.svg")}}" alt="image">
        </div>
        <div class="col-lg-4 offset-lg-1 p-t-10">
            <h1>این صفحه رو تموم کردیم!</h1>
            <p>ولی مشابه‌اش رو داریم.</p>
            <a href="{{url()->previous()}}" title="بازگشت" class="text-dribbble">برگرد عقب <i class="fa fa-arrow-circle-right"></i></a>
            <p class="small text-muted text-center">Error : {{session()->get("errorCode")}}</p>
        </div>
    </div>
</div>

<!-- Plugin scripts -->
<script src="{{asset("vendors/bundle.js")}}"></script>

<!-- App scripts -->
<script src="{{asset("assets/js/app.js")}}"></script>
</body>

</html>
