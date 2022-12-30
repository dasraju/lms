@extends('frontend.master')
@section('content')
<!-------Revision Course Name--------->
    <div class="rev_name">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="rev_top">
              <div class="rev_title">
                <h1>MIDDLE SCHOOL PHYSICS REVISION NOTES</h1>
              </div>
              <div class="rev_search">
                <div class="input-group">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Search"
                    aria-label="Recipient's username"
                    aria-describedby="button-addon2"
                  />
                  <button>
                    <i class="fa-solid fa-magnifying-glass"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-------End Revision Course Name--------->

    <!------- Revision Subject ----------->
    @guest
    <div class="rev">
      <div class="container-fluid">
        <div class="row">
             @foreach ($chapters as $key=> $chapter )
                <div class="col-md-6 col-12">
                    <div class="rev_body">
                    <div class="rev_sub_name">
                        <h6>
                        <i class="fa-solid fa-book"></i> {{$chapter->name}}
                        @if($chapter->type =='free')
                        <span>(Free)</span>
                        @else
                        <span>(Premium)</span>
                        @endif
                        </h6>
                    </div>
                    <div class="rev_sub_topic">
                         @if($chapter->type =='free')
                        <ul>
                            @foreach (topic($chapter->id) as $topic )
                            <li>
                                <a href="{{ route('topic.files',$topic->id)  }}"
                                ><i class="fa-brands fa-slack"></i>{{$topic->name}}</a
                                >
                            </li>
                            @endforeach
                        
                        </ul>
                        @else
                         <ul>
                            <li>
                                <span>No free topic</span>
                            </li>
                         </ul>

                        @endif
                    </div>
                    </div>
                </div>
             @endforeach   
      
        
          
        </div>
      </div>
    </div>
    @endguest
    @auth
    <div class="rev">
      <div class="container-fluid">
        <div class="row">
             @foreach ($chapters as $key=> $chapter )
                <div class="col-md-6 col-12">
                    <div class="rev_body">
                    <div class="rev_sub_name">
                        <h6>
                        <i class="fa-solid fa-book"></i> {{$chapter->name}}
                        @if($chapter->type =='free')
                        <span>(Free)</span>
                        @else
                        <span>(Premium)</span>
                        @endif
                        </h6>
                    </div>
                    <div class="rev_sub_topic">
                         @if($chapter->type =='free')
                        <ul>
                            @foreach (topic($chapter->id) as $topic )
                            <li>
                                <a href="{{ route('topic.files',$topic->id)  }}"
                                ><i class="fa-brands fa-slack"></i>{{$topic->name}}</a
                                >
                            </li>
                            @endforeach
                        
                        </ul>
                        @elseif ($chapter->type =='paid')
                        
                        @can($chapter->unique_name)
                        <ul>
                          @foreach (topic($chapter->id) as $topic )
                          <li>
                              <a href="{{ route('topic.files',$topic->id)  }}"
                              ><i class="fa-brands fa-slack"></i>{{$topic->name}}</a
                              >
                          </li>
                          @endforeach
                      
                      </ul>
                        @endcan
                        @else
                         <ul>
                            <li>
                                <span>No free topic</span>
                            </li>
                         </ul>

                        @endif
                    </div>
                    </div>
                </div>
             @endforeach   
      
        
          
        </div>
      </div>
    </div>
    @endauth
   
    <!------- End Revision Subject ----------->




















    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Revision</h6>
                <h1 class="mb-5">Revision Notes</h1>
            </div>
             <div class="row g-4">
                @foreach ($chapters as $key=> $chapter )
                @guest
                <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="img/team-1.jpg" alt="">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">

                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">{{$chapter->name}}
                                @if($chapter->type =='free')
                                <span style="color:green;font-size:10px"> free</span>
                                @else
                                <span style="color:red;font-size:10px"> Premium</span>
                                @endif
                            </h5>
                           
                            <div class="row">
                                @if($chapter->type =='free')
                                @foreach (topic($chapter->id) as $topic )
                                <div class="col-sm-6">
                                    <a href="{{ route('topic.files',$topic->id)  }}"  class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>{{$topic->name}}
                                        @if($topic->type =='free')
                                        <span style="color:green;font-size:10px"> free</span>
                                        @else
                                        <span style="color:red;font-size:10px"> Premium</span>
                                        @endif
                                    </a>
                                </div>
                                
                                @endforeach
                                @endif
                            </div>

                        </div>
                    </div>
                </div> 
                @endguest
              
                {{-- {{auth()->guard('web')->user()->id }} --}}
                @auth
                @can($chapter->unique_name)
                <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="img/team-1.jpg" alt="">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">

                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">{{$chapter->name}}</h5>
                            <div class="row">
                                @foreach (topic($chapter->id) as $topic )
                                <div class="col-sm-6">
                                    <a href="{{ route('topic.files',$topic->id)  }}"  class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>{{$topic->name}}</a>
                                </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div> 
                @endcan 
                @endauth
                
                
                @endforeach

            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Team Start -->
   
    <!-- Team End -->
@endsection
