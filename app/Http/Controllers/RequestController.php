<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class RequestController extends Controller
{
    public static function validate(array $data, array $rules)
    {
        $validator = Validator::make($data, $rules);
        try {
            return $validator->validated();
        } catch (ValidationException $e) {
            return false;
        }
    }
}
