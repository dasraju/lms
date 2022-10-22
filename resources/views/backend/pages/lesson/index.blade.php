@extends('backend.master');
@section('title')
@endsection

@section('content')
<div class="main-content">
    <section class="section">
      <div class="row ">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
            <div class="card-header">
                <h4>Course Details</h4>
                <a href="course/create" class="btn btn-sm btn-primary text-right"> Create New +</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                <table class="table table-striped table-md">
                    <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Type</th>
                    <th>Featured</th>
                    <th>Published</th>
                    <th>Status</th>
                    <th>Action</th>
                    </tr>
                     @foreach ($courses as $key=>$course)
                     <tr>
                        <td>{{++$key}}</td>
                        <td>{{$course->name}}</td>
                        <td>physics</td>
                        <td>{{$course->description}}</td>
                        <td>{{$course->type}}</td>
                        <td>
                            <label class="custom-switch ">
                                <input  onchange="alert('$this.val')" {{$course->featured == '1'?'checked':''}} type="checkbox" name="custom-switch-checkbox" {{$course->status =='1'?'checked':'' }} class="custom-switch-input">
                                <span class="custom-switch-indicator"></span>
                          </label>
                        </td>
                        <td>
                            <label class="custom-switch ">
                                <input  onchange="alert('$this.val')" {{$course->published == '1'?'checked':''}} type="checkbox" name="custom-switch-checkbox" {{$course->status =='1'?'checked':'' }} class="custom-switch-input">
                                <span class="custom-switch-indicator"></span>
                            </label>

                        </td>
                        <td>
                               <label class="custom-switch ">
                                    <input  onchange="alert('$this.val')" type="checkbox" name="custom-switch-checkbox" {{$course->status =='1'?'checked':'' }} class="custom-switch-input">
                                    <span class="custom-switch-indicator"></span>
                              </label>


                        </td>

                        <td>
                            <a href="{{route('course.edit',$course->id)}}" class="btn btn-primary">Edit</a>
                            <a href="javascript:void(0)" onclick="confirm_modal('{{route('course.destroy',$course->id)}}')" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                     @endforeach

                </table>
                </div>
            </div>
            <div class="card-footer text-right">
                <nav class="d-inline-block">
                <ul class="pagination mb-0">
                    <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1 <span
                        class="sr-only">(current)</span></a></li>
                    <li class="page-item">
                    <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                    <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                    </li>
                </ul>
                </nav>
            </div>
            </div>
        </div>
      </div>
    </section>
</div>
@endsection
