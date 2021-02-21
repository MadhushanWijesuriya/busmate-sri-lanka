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
        <div class="content-header">

            <div class="container-fluid">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Bus Information</h3>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="card-body">
                                <strong><i class="fas fa-registered mr-1"></i>Registration Number</strong>

                                <p class="text-muted">
                                    {{$bus->bus_reg_no}}
                                </p>

                                <hr>

                                <strong><i class="fas fa-user-alt mr-1"></i>Owner</strong>

                                <p class="text-muted">{{$bus->owner->name}}</p>

                                <hr>

                                <strong><i class="fas fa-route mr-1"></i>Route Category</strong>

                                <p class="text-muted">{{$bus->routeCategory->name}}</p>

                                <hr>

                                {{--                        <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>--}}

                                {{--                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>--}}
                            </div>
                        </div>
                        <div class="col-md-6">

                            <form role="form" action="{{route('bus.update',['id' => $bus->id])}}" class="form-validate" method="post">
                                {{csrf_field()}}
                                {{method_field('PUT')}}
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="bus_reg_no">Bus Registration Number</label>
                                        <input type="text" class="form-control" name="bus_reg_no" id="bus_reg_no" placeholder="Enter Bus Registration Number" value="{{$bus->bus_reg_no}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Travel Category</label>
                                        <select class="custom-select" id="category_id" name="category_id" value="{{$bus->route_category_id}}" required>
                                            @foreach($category as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="owner_name">Name</label>
                                        <input type="text" class="form-control" name="owner_name" id="owner_name" placeholder="Full Name" value="{{$owner->name}}"required>
                                    </div>
                                    <div class="form-group">
                                        <label for="owner_address">Address</label>
                                        <input type="text" class="form-control" name="owner_address" id="owner_address" placeholder="Address" value="{{$owner->address}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="owner_contact_no">Contact No</label>
                                        <input type="text" class="form-control" name="owner_contact_no" id="owner_contact_no" placeholder="Contact Number" value="{{$owner->contact_no}}" required>
                                    </div>
                                    <div class="form-group float-right">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>


    </div>

@endsection

@section('footer')
    @include('components.footer')
@endsection

@section('custom_js')
    <script type="text/javascript">

    </script>
@endsection
