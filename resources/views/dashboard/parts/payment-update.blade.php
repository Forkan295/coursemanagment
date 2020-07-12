<div class="modal fade text-left" id="update-payment" tabindex="1" role="dialog">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel5">Update student payments</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        </div>
        <form action="{{ route('payment.student', $student->id) }}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="companyName">Student ID</label>
                            <input type="text" id="companyName" class="form-control" value="{{ $student->student_id }}" disabled>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="companyName">Student Name</label>
                            <input type="text" id="companyName" class="form-control" value="{{ $student->name }}" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="projectinput3">Course</label>
                            <input type="text" id="projectinput3" class="form-control" value="{{ ucfirst($student->course->course_name) }} " disabled>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="projectinput3">Course Fee</label>
                            <input type="text" id="projectinput3" class="form-control" value="{{ ucfirst($student->course->course_fees) }} TK" disabled>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="companyName">Paid</label>
                            <input type="text" id="companyName" class="form-control" value="{{ ($student->paid == null) ? '0' : $student->paid }} TK" disabled>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="companyName">Discount</label>
                            <input type="text" id="companyName" class="form-control" value="{{ $student->discount }} TK" disabled>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="companyName">Due</label>
                            <input type="text" id="companyName" class="form-control" value="{{ $student->course->course_fees - ($student->paid + $student->discount ) }} TK" disabled>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="projectinput3">Previous payment date</label>
                            <input type="text" id="projectinput3" class="form-control"
                             value="{{ $student->updated_at->format('d F, Y') }}" disabled>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="projectinput3">Current date</label>
                            <input type="text" id="projectinput3" class="form-control"
                             value="{{ Carbon\Carbon::now()->format('d F, Y') }}" disabled>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="check-payment">Payment</label>
                            <input type="number" name="paid" v-model="payment" @keyup="checkPayment()" class="form-control" placeholder="Enter current payment amount">
                            <p class="text-danger" v-if="error">
                                @{{ message }}
                            </p>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="projectinput3">Passwors</label>
                            <input type="password" id="projectinput3" name="password" class="form-control" placeholder="Enter password">
                        </div>
                    </div>

                </div>

            </div>
            <div class="modal-footer">
            <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
            <button type="submit" v-if="!error" class="btn btn-outline-primary">Update payment</button>
            </div>
        </form>
    </div>
    </div>
</div> 
{{-- Payment Update Modal --}}

{{-- Discount modal --}}
<div class="modal fade text-left" id="make-discount" tabindex="1" role="dialog">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel5">Make a discount</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        </div>
        <form action="{{ route('make.discount', $student->id) }}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="companyName">Student ID</label>
                            <input type="text" id="companyName" class="form-control" value="{{ $student->student_id }}" disabled>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="companyName">Student Name</label>
                            <input type="text" id="companyName" class="form-control" value="{{ $student->name }}" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="projectinput3">Course</label>
                            <input type="text" id="projectinput3" class="form-control" value="{{ ucfirst($student->course->course_name) }} " disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="projectinput3">Course Fee</label>
                            <input type="text" id="projectinput3" class="form-control" value="{{ ucfirst($student->course->course_fees) }} TK" disabled>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="companyName">Paid</label>
                            <input type="text" id="companyName" class="form-control" value="{{ ($student->paid == null) ? '0' : $student->paid }} TK" disabled>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="companyName">Due</label>
                            <input type="text" id="companyName" class="form-control" value="{{ $student->course->course_fees - $student->paid }} TK" disabled>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="projectinput3">Discount</label>
                            <input type="number" id="projectinput3" name="discount" class="form-control" value="{{ $student->discount }}" placeholder="Enter discount amount">
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="projectinput3">Passwors</label>
                            <input type="password" id="projectinput3" name="password" class="form-control" placeholder="Enteryour password">
                        </div>
                    </div>

                </div>

            </div>
            <div class="modal-footer">
            <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-outline-primary">Make discount</button>
            </div>
        </form>
    </div>
    </div>
</div> 