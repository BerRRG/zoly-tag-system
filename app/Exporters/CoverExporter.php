<?php

namespace App\Exporters;

use App\Model\TagBook;
use App\Model\TagBookWebAttribute;
use App\Decorator\CoverDecorator;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Illuminate\Support\Facades\DB;

class CoverExporter implements FromView, ShouldAutoSize, WithEvents, WithTitle
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function query()
    {
        return TagBook::query()
            ->select(
                'client_name',
                'project_name',
                'user_name',
                'user_mail',
                'ga_code',
                'gtm_code',
                'updated_at'
            )->where('id', $this->id);
    }

    public function view(): View
    {
        return view('exports.cover', [
            'attributes' => $this->query()->get()
        ]);
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $tableDecorator = new CoverDecorator($event, null, null);
                $tableDecorator->decorate();
            },
        ];
    }

    public function title(): string
    {
        return 'Cover';
    }
}
