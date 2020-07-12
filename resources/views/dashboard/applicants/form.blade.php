<div class="col-md-10">
    <div class="card" style="height: 1005.02px;">
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
                <form class="form">
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
                                    <input type="text" id="projectinput4" class="form-control" value="{{ $applicant->course_id }}" disabled>
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
                        <h4 class="form-section"><i class="fa fa-paperclip"></i> Requirements</h4>
                        <div class="form-group">
                            <label for="companyName">Company</label>
                            <input type="text" id="companyName" class="form-control" placeholder="Company Name" name="company">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projectinput5">Weekly Schedule</label>
                                    <select id="projectinput5" name="interested" class="form-control">
                                        <option disabled="">Select weekly schedule</option>
                                        <option value="design">Saterday, Monday, Wednessday</option>
                                        <option value="development">Sunday, Tuesday, Thirsday</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projectinput6">Class Time</label>
                                    <select id="projectinput6" name="budget" class="form-control">
                                        <option value="0" selected="" disabled="">Budget</option>
                                        <option value="less than 5000$">less than 5000$</option>
                                        <option value="5000$ - 10000$">5000$ - 10000$</option>
                                        <option value="10000$ - 20000$">10000$ - 20000$</option>
                                        <option value="more than 20000$">more than 20000$</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select File</label>
                                    <label id="projectinput7" class="file center-block">
                                        <input type="file" id="file">
                                        <span class="file-custom"></span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="button" class="btn btn-warning mr-1">
                                <i class="ft-x"></i> Cancel
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-check-square-o"></i> Save
                            </button>
                        </div>
                    </div>{{-- form-body --}}
                </form>
            </div>{{-- card-body --}}
        </div>{{-- card-content --}}
    </div>{{-- card --}}
</div>{{-- Col-md-10 --}}