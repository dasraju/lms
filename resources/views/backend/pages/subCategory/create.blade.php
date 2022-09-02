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
                  <h4>Add New Sub Category</h4>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group">
                            <label>Select</label>
                            <select class="form-control">
                            <option>Option 1</option>
                            <option>Option 2</option>
                            <option>Option 3</option>
                            </select>
                        </div>
                    </div>

                        <div class="form-row">
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
