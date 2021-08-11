@extends('layouts.admin')
@section('dashboard')
    active
@endsection
@section('title') Dashboard @endsection
@section('content')
    <h1 style="text-align:center;">Добро пожаловать  {{Auth::user()->name}} в админ панель</h1>
  
@endsection