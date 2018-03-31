@extends('layouts.page')

@section('title', 'Organizations')

@section('content')
    @foreach ($orgs as $org)
        <li>{{ $org->title }}</li>
    @endforeach
@endsection