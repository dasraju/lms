@extends('frontend.master')
@section('content')

   <div class="rev_name">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="rev_top">
              <div class="rev_title">
                <h1>IB PHYSICS PAST PAPER SOLUTION</h1>
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

    <!------- Past Papper  ----------->
    <div class="rev">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="past_paper">
              <a href="{{route('resource.syllabus',$id)}}" >Book & Syllabus</a>
              <a href="{{route('resource.folders',$id)}}">Folders</a>
            </div>
          </div>
        </div>
      </div>
    </div>
 



   
@endsection
