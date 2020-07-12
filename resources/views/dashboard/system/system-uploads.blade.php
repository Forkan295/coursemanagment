@extends('layouts.admin')

@section('content')

<div class="row">
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title" id="basic-layout-form">Files and uploads</h4>
            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
            <div class="heading-elements">
                <ul class="list-inline mb-0">
                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="card-content collapse show">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <form action="{{ route('system.uploads') }}" method="POST" enctype="multipart/form-data"> 
                            @csrf
                            <fieldset>

                                <br><br><h4>Upload required images</h4> <hr>

                                <div class="form-group">
                                   
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="exampleInputEmail1">Main logo</label>
                                        </div>
                                        <div class="col-md-9">
                                            @if ($system->main_logo)
                                            <img class="img img-thumbnail" src="{{ url('storage/system', $system->main_logo) }}" alt="">
                                            <a class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete?')" 
                                            href="{{ route('uploads.delete', 'main_logo') }}">Remove</a>
                                            <br><br>
                                            @endif
                                            <input type="file" class="form-control" name="main_logo">
                                            <p>max upload size: 2 MB</p>
                                            <p class="text-danger">
                                                {{ $errors->first('main_logo') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
<hr>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="exampleInputEmail1">Mobile Logo</label>
                                        </div>
                                        <div class="col-md-9">
                                            @if ($system->mobile_logo)
                                            <img class="img img-thumbnail" src="{{ url('storage/system', $system->mobile_logo) }}" alt="">
                                            <a class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete?')" 
                                            href="{{ route('uploads.delete', 'mobile_logo') }}">Remove</a>
                                            <br><br>
                                            @endif
                                            <input type="file" class="form-control" name="mobile_logo">
                                            <p>max upload size: 2 MB</p>
                                            <p class="text-danger">
                                                {{ $errors->first('mobile_logo') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
<hr>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="exampleInputEmail1">App favicon</label>
                                        </div>
                                        <div class="col-md-9">
                                            @if ($system->app_favicon)
                                            <img class="img img-thumbnail" src="{{ url('storage/system', $system->app_favicon) }}" alt="">
                                            <a class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete?')" 
                                            href="{{ route('uploads.delete', 'app_favicon') }}">Remove</a>
                                            <br><br>
                                            @endif
                                            <input type="file" class="form-control" name="app_favicon">
                                            <p>max upload size: 1 MB</p>
                                            <p class="text-danger">
                                                {{ $errors->first('app_favicon') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
<hr>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="exampleInputEmail1">App Banner</label>
                                        </div>
                                        <div class="col-md-9">
                                            @if ($system->app_banner)
                                            <img class="img img-thumbnail" src="{{ url('storage/system', $system->app_banner) }}" alt="">
                                            <br><br>
                                            <a class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete?')" 
                                            href="{{ route('uploads.delete', 'app_banner') }}">Remove</a>
                                            <br><br>
                                            @endif
                                            <input type="file" class="form-control" name="app_banner">
                                            <p>max upload size: 3 MB</p>
                                            <p class="text-danger">
                                                {{ $errors->first('app_banner') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                
                                <button type="submit" class="btn btn-primary float-right">Save Changes</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>{{-- card-body --}}
        </div>{{-- card-content --}}
    </div>{{-- card --}}
</div>{{-- Col-md-10 --}}
</div> {{-- Row --}}

@endsection

@push('js')
<script>

</script>    
@endpush