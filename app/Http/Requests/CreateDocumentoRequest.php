<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Documento;

class CreateDocumentoRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Documento::$regras;
    }

    public function messages()
    {
        return Documento::$mensagens;
    }

    public function attributes()
    {
        return Documento::$atributos;
    }
}
