@extends('frontend.master')
@section('content') 
   
   <!---------Course Banner----------->
    <div class="course_banner">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="course_ban">
              <div class="crs_left">
                <h1>
                  Let’s bring a balance in your School
                </h1>
              </div>
              <div class="crs_right">
                <a href="#">Get Started</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!---------End Course Banner----------->

    <!---------- Course ----------->
    <div class="course_body">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-sm-6 col-12">
            <div class="courses">
              <div class="course_img">
                <a href="{{route('course.details',11)}}">
                  <img src="{{asset('assets/frontend/')}}/img/courses/course-1.jpg" alt="course-1" />
                </a>
                <div class="offer percent">
                  <p>FEATURED</p>
                </div>
              </div>
              <div class="course_title">
                <a href="{{route('course.details',11)}}">
                  <h4>
                    Combo Offer!! (Emotional Selfcare & Positive Parenting)
                  </h4>
                </a>
              </div>
              <div class="course_sub">
                <h5>
                  🌟🌟🌟 লাইফস্প্রিংয়ের বিশেষ এই Combo Offer সম্পর্কে যেকোনো
                  তথ্য জানতে অথবা রেজিস্ট্রেশন করতে এখনই যোগাযোগ করুন!
                </h5>
              </div>
              <div class="course_lvl">
                <p><i class="fa-solid fa-sliders"></i> All Levels</p>
              </div>
              <div class="course_tk">
                <h5><span>৳ 5,000.00</span>.00</h5>
              </div>
              <div class="course_btn">
                <button>Add to cart</button>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-sm-6 col-12">
            <div class="courses">
              <div class="course_img">
                <a href="{{route('course.details',11)}}">
                  <img src="./images/courses/course-1.jpg" alt="course-1" />
                </a>
                <div class="offer percent">
                  <p>FEATURED</p>
                </div>
              </div>
              <div class="course_title">
                <a href="course_details.html">
                  <h4>
                    Combo Offer!! (Emotional Selfcare & Positive Parenting)
                  </h4>
                </a>
              </div>
              <div class="course_sub">
                <h5>
                  🌟🌟🌟 লাইফস্প্রিংয়ের বিশেষ এই Combo Offer সম্পর্কে যেকোনো
                  তথ্য জানতে অথবা রেজিস্ট্রেশন করতে এখনই যোগাযোগ করুন!
                </h5>
              </div>
              <div class="course_lvl">
                <p><i class="fa-solid fa-sliders"></i> All Levels</p>
              </div>
              <div class="course_tk">
                <h5><span>৳ 5,000.00</span>.00</h5>
              </div>
              <div class="course_btn">
                <button>Add to cart</button>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-sm-6 col-12">
            <div class="courses">
              <div class="course_img">
                <a href="{{route('course.details',11)}}">
                  <img src="{{asset('assets/frontend/')}}/img/courses/course-1.jpg" alt="course-1" />
                </a>
                <div class="offer percent">
                  <p>FEATURED</p>
                </div>
              </div>
              <div class="course_title">
                <a href="course_details.html">
                  <h4>
                    Combo Offer!! (Emotional Selfcare & Positive Parenting)
                  </h4>
                </a>
              </div>
              <div class="course_sub">
                <h5>
                  🌟🌟🌟 লাইফস্প্রিংয়ের বিশেষ এই Combo Offer সম্পর্কে যেকোনো
                  তথ্য জানতে অথবা রেজিস্ট্রেশন করতে এখনই যোগাযোগ করুন!
                </h5>
              </div>
              <div class="course_lvl">
                <p><i class="fa-solid fa-sliders"></i> All Levels</p>
              </div>
              <div class="course_tk">
                <h5><span>৳ 5,000.00</span>.00</h5>
              </div>
              <div class="course_btn">
                <button>Add to cart</button>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-sm-6 col-12">
            <div class="courses">
              <div class="course_img">
                <a href="course_details.html">
                  <img src="./images/courses/course-1.jpg" alt="course-1" />
                </a>
                <div class="offer percent">
                  <p>FEATURED</p>
                </div>
              </div>
              <div class="course_title">
                <a href="course_details.html">
                  <h4>
                    Combo Offer!! (Emotional Selfcare & Positive Parenting)
                  </h4>
                </a>
              </div>
              <div class="course_sub">
                <h5>
                  🌟🌟🌟 লাইফস্প্রিংয়ের বিশেষ এই Combo Offer সম্পর্কে যেকোনো
                  তথ্য জানতে অথবা রেজিস্ট্রেশন করতে এখনই যোগাযোগ করুন!
                </h5>
              </div>
              <div class="course_lvl">
                <p><i class="fa-solid fa-sliders"></i> All Levels</p>
              </div>
              <div class="course_tk">
                <h5><span>৳ 5,000.00</span>.00</h5>
              </div>
              <div class="course_btn">
                <button>Add to cart</button>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="course_pagi">
              <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                  <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                    </a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!---------- End Course ----------->

 @endsection   