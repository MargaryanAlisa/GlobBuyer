<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Persisters\Post\StorePersister;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Transformers\Post\PostTransformer;

/**
 * @OA\Tag(
 *     name="Post",
 *     description="Post related actions"
 * )
 */

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * @OA\Post(
     *      path="/api/post",
     *      tags={"Post"},
     *      summary="Request to store post",
     *      security={{"bearerAuth":{}}},
     *      @OA\Parameter(name="productName", in="query", description="product name", required = true),
     *      @OA\Parameter(name="productPrice", in="query", description="product price", required = true),
     *      @OA\Parameter(name="productMeasured", in="query", description="product measured", required = true),
     *      @OA\Parameter(name="productQuantity", in="query", description="product quantity"),
     *      @OA\Parameter(name="productDescription", in="query", description="product description", required = true),
     *      @OA\Parameter(name="additionalFee", in="query", description="additional fee", required = true),
     *      @OA\Parameter(name="productInfo", in="query", description="product info"),
     *      @OA\Parameter(name="productAttachment", in="query", description="product attachment"),
     *      @OA\Parameter(name="deliveryPeriod", in="query", description="delivery period", required=true),
     *      @OA\Parameter(name="deliveryDate", in="query", description="delivery date"),
     *      @OA\Parameter(name="countryFrom", in="query", description="country from", required=true),
     *      @OA\Parameter(name="countryTo", in="query", description="country to", required=true),
     *      @OA\Parameter(name="deliveryAddress", in="query", description="delivery address", required=true),
     *
     *      @OA\Response(response=200, description="Success response"),
     *      @OA\Response(response=401, description="Unauthenticated"),
     *      @OA\Response(response=403, description="Forbidden"),
     *     )
     */
    public function store(StoreRequest $request, StorePersister $persister)
    {
        return PostTransformer::show($persister->persist($request->getProcessedData())->getPost());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
