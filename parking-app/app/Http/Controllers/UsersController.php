<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\User;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderBy('admin', 'DESC')->orderBy('isActive')->orderBy('created_at', 'DESC')->get();
        $users2 = User::doesntHave('reservation')->get();

        return view('dashboard', [
            'users' => $users,
            'users2' => $users2,

        ]);
    }

    public function create(Request $request)
    {
        $user = Auth::user();
        return view('createUser', [
            'user' => $user,
        ]);
    }

    public function store(Request $request)
    {
        $user = new User;

        $user->name = request('name');
        $user->email = request('email');
        $user->password = request('password');
        $user->isActive = $request->input('active', 0);

        $user->save();

        return redirect()->route('dashboard');
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('dashboard')
            ->with('success', 'utilisateur a bien été supprimé');
    }

    public function edit($id)
    {

        $user = User::where('id', $id)->get();

        return view('editUser', [
            'user' => $user,
        ]);
    }
    public function update($id, Request $request)
    {
        $user = user::find($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if ($request->active) {
            $user->update(['isActive' => true]);
        } else {
            $user->update(['isActive' => false]);
        }

        return redirect()->route('dashboard')
            ->with('success', 'created successfully!');
    }

    public function verif($id, request $request)
    {
        $user = user::find($id);
        $user->update(['isActive' => true]);
        return redirect()->route('dashboard');
    }
}
