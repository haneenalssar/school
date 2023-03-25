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
                      <h3 class="card-title">المراحل الدراسية</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form id="create_form">
                      @csrf
                      <div class="card-body">

                      <br>
                      <div class="row">


                            <div class="form-group col-md-6">
                                <label for="name">اسم المرحلة الدراسية</label>
                                <input type="text" name="name" class="form-control" id="name"
                                   value="{{ $grades->name }}" placeholder="اسم المرحلة الدراسية  ">
                            </div>


                        </div>

                          <br>

                      <!-- /.card-body -->
                      <div class="card-footer">
                          <button type="button" onclick="performUpdate({{$grades->id}})" class="btn btn-lg btn-success">حفظ</button>


                         <a href="{{route('grades.index')}}"><button type="button" class="btn btn-lg btn-primary"> قائمة المراحل الدراسية </button></a>

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
    formData.append('name' , document.getElementById('name').value);

    storeRoute('/cms/admin/update_grades/'+id , formData );
    }
    </script>


@endsection


