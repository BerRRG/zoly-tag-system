<?php

namespace App\Decorator;

class WebHeaderDecorator extends AbstractDecorator
{
    public function decorate()
    {
        $cellRange = 'A1:Q1';
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

        $cellRange = 'D1:D1';
        $this->event->sheet->getDelegate()->getStyle($cellRange)->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('FF0000');

        $cellRange = 'I1:I1';
        $this->event->sheet->getDelegate()->getStyle($cellRange)->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('FF0000');

        $cellRange = 'Q1:Q1';
        $this->event->sheet->getDelegate()->getStyle($cellRange)->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('1EBEC6');
    }
}
