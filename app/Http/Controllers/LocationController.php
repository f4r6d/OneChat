<?php

namespace App\Http\Controllers;

use App\Events\PointEdited;
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

        broadcast(new PointEdited($point));

        return response()->json($point, 200);
    }

    public function destroy(Request $request)
    {
        $point = Location::where('loc', (string) $request->loc)->first();
        
        broadcast(new PointEdited($point));

        $point->delete();

        return response()->json($request, 200);
    }

    public function reset()
    {
        Location::truncate();
        
        broadcast(new PointEdited());

        return back();
    }
}
