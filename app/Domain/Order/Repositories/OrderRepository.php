<?php

declare(strict_types=1);

namespace App\Domain\Order\Repositories;

use App\Domain\Order\Models\Order;
use Exception;
use Illuminate\Support\Facades\DB;

class OrderRepository
{
    public function index()
    {
        return Order::orderBy('id')->get();
    }

    public function store(array $request): Order
    {
        try {
            DB::beginTransaction();

            $createdClient = Order::create($request);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();
            throw new Exception($exception->getMessage());
        }

        return $createdClient;
    }

    public function update(array $data, int $id)
    {
        $updateClient = Order::find($id);

        return $updateClient->fill($data)->save();
    }

    public function destroy(int $id): bool
    {
        return (bool) Order::destroy($id);
    }
}
