<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

   @include('frontend.layouts.css')
  <title>Home</title>
</head>

<body>
  @include('sweetalert::alert')
  <!-- Fixed -->
  <div id="fixed"></div>
  <!-- Fixed -->
  <!----- Fixed_top------->
    @include('frontend.layouts.header')





  <!--------Slider-------->
   @yield('content')
  <!--------End Feedback---------->

  <!--------Footer-------->
   @include('frontend.layouts.footer')

  <!--====== Start Top to Bootom Scroll button=====-->

  <i class="fas fa-arrow-circle-up" id="bottom-to-top"></i>

  <!--====== End Top to Bootom Scroll button=====-->

  @include('frontend.layouts.js')
    @yield('page-js');
  <script>
    new bootnavbar();
  </script>
</body>

</html>