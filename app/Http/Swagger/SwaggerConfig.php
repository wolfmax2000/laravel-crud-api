<?php

namespace App\Http\Swagger;

/**
 * @OA\Info(
 *     title="Laravel CRUD API",
 *     version="1.0.0",
 *     description="API Documentation for Users, Posts and Comments",
 *     @OA\Contact(
 *         email="support@example.com"
 *     )
 * )
 * 
 * @OA\Server(
 *     url=L5_SWAGGER_CONST_HOST,
 *     description="Local API Server"
 * )
 * 
 * @OA\Tag(
 *     name="Users",
 *     description="User operations"
 * )
 * 
 * @OA\Tag(
 *     name="Posts",
 *     description="Post operations"
 * )
 * 
 * @OA\Tag(
 *     name="Comments",
 *     description="Comment operations"
 * )
 */
class SwaggerConfig
{
    // Класс нужен только для аннотаций
}