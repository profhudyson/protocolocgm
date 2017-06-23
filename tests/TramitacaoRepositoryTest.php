<?php

use App\Models\Tramitacao;
use App\Repositories\TramitacaoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TramitacaoRepositoryTest extends TestCase
{
    use MakeTramitacaoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TramitacaoRepository
     */
    protected $tramitacaoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->tramitacaoRepo = App::make(TramitacaoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTramitacao()
    {
        $tramitacao = $this->fakeTramitacaoData();
        $createdTramitacao = $this->tramitacaoRepo->create($tramitacao);
        $createdTramitacao = $createdTramitacao->toArray();
        $this->assertArrayHasKey('id', $createdTramitacao);
        $this->assertNotNull($createdTramitacao['id'], 'Created Tramitacao must have id specified');
        $this->assertNotNull(Tramitacao::find($createdTramitacao['id']), 'Tramitacao with given id must be in DB');
        $this->assertModelData($tramitacao, $createdTramitacao);
    }

    /**
     * @test read
     */
    public function testReadTramitacao()
    {
        $tramitacao = $this->makeTramitacao();
        $dbTramitacao = $this->tramitacaoRepo->find($tramitacao->id);
        $dbTramitacao = $dbTramitacao->toArray();
        $this->assertModelData($tramitacao->toArray(), $dbTramitacao);
    }

    /**
     * @test update
     */
    public function testUpdateTramitacao()
    {
        $tramitacao = $this->makeTramitacao();
        $fakeTramitacao = $this->fakeTramitacaoData();
        $updatedTramitacao = $this->tramitacaoRepo->update($fakeTramitacao, $tramitacao->id);
        $this->assertModelData($fakeTramitacao, $updatedTramitacao->toArray());
        $dbTramitacao = $this->tramitacaoRepo->find($tramitacao->id);
        $this->assertModelData($fakeTramitacao, $dbTramitacao->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTramitacao()
    {
        $tramitacao = $this->makeTramitacao();
        $resp = $this->tramitacaoRepo->delete($tramitacao->id);
        $this->assertTrue($resp);
        $this->assertNull(Tramitacao::find($tramitacao->id), 'Tramitacao should not exist in DB');
    }
}
