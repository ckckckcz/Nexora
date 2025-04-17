@extends('layouts.anon')
@section('content')
    <!-- Hero Section -->
    @include('Components.UI.Anon.Hero')

    <!-- Stats Section -->
    @include('Components.UI.Anon.Stats')

    <!-- Features Section -->
    @include('Components.UI.Anon.features')

    <!-- Featured Jobs Section -->
    @include('Components.UI.Anon.Featured-Jobs')

    <!-- Blog Section -->
    @include('Components.UI.Anon.Blog')

    <!-- Testimonials Section -->
    @include('Components.UI.Anon.Testimoni')

    <!-- Partner Logos Section -->
    @include('Components.UI.Anon.Partners')

    <!-- CTA Section -->
    @include('Components.UI.Anon.Cta')
@endsection