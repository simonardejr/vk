<?php

namespace DesafioVk\Vk\Support;

use \PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use \PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use DesafioVk\Vk\Support\Importer;

class XlsParser extends Importer
{
    public $file;
    public $phpoffice;
    public $xls;
    public $header;

    public function load($file)
    {
        $xlsParser = new static;

        $xlsParser->xlsFields = $xlsParser->xlsFields();
        $xlsParser->phpoffice = new Xlsx;
        $xlsParser->xls = $xlsParser->phpoffice->load($file)->getActiveSheet();
        

        return $xlsParser;
    }

    public function convertToArray()
    {
        // https://phpspreadsheet.readthedocs.io/en/latest/topics/accessing-cells/#looping-through-cells-using-indexes
        $highestRow = $this->xls->getHighestRow();
        $highestColumn = $this->xls->getHighestColumn();
        $highestColumnIndex = Coordinate::columnIndexFromString($highestColumn);

        for($i = 1; $i <= $highestRow; $i++) {
            for($col = 1; $col <= $highestColumnIndex; ++$col) {
                $value = $this->xls->getCellByColumnAndRow($col,$i)->getValue();

                if($i == 1) {
                    $this->setHeader($value);
                }
                else {
                    $this->setRow($i, $this->header[($col-1)], $value);
                }
            }
        }

        return $this->rows;
    }

    public function setHeader($value)
    {
        $this->header[] = $this->xlsFields[$value];
    }

    public function setRow($row, $column, $value)
    {
        $this->rows[$row][$column] = $value;
    }
}