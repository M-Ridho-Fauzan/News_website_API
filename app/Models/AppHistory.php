<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AppHistory extends Model
{
    use HasFactory;

    protected $table = "app_histories";

    protected $fillable = [
        'type_history',
        'request_type',
        "param_post",
        "id_post",
        "param_kategori",
        "id_kategori",
        "user_id",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
