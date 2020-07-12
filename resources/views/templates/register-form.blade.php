{{-- @include('parts/messages')      --}}
<div class="jumbotron">
    <form action="{{ route('add.register') }}" method="POST"> 
        @csrf
        <fieldset>
  
            <legend>
                <p>অনলাইনে রেজিস্ট্রেশন করুন</p>
            </legend>    

            <div class="form-group">
                <label for="exampleInputEmail1">Full Name :</label>
                <input type="text" class="form-control" name="name" id="full-name" value="{{ old('name') }}" placeholder="Enter your full name">
                <p class="text-danger">
                    {{ $errors->first('name') }}
                </p>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Father's name :</label>
                <input type="text" class="form-control" name="father_name" id="full-name" value="{{ old('father_name') }}" placeholder="Enter your father name">
                <p class="text-danger">
                    {{ $errors->first('father_name') }}
                </p>
            </div>

            <div class="form-group">
                <label for="exampleSelect1">Gender:</label>
                <select class="form-control" id="course" name="gender" value="{{ old('gender') }}">
                    <option disabled>Select your gander</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    {{-- <option value="3">Another</option> --}}
                </select>
                <p class="text-danger">
                    {{ $errors->first('gender') }}
                </p>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Phone no (11 digit) :</label>
                <input type="text" class="form-control" name="phone" id="phone" placeholder="017########" value="{{ old('phone') }}">
                <p class="text-danger">
                    {{ $errors->first('phone') }}
                </p>
                <small id="phone" class="form-text text-danger"><strong>Note: </strong> রেজিস্ট্রশেনটি সক্রিয় করার জন্য আপনার ফোন নাম্বারে একটি ভেরিফিকেশ কোড পাঠনো হবে। সুতরাং অনুগ্রহ করে সঠিক ফোন নাম্বার ব্যাবহার করুন।</small>
            </div>
            
            <div class="form-group">
                <label for="exampleSelect1">Courses :</label>
                <select class="form-control" id="course" name="course_id" value="{{ old('course_id') }}">
                    <option selected disabled>Please Select a course</option>
                    @foreach ($courses as $item)
                        <option value="{{ $item->id }}">{{ $item->course_name." (". $item->course_period .")" }}</option>
                    @endforeach
                </select>
                <p class="text-danger">
                    {{ $errors->first('course_id') }}
                </p>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Present Address:</label>
                <input type="text" class="form-control" name="present_address" id="address" value="{{ old('present_address') }}" placeholder="Enter your present address">
                <p class="text-danger">
                    {{ $errors->first('present_address') }}
                </p>
            </div>
        
            <div class="form-group">
                <label for="exampleInputEmail1">Postal/Zip code:</label>
                <input type="text" class="form-control" name="postal_code" id="address" value="{{ old('postal_code') }}" placeholder="Enter your postal code">
                <p class="text-danger">
                    {{ $errors->first('postal_code') }}
                </p>
            </div>
        

            <div class="form-group">
                <label for="exampleInputEmail1">Email Address (Optional):</label>
                <input type="text" class="form-control" name="email" value="{{ old('email') }}" id="last-name" placeholder="Enter your valid email address">
                <p class="text-danger">
                    {{ $errors->first('email') }}
                </p>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Facebook Profile link (optional) :</label>
                <input type="text" class="form-control" name="facebook" id="facebook" value="{{ old('facebook') }}" placeholder="Enter your facebook profile link">
                <p class="text-danger">
                    {{ $errors->first('facebook') }}
                </p>
                <small id="phone" class="form-text text-muted">Ex: ( www.facebook.com/example-user )</small>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </fieldset>
    </form>
</div>