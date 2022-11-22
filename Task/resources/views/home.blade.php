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


                    <h1>Welcome {{ auth()->user()->name }}</h1>
                    <a href="/companie"><button type="button" class="btn btn-primary"> Companies</button></a>
                    <a href="/emplyees"><button type="button" class="btn btn-primary"> Employees</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection