<?php

namespace PHPFramework;

use Valitron\Validator;

abstract class Model
{

    protected array $fillable = [];
    public array $attributes = [];
    protected array $rules = [];
    protected array $errors = [];
    protected array $labels = [];


    public function __construct(bool $load = true)
    {
        if ($load) {
            $this->loadData();
        }
    }

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

    public function validate($data = [], $rules = [], $labels = []): bool
    {
        if (!$data) {
            $data = $this->attributes;
        }

        if (!$rules) {
            $rules = $this->rules;
        }

        if (!$labels) {
            $labels = $this->labels;
        }

        Validator::langDir(CONFIG . '/lang');
        Validator::lang('ru');

        $validator = new Validator($data);

        $validator->rules($rules);
        $validator->labels($labels);

        if (!$validator->validate()) {
            $this->errors = $validator->errors();
            return false;
        }

        return true;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

}