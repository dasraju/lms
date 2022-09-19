@extends('frontend.master')
@section('content')




    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5" >




            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Team Start -->
    <div class="container-xxl ">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Past Paper</h6>
                <h1 class="mb-5">Past Paper Solutions</h1>
            </div>
            <div class="row g-4">
                @foreach ($chapters as $key=> $chapter )
                <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="img/team-1.jpg" alt="">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">

                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">{{$chapter->name}}</h5>
                            @foreach (topic($chapter->id) as $topic )
                            <small>
                                <a href="#" class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>{{$topic->name}}</a>
                            </small>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- Team End -->
@endsection
