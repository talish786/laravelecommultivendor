
@extends('backend.layouts.master')

@section('title')
    Create Banners Laravel Multivendor
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('backend/assets/summernote/dist/summernote.css') }}">
@endpush


@section('content')
    <div id="main-content">
        <div class="container-fluid">
        @include('partials._breadcrumb', 
            ['heading' =>'Create Banners',
             'breadcrumbs' => [
                'banners.index' =>'Banners',
                ''=>'Add Banner',
                ]
            ])
            
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            @if($errors->any)
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            @endif
                            <form action="{{ route('banners.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="title" id="title" class="form-control" placeholder="Title">
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12">                                
                                        <select name="status" class="form-control show-tick">
                                            <option value="">-- Status --</option>
                                            <option value="active" {{old('status')=='active' ? 'selected' :''}}>Active</option>
                                            <option value="inactive" {{old('status')=='inactive' ? 'selected' :''}}>InActive</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">                                
                                        <select name="condition" class="form-control show-tick">
                                            <option value="">-- Condition --</option>
                                            <option value="banner" {{old('condition')=='banner' ? 'selected' :''}}>Banner</option>
                                            <option value="promo" {{old('condition')=='promo' ? 'selected' :''}}>Promo</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <textarea rows="4" class="form-control no-resize" id="description" name="description" placeholder="Description"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <input type="file" name="photo" id="photo" class="dropify">
                                    </div>
                                    <div class="col-sm-12 mt-3">
                                        <input type="submit" value="Submit" class="btn btn-primary" />
                                        <a href="{{ route('banners.index') }}" class="btn btn-outline-secondary">Cancel</a>
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


@push('scripts')
    <script src="{{ asset('backend/assets/summernote/dist/summernote.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('#description').summernote();
        });
    </script>
@endpush