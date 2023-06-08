<?php

namespace Tests\Feature\Client\Controllers;

use App\Domain\Client\Models\Client;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use Symfony\Component\HttpFoundation\Response;

class ClientControllerTest extends TestCase
{
    protected $repository;

    protected $dataClient;

    use WithoutMiddleware;

    protected $client;

    protected $route;

    public function setUp(): void
    {
        parent::setUp();
        $this->withoutMiddleware();
        $this->route       = '/api/clients/';
        $this->dataClient = Client::factory();
    }

    private function prepareEnvironment(): void
    {
        $this->client = Client::factory()->create()->toArray();
    }

    private function getPayload(array $body = []): array
    {
        return array_merge(
            [
                'id' => $this->client['id'],
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
        $dataClient = $this->dataClient->make()->toArray();
        $response = $this->post($this->route . 'create', $dataClient);
        $response->assertStatus(Response::HTTP_CREATED);
    }

    public function testUpdate()
    {
        $this->prepareEnvironment();
        $data = $this->getPayload();
        $response = $this->put($this->route . 'update/' . $data['id'], $data);
        $response->assertStatus(Response::HTTP_NO_CONTENT);
    }

    public function testDestroy()
    {
        $this->prepareEnvironment();
        $data = $this->getPayload();
        $response = $this->delete($this->route . 'delete/' . $data['id']);
        $response->assertStatus(Response::HTTP_NO_CONTENT);
    }
}
