<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit()
    {
        // Return view for editing the profile
        return view('profile.edit'); // Create a profile/edit.blade.php view
    }

    public function update(Request $request)
    {
        // Validate and update user profile logic here
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . auth()->id(),
        ]);

        $user = auth()->user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('home')->with('success', 'Profile updated successfully!');
    }
}
?>