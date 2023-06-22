<?php

namespace App\Http\Controllers;

use App\Services\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;
use Exception;

class PostController extends Controller
{
    //
    function getData(Request $request)
    {
        $post = DB::table('posts')->get();
        return response()->json([
            'success' => true,
            'data' => $post
        ]);
    }

    function getDataById(Request $request, string $id)
    {
        try {
            $user = DB::table('posts')->find($id);
            if ($user) {
                return response()->json([
                    'success' => true,
                    'data' => $user
                ]);
            }
            return response()->json([
                'success' => false,
                'message' => 'Post not exist',
            ], 400);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Post not exist',
            ], 400);
        }
    }

    function create(Request $request)
    {
        try {
            $title = $request['title'];
            $description = $request['description'];

            $id = DB::table('posts')->insertGetId([
                'title' => $title,
                'description' => $description
            ]);
            $post = DB::table('posts')->find($id);
            return response()->json([
                'success' => true,
                'data' => $post
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Server Error',
            ]);
        }
    }

    function update(Request $request, string $id)
    {
        try {
            $title = $request['title'];
            $description = $request['description'];



            DB::table('posts')->where('id', $id)->update([
                'title' => $title,
                'description' => $description
            ]);
            $post = DB::table('posts')->find($id);
            return response()->json([
                'success' => true,
                'data' => $post,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Server Error',
            ]);
        }
    }

    function delete(Request $request, string $id)
    {
        try {
            $post = DB::table('posts')->find($id);
            DB::table('posts')->where('id', $id)->delete();
            return response()->json([
                'success' => true,
                'data' => $post
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Server Error',
            ]);
        }
    }
}
