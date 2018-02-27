@extends('layouts.app')
@section('main')
    <form action="{{ route('markets.update', '$farm) }}" 
          method="post">
        {{ method_field('patch') }}
        {!! csrf_field() !!}
        
        @foreach ($markets as $id => $market)
            <div>
                <label for="{{ $market }}">
                    <input type="checkbox" 
                           name="markets[]" 
                           value="{{ $id }}">
                    {{ $farm->markets()
                            ->allRelatedIds()
                            ->contains($id) ? "checked" : "" }}
                    {{ $market }}
                </label>
            </div>
        @endforeach
        
        <label for="name">Market Name</label>
        <input type="text" name="name">
        <label for="city">City</label>
        <input type="text" name="city">
        <label for="website">Website</label>
        <input type="text" name="website"><br />
        <button type="submit">Create</button>
    </form>
@endsection