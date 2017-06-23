<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class OrgExternoApiTest extends TestCase
{
    use MakeOrgExternoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateOrgExterno()
    {
        $orgExterno = $this->fakeOrgExternoData();
        $this->json('POST', '/api/v1/orgExternos', $orgExterno);

        $this->assertApiResponse($orgExterno);
    }

    /**
     * @test
     */
    public function testReadOrgExterno()
    {
        $orgExterno = $this->makeOrgExterno();
        $this->json('GET', '/api/v1/orgExternos/'.$orgExterno->id);

        $this->assertApiResponse($orgExterno->toArray());
    }

    /**
     * @test
     */
    public function testUpdateOrgExterno()
    {
        $orgExterno = $this->makeOrgExterno();
        $editedOrgExterno = $this->fakeOrgExternoData();

        $this->json('PUT', '/api/v1/orgExternos/'.$orgExterno->id, $editedOrgExterno);

        $this->assertApiResponse($editedOrgExterno);
    }

    /**
     * @test
     */
    public function testDeleteOrgExterno()
    {
        $orgExterno = $this->makeOrgExterno();
        $this->json('DELETE', '/api/v1/orgExternos/'.$orgExterno->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/orgExternos/'.$orgExterno->id);

        $this->assertResponseStatus(404);
    }
}
