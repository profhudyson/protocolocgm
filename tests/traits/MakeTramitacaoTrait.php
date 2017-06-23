<?php

use Faker\Factory as Faker;
use App\Models\Tramitacao;
use App\Repositories\TramitacaoRepository;

trait MakeTramitacaoTrait
{
    /**
     * Create fake instance of Tramitacao and save it in database
     *
     * @param array $tramitacaoFields
     * @return Tramitacao
     */
    public function makeTramitacao($tramitacaoFields = [])
    {
        /** @var TramitacaoRepository $tramitacaoRepo */
        $tramitacaoRepo = App::make(TramitacaoRepository::class);
        $theme = $this->fakeTramitacaoData($tramitacaoFields);
        return $tramitacaoRepo->create($theme);
    }

    /**
     * Get fake instance of Tramitacao
     *
     * @param array $tramitacaoFields
     * @return Tramitacao
     */
    public function fakeTramitacao($tramitacaoFields = [])
    {
        return new Tramitacao($this->fakeTramitacaoData($tramitacaoFields));
    }

    /**
     * Get fake data of Tramitacao
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTramitacaoData($tramitacaoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'data_tram' => $fake->date('Y-m-d H:i:s'),
            'origem' => $fake->randomDigitNotNull,
            'destino' => $fake->randomDigitNotNull,
            'id_usu' => $fake->randomDigitNotNull,
            'tipo_tram' => $fake->word,
            'despacho' => $fake->word,
            'id_doc' => $fake->randomDigitNotNull
        ], $tramitacaoFields);
    }
}
