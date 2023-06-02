<?php

declare(strict_types=1);

namespace App\Domain\Product\Controllers;

use App\Domain\Product\Repositories\ProductRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $repository;

    protected array $validators = [
        'code' => 'required|integer',
        'name' => 'required|string|max:255',
        'price' => 'required|regex:/^\d{1,13}(\.\d{1,4})?$/',
        'photo' => 'required|string',
    ];

    /**
     * @param ProductRepository $repository
     */
    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @OA\Get(
     * tags={"Product - List All Products"},
     * path="/api/products/list",
     * summary="List All Product",
     * description="List All Products",
     * security={
     * {"bearer":{}}},
     * @OA\Response(
     * response=200,
     * description="Success"
     * ),
     * @OA\Response(
     * response="default",
     * description="Unidentified error"
     * )
     * )
     */

    public function index(Request $request)
    {
        return parent::index($request);
    }

    /**
     * @OA\Post(
     * tags={"Product - Create Product"},
     * path="/api/products/create",
     * summary="Create Record",
     * description="Create Record",
     * security={
     * {"bearer":{}}},
     * @OA\RequestBody(
     * required = true,
     * @OA\MediaType(
     * mediaType="application/json",
     * @OA\Schema(
     * example=	{"code": 5,"name": "Pastel Chocolate","price": 11.50,"photo": "https://www.site.com/new-chocolate.jpg"},
     * )
     * )
     * ),
     * @OA\Response(
     * response=201,
     * description="Success"
     * ),
     * @OA\Response(
     * response="default",
     * description="Unidentified error"
     * )
     * )
     */

    public function store(Request $request)
    {
        return parent::store($request);
    }

    /**
     * @OA\Put(
     * tags={"Product - Update Product"},
     * path="/api/products/update/{id}",
     * summary="Update Record",
     * description="Update Record",
     * security={
     * {"bearer": {}}},
     * @OA\Parameter(
     * name="id",
     * description="Id",
     * required=true,
     * in="path",
     * @OA\Schema(
     * type="integer"
     * )
     * ),
     * @OA\RequestBody(
     * @OA\MediaType(
     * mediaType="application/json",
     * @OA\Schema(
     * example=	{"code": 7,"name": "Pastel Chocolate","price": 10.80,"photo": "https://www.site.com/new-pastel-chocolate.jpg"},
     * )
     * )
     * ),
     * @OA\Response(
     * response=200,
     * description="Success",
     * ),
     * @OA\Response(
     * response="default",
     * description="Unidentified error"
     * )
     * )
     */

    public function update(Request $request, int $id)
    {
        return parent::update($request, $id);
    }

    /**
     * @OA\Delete (
     * tags={"Product - Delete Product"},
     * path="/api/products/delete/{id}",
     * summary="Delete Record",
     * description="Delete Record",
     * security={
     * {"bearer": {}}},
     * @OA\Parameter(
     * name="id",
     * description="Id",
     * required=true,
     * in="path",
     * @OA\Schema(
     * type="integer"
     * )
     * ),
     * @OA\Response(
     * response=204,
     * description="Success",
     * ),
     * @OA\Response(
     * response="default",
     * description="Unidentified error"
     * )
     * )
     */

    public function destroy(int $id)
    {
        return parent::destroy($id);
    }

    public function show($id)
    {
        return parent::show($id);
    }
}
