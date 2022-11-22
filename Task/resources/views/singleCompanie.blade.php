@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">


        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif
          
            
          
          
          @foreach ($companie as $co) :
          <form method="post" action="{{route('editCompanie',['id'=>$co->id])}}" enctype="multipart/form-data">
          @csrf

            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Companie Name </label>
              <input type="name" class="form-control"  value="{{ $co->name }}">
            </div>

            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Companie Email</label>
              <input type="email" class="form-control" name="email" aria-describedby="emailHelp" value="{{ $co->email }}">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Companie Logo</label>
              <input type="file" class="form-control" name="logo" value="{{ $co->logo }}">
              <img src="{{ $co->logo }}" alt="">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Companie Website</label>
              <input type="text" class="form-control" name="website" value="{{ $co->website }}">
              
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
@endsection