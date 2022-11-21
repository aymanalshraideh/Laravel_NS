@extends('layouts.app')

@section('content')
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5> -->
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <h3>Add companie</h3>

<form method="post" action="{{route('addCompanie')}}" enctype="multipart/form-data">
@csrf
    <div class="mb-3">
        <label  class="form-label">Companie Name</label>
        <input type="text" class="form-control" name="name" >
        @error('name')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Companie Email</label>
        <input type="email" class="form-control" name="email"  aria-describedby="emailHelp">
        @error('email')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
    </div>
    <div class="mb-3">
        <label  class="form-label">Companie Logo</label>
        <input type="file" class="form-control" name="logo">
        @error('logo')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
    </div>
    <div class="mb-3">
        <label  class="form-label">Companie Website</label>
        <input type="text" class="form-control"  name="website">
        @error('website')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
      
    </div>
    

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button></form>
      </div>
    </div>
  </div>
</div>
<div class="container">

    <div class="row justify-content-center">
   
        <div class="col-md-8">
             @if (session('status'))
                        <div class="alert alert-success">

                            {{ session('status') }}<i class="fa fa-check" aria-hidden="true"></i>

                        </div>
                    @endif
                    
          <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Create new Companie
</button>
            <div class="card">
            
            <div class="card">
            <div class="card-body"> Companies List</div>
            </div>
                <div class="card-body">

            <table class="table">
  <thead>
    <tr>
      
      <th scope="col">Companie Name</th>
      <th scope="col">Companie Logo</th>
      <th scope="col">Companie Website</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($all as $compane) {
        <tr>
            
            <th >{{ $compane->name }}</th>
            <th > <img src="{{ $compane->logo }}" alt=""> </th>
            <th >{{ $compane->website }}</th>
            <th>
            
            <a href="{{route('singlecompanie',['id'=>$compane->id])}}"><button type="button" class="btn btn-light  m-2">Edit</button></a>
            <a href="{{route('deletecompanie',['id'=>$compane->id])}}">  <button type="button" class="btn btn-danger m-2">Delete</button></a>
            </th>
            
        </tr>
    }
    @endforeach
   
  </tbody>
</table>
            </div></div>
        </div>
    </div>
</div>
@endsection