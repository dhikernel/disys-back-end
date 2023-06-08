<?php

declare(strict_types=1);

namespace App\Domain\Client\Repositories;

use App\Domain\Client\Models\Client;
use App\Domain\Client\Resources\ClientCollection;
use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
class ClientRepository
{
    private array $relationships;

    public function __construct()
    {
        $this->relationships = [
            'order',
        ];
    }

    public function index()
    {
        $query = Client::with($this->relationships);

        $query = QueryBuilder::for($query)
            ->allowedFilters([
                AllowedFilter::partial('client_name', 'name'),
            ])
            ->defaultSort('created_at')
            ->paginate(request('per_page', config('settings.AMOUNT_PAGINATE_DEFAULT')))
            ->appends(request()->query());

        $returnClientCollection = new ClientCollection($query);

        return $returnClientCollection->resource;
    }

    /**
     * @throws Exception
     */
    public function store(array $request): Client
    {
        try {
            DB::beginTransaction();

            $createdClient = Client::create($request);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();
            throw new \Exception($exception->getMessage());
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
