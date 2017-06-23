<?php

use Faker\Factory as Faker;
use App\Models\Departamento;
use App\Repositories\DepartamentoRepository;

trait MakeDepartamentoTrait
{
    /**
     * Create fake instance of Departamento and save it in database
     *
     * @param array $departamentoFields
     * @return Departamento
     */
    public function makeDepartamento($departamentoFields = [])
    {
        /** @var DepartamentoRepository $departamentoRepo */
        $departamentoRepo = App::make(DepartamentoRepository::class);
        $theme = $this->fakeDepartamentoData($departamentoFields);
        return $departamentoRepo->create($theme);
    }

    /**
     * Get fake instance of Departamento
     *
     * @param array $departamentoFields
     * @return Departamento
     */
    public function fakeDepartamento($departamentoFields = [])
    {
        return new Departamento($this->fakeDepartamentoData($departamentoFields));
    }

    /**
     * Get fake data of Departamento
     *
     * @param array $postFields
     * @return array
     */
    public function fakeDepartamentoData($departamentoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'descricao' => $fake->word
        ], $departamentoFields);
    }
}
