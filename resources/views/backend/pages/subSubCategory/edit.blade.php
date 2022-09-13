@extends('backend.master');
@section('title')
@endsection

@section('content')
<div class="main-content">
    <section class="section">
      <div class="row ">
        <div class="col-12 col-md-12 col-lg-12">
            <form action="{{route('sub-sub-cats.update',$subcat->id)}}" method="post">
                @csrf
                @method('patch')
            <div class="card">
                <div class="card-header">
                  <h4>Edit Sub-Sub-category</h4>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group  col-md-6 ">
                            <label>Select Sub Category</label>
                            <select class="form-control" name="subcategory">
                                <option value="">--select--</option>
                                @foreach ($cats as $cat )
                                <option {{$subcat->sub_category_id == $cat->id ?'selected':'' }} value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group  col-md-6">
                            <label>Select Type</label>
                            <select class="form-control" name="type" required>
                                <option value="">--select--</option>

                                <option {{$subcat->type == 'Revision' ?'selected':'' }} value="Revision">Revision</option>
                                <option {{$subcat->type == 'Topical' ?'selected':'' }} value="Topical">Topical</option>
                                <option {{$subcat->type == 'PastPaper' ?'selected':'' }} value="PastPaper">PastPaper</option>
                                <option {{$subcat->type == 'Resource' ?'selected':'' }} value="Resource">Resource</option>

                            </select>
                        </div>
                    </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Name</label>
                                <input type="text" class="form-control" id="inputEmail4" name="name" value="{{  $subcat->name }}" placeholder="Category Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Slug</label>
                                <input type="text" class="form-control" id="inputEmail4" name="slug" value="{{$subcat->subsubcat_slug}}" placeholder="Category Slug">
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
