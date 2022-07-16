@extends('layouts.app')
@section('title', 'Home')
@section('content')
<h2>Bienvenidos a tú Banco amigo</h2>
<div class="container">
    <div class="row">
        <div class="col col-6">
            <x-transacciones-bancarias />
        </div>
        <div class="col col-6">
            <x-estado-cuenta/>
        </div>
    </div>
</div>
@endsection