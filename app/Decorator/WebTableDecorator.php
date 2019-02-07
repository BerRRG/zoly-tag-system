<?php

namespace App\Decorator;

class WebTableDecorator extends AbstractDecorator
{
    public function decorate()
    {
        $this->decorateRows();
        $cellRange = 'A2:Q2';
        $this->event->sheet->getDelegate()->getStyle($cellRange)->getFont()
            ->setName('Poppins');
        $this->event->sheet->getDelegate()->getStyle($cellRange)->getFont()
            ->setSize(10);
        $this->event->sheet->getDelegate()->getStyle($cellRange)->getAlignment()
            ->setHorizontal('center');
        $this->event->sheet->getDelegate()->getStyle($cellRange)->getAlignment()
            ->setVertical('center');

        $cellRange = 'E2:G2';
        $this->event->sheet->getDelegate()->getStyle($cellRange)->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('90EE90');
        $this->event->sheet->getDelegate()->getStyle($cellRange)->getFont()
            ->setSize(10);
        $this->event->sheet->getDelegate()->getStyle($cellRange)->getFont()
            ->setBold(true);
        $this->event->sheet->getDelegate()->getStyle($cellRange)->getAlignment()
            ->setHorizontal('center');
        $this->event->sheet->getDelegate()->getStyle($cellRange)->getAlignment()
            ->setVertical('center');
    }
}
