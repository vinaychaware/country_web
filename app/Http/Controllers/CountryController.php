<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CountryController extends Controller
{
    protected $apiUrl = 'https://restcountries.com/v3.1';
    
    public function index()
    {
        // Get all countries for the home page
        $allCountries = Http::get($this->apiUrl.'/all')->json();
        
        // Separate countries by region
        $arabicCountries = array_filter($allCountries, function($country) {
            return isset($country['region']) && $country['region'] === 'Asia' && 
                  (isset($country['languages']) && 
                  array_intersect(array_keys($country['languages']), ['ara', 'arb']));
        });
        
        $asianCountries = array_filter($allCountries, function($country) {
            return isset($country['region']) && $country['region'] === 'Asia';
        });
        
        $europeanCountries = array_filter($allCountries, function($country) {
            return isset($country['region']) && $country['region'] === 'Europe';
        });
        
        return view('home', [
            'arabicCountries' => array_values($arabicCountries),
            'asianCountries' => array_values($asianCountries),
            'europeanCountries' => array_values($europeanCountries)
        ]);
    }
    
    public function show($code)
    {
        // Get details for a specific country
        $country = Http::get($this->apiUrl.'/alpha/'.$code)->json();
        
        return view('country.show', ['country' => $country[0] ?? null]);
    }
    
    public function explore(Request $request)
    {
        // Get all countries sorted alphabetically
        $allCountries = Http::get($this->apiUrl.'/all')->json();
        
        // Sort countries alphabetically
        usort($allCountries, function($a, $b) {
            return $a['name']['common'] <=> $b['name']['common'];
        });
        
        // Pagination
        $perPage = 15;
        $currentPage = $request->input('page', 1);
        $totalCountries = count($allCountries);
        $totalPages = ceil($totalCountries / $perPage);
        
        $countries = array_slice($allCountries, ($currentPage - 1) * $perPage, $perPage);
        
        return view('explore', [
            'countries' => $countries,
            'currentPage' => $currentPage,
            'totalPages' => $totalPages
        ]);
    }
    
    public function search(Request $request)
    {
        $query = $request->input('query');
        
        if ($request->ajax()) {
            // For AJAX suggestions
            $suggestions = Http::get($this->apiUrl.'/name/'.$query.'?fields=name,cca2,flags')->json();
            return response()->json($suggestions);
        }
        
        // For full search results
        $results = Http::get($this->apiUrl.'/name/'.$query)->json();
        
        return view('search', ['results' => $results ?? [], 'query' => $query]);
    }
    
    public function about()
    {
        return view('about');
    }
}