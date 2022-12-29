<div id="fixed_top">
    <!---------Header top--------->
    <div id="header_top">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="h_top_body">
              <div class="h_top_left">
                <ul>
                  <li>
                    <a href=""><i class="fa-solid fa-phone-flip"></i>+8809638 505
                      505</a>
                  </li>
                  <li>
                    <a href=""><i class="fa-solid fa-phone-flip"></i>+8809638 505
                      505</a>
                  </li>
                  <li>
                    <a href=""><i class="fa-regular fa-envelope"></i> Email</a>
                  </li>
                </ul>
              </div>
              <div class="h_top_right">
                <ul>
                  @guest
                  <li><a href="{{ route('user.login.form') }}">log in</a></li>
                  <li><a href="{{ route('user.registration') }}">Register</a></li>
                  @endguest
                  @auth
                  <li class="nav-item dropdown" >
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" href="{{ route('user.profile') }}">{{ auth()->user()->name }}</a>
                    
                  </li>
                  @endauth
                 
                
                  <li>
                    <a href=""><i class="fa-brands fa-facebook-f"></i></a>
                  </li>
                  <li>
                    <a href=""><i class="fa-regular fa-circle-play"></i></a>
                  </li>
                  <li>
                    <a href=""><i class="fa-brands fa-linkedin-in"></i></a>
                  </li>
                  <li>
                    <a href=""><i class="fa-brands fa-twitter"></i></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--------- End Header top--------->

    <!--------- Header---------->
    <div id="navbar">
      <nav class="navbar navbar-expand-lg navbar-light bg-light" id="main_navbar">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.html"><img src="{{asset('assets/frontend/')}}/img/logo.png" alt="" /></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-lg-0">
             <li class="nav-item">
                <a class="nav-link" aria-current="page" href="#">Home</a>
              </li>
              {{-- //menu level one --}}
                @foreach (getMainMenu() as $menu )
                  @if (count(getSubMenu($menu ->id))>0)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        {{$menu->name}}
                        </a>
                        {{-- //menu level two --}}
                        <ul class="dropdown-menu">
                        @foreach (getSubMenu($menu ->id) as $submenu)   
                        <li class="nav-item dropdown">
                            <a class="dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            {{$submenu->name}}
                            </a>
                            {{-- //menu level three --}}
                            <ul class="dropdown-menu">
                                @foreach (getSubjectList($submenu->id) as $subject)
                                <li>
                                    <a class="dropdown-item" href="{{route('subject_details',$subject->id)}}">{{$subject->name}}</a>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                         @endforeach
                        
                        </ul>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{$menu->name}}</a>
                    </li>
                   @endif 
                @endforeach
              
              
              <li class="nav-item">
                <a class="nav-link" href="{{route('course.list')}}">Courses</a>
              </li>
             
            </ul>
          </div>
        </div>
      </nav>
    </div>
    <!--------- End Header---------->

    <!-----------Meuu List--------->

    <!-----------Meuu List--------->
  </div>
  <!----- Fixed_top-------> 