<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TramitacaoApiTest extends TestCase
{
    use MakeTramitacaoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTramitacao()
    {
        $tramitacao = $this->fakeTramitacaoData();
        $this->json('POST', '/api/v1/tramitacaos', $tramitacao);

        $this->assertApiResponse($tramitacao);
    }

    /**
     * @test
     */
    public function testReadTramitacao()
    {
        $tramitacao = $this->makeTramitacao();
        $this->json('GET', '/api/v1/tramitacaos/'.$tramitacao->id);

        $this->assertApiResponse($tramitacao->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTramitacao()
    {
        $tramitacao = $this->makeTramitacao();
        $editedTramitacao = $this->fakeTramitacaoData();

        $this->json('PUT', '/api/v1/tramitacaos/'.$tramitacao->id, $editedTramitacao);

        $this->assertApiResponse($editedTramitacao);
    }

    /**
     * @test
     */
    public function testDeleteTramitacao()
    {
        $tramitacao = $this->makeTramitacao();
        $this->json('DELETE', '/api/v1/tramitacaos/'.$tramitacao->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/tramitacaos/'.$tramitacao->id);

        $this->assertResponseStatus(404);
    }
}
