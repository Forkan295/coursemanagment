<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Install database</title>
  </head>
  <body>
      <div class="container">
          <br>
          <h2 class="text-center">Install the system</h2>
          <br><br>

          <div class="row">
              <div class="col-md-6 offset-md-3">
                  <h4>Setup database</h4><br>
                  <form action="{{ route('db.setup') }}" method="POST">
                    @csrf
                    <div class="form-group">
                      <label for="">Database Name</label>
                      <input type="text" class="form-control" name="db_name" value="{{ old('db_name') }}" placeholder="Enter database name">
                    </div>

                    <div class="form-group">
                      <label for="">Database Username</label>
                      <input type="text" class="form-control" name="db_username" value="{{ old('db_username') }}" placeholder="Enter database username">
                    </div>
                    
                    <div class="form-group">
                      <label for="">Database Password (if any)</label>
                      <input type="text" class="form-control" name="db_password" placeholder="Enter database password">
                    </div>
                    <br>
             
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