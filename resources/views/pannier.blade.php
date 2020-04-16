@extends('home.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">panniers</div>
    @foreach($panniers as $pannier)
                <div class="card-body">
                    You are logged in!
                </div>
    @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
