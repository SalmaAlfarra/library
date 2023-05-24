@extends('cms.parent')
@section('title', 'Create')
@section('page-lg', 'Create')
@section('page-m', 'admin')
@section('page-s', 'create')
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
                <h3 class="card-title">Add new admin </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="form-id">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Admin name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter admin name">
                  </div>
                  <div class="form-group">
                    <label for="email">Admin email</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter admin email">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="button" onclick="performStore()" class="btn btn-primary">Save</button>
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
        function performStore(){
            // alert('perform-store');
            // console.log('performStore');
            axios.post('/cms/admin/admins', {
                name: document.getElementById('name').value,
                email_address: document.getElementById('email').value,
            })
            .then(function (response) {
                console.log(response);
                toastr.success(response.data.message);
                document.getElementById("form-id").reset()
            })
            .catch(function (error) {
                console.log(error);
                toastr.error(error.message);
            });
        }
    </script>
@endsection
