<?php

namespace App\Services;

class AdminService
{
    public function isAdmin($user)
    {
        return $user && $user->is_admin; // Misalnya, periksa kolom is_admin di user
    }
}
