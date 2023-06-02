<?php

namespace Tests\Feature\Client\Controllers;

use App\Domain\Client\Models\Client;
use App\Domain\Client\Repositories\ClientRepository;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use Symfony\Component\HttpFoundation\Response;

class ClientControllerTest extends TestCase
{
    protected $repository;
    use WithoutMiddleware, DatabaseMigrations;

    public function setUp(): void
    {
        parent::setUp();

        $this->repository = ClientRepository::class;

        $this->route       = '/api/list-clients';
        $this->createRoute = '/api/create-client';
        $this->updateRoute = '/api/update-client';
        $this->deleteRoute =  '/api/delete-client';
        $this->dataClient = Client::factory();
        $this->seed();
    }
    public function testIndex()
    {
        $this->get($this->route)->assertStatus(Response::HTTP_OK);
    }

    public function testStore()
    {
        $dataClient = $this->dataClient->create()->toArray();
        $response = $this->post($this->createRoute, $dataClient);
        $response->assertStatus(Response::HTTP_OK);
    }

    public function testUpdate()
    {
        $dataClient = $this->dataClient->create();
        $response = $this->put($this->updateRoute.'/'.$dataClient->id);
        $response->assertStatus(Response::HTTP_OK);
    }

    public function testDestroy()
    {
        $dataClient = $this->dataClient->create();
        $response = $this->delete($this->deleteRoute.'/'.$dataClient->id);
        $response->assertStatus(Response::HTTP_OK);
    }
}
