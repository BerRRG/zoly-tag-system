<?php

namespace App\Decorator;

use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class CoverDecorator extends AbstractDecorator
{
    const COVER_LAST_LINE = 19;

    public function decorate()
    {
        $i = 1;

        while ($i <= self::COVER_LAST_LINE) {
            $cellRange = sprintf('A%s:D%s', $i, $i);
            $this->event->sheet->getDelegate()->getStyle($cellRange)->getBorders()
                ->getAllBorders()->setBorderStyle('hair');

            $this->event->sheet->getDelegate()->getStyle($cellRange)->getBorders()
                ->getAllBorders()->getColor()->setARGB('FFFFFF');

            $this->event->sheet->getDelegate()->getStyle($cellRange)->getFill()
                ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                ->getStartColor()->setARGB('FFFFFF');

            $i++;
        }

        $cellRange = 'A20:D20';

        $this->event->sheet->getDelegate()->getStyle($cellRange)->getBorders()
            ->getAllBorders()->setBorderStyle('thin');
        $this->event->sheet->getDelegate()->getStyle($cellRange)->getBorders()
            ->getAllBorders()->getColor()->setARGB('d3d3d3');

        $cellRange = 'E1:E20';

        $this->event->sheet->getDelegate()->getStyle($cellRange)->getBorders()
            ->getAllBorders()->setBorderStyle('thin');
        $this->event->sheet->getDelegate()->getStyle($cellRange)->getBorders()
            ->getAllBorders()->getColor()->setARGB('d3d3d3');

        $cellRange = 'B4:C4';
        $this->event->sheet->getDelegate()->getStyle($cellRange)->getFont()
            ->setName('Poppins');
        $this->event->sheet->getDelegate()->getStyle($cellRange)->getFont()
            ->setSize(16);

        $cellRange = 'B5:C5';
        $this->event->sheet->getDelegate()->getStyle($cellRange)->getFont()
            ->setName('Poppins');
        $this->event->sheet->getDelegate()->getStyle($cellRange)->getFont()
            ->setSize(22);

        $cellRange = 'B8:B9';
        $this->event->sheet->getDelegate()->getStyle($cellRange)->getFont()
            ->setName('Poppins');
        $this->event->sheet->getDelegate()->getStyle($cellRange)->getFont()
            ->setSize(18);

        $cellRange = 'C8:C8';
        $this->event->sheet->getDelegate()->getStyle($cellRange)->getFont()
            ->setName('Poppins');
        $this->event->sheet->getDelegate()->getStyle($cellRange)->getFont()
            ->setSize(12);

        $cellRange = 'C9:C9';
        $this->event->sheet->getDelegate()->getStyle($cellRange)->getFont()
            ->setName('Poppins');
        $this->event->sheet->getDelegate()->getStyle($cellRange)->getFont()
            ->setSize(24);

        $cellRange = 'B12:B13';
        $this->event->sheet->getDelegate()->getStyle($cellRange)->getFont()
            ->setName('Poppins');
        $this->event->sheet->getDelegate()->getStyle($cellRange)->getFont()
            ->setSize(14);

        $cellRange = 'B14:B19';
        $this->event->sheet->getDelegate()->getStyle($cellRange)->getFont()
            ->setName('Poppins');
        $this->event->sheet->getDelegate()->getStyle($cellRange)->getFont()
            ->setSize(12);

        $columnDimension = $this->event->sheet->getDelegate()->getColumnDimensions('A');
        $columnDimension['A']->setWidth(50);
        $columnDimension['A']->setAutoSize(false);

        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('Logo');
        $drawing->setPath(public_path('logo.png'));
        $drawing->setHeight(300);
        $drawing->setWidth(300);
        $drawing->setCoordinates('A3');

        $drawing->setWorksheet($this->event->sheet->getDelegate());
    }
}
