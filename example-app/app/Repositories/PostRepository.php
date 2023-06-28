<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PostRepository
{
    public function __construct()
    {
    }

    function get()
    {
        return DB::table('posts')->get();
    }

    function getById(string $id)
    {
        return DB::table('posts')->find($id);
    }

    function create($data)
    {

        $id = DB::table('posts')->insertGetId($data);

        return DB::table('posts')->find($id);
    }

    function update($data, string $id)
    {

        DB::table('posts')->where('id', $id)->update($data);

        return DB::table('posts')->find($id);
    }

    function delete(string $id)
    {
        $post = DB::table('posts')->find($id);
        DB::table('posts')->where('id', $id)->delete();
        return $post;
    }
}
