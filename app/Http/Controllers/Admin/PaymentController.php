<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Student;
use Illuminate\Http\Request;
use App\Events\SendTextMessage;
use App\Http\Controllers\Controller;
use App\PaymentRecord;
use App\System;
use Illuminate\Support\Facades\Hash;

class PaymentController extends Controller
{


    // student payment Update functionality
    public function updatePayment(Request $request, $id)
    {
        //    dd($request->all());
        $request->validate([
            'paid' => 'required',
            'password' => 'required'
            // 'password' => 'required',
        ]);

        $authCheck = $this->checkAuthPassword($request->password);

        if(!$authCheck)
        {
           toast('Incorrect password. it seems you are not authenticated user.','danger');
           return redirect()->back();
        }
        
        $student = Student::whereId($id)->first();

        $payable = $student->course->course_fees - ($student->paid + $student->discount);

        if( $request->paid > ($student->course->course_fees - ( $student->paid + $student->discount ) ) )
        {
            toast('Payment cannot exceed ' . $payable . ' TK ( payable due ).', 'error');
            return redirect()->back();
        }
        if($student->discount > 0)
        {
            $discount = $student->discount;
        }
        else 
        {
            $discount = $request->discount;
        }
        $student->paid = $student->paid + $request->paid;
        $student->discount = $discount;
        $student->save();

        if ($student->paid == $student->course->course_fees) 
        {
            $student->payment_status = true;
        } 
        else 
        {
            $student->payment_status = false;
        }

        $student->save();

        $payment = new PaymentRecord();
        $payment->amount = $request->paid;
        $payment->student_id = $student->id;
        $payment->user_id = auth()->user()->id;
        $payment->save();

        // dd($payment);

        $system = System::first();

        if($system->sms_on_student_payment_update == true)
        {
            $message = "";
            if($student->paid == ($student->course->course_fees - $student->discount))
            {
                $message = "Hello " . $student->name .
                    "\nYour course payment has been completed.".
                    "\nDCODEA IT INSTITUTE.";
            }
            else
            {
                $message = "Hello " . $student->name .
                    "\nPayment " . $request->paid . " TK has been received.".
                    "\nDCODEA IT INSTITUTE.";
            }
    
            event(new SendTextMessage($student->phone, $message));
        }


        toast('Student payment updated successfully.', 'success');
        return redirect()->route('detailes.student', $id);        
    }
    

    //Make discount on students
    public function makeDiscount(Request $request, $id)
    {
        //    dd($request->all());
        $request->validate([
            'discount' => 'required',
            'password' => 'required',
            // 'password' => 'required',
        ]);

        $authCheck = $this->checkAuthPassword($request->password);

         if(!$authCheck)
         {
            toast('Incorrect password. it seems you are not authenticated user.','danger');
            return redirect()->back();
         }
 

        $student = Student::whereId($id)->first();

        if($student->discount > 0)
        {
            $discount = $student->discount;
        }
        else 
        {
            $discount = $request->discount;
        }
        
        $student->discount = $discount;
        $student->save();

        //Send message on course discount
        $message = "Congratulations " . $student->name .
                "\nyou got a discount of ". $discount . "TK on your current course.".
                "\nDCODEA IT INSTITUTE.";
    
        event(new SendTextMessage($student->phone, $message));
        toast('Discount added successfully.', 'success');
        return redirect()->route('detailes.student', $id);        
    }

    public function paymentRecords()
    {
        $data['payments'] = PaymentRecord::latest()->paginate(100);
        return view('dashboard.payment.records',$data);
    }


    // Callback function to check ther user is authenticated or not
    public function checkAuthPassword($password)
    {
        $email = auth()->user()->email;
        $user = User::where( 'email', $email )->first();
        $check = Hash::check($password, $user->password, []);
         return $check;
    }
    
}
