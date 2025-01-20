<?php

namespace PHPFramework;

abstract class Model
{

    public array $fillable = [];
    public array $attributes = [];
    protected array $errors = [];
    protected array $ruleList = ['required', 'min', 'max'];
    protected array $errorMessages = [
        'required' => 'The :fieldname: field is required',
        'max' => 'The :fieldname: field must be less than :rulevalue: characters',
        'min' => 'The :fieldname: field must be more than :rulevalue: characters',
    ];

    public function loadData(): void
    {
        $data = request()->getData();

        foreach ($this->fillable as $field) {
            if (isset($data[$field])) {
                $this->attributes[$field] = $data[$field];
            } else {
                $this->attributes[$field] = '';
            }
        }
    }



}