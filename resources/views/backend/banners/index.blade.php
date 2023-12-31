
@extends('backend.layouts.master')

@section('title')
    Banners Laravel Multivendor
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css') }}">
@endpush

@section('content')
    <div id="main-content">
        <div class="container-fluid">
            @include('partials._breadcrumb', 
            ['heading' =>'Banners Listing',
             'breadcrumbs' => ['banners.index' =>'Banners']
            ]);
            
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Banners</strong> List</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Photo</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>                            
                                    <tbody>
                                        @foreach($banners as $banner)
                                            <tr>
                                                <td>{{$banner->title}}</td>
                                                <td>
                                                    <img src="{{$banner->photo}}" alt="" style="width:40px; height:40px"/>
                                                </td>
                                                <td>{{$banner->status}}</td>
                                                <td>First Year</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>                   
                </div>
            </div>

        </div>
    </div>
@endsection


@push('scripts')
    <script src="{{ asset('backend/assets/bundles/datatablescripts.bundle.js') }}"></script>
    <script src="{{ asset('backend/assets/js/pages/tables/jquery-datatable.js') }}"></script>
@endpush