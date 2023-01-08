@extends('frontend.master')
 @section('content')

  <!-------Menu List--------->
  <div class="menu_list">
    <div class="container-fluid">
      <div class="row">
       
        <div class="col-12">
           
          <div class="menu_btn">
            {{-- <button>Menu List <i class="fa-solid fa-chevron-down"></i></button> --}}
            <div class="menu_item">
              <div class="menu_item_top">
                <h5>   {{ $subject->category->menu->name }} > {{ $subject->category->name }} > {{ $subject->name }}</h5>
              </div>
              <div class="menu_item_bottom">
                <div class="menu_bottom_item">
                  <div class="menu_bottom_title">
                    <h6>{{ $subject->name }}</h6>
                  </div>
                  <div class="menu_bottom_list">
                    <ul>
                      @foreach ($data as $menu )
                          <li><a href="{{route('get-subcat-details',[ $menu->type, $menu->id])}}">{{$menu->name}}</a></li>
                       @endforeach
                     
                    </ul>
                   
                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-------End Menu List--------->
 

 @endsection
 @section('page-js')
   <script>
      $(document).ready( function () {
          $('#myTable').DataTable();
      } );
   </script>
 @endsection
