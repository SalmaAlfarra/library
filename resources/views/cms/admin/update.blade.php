@extends('cms.parent')
@section('title', 'Update')
@section('page-lg', 'Update')
@section('page-m', 'admin')
@section('page-s', 'update')
@section( 'styles')

@endsection
@section('content')
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update admin </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="form-id">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Admin name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter admin name" value="{{$admin->name}}">
                  </div>
                  <div class="form-group">
                    <label for="email">Admin email</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter admin email" value="{{$admin->email}}">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="button" onclick="performUpdate('{{$admin->id}}')" class="btn btn-primary">Save</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
@endsection
@section('scripts')
    <script>
        function performUpdate(id){
            axios.put('/cms/admin/admins/{{$admin->id}}', {
                name: document.getElementById('name').value,
                email: document.getElementById('email').value,
            })
            .then(function (response) {
                console.log(response);
                toastr.success(response.data.message);
                // document.getElementById("form-id").reset();
            })
            .catch(function (error) {
                console.log(error);
                toastr.error(error.response.data.message);
            });
        }
    </script>
@endsection
