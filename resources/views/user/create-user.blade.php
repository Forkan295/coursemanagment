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
          <h2 class="text-center">Create your profile</h2>
          <br><br>

          <div class="row">
              <div class="col-md-6 offset-md-3">
                <form action="{{ route('active.user', $user->user_token) }}" method="POST">
                    @csrf
             
                    <div class="form-group">
                      <label for="">Email address</label>
                      <input type="email" class="form-control" value="{{ old('email', $user->email) }}" disabled>
                    </div>

                    <h5>Create new password</h5>
                    <div class="form-group">
                      <label for="">Password</label>
                      <input type="password" class="form-control" name="password" placeholder="Enter password">
                        <p class="text-danger">
                            {{ $errors->first('password') }}
                        </p>
                    </div>

                    <div class="form-group">
                      <label for="">Confirm password</label>
                      <input type="password" class="form-control" name="password_confirmation" placeholder="Enter password again">
                        <p class="text-danger">
                            {{ $errors->first('password_confirmation') }}
                        </p>
                    </div>
             
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
              </div>
          </div>

      </div>

    @include('sweetalert::alert')
  
  </body>
</html>