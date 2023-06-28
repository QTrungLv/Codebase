<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $table = 'posts';

    //primary key
    protected $primaryKey = 'id';



    use HasFactory;
}