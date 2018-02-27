@extends('layouts.app')
@section('main')
    <ul>
        @foreach ($farms as $farm)
            <li>
                <a href="{{ route('farms.show', $farm) }}">
                    {{ $farm->name }}
                </a>
            </li>
        @endforeach
       
        <li>
            <a href="{{ route('markets.index') }}">Go to Markets</a>
        </li>    
    </ul>
    
    {{ $farms->links() }}
@endsection