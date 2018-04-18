@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" style="text-align:center;">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div>describe your ideal baubl<div>
            <design></design>
            <!-- <div class="card">
                <div class="card-header">welcome to baubl</div>

                <div class="card-body">
                </div>
            </div> -->
        </div>
    </div>
</div>
@endsection
