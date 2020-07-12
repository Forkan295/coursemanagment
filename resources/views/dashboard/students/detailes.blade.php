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
                    <div class="form-body">

                    <div class="print_div">
                        <h4 class="form-section"><i class="ft-user"></i> student Info</h4>
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <img class="student-avatar" src="{{ url('storage/students/'. $student->student_image) }}" alt="">
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


                        <h4 class="form-section"><i class="fa fa-paperclip"></i>Other info</h4>
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

                        </div>

                        <div class="row">
                            <div class="col-md-4">
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
                            <div class="col-md-4">
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
                        <br>


                        <div class="form-actions">

                            <a href="{{ route('all.students') }}" class="btn btn-warning mr-1">
                                <i class="ft-back"></i> Go Back
                            </a>

                            @canany(['Delete Student'])
                            <a href="{{ route('delete.student', $student->id) }}" onclick="return confirm('Are you sure to delete this student?')" class="btn btn-danger mr-1">
                                <i class="ft-x"></i> DELETE
                            </a>
                            @endcanany
                            
                            <a target="_blank" href="{{ route('receipt.student', $student->id) }}"  class="btn btn-primary">
                                <i class="fa fa-check-square-o"></i> VIEW RECEIPT
                            </a>

                            <button type="button" class="btn btn-primary ml-1" data-toggle="modal" data-show="false" data-target="#student-asign">
                                Asign to another course
                            </button>

                            
                            @canany(['Update Payment'])
                            @if ($student->discount == 0 && 
                             ((int) $student->paid + (int) $student->discount) < (int) $student->course->course_fees )
                            <button type="button" class="btn btn-outline-warning ml-1" data-toggle="modal" data-show="false" data-target="#make-discount">
                                Make discount
                            </button>
                            @endif
                            @endcanany

                            @canany(['Update Payment'])
                            @if (((int) $student->paid + (int) $student->discount) < (int) $student->course->course_fees )
                            <button type="button" class="btn btn-outline-danger float-right" data-toggle="modal" data-show="false" data-target="#update-payment">
                                Update payment
                            </button>
                            @endif
                            @endcanany

                            @include('dashboard.parts.payment-update')  
                            @include('dashboard.parts.asign-to-another')  

                        </div>
                    </div>{{-- form-body --}}
            </div>{{-- card-body --}}
        </div>{{-- card-content --}}
    </div>{{-- card --}}
</div>{{-- Col-md-10 --}}


</div> {{-- Row --}}

@endsection

@push('js')
    <script src="//cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.js"></script> 
    <script>

        var app = new Vue({
            el: '#app',
            data: {
                'payment' : "",
                'error' : false,
                'due' : "<?= $student->course->course_fees - ($student->paid + $student->discount )?>",
                'message' : ""
            },
            created(){
               console.log(this.payment);
            },
  
            methods: {
                checkPayment()
                { 
                  if(parseInt(this.payment) > parseInt(this.due))
                    {
                        this.error = true;
                        this.message = "Payment cannot exceed " + this.due + " TK (payable due).";
                    }
                    else
                    {
                        this.error = false;
                        this.message = "";
                    }
                }
            }
        });


        $(document).ready(function(){

            // alert('course changed');
            $('#course_id').on('change',function(){

                var course_id = $("#course_id option:selected").val();
                var url = "{{ route('course.fees') }}";
                $.ajax({
                    url: url,
                    method: "get",
                    data: {
                        'course_id': course_id
                    },
                    success: function(response){
                        console.log(response);
                        $('#paid').val(response);
                    }
                }); 

            });
        })


        // $('#check-payment').on('change',function(){
        //     console.log( $(this).val() );
        // });
          
    </script>
@endpush