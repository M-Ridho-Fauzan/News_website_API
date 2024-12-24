<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    /**
     * Yang Yidak boleh di isi user.
     *
     * @var list<string>
     */
    protected $guarded = ['id'];

    /**
     * Get the category that owns the post.
     */
    public function kategori(): belongsTo
    {
        return $this->belongsTo(Kategori::class);
    }

    // /**
    //  * Scope a query to only include popular users.
    //  *
    //  * @param  \Illuminate\Database\Eloquent\Builder  $query
    //  * @param  array  $filters
    //  * @return \Illuminate\Database\Eloquent\Builder
    //  */
    // public function scopeFilter(Builder $query, $filters)
    // {
    //     $query->when($filters['search'] ?? false, function ($query, $search) {
    //         $query->where(function ($query) use ($search) {
    //             $query->where('title', 'like', '%' . $search . '%')
    //                 ->orWhere('content', 'like', '%' . $search . '%')
    //                 ->orWhereHas('kategori', function ($query) use ($search) {
    //                     $query->where('name', 'like', '%' . $search . '%');
    //                 });
    //         });
    //     });

    //     $query->when($filters['kategori'] ?? false, function ($query, $kategori) {
    //         $query->whereHas('kategori', function ($query) use ($kategori) {
    //             $query->where('slug', $kategori);
    //         });
    //     });

    //     return $query;
    // }
}
