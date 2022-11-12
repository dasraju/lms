@extends('frontend.authmaster')
@section('content')
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <form action="{{ route('user.login') }}" method="POST">
                @csrf
                <h3>User Login</h3>
                <label for="">mobile</label>
                <input type="text" name="mobile" id="">
                <button type="submit" class="btn btn-primary">login</button>
            </form>
        </div>
    </div>
@endsection