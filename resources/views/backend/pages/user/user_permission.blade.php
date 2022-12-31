@extends('backend.master');
@section('title')
@endsection

@section('content')
<div class="main-content">
    <section class="section">
      <div class="row ">
        <div class="col-12 col-md-12 col-lg-12">
            <form action="{{route('user.permission.setup')}}" method="post">
                @csrf
            <div class="card">
                <div class="card-header">
                  <h4>Setup Permission</h4>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group  col-md-3 ">
                            <label>User List</label>
                            <select class="form-control select2" name="user">
                                <option value="">select user</option> 
                                @foreach ($userList as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option> 
                                @endforeach
                               
                               
                            </select>
                        </div>
                        <div class="form-group  col-md-3 ">
                            <label>Menu Head</label>
                            <select  id="menuhead" class="form-control select2" name='menuhead' onchange="get_dropdown_data('category','categories',$(this),'{{route('user.get.permission.data')}}')">
                                <option value="">select head</option> 
                                @foreach ($menuhead as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option> 
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group  col-md-3 " >
                            <label> Categories</label>
                            <select class="form-control select2" id="categories" onchange="get_dropdown_data('subject','subjects',$(this),'{{route('user.get.permission.data')}}')">
                                <option>No data</option>
                               
                            </select>
                        </div>
                        <div class="form-group  col-md-3 " >
                            <label>Subjects</label>
                            <select class="form-control select2" id="subjects" onchange="get_dropdown_data('subjectpart','subjectpart',$(this),'{{route('user.get.permission.data')}}')"> 
                                <option>No data</option>
                               
                            </select>
                        </div>
                        <div class="form-group  col-md-3 ">
                            <label>Subject Part</label>
                            <select class="form-control select2" id="subjectpart" onchange="get_dropdown_data('chapter','chapter',$(this),'{{route('user.get.permission.data')}}')">
                                <option>No data</option>
                               
                            </select>
                        </div>

                        <div class="form-group  col-md-3 ">
                            <label>Chapter</label>
                            <select class="form-control select2" id="chapter" name="chapter">
                                <option>No data</option>
                                
                            </select>
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
@section('page-js')
<script>
function get_dropdown_data(tablename,targetdropdown,e,dataUrl){
    var newvalue = e.val();
    var newurl = dataUrl+'?id='+newvalue+'&tablename='+tablename;
   
   $.get(newurl, function(data){
       $('#'+targetdropdown).html(data);
     
   });
}

</script>

@endsection











