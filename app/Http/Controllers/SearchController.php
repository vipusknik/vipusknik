<?php

namespace App\Http\Controllers;

use App\Models\Specialty\Specialty;
use Illuminate\Http\Request;
use App\Models\Institution\Institution;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');

        $universities = Institution::ofType('university')->like($query)->orderBy('title')->get();
        $colleges = Institution::ofType('college')->like($query)->orderBy('title')->get();
        
        $universitySpecialties = Specialty::of('university')->like($query)->with('direction')->orderBy('title')->get();
        $collegeSpecialties = Specialty::of('college')->like($query)->with('qualifications', 'direction')->orderBy('title')->get();
        
        return view('search-results', compact('universities', 'colleges', 'universitySpecialties', 'collegeSpecialties'));
    }
}
