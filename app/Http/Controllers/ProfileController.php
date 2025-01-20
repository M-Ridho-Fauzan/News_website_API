<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Auth\Events\Logout;

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
        $request->user()->fill($request->validated());

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
        $user = $request->user();
        if (!Auth::user()->is_oauth) {
            $request->validateWithBag('userDeletion', [
                'password' => ['required', 'current_password'],
            ]);
        } else {
            $this->sendDeletionConfirmationEmail($user);

            return back()->with('status', 'verification-link-sent');
        }


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

    protected function sendDeletionConfirmationEmail($user)
    {
        $token = Str::random(64);

        // Simpan token di cache dengan masa berlaku 30 menit
        Cache::put("account_deletion_user_id={$user->id}", $token, now()->addMinutes(30));

        event(new Logout($user, $token));
        // Kirim email ke pengguna
        Mail::to($user->email)->send(new \App\Mail\AccountDeletionConfirmationMail($user, $token));
    }
}
