<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use OpenApi\Annotations as OA;

/**
 * @OA\Tag(
 *     name="Comments",
 *     description="Operations about comments"
 * )
 */
class CommentController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/comments",
     *     tags={"Comments"},
     *     summary="Get list of comments",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Comment")
     *         )
     *     )
     * )
     */
    public function index()
    {
        return CommentResource::collection(Comment::all());
    }

    /**
     * @OA\Post(
     *     path="/api/comments",
     *     tags={"Comments"},
     *     summary="Create new comment",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/StoreCommentRequest")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Comment created successfully",
     *         @OA\JsonContent(ref="#/components/schemas/Comment")
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error"
     *     )
     * )
     */
    public function store(StoreCommentRequest $request)
    {
        $comment = Comment::create($request->validated());
        return new CommentResource($comment);
    }

    /**
     * @OA\Get(
     *     path="/api/comments/{id}",
     *     tags={"Comments"},
     *     summary="Get specific comment",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Comment ID",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/Comment")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Comment not found"
     *     )
     * )
     */
    public function show(Comment $comment)
    {
        return new CommentResource($comment);
    }

    /**
     * @OA\Put(
     *     path="/api/comments/{id}",
     *     tags={"Comments"},
     *     summary="Update comment",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Comment ID",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/UpdateCommentRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Comment updated successfully",
     *         @OA\JsonContent(ref="#/components/schemas/Comment")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Comment not found"
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error"
     *     )
     * )
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        $comment->update($request->validated());
        return new CommentResource($comment);
    }

    /**
     * @OA\Delete(
     *     path="/api/comments/{id}",
     *     tags={"Comments"},
     *     summary="Delete comment",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Comment ID",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Comment deleted successfully"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Comment not found"
     *     )
     * )
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return response()->noContent();
    }
}