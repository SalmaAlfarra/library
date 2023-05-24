@extends('cms.parent')

    @section('title', 'Books')
    @section('page-lg', 'Index')
    @section('page-m', 'Book')
    @section('page-s', 'Index')


    @section('styles')

    @endsection

    @section('content')
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Books table</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-hover table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">id</th>
                                            <th>Name</th>
                                            <th>description</th>
                                            <th>Year</th>
                                            <th>Price</th>
                                            <th>Quntity</th>
                                            <th>Active</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th style="width: 40px">Setting</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            @foreach($books as $book)
                                                <tr>
                                                    <td>{{$book->id}}</td>
                                                    <td>{{$book->name}}</td>
                                                    <td>{{$book->description}}</td>
                                                    <td>{{$book->year}}</td>
                                                    <td>{{$book->price}}</td>
                                                    <td>{{$book->quntity}}</td>
                                                    <td>
                                                        <span class="badge @if($book->active) bg-success @else bg-danger @endif">
                                                            {{$book->active_status}}
                                                        </span>
                                                    </td>
                                                    <td>{{$book->created_at}}</td>
                                                    <td>{{$book->updated_at}}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a href="{{route('books.edit',$book->id)}}" class="btn btn-warning">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <a href="#" class="btn btn-primary">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                            <form method="POST" action="{{route('books.destroy',$book->id)}}">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
    @endsection

    @section('scripts')

    @endsection
