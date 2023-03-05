<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Operation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>
<body>
  <div class="main_content pt-3">
     <div class="container">
        <div class="row">
            <!-- //show error globaly
@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
@endif -->
        @if(session()->has('success'))
           <div class="alert alert-success">
              {{ session('success') }}
           </div>
        @endif
        <div class="col-md-4">
            <div class="card" style="">
                    <div class="card-header">
                      Add Student
                    </div>
                    <div class="card-body">
                    <form action="{{ route('store') }}" method="post">
                        @csrf

                        <div class="mb-3">
                            <label for="" class="form-label">Student Image</label>
                            <input type="text" class="form-control" name="name" value="">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Student Email</label>
                            <input type="text" class="form-control" name="email" value="{{ old('email') }}">

                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <input type="submit" class="btn btn-primary" value="Submit">
                        </div>
                     </form>
                   </div>
                </div>
            </div>

        <div class="col-md-8">
             <div class="card" style="">
                 <div class="card-header">
                      All Students
                 </div>
                <div class="card-body">
                    
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Serial</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php $i=0 @endphp
                    @foreach($all_infos as $item)
                    @php $i++ @endphp
                    <tr>
                        <th scope="row">
                            {{ $i }}
                        </th>
                        <td>{{ $item->student_name }}</td>
                        <td>{{ $item->student_email }}</td>
                        <td>
                       
                            <a href="{{ route('edit',$item->id) }}" class="btn btn-info">Edit</a>
                            <a href="{{ route('delete',$item->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure to delete?')">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                     </tbody>
                  </table> 
                </div>
            </div>
        </div>



        </div>
     </div>
  </div>



<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>


  </body>
</html>