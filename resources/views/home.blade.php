@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('style/home.css') }}">
@endpush

@section('content')

@include('partials.hero')
@include('partials.menu')
@include('partials.testimoni')
@include('partials.aboutus')
@include('partials.ads')

@endsection
