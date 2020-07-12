@extends('layouts.admin')

@section('content')

<div class="row">
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title" id="basic-layout-form">New admission</h4>
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
                    <div class="col-md-6 offset-md-3">
                        <form action="{{ route('store.admission') }}" method="POST"> 
                            @csrf
                            <fieldset>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Full Name :</label>
                                    <input type="text" class="form-control" name="name" id="full-name" value="{{ old('name') }}" placeholder="Enter full name">
                                    <p class="text-danger">
                                        {{ $errors->first('name') }}
                                    </p>
                                </div>
        
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Father's name :</label>
                                    <input type="text" class="form-control" name="father_name" id="full-name" value="{{ old('father_name') }}" placeholder="Enter full name">
                                    <p class="text-danger">
                                        {{ $errors->first('father_name') }}
                                    </p>
                                </div>
        
                                <div class="form-group">
                                    <label for="exampleSelect1">Gender:</label>
                                    <select class="form-control" id="course" name="gender" value="{{ old('gender') }}">
                                        <option disabled>Select your gander</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        {{-- <option value="3">Another</option> --}}
                                    </select>
                                    <p class="text-danger">
                                        {{ $errors->first('gender') }}
                                    </p>
                                </div>
        
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Phone no (11 digit) :</label>
                                    <input type="text" class="form-control" name="phone" id="phone" placeholder="017########" value="{{ old('phone') }}">
                                    <p class="text-danger">
                                        {{ $errors->first('phone') }}
                                    </p>
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleSelect1">Courses :</label>
                                    <select class="form-control" id="course" name="course_id" value="{{ old('course_id') }}">
                                        <option selected disabled>Please Select a course</option>
                                        @foreach ($courses as $item)
                                            <option value="{{ $item->id }}">{{ $item->course_name." (". $item->course_period .")" }}</option>
                                        @endforeach
                                    </select>
                                    <p class="text-danger">
                                        {{ $errors->first('course_id') }}
                                    </p>
                                </div>
        
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Present Address:</label>
                                    <input type="text" class="form-control" name="present_address" id="address" value="{{ old('present_address') }}" placeholder="Enter present address">
                                    <p class="text-danger">
                                        {{ $errors->first('present_address') }}
                                    </p>
                                </div>
                            
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Postal/Zip code:</label>
                                    <input type="text" class="form-control" name="postal_code" id="address" value="{{ old('postal_code') }}" placeholder="Enter postal code">
                                    <p class="text-danger">
                                        {{ $errors->first('postal_code') }}
                                    </p>
                                </div>
                            
        
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email Address (Optional):</label>
                                    <input type="text" class="form-control" name="email" value="{{ old('email') }}" id="last-name" placeholder="Enter your valid email address">
                                    <p class="text-danger">
                                        {{ $errors->first('email') }}
                                    </p>
                                </div>
        
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Facebook Profile link (optional) :</label>
                                    <input type="text" class="form-control" name="facebook" id="facebook" value="{{ old('facebook') }}" placeholder="Enter facebook profile link">
                                    <p class="text-danger">
                                        {{ $errors->first('facebook') }}
                                    </p>
                                    <small id="phone" class="form-text text-muted">Ex: ( www.facebook.com/example-user )</small>
                                </div>
        
                                <button type="submit" class="btn btn-primary float-right">Submit</button>
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