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
            <div class="h4 text-white">CRUD</div>
        </div>
        </div>

        <div class="container ">
            <div class="d-flex justify-content-between py-3">
                <div class="h4">Students</div>
                <div>
                   <a href="{{ route('interns.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>

            <form action="{{route('intern.update',$intern->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
               @method('put')
            <div class="card border-0 shadow-lg">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" placeholder="Enter Name"
                         class="form-control @error('name') is-invalid @enderror" value="{{ old('name',$intern->name) }}">
                         @error('name')
                         <p class="invalid-feedback">{{ $message }}</p>

                         @enderror
                         
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" name="email" id="email" placeholder="Enter Email"
                         class="form-control @error('email') is-invalid @enderror" value="{{ old('email',$intern->email) }}">
                         @error('email')
                         <p class="invalid-feedback">{{ $message }}</p>
                         @enderror

                    </div>
                    <div class="mb-3">
                        <label for="field" class="form-label">Field</label>
                        <input type="text" name="field" id="field" placeholder="Enter Field"
                         class="form-control @error('email') is-invalid @enderror" value="{{ old('field',$intern->field) }}">
                         @error('field')
                         <p class="invalid-feedback">{{ $message }}</p>
                         @enderror

                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea name="address" id="address" cols="30" rows="4" placeholder="Enter Address" class="form-control">{{old('address',$intern->address)}}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label"></label>
                        <input type="file" name="image" class="@error('image') is-invalid @enderror">
                        @error('image')
                        <p class="invalid-feedback">{{$message}}</p>
                        @enderror
                        <div class="pt-4">

                        @if($intern->image !="" && file_exists(public_path()."/upload/intern/".
                                $intern->image))
                                <img src="{{ url ('upload/intern/'.$intern->image) }}" alt="" width="100" height="100" >

                                @endif

                                </div>

                    </div>

                </div>
                

            </div>
            <button class="btn btn-primary mb-3">Update</button>
               
            </form>
            

           
        </div>
    </body>
</html>