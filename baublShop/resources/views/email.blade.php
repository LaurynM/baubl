@extends('design')

@section('email')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" style="text-align:center;">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div>your quote request has been sent. we will contact you shortly.<div>
        </div>
    </div>
</div>
@endsection