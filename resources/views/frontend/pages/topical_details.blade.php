@extends('frontend.master')
@section('content')
 <!-------Revision Course Name--------->
    <div class="rev_name">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="rev_top">
              <div class="rev_title">
                <h1>
                  Topical Question Details
                </h1>
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
        <div class="col-lg-4 col-md-6 col-12">
          <div class="rev_body">
            <div class="rev_sub_name">
              <h6>
                <i class="fa-regular fa-circle-question"></i> PDF QUESTION
                <span>(Premium)</span>
              </h6>
            </div>
            <div class="rev_sub_topic rev_dev_list">
              <ul>
                  @foreach ($notefilesqsn as $note )
                  <li>
                      <div class="rev_det_file">
                      <p><i class="fa-brands fa-slack"></i>{{$note->title}}</p>
                      </div>
                      <div class="rev_det_icon">
                        @if ($note->price_type == 'paid' || $note->published == '0')
                          <button><i class="fa-solid fa-lock"></i></button>
                        @else
                           @if ($note->view == '1')
                             <button><i class="fa-regular fa-eye"></i></button>
                           @endif
                           @if ($note->download == '1')
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
        <div class="col-lg-4 col-md-6 col-12">
          <div class="rev_body">
            <div class="rev_sub_name">
              <h6>
                <i class="fa-solid fa-file-pdf"></i> PDF SOLUTION
                <span>(premium)</span>
              </h6>
            </div>
            <div class="rev_sub_topic rev_dev_list">
              <ul>
                  @foreach ($notefilessol as $note )
                  <li>
                      <div class="rev_det_file">
                      <p><i class="fa-brands fa-slack"></i>{{$note->title}}</p>
                      </div>
                      <div class="rev_det_icon">
                        @if ($note->price_type == 'paid' || $note->published == '0')
                          <button><i class="fa-solid fa-lock"></i></button>
                        @else
                           @if ($note->view == '1')
                             <button><i class="fa-regular fa-eye"></i></button>
                           @endif
                           @if ($note->download == '1')
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
        <div class="col-lg-4 col-md-6 col-12">
          <div class="rev_body">
            <div class="rev_sub_name">
              <h6>
                <i class="fa-solid fa-video"></i> VIDEO SOLUTION
                <span>(premium)</span>
              </h6>
            </div>
            <div class="rev_sub_topic rev_dev_list">
              <ul>
                  @foreach ($videofiles as $video )
                  <li>
                      <div class="rev_det_file">
                      <p><i class="fa-brands fa-slack"></i>{{$video->title}}</p>
                      </div>
                      <div class="rev_det_icon">
                        @if ($video->price_type == 'paid' || $video->published == '0')
                          <button><i class="fa-solid fa-lock"></i></button>
                        @else
                           @if ($video->view == '1')
                             <button><i class="fa-regular fa-eye"></i></button>
                           @endif
                           @if ($video->download == '1')
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
      </div>
    </div>
  </div>
  <!------- End Revision Subject ----------->
    <!------- End Revision Subject ----------->
@endsection