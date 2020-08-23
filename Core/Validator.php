<?php

namespace Core;

abstract class Validator
{
    protected $errors = [];

    protected $rules = [];


    public function getErrors()
    {
        return $this->errors;
    }

    public function trim($fields)
    {
        foreach ($fields as $key => $field) {
            $fields[$key] = trim($field);
        }
        return $fields;
    }

    abstract public function storeValidation($fields);
}