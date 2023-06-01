<?php

declare(strict_types=1);

namespace App\Domain\Client\Controllers;
use App\Domain\Client\Repositories\ClientRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class ClientController extends Controller
{
    protected $repository;

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

    public function index(Request $request)
    {
        return parent::index($request);
    }


    public function store(Request $request)
    {
        return parent::store($request);
    }

    public function update(Request $request, int $id)
    {
        return parent::update($request, $id);
    }

    public function destroy(int $id)
    {
        return parent::destroy($id);
    }

    public function show($id)
    {
        return parent::show($id);
    }

}
