@extends('layouts.app')
@section('main')
    <form action="{{ route('markets.store') }}" 
          method="post">
        {!! csrf_field() !!}
        <label for="name">Market Name</label>
        <input type="text" name="name">
        <label for="city">City</label>
        <input type="text" name="city">
        <label for="website">Website</label>
        <input type="text" name="website"><br />
        <button type="submit">Create</button>
    </form>
@endsection