<?php

namespace App\Http\Controllers;

use App\Repositories\PostRepository;
use App\Services\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;
use Exception;

class PostController extends Controller
{

    private PostRepository $postRepository;
    private Services $services;

    public function __construct(PostRepository $postRepository, Services $services)
    {
        $this->postRepository = $postRepository;
        $this->services = $services;
    }


    //
    function getData(Request $request)
    {
        $post = $this->postRepository->get();

        return $this->services->sendResponse($post);
    }

    function getDataById(Request $request, string $id)
    {
        try {
            $user = $this->postRepository->getById($id);

            if ($user) {
                return $this->services->sendResponse($user);
            }
            return $this->services->sendError('Post not exist', 400);
        } catch (Exception $e) {
            return $this->services->sendError('Post not exist', 400);
        }
    }

    function create(Request $request)
    {
        try {
            $data = [
                'title' => $request['title'],
                'description' => $request['description']
            ];

            $post = $this->postRepository->create($data);

            return $this->services->sendResponse($post);
        } catch (Exception $e) {

            return $this->services->sendError('Server Error', 400);
        }
    }

    function update(Request $request, string $id)
    {
        try {
            $data = [
                'title' => $request['title'],
                'description' => $request['description']
            ];

            $post = $this->postRepository->update($data, $id);

            if ($post) {
                return $this->services->sendResponse($post);
            }

            return $this->services->sendError('Post not exist', 400);
        } catch (Exception $e) {

            return $this->services->sendError('Server Error', 400);
        }
    }

    function delete(Request $request, string $id)
    {
        try {
            $post = $this->postRepository->delete($id);

            if ($post) {
                return $this->services->sendResponse($post);
            }

            return $this->services->sendError('Post not exist', 400);
        } catch (Exception $e) {
            return $this->services->sendError('Server Error', 400);
        }
    }
}
