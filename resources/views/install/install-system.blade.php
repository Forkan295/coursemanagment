<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Install super admin</title>
  </head>
  <body>
      <div class="container">
          <br>
          <h2 class="text-center">Install the system</h2>
          <br><br>

          <div class="row">
              <div class="col-md-6 offset-md-3">
                  <form action="{{ route('app.install.system') }}" method="POST">
                    @csrf

                    <h5>App informations</h5>
                    
                    <div class="form-group">
                      <label for="">App Name</label>
                      <input type="text" class="form-control" name="app_name" value="{{ old('app_name') }}" placeholder="Enter app name">
                    </div>

                    <div class="form-group">
                      <label for="">Website Title</label>
                      <input type="text" class="form-control" name="website_title" value="{{ old('website_title') }}" placeholder="Enter website title">
                    </div>

                    <div class="form-group">
                      <label for="">Website slogan</label>
                      <input type="text" class="form-control" name="website_slogan" value="{{ old('website_slogan') }}" placeholder="Enter website slogan">
                    </div><br>

                    <h5>Contact informations</h5>
                    <div class="form-group">
                        <label for="">Primary contact</label>
                        <input type="text" class="form-control" name="primary_contact" value="{{ old('primary_contact') }}" placeholder="Enter primary phone number">
                    </div>

                    <div class="form-group">
                        <label for="">Contact email</label>
                        <input type="text" class="form-control" name="contact_email" value="{{ old('contact_email') }}" placeholder="Enter contact email">
                    </div>


                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                  <br><br><br>
              </div>
          </div>

      </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
   
    @include('sweetalert::alert')
  
  </body>
</html>