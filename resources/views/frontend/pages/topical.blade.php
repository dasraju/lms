@extends('frontend.master')
@section('content')


  <!-------Revision Course Name--------->
    <div class="rev_name">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="rev_top">
              <div class="rev_title">
                <h1>MIDDLE SCHOOL PHYSICS TOPICAL QUESTION</h1>
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
                  <i class="fa-regular fa-circle-question"></i> M.C.Q.
                  <span>(Free)</span>
                </h6>
              </div>
              <div class="rev_sub_topic">
                <ul>
                    @foreach ($chapters as $key=> $chapter )
                    <li>
                        <a href="topical_details.html"><i class="fa-brands fa-slack"></i>{{$chapter->name}}</a>
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
                  <i class="fa-solid fa-book-open"></i>THEORY
                  <span>(Free)</span>
                </h6>
              </div>
              <div class="rev_sub_topic">
                <ul>
                  @foreach ($chapters as $key=> $chapter )
                    <li>
                        <a href="topical_details.html"><i class="fa-brands fa-slack"></i>{{$chapter->name}}</a>
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
