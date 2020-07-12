@extends('layouts.admin')

@section('content')

<div class="row">
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title" id="basic-layout-form">API Integration</h4>
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
                        <form action="{{ route('api.integration') }}" method="POST"> 
                            @csrf
                            <fieldset>

                                <br><br><h4>Google API</h4> <hr>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="exampleInputEmail1">Google App Key</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="google_app_key" id="full-name" value="{{ old('google_app_key', $system->google_app_key) }}" placeholder="Enter google app key">
                                            <p class="text-danger">
                                                {{ $errors->first('google_app_key') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="exampleInputEmail1">Google App Secret</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="google_app_secret" id="full-name" value="{{ old('google_app_secret', $system->google_app_secret) }}" placeholder="Enter google app secret">
                                            <p class="text-danger">
                                                {{ $errors->first('google_app_secret') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <br><br><h4>Facebook API</h4> <hr>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="exampleInputEmail1">Facebook App Key</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="facebook_app_key" id="full-name" value="{{ old('facebook_app_key', $system->facebook_app_key) }}" placeholder="Enter facebook app key">
                                            <p class="text-danger">
                                                {{ $errors->first('facebook_app_key') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="exampleInputEmail1">Facebook App Secret</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="facebook_app_secret" id="full-name" value="{{ old('facebook_app_secret', $system->facebook_app_secret) }}" placeholder="Enter facebook app secret">
                                            <p class="text-danger">
                                                {{ $errors->first('facebook_app_secret') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>


                                <br><br><h4>MapBox</h4> <hr>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="exampleInputEmail1">MapBox access token</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="mapbox_access_token" id="full-name" value="{{ old('mapbox_access_token', $system->mapbox_access_token) }}" placeholder="Enter mapbox access token">
                                            <p class="text-danger">
                                                {{ $errors->first('mapbox_access_token') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <br><br><h4>Google Map</h4> <hr>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="exampleInputEmail1">Google map API key</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="gmap_api_key" id="full-name" value="{{ old('gmap_api_key', $system->gmap_api_key) }}" placeholder="Enter mapbox access token">
                                            <p class="text-danger">
                                                {{ $errors->first('gmap_api_key') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <br><br><h4>Text messaging client ( Greenweb SMS ) 
                                    <a href="http://sms.greenweb.com.bd" target="_blank">sms.greenweb.com.bd</a></h4> <hr>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="exampleInputEmail1">App ID / Username</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="greenweb_app_id" id="full-name" value="{{ old('greenweb_app_id', $system->greenweb_app_id) }}" placeholder="Enter App ID or user name">
                                            <p class="text-danger">
                                                {{ $errors->first('greenweb_app_id') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="exampleInputEmail1">App Secret / Password</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="greenweb_app_secret" id="full-name" value="{{ old('greenweb_app_secret', $system->greenweb_app_secret) }}" placeholder="Enter App Secret or password">
                                            <p class="text-danger">
                                                {{ $errors->first('greenweb_app_secret') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <br><br><h4>Text messaging client ( Bulk SMS BD ) 
                                    <a href="https://bulksmsbd.com/" target="_blank">bulksmsbd.com</a></h4> <hr>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="exampleInputEmail1">App ID / Username</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="bulksmsbd_app_id" id="full-name" value="{{ old('bulksmsbd_app_id', $system->bulksmsbd_app_id) }}" placeholder="Enter App ID or user name">
                                            <p class="text-danger">
                                                {{ $errors->first('bulksmsbd_app_id') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="exampleInputEmail1">App Secret / Password</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="bulksmsbd_app_secret" id="full-name" value="{{ old('bulksmsbd_app_secret', $system->bulksmsbd_app_secret) }}" placeholder="Enter App ID or user name">
                                            <p class="text-danger">
                                                {{ $errors->first('bulksmsbd_app_secret') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <br><br><h4>Text messaging client ( Onnorokom SMS ) 
                                    <a href="https://www.onnorokomsms.com/" target="_blank">onnorokomsms.com</a></h4> <hr>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="exampleInputEmail1">API KEY</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="onnorokomsms_api_key" id="full-name" value="{{ old('onnorokomsms_api_key', $system->onnorokomsms_api_key) }}" placeholder="Enter API Key">
                                            <p class="text-danger">
                                                {{ $errors->first('onnorokomsms_api_key') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>


                                <br><br><h4>Realtime Client ( Pusher) 
                                    <a href="https://pusher.com/" target="_blank">pusher.com</a></h4> <hr>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="exampleInputEmail1">App ID</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="pusher_app_id" id="full-name" value="{{ old('pusher_app_id', $system->pusher_app_id) }}" placeholder="Enter App ID">
                                            <p class="text-danger">
                                                {{ $errors->first('pusher_app_id') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="exampleInputEmail1">App Secret key</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="pusher_app_secret" id="full-name" value="{{ old('pusher_app_secret', $system->pusher_app_secret) }}" placeholder="Enter app secret key">
                                            <p class="text-danger">
                                                {{ $errors->first('pusher_app_secret') }}
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