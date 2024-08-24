<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Persisters\User\Auth\RegisterPersister;
use App\Http\Requests\User\Auth\RegisterRequest;
use App\Http\Transformers\User\AuthTransformer;

/**
 * @OA\Tag(
 *     name="Auth",
 *     description="Auth user related actions"
 * )
 */
class AuthController extends Controller
{
    /**
     * @OA\Post(
     *      path="/api/register",
     *      tags={"Auth"},
     *      summary="Request to register user",
     *
     *      @OA\Parameter(name="name", in="query", description="user name", required = true),
     *      @OA\Parameter(name="surname", in="query", description="user surname", required = true),
     *      @OA\Parameter(name="phoneNumber", in="query", description="user phone number", required = true),
     *      @OA\Parameter(name="email", in="query", description="user email", required = true),
     *      @OA\Parameter(name="password", in="query", description="user password", required = true),
     *      @OA\Parameter(name="passportNumber", in="query", description="user passport number or id card"),
     *      @OA\Parameter(name="stateProvince", in="query", description="user state or privince"),
     *      @OA\Parameter(name="country", in="query", description="user country"),
     *      @OA\Parameter(name="city", in="query", description="user city"),
     *      @OA\Parameter(name="postalCode", in="query", description="user postal code"),
     *      @OA\Parameter(name="residenceAddress", in="query", description="user residence address"),
     *
     *      @OA\Response(response=200, description="Success response"),
     *      @OA\Response(response=401, description="Unauthenticated"),
     *      @OA\Response(response=403, description="Forbidden"),
     *     )
     */
    public function register(RegisterRequest $request, RegisterPersister $persister): array
    {
        return AuthTransformer::login($persister->persist($request->getProcessedData())->getRegisteredUser());
    }
}
