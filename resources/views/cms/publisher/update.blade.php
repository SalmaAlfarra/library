@extends('cms.parent')
@section('title', 'Update')
@section('page-lg', 'Update')
@section('page-m', 'publisher')
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
                <h3 class="card-title">Update publisher </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="form-id">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Publisher name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter publisher name" value="{{$publisher->name}}">
                  </div>
                  <div class="form-group">
                    <label for="phone">Publisher Phone</label>
                    <input type="number" class="form-control" id="phone" placeholder="Enter publisher phone" value="{{$publisher->phone}}">
                  </div>
                  <div class="form-group">
                    <label for="email">Publisher email</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter publisher email" value="{{$publisher->email}}">
                  </div>
                  <div class="form-group">
                    <label for="address">Publisher address</label>
                    <input type="number" class="form-control" id="address" placeholder="Enter publisher address" value="{{$publisher->address}}">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="button" onclick="performUpdate('{{$publisher->id}}')" class="btn btn-primary">Save</button>
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
            axios.put('/cms/admin/publishers/{{$publisher->id}}', {
                name: document.getElementById('name').value,
                email: document.getElementById('email').value,
                phone: document.getElementById('phone').value,
                address: document.getElementById('address').value,
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
