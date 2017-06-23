<?php

use Faker\Factory as Faker;
use App\Models\OrgExterno;
use App\Repositories\OrgExternoRepository;

trait MakeOrgExternoTrait
{
    /**
     * Create fake instance of OrgExterno and save it in database
     *
     * @param array $orgExternoFields
     * @return OrgExterno
     */
    public function makeOrgExterno($orgExternoFields = [])
    {
        /** @var OrgExternoRepository $orgExternoRepo */
        $orgExternoRepo = App::make(OrgExternoRepository::class);
        $theme = $this->fakeOrgExternoData($orgExternoFields);
        return $orgExternoRepo->create($theme);
    }

    /**
     * Get fake instance of OrgExterno
     *
     * @param array $orgExternoFields
     * @return OrgExterno
     */
    public function fakeOrgExterno($orgExternoFields = [])
    {
        return new OrgExterno($this->fakeOrgExternoData($orgExternoFields));
    }

    /**
     * Get fake data of OrgExterno
     *
     * @param array $postFields
     * @return array
     */
    public function fakeOrgExternoData($orgExternoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'descricao' => $fake->word
        ], $orgExternoFields);
    }
}
