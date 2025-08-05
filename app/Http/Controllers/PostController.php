<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use OpenApi\Annotations as OA;

/**
 * @OA\Tag(
 *     name="Posts",
 *     description="Operations about posts"
 * )
 */
class PostController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/posts",
     *     tags={"Posts"},
     *     summary="Get list of posts",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Post")
     *         )
     *     )
     * )
     */
    public function index()
    {
        return PostResource::collection(Post::all());
    }

    /**
     * @OA\Post(
     *     path="/api/posts",
     *     tags={"Posts"},
     *     summary="Create new post",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/StorePostRequest")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Post created successfully",
     *         @OA\JsonContent(ref="#/components/schemas/Post")
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error"
     *     )
     * )
     */
    public function store(StorePostRequest $request)
    {
        $post = Post::create($request->validated());
        return new PostResource($post);
    }

    /**
     * @OA\Get(
     *     path="/api/posts/{id}",
     *     tags={"Posts"},
     *     summary="Get specific post",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Post ID",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/Post")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Post not found"
     *     )
     * )
     */
    public function show(Post $post)
    {
        return new PostResource($post);
    }

    /**
     * @OA\Put(
     *     path="/api/posts/{id}",
     *     tags={"Posts"},
     *     summary="Update post",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Post ID",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/UpdatePostRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Post updated successfully",
     *         @OA\JsonContent(ref="#/components/schemas/Post")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Post not found"
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error"
     *     )
     * )
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->validated());
        return new PostResource($post);
    }

    /**
     * @OA\Delete(
     *     path="/api/posts/{id}",
     *     tags={"Posts"},
     *     summary="Delete post",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Post ID",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Post deleted successfully"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Post not found"
     *     )
     * )
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return response()->noContent();
    }

    /**
     * @OA\Get(
     *     path="/api/posts/{id}/comments",
     *     tags={"Posts"},
     *     summary="Get post's comments",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Post ID",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Comment")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Post not found"
     *     )
     * )
     */
    public function postComments(Post $post)
    {
        return PostResource::collection($post->comments);
    }
}