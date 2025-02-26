@extends('layouts.app')

@section('title', 'Search Countries')

@section('content')
    <h1 class="section-title">Search Countries</h1>
    
    <div class="search-container">
        <form action="{{ route('search') }}" method="GET">
            <input type="text" name="query" class="search-input" placeholder="Search for a country..." value="{{ $query ?? '' }}" autocomplete="off">
            <div class="search-suggestions"></div>
        </form>
    </div>
    
    @if(isset($query) && $query)
        <h2>Search Results for "{{ $query }}"</h2>
        
        @if(isset($results) && count($results) > 0)
            <div class="search-results">
                @foreach($results as $country)
                    <div class="country-card">
                        <div class="country-flag">
                            <img src="{{ $country['flags']['png'] }}" alt="{{ $country['name']['common'] }} flag">
                        </div>
                        <div class="country-info">
                            <h3>{{ $country['name']['common'] }}</h3>
                            <p><strong>Capital:</strong> {{ implode(', ', $country['capital'] ?? ['N/A']) }}</p>
                            <p><strong>Region:</strong> {{ $country['region'] }}</p>
                            <p><strong>Population:</strong> {{ number_format($country['population']) }}</p>
                            <a href="{{ route('country.show', $country['cca2']) }}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="no-results">
                <p>No countries found matching "{{ $query }}".</p>
            </div>
        @endif
    @endif
    
    <style>
        .search-results {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            grid-gap: 20px;
            margin-top: 30px;
        }
        
        .country-card {
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        
        .country-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }
        
        .country-card .country-flag {
            height: 150px;
            overflow: hidden;
        }
        
        .country-card .country-flag img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .country-card .country-info {
            padding: 20px;
        }
        
        .country-card h3 {
            margin-top: 0;
            margin-bottom: 10px;
            color: var(--dark-color);
        }
        
        .country-card p {
            margin-bottom: 5px;
            font-size: 0.9rem;
        }
        
        .country-card .btn {
            display: inline-block;
            padding: 8px 15px;
            margin-top: 10px;
            background-color: var(--primary-color);
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        
        .country-card .btn:hover {
            background-color: #2980b9;
        }
        
        .no-results {
            text-align: center;
            padding: 50px 0;
            font-size: 1.2rem;
            color: #777;
        }
    </style>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        // Search input behavior
        $('.search-input').focus();
    });
</script>
@endsection