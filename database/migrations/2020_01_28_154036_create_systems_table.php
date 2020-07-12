<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('systems', function (Blueprint $table) {
            $table->bigIncrements('id');

            //System Info
            $table->string('app_name')->nullable()->default('DTP ADMIN');
            $table->string('website_title')->nullable()->default('Dcodea IT');
            $table->string('website_slogan')->nullable()->default('Training program');
            $table->text('app_description')->nullable();
            $table->text('app_keywords')->nullable();
            $table->string('primary_contact')->nullable();
            $table->string('secondary_contact')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('street_address')->nullable();
            $table->string('location')->nullable();
            $table->string('city')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable(); 

            // Files & Uploads
            $table->string('main_logo')->nullable();
            $table->string('mobile_logo')->nullable();
            $table->string('app_favicon')->nullable();
            $table->string('app_banner')->nullable();
            $table->string('default_user')->nullable();

            // Settings & Tools
            $table->boolean('show_website')->default(true);
            $table->boolean('show_home_slider')->default(false);
            $table->boolean('admission_availability')->default(true);
            $table->boolean('can_apply_for_course')->default(true);
            $table->string('sms_client')->nullable()->default('greenweb');
            $table->boolean('sms_on_student_admission')->default(true);
            $table->boolean('sms_on_student_payment_update')->default(true);
            $table->boolean('sms_on_salary')->default(false);
            $table->boolean('applicant_sms_verify')->default(true);
            $table->boolean('trainer_sms_verify')->default(false);
            $table->boolean('staff_sms_verify')->default(false);
            $table->boolean('email_on_student_admission')->default(false);
            $table->boolean('email_on_student_payment_update')->default(false);
            $table->boolean('email_on_salary')->default(false);

            //API Integration
            $table->string('google_app_key')->nullable();
            $table->string('google_app_secret')->nullable();
            $table->string('facebook_app_key')->nullable();
            $table->string('facebook_app_secret')->nullable();
            $table->string('mapbox_access_token')->nullable();
            $table->string('gmap_api_key')->nullable();
            $table->string('greenweb_app_id')->nullable();
            $table->string('greenweb_app_secret')->nullable();
            $table->string('bulksmsbd_app_id')->nullable();
            $table->string('bulksmsbd_app_secret')->nullable();
            $table->string('onnorokomsms_api_key')->nullable();
            $table->string('pusher_app_id')->nullable();
            $table->string('pusher_app_secret')->nullable();
            
            //Meta Scripts
            $table->text('header_scripts')->nullable();
            $table->text('footer_scripts')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('systems');
    }
}
