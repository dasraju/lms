@extends('frontend.master')
@section('content')
 <!-------Register--------->
 <div class="register">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <form>
            <h3>Login Here</h3>

            <label for="usernum">UserNumber</label>
            <input
              type="number"
              placeholder="Enter Phone Number"
              id="usernum"
            />

            <label for="password">Password</label>
            <input type="password" placeholder="Password" id="password" />

            <button>Login</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-------End Register--------->
@endsection