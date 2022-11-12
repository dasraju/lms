@extends('backend.master');
@section('title')
@endsection

@section('content')
<div class="main-content">
    <section class="section">
      <div class="row ">
        <div class="col-12 col-md-12 col-lg-12">
            <form action="{{route('chapter.update',$chapter->id)}}" method="post">
                @csrf
                @method('patch')
            <div class="card">
                <div class="card-header">
                  <h4>Edit Sub-category</h4>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group  col-md-6 ">
                            <label>Select Category</label>
                            <select class="form-control" name="subsubcategory">
                                <option value="">--select--</option>
                                @foreach ($subcats as $cat )
                                <option {{$chapter->sub_sub_category_id == $cat->id ?'selected':'' }} value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Name</label>
                            <input type="text" class="form-control" id="inputEmail4" name="name" value="{{  $chapter->name }}" placeholder="Category Name">
                        </div>

                        <div class="form-group col-md-6">
                          <label class="d-block">Type</label>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="type"{{$course->type == 'free'?'checked':''}}  type="radio" id="inlineradio1" value="free">
                            <label class="form-check-label" for="inlineradio1">Free</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="type" {{$course->type == 'paid'?'checked':''}} type="radio" id="inlineradio2" value="paid">
                            <label class="form-check-label" for="inlineradio2">Paid</label>
                          </div>

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
