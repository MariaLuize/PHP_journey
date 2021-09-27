<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeriesFormRequest extends FormRequest
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
     * 
     * // Regras de validação do Laravel: https://laravel.com/docs/8.x/validation#available-validation-rules
     */
    public function rules() // Validação dos dados de entrada para o database
    {
        return [
            'name'      => 'required|min:3|unique:series',
            'network'   => 'required',
        ];
    }

    public function messages() // Personalização das mensagens enviadas caso as regras de validação sejam infligidas
    {
        return [
            // Padrão: 'rule' => 'message',
            'required'      => 'O campo :attribute é obrigatório', // A regra required é comum tanto à name quanto a network
            'name.min'      => 'O campo Nome da Série necessita de, pelo menos, 3 caracteres',
            'name.unique'   => 'Está série já está cadastrada',
        ];
    }
}
