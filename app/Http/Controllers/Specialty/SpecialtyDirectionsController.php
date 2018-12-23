<?php

namespace App\Http\Controllers\Specialty;

use App\Models\Specialty\Specialty;
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
        $specialties = Specialty::getOnly('specialties')
            ->inDirection($direction)
            ->orderBy('title')
            ->with('direction')
            ->get();

        return view('specialties.directions.show', compact('specialties', 'direction'));
    }
}
