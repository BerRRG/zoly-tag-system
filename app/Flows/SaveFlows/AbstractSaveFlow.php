<?php

namespace App\Flows\SaveFlows;

abstract class AbstractSaveFlow
{
    protected $model;
    protected $input;

    public function __construct($model, $input)
    {
        $this->model = $model;
        $this->input = $input;
    }

    abstract public function save();
}
