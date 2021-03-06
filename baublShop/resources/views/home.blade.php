@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">welcome to baubl</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!

                    <div class="content">
                        <div class="links">
                            <a href="{{ url('design') }}">design a baubl</a>
                            <a href="{{ url('buy') }}">buy a baubl</a>
                            <a href="{{ url('commission') }}">commission a baubl</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
