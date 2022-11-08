<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Exception;

/***
 * Class CreateCommentRequest
 * @package App\Http\Requests\Pass
 */
class CreateCommentRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     *
     * @throws Exception
     */
    public function rules()
    {
        return [
            'title' => [
                'required',
                'string',
            ],
            'text' => [
                'required',
                'string',
            ],
        ];
    }
}
