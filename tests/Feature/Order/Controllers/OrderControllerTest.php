<?php

namespace Tests\Feature\Order\Controllers;

use App\Domain\Client\Models\Client;
use App\Domain\Order\Models\Order;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use Symfony\Component\HttpFoundation\Response;

class OrderControllerTest extends TestCase
{
    use WithoutMiddleware;

    protected $repository, $dataOrder, $dataClient, $order, $client, $route;

    public function setUp(): void
    {
        parent::setUp();
        $this->withoutMiddleware();
        $this->route       = '/api/orders/';
        $this->dataOrder = Order::factory();
        $this->dataClient = Client::factory();
    }

    private function prepareEnvironment(): void
    {
        $this->order = Order::factory()->create()->toArray();
        $this->client = Client::factory()->create()->toArray();
    }

    private function getPayloadOrder(array $body = []): array
    {
        return array_merge(
            [
                'id' => 7,
                'client_code' => $this->order['client_code'],
                'product_code' => $this->order['product_code'],
            ],
            $body
        );
    }
    private function getPayloadClient(array $body = []): array
    {
        return array_merge(
            [
                'id_client' => 1,
                'name' => $this->client['name'],
                'email' => $this->client['email'],
                'phone' => $this->client['phone'],
                'birth_date' => $this->client['birth_date'],
                'address' => $this->client['address'],
                'complement' => $this->client['complement'],
                'neighborhood' => $this->client['neighborhood'],
                'zip_code' => $this->client['zip_code'],
            ],
            $body
        );
    }

    public function testIndex()
    {
        $this->get($this->route . 'list')->assertStatus(Response::HTTP_OK);
    }

    public function testStore()
    {
        $this->prepareEnvironment();
        $dataOrder = $this->getPayloadOrder();
        $dataClient = $this->getPayloadClient();
        $data = array_merge($dataOrder, $dataClient);
        $response = $this->post($this->route . 'create', $data);
        $response->assertStatus(Response::HTTP_CREATED);
    }

    public function testUpdate()
    {
        $this->order = Order::factory()->make()->toArray();
        $data = $this->getPayloadOrder();
        $response = $this->put($this->route . 'update/' . $data['id'], $data);
        $response->assertStatus(Response::HTTP_NO_CONTENT);
    }

    public function testDestroy()
    {
        $this->prepareEnvironment();
        $data = $this->getPayloadOrder();
        $response = $this->delete($this->route . 'delete/' . $data['id']);
        $response->assertStatus(Response::HTTP_NO_CONTENT);
    }
}
