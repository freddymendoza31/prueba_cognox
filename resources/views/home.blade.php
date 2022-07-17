@extends('layouts.app')
@section('title', 'Home')
@section('content')
<div class="container">
    <div class="row">
        <div class="col col-6 text-center">
            <x-transacciones-bancarias />
        </div>
        <div class="col col-6 text-center">
            <x-estado-cuenta/>
        </div>
    </div>
</div>
@endsection
