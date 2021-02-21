@extends('layouts.app')

@section('theme_css')
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">

@endsection

@section('theme_js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
@endsection

@section('top_nav_bar')
    @include('components.top-nav-bar')
@endsection

@section('side-bar')
    @include('components.side-bar')
@endsection

@section('content')
    <div class="content-wrapper">


        <div class="content-header">

            <div class="container-fluid">

                <div class="row mb-2">

                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Buses</h1>
                    </div>

                    <div class="col-sm-6">

                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Bus</li>
                        </ol>

                    </div>

                </div>

            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                <h3 class="card-title">All buses</h3>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{route('bus.create')}}" class="btn btn-app float-right">
                                        <i class="fas fa-plus-circle"></i> Add New Bus
                                    </a>
                                </div>

                            </div>

                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            @include('Bus.bus_datatable')
                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>
            </section>
            <div class="modal fade" id="modal-danger">
                <div class="modal-dialog">
                    <div class="modal-content bg-danger">
                        <div class="modal-header">
                            <h4 class="modal-title">Delete</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure</p>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-outline-light" >Delete</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>

        </div>
    </div>
@endsection

@section('footer')
    @include('components.footer')
@endsection

@section('custom_js')

    <script type="text/javascript">
        $(function () {

            var table = $('.yajra-datatable').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                autoWidth: true,
                paging: true,
                lengthChange: true,
                searching: true,
                ordering: true,
                info: true,
                ajax: "{{ route('bus.datatable') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'bus_reg_no', name: 'bus_reg_no'},
                    {data: 'owner_id', name: 'owner_id'},
                    {data: 'category_id', name: 'category_id'},
                    {data: 'created_at', name: 'created_at'},
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true,
                        "className": "text-center"
                    },
                ]
            });

        });
    </script>
@endsection
