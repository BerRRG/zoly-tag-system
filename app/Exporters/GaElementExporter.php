<?php

namespace App\Exporters;

use App\Model\TagBook;
use App\Model\GaElement;
use App\Decorator\GaElementHeaderDecorator;
use App\Decorator\GaElementTableDecorator;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Illuminate\Support\Facades\DB;

class GaElementExporter implements FromView, WithHeadings, ShouldAutoSize, WithEvents, WithTitle
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
        return GaElement::query()
            ->select(
                'id',
                'type',
                'index',
                'description',
                'format_example',
                'scope',
                'status',
                'comment',
                'section',
                'order'
            )
            ->where('tag_book_id', $this->id)
            ->orderBy('order');
    }

    public function view(): View
    {
        return view('exports.ga-elements', [
            'gaElements' => $this->query()->get()
        ]);
    }

    protected function getRows($id) {
        $query = $this->query();

        return $query->count();
    }

    protected function getSections($id) {
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

                $headerDecorator = new GaElementHeaderDecorator($event, $rows, $sections);
                $headerDecorator->decorate();

                $tableDecorator = new GaElementTableDecorator($event, $rows, $sections);
                $tableDecorator->decorate();
            },
        ];
    }

    public function title(): string
    {
        return 'GA - Elements';
    }
}
