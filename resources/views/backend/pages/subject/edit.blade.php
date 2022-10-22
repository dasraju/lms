@extends('backend.master');
@section('title')
@endsection

@section('content')
<div class="main-content">
    <section class="section">
      <div class="row ">
        <div class="col-12 col-md-12 col-lg-12">
            <form action="{{route('subject.update',$subcat->id)}}" method="post">
                @csrf
                @method('patch')
            <div class="card">
                <div class="card-header">
                  <h4>Edit Subject</h4>
                </div>
                <div class="card-body">


                        <div class="form-row">
                            <div class="form-group  col-md-6 offset-md-3">
                                <label>Select Category</label>
                                <select class="form-control" name="category">
                                    <option value="">--select--</option>
                                    @foreach ($cats as $cat )
                                    <option {{$subcat->category_id == $cat->id ?'selected':'' }} value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Name</label>
                                <input type="text" class="form-control" id="inputEmail4" name="name" value="{{  $subcat->name }}" placeholder="Category Name">
                            </div>

                        </div>


                </div>
                <div class="card-footer">
                  <button class="btn btn-primary">Submit</button>
                </div>
              </div>
            </form>
        </div>
      </div>
    </section>
</div>
@endsection
