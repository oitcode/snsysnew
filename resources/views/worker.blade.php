@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Worker</h1>
@stop

@section('content')
  @livewire('worker-component')
@stop
