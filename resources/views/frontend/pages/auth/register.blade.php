@extends('frontend.master')
@section('content')
 <!-------Register--------->
 <div class="register">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <form>
            <h3>Register Here</h3>

            <label for="username">UserName</label>
            <input type="text" placeholder="Enter Your Name" id="username" />

            <label for="usernum">UserNumber</label>
            <input
              type="number"
              placeholder="Enter Phone Number"
              id="usernum"
            />

            <label for="useremail">UserEmail</label>
            <input
              type="email"
              placeholder="Enter Your Email"
              id="useremail"
            />

            <label for="password">Password</label>
            <input type="password" placeholder="Password" id="password" />

            <button>Register</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-------End Register--------->
@endsection