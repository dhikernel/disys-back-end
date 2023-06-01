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
