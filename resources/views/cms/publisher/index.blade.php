@extends('cms.parent')

    @section('title', 'Publisher')
    @section('page-lg', 'Index')
    @section('page-m', 'Publishers')
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
                                <h3 class="card-title">publishers table</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-hover table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">id</th>
                                            <th>Name</th>
                                            <th>Email Address</th>
                                            <th>Phone number</th>
                                            <th>Address</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th style="width: 40px">Setting</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            @foreach($publishers as $publisher)
                                                <tr>
                                                    <td>{{$publisher->id}}</td>
                                                    <td>{{$publisher->name}}</td>
                                                    <td>{{$publisher->email}}</td>
                                                    <td>{{$publisher->phone}}</td>
                                                    <td>{{$publisher->address}}</td>
                                                    <td>{{$publisher->created_at}}</td>
                                                    <td>{{$publisher->updated_at}}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a href="{{route('publishers.edit',$publisher->id)}}" class="btn btn-warning">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <a href="#" class="btn btn-primary">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                            <a a href="#" onclick="confirmDelete('{{$publisher->id}}', this)" class="btn btn-danger">
                                                                <i class="fas fa-trash"></i>
                                                            </a>
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
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            function confirmDelete (id,reference){
                Swal.fire({
                    title: 'Deletteing prosses',
                    text: "are you shure you want delete this Publisher!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        performDelete (id,reference);
                    }
                });
                function performDelete(id,reference){
                    axios.delete('/cms/admin/publishers/'+id)
                    .then(function (response) {
                        console.log(response);
                        reference.closest('tr').remove();
                        showMassage(response.data);
                    })
                    .catch(function (error) {
                        console.log(error.response);
                        showMassage(error.response.data);
                    });
                    function showMassage(data){
                        Swal.fire(
                            data.title,
                            data.text,
                            data.icon,
                        )
                    }
                }
            }

        </script>
    @endsection
