<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Border;



class ReleaseExport implements WithColumnWidths, FromCollection, WithEvents
{
    protected $columnWidth = [];//Set column width key: column value: width
    protected $rowHeight = [];//Set the row height key: row value: height
    protected $mergeCells = [];//Merge cells value:A1:K8
    protected $font = [];//Set the font key: A1:K8 value:Arial
    protected $fontSize = [];//Set the font size key: A1:K8 value:11
    protected $bold = [];//Set bold key: A1:K8 value:true
    protected $background = [];//Set the background color key: A1:K8 value:#F0F0F0F
    protected $vertical = [];//Set positioning key: A1:K8 value:center
    protected $sheetName;//sheet title
    public function __construct($releases)
    {
        $this->release = $releases;
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
               //Set the area cell to be vertically centered
                $event->sheet->getDelegate()->getStyle('A1:BH9')->getAlignment()->setVertical('center');
               //Set the horizontal center of the area cell
                $event->sheet->getDelegate()->getStyle('A1:BH9')->getAlignment()->setHorizontal('center');
                $event->sheet->getDelegate()->getStyle('A1:BH9')->getAlignment()->setWrapText(true);
               //Set the column width
                // foreach ($this->columnWidth as $column => $width) {
                //     $event->sheet->getDelegate()
                //         ->getColumnDimension($column)
                //         ->setWidth($width);
                // }
               //Set the row height, $i is the number of data rows
                foreach ($this->rowHeight as $row => $height) {
                    $event->sheet->getDelegate()
                        ->getRowDimension($row)
                        ->setRowHeight($height);
                }

               //Set the area cell to be vertically centered
                // foreach ($this->vertical as $region => $position) {
                //     $event->sheet->getDelegate()
                //         ->getStyle($region)
                //         ->getAlignment()
                //         ->setVertical($position);
                // }

               //Set the area cell font
                foreach ($this->font as $region => $value) {
                    $event->sheet->getDelegate()
                        ->getStyle($region)
                        ->getFont()->setName($value);
                }
               //Set the area cell font size
                foreach ($this->fontSize as $region => $value) {
                    $event->sheet->getDelegate()
                        ->getStyle($region)
                        ->getFont()
                        ->setSize($value);
                }

               //Set the area cell font bold
                foreach ($this->bold as $region => $bool) {
                    $event->sheet->getDelegate()
                        ->getStyle($region)
                        ->getFont()
                        ->setBold($bool);
                }


               //Set the background color of the area cell
                foreach ($this->background as $region => $item) {
                    $event->sheet->getDelegate()->getStyle($region)->applyFromArray([
                        'fill' => [
                            'fillType' =>'linear',//Linear fill, similar to gradient
                            'startColor' => [
                                'rgb' => $item//Initial color
                            ],
                           //The end color, if you need a single background color, please keep it consistent with the initial color
                            'endColor' => [
                                'argb' => $item
                            ]
                        ]
                    ]);
                }
               //Set the border color
                // foreach ($this->borders as $region => $item) {
                //     $event->sheet->getDelegate()->getStyle($region)->applyFromArray([
                //         'borders' => [
                //             'allBorders' => [
                //                 'borderStyle' =>Border::BORDER_THIN,
                //                 'color' => ['argb' => $item],
                //             ],
                //         ],
                //     ]);
                // }
               //Merge Cells
                $event->sheet->getDelegate()->setMergeCells($this->mergeCells);
                if(!empty($this->sheetName)){
                    $event->sheet->getDelegate()->setTitle($this->sheetName);
                }
            }
        ];
    }

    public function setColumnWidth (array $columnwidth)
    {
        $this->columnWidth = array_change_key_case($columnwidth, CASE_UPPER);
    }

   /**
     * @return array
     * [
     * 1 => 40,
     * 2 => 60
     *]
     */
    public function setRowHeight (array $rowHeight)
    {
        $this->rowHeight = $rowHeight;
    }

   /**
     * @return array
     * [
     * A1:K7 =>'Song Ti'
     *]
     */
    public function setFont (array $font)
    {
        $this->font = array_change_key_case($font, CASE_UPPER);
    }

   /**
     * @return array
     * @2020/3/22 10:33
     * [
     * A1:K7 => true
     *]
     */
    public function setBold (array $bold)
    {
        $this->bold = array_change_key_case($bold, CASE_UPPER);
    }

   /**
     * @return array
     * @2020/3/22 10:33
     * [
     * A1:K7 => F0FF0F
     *]
     */
    public function setBackground (array $background)
    {
        $this->background = array_change_key_case($background, CASE_UPPER);
    }
   /**
     * @return array
     * [
     * A1:K7
     *]
     */
    public function setMergeCells (array $mergeCells)
    {
        $this->mergeCells = array_change_key_case($mergeCells, CASE_UPPER);
    }
   /**
     * @return array
     * [
     * A1:K7 => 14
     *]
     */
    public function setFontSize (array $fontSize)
    {
        $this->fontSize = array_change_key_case($fontSize, CASE_UPPER);
    }
   /**
     * @return array
     * [
     * A1:K7 => #000000
     *]
     */
    public function setBorders (array $borders)
    {
        $this->borders = array_change_key_case($borders, CASE_UPPER);
    }

    public function columnWidths(): array
    {
        return [
          'A' => 60,
          'B' => 60,
          'C' => 60,
          'D' => 60,
          'E' => 60,
          'F' => 60,
          'G' => 60,
          'H' => 60,
          'I' => 60,
          'J' => 60,
          'K' => 60,
          'L' => 60,
          'M' => 60,
          'N' => 60,
          'O' => 60,
          'P' => 60,
          'Q' => 60,
          'R' => 60,
          'S' => 60,
          'T' => 60,
          'U' => 60,
          'V' => 60,
          'W' => 60,
          'X' => 60,
          'Y' => 60,
          'Z' => 60,
          'AA' => 60,
          'AB' => 60,
          'AC' => 60,
          'AD' => 60,
          'AE' => 60,
          'AF' => 60,
          'AG' => 60,
          'AH' => 60,
          'AI' => 100,
          'AJ' => 100,
          'AK' => 60,
          'AL' => 60,
          'AM' => 60,
          'AN' => 60,
          'AO' => 60,
          'AP' => 60,
          'AQ' => 60,
          'AR' => 60,
          'AS' => 60,
          'AT' => 60,
          'AU' => 60,
          'AV' => 60,
          'AW' => 60,
          'AX' => 60,
          'AY' => 60,
          'AZ' => 60,
          'BA' => 60,
          'BB' => 100,
          'BC' => 60,
          'BD' => 60,
          'BE' => 60,
          'BF' => 60,
          'BG' => 60,
          'BH' => 60,
          'BI' => 60,
          'BJ' => 60,
          'BK' => 60,
          'BL' => 60,
        ];
    }

    public function collection(){
      return $this->release;
    }
}
