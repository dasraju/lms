@extends('frontend.master')
@section('content')

    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Topic</h6>
                <h1 class="mb-5">{{ $topic->name }}</h1>
            </div>
             <div class="row g-4">
                
                <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="img/team-1.jpg" alt="">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">

                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">Pdf Notes</h5>
                            <div class="row">
                                @foreach ($notes as $note )
                                <div class="col-sm-6">
                                    <a href="#"  class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>{{$note->title}}</a>

                                    @if($note->view == '1')
                                    <a href="#"  class="mb-0 mr-2"><i class="fa fa-eye text-success"></i></a>
                                    @endif
                                    @if($note->download == '1')
                                    <a href="#"  class="mb-0 ml-2"><i class="fa fa-download text-danger"></i></a>
                                    @endif

                                </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
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
