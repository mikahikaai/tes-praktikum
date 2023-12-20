@extends('welcome')

@section('JUDUL', 'Home')

@section('CONTENT')
    <h3>Selamat Datang {{ Auth::user()->name }}</h3>
@endsection