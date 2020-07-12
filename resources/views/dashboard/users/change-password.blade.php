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
            <h4 class="card-title" id="basic-layout-form">Change password</h4>
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
            <form action="{{ route('change.password') }}" method="post">
                @csrf
                <div class="card-body">
                        <div class="form-body">
    
                        <div class="print_div">
                            <h4 class="form-section"><i class="ft-lock"></i> User password</h4>
                            <br>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Current password</label>
                                        <input type="password" class="form-control" name="current_password" placeholder="Enter your current password">
                                        <p class="text-danger">
                                            {{ $errors->first('current_password') }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>New password</label>
                                        <input type="password" class="form-control" name="password" placeholder="Enter new password">
                                        <p class="text-danger">
                                            {{ $errors->first('password') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Confirm password</label>
                                        <input type="password" class="form-control" name="password_confirmation" placeholder="Enter password again">
                                        <p class="text-danger">
                                            {{ $errors->first('password_confirmation') }}
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