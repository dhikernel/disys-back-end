<?php

declare(strict_types=1);

namespace App\Domain\Order\Repositories;

use App\Domain\Client\Models\Client;
use App\Domain\Order\Exceptions\CustomException;
use App\Domain\Order\Models\Order;
use App\Domain\Order\Resources\OrderCollection;
use App\Domain\Order\Services\SendEmail;
use App\Domain\Order\Support\OrderRelationships;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Exception;

/**
 * @property OrderRelationships $orderRelationships
 */
class OrderRepository
{
    protected Order $loadClients;

    protected $endEmailToClient;

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

    /**
     * @throws Exception
     */
    public function store(array $request)
    {
        try {
            DB::beginTransaction();

            $createdClient = Order::create($request);

            $loadClients = Client::where('id', $request['client_code'])->first();

            if (!$loadClients) {
                throw new CustomException('Client code not found', HttpResponse::HTTP_NOT_FOUND);
            }

            if ($loadClients) {

                $client = $createdClient->load([
                    'client' => function ($query) {
                        $query->select(['id', 'name', 'email', 'phone', 'birth_date', 'address', 'complement', 'neighborhood', 'zip_code']);
                    },
                ])->toArray();
            }

            (new SendEmail())->sendEmailToClient($client);

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
