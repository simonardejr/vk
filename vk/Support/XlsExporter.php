<?php

namespace DesafioVk\Vk\Support;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use DesafioVk\Vk\Support\Importer;

class XlsExporter
{
    public $path;
    public $dados;
    public $spreadsheet;

    public function __construct()
    {
        $this->path = __DIR__ . '/../../public/downloads';
        $this->spreadsheet = new Spreadsheet();
        $this->setXlsInfo();
        $this->worksheet = $this->spreadsheet->getActiveSheet();
    }

    public function setXlsInfo()
    {
        $this->spreadsheet->getProperties()
            ->setCreator('Simonarde Lima - DesafioVK')
            ->setTitle('ANOREG')
            ->setSubject('Lista de cartórios cadastrados no sistema')
            ->setDescription('Lista de cartórios cadastrados no sistema');
    }

    public static function config($dados)
    {
        $xlsExporter = new static;
        $xlsExporter->dados = $dados;

        return $xlsExporter;
    }

    public function export($dados)
    {
        $this->worksheet->fromArray($this->getHeaders($dados), NULL, 'A1');

        foreach($dados as $index=>$row) {
            $this->worksheet->fromArray(
                $this->prepareFields((array) $row), NULL, 'A' . ($index+2)
            );
        }

        foreach(range('A', $this->worksheet->getHighestColumn()) as $columnID) {
            $this->worksheet->getColumnDimension($columnID)->setAutoSize(true);
        }

        $this->worksheet->getStyle('A1:' . $this->worksheet->getHighestColumn() . '1')
            ->applyFromArray($this->setHeaderStyle());

        $xlsx = new Xlsx($this->spreadsheet);
        $xlsx->save($this->path . '/Lista_Cartórios.xlsx');

        return file_exists($this->path . '/Lista_Cartórios.xlsx');
    }

    public function setHeaderStyle()
    {
        $style = [
            'font' => [
                'bold' => true,
            ],
            'alignment' => [
                // 'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::HORIZONTAL_CENTER,
            ],
            'fill' => [
                'type' => Fill::FILL_GRADIENT_LINEAR,
                'rotation' => 90,
                'startcolor' => ['rgb' => '0d0d0d'],
                'endColor' => ['rgb' => 'f2f2f2'],
            ],
        ];

        return $style;
    }

    public function getHeaders()
    {
        $importer = new Importer;

        return  array_keys(
                    array_filter($importer->xlsFields(), function($i) {
                        return ($i != 'tipo_documento');
                    })
                );
    }

    function prepareFields($row) {
        $skip = ['id', 'tipo_documento'];
        $values =[];
        foreach($row as $key=>$info) {
            if( ! in_array($key, $skip) ) {
                if ( $key == 'ativo' ) {
                    $values[] = $this->adjustValueFromAtivo($info);
                } 
                else {
                    $values[] = $info;
                }
            }
        }

        return $values;
    }

    public function adjustValueFromAtivo($value)
    {
        return ($value == '1' ? 'SIM' : 'NÃO');
    }
}