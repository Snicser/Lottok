<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGameRequest extends FormRequest
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
        return [
            'dropdown_team1' => [
                'required',
            ],
            'dropdown_team2' => [
                'required',
            ],
            'game-date' => [
                'required',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'game-date.required' => 'Een wedstrijd datum is verplicht.'
        ];
    }


}
