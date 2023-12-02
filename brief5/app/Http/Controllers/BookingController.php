<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::all();
        return view('bookings.index', compact('bookings'));
    }

    public function show(Booking $booking)
    {
        return view('bookings.show', compact('booking'));
    }

    public function create()
    {
        // You may need to pass relevant data for dropdowns, like properties and users
        return view('bookings.create');
    }

    public function store(Request $request)
    {
        Booking::create($request->all());
        return redirect()->route('bookings.index');
    }

    public function edit(Booking $booking)
    {
        // You may need to pass relevant data for dropdowns, like properties and users
        return view('bookings.edit', compact('booking'));
    }

    public function update(Request $request, Booking $booking)
    {
        $booking->update($request->all());
        return redirect()->route('bookings.index');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->route('bookings.index');
    }
}
