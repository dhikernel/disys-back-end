<?php

declare(strict_types=1);

namespace App\Domain\Client\Controllers;
use App\Domain\Client\Repositories\ClientRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class ClientController extends Controller
{
    protected ClientRepository $repository;

    protected array $validators = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:clients',
        'phone' => 'nullable|string',
        'birth_date' => 'nullable|date',
        'address' => 'required|string',
        'complement' => 'nullable|string',
        'neighborhood' => 'required|nullable|string',
        'zip_code' => 'required|nullable|string|max:9',
    ];

    /**
     * @param ClientRepository $repository
     */
    public function __construct(ClientRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @OA\Get(
     * tags={"Client - List All Clients"},
     * path="/api/clients/list",
     * summary="List All Clients",
     * description="List All Clients",
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
     * tags={"Client - Create Client"},
     * path="/api/clients/create",
     * summary="Create Record",
     * description="Create Record",
     * security={
     * {"bearer":{}}},
     * @OA\RequestBody(
     * required = true,
     * @OA\MediaType(
     * mediaType="application/json",
     * @OA\Schema(
     * example={"name": "1","email": "diego.pereira26@gmail.com","phone": "11 99999-9999","birth_date": "1988-07-26","address": "Test endereço","complement": "Test complemento","neighborhood": "Test Bairro","zip_code": "67145007"},
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
     * tags={"Client - Update Client"},
     * path="/api/clients/update/{id}",
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
     * example={"name": "1","email": "diego.pereira26@gmail.com","phone": "11 99999-9999","birth_date": "1988-07-26","address": "Test endereço","complement": "Test complemento","neighborhood": "Test Bairro","zip_code": "67145007"},
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
     * tags={"Client - Delete Client"},
     * path="/api/clients/delete/{id}",
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
