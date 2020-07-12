<div class="modal fade text-left" id="student-asign" tabindex="1" role="dialog">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel5">Asign {{  $student->name }} to another course.</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        </div>
        <form action="{{ route('student.asign', $student->id) }}" method="POST">
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
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="projectinput3">Course</label>
                            <select name="course_id" class="form-control" id="course_id">
                                @foreach ($courses as $course)
                                  @if ($student->course->id == $course->id)
                                    <option selected disabled>{{ $course->course_name }}</option>
                                  @endif
                                    <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="projectinput3">Batch</label>
                            <select name="batch_id" class="form-control" id="">
                                @foreach ($batches as $batch)
                                  @if ($student->batch->id != $batch->id)
                                    <option value="{{ $batch->id }}">Batch {{ $batch->batch }} {{ ($batch->start_status == 1) ? " - Running" : "" }}</option>
                                  @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="check-payment">Admission fee</label>
                            <input type="number" name="paid" id="paid" class="form-control" placeholder="Enter admission fees">
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