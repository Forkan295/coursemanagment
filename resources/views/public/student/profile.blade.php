@extends('layouts.public')
@section('title', $system->website_title. ' - '. 'Student Profile')
@section('content')
<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('public/images/bg_1.jpg')">
   <div class="container">
      <div class="row align-items-end">
         <div class="col-lg-7">
            <h2 class="mb-0">Student Profile</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
         </div>
      </div>
   </div>
</div>
<div class="custom-breadcrumns border-bottom">
   <div class="container">
    <a href="{{ url('/') }}">Home</a>
      <span class="mx-3 icon-keyboard_arrow_right"></span>
      <span class="current">Profile</span>
   </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                @include('public.inc.student-sidebar')
                <br><br>
            </div>

            <div class="col-md-8">
               <div class="form-body">
                <h4 class="form-section"><i class="ft-user"></i> student Info</h4>
                <br>
                <div class="row">
                    <div class="col-md-2 text-center">
                        <img class="img img-thumbnail" src="{{ url('storage/students/'. $student->student_image) }}" alt="">
                    </div>
                    <div class="col-md-10">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projectinput1">Name</label>
                                    <input type="text" id="projectinput1" class="form-control" value="{{ $student->name }}" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projectinput2">Father Name</label>
                                    <input type="text" id="projectinput2" class="form-control" value="{{ $student->father_name }}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projectinput3">Phone No</label>
                                    <input type="text" id="projectinput3" class="form-control" value="{{ $student->phone }} " disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projectinput4">Email</label>
                                    <input type="text" id="projectinput4" class="form-control" value="{{ $student->email }}" disabled>
                                </div>
                            </div>
                        </div>

                    </div>
                </div> 
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="projectinput3">Gender</label>
                            <input type="text" id="projectinput3" class="form-control" value="{{ ucfirst($student->gender) }} " disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="projectinput4">Postal</label>
                            <input type="text" id="projectinput4" class="form-control" value="{{ $student->postal_code }}" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="projectinput3">Address</label>
                            <input type="text" id="projectinput3" class="form-control" value="{{ ucfirst($student->present_address) }} " disabled>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="projectinput3">Facebook Profile url</label>
                    <input type="text" id="projectinput3" class="form-control" value="{{ ucfirst($student->facebook) }} " disabled>
                </div>
                <br>


                <h4 class="form-section"><i class="fa fa-paperclip"></i>Current course info</h4>
                <br>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="projectinput3">Course</label>
                            <input type="text" id="projectinput3" class="form-control" value="{{ ucfirst($student->course->course_name) }} " disabled>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="companyName">Student ID</label>
                            <input type="text" id="companyName" class="form-control" value="{{ $student->student_id }}" disabled>
                        </div>
                    </div>


                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="companyName">Batch</label>
                            <input type="text" id="companyName" class="form-control" value="{{ $student->batch->batch }}" disabled>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="companyName">Admitted at</label>
                            <input type="text" id="companyName" class="form-control" value="{{ $student->updated_at->format('d M, Y')  }}" disabled>
                        </div>
                    </div>

                </div>


                <div class="row">

                   <div class="col-md-3">
                        <div class="form-group">
                            <label for="projectinput3">Course Fee</label>
                            <input type="text" id="projectinput3" class="form-control" value="{{ ucfirst($student->course->course_fees) }} TK" disabled>
                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="companyName">Paid</label>
                            <input type="text" id="companyName" class="form-control" value="{{ ($student->paid == null) ? '0' : $student->paid }} TK" disabled>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="companyName">Discount</label>
                            <input type="text" id="companyName" class="form-control" value="{{ (int) $student->discount }} TK" disabled>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="companyName">Due (payable)</label>
                            <input type="text" id="companyName" class="form-control" value="{{ $student->course->course_fees - ( $student->paid + $student->discount )}} TK" disabled>
                        </div>
                    </div>

                </div><br><br>

                <h4 class="form-section"><i class="fa fa-paperclip"></i>Class Schedule</h4>
                <br>

                <div class="row">
                    <div class="col-md-9">
                        <div class="form-group">
                            <label for="companyName">Schedule</label>
                           
                            <?php 
                               $day = "";
                               if ($schedule) {
                                   # code...
                                   foreach ($schedule->days as $item) {
                                        $day .=  "#" . $item->day . " ";
                                   }
                               }
                               else 
                               {
                                    $day = "Undefined schedule.";
                               }

                            ?>

                            <input type="text" id="companyName" class="form-control"
                                value="{{ $day }}" disabled>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="companyName">Class Time</label>
                            <?php 
                               $time = "";
                               if ($schedule) {
                                   # code...
                                   $time = $schedule->time;
                               }
                               else 
                               {
                                   $time = "Undefined class time.";
                               }
                            ?>
                            <input type="text" id="companyName" class="form-control" value="{{ $time }}" disabled>
                        </div>
                    </div>

                    {{-- <div class="col-md-4">
                        <div class="form-group">
                            <label for="companyName">Admitted at</label>
                            <input type="text" id="companyName" class="form-control" value="{{ $student->updated_at->format('d M, Y')  }}" disabled>
                        </div>
                    </div> --}}
                </div>



            </div>
            </div>{{-- .col-md-8 --}}
        </div>{{-- .Row --}}
    </div>{{-- .Container --}}

</div>{{-- .site-section --}}

@endsection
         