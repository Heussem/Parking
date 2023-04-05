<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\User;
use Illuminate\Http\Request;

class PlacesController extends Controller
{
    public function index()
    {
        $places = Place::all();
        $users = User::all();

        return view('places', [
            'places' => $places,
            'users' => $users
        ]);
    }

    public function create()
    {
        return view('createPlace');
    }

    public function store(Request $request)
    {
        Place::create([
            'numero' => $request->numero,
        ]);
        return redirect()->route('places')
            ->with('success La place a été créer !');
    }

    public function delete($id)
    {
        $place = Place::findOrFail($id);
        $place->delete();


        return redirect()->route('places')
            ->with('success, la place a bien été supprimé');
    }
}
