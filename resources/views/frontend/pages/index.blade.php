@extends('frontend.master')
 @section('content')
<div id="carousel">
    <div id="carouselExampleDark" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
          aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="10000">
          <img src="{{asset('assets/frontend/')}}/img/slider-1.jpg" alt="..." />
          <div class="carousel-caption d-none d-md-block">
            <h5>First slide label</h5>
            <p>
              Some representative placeholder content for the first slide.
            </p>
          </div>
        </div>
        <div class="carousel-item" data-bs-interval="2000">
          <img src="{{asset('assets/frontend/')}}/img/slider-3.jpg" alt="..." />
          <div class="carousel-caption d-none d-md-block">
            <h5>Second slide label</h5>
            <p>
              Some representative placeholder content for the second slide.
            </p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="{{asset('assets/frontend/')}}/img/slider-2.jpg" alt="..." />
          <div class="carousel-caption d-none d-md-block">
            <h5>Third slide label</h5>
            <p>
              Some representative placeholder content for the third slide.
            </p>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
  <!--------End Slider-------->

 

  <!------- Card Carousel-------->
  <div class="card_course">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="course_card_title">
            <h1>Our <span>Courses</span></h1>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="card_carousel">
    <div class="container-fluid my-3 carousel">
      <div class="owl-carousel owl-theme">
        <div class="row">
          <div class="col">
            <div class="card">
              <a href="course_details.html"><img src="{{asset('assets/frontend/')}}/img/courses/course-3.jpg" class="card-img-top" alt="" /></a>

              <div class="card-body">
                <h6 class="card-title">
                  Combo Offer!! (Emotional Selfcare & Positive Parenting)
                </h6>
              </div>
              <div class="card_text">
                <p>11 Lessons</p>
                <p>16 hours</p>
              </div>
              <div class="card_amount">
                <h6>
                  <span>৳ 50,000.00</span><span class="offer">৳ 50,000.00</span>
                </h6>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="card">
              <a href="course_details.html"><img src="{{asset('assets/frontend/')}}/img/courses/course-3.jpg" class="card-img-top" alt="" /></a>

              <div class="card-body">
                <h6 class="card-title">
                  Combo Offer!! (Emotional Selfcare & Positive Parenting)
                </h6>
              </div>
              <div class="card_text">
                <p>11 Lessons</p>
                <p>16 hours</p>
              </div>
              <div class="card_amount">
                <h6>
                  <span>৳ 50,000.00</span><span class="offer">৳ 50,000.00</span>
                </h6>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="card">
              <a href="course_details.html"><img src="{{asset('assets/frontend/')}}/img/courses/course-3.jpg" class="card-img-top" alt="" /></a>

              <div class="card-body">
                <h6 class="card-title">
                  Combo Offer!! (Emotional Selfcare & Positive Parenting)
                </h6>
              </div>
              <div class="card_text">
                <p>11 Lessons</p>
                <p>16 hours</p>
              </div>
              <div class="card_amount">
                <h6>
                  <span>৳ 50,000.00</span><span class="offer">৳ 50,000.00</span>
                </h6>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="card">
              <a href="course_details.html"><img src="{{asset('assets/frontend/')}}/img/courses/course-3.jpg" class="card-img-top" alt="" /></a>

              <div class="card-body">
                <h6 class="card-title">
                  Combo Offer!! (Emotional Selfcare & Positive Parenting)
                </h6>
              </div>
              <div class="card_text">
                <p>11 Lessons</p>
                <p>16 hours</p>
              </div>
              <div class="card_amount">
                <h6>
                  <span>৳ 50,000.00</span><span class="offer">৳ 50,000.00</span>
                </h6>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="card">
              <a href="course_details.html"><img src="{{asset('assets/frontend/')}}/img/courses/course-3.jpg" class="card-img-top" alt="" /></a>

              <div class="card-body">
                <h6 class="card-title">
                  Combo Offer!! (Emotional Selfcare & Positive Parenting)
                </h6>
              </div>
              <div class="card_text">
                <p>11 Lessons</p>
                <p>16 hours</p>
              </div>
              <div class="card_amount">
                <h6>
                  <span>৳ 50,000.00</span><span class="offer">৳ 50,000.00</span>
                </h6>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="card">
              <a href="course_details.html"><img src="{{asset('assets/frontend/')}}/img/courses/course-3.jpg" class="card-img-top" alt="" /></a>

              <div class="card-body">
                <h6 class="card-title">
                  Combo Offer!! (Emotional Selfcare & Positive Parenting)
                </h6>
              </div>
              <div class="card_text">
                <p>11 Lessons</p>
                <p>16 hours</p>
              </div>
              <div class="card_amount">
                <h6>
                  <span>৳ 50,000.00</span><span class="offer">৳ 50,000.00</span>
                </h6>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="card">
              <a href="course_details.html"><img src="{{asset('assets/frontend/')}}/img/courses/course-3.jpg" class="card-img-top" alt="" /></a>

              <div class="card-body">
                <h6 class="card-title">
                  Combo Offer!! (Emotional Selfcare & Positive Parenting)
                </h6>
              </div>
              <div class="card_text">
                <p>11 Lessons</p>
                <p>16 hours</p>
              </div>
              <div class="card_amount">
                <h6>
                  <span>৳ 50,000.00</span><span class="offer">৳ 50,000.00</span>
                </h6>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="card">
              <a href="course_details.html"><img src="{{asset('assets/frontend/')}}/img/courses/course-3.jpg" class="card-img-top" alt="" /></a>

              <div class="card-body">
                <h6 class="card-title">
                  Combo Offer!! (Emotional Selfcare & Positive Parenting)
                </h6>
              </div>
              <div class="card_text">
                <p>11 Lessons</p>
                <p>16 hours</p>
              </div>
              <div class="card_amount">
                <h6>
                  <span>৳ 50,000.00</span><span class="offer">৳ 50,000.00</span>
                </h6>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <!------- End Card Carousel-------->

  <!-------- Feedback---------->
  <div class="card_course">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="course_card_title">
            <h1>Students <span>Feedback</span></h1>
            <a href="">View All</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <section class="feedback" id="feedback-section">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="feed_body">
                  <div class="feed_img">
                    <img src="{{asset('assets/frontend/')}}/img/feedback.jpg" alt="" />
                  </div>
                  <div class="feed_title">
                    <h6>Lorem ipsum dolor sit amet consectetur</h6>
                  </div>
                  <div class="feed_text">
                    <p>
                      Lorem ipsum dolor sit amet consectetur, adipisicing
                      elit. Eum facilis modi placeat minima corrupti
                      consequuntur fuga facere quisquam ratione, nihil
                      doloribus quas perspiciatis deserunt iure fugit, ab quam
                      voluptatibus. Tempore! Lorem ipsum dolor sit amet,
                      consectetur adipisicing elit. Obcaecati reiciendis
                      veritatis blanditiis laudantium enim unde voluptates
                      dicta nihil reprehenderit nam?
                    </p>
                  </div>
                  <div class="feed_position">
                    <p>
                      <span> Lorem ipsum</span> dolor sit amet consectetur
                      adipisicing elit. Illum, ab?
                    </p>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="feed_body">
                  <div class="feed_img">
                    <img src="./images/feedback.jpg" alt="" />
                  </div>
                  <div class="feed_title">
                    <h6>Lorem ipsum dolor sit amet consectetur</h6>
                  </div>
                  <div class="feed_text">
                    <p>
                      Lorem ipsum dolor sit amet consectetur, adipisicing
                      elit. Eum facilis modi placeat minima corrupti
                      consequuntur fuga facere quisquam ratione, nihil
                      doloribus quas perspiciatis deserunt iure fugit, ab quam
                      voluptatibus. Tempore! Lorem ipsum dolor sit amet,
                      consectetur adipisicing elit. Obcaecati reiciendis
                      veritatis blanditiis laudantium enim unde voluptates
                      dicta nihil reprehenderit nam?
                    </p>
                  </div>
                  <div class="feed_position">
                    <p>
                      <span>Lorem ipsum </span> dolor sit amet consectetur
                      adipisicing elit. Illum, ab?
                    </p>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="feed_body">
                  <div class="feed_img">
                    <img src="./images/feedback.jpg" alt="" />
                  </div>
                  <div class="feed_title">
                    <h6>Lorem ipsum dolor sit amet consectetur</h6>
                  </div>
                  <div class="feed_text">
                    <p>
                      Lorem ipsum dolor sit amet consectetur, adipisicing
                      elit. Eum facilis modi placeat minima corrupti
                      consequuntur fuga facere quisquam ratione, nihil
                      doloribus quas perspiciatis deserunt iure fugit, ab quam
                      voluptatibus. Tempore! Lorem ipsum dolor sit amet,
                      consectetur adipisicing elit. Obcaecati reiciendis
                      veritatis blanditiis laudantium enim unde voluptates
                      dicta nihil reprehenderit nam?
                    </p>
                  </div>
                  <div class="feed_position">
                    <p>
                      <span> Lorem ipsum</span> dolor sit amet consectetur
                      adipisicing elit. Illum, ab?
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
              data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
              data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!------- Health Services ---------->
  <div class="card_course">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="course_card_title">
            <h1>Our <span>Services</span></h1>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="health">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4 col-sm-6 col-12">
          <a href="">
            <div class="health_item">
              <div class="health_img">
                <img src="{{asset('assets/frontend/')}}/img/a.png" alt="" />
              </div>
              <div class="health_title">
                <h2>Psychological Counseling</h2>
              </div>
              <div class="health_link">
                <h6>
                  Learn More <i class="fa-solid fa-arrow-right-long"></i>
                </h6>
              </div>
            </div>
          </a>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
          <a href="">
            <div class="health_item">
              <div class="health_img">
                <img src="{{asset('assets/frontend/')}}/img/b.png" alt="" />
              </div>
              <div class="health_title">
                <h2>Psychological Counseling</h2>
              </div>
              <div class="health_link">
                <h6>
                  Learn More <i class="fa-solid fa-arrow-right-long"></i>
                </h6>
              </div>
            </div>
          </a>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
          <a href="">
            <div class="health_item">
              <div class="health_img">
                <img src="{{asset('assets/frontend/')}}/img/c.png" alt="" />
              </div>
              <div class="health_title">
                <h2>Psychological Counseling</h2>
              </div>
              <div class="health_link">
                <h6>
                  Learn More <i class="fa-solid fa-arrow-right-long"></i>
                </h6>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
  <!------- End Health Services ---------->

  
 
@endsection
