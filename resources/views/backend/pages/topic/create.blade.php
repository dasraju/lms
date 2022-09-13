@extends('backend.master');
@section('title')
@endsection

@section('content')
<div class="main-content">
    <section class="section">
      <div class="row ">
        <div class="col-12 col-md-12 col-lg-12">
            <form action="{{route('topic.store')}}" method="post">
                @csrf
            <div class="card">
                <div class="card-header">
                  <h4>Add New Topic</h4>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group  col-md-6 ">
                            <label>Select Chapter</label>
                            <select class="form-control" name="chapter">
                                <option value="">--select--</option>
                                @foreach ($chapter as $cat )
                                <option style="mt-2" value="{{$cat->id}}">{{$cat->name}}-{{$cat->subsubcategory->name}}-{{$cat->subsubcategory->subcategory->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Name</label>
                            <input type="text" class="form-control" id="inputEmail4" name="name" value="{{old('name')}}" placeholder="Topic Name">
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
