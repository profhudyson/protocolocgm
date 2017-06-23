<?php

use App\Models\Departamento;
use App\Repositories\DepartamentoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DepartamentoRepositoryTest extends TestCase
{
    use MakeDepartamentoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var DepartamentoRepository
     */
    protected $departamentoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->departamentoRepo = App::make(DepartamentoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateDepartamento()
    {
        $departamento = $this->fakeDepartamentoData();
        $createdDepartamento = $this->departamentoRepo->create($departamento);
        $createdDepartamento = $createdDepartamento->toArray();
        $this->assertArrayHasKey('id', $createdDepartamento);
        $this->assertNotNull($createdDepartamento['id'], 'Created Departamento must have id specified');
        $this->assertNotNull(Departamento::find($createdDepartamento['id']), 'Departamento with given id must be in DB');
        $this->assertModelData($departamento, $createdDepartamento);
    }

    /**
     * @test read
     */
    public function testReadDepartamento()
    {
        $departamento = $this->makeDepartamento();
        $dbDepartamento = $this->departamentoRepo->find($departamento->id);
        $dbDepartamento = $dbDepartamento->toArray();
        $this->assertModelData($departamento->toArray(), $dbDepartamento);
    }

    /**
     * @test update
     */
    public function testUpdateDepartamento()
    {
        $departamento = $this->makeDepartamento();
        $fakeDepartamento = $this->fakeDepartamentoData();
        $updatedDepartamento = $this->departamentoRepo->update($fakeDepartamento, $departamento->id);
        $this->assertModelData($fakeDepartamento, $updatedDepartamento->toArray());
        $dbDepartamento = $this->departamentoRepo->find($departamento->id);
        $this->assertModelData($fakeDepartamento, $dbDepartamento->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteDepartamento()
    {
        $departamento = $this->makeDepartamento();
        $resp = $this->departamentoRepo->delete($departamento->id);
        $this->assertTrue($resp);
        $this->assertNull(Departamento::find($departamento->id), 'Departamento should not exist in DB');
    }
}
