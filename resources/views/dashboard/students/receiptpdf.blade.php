<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Student Receipt</title>
    <style>
      .avatar{
          position: absolute;
          right: 15px;
          top: 86px;
          width: 100px;
          height: 128px;
          /* margin-right: -600px;
          margin-top: -2px !important; */
          z-index: 999;
          border: 1px solid #CFD0D1;
          padding: 5px;
          background: white;
      }
      .info{
          position: relative;
          top: 10px;
          /* margin-top: 0px; */
          z-index: -999;
      }
      .institute-signature{
         position: relative;
         top: 50px;
      }
      .conditions{
        position: relative;
        top: 5px;
        height: auto;
      }
  
      .credit{
          /* margin-top: -30px; */
          position: relative;
          top: 100px;
          border: 1px solid #A5A5A5;
      }
    </style>
  </head>
  <body>
    <div class="text-center">
        <br>
        <div class="row">
            <div class="col-md-12 ">

                <div>
                <div class="row">
                    <div class="col-md-12 ">
                        <div class="institute">
                            <h2 class="text-center">{{ $system->website_title }}</h2>
                            <p>{{ $system->website_slogan }}</p>
                            <hr>
                        </div>
                        <div class="">
                        <img class="avatar" src="{{ url('storage/students/'. $student->student_image) }}" alt="">
                        </div>
                    </div>
                </div>

                <div class="info ">

                    <table class="">
                            <tbody>
                                <tr>
                                    <td class="text-left">Student ID</td>
                                    <td class="text-center" width="30px">-</td>
                                    <td class="text-left"># {{ $student->student_id }}</td>
                                </tr>
                                <tr>
                                    <td class="text-left">Name</td>
                                    <td class="text-center" width="30px">-</td>
                                    <td class="text-left">{{ $student->name }}</td>
                                </tr>
                                <tr>
                                    <td class="text-left">Father name</td>
                                    <td class="text-center" width="30px">-</td>
                                    <td class="text-left">{{ $student->father_name }}</td>
                                </tr>
                                <tr>
                                    <td class="text-left">Phone</td>
                                    <td class="text-center" width="30px">-</td>
                                    <td class="text-left">{{ $student->phone }}</td>
                                </tr>
                                <tr>
                                    <td class="text-left">Email</td>
                                    <td class="text-center" width="30px">-</td>
                                    <td class="text-left">{{ $student->email }}</td>
                                </tr>
                                <tr>
                                    <td class="text-left">Address<br><br></td>
                                    <td class="text-center" width="30px">-<br><br></td>
                                    <td class="text-left">{{ $student->present_address.', '. $student->postal_code }}<br><br></td>
                                </tr>
                   
                                <tr>
                                    <td class="text-left">Batch </td>
                                    <td class="text-center" width="30px">-</td>
                                    <td class="text-left"># {{ $student->batch->batch }}</td>
                                </tr>
                                <tr>
                                    <td class="text-left">Course name</td>
                                    <td class="text-center" width="30px">-</td>
                                    <td class="text-left">{{ $student->course->course_name }}</td>
                                </tr>
                                <tr>
                                    <td class="text-left">Course Period</td>
                                    <td class="text-center" width="30px">-</td>
                                    <td class="text-left">{{ $student->course->course_period }}</td>
                                </tr>
                                <tr>
                                    <td class="text-left">Course Fee<br><br></td>
                                    <td class="text-center" width="30px">-<br><br></td>
                                    <td class="text-left">{{ $student->course->course_fees }} TK<br><br></td>
                                </tr>
                                <tr>
                                    <td class="text-left">Paid</td>
                                    <td class="text-center" width="30px">-</td>
                                    <td class="text-left">{{ $student->paid }} TK</td>
                                </tr>
                                <tr>
                                    <td class="text-left">Due<br><br></td>
                                    <td class="text-center" width="30px">-<br><br></td>
                                    <td class="text-left">
                                        {{ $student->course->course_fees - $student->paid  }} TK
                                        @if ( $student->discount > 0)
                                            - {{ $student->discount }} TK (Discount) = {{ $student->course->course_fees - ( $student->paid + $student->discount) }} TK
                                        @endif
                                        <br><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-left">Schedule</td>
                                    <td class="text-center" width="30px">-</td>
                                     <?php 
                                       $class_schedule = "";
                                       if ($schedule) {
                                           # code...
                                           foreach ($schedule->days as $item) {
                                                $class_schedule .=  "#" . $item->day . " ";
                                           }

                                           $class_schedule .= " (" . $schedule->time . ")";
                                       }
                                       else 
                                       {
                                            $class_schedule = "No schedule created.";
                                       }

                                    ?>
                                    <td class="text-left">{{ (string) $class_schedule }}</td>
                                </tr>
            
                            </tbody>
                    </table> <hr>

                    <div class="row">
                        <div class="col-12">
                           
                            <div class="conditions">
                                <div class="note text-left">
                                    <strong>Conditions</strong>
                                    <ul style="font-size:13px">
                                        <li>Keep the document safe unless you update your dues by the institute.</li>
                                        <li>You have to pay your dues in time. otherwise you will be restricted to get any support from the institute. </li>
                                        <li>You cannot share your user id and password to others. otherwise your admission can be canceled by the institute.</li>
                                        <li>Any of your activities against the institute rules and regulations will be not considered. </li>
                                    </ul>
                                </div>
                                <br><br>
                            </div>

                            <div class="institute-signature">
                                <p class="text-center trainee" style="border-top:1px dashed; width:183px">institute signature & date</p>  
                            </div>  

                            <div class="footer">
                                <p class="text-center credit" style="font-size:10px">{{ $system->website_title }} | 
                                    Phone: {{ $system->primary_contact }} 
                                    {{ ($system->secondary_contact) ? ", ". $system->secondary_contact : "" }} | 
                                    Address: {{ $system->street_address }}</p>  
                            </div> 


                        </div>
                        
                    </div>
                </div>
            </div>


            

        </div>
    </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>