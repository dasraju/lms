<nav style="height:110px" class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <img src="{{asset('assets/frontend/img/logo.png')}}" alt="" sizes="" srcset="">
        {{-- <h2 class="m-0 text-primary"><i class="fa fa-book me-3"></i>eLEARNING</h2> --}}
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="index.html" class="nav-item nav-link active">Home</a>



             @foreach (getMainMenu() as $menu )
             @if (count(getSubMenu($menu ->id))>0)
             <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{$menu->name}}</a>
                <div class="dropdown-menu fade-down m-0 p-2" style="">
                    <div class="row">
                        @foreach (getSubMenu($menu ->id) as $submenu)

                            <div class="col-md-6 ">
                                <span class="" style="border-bottom:5px solid blue">{{$submenu->name}}</span>
                                @foreach (getSubjectList($submenu->id) as $subject)
                                <a href="{{route('subject_details',$subject->id)}}" class="dropdown-item">{{$subject->name}}</a>
                                  {{-- <a href="{{route('get-subcat-details',[$subsubmenu->type,$subsubmenu->id])}}" class="dropdown-item">{{$subsubmenu->name}}</a> --}}
                                @endforeach
                            </div>

                        @endforeach
                   </div>

                </div>
            </div>
             @else
             <a href="courses.html" class="nav-item nav-link">{{ $menu->name}}</a>
             @endif

             @endforeach







        </div>
        <a href="" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Join Now<i class="fa fa-arrow-right ms-3"></i></a>
    </div>
</nav>
