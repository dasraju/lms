@extends('backend.master');
@section('title')
@endsection

@section('content')
<div class="main-content">
    <section class="section">
      <div class="row ">
        <div class="col-12 col-md-12 col-lg-12">
            <form action="{{route('cats.update',$cat->id)}}" method="post">
                @csrf
                @method('patch')
            <div class="card">
                <div class="card-header">
                  <h4>Edit Category</h4>
                </div>
                <div class="card-body">

                        <div class="form-row">


                            <div class="form-group col-md-6">
                                <label>Select Category</label>
                                <select class="form-control" name="menu_head_id">
                                    <option value="">--select--</option>
                                    @foreach ($menus as $cats )
                                    <option {{$cat->menu_head_id == $cats->id ?'selected':'' }} value="{{$cats->id}}">{{$cats->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Name</label>
                                <input type="text" class="form-control" id="inputEmail4" name="name" value="{{  $cat->name }}" placeholder="Category Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Slug</label>
                                <input type="text" class="form-control" id="inputEmail4" name="slug" value="{{$cat->cat_slug}}" placeholder="Category Slug">
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
