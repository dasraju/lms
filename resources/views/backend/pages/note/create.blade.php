@extends('backend.master');
@section('title')
@endsection

@section('content')
<div class="main-content">
    <section class="section">
      <div class="row ">
        <div class="col-12 col-md-12 col-lg-12">
            <form action="{{route('notes.store')}}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="card">
                <div class="card-header">
                  <h4>Add New Note</h4>
                </div>
                <div class="card-body">


                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Ttile</label>
                                <input type="text" class="form-control" name="name" id="inputEmail4" name="name" value="{{old('name')}}" placeholder="Note title" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="d-block">Type</label>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" name="type" type="radio" id="inlineradio1" value="free">
                                  <label class="form-check-label" for="inlineradio1">Free</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" name="type" type="radio" id="inlineradio2" value="paid">
                                  <label class="form-check-label" for="inlineradio2">Paid</label>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>File</label>
                                <input type="file" name="note_pdf" class="form-control">
                              </div>
                            <div class="form-group col-md-6">
                                <label class="d-block">Permissions</label>

                                <div class="form-check">
                                  <input class="form-check-input" name="published" type="checkbox" id="defaultCheck3">
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
