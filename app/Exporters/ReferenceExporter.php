<?php

namespace App\Exporters;

use App\Model\TagBook;
use App\Model\Reference;
use App\Decorator\ReferenceTableDecorator;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Illuminate\Support\Facades\DB;

class ReferenceExporter implements FromView, ShouldAutoSize, WithEvents, WithTitle
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function query()
    {
        return Reference::query()
            ->select(
                'id',
                'name',
                'url',
                'order'
            )
            ->where('tag_book_id', $this->id)
            ->orderBy('order');
    }

    public function view(): View
    {
        return view('exports.references', [
            'references' => $this->query()->get()
        ]);
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

                $tableDecorator = new ReferenceTableDecorator($event, $rows, []);
                $tableDecorator->decorate();
            },
        ];
    }

    public function title(): string
    {
        return 'References';
    }
}
