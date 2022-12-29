@extends('frontend.master')
@section('content')
 <!-------Register--------->
 <div class="register">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <form method="post"action="{{ route('user.login') }}">
            @csrf
            <h3>Login Here</h3>

            <label for="usernum">UserNumber</label>
            <input
              type="text"
              placeholder="Enter email "
              id=""
              name="email"
            />

            <label for="password">Password</label>
            <input type="password" placeholder="Password" id="password" name="password" />

            <button>Login</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-------End Register--------->
@endsection