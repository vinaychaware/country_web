@extends('layouts.app')

@section('title', 'Explore Countries')

@section('content')
    <h1 class="section-title">Explore Countries</h1>
    
    <table class="countries-table">
        <thead>
            <tr>
                <th>Flag</th>
                <th>Name</th>
                <th>Capital</th>
                <th>Region</th>
                <th>Population</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($countries as $country)
                <tr>
                    <td>
                        <img src="{{ $country['flags']['png'] }}" alt="{{ $country['name']['common'] }} flag">
                    </td>
                    <td>{{ $country['name']['common'] }}</td>
                    <td>{{ implode(', ', $country['capital'] ?? ['N/A']) }}</td>
                    <td>{{ $country['region'] }}</td>
                    <td>{{ number_format($country['population']) }}</td>
                    <td>
                        <a href="{{ route('country.show', $country['cca2']) }}" class="btn btn-primary">View Details</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    <ul class="pagination">
        @if($currentPage > 1)
            <li><a href="{{ route('explore', ['page' => $currentPage - 1]) }}">&laquo; Previous</a></li>
        @else
            <li class="disabled"><span>&laquo; Previous</span></li>
        @endif
        
        @for($i = max(1, $currentPage - 2); $i <= min($totalPages, $currentPage + 2); $i++)
            <li class="{{ $i == $currentPage ? 'active' : '' }}">
                @if($i == $currentPage)
                    <span>{{ $i }}</span>
                @else
                    <a href="{{ route('explore', ['page' => $i]) }}">{{ $i }}</a>
                @endif
            </li>
        @endfor
        
        @if($currentPage < $totalPages)
            <li><a href="{{ route('explore', ['page' => $currentPage + 1]) }}">Next &raquo;</a></li>
        @else
            <li class="disabled"><span>Next &raquo;</span></li>
        @endif
    </ul>
@endsection