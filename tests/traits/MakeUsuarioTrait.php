<?php

use Faker\Factory as Faker;
use App\Models\Usuario;
use App\Repositories\UsuarioRepository;

trait MakeUsuarioTrait
{
    /**
     * Create fake instance of Usuario and save it in database
     *
     * @param array $usuarioFields
     * @return Usuario
     */
    public function makeUsuario($usuarioFields = [])
    {
        /** @var UsuarioRepository $usuarioRepo */
        $usuarioRepo = App::make(UsuarioRepository::class);
        $theme = $this->fakeUsuarioData($usuarioFields);
        return $usuarioRepo->create($theme);
    }

    /**
     * Get fake instance of Usuario
     *
     * @param array $usuarioFields
     * @return Usuario
     */
    public function fakeUsuario($usuarioFields = [])
    {
        return new Usuario($this->fakeUsuarioData($usuarioFields));
    }

    /**
     * Get fake data of Usuario
     *
     * @param array $postFields
     * @return array
     */
    public function fakeUsuarioData($usuarioFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'email' => $fake->word,
            'password' => $fake->word,
            'remember_token' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'id_dep' => $fake->randomDigitNotNull
        ], $usuarioFields);
    }
}
