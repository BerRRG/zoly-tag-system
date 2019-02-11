<?php

namespace App\Decorator;

class CoverDecorator extends AbstractDecorator
{
    const FIRST_CONTENT_LINE = 2;

    public function decorate()
    {
        $cellRange = 'A2:D2';
        $this->event->sheet->getDelegate()->getStyle($cellRange)->getBorders()
            ->getAllBorders()->setBorderStyle('none');

        $this->event->sheet->getDelegate()->getStyle($cellRange)->getBorders()
            ->getAllBorders()->getColor()->setARGB('FFFFFF');

        $this->event->sheet->getDelegate()->getStyle($cellRange)->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('FFFFFF');

    }
}
