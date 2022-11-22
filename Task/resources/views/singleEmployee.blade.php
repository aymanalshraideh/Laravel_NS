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
          
            
          
          
          @foreach ($employee as $co) 
          <form method="post" action="{{route('editEmployee',['id'=>$co->id])}}">
          @csrf

            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">First Name </label>
              <input type="text" name="firstName" class="form-control"  value="{{ $co->firstName }}">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">First Name </label>
                <input type="text" name="lastName" class="form-control"  value="{{ $co->lastName }}">
              </div>

            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Companie Email</label>
              <input type="email" class="form-control" name="email" aria-describedby="emailHelp" value="{{ $co->email }}">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Phone Number </label>
                <input type="text" name="phone" class="form-control"  value="{{ $co->phone }}">
              </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Companie </label>
              <select class="form-select"  name="company_id">
                
                @foreach ($all as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
                
                
            </select>

              
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
        
          @endforeach  </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection