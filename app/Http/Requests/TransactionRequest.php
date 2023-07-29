<?php

namespace App\Http\Requests;

use Pearl\RequestValidate\RequestAbstract;

class TransactionRequest extends RequestAbstract
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
            "currency"=> 'string',
            function ($attribute, $value, $fail) {
                if (stripos($value, 'select') !== false || stripos($value, 'union') !== false || stripos($value, 'insert') !== false || stripos($value, 'update') !== false || stripos($value, 'delete') !== false) {
                    $fail($attribute.' cannot contain query statements.');
                }
            },
            "provider"=>  'string',
            function ($attribute, $value, $fail) {
                if (stripos($value, 'select') !== false || stripos($value, 'union') !== false || stripos($value, 'insert') !== false || stripos($value, 'update') !== false || stripos($value, 'delete') !== false) {
                    $fail($attribute.' cannot contain query statements.');
                }
            },
            "statusCode"=> 'string',
            function ($attribute, $value, $fail) {
                if (stripos($value, 'select') !== false || stripos($value, 'union') !== false || stripos($value, 'insert') !== false || stripos($value, 'update') !== false || stripos($value, 'delete') !== false) {
                    $fail($attribute.' cannot contain query statements.');
                }
            },
            "amounteMax"=>"numeric|min:0",
            "amounteMax"=>"numeric|min:0",
        ];
    }
}
