<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\User;
use App\Models\Place;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

use function Pest\Laravel\get;

class ReservationsController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with('user')->where('expired', 0)->get();

        return view('reservations', [
            'reservations' => $reservations
        ]);
    }

    public function create()
    {
        $users = User::doesntHave('reservation')->get();


//        $users = User::whereHas('reservation',function ($query) {
//            $query->where('expired',true)
//                  ->orwhere(User::doesntHave('reservation'));
//        })->get();

        //recupére les users qui n'ont pas de réservations active (de réservations qui ne sont pas expirée)
        $users = User::whereDoesntHave('reservation', function ($query) {
            $query->where('expired',false);
        })
            ->orWhereDoesntHave('reservation')
            ->get();


        // dd($users);


        $places = Place::all()->where('isFree', 1);

        $date = Carbon::now();
        $time = 7;
        $dateF = Carbon::now()->addDays($time);

        return view('createReservation', [
            'users' => $users,
            'places' => $places,
            'date' => $date,
            'dateF' => $dateF,


        ]);
    }

    public function store(Request $request)
    {
        $reservation = new Reservation;

        $reservation->user_id = request('user');
        $reservation->place_id = request('place');
        $reservation->created_at = request('date_debut');
        $reservation->end_at = request('date_fin');
        $reservations = Reservation::with('place')->get();
        $reservation->place->update(['isFree' => false]);
        $reservation->save();


        return redirect()->route('reservations')
            ->with('success La reservation a été créer !');
    }

    public function edit($id)
    {
        $reservation = Reservation::find($id);

        return view('editReservation', [
            'reservation' => $reservation
        ]);
    }

    public function update($id)
    {
        $reservation = Reservation::find($id);

        $reservation->user_id = request('user');
        $reservation->place_id = request('place');
        $reservation->created_at = request('date_debut');
        $reservation->end_at = request('date_fin');

        $reservation->save();

        return redirect()->route('reservations')
            ->with('success La reservation a été créer !');
    }

    public function delete($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();

        return redirect()->route('historique')
            ->with('success, la reservation a bien été supprimé');
    }

    public function historique()
    {
        $reservations = Reservation::with('user')->where('expired', 1)->orderBy('end_at', 'desc')->get();

        return view('historique', [
            'reservations' => $reservations
        ])
            ;
    }

    public function cancel($id)
    {
        $reservation = Reservation::find($id);
        $reservation->expired = 1;
        $reservation->place->update(['isFree' => true]);
        $reservation->update(['end_at' => now()]);

        $reservation->save();

        return redirect()->route('reservations');
    }


    public function file()
    {
        $reservations = Reservation::with('user')->where('expired', 1)->get();

        return view('fileAttente', [
            'reservations' => $reservations
        ]);
    }
}
