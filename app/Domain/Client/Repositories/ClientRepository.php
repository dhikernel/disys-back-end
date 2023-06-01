<?php

declare(strict_types=1);

namespace App\Domain\Client\Repositories;

use App\Domain\Client\Models\Client;
use Exception;
use Illuminate\Support\Facades\DB;

class ClientRepository
{
    public function index()
    {
        return Client::orderBy('id')->get();
    }

    public function store(array $request): Client
    {
        try {
            DB::beginTransaction();

            $createdClient = Client::create($request);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();
            throw new Exception($exception->getMessage());
        }

        return $createdClient;
    }

    public function update(array $data, int $id)
    {
        $updateClient = Client::find($id);

        return $updateClient->fill($data)->save();
    }

    public function destroy(int $id): bool
    {
        return (bool) Client::destroy($id);
    }
}
