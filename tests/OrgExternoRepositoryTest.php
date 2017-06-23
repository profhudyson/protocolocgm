<?php

use App\Models\OrgExterno;
use App\Repositories\OrgExternoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class OrgExternoRepositoryTest extends TestCase
{
    use MakeOrgExternoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var OrgExternoRepository
     */
    protected $orgExternoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->orgExternoRepo = App::make(OrgExternoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateOrgExterno()
    {
        $orgExterno = $this->fakeOrgExternoData();
        $createdOrgExterno = $this->orgExternoRepo->create($orgExterno);
        $createdOrgExterno = $createdOrgExterno->toArray();
        $this->assertArrayHasKey('id', $createdOrgExterno);
        $this->assertNotNull($createdOrgExterno['id'], 'Created OrgExterno must have id specified');
        $this->assertNotNull(OrgExterno::find($createdOrgExterno['id']), 'OrgExterno with given id must be in DB');
        $this->assertModelData($orgExterno, $createdOrgExterno);
    }

    /**
     * @test read
     */
    public function testReadOrgExterno()
    {
        $orgExterno = $this->makeOrgExterno();
        $dbOrgExterno = $this->orgExternoRepo->find($orgExterno->id);
        $dbOrgExterno = $dbOrgExterno->toArray();
        $this->assertModelData($orgExterno->toArray(), $dbOrgExterno);
    }

    /**
     * @test update
     */
    public function testUpdateOrgExterno()
    {
        $orgExterno = $this->makeOrgExterno();
        $fakeOrgExterno = $this->fakeOrgExternoData();
        $updatedOrgExterno = $this->orgExternoRepo->update($fakeOrgExterno, $orgExterno->id);
        $this->assertModelData($fakeOrgExterno, $updatedOrgExterno->toArray());
        $dbOrgExterno = $this->orgExternoRepo->find($orgExterno->id);
        $this->assertModelData($fakeOrgExterno, $dbOrgExterno->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteOrgExterno()
    {
        $orgExterno = $this->makeOrgExterno();
        $resp = $this->orgExternoRepo->delete($orgExterno->id);
        $this->assertTrue($resp);
        $this->assertNull(OrgExterno::find($orgExterno->id), 'OrgExterno should not exist in DB');
    }
}
