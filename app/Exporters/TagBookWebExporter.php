<?php

namespace App\Exporters;

use App\Model\TagBook;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class TagBookWebExporter implements WithMultipleSheets
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function sheets(): array
    {
        $sheets = [];

        $sheets[] = new CoverExporter($this->id);
        $sheets[] = new TaggingPlanWebExporter($this->id);
        $sheets[] = new GaElementExporter($this->id);
        $sheets[] = new GaGoalExporter($this->id);
        $sheets[] = new ReferenceExporter($this->id);

        return $sheets;
    }
}
