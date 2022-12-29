@extends('frontend.master')
@section('content')

   <!-------Revision Course Name--------->
    <div class="rev_name">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="rev_top">
              <div class="rev_title">
                <h1>MIDDLE SCHOOL PHYSICS RESOURCES</h1>
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
     <div class="rev">
      <div class="container-fluid">
        <div class="row">
          @foreach ($folders as $items )
             <div class="col-lg-6 col-md-6 col-12">
            <div class="rev_body">
              <div class="rev_sub_name">
                <h6>
                  <i class="fa-solid fa-book-bookmark"></i> {{$items->title}}
                  <span>(Free)</span>
                </h6>
              </div>
              <div class="rev_sub_topic rev_dev_list">
                <ul>
                    @foreach ($items->folderpdf as $item )
                    <li>
                          <div class="rev_det_file">
                            <p><i class="fa-brands fa-slack"></i>{{$item->title}}</p>
                          </div>
                        <div class="rev_det_icon">
                            @if ($item->price_type == 'paid' || $item->published == '0')
                                <button><i class="fa-solid fa-lock"></i></button>
                            @else
                                @if ($item->view == '1')
                                <button><i class="fa-regular fa-eye"></i></button>
                                @endif
                                @if ($item->download == '1')
                                    <button><i class="fa-solid fa-download"></i></button>
                                @endif
                                
                            @endif
                        
                        
                        </div>
                
                    </li>
                    @endforeach
                 
                </ul>
              </div>
            </div>
          </div>
          @endforeach
         
         
        </div>
      </div>
    </div>
    <!------- End Revision Subject ----------->



   
@endsection
