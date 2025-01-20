<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redirect;

class EmailAccountDeletionConfirmation extends Controller
{
    public function confirmDeletion($userId, $token)
    {
        // dd($token);
        $delToken = Cache::pull("account_deletion_user_id={$userId}", $token, 30);
        // dd($userId);

        if (!$delToken) {
            return redirect('/profile')->with('status', 'invalid-or-expired-token');
        }

        $user = User::findOrFail($userId);

        Auth::logout();

        // Hapus gambar profil jika ada
        if ($user->user_img && file_exists(public_path('img/' . $user->user_img))) {
            unlink(public_path('img/' . $user->user_img));
        }

        $user->delete();

        session()->invalidate();
        session()->regenerateToken();

        return Redirect::to('/')->with('message', 'Account successfully deleted.');
    }
}
