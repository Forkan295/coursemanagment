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
            <h4 class="card-title" id="basic-layout-form">User Profile</h4>
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
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput1">Name</label>
                                            <input type="text" id="projectinput1" class="form-control" value="{{ $user->name }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput2">User ID</label>
                                            <input type="text" id="projectinput2" class="form-control" value="{{ $user->user_id }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput3">Phone No</label>
                                            <input type="text" id="projectinput3" class="form-control" value="{{ $user->phone }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput4">Email</label>
                                            <input type="text" id="projectinput4" class="form-control" value="{{ $user->email }}" disabled>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div> 
           
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="projectinput3">Streat Address</label>
                                    <input type="text" id="projectinput3" class="form-control" value="{{ $user->address }}" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projectinput3">City</label>
                                    <input type="text" id="projectinput3" class="form-control" value="{{ $user->city }}" disabled>
                                </div>
                            </div>
                 
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projectinput3">Zip/Postal code</label>
                                    <input type="text" id="projectinput3" class="form-control" value="{{ $user->postal_code }}" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projectinput3">User Role</label>
                                    <input type="text" id="projectinput3" class="form-control" value="{{ ( count( $user->getRoleNames() ) ) ? $user->getRoleNames()[0] : "No role assigned" }}" disabled>
                                </div>
                            </div>
                 
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projectinput3">Account Status</label>
                                    <input type="text" id="projectinput3" class="form-control" value="{{ ( $user->account_status == true ) ? "Active" : "Inactive" }}" disabled>
                                </div>
                            </div>
                        </div>

                 
                        <br>

                       
                    </div>
                        <br>


                        <div class="form-actions">

                            <a href="#" class="btn btn-warning mr-1">
                                <i class="ft-back"></i> Go Back
                            </a>
                            
                            <a href="{{ route('profile.edit') }}" class="btn btn-info mr-1">
                                <i class="ft-back"></i> Update Profile
                            </a>
                        </div>
                    </div>{{-- form-body --}}
            </div>{{-- card-body --}}
        </div>{{-- card-content --}}
    </div>{{-- card --}}
</div>{{-- Col-md-10 --}}


</div> {{-- Row --}}

@endsection

@push('js')

@endpush