<?php

namespace App\Exporters;

use App\Model\TagBook;
use App\Model\TagBookWebAttribute;
use App\Decorator\WebHeaderDecorator;
use App\Decorator\WebTableDecorator;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Illuminate\Support\Facades\DB;

class TaggingPlanWebExporter implements FromView, WithHeadings, ShouldAutoSize, WithEvents, WithTitle
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
                'id',
                'priority',
                'reference_link_page',
                'description_when',
                'description_where',
                'description_button',
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
                'additional',
                'comments',
                'section',
                'order'
            )
            ->where('tag_book_id', $this->id)
            ->orderBy('order');
    }

    public function view(): View
    {
        return view('exports.webattributes', [
            'attributes' => $this->query()->get()
        ]);
    }

    protected function getRows($id)
    {
        $query = $this->query();

        return $query->count();
    }

    protected function getSections($id)
    {
        $query = $this->query();
        $query->select('id', 'order');
        $query->whereNotNull('section');

        return $query->get();
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $rows = $this->getRows($this->id);
                $sections = $this->getSections($this->id);

                $headerDecorator = new WebHeaderDecorator($event, $rows, $sections);
                $headerDecorator->decorate();

                $tableDecorator = new WebTableDecorator($event, $rows, $sections);
                $tableDecorator->decorate();
            },
        ];
    }

    public function title(): string
    {
        return 'Tagging Plan';
    }
}
