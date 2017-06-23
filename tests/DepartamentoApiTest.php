<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DepartamentoApiTest extends TestCase
{
    use MakeDepartamentoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateDepartamento()
    {
        $departamento = $this->fakeDepartamentoData();
        $this->json('POST', '/api/v1/departamentos', $departamento);

        $this->assertApiResponse($departamento);
    }

    /**
     * @test
     */
    public function testReadDepartamento()
    {
        $departamento = $this->makeDepartamento();
        $this->json('GET', '/api/v1/departamentos/'.$departamento->id);

        $this->assertApiResponse($departamento->toArray());
    }

    /**
     * @test
     */
    public function testUpdateDepartamento()
    {
        $departamento = $this->makeDepartamento();
        $editedDepartamento = $this->fakeDepartamentoData();

        $this->json('PUT', '/api/v1/departamentos/'.$departamento->id, $editedDepartamento);

        $this->assertApiResponse($editedDepartamento);
    }

    /**
     * @test
     */
    public function testDeleteDepartamento()
    {
        $departamento = $this->makeDepartamento();
        $this->json('DELETE', '/api/v1/departamentos/'.$departamento->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/departamentos/'.$departamento->id);

        $this->assertResponseStatus(404);
    }
}
