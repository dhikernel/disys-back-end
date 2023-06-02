<?php

declare(strict_types=1);

namespace App\Domain\Order\Controllers;
use App\Domain\Order\Repositories\OrderRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class OrderController extends Controller
{
    protected $repository;

    protected array $validators = [
        'client_code' => 'required|integer',
        'product_code' => 'required|integer',

    ];

    /**
     * @param OrderRepository $repository
     */
    public function __construct(OrderRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @OA\Get(
     * tags={"Order - List All Orders"},
     * path="/api/orders/list",
     * summary="List All Orders",
     * description="List All Orders",
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
     * tags={"Order - Create Order"},
     * path="/api/orders/create",
     * summary="Create Record",
     * description="Create Record",
     * security={
     * {"bearer":{}}},
     * @OA\RequestBody(
     * required = true,
     * @OA\MediaType(
     * mediaType="application/json",
     * @OA\Schema(
     * example=	{"client_code": 1,"product_code": 1},
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
     * tags={"Order - Update Order"},
     * path="/api/orders/update/{id}",
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
     * example=	{"client_code": 7,"product_code": 7},
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
     * tags={"Order - Delete Order"},
     * path="/api/orders/delete/{id}",
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

}
