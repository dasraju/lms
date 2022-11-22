@extends('backend.master');
@section('title')
@endsection

@section('content')
<div class="main-content">
    <section class="section">
      <div class="row ">
        <div class="col-6 col-md-6 col-lg-6">
            <div class="card">
            <div class="card-header">
                <h4>Pdf Note Details</h4>
                <a href="{{route('note.create',$id)}}" class="btn btn-sm btn-primary text-right"> Create New +</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                <table class="table table-striped table-md">
                    <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Topic</th>
                    <th>Type</th>
                    <th>File Name</th>
                    <th>Permission</th>
                    <th>Action</th>
                    </tr>
                     @foreach ($notes as $key=>$note)
                     <tr>
                        <td>{{++$key}}</td>
                        <td>{{$note->title}}</td>
                        <td>{{$note->topic->name}}</td>
                        <td>{{ $note->price_type }}</td>
                        <td>{{'...'. Str::limit($note->file_name,8)}}</td>
                        <td>
                               <label class="custom-switch mt-2"> Published
                                    <input id="notepublished"   onchange="change_status($(this),'{{route('admin.status.change',['pdfnote',$note->id,'published'])}}' )" type="checkbox" name="custom-switch-checkbox" {{$note->published =='1'?'checked':'' }} class="custom-switch-input">
                                    <span class="custom-switch-indicator"></span>
                              </label>
                              <label class="custom-switch mt-2"> View
                                <input id="noteview"   onchange="change_status($(this),'{{route('admin.status.change',['pdfnote',$note->id,'view'])}}' )" type="checkbox" name="custom-switch-checkbox" {{$note->view =='1'?'checked':'' }} class="custom-switch-input">
                                <span class="custom-switch-indicator"></span>
                              </label>
                             <label class="custom-switch mt-2"> Download
                                <input  id="notedownload"  onchange="change_status($(this),'{{route('admin.status.change',['pdfnote',$note->id,'download'])}}' )" type="checkbox" name="custom-switch-checkbox" {{$note->download =='1'?'checked':'' }} class="custom-switch-input">
                                <span class="custom-switch-indicator"></span>
                             </label>


                        </td>

                        <td>
                            <a href="{{route('notes.edit',$note->id)}}" class="btn btn-primary">Edit</a>
                            <a href="javascript:void(0)" onclick="confirm_modal('{{route('notes.destroy',$note->id)}}')" class="btn btn-danger">Delete</a>
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
        <div class="col-6 col-md-6 col-lg-6">
            <div class="card">
            <div class="card-header">
                <h4>Video Solution Details</h4>
                <a href="{{route('video.create',$id)}}" class="btn btn-sm btn-primary text-right"> Create New +</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-md">
                        <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Topic</th>
                        <th>Url</th>
                        <th>Permission</th>
                        <th>Action</th>
                        </tr>
                         @foreach ($videoes as $key=>$video)
                         <tr>
                            <td>{{++$key}}</td>
                            <td>{{$video->title}}</td>
                            <td>{{$video->topic->name}}</td>
                            <td>{{'...'. Str::limit($video->url,8)}}</td>
                            <td>
                                   <label class="custom-switch mt-2"> Published
                                        <input id="videopublished"  onchange="change_status($(this),'{{route('admin.status.change',['videosolution',$video->id,'published'])}}' )" type="checkbox" name="custom-switch-checkbox" {{$video->published =='1'?'checked':'' }} class="custom-switch-input">
                                        <span class="custom-switch-indicator"></span>
                                  </label>
                                  <label class="custom-switch mt-2"> View
                                    <input id="videoview"   onchange="change_status($(this),'{{route('admin.status.change',['videosolution',$video->id,'view'])}}' )" type="checkbox" name="custom-switch-checkbox" {{$video->view =='1'?'checked':'' }} class="custom-switch-input">
                                    <span class="custom-switch-indicator"></span>
                                  </label>
                                 <label class="custom-switch mt-2"> Download
                                    <input id="videodownload" onchange="change_status($(this),'{{route('admin.status.change',['videosolution',$video->id,'download'])}}' )" type="checkbox" name="custom-switch-checkbox" {{$video->download =='1'?'checked':'' }} class="custom-switch-input">
                                    <span class="custom-switch-indicator"></span>
                                 </label>
    
    
                            </td>
    
                            <td>
                                <a href="{{route('video-solution.edit',$video->id)}}" class="btn btn-primary">Edit</a>
                                <a href="javascript:void(0)" onclick="confirm_modal('{{route('video-solution.destroy',$video->id)}}')" class="btn btn-danger">Delete</a>
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
