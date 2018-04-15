@extends('layouts.page')

@section('title', 'Organizations')

@section('content')
    @foreach ($orgs as $org)
        <li>
            <a href="{{ getOrgWebsite( $org ) }}">{{ $org->title }}</a>
            @if ($org->field_org_status == "Active")
                - {{ $org->field_city }}
            @else
                - {{ $org->field_org_status }}
            @endif
        </li>
    @endforeach
@endsection