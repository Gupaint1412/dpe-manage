<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
     <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <link href="{{ asset('tailadmin/build/style.css') }}" rel="stylesheet">
    <style>
        body {
            font-family: "Kanit", sans-serif;
            font-weight: 400;
            font-style: normal;
            min-height: 100vh;
            display: flex;
            justify-content: center; /* จัดกึ่งกลางแนวนอน */
            align-items: center; /* จัดกึ่งกลางแนวตั้ง */
            background-color: #f8f9fa; /* สีพื้นหลังอ่อนๆ คล้าย Bootstrap default */
        }
    </style>
    @stack('css')
  </head>
  <body>
    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    @stack('js')
  </body>
</html>