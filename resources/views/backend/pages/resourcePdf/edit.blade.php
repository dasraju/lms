@extends('backend.master');
@section('title')
@endsection

@section('content')
<div class="main-content">
    <section class="section">
      <div class="row ">
        <div class="col-12 col-md-12 col-lg-12">
            <form action="{{route('resource-pdf.update',$note->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
            <div class="card">
                <div class="card-header">
                  <h4>Edit Resource Pdf</h4>
                </div>
                <div class="card-body">
                    

                        <div class="form-row">

                          <div class="form-group  col-md-6 ">
                            <label>Select Sub Sub Category</label>
                            <select class="form-control" name="subcategory">
                                <option value="">--select--</option>
                                @foreach ($subcats as $cat )
                                <option {{$note->sub_sub_category_id == $cat->id ?'selected':'' }} value="{{$cat->id}}">{{$cat->name}} <span style="color:red">-({{$cat->subject->name}})</span> </option>
                                @endforeach
                            </select>
                          </div>


                          <div class="form-group  col-md-6 ">
                            <label>Select File Type</label>
                            <select class="form-control" name="file_type">
                                <option value="">--select--</option>
                                
                                <option {{$note->file_type == 'book' ?'selected':'' }} value="book" > Book </option>
                                <option {{$note->file_type == 'syllabus' ?'selected':'' }} value="syllabus" > Syllabus </option>
                            
                            </select>
                          </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Title</label>
                                <input type="text" class="form-control" name="name" value="{{$note->title}}" id="inputEmail4" name="name" value="{{old('name')}}" placeholder="Sub Category Name">
                            </div>

                            <div class="form-group col-md-6">
                                <label class="d-block">Type</label>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" name="type"{{$note->price_type == 'free'?'checked':''}}  type="radio" id="inlineradio1" value="free">
                                  <label class="form-check-label" for="inlineradio1">Free</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" name="type" {{$note->price_type == 'paid'?'checked':''}} type="radio" id="inlineradio2" value="paid">
                                  <label class="form-check-label" for="inlineradio2">Paid</label>
                                </div>

                              </div>
                              
                             
                            <div class="form-group col-md-3">
                                <label>Pdf file</label>
                                <input type="file" name="pdf_file" class="form-control">
                            </div>
                            <div class="form-group col-md-3">
                               <p>file name here</p>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="d-block">Permissions</label>
                                <div class="form-check">
                                  <input class="form-check-input" {{$note->view == '1'?'checked':''}} name="view" type="checkbox" id="defaultCheck1">
                                  <label class="form-check-label" for="defaultCheck1">
                                    View
                                  </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" {{$note->download == '1'?'checked':''}} name="download" type="checkbox" id="defaultCheck2">
                                    <label class="form-check-label" for="defaultCheck2">
                                      Download
                                    </label>
                                  </div>
                                <div class="form-check">
                                  <input class="form-check-input" {{$note->published == '1'?'checked':''}} name="published" type="checkbox" id="defaultCheck3">
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
