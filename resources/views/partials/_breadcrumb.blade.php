<div class="block-header">
    <div class="row">
        <div class="col-lg-6 col-md-8 col-sm-12">
            <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>{{ $heading }}</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin') }}"><i class="icon-home"></i></a>
                </li>
                @foreach($breadcrumbs as $key => $breadcrumb)
                    <li class="breadcrumb-item active">
                    @if($key)  
                        <a href="{{ route($key) }}">{{ $breadcrumb }}</a>
                    @else 
                        {{ $breadcrumb }}

                    @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
