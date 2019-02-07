<?php

namespace App\Decorator;

abstract class AbstractDecorator
{
    protected $event;
    protected $rows;
    protected $sections;
    protected $startRow;

    public function __construct($event, $rows, $sections)
    {
        $this->event = $event;
        $this->rows = $rows;
        $this->sections = $sections;
    }

    public function setStartRow($startRow)
    {
        $this->startRow = $startRow;
    }

    abstract public function decorate();

    protected function decorateRows()
    {
        $endRow = $this->startRow + $this->rows;
        $processingRow = $this->startRow;

        while($processingRow <= $endRow) {

            $processingRow++;
        }
    }
}
