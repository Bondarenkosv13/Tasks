<?php

namespace App\Validation;

use Core\Validator;

class LoginValidator extends Validator
{
    protected $errors = [];

    public function storeValidation($fields)
    {
        foreach ($fields as $key => $field) {
            if ($fields[$key] == null) {
                $this->errors["{$key}_error"] = "Fill the field {$key}!";
            }
        }
        return empty($this->errors);
    }
}