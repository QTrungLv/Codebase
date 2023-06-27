<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('post')->group(function () {
    Route::get('/', [PostController::class, 'getData']);
    Route::get('/{id}', [PostController::class, 'getDataById']);
    Route::post('/', [PostController::class, 'create']);
    Route::put('/{id}', [PostController::class, 'update']);
    Route::delete('/{id}', [PostController::class, 'delete']);
});

//Google Login
Route::group(['middleware' => ['web']], function () {

    Route::get('/google/redirect', function () {
        return Socialite::driver('google')->redirect();
    });

    Route::get('/google/callback', function () {
        $user = Socialite::driver('google')->user();
        // $user = User::updateOrCreate([
        //     'github_id' => $user->id,
        // ], [
        //     'name' => $user->name,
        //     'email' => $user->email,
        //     'github_token' => $user->token,
        //     'github_refresh_token' => $user->refreshToken,
        // ]);

        //Auth::login($user);

        return response()->json([
            'user' => $user
        ]);
        // $user->token
    });
});