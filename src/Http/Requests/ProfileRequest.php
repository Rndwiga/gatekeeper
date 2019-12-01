<?php

namespace Rndwiga\Gatekeeper\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Rndwiga\Gatekeeper\Model\AdministratorModel;


class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique((new AdministratorModel)->getTable())->ignore(auth()->id())],
        ];
    }
}
