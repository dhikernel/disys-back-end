<?php

declare(strict_types=1);

namespace App\Domain\Order\Repositories;

use App\Domain\Order\Models\Order;
use App\Domain\Order\Resources\OrderCollection;
use App\Domain\Order\Support\OrderRelationships;
use Exception;
use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

/**
 * @property OrderRelationships $orderRelationships
 */
class OrderRepository
{
    public function __construct(OrderRelationships $orderRelationships)
    {
        $this->orderRelationships = $orderRelationships;
    }
    public function index()
    {
        $query = Order::with((new OrderRelationships())->get());

        $result = QueryBuilder::for($query)
            ->allowedFilters([
                AllowedFilter::partial('product_name', 'product.name'),
            ])
            ->defaultSort('-created_at')
            ->paginate(request('per_page', config('settings.AMOUNT_PAGINATE_DEFAULT')))
            ->appends(request()->query());

        $resultOrderCollection = new OrderCollection($result);

        return $resultOrderCollection->resource;
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
