@extends('layouts.app')

@section('title', $country['name']['common'] ?? 'Country Details')

@section('content')
    @if($country)
        <div class="country-detail">
            <div class="country-flag">
                <img src="{{ $country['flags']['png'] }}" alt="{{ $country['name']['common'] }} flag">
            </div>
            
            <div class="country-info">
                <h1 class="country-name">{{ $country['name']['common'] }}</h1>
                
                <div class="info-card">
                    <h2>Basic Information</h2>
                    
                    <div class="info-item">
                        <span class="info-label">Official Name:</span>
                        <span>{{ $country['name']['official'] }}</span>
                    </div>
                    
                    <div class="info-item">
                        <span class="info-label">Capital:</span>
                        <span>{{ implode(', ', $country['capital'] ?? ['N/A']) }}</span>
                    </div>
                    
                    <div class="info-item">
                        <span class="info-label">Region:</span>
                        <span>{{ $country['region'] ?? 'N/A' }}</span>
                    </div>
                    
                    <div class="info-item">
                        <span class="info-label">Subregion:</span>
                        <span>{{ $country['subregion'] ?? 'N/A' }}</span>
                    </div>
                    
                    <div class="info-item">
                        <span class="info-label">Population:</span>
                        <span>{{ number_format($country['population'] ?? 0) }}</span>
                    </div>
                </div>
                
                <div class="info-card">
                    <h2>Geography</h2>
                    
                    <div class="info-item">
                        <span class="info-label">Area:</span>
                        <span>{{ number_format($country['area'] ?? 0) }} km²</span>
                    </div>
                    
                    @if(isset($country['borders']) && count($country['borders']) > 0)
                        <div class="info-item">
                            <span class="info-label">Borders:</span>
                            <span>{{ implode(', ', $country['borders']) }}</span>
                        </div>
                    @endif
                    
                    @if(isset($country['latlng']) && count($country['latlng']) > 1)
                        <div class="info-item">
                            <span class="info-label">Coordinates:</span>
                            <span>{{ $country['latlng'][0] }}, {{ $country['latlng'][1] }}</span>
                        </div>
                    @endif
                </div>
                
                <div class="info-card">
                    <h2>Culture & Economy</h2>
                    
                    @if(isset($country['languages']))
                        <div class="info-item">
                            <span class="info-label">Languages:</span>
                            <span>
                                @php
                                    $languages = [];
                                    foreach($country['languages'] as $language) {
                                        $languages[] = $language;
                                    }
                                    echo implode(', ', $languages);
                                @endphp
                            </span>
                        </div>
                    @endif
                    
                    @if(isset($country['currencies']))
                        <div class="info-item">
                            <span class="info-label">Currencies:</span>
                            <span>
                                @php
                                    $currencies = [];
                                    foreach($country['currencies'] as $code => $currency) {
                                        $currencies[] = $currency['name'] . ' (' . $code . ')';
                                    }
                                    echo implode(', ', $currencies);
                                @endphp
                            </span>
                        </div>
                    @endif
                    
                    @if(isset($country['timezones']) && count($country['timezones']) > 0)
                        <div class="info-item">
                            <span class="info-label">Timezones:</span>
                            <span>{{ implode(', ', $country['timezones']) }}</span>
                        </div>
                    @endif
                </div>
                
                <div class="info-card">
                    <h2>Additional Information</h2>
                    
                    @if(isset($country['demonyms']['eng']['m']))
                        <div class="info-item">
                            <span class="info-label">Demonym:</span>
                            <span>{{ $country['demonyms']['eng']['m'] }}</span>
                        </div>
                    @endif
                    
                    <div class="info-item">
                        <span class="info-label">Independent:</span>
                        <span>{{ isset($country['independent']) && $country['independent'] ? 'Yes' : 'No' }}</span>
                    </div>
                    
                    <div class="info-item">
                        <span class="info-label">UN Member:</span>
                        <span>{{ isset($country['unMember']) && $country['unMember'] ? 'Yes' : 'No' }}</span>
                    </div>
                    
                    @if(isset($country['car']['side']))
                        <div class="info-item">
                            <span class="info-label">Driving Side:</span>
                            <span>{{ ucfirst($country['car']['side']) }}</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @else
        <div class="alert alert-error">
            <h2>Country not found</h2>
            <p>The requested country information could not be found.</p>
            <a href="{{ route('home') }}" class="btn">Return to Home</a>
        </div>
    @endif
@endsection