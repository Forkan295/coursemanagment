@extends('layouts.admin')

@push('css')
<style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #5cb85c;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
@endpush

@section('content')

<div class="row">
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title" id="basic-layout-form">Tools and settings</h4>
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
                        <form action="{{ route('setting.tools') }}" method="POST"> 
                            @csrf
                            <fieldset>
                                <br>
                                <button type="submit" class="btn btn-primary float-right">Save Changes</button><br>
                                <br><br><h4>Application</h4> <hr>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="exampleInputEmail1">App Environment</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <select class="form-control" name="app_environment" id="">
                                                    <option
                                                    {{ ($system->app_environment == false) ? "selected" : "" }}
                                                    value="0">Development</option>
                                                    <option 
                                                    {{ ($system->app_environment == true) ? "selected" : "" }}
                                                    value="1">Production</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="exampleInputEmail1">Public path</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="pub_path" id="full-name" value="{{ old('pub_path', $system->pub_path) }}" placeholder="Enter App name">
                                            <p class="text-danger">
                                                {{ $errors->first('pub_path') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>


                                <br><br><h4>Website tools</h4> <hr>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <label for="exampleInputEmail1">Show website</label>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="toggle-btn active">
                                                <label class="switch">
                                                    <input type="checkbox" name="show_website" 
                                                    @if ($system->show_website == true)
                                                        checked
                                                    @endif>
                                                    <span class="slider round"></span>
                                                  </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <label for="exampleInputEmail1">Show home slider</label>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="toggle-btn active">
                                                <label class="switch">
                                                    <input type="checkbox" name="show_home_slider"
                                                    @if ($system->show_home_slider == true)
                                                        checked
                                                    @endif
                                                    >
                                                    <span class="slider round"></span>
                                                  </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <br><br><h4>Admission</h4> <hr>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <label for="exampleInputEmail1">Adminssion availability</label>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="toggle-btn active">
                                                <label class="switch">
                                                    <input type="checkbox" name="admission_availability"
                                                    @if ($system->admission_availability == true)
                                                        checked
                                                    @endif
                                                    >
                                                    <span class="slider round"></span>
                                                  </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <label for="exampleInputEmail1">Can Apply for course</label>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="toggle-btn active">
                                                <label class="switch">
                                                    <input type="checkbox" name="can_apply_for_course"
                                                    @if ($system->can_apply_for_course == true)
                                                        checked
                                                    @endif
                                                    >
                                                    <span class="slider round"></span>
                                                  </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <br><br><h4>SMS Sending clients</h4> <hr>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="exampleInputEmail1">SMS Clients</label>
                                        </div>
                                        <div class="col-md-8">
                                            <select class="form-control" name="sms_client">
                                                <option disabled selected>Select a client</option>
                                                <option value="greenweb"
                                                @if ($system->sms_client == 'greenweb')
                                                    selected
                                                @endif
                                                >Greenweb SMS</option>
                                                <option value="onnorokomsms"
                                                @if ($system->sms_client == 'onnorokomsms')
                                                    selected
                                                @endif
                                                >Onnorokom SMS</option>
                                                <option value="bdbulksms"
                                                @if ($system->sms_client == 'bdbulksms')
                                                    selected
                                                @endif
                                                >BD Bulk SMS</option>
                                              </select>
                                        </div>
                                    </div>
                                </div>

                                <br><br><h4>SMS Sending options</h4> <hr>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <label for="exampleInputEmail1">Send SMS on student admission</label>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="toggle-btn active">
                                                <label class="switch">
                                                    <input type="checkbox" name="sms_on_student_admission"
                                                    @if ($system->sms_on_student_admission == true)
                                                        checked
                                                    @endif
                                                    >
                                                    <span class="slider round"></span>
                                                  </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <label for="exampleInputEmail1">Send SMS on student payment update</label>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="toggle-btn active">
                                                <label class="switch">
                                                    <input type="checkbox" name="sms_on_student_payment_update"
                                                    @if ($system->sms_on_student_payment_update == true)
                                                        checked
                                                    @endif
                                                    >
                                                    <span class="slider round"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <label for="exampleInputEmail1">Send SMS on salary</label>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="toggle-btn active">
                                                <label class="switch">
                                                    <input type="checkbox" name="sms_on_salary"
                                                    @if ($system->sms_on_salary == true)
                                                        checked
                                                    @endif
                                                    >
                                                    <span class="slider round"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <br><br><h4>SMS Verification</h4> <hr>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <label for="exampleInputEmail1">Verify by SMS ( applicants )</label>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="toggle-btn active">
                                                <label class="switch">
                                                    <input type="checkbox" name="applicant_sms_verify"
                                                    @if ($system->applicant_sms_verify == true)
                                                        checked
                                                    @endif
                                                    >
                                                    <span class="slider round"></span>
                                                  </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <label for="exampleInputEmail1">Verify by SMS ( trainers )</label>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="toggle-btn active">
                                                <label class="switch">
                                                    <input type="checkbox" name="trainer_sms_verify"
                                                    @if ($system->trainer_sms_verify == true)
                                                        checked
                                                    @endif
                                                    >
                                                    <span class="slider round"></span>
                                                  </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <label for="exampleInputEmail1">Verify by SMS ( staffs )</label>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="toggle-btn active">
                                                <label class="switch">
                                                    <input type="checkbox" name="staff_sms_verify"
                                                    @if ($system->staff_sms_verify == true)
                                                        checked
                                                    @endif
                                                    >
                                                    <span class="slider round"></span>
                                                  </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

 
                                <br><br><h4>Email Sending options</h4> <hr>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <label for="exampleInputEmail1">Send email on student admission</label>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="toggle-btn active">
                                                <label class="switch">
                                                    <input type="checkbox" name="email_on_student_admission"
                                                    @if ($system->email_on_student_admission == true)
                                                        checked
                                                    @endif
                                                    >
                                                    <span class="slider round"></span>
                                                  </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <label for="exampleInputEmail1">Send email on student payment update</label>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="toggle-btn active">
                                                <label class="switch">
                                                    <input type="checkbox" name="email_on_student_payment_update"
                                                    @if ($system->email_on_student_payment_update == true)
                                                        checked
                                                    @endif
                                                    >
                                                    <span class="slider round"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <label for="exampleInputEmail1">Send email on salary</label>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="toggle-btn active">
                                                <label class="switch">
                                                    <input type="checkbox" name="email_on_salary"
                                                    @if ($system->email_on_salary == true)
                                                        checked
                                                    @endif
                                                    >
                                                    <span class="slider round"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <br>
                                <hr>

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

