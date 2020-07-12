@extends('layouts.admin')

@section('content')

<div class="row">
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title" id="basic-layout-form">System Informations</h4>
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
                        <form action="{{ route('system.info') }}" method="POST"> 
                            @csrf
                            <fieldset>
                                <button type="submit" class="btn btn-primary float-right">Save Changes</button><br>
                                <br><br><h4>App info</h4> <hr>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="exampleInputEmail1">App Name</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="app_name" id="full-name" value="{{ old('app_name', $system->app_name) }}" placeholder="Enter App name">
                                            <p class="text-danger">
                                                {{ $errors->first('app_name') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="exampleInputEmail1">Website title</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="website_title" id="full-name" value="{{ old('website_title', $system->website_title) }}" placeholder="Enter website title">
                                            <p class="text-danger">
                                                {{ $errors->first('website_title') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
        
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="exampleInputEmail1">Website slogan</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="website_slogan" id="full-name" value="{{ old('website_slogan', $system->website_slogan) }}" placeholder="Enter website slogan">
                                            <p class="text-danger">
                                                {{ $errors->first('website_slogan') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <br><br><h4>App description</h4> <hr>
                                <div class="form-group">
                                    <textarea class="form-control" name="app_description" id="" cols="30" rows="10">{{ old('app_description', $system->app_description) }}</textarea>
                                        {{ $errors->first('app_description') }}
                                    </p>
                                </div>

                                <br><br><h4>Meta Info</h4> <hr>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="exampleInputEmail1">App Keywords</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="app_keywords" id="full-name" value="{{ old('app_keywords', $system->app_keywords) }}" placeholder="Add some keywords">
                                            <p class="text-danger">
                                                {{ $errors->first('app_keywords') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                              
                               <br><br><h4>Contact info</h4> <hr>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="exampleInputEmail1">Primary Contact number</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="primary_contact" id="full-name" value="{{ old('primary_contact', $system->primary_contact) }}" placeholder="Enter primary contact number">
                                            <p class="text-danger">
                                                {{ $errors->first('primary_contact') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="exampleInputEmail1">Secondary Contact number</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="secondary_contact" id="full-name" value="{{ old('secondary_contact', $system->secondary_contact) }}" placeholder="Enter secondary contact number">
                                            <p class="text-danger">
                                                {{ $errors->first('secondary_contact') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="exampleInputEmail1">Contact Email</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="contact_email" id="full-name" value="{{ old('contact_email', $system->contact_email) }}" placeholder="Enter contact email">
                                            <p class="text-danger">
                                                {{ $errors->first('contact_email') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <br><br><h4>Address info</h4> <hr>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="exampleInputEmail1">Street address</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="street_address" id="full-name" value="{{ old('street_address', $system->street_address) }}" placeholder="Enter street address">
                                            <p class="text-danger">
                                                {{ $errors->first('street_address') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="exampleInputEmail1">Location (optional)</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="location" id="full-name" value="{{ old('location', $system->location) }}" placeholder="Enter location">
                                            <p class="text-danger">
                                                {{ $errors->first('location') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="exampleInputEmail1">City name</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="city" id="full-name" value="{{ old('city', $system->city) }}" placeholder="Enter city name">
                                            <p class="text-danger">
                                                {{ $errors->first('city') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <br><br><h4>Geo location info</h4> <hr>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="lat">Latitude</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" id="lat" class="form-control" name="latitude" id="full-name" value="{{ old('latitude', $system->latitude) }}" placeholder="Enter latitude">
                                            <p class="text-danger">
                                                {{ $errors->first('latitude') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="long">Longitude</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" id="long" class="form-control" name="longitude" id="full-name" value="{{ old('longitude',$system->longitude) }}" placeholder="Enter longitude">
                                            <p class="text-danger">
                                                {{ $errors->first('longitude') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                        </div>
                                        <div class="col-md-8">
                                            <button type="button" onclick="getLocation()">Get Latitude and logitude from isp</button>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="exampleInputEmail1">Office Time</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="office_time" id="full-name" value="{{ old('office_time', $system->office_time) }}" placeholder="Enter office time">
                                            <p class="text-danger">
                                                {{ $errors->first('office_time') }}
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

    var x = document.getElementById("demo");
    var lat = document.getElementById("lat");
    var long = document.getElementById("long");

    function getLocation() {
        console.log(navigator.geolocation);
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
      } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
      }
    }
    
    function showPosition(position) {
    //   x.innerHTML = "Latitude: " + position.coords.latitude + 
    //   "<br>Longitude: " + position.coords.longitude;
        lat.value = position.coords.latitude;
        long.value = position.coords.longitude;
    }
</script>    
@endpush