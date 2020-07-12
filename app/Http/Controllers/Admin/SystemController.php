<?php

namespace App\Http\Controllers\Admin;

use App\System;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class SystemController extends Controller
{
    
    function systemInfo()
    {
      return view('dashboard.system.system-info');
    }
    
    function SaveSystemInfo(Request $request)
    {
      $request->validate([
        "app_name" => 'required|max:191',
        "website_title" => 'required|max:191',
        "website_slogan" => 'required|max:191',
        // "app_description" => 'max:191',
        // "app_keywords" => 'max:191',
        "primary_contact" => 'max:191',
        "secondary_contact" => 'max:191',
        "contact_email" => 'max:191',
        "street_address" => 'max:191',
        "location" => 'max:191',
        "city" => 'max:191',
        "latitude" => 'max:191',
        "longitude" => 'max:191',
        "office_time" => 'max:255',
      ]);

      $system = System::first();
      $system->app_name = $request->app_name; 
      $system->website_title = $request->website_title; 
      $system->website_slogan = $request->website_slogan; 
      $system->app_description = $request->app_description; 
      $system->app_keywords = $request->app_keywords; 
      $system->primary_contact = $request->primary_contact; 
      $system->secondary_contact = $request->secondary_contact; 
      $system->contact_email = $request->contact_email; 
      $system->street_address = $request->street_address; 
      $system->location = $request->location; 
      $system->city = $request->city; 
      $system->latitude = $request->latitude; 
      $system->longitude = $request->longitude; 
      $system->office_time = $request->office_time; 
      $system->save();

      toast('Systen info updated successfully', 'success');
      return redirect()->back();
    }


    function systemUploads()
    {
      return view('dashboard.system.system-uploads');
    }

    function SaveSystemUploads(Request $request)
    {
      // $request->validate([
      //   "main_logo" => 'image|mimes:jpeg,png,jpg|max:2048',
      //   "mobile_logo" => 'image|mimes:jpeg,png,jpg|max:2048',
      //   "app_favicon" => 'image|mimes:jpeg,png,jpg|max:1024',
      //   "app_banner" => 'image|mimes:jpeg,png,jpg|max:3072'
      // ]);

      if(!Storage::disk('public')->exists('system'))
      {
          Storage::disk('public')->makeDirectory('system');
      } 

      $system = System::first();

      //Main logo
      if($request->hasFile('main_logo'))
      {

        $request->validate([
          "main_logo" => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);


          if($system->main_logo != null)
          {
              if(Storage::disk('public')->exists('system/'.$system->main_logo))
              {
                  Storage::disk('public')->delete('system/'.$system->main_logo);
              }
          }

          $file = $request->file('main_logo');
          $file_ext = $file->getClientOriginalExtension();
          $main_logo = 'main_logo_'.time().'.'.$file_ext;

          $save = 'storage/system/'. $main_logo;
 
          $image = Image::make($file)
                          ->resize(150,40)
                          ->save($save);
      }
      else
      {
          $main_logo = $system->main_logo;
      }


      //Mobile logo
      if($request->hasFile('mobile_logo'))
      {
        $request->validate([
          "mobile_logo" => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

          if($system->mobile_logo != null)
          {
              if(Storage::disk('public')->exists('system/'.$system->mobile_logo))
              {
                  Storage::disk('public')->delete('system/'.$system->mobile_logo);
              }
          }
          $file = $request->file('mobile_logo');
          $file_ext = $file->getClientOriginalExtension();
          $mobile_logo = 'mobile_logo_'.time().'.'.$file_ext;

          $save = 'storage/system/'. $mobile_logo;

          $image = Image::make($file)
                          ->resize(30,30)
                          ->save($save);
      }
      else
      {
          $mobile_logo = $system->mobile_logo;
      }

      //App Favicon
      if($request->hasFile('app_favicon'))
      {

        $request->validate([
          "app_favicon" => 'image|mimes:jpeg,png,jpg|max:1024'
        ]);

          if($system->app_favicon != null)
          {
              if(Storage::disk('public')->exists('system/'.$system->app_favicon))
              {
                  Storage::disk('public')->delete('system/'.$system->app_favicon);
              }
          }
          $file = $request->file('app_favicon');
          $file_ext = $file->getClientOriginalExtension();
          $app_favicon = 'app_favicon_'.time().'.'.$file_ext;

          $save = 'storage/system/'. $app_favicon;

          $image = Image::make($file)
                          ->resize(16,16)
                          ->save($save);
      }
      else
      {
          $app_favicon = $system->app_favicon;
      }

      //App Banner
      if($request->hasFile('app_banner'))
      {

        $request->validate([
          "app_banner" => 'image|mimes:jpeg,png,jpg|max:6072'
        ]);
        
          if($system->app_banner != null)
          {
              if(Storage::disk('public')->exists('system/'.$system->app_banner))
              {
                  Storage::disk('public')->delete('system/'.$system->app_banner);
              }
          }
          $file = $request->file('app_banner');
          $file_ext = $file->getClientOriginalExtension();
          $app_banner = 'app_banner_'.time().'.'.$file_ext;

          $save = 'storage/system/'. $app_banner;

          $image = Image::make($file)
                          ->fit(500,300)
                          ->save($save);
      }
      else
      {
          $app_banner = $system->app_banner;
      }

      $system->main_logo = $main_logo; 
      $system->mobile_logo = $mobile_logo; 
      $system->app_favicon = $app_favicon; 
      $system->app_banner = $app_banner; 
      
      $system->save();

      toast('Files uploaded successfully', 'success');
      return redirect()->back();
    }

    
    function settingTools()
    {
      return view('dashboard.system.setting-tools');
    }

    function SaveSettingTools(Request $request)
    {

      if($request->has('show_website'))
      {
        $show_website = true;
      }
      else 
      {
        $show_website = false;

      }
      if($request->has('show_home_slider'))
      {
        $show_home_slider = true;
      }
      else 
      {
        $show_home_slider = false;

      }
      if($request->has('admission_availability'))
      {
        $admission_availability = true;
      }
      else 
      {
        $admission_availability = false;

      }
      if($request->has('can_apply_for_course'))
      {
        $can_apply_for_course = true;
      }
      else 
      {
        $can_apply_for_course = false;

      }
      if($request->has('sms_on_student_admission'))
      {
        $sms_on_student_admission = true;
      }
      else 
      {
        $sms_on_student_admission = false;

      }
      if($request->has('sms_on_student_payment_update'))
      {
        $sms_on_student_payment_update = true;
      }
      else 
      {
        $sms_on_student_payment_update = false;

      }
      if($request->has('sms_on_salary'))
      {
        $sms_on_salary = true;
      }
      else 
      {
        $sms_on_salary = false;

      }
      if($request->has('applicant_sms_verify'))
      {
        $applicant_sms_verify = true;
      }
      else 
      {
        $applicant_sms_verify = false;

      }
      if($request->has('trainer_sms_verify'))
      {
        $trainer_sms_verify = true;
      }
      else 
      {
        $trainer_sms_verify = false;

      }
      if($request->has('staff_sms_verify'))
      {
        $staff_sms_verify = true;
      }
      else 
      {
        $staff_sms_verify = false;

      }
      if($request->has('email_on_student_admission'))
      {
        $email_on_student_admission = true;
      }
      else 
      {
        $email_on_student_admission = false;

      }
      if($request->has('email_on_student_payment_update'))
      {
        $email_on_student_payment_update = true;
      }
      else 
      {
        $email_on_student_payment_update = false;

      }
      if($request->has('email_on_salary'))
      {
        $email_on_salary = true;
      }
      else 
      {
        $email_on_salary = false;

      }

      if($request->app_environment == true)
      {
        setEnv('APP_ENV', 'production');
      }
      else if($request->app_environment == false)
      {
        setEnv('APP_ENV', 'local');
      }

      $system = System::first();
      $system->app_environment = $request->app_environment;
      $system->pub_path = $request->pub_path;
      $system->show_website = $show_website;
      $system->show_home_slider = $show_home_slider;
      $system->admission_availability = $admission_availability;
      $system->can_apply_for_course = $can_apply_for_course;
      $system->sms_client = $request->sms_client;
      $system->sms_on_student_admission = $sms_on_student_admission;
      $system->sms_on_student_payment_update = $sms_on_student_payment_update;
      $system->sms_on_salary = $sms_on_salary;
      $system->applicant_sms_verify = $applicant_sms_verify;
      $system->trainer_sms_verify = $trainer_sms_verify;
      $system->staff_sms_verify = $staff_sms_verify;
      $system->email_on_student_admission = $email_on_student_admission;
      $system->email_on_student_payment_update = $email_on_student_payment_update;
      $system->email_on_salary = $email_on_salary;
      $system->save();
      toast('Settings & tools updated successfully.', 'success');
      return redirect()->back();

    }

    function apiIntegration()
    {
      return view('dashboard.system.api');
    }

    function SaveApiIntegration(Request $request)
    {
      $request->validate([
        "google_app_key" => 'max:191',
        "google_app_secret" => 'max:191',
        "facebook_app_key" => 'max:191',
        "facebook_app_secret" => 'max:191',
        "mapbox_access_token" => 'max:191',
        "gmap_api_key" => 'max:191',
        "greenweb_app_id" => 'max:191',
        "greenweb_app_secret" => 'max:191',
        "bulksmsbd_app_id" => 'max:191',
        "bulksmsbd_app_secret" => 'max:191',
        "onnorokomsms_api_key" => 'max:191',
        "pusher_app_id" => 'max:191',
        "pusher_app_secret" => 'max:191'
      ]);

      $system = System::first();
      $system->google_app_key = $request->google_app_key;
      $system->google_app_secret = $request->google_app_secret;
      $system->facebook_app_key = $request->facebook_app_key;
      $system->facebook_app_secret = $request->facebook_app_secret;
      $system->mapbox_access_token = $request->mapbox_access_token;
      $system->gmap_api_key = $request->gmap_api_key;
      $system->greenweb_app_id = $request->greenweb_app_id;
      $system->greenweb_app_secret = $request->greenweb_app_secret;
      $system->bulksmsbd_app_id = $request->bulksmsbd_app_id;
      $system->bulksmsbd_app_secret = $request->bulksmsbd_app_secret;
      $system->onnorokomsms_api_key = $request->onnorokomsms_api_key;
      $system->pusher_app_id = $request->pusher_app_id;
      $system->pusher_app_secret = $request->pusher_app_secret;
      $system->save();

      toast('Api info updated successfully.', 'success');
      return redirect()->back();

    }


    function metaScripts()
    {
      return view('dashboard.system.meta-scripts');
    }

    function SaveMetaScripts(Request $request)
    {
      $system = System::first();
      $system->header_scripts = $request->header_scripts;
      $system->footer_scripts = $request->footer_scripts;
      $system->save();

      toast('Meta scripts updated successfully.', 'success');
      return redirect()->back();
    }

    function uploadsDelete($type)
    {
      $system = System::first();

      if($type == 'main_logo')
      {
        $file = $system->main_logo;
        $system->main_logo = null;
      }
      if($type == 'mobile_logo')
      {
        $file = $system->mobile_logo;
        $system->mobile_logo = null;
      }
      if($type == 'app_favicon')
      {
        $file = $system->app_favicon;
        $system->app_favicon = null;
      }
      if($type == 'app_banner')
      {
        $file = $system->app_banner;
        $system->app_banner = null;
      }

      $system->save();


      if($file != null)
      {
          if( Storage::disk('public')->exists( 'system/' . $file ) )
          {
              Storage::disk('public')->delete( 'system/' . $file );
          }
      }

      toast('File removed successfully', 'success');

      return redirect()->back();

    }
}
