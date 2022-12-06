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
          <a class="nav-link active" aria-current="page" href="/">Home</a>
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
        

        <div class="container ">
            <div class="d-flex justify-content-between py-3">
                <div class="h4">Intern Phase 2</div>
                <div>
                   <a href="{{ route('intern.create') }}" class="btn btn-primary">Create</a>
                </div>
            </div>

         @if(Session::has("success"))
         <div class="alert alert-success">
            {{ Session::get('success')}}

         </div>
         @endif

            <div class="card border-0 shadow-lg">
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Field</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                        @if($intern->isNotEmpty())
                        @foreach($intern as $intern)
                        <tr valign="middle">
                            <td>{{$intern->id}}</td>
                            
                            <td>
                                @if($intern->image !="" && file_exists(public_path()."/upload/intern/".
                                $intern->image))
                                <img src="{{ url ('upload/intern/'.$intern->image) }}" alt="" width="40" height="40" class="rounded-circle">
                                @else
                                <img src="{{ url ('assets/images/NoProfile.png') }}" alt="" width="40" height="40" class="rounded-circle">


                                
                                @endif
                            </td>


                            
                            <td>{{$intern->name}}</td>
                            <td>{{$intern->email}}</td>
                            <td>{{$intern->field}}</td>
                            <td>{{$intern->address}}</td>
                            <td>
                            <a href="{{ route('intern.edit',$intern->id)}}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="#" onclick="myfunction({{ $intern->id }})"  class="btn btn-danger btn-sm">Delete</a>
                                <form id="intern--{{ $intern->id}}" action="{{ route('intern.destroy',$intern->id) }}" method="post">
                                @csrf
                                @method('delete')
                            </form>
                            </td>
                        </tr>
                        @endforeach
                        @endif

    </body>

</html>
<script>
function myfunction(id)
{
    if(confirm("Are you sure you want to delete"))
    {
       document.getElementById('intern--'+id).submit();
    }
}

</script>