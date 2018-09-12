@extends('Centaur::layout')

@section('title', 'Dashboard')

@section('content')
<div class="row">
 
 
    @if (Sentinel::check())
    <div class="jumbotron">


        <h1>Hello, {{ Sentinel::getUser()->email }}!</h1>
        <p>Uspješno ste se prijavili.</p>
    </div>
    @else
        <div class="jumbotron">
            <h1>Dobro Došli!</h1>
            <p>Morate se prijaviti za nastavak.</p>
            <p><a class="btn btn-success btn-lg" href="{{ route('auth.login.form') }}" role="button">Prijavite se</a></p>
        </div>
    @endif

   >
</div>
@stop