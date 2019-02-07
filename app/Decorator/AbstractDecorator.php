<?php

namespace App\Decorator;

abstract class AbstractDecorator
{
    protected $event;
    protected $rows;
    protected $startRow;

    public function __construct($event, $rows)
    {
        $this->event = $event;
        $this->rows = $rows;
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
