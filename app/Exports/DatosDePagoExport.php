<?php

namespace App\Exports;

use App\Models\DatosDePago;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Reader\Xml\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class DatosDePagoExport implements FromCollection, WithCustomStartCell, WithMapping, WithHeadings, ShouldAutoSize, WithDrawings, WithStyles, WithEvents
{
    public $datosDePago;
    public $balancePorEstado;
    
    public function __construct($datosDePago, $balancePorEstado)
    {
        $this->datosDePago = $datosDePago;
        $this->balancePorEstado = $balancePorEstado;
    }
    public function collection()
    {
        return $this->datosDePago;
    }

    public function startCell(): string
    {
        return "A10";
    }

    public function headings(): array
    {
        return [
            'NOMBRE',
            'APELLIDO',
            'EMAIL',
            'MATRICULA',
            'MATRICULA ANTERIOR',
            'MULTA',
            'MULTA POR SUSPENSION',
            'HABILITACIONES',
            'IOMA',
            'SUPERVISIONES',
            'CURSOS',
            'CARPETA ESPECIALIDAD',
            'ESCUELAS',
            'PAGO CUENTAS',
            'OTROS PAGOS',
            'IMPORTE TOTAL',
            'PAGO ENVIADO',
            'FECHA',
        ];
    }

    public function map($invoice): array
    {
        $matricula = '$ ' . number_format($invoice->matricula, 2, ',', '.');
        $matricula_anterior = '$ ' . number_format($invoice->matricula_anterior, 2, ',', '.');
        $multa = '$ ' . number_format($invoice->multa, 2, ',', '.');
        $multaSuspension = '$ ' . number_format($invoice->multa_por_suspension, 2, ',', '.');
        $habilitaciones = '$ ' . number_format($invoice->habilitaciones, 2, ',', '.');
        $ioma = '$ ' . number_format($invoice->ioma, 2, ',', '.');
        $supervisiones = '$ ' . number_format($invoice->supervisiones, 2, ',', '.');
        $cursos = '$ ' . number_format($invoice->cursos, 2, ',', '.');
        $carpeta_especialidad = '$ ' . number_format( $invoice->carpeta_especialidad, 2, ',', '.');            
        $escuelas = '$ ' . number_format($invoice->escuelas, 2, ',', '.');
        $pago_cuentas = '$ ' . number_format($invoice->pago_cuentas, 2, ',', '.');
        $otros_pagos = '$ ' . number_format($invoice->otros_pagos, 2, ',', '.');
        $importe_total = '$ ' . number_format($invoice->importe_total, 2, ',', '.');
        $pago_enviado = '$ ' . number_format($invoice->pago_enviado, 2, ',', '.');
        $fechaDePago = $invoice->created_at ? Carbon::parse($invoice->fecha_matriculacion)->format('d/m/Y') : '';
        
        
        return [
            
            $invoice->user->name,
            $invoice->user->lastname,
            $invoice->user->email,
            $matricula,
            $matricula_anterior,
            $multa,
            $multaSuspension,
            $habilitaciones,
            $ioma,
            $supervisiones,
            $cursos,
            $carpeta_especialidad,
            $escuelas,
            $pago_cuentas,
            $otros_pagos,
            $importe_total,
            $pago_enviado,
            $fechaDePago
        ];
    }

    /* Agregamos le logotipo */
    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Sistema Psicología');
        $drawing->setDescription('Balance');
        $drawing->setPath(public_path('assets/images/Balance.png'));
        $drawing->setHeight(120);
        $drawing->setCoordinates('A2');
        return $drawing;
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                // Merge cells for SUMA in E5
                $event->sheet->mergeCells('E5:E5');
                $event->sheet->mergeCells('E6:E6');
                $event->sheet->mergeCells('E7:E7');
                
                // Optionally, you can set the style for the merged cell
                $event->sheet->getStyle('E5')->applyFromArray([
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                    'font' => [
                        'bold' => true,
                    ],
                ]);

                $event->sheet->getStyle('E6')->applyFromArray([
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                    'font' => [
                        'bold' => true,
                    ],
                ]);

                $event->sheet->getStyle('E7')->applyFromArray([
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                    'font' => [
                        'bold' => true,
                    ],
                ]);
                
                // Optionally, you can set the value for the merged cell
                $event->sheet->setCellValue('E5', 'Saldo total "APROBADO": $ ' . number_format($this->balancePorEstado['aprobado'], 2, ',', '.'));
                $event->sheet->setCellValue('E6', 'Saldo total "EN PROCESO": $ ' . number_format($this->balancePorEstado['en_proceso'], 2, ',', '.'));
                $event->sheet->setCellValue('E7', 'Saldo total "RECHAZADO": $ ' . number_format($this->balancePorEstado['rechazado'], 2, ',', '.'));
            },
        ];
    }

    public function styles(Worksheet $sheet)
    {
        /* Cambia el nombre de la hoja */
        $sheet->setTitle('Balance');

        /* Combina y centra estas celdas */
        $sheet->mergeCells('A9:C9');

        /* Se puede agregar formular y valores a las celdas */
        /* ejemplo: */
        /* $sheet->setCellValue('9A', '=SUM(A1, G6)'); */
        $sheet->setCellValue('A9', 'ESTADO DE SITUACIÓN FINANCIERA');

        /* Estilos a rangos de celdas para los matriculados */
        $sheet->getStyle('A10:R10')->applyFromArray([
            /* fuentes */
            'font' => [
                'bold' => true,
                'name' => 'Arial',
                'color' => ['rgb' => 'FFFFFF'],
            ],
            /* alineaciones */
            'alignment' => [
                'horizontal' => 'center'
            ],
            /* colores de fondo de la cabecera*/
            'fill' => [
                'fillType' => 'solid',
                'startColor' => [
                    'argb' => '808080'
                ]
            ]
        ]);

        /* Estilos a bordes de los matriculados */
        /* En la siguiente funcionalidad ('A10:AP' . $sheet->getHighestRow()) le indicamos que vaya hasta el final de la hoja
        como no sabemos cuando termina ya que se pueden ir agregando nuevos datos esta funcion lee hasta el final */
        $sheet->getStyle('A10:R' . $sheet->getHighestRow())->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => 'thin',
                ],
            ],
        ]);

        /* Estilos a rangos de celdas para el titulo */
        $sheet->getStyle('A9:C9')->applyFromArray([
            'font' => [
                'bold' => true,
                'name' => 'Arial',
            ],
            'alignment' => [
                'horizontal' => 'center'
            ]
        ]);

        /* Le indicamos donde queremos que quede el cursor al abrir el excel */
        $sheet->getStyle('A11')->applyFromArray([
            
        ]);
    }   
}
