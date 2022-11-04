@extends('backend.master');
@section('title')
@endsection

@section('content')
<div class="main-content">
    <section class="section">
      <div class="row ">
        <div class="col-12 col-md-12 col-lg-12">
            <form action="{{route('course.store')}}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="card">
                <div class="card-header">
                  <h4>Add New Course</h4>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group  col-md-6 ">
                            <label>Select Course Category</label>
                            <select class="form-control" name="category">
                                <option value="">--select--</option>

                                <option selected value="1">Physics</option>

                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Name</label>
                            <input type="text" class="form-control" name="name" id="inputEmail4" name="name" value="{{old('name')}}" placeholder="Course Name">
                        </div>
                    </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Description</label>
                                <textarea class="form-control" name="description"></textarea>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="d-block">Type</label>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" name="type" type="radio" id="inlineradio1" value="free">
                                  <label class="form-check-label" for="inlineradio1">Free</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" name="type" type="radio" id="inlineradio2" value="paid">
                                  <label class="form-check-label" for="inlineradio2">Paid</label>
                                </div>

                              </div>
                              <div class="form-group col-md-6">
                                <label class="d-block">Price</label>
                                <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                  </div>
                                  <input type="text" class="form-control" name='price' value="0" aria-label="Amount (to the nearest dollar)">
                                  <div class="input-group-append">
                                    <span class="input-group-text">.00</span>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group col-md-6">
                                <label for="inputEmail4">Total Time</label>
                                <input type="text" class="form-control" name="total_time" id="inputEmail4"  value="{{old('total_time')}}" placeholder=" 1.34">
                              </div>
                              <div class="form-group col-md-6">
                                <label>Select Instructor </label>
                                <select class="form-control" name="instructor">
                                    <option value="">--select--</option>
                                   @foreach ($instructor as  $ins)
                                    <option  value="{{$ins->id}}">{{$ins->name}}</option>
                                   @endforeach
    
    
                                </select>
                              </div>
                            <div class="form-group col-md-6">
                                <label>File</label>
                                <input type="file" name="cover_img" class="form-control">
                              </div>
                            <div class="form-group col-md-6">
                                <label class="d-block">Permissions</label>
                                <div class="form-check">
                                  <input class="form-check-input" name="featured" type="checkbox" id="defaultCheck1">
                                  <label class="form-check-label" for="defaultCheck1">
                                    Featured
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" name="published" type="checkbox" id="defaultCheck3">
                                  <label class="form-check-label" for="defaultCheck3">
                                    Published
                                  </label>
                                </div>
                              </div>
                        </div>


                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </div>
            </form>
        </div>
      </div>
    </section>
</div>
@endsection
