<?php

namespace App\Decorator;

class GaGoalTableDecorator extends AbstractDecorator
{
    const FIRST_CONTENT_LINE = 2;

    public function decorate()
    {
        $this->decorateRows();
        $i = self::FIRST_CONTENT_LINE;

        while($i <= $this->rows+1) {
            $cellRange = sprintf('A%s:F%s', $i, $i);
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

            $cellRange = sprintf('F%s:F%s', $i, $i);
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
    }
}
