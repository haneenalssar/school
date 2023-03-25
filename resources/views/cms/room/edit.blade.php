@extends('cms.parent')

@section('title',' المراحل الدراسية')

@section('sub-title',' تعديل المرحلة الدراسية  ')

@section('active title',' تعديل المرحلة الدراسية ')
@section('styles')

@endsection

@section('content')

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
      <div class="row">
          <!-- left column -->
          <div class="col-md-12">
              <!-- general form elements -->
              <div class="card card-primary">
                  <div class="card-header">
                      <h3 class="card-title"> Rooms</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form id="create_form">
                      @csrf
                      <div class="card-body">

                      <br>
                      <div class="row">
                        <div class="form-group">
                            <label>grade name</label>
                            <select class="form-control select2" id="grade_id" name="grade_id" style="width: 100%;">
                              {{-- <option selected="selected">Alabama</option> --}}
                            @foreach($grades as $grade)
                              <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                            @endforeach
                            </select>
                          </div>

                          <div class="form-group col-md-6">
                            <label for="name"> room name</label>
                            <input type="text" value="{{ $rooms->name }}" name="name" class="form-control" id="name" placeholder="room name">
                        </div>


                        </div>

                          <br>

                      <!-- /.card-body -->
                      <div class="card-footer">
                          <button type="button" onclick="performUpdate({{$rooms->id}})" class="btn btn-lg btn-success">Save</button>


                         <a href="{{route('rooms.index')}}"><button type="button" class="btn btn-lg btn-primary">   All Rooms </button></a>

                      </div>
                  </form>
              </div>
              <!-- /.card -->
          </div>
          <!--/.col (left) -->
      </div>
      <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

  </section>
  <!-- /.content -->

@endsection

@section('scripts')


<script>

    function performUpdate(id){
    let formData = new FormData();
    formData.append('name',document.getElementById('name').value);
            formData.append('grade_id',document.getElementById('grade_id').value);

    storeRoute('/cms/admin/update_rooms/'+id , formData );
    }
    </script>


@endsection


