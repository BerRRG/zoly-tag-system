<?php

namespace App\Exporters;

use App\Model\TagBook;
use App\Model\GaGoal;
use App\Decorator\GaGoalHeaderDecorator;
use App\Decorator\GaGoalTableDecorator;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Illuminate\Support\Facades\DB;

class GaGoalExporter implements FromView, WithHeadings, ShouldAutoSize, WithEvents, WithTitle
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
        return GaGoal::query()
            ->select(
                'id',
                'ga_index',
                'name',
                'description',
                'type',
                'condition_rules',
                'status',
                'order'
            )
            ->where('tag_book_id', $this->id)
            ->orderBy('order');
    }

    public function view(): View
    {
        return view('exports.ga-goals', [
            'gaGoals' => $this->query()->get()
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

                $headerDecorator = new GaGoalHeaderDecorator($event, $rows, []);
                $headerDecorator->decorate();

                $tableDecorator = new GaGoalTableDecorator($event, $rows, []);
                $tableDecorator->decorate();
            },
        ];
    }

    public function title(): string
    {
        return 'GA - Goals';
    }
}
