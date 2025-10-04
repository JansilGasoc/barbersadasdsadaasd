<?php

namespace App\Http\Controllers;

use App\Models\Barber;
use App\Models\User;
use Illuminate\Http\Request;

class BarberController extends Controller
{
    //

    public function index()
    {
        // Fetch all barbers with their appointments
        $barbers = Barber::with('barberAppointments')->get();

        return view('barber', compact('barbers'));
    }

    public function store(Request $request)
    {
        $barbers = $request->validate([
            'name' => 'required|string|max:200',
            'phone' => 'required|digits_between:10,12',
            'address' => 'string|max:200',
            'email' => 'string|required',

        ]);

        Barber::create($barbers);

        return redirect()->back()->with('success', 'Barber added successfully!');
    }

    public function destroy($id)
    {
        $barber = User::where('role', 'barber')->findOrFail($id);
        $barber->delete();

        return redirect()->back()->with('success', 'Barber deleted successfully!');
    }
}
