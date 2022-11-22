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
                <h4>Menu Details</h4>
                <a href="menu-head/create" class="btn btn-sm btn-primary text-right"> Create New +</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                <table class="table table-striped table-md">
                    <tr>
                    <th>#</th>
                    <th>Menu Head</th>
                    <th>Status</th>
                    <th>Action</th>
                    </tr>
                     @foreach ($cats as $key=>$cat)
                     <tr>
                        <td>{{++$key}}</td>
                        <td>{{$cat->name}}</td>

                        <td>
                               <label class="custom-switch mt-2">
                                    <input id='statuscheck'  onchange="change_status($(this),'{{route('admin.status.change',['menuhead',$cat->id,'status'])}}' )" type="checkbox" name="custom-switch-checkbox" {{$cat->status =='1'?'checked':'' }} class="custom-switch-input">
                                    <span class="custom-switch-indicator"></span>
                              </label>

                        </td>

                        <td>
                            <a href="{{route('menu-head.edit',$cat->id)}}" class="btn btn-primary">Edit</a>
                            <a href="javascript:void(0)" onclick="confirm_modal('{{route('menu-head.destroy',$cat->id)}}')" class="btn btn-danger">Delete</a>
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
@section('page-js')
<script>
      

</script>
    
@endsection
