<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // Validasi input, termasuk validasi gambar jika ada
        $validated = $request->validated();
        $user = $request->user();

        // Handle file upload
        if ($request->hasFile('user_img') && $request->file('user_img')->isValid()) {
            // Hapus gambar lama jika ada
            if ($user->user_img && file_exists(public_path('img/' . $user->user_img))) {
                unlink(public_path('img/' . $user->user_img));
            }

            // Simpan gambar baru ke folder public/img
            $file = $request->file('user_img');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img'), $fileName);

            // Simpan nama file ke dalam database
            $validated['user_img'] = $fileName;
        }

        // Update data pengguna
        $user->fill($validated);

        // Jika email berubah, set email_verified_at menjadi null
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        // Hapus gambar profil jika ada
        if ($user->user_img && file_exists(public_path('img/' . $user->user_img))) {
            unlink(public_path('img/' . $user->user_img));
        }

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
