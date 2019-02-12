<?php

namespace App\Flows\SaveFlows;

use Illuminate\Support\Arr;

class GaElementSaveFlow extends AbstractSaveFlow
{
    public function save()
    {
        $this->model->fill($this->input);
        $this->model->save();
    }
}
