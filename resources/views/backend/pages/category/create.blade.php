@extends('backend.master');
@section('title')
@endsection

@section('content')
<div class="main-content">
    <section class="section">
      <div class="row ">
        <div class="col-12 col-md-12 col-lg-12">
            <form action="{{route('cats.store')}}" method="post">
                @csrf
            <div class="card">
                <div class="card-header">
                  <h4>Add New Category</h4>
                </div>
                <div class="card-body">

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Select Menu Head</label>
                                <select class="form-control" name="menu_head_id">
                                    <option value="">--select--</option>
                                    @foreach ($menus as $cat )
                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Name</label>
                                <input type="text" class="form-control" id="inputEmail4" name="name" value="{{old('name')}}" placeholder="Category Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Slug</label>
                                <input type="text" class="form-control" id="inputEmail4" name="slug" value="{{old('slug')}}" placeholder="Category Slug">
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
