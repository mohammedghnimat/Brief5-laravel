<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Booking;
use App\Models\Review;

class DashboardUserController extends Controller
{
    public function dashboard()
    {
        // Retrieve user's bookings, reviews, and other relevant information
        // $users = Auth::user();
        $user = User::first();
        return view('user.dashboard', compact('user'));
    }

    public function profile()
    {
        // Retrieve user's profile information
        $user = Auth::user();

        return view('user.profile', compact('user'));
    }

 public function updateProfile(Request $request, $id)
{
    // Validate the form data
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $id,
        'password' => 'nullable|string|min:8|confirmed',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Find the user by ID
    $user = User::find($id);

    if (!$user) {
        return redirect()->route('user.dashboard')->with('error', 'User not found.');
    }

    // Update user's profile information
    $user->name = $request->name;
    $user->email = $request->email;

    // Handle password update
    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }

    if ($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->extension();
        $request->image->storeAs('public/images', $imageName);
        $user->image = 'images/' . $imageName;
    }

    // Save the updated user instance
    $user->save();

    return redirect()->route('user.dashboard')->with('success', 'Profile updated successfully!');
}



    public function changePassword(Request $request)
    {
        // Validate the form data
        $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        // Change user's password
        $user = Auth::user();

        if (Hash::check($request->current_password, $user->password)) {
            $user->password = Hash::make($request->new_password);
            $user->save();

            return redirect()->route('user.profile')->with('success', 'Password changed successfully!');
        }

        return redirect()->route('user.profile')->with('error', 'Incorrect current password.');
    }



// ... other imports

public function bookedProperties()
{
    // $user = Auth::user(); // Assuming you are using authentication
    $user = User::first();

    // Fetch the bookings along with related properties and users
    $bookings = Booking::select('properties.*', 'bookings.*','bookings.id as booking_id', 'users.*')
        ->join('users', 'users.id', '=', 'bookings.renter_id')
        ->join('properties', 'properties.id', '=', 'bookings.property_id')
        ->where('bookings.renter_id', $user->id)
        ->get();
        // dd($bookings);
    return view('user.booking', compact('bookings','user'));
}

public function delete($id)
{
    $booking = Booking::find($id);
    // dd($booking);
    $booking->delete();
    return redirect(route('user.booking'));
}

 public function userReviews()
    {
        $user = User::first();
       $reviews = Review::where('renter_id', $user->id)->get();

        return view('user.reviews', compact('reviews', 'user'));
    }
}
