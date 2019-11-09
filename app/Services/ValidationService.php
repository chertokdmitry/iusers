<?php


namespace App\Services;

use Illuminate\Http\Request;

class ValidationService
{
    /**
     * @param Request $request
     * @param array $rules
     * @return mixed
     */
    public function validate(Request $request, $rules = [])
    {
        return $request->validate($rules);
    }
}
