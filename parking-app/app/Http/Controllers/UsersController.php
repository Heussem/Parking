<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\User;
use GrahamCampbell\ResultType\Success;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderBy('isActive')->orderBy('admin', 'DESC')->get();

        return view('dashboard', [
            'users' => $users,
        ]);
    }

    public function create(Request $request)
    {
        return view('createUser');
    }

    public function store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
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
