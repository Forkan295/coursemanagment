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
          position: relative;
          right: 20px;
          width: 115px;
          height: 145px;
          margin-right: -550px;
          margin-top: 110px;
          z-index: 999;
          border: 1px solid #CFD0D1;
          padding: 5px;
          background: white;
      }
      .info{
          margin-top: -280px;
          z-index: -999;
      }
      .institute-signature{
          margin-left: 540px !important;
      }
      .footer{
          margin-top: -10;
          border: 1px solid #CFD0D1;
          padding: 2px;
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
                    <div class="institute">
                        <h2 class="text-center">DCODEA IT INSTITUTE</h2>
                        <br>
                        <p>STUDENT ADMISSION RECEIPT</p>
                        <br>
                    </div>
                    <div class="">
                    <img class="avatar" src="{{ url('storage/students/'. $student->student_image) }}" alt="">
                    </div>
                </div>

                <div class="info">

                    <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td class="text-left">Student ID :</td>
                                    <td class="text-left">{{ $student->student_id }}</td>
                                </tr>
                                <tr>
                                    <td class="text-left">Name :</td>
                                    <td class="text-left">{{ $student->name }}</td>
                                </tr>
                                <tr>
                                    <td class="text-left">Father name :</td>
                                    <td class="text-left">{{ $student->father_name }}</td>
                                </tr>
                                <tr>
                                    <td class="text-left">Phone :</td>
                                    <td class="text-left">{{ $student->phone }}</td>
                                </tr>
                                <tr>
                                    <td class="text-left">Email :</td>
                                    <td class="text-left">{{ $student->email }}</td>
                                </tr>
                                <tr>
                                    <td class="text-left">Address :</td>
                                    <td class="text-left">{{ $student->present_address.', '. $student->postal_code }}</td>
                                </tr>
                            </tbody>
                    </table>

                    <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td class="text-left">Course name :</td>
                                    <td class="text-left">{{ $student->course->course_name }}</td>
                                </tr>
                                <tr>
                                    <td class="text-left">Course Fee :</td>
                                    <td class="text-left">{{ $student->course->course_fees }} TK</td>
                                </tr>
                                <tr>
                                    <td class="text-left">Paid  :</td>
                                    <td class="text-left">{{ $student->paid }} TK</td>
                                </tr>
                                <tr>
                                    <td class="text-left">Due  :</td>
                                    <td class="text-left">{{ $student->course->course_fees -  $student->paid }} TK</td>
                                </tr>
                                <tr>
                                    <td class="text-left">Class Schedule  :</td>
                                    <td class="text-left">{{ $student->schedule->schedule ." - ".  $student->class_time }}</td>
                                </tr>
            
                            </tbody>
                    </table>

                    <p class="text-left">
                        <?php if($student->paid == $student->course->course_fees ) {?>
                            <small>
                                <strong>Note:</strong> Your payment is completed. you have no due payments. Thank you for your co-operation.  
                            </small>
                        <?php } else { ?> 
                            <small>
                                <strong>Note:</strong> this is an auto generated receipt holding your course and admission informations. please keep this document carefully to update your next due payments.
                            </small>
                        <?php } ?>
                    </p>

                    <br><br><br><br>

                    <div class="row">
                        <div>
                            <p class="text-center trainee" style="border-top:1px dashed; width:183px">Trainee signature & date</p>  
                        </div>  
                        <div>
                            <p class="text-center institute-signature" style="border-top:1px dashed; width:183px">institute signature & date</p>  
                        </div>  
                    </div>
                    <div class="row">
                        <div>
                            <p class="text-center footer" style="font-size:15px">Dcodea IT Institute | 
                                Phone: 01881766497, 01622978106 | Address: Shitaljhrana R/A, Oxygen, Chattogram.</p>  
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