@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <h1 class="section-title">Discover Countries Around the World</h1>
    
    <div class="flags-carousel">
        <h2 class="carousel-title">Arabic Countries</h2>
        <div class="flags-container">
            @foreach($arabicCountries as $country)
                <a href="{{ route('country.show', $country['cca2']) }}" class="flag-item">
                    <img src="{{ $country['flags']['png'] }}" alt="{{ $country['name']['common'] }} flag">
                    <div class="flag-name">{{ $country['name']['common'] }}</div>
                </a>
            @endforeach
            <!-- Duplicate for continuous scrolling -->
            @foreach($arabicCountries as $country)
                <a href="{{ route('country.show', $country['cca2']) }}" class="flag-item">
                    <img src="{{ $country['flags']['png'] }}" alt="{{ $country['name']['common'] }} flag">
                    <div class="flag-name">{{ $country['name']['common'] }}</div>
                </a>
            @endforeach
        </div>
    </div>
    
    <div class="flags-carousel">
        <h2 class="carousel-title">Asian Countries</h2>
        <div class="flags-container">
            @foreach($asianCountries as $country)
                <a href="{{ route('country.show', $country['cca2']) }}" class="flag-item">
                    <img src="{{ $country['flags']['png'] }}" alt="{{ $country['name']['common'] }} flag">
                    <div class="flag-name">{{ $country['name']['common'] }}</div>
                </a>
            @endforeach
            <!-- Duplicate for continuous scrolling -->
            @foreach($asianCountries as $country)
                <a href="{{ route('country.show', $country['cca2']) }}" class="flag-item">
                    <img src="{{ $country['flags']['png'] }}" alt="{{ $country['name']['common'] }} flag">
                    <div class="flag-name">{{ $country['name']['common'] }}</div>
                </a>
            @endforeach
        </div>
    </div>
    
    <div class="flags-carousel">
        <h2 class="carousel-title">European Countries</h2>
        <div class="flags-container">
            @foreach($europeanCountries as $country)
                <a href="{{ route('country.show', $country['cca2']) }}" class="flag-item">
                    <img src="{{ $country['flags']['png'] }}" alt="{{ $country['name']['common'] }} flag">
                    <div class="flag-name">{{ $country['name']['common'] }}</div>
                </a>
            @endforeach
            <!-- Duplicate for continuous scrolling -->
            @foreach($europeanCountries as $country)
                <a href="{{ route('country.show', $country['cca2']) }}" class="flag-item">
                    <img src="{{ $country['flags']['png'] }}" alt="{{ $country['name']['common'] }} flag">
                    <div class="flag-name">{{ $country['name']['common'] }}</div>
                </a>
            @endforeach
        </div>
    </div>
@endsection