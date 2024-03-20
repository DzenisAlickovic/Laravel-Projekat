<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Themes extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'user_id', 'image'];

    // Filter for search (name, description)
    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%');
        }
    }


    // Relationship to User (First set up relations in database with migrations)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    
    // Relationship with comments
    public function comments()
    {
        return $this->hasMany(Comment::class, 'theme_id');
    }

}
