<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>
    @yield('title')
  </title>
  @include('backend.layouts.css')
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      {{-- navbar --}}
      @include('backend.layouts.header')
      {{-- sidebar --}}
      @include('backend.layouts.sidebar')
      <!-- Main Content -->
     @yield('content')
      {{-- footer --}}
      @include('backend.layouts.footer')
      @include('backend.helpers.delete_modal')
    </div>
  </div>
  <!-- General JS Scripts -->
@include('backend.layouts.js')
@yield('page-js')
@include('sweetalert::alert')
 <script>
    function change_status(yy,dataUrl){
         let id = yy.attr('id')
        const cb = document.querySelector('#'+id);
        console.log(cb.checked);
        if(cb.checked){
            var newurl = dataUrl+'?status=1';
        }else{
            var newurl = dataUrl+'?status=0';
        }
        console.log(newurl);
        $.get(newurl, function(data){
            console.log(data)
            
        });
      };
 </script>
</body>
{{-- heelo --}}
<!-- index.html  21 Nov 2019 03:47:04 GMT -->
</html>
