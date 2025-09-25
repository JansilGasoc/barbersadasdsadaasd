<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function create()
    {
        //
        $barbers = User::all();
        $bookedTimes = \App\Models\Appointment::pluck('appointment_time')->toArray();

        return view('appointments.appointmentstore', compact('barbers', 'bookedTimes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|numeric|digits_between:10,12',
            'service' => 'nullable|string|max:255',
            'appointment_date' => 'required|date|after_or_equal:today',
            'appointment_time' => 'required',
            'notes' => 'nullable|string',
            'barber_id' => 'required|exists:users,id',
        ]);
        // Check if the exact time slot is already taken
        $exists = Appointment::where('appointment_date', $validated['appointment_date'])
            ->where('appointment_time', $validated['appointment_time'])
            ->where('barber_id', $validated['barber_id'] ?? null)
            ->exists();

        if ($exists) {
            // Preserve input except appointment_time
            $inputData = $request->except('appointment_time');

            return redirect()->back()
                ->withInput($inputData)
                ->with('error', 'This time slot is already booked. Please select a different time.');
        }

        // Create appointment
        Appointment::create($validated);

        return redirect()->back()
            ->with('success', 'Appointment booked successfully! Please wait for the barber to contact you.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();

        return redirect()->back()->with('success', 'Appointment deleted successfully!');
    }
}
