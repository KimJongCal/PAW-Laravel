@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(Auth::user()->level == "ADMIN")
                        You are logged in as <strong>{{ Auth::user()->level }}</strong>!
                        <hr>
                        <a class="btn btn-primary" href="{{ route('users.index') }}">Users Management</a>
                    @else
                        You are logged in as <strong>{{ Auth::user()->level }}</strong>!
                        <hr>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
