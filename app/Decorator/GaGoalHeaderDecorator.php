<?php

namespace App\Decorator;

class GaGoalHeaderDecorator extends AbstractDecorator
{
    public function decorate()
    {
        $columnDimension = $this->event->sheet->getDelegate()->getColumnDimensions('A');

        $cellRange = 'A1:F1';
        $this->event->sheet->getDelegate()->getStyle($cellRange)->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('201351');
        $this->event->sheet->getDelegate()->getStyle($cellRange)->getFont()
            ->setSize(10);
        $this->event->sheet->getDelegate()->getStyle($cellRange)->getFont()
            ->getColor()->setARGB('FFFFFF');
        $this->event->sheet->getDelegate()->getStyle($cellRange)->getFont()
            ->setName('Poppins');
        $this->event->sheet->getDelegate()->getStyle($cellRange)->getFont()
            ->setBold(true);
        $this->event->sheet->getDelegate()->getRowDimension(1)->setRowHeight(35);
        $this->event->sheet->getDelegate()->getStyle($cellRange)->getAlignment()
            ->setHorizontal('center');
        $this->event->sheet->getDelegate()->getStyle($cellRange)->getAlignment()
            ->setVertical('center');
        $this->event->sheet->getDelegate()->getStyle($cellRange)->getBorders()
            ->getAllBorders()->setBorderStyle('thin');
        $this->event->sheet->getDelegate()->getStyle($cellRange)->getBorders()
            ->getAllBorders()->getColor()->setARGB('FFFFFF');
    }
}
