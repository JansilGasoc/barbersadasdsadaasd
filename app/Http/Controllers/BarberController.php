<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class BarberController extends Controller
{
    //

    public function index()
    {
        // Fetch all barbers with their appointments
        $barbers = User::where('role', 'barber')->with('barberAppointments')->get();

        return view('barber', compact('barbers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'barber',
        ]);

        return redirect()->back()->with('success', 'Barber added successfully!');
    }

    public function destroy($id)
    {
        $barber = User::where('role', 'barber')->findOrFail($id);
        $barber->delete();

        return redirect()->back()->with('success', 'Barber deleted successfully!');
    }
}
