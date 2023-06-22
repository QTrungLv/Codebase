<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model
{
    use HasFactory;

    protected $table = 'users';

    //primary key
    protected $primaryKey = 'id';

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
