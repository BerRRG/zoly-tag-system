<?php

namespace App\Decorator;

class ReferenceTableDecorator extends AbstractDecorator
{
    const FIRST_CONTENT_LINE = 1;

    public function decorate()
    {
        $this->decorateRows();
        $i = self::FIRST_CONTENT_LINE;

        while($i <= $this->rows+1) {
            $cellRange = sprintf('A%s:A%s', $i, $i);
            $this->event->sheet->getDelegate()->getStyle($cellRange)->getFont()
                ->setBold(true);
            $this->event->sheet->getDelegate()->getStyle($cellRange)->getActiveSheet()
                ->getRowDimension($i)->setRowHeight(35);
            $this->event->sheet->getDelegate()->getStyle($cellRange)->getFont()
                ->setName('Poppins');
            $this->event->sheet->getDelegate()->getStyle($cellRange)->getFont()
                ->setSize(10);

            $cellRange = sprintf('B%s:B%s', $i, $i);
            $this->event->sheet->getDelegate()->getStyle($cellRange)->getFont()
                ->setSize(10);

            $i++;
        }
    }
}
