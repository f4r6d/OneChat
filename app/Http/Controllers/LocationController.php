<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        $locs = [];
        $points = Location::select('loc')->latest()->get();
        foreach ($points as $point) {
            $locs[] = $point['loc'];
        }

        return view('index', ['locs'=> $locs]);
    }

    public function store(Request $request)
    {
        $point = Location::create([
            'loc' => $request->loc,
        ]);

        return response()->json($point, 200);
    }

    public function destroy(Request $request)
    {
        Location::where('loc', (string) $request->loc)->first()->delete();

        return response()->json($request, 200);
    }
}
