<?php

namespace App\Http\Controllers;

use App\Http\Persister\Verification\SendPhoneVerificationCodePersister;
use App\Http\Requests\Verification\SendPhoneVerificationCodeRequest;

/**
 * @OA\Tag(
 *     name="Verification",
 *     description="User verification actions"
 * )
 */
class VerificationController extends  Controller
{
    /**
     * @OA\Post(
     *      path="/api/register",
     *      tags={"Auth"},
     *      summary="Request to send phone verification code",
     *
     *      @OA\Parameter(name="phoneNumber", in="query", description="user phone number", required = true),
     *
     *      @OA\Response(response=200, description="Success response"),
     *      @OA\Response(response=401, description="Unauthenticated"),
     *      @OA\Response(response=403, description="Forbidden"),
     *     )
     */
    public function sendPhoneVerificationCode(SendPhoneVerificationCodeRequest $request, SendPhoneVerificationCodePersister $persister)
    {
        return [
            'The code was sent to your phone number please fill it.'
        ];
    }
}
