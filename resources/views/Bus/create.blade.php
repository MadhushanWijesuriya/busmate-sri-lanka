@extends('layouts.app')

@section('theme_css')
    <style>
        #map {
            height: 400px;
            /* The height is 400 pixels */
            width: 100%;
            /* The width is the width of the web page */
        }
    </style>
@endsection

@section('theme_js')

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
                        <h1 class="m-0 text-dark">Add New Bus</h1>
                    </div>

                    <div class="col-sm-6">

                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>

                    </div>

                </div>

            </div>

        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(session()->has('status'))
            <div class="alert alert-success">
                {{ session()->get('status') }}
            </div>
        @endif
        @if(session()->has('error'))
            <div class="alert alert-success">
                {{ session()->get('error') }}
            </div>
        @endif
        <section class="content">
            <div class="container-fluid">
                <form role="form" action="{{route('bus.store')}}" class="form-validate" method="post">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Enter Vehicle Details</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{route('bus.store')}}" class="form-validate" method="post">
                        {{csrf_field()}}
                        {{method_field('POST')}}
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="bus_reg_no">Bus Registration Number</label>
                                        <input type="text" class="form-control" name="bus_reg_no" id="bus_reg_no" placeholder="Enter Bus Registration Number" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Travel Category</label>
                                        <select class="custom-select" id="category_id" name="category_id" required>
                                            @foreach($category as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->


                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Enter Vehicle Owners Details</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="owner_name">Name</label>
                                            <input type="text" class="form-control" name="owner_name" id="owner_name" placeholder="Full Name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="owner_address">Address</label>
                                            <input type="text" class="form-control" name="owner_address" id="owner_address" placeholder="Address" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="owner_contact_no">Contact No</label>
                                            <input type="text" class="form-control" name="owner_contact_no" id="owner_contact_no" placeholder="Contact Number" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                </form>
            </div>
        </section>

    </div>

@endsection

@section('footer')
    @include('components.footer')
@endsection

@section('custom_js')
    <script type="text/javascript">

    </script>
@endsection

