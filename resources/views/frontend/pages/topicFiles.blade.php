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
                  {{ $topic->name }}
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
    <div class="rev">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6 col-12">
            <div class="rev_body">
              <div class="rev_sub_name">
                <h6>
                  <i class="fa-regular fa-pen-to-square"></i> notes
                  <span>(Free)</span>
                </h6>
              </div>
              <div class="rev_sub_topic rev_dev_list">
                <ul>
                    @foreach ($notes as $note )
                    <li>
                        <div class="rev_det_file">
                        <p><i class="fa-brands fa-slack"></i>{{$note->title}}</p>
                        </div>
                        <div class="rev_det_icon">
                        <button><i class="fa-regular fa-eye"></i></button
                        ><button><i class="fa-solid fa-download"></i></button
                        ><button><i class="fa-solid fa-lock"></i></button>
                        </div>
                    </li>
                    @endforeach
                 
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-12">
            <div class="rev_body">
              <div class="rev_sub_name">
                <h6>
                  <i class="fa-solid fa-video"></i> VIDEO LECTURES
                  <span>(premium)</span>
                </h6>
              </div>
              <div class="rev_sub_topic rev_dev_list">
                <ul>
                    @foreach ($videoes as $video )
                    <li>
                        <div class="rev_det_file">
                        <p><i class="fa-brands fa-slack"></i>{{$video->title}}</p>
                        </div>
                        <div class="rev_det_icon">
                        <button><i class="fa-regular fa-eye"></i></button
                        ><button><i class="fa-solid fa-download"></i></button
                        ><button><i class="fa-solid fa-lock"></i></button>
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
@endsection
