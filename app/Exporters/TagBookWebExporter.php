<?php

namespace App\Exporters;

use App\Model\TagBook;
use App\Model\TagBookWebAttribute;
use App\Decorator\WebHeaderDecorator;
use App\Decorator\WebTableDecorator;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Illuminate\Support\Facades\DB;

class TagBookWebExporter implements FromQuery, WithHeadings, ShouldAutoSize, WithEvents
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function headings(): array
    {
        return (new TagBookWebAttribute())->exportHeadings;
    }

    public function query()
    {
        return TagBookWebAttribute::query()
            ->select(
                'priority',
                'reference_link_page',
                'description',
                'data_layer_data_attribute',
                'status_implementation_data_layer_data_attribute',
                'status_implementation_tag_manager',
                'status_google_analytics',
                'track_type',
                'tag_name',
                'fields_to_set',
                'event_category',
                'event_action',
                'event_label_var',
                'event_value',
                'custom_dimension_metrics',
                'additional',
                'comments'
            )
            ->where('tag_book_id', $this->id);
    }

    protected function getRows($id) {
        $query = $this->query();

        return $query->count();
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $rows = $this->getRows($this->id);

                $headerDecorator = new WebHeaderDecorator($event, $rows);
                $headerDecorator->decorate();

                $tableDecorator = new WebTableDecorator($event, $rows);
                $tableDecorator->decorate();
            },
        ];
    }
}
