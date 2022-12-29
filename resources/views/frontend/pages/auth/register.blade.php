@extends('frontend.master')
@section('content')
 <!-------Register--------->
 <div class="register">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <form action="{{ route('user.register') }}" method="post">
            @csrf
            <h3>Register Here</h3>

            <label for="username">User Name</label>
            <input type="text" placeholder="Enter Your Name" id="username" name="name" />

            <label for="usernum">User Number</label>
            <input
              type="number"
              placeholder="Enter Phone Number"
              id="usernum"
              name="phone"
            />

            <label for="useremail">User Email</label>
            <input
              type="email"
              placeholder="Enter Your Email"
              id="useremail"
              name="email"
            />

            <label for="password">Password</label>
            <input type="password" placeholder="Password" id="password" name="password"/>

            <button type="submit">Register</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-------End Register--------->
@endsection