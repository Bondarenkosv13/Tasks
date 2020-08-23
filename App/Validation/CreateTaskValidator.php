<?php

namespace App\Validation;

use Core\Validator;

class CreateTaskValidator extends Validator
{
    protected $errors = [
        'name_error' => 'The name isn\'t correct, example of the name: "Bob"!',
        'email_error' => 'The email isn\'t correct, example of the email: "bob.silver@gmail.com"!',
        'task_error' => 'The should not be empty!'
    ];

    protected $rules = [
        'name' => '/^[A-ZА-Я][a-zа-я]+$/u',
        'email' => '/^[a-z1-9]+(?:\.[a-z1-9]+)*@[a-z]+(?:\.[a-z]+)+$/i',
        'task' => '/\w/i'
    ];

    public function storeValidation($fields)
    {
        foreach ($fields as $key => $field) {
            if ($fields[$key] == null) {
                $this->errors["{$key}_error"] = "Fill the field {$key}!";
            } elseif (preg_match($this->rules[$key], $field)) {
                unset($this->errors["{$key}_error"]);
            }
        }
        return empty($this->errors);
    }

}