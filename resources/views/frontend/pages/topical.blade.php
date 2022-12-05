@extends('frontend.master')
@section('content')


  <!-------Revision Course Name--------->
    <div class="rev_name">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="rev_top">
              <div class="rev_title">
                <h1>Topical Question</h1>
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
     <!------- Revision Subject ----------->
     <div class="rev">
      <div class="container-fluid">
        <div class="row">
             @foreach ($parts as $key=> $part )
                <div class="col-md-6 col-12">
                    <div class="rev_body">
                    <div class="rev_sub_name">
                        <h6>
                        <i class="fa-solid fa-book"></i> {{$part->name}}
                        @if($part->type =='free')
                        <span>(Free)</span>
                        @else
                        <span>(Premium)</span>
                        @endif
                        </h6>
                    </div>
                    <div class="rev_sub_topic">
                         @if($part->type =='free')
                        <ul>
                            @foreach (topical_chapter($part->id) as $chapter )
                            <li>
                                <a href="{{ route('topical.files',$chapter->id)  }}"
                                ><i class="fa-brands fa-slack"></i>{{$chapter->name}}</a
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
    <!------- End Revision Subject ----------->
    <!------- End Revision Subject ----------->




  


  
@endsection
