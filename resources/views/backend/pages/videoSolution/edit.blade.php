@extends('backend.master');
@section('title')
@endsection

@section('content')
<div class="main-content">
    <section class="section">
      <div class="row ">
        <div class="col-12 col-md-12 col-lg-12">
            <form action="{{route('video-solution.update',$video->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
            <div class="card">
                <div class="card-header">
                  <h4>Edit Video</h4>
                </div>
                <div class="card-body">
                    

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Title</label>
                                <input type="text" class="form-control" name="name" value="{{$video->title}}" id="inputEmail4" name="name" value="{{old('name')}}" placeholder="Sub Category Name">
                            </div>

                            <div class="form-group col-md-6">
                                <label class="d-block">Type</label>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" name="type"{{$video->price_type == 'free'?'checked':''}}  type="radio" id="inlineradio1" value="free">
                                  <label class="form-check-label" for="inlineradio1">Free</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" name="type" {{$video->price_type == 'paid'?'checked':''}} type="radio" id="inlineradio2" value="paid">
                                  <label class="form-check-label" for="inlineradio2">Paid</label>
                                </div>

                              </div>
                              
                             
                            <div class="form-group col-md-3">
                                <label>Url</label>
                                <input type="url" name="url" value="{{ $video->url }}" class="form-control">
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label class="d-block">Permissions</label>
                                <div class="form-check">
                                  <input class="form-check-input" {{$video->view == '1'?'checked':''}} name="view" type="checkbox" id="defaultCheck1">
                                  <label class="form-check-label" for="defaultCheck1">
                                    View
                                  </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" {{$video->download == '1'?'checked':''}} name="download" type="checkbox" id="defaultCheck2">
                                    <label class="form-check-label" for="defaultCheck2">
                                      Download
                                    </label>
                                  </div>
                                <div class="form-check">
                                  <input class="form-check-input" {{$video->published == '1'?'checked':''}} name="published" type="checkbox" id="defaultCheck3">
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
