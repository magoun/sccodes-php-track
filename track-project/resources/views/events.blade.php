@extends('layouts.page')

@section('title', 'Events')

@section('content')
    <ul>
        @foreach ($events as $event)
            <li>{{ $event->event_name }} hosted by {{ $event->group_name }}
                <ul>
                    <li>Time: <?= DateTime::createFromFormat('Y-m-d\TH:i:s\Z', $event->time)
                                    ->format('D j M y') ?></li>
                </ul>
            </li>
        @endforeach
    </ul>
@endsection