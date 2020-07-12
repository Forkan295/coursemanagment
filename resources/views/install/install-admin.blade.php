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
                  <h4>Create Super Admin</h4><br>
                  <form action="{{ route('app.install.admin') }}" method="POST">
                    @csrf
                    <div class="form-group">
                      <label for="">Name</label>
                      <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Enter full name">
                    </div>

                    <div class="form-group">
                      <label for="">Email address</label>
                      <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter email">
                    </div>

                    <div class="form-group">
                      <label for="">Password</label>
                      <input type="password" class="form-control" name="password" placeholder="Enter password">
                    </div>

                    <div class="form-group">
                      <label for="">Confirm password</label>
                      <input type="password" class="form-control" name="password_confirmation" placeholder="Enter password again">
                    </div>
             
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
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