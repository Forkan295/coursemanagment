@extends('layouts.admin')

@section('content')

<div class="row">
<div class="col-md-10">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title" id="basic-layout-form">{{ $pageTitle }}</h4>
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
                <form class="form" action="{{ route('admit.applicant', $applicant->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <h4 class="form-section"><i class="ft-user"></i> Applicant Info</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projectinput1">Name</label>
                                    <input type="text" id="projectinput1" class="form-control" value="{{ $applicant->name }}" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projectinput2">Father Name</label>
                                    <input type="text" id="projectinput2" class="form-control" value="{{ $applicant->father_name }}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projectinput3">Phone No</label>
                                    <input type="text" id="projectinput3" class="form-control" value="{{ $applicant->phone }} " disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projectinput4">Email</label>
                                    <input type="text" id="projectinput4" class="form-control" value="{{ $applicant->email }}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projectinput3">Gender</label>
                                    <input type="text" id="projectinput3" class="form-control" value="{{ ucfirst($applicant->gender) }} " disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projectinput4">Course</label>
                                    <input type="text" id="projectinput4" class="form-control" value="{{ $applicant->course->course_name }}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="projectinput3">Address</label>
                                    <input type="text" id="projectinput3" class="form-control" value="{{ ucfirst($applicant->present_address) }} " disabled>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="projectinput4">Postal</label>
                                    <input type="text" id="projectinput4" class="form-control" value="{{ $applicant->postal_code }}" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="projectinput3">Facebook Profile url</label>
                            <input type="text" id="projectinput3" class="form-control" value="{{ ucfirst($applicant->facebook) }} " disabled>
                        </div>

                        <h4 class="form-section"><i class="fa fa-paperclip"></i>Other info</h4>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="companyName">Is verified ?</label>
                                    <input type="text" id="companyName" class="form-control" value="{{ ($applicant->is_verified == true) ? 'Yes' : 'No' }}" disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="companyName">Is admitted ?</label>
                                    <input type="text" id="companyName" class="form-control" value="{{ ($applicant->is_admitted == true) ? 'Yes' : 'No' }}" disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="companyName">Payment Status</label>
                                    <input type="text" id="companyName" class="form-control" value="{{ ($applicant->payment_status == true) ? 'Paid' : 'Not Paid' }}" disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="companyName">Paid</label>
                                    <input type="text" id="companyName" class="form-control" value="{{ ($applicant->paid == null) ? '0' : $applicant->paid }} TK" disabled>
                                </div>
                            </div>
                        </div>

                    @can(['Admit Student'])
                        <h4 class="form-section"><i class="fa fa-paperclip"></i> Requirements</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="companyName">Addmission Fees</label>
                                    <input type="number" id="companyName" class="form-control" placeholder="Admission Fees" value="{{ $applicant->course->admission_fees }}" name="paid">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="companyName">Batch</label>
                                    <select id="batch" name="batch_id" class="form-control">
                                        <option selected disabled>Select batch</option>
                                        @foreach ( $batches as $item)
                                        <option value="{{ $item->id }}">Batch {{ $item->batch }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select File</label>
                                    <label id="projectinput7" class="file center-block">
                                        <input type="file" id="file" name="student_image">
                                        <span class="file-custom"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    @endcan
                    
                        <div class="form-actions">
                            <button type="button" class="btn btn-warning mr-1">
                                <i class="ft-x"></i> Cancel
                            </button>

                            @can(['Delete Applicant'])
                                <a href="{{ route('delete.student', $applicant->id) }}" onclick="return confirm('Are you sure to delete this student?')" class="btn btn-danger mr-1">
                                    <i class="ft-x"></i> DELETE
                                </a>
                            @endcan

                            @can(['Admit Student'])
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-check-square-o"></i> Save
                                </button>
                            @endcan
                        </div>
                    </div>{{-- form-body --}}
                </form>
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