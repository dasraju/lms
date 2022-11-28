@extends('backend.master');
@section('title')
@endsection

@section('content')
<div class="main-content">
    <section class="section">
      <div class="row ">
        <div class="col-12 col-md-12 col-lg-12">
            <form action="{{route('topical-chapter.store')}}" method="post">
                @csrf
            <div class="card">
                <div class="card-header">
                  <h4>Add New Chapter</h4>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group  col-md-6 ">
                            <label>Select Part</label>
                            <select class="form-control" name="part">
                                <option value="">--select--</option>
                                @foreach ($parts as $cat )
                                <option value="{{$cat->id}}">{{$cat->name}} <span style="color:red">-({{$cat->subsubcategory->name}})</span> </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Name</label>
                            <input type="text" class="form-control" id="inputEmail4" name="name" value="{{old('name')}}" placeholder="Chapter Name">
                            <input type="hidden" name="chap_category" value='{{$category}}'>
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
