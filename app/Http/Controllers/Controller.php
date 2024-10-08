<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 * title="Swagger with Laravel",
 * version="1.0.0",
 * )
 * @OA\PathItem(
 *     path="/",
 * )
 * @OA\SecurityScheme(
 * type="http",
 * name="Authorization",
 * securityScheme="bearerAuth",
 * scheme="bearer",
 * bearerFormat="Sanctum"
 * )
 */
abstract class Controller extends BaseController
{
    //
}
