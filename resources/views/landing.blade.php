@extends('layouts.anon')
@section('content')
    <!-- Hero Section -->
    @include('components.ui.anon.hero')
    <!-- Company Logo Section -->
    @include('components.ui.anon.company-logo')
    <!-- Partner Companies Section -->
    @include('components.ui.anon.partner-companies')
    <!-- Why Us Section -->
    @include('components.ui.anon.whyus')
    <!-- Talented Section -->
    @include('components.ui.anon.talented')
    <!-- Featured Job Section -->
    @include('components.ui.anon.featured-job')
    <!-- Tutorial Apply Section -->
    @include('components.ui.anon.tutorial')
@endsection