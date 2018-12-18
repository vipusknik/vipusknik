<?php

namespace App\Http\Controllers\Specialty;

use App\Http\Controllers\Controller;
use App\Models\Specialty\SpecialtyDirection;

class SpecialtyDirectionsController extends Controller
{
    public function index($institutionType)
    {
        $directions = SpecialtyDirection::of($institutionType)
            ->whereNotIn('slug', [ 'bez-napravleniya', 'bez-napravleniya-1' ])
            ->get();

        return view('specialties.directions.index', compact('directions'));
    }

    public function show(SpecialtyDirection $direction)
    {
        $specialties = Specialty::inDirection($direction)
            ->orderBy('title')
            ->with('direction')
            ->paginate(15);

        return view('specialties.index', compact('specialties', 'direction'));
    }
}
