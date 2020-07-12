@extends('layouts.admin')

@push('css')
    <style>
      .student-avatar{
          width: 115px;
          height: 145px;
          z-index: 999;
          border: 1px solid #CFD0D1;
          padding: 5px;
          background: white;
      }
      </style>
@endpush

@section('content')

<div class="row" id="app">
<div class="col-md-10">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title" id="basic-layout-form">Edit Profile</h4>
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
            <form action="{{ route('profile.edit') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                        <div class="form-body">
    
                        <div class="print_div">
                            <h4 class="form-section"><i class="ft-user"></i> User Info</h4>
                            <br>
                            <div class="row">
                                <div class="col-md-2">
                                    <img class="student-avatar" src="{{ ($user->avatar != null ) ? url('storage/users', $user->avatar) : asset('defaults/user.png') }}" alt="">
                                </div>
                                <div class="col-md-10">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="projectinput1">Upload Image</label>
                                                <input type="file" id="projectinput1" class="form-control" name="avatar">
                                                <p class="text-danger">
                                                    {{ $errors->first('avatar') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput1">Name</label>
                                                <input type="text" id="projectinput1" name="name" class="form-control" value="{{ $user->name }}" placeholder="Enter your name here">
                                                <p class="text-danger">
                                                    {{ $errors->first('name') }}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput3">Phone No</label>
                                                <input type="text" id="projectinput3" name="phone" class="form-control" value="{{ $user->phone }}" placeholder="Enter your contact number here">
                                                <p class="text-danger">
                                                    {{ $errors->first('phone') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
    
                                </div>
                            </div> 
               
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="projectinput3">Address</label>
                                        <input type="text" id="projectinput3" class="form-control" name="address" value="{{ $user->address }}" placeholder="Enter your streat address here">
                                        <p class="text-danger">
                                            {{ $errors->first('address') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
    
    
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="projectinput1">City</label>
                                        <input type="text" id="projectinput1" class="form-control" name="city" value="{{ $user->city }}" placeholder="Enter your city name here">
                                        <p class="text-danger">
                                            {{ $errors->first('city') }}
                                        </p>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="projectinput2">Postal Code</label>
                                        <input type="text" id="projectinput2" class="form-control" name="postal_code" value="{{ $user->postal_code }}" placeholder="Enter your postal/zip code">
                                        <p class="text-danger">
                                            {{ $errors->first('postal_code') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                           
                          </div>
    
    
                            <div class="form-actions">
    
                                <a href="{{ route('user.profile') }}" class="btn btn-warning mr-1">
                                    <i class="ft-back"></i> Cancel
                                </a>

                                <button type="submit" class="btn btn-success mr-1">
                                    <i class="ft-back"></i> Save changes
                                </button>
    
                            </div>
                        </div>{{-- form-body --}}
                </div>{{-- card-body --}}
            </form>
        </div>{{-- card-content --}}
    </div>{{-- card --}}
</div>{{-- Col-md-10 --}}


</div> {{-- Row --}}

@endsection

@push('js')

@endpush