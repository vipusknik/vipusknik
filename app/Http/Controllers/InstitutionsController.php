<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\City\City;
use App\Models\Specialty\Specialty;
use App\Models\Institution\Institution;

use App\Modules\Search\{
    InstitutionSearch
};

class InstitutionsController extends Controller
{
    public function __construct()
    {
        abort_if(
            Institution::doesntHaveType(request()->route('institutionType')), 404
        );
    }

    public function index(Request $request, $institutionType)
    {
        $institutions = InstitutionSearch::applyFilters($request)
            ->orderBy('title')
            ->with(['city', 'media'])
            ->limit(15)
            ->get();

        $cities = City::all()->sortBy('title');

        $specialties = Specialty::of($institutionType)
            ->orderBy('code')
            ->get();

        return view('institutions.index', compact('institutions', 'cities', 'specialties'));
    }

    public function show($institutionType, Institution $institution)
    {
        if ($institution->typeIs('college')) {
            $institution->load(['specialties_distinct' => function ($q) {
                $q
                    ->orderBy('title')
                    ->orderBy('pivot_specialty_id')
                    ->with('qualifications');
            }, 'qualifications' => function ($q) {
                $q
                    ->orderBy('title')
                    ->orderBy('pivot_specialty_id');
            }]);
        } else {
            $institution->load(['specialties' => function ($q) {
                $q
                    ->where('form', 'full-time')
                    ->orderBy('title')
                    ->orderBy('pivot_specialty_id');
            }]);
        }

        $cities = City::all()->sortBy('title');

        $specialties = Specialty::of($institutionType)
            ->orderBy('code')
            ->get();

        return view('institutions.show', compact('institution', 'cities', 'specialties'));
    }

    public function rtSearch(Request $request, $institutionType)
    {
        $institutions = Institution::select(
                'slug as url', "title", 'abbreviation as description', 'city_id', 'type'
            )
            ->ofType($institutionType)
            ->like($request->input('query'))
            ->orderBy('title')
            ->get();

        $institutions = $institutions->each(function ($item, $key) {
            $item->url = config('app.url')
                . '/institutions/'
                . str_plural($item->type)
                . '/'
                . $item->url;

            $item->description = ($item->description . ' ' ?: '') . City::find($item->city_id)->title; // smth wrong here!
        });

        return response()->json(['results' => $institutions], 200);
    }

    public function infiniteScroll(Request $request)
    {
        return InstitutionSearch::applyFilters($request)
            ->orderBy('title')
            ->with(['city', 'media'])
            ->offset($request->offset)
            ->limit(15)
            ->get();
    }
}
