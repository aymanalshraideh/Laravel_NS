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
                <h3>Add Employee</h3>

                <form method="post" action="{{route('addEmployee')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">First Name</label>
                        <input type="text" class="form-control" name="firstName">
                        @error('firstName')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Last Name</label>
                        <input type="text" class="form-control" name="lastName">
                        @error('lasttName')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label"> Email</label>
                        <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
                        @error('email')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone Number</label>
                        <input type="text" class="form-control" name="phone">
                        @error('phone')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Companie</label>
                        <select class="form-select" aria-label="Default select example" name="company_id">
                        
                            @foreach ($all as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                            
                            
                        </select>
                        @error('phone')
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
                Create new Employee
            </button>
            <div class="card">

                <div class="card">
                    <div class="card-body"> Companies List</div>
                </div>
                <div class="card-body">

                    <table class="table">
                        <thead>
                            <tr>

                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">Companie</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allEmployees as $item) 
                                <tr>
                                    
                                    <th >{{ $item->firstName }}</th>
                                    <th >{{ $item->lastName }}</th>
                                    <th > {{ $item->email }} </th>
                                    <th >{{ $item->phone }}</th>
                                    <th >{{ $item->name }}</th>
                                    <th>
                                    
                                    <a href="{{route('singleEmployee',['id'=>$item->id])}}"><button type="button" class="btn btn-light  m-2">Edit</button></a>
                                    <a href="{{route('deleteemployee',['id'=>$item->id])}}">  <button type="button" class="btn btn-danger m-2">Delete</button></a>
                                    </th>
                                    
                                </tr>
                            
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection