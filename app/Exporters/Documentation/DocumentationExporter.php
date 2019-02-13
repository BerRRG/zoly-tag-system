<?php

namespace App\Exporters\Documentation;

use Storage;
use App\Model\TagBook;
use Illuminate\Support\Facades\View;

class DocumentationExporter
{
    public $tagBookId;

    public function __construct($tagBookId)
    {
        $this->tagBookId = $tagBookId;
    }

    public function export()
    {
        $tagBook = TagBook::find($this->tagBookId);
        $attributes = $tagBook->webAttributes()->get();

        Storage::put(
            'testdoc',
            View::make('exports.documentation.default-documentation')
                ->with('tagBook', $tagBook)
                ->with('attributes', $attributes)
        );

        dd('aaa');
    }
}
