<?php

namespace App\Exporters;

use App\Model\TagBook;
use App\Model\TagBookWebAttribute;
use App\Decorator\WebHeaderDecorator;
use App\Decorator\WebTableDecorator;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Events\AfterSheet;
use Illuminate\Support\Facades\DB;

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

        return $sheets;
    }
}
