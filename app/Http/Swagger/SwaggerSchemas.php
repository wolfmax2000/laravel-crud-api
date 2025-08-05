<?php

namespace App\Http\Swagger;

/**
 * @OA\Schema(
 *     schema="User",
 *     type="object",
 *     required={"name"},
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="name", type="string", example="John Doe"),
 *     @OA\Property(property="created_at", type="string", format="date-time"),
 *     @OA\Property(property="updated_at", type="string", format="date-time")
 * )
 *
 * @OA\Schema(
 *     schema="StoreUserRequest",
 *     type="object",
 *     required={"name"},
 *     @OA\Property(property="name", type="string", example="John Doe")
 * )
 *
 * @OA\Schema(
 *     schema="UpdateUserRequest",
 *     type="object",
 *     @OA\Property(property="name", type="string", example="John Doe Updated")
 * )
 *
 * @OA\Schema(
 *     schema="Post",
 *     type="object",
 *     required={"user_id", "body"},
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="user_id", type="integer", example=1),
 *     @OA\Property(property="body", type="string", example="This is a post content"),
 *     @OA\Property(property="created_at", type="string", format="date-time"),
 *     @OA\Property(property="updated_at", type="string", format="date-time")
 * )
 *
 * @OA\Schema(
 *     schema="StorePostRequest",
 *     type="object",
 *     required={"user_id", "body"},
 *     @OA\Property(property="user_id", type="integer", example=1),
 *     @OA\Property(property="body", type="string", example="Post content")
 * )
 *
 * @OA\Schema(
 *     schema="UpdatePostRequest",
 *     type="object",
 *     @OA\Property(property="user_id", type="integer", example=1),
 *     @OA\Property(property="body", type="string", example="Updated post content")
 * )
 *
 * @OA\Schema(
 *     schema="Comment",
 *     type="object",
 *     required={"post_id", "user_id", "body"},
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="post_id", type="integer", example=1),
 *     @OA\Property(property="user_id", type="integer", example=1),
 *     @OA\Property(property="body", type="string", example="This is a comment"),
 *     @OA\Property(property="created_at", type="string", format="date-time"),
 *     @OA\Property(property="updated_at", type="string", format="date-time")
 * )
 *
 * @OA\Schema(
 *     schema="StoreCommentRequest",
 *     type="object",
 *     required={"post_id", "user_id", "body"},
 *     @OA\Property(property="post_id", type="integer", example=1),
 *     @OA\Property(property="user_id", type="integer", example=1),
 *     @OA\Property(property="body", type="string", example="Comment text")
 * )
 *
 * @OA\Schema(
 *     schema="UpdateCommentRequest",
 *     type="object",
 *     @OA\Property(property="post_id", type="integer", example=1),
 *     @OA\Property(property="user_id", type="integer", example=1),
 *     @OA\Property(property="body", type="string", example="Updated comment text")
 * )
 */
class SwaggerSchemas
{
    // Класс-заглушка только для аннотаций
}