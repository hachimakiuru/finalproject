@extends('layouts.layout')
@push('css')
<link rel="stylesheet" href="{{ asset('/css/restaurant-dashboard.css')  }}" >
@endpush
@section('content')

@include('restaurants.index')

@endsection