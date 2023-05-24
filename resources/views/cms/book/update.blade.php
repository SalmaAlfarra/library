@extends('cms.parent')
@section('title', 'Update')
@section('page-lg', 'Update')
@section('page-m', 'Book')
@section('page-s', 'Update')
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
                <h3 class="card-title">Add new book </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{route('books.update',$book->id)}}">
                @csrf
                @method('PUT')
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                            <ul>
                                @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(session()->has('massege'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-check"></i> Success!</h5>
                            {{session()->get('massege')}}
                        </div>
                    @endif

                  <div class="form-group">
                    <label for="name">Book name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter book name" value="{{old('name') ?? $book->name}}">
                  </div>
                  <div class="form-group">
                      <label for="description">Book Description</label>
                      <textarea class="form-control" rows="3" id="description" name="description" placeholder="Enter book description" value="{{old('description') ?? $book->description}}"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="year">Book publish year</label>
                    <input type="number" class="form-control" id="year" name="year" placeholder="Enter ebook publish year" value="{{old('year') ?? $book->year}}">
                  </div>
                  <div class="form-group">
                    <label for="price">Book price</label>
                    <input type="number" class="form-control" id="price" name="price" placeholder="Enter book price" value="{{old('price') ?? $book->price}}">
                  </div>
                  <div class="form-group">
                    <label for="quntity">Book quntity</label>
                    <input type="number" class="form-control" id="quntity" name="quntity" placeholder="Enter book quntity" value="{{old('quntity') ?? $book->quntity }}">
                  </div>
                  <div class="custom-control custom-switch">
                      <input type="checkbox" class="custom-control-input" id="active" name="active" value="{{old('active')}}">
                      <label class="custom-control-label" for="active">Book active status</label>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Save</button>
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

@endsection
