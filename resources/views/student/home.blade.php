
<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewpoint" content="width=dvice-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatibe" content="ie=edge">
        <title>CRUD</title>
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    </head>
    <body>
        <div class="bg-dark py-3">
        <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">To Do</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('student.index')}}">Students</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('interns.index')}}">Interns</a>
        </li>
       
      </ul>
    </div>
  </div>
</nav>
        </div>
        </div>

       


</body>
</html>