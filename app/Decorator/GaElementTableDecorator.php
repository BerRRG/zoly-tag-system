<?php

namespace App\Decorator;

class GaElementTableDecorator extends AbstractDecorator
{
    const FIRST_CONTENT_LINE = 2;

    public function decorate()
    {
        $this->decorateRows();
        $i = self::FIRST_CONTENT_LINE;

        while($i <= $this->rows+1) {
            $cellRange = sprintf('A%s:H%s', $i, $i);
            $this->event->sheet->getDelegate()->getStyle($cellRange)->getActiveSheet()
                ->getRowDimension($i)->setRowHeight(35);
            $this->event->sheet->getDelegate()->getStyle($cellRange)->getFont()
                ->setName('Poppins');
            $this->event->sheet->getDelegate()->getStyle($cellRange)->getFont()
                ->setSize(10);
            $this->event->sheet->getDelegate()->getStyle($cellRange)->getAlignment()
                ->setHorizontal('center');
            $this->event->sheet->getDelegate()->getStyle($cellRange)->getAlignment()
                ->setVertical('center');

            $cellRange = sprintf('G%s:G%s', $i, $i);
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

            $i++;
        }

        foreach ($this->sections as $section) {
            $range = $section->order + self::FIRST_CONTENT_LINE;

            $cellRange = sprintf('A%s:H%s', $range, $range);

            $this->event->sheet->getDelegate()->getStyle($cellRange)->getFont()
                ->setBold(true);
            $this->event->sheet->getDelegate()->getStyle($cellRange)->getFont()
                ->setSize(14);
            $this->event->sheet->getDelegate()->getStyle($cellRange)->getFont()
                ->setName('Arial');
            $this->event->sheet->getDelegate()->getStyle($cellRange)->getFill()
                ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                ->getStartColor()->setARGB('d3d3d3');
        }
    }
}
