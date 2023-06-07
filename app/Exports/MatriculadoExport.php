<?php

namespace App\Exports;

use App\Models\Matriculado;
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

class MatriculadoExport implements FromCollection, WithCustomStartCell, WithMapping, WithHeadings, ShouldAutoSize, WithDrawings, WithStyles
{
    public $matriculados;
    public function __construct($matriculados)
    {
        $this->matriculados = $matriculados;
    }

    public function collection()
    {
        return $this->matriculados;
    }

    public function startCell(): string
    {
        return "A10";
    }

    public function headings(): array
    {
        return [
            'FECHA MATRICULACION',
            'MATRICULA',
            'DISTRITO MATRICULACION',
            'DISTRITO REVISTA',
            'APELLIDO',
            'NOMBRES',
            'GENERO',
            'FECHA NACIMIENTO',
            'ESTADO OBSERVACION',
            'SITUACION REVISTA',
            'SITUACION REVISTA MOTIVO',
            'SITUACION DE REVISTA FECHA',
            'NACIONALIDAD',
            'DOCUMENTO TIPO',
            'DOCUMENTO NRO',
            'CUIT',
            'DOMICILIO PARTICULAR',
            'DOMICILIO PARTICULAR CODIGO POSTAL',
            'DOMICILIO PARTICULAR LOCALIDAD',
            'DOMICILIO PARTICULAR MUNICIPIO',
            'DOMICILIO PARTICULAR TELEFONOS',
            'DOMICILIO PARTICULAR TELEFONOS ALTERNATIVO',
            'DOMICILIO PROFESIONAL TELEFONOS ALTERNATIVO',
            'DOMICILIO PROFESIONAL',
            'DOMICILIO PROFESIONAL CODIGO POSTAL',
            'DOMICILIO PROFESIONAL LOCALIDAD',
            'DOMICILIO PROFESIONAL MUNICIPIO',
            'DOMICILIO PROFESIONAL TELEFONOS',
            'EMAIL',
            'TITULO UNIVERSITARIO',
            'UNIVERSIDAD',
            'FECHA EXPEDICION TITULO',
            'FECHA EJERCICIO DESDE',
            'FECHA TERMINACION ESTUDIOS',
            'ACTUACION GP CDD',
            'ACTUACION GP CS',
            'ACTUACION GP TDD',
            'ACTUACION GP TSD',
            'REGISTRADO TOMO',
            'REGISTRADO FOLIO',
            'CATEGORIA',
            'OBSERVACIONES'
        ];
    }

    /* Invoice tiene los valores de collection() por lo tento los Matriculados::all() */
    /* A partir de $invoice transformamos los valores de la respuesta */
    public function map($invoice): array
    {
        $fechaMatriculacion = $invoice->fecha_matriculacion ? Carbon::parse($invoice->fecha_matriculacion)->format('d/m/Y') : '';
        $fechaNacimiento = $invoice->fecha_nacimiento ? Carbon::parse($invoice->fecha_nacimiento)->format('d/m/Y') : '';
        $fechaSituacionRevista = $invoice->situacion_de_revista_fecha ? Carbon::parse($invoice->situacion_de_revista_fecha)->format('d/m/Y') : '';
        $fechaExpedicionTitulo = $invoice->fecha_expedicion_titulo ? Carbon::parse($invoice->fecha_expedicion_titulo)->format('d/m/Y') : '';
        $fechaEjercicioDesde = $invoice->fecha_ejercicio_desde ? Carbon::parse($invoice->fecha_ejercicio_desde)->format('d/m/Y') : '';
        $fechaTerminacionEstudio = $invoice->fecha_terminacion_estudios ? Carbon::parse($invoice->fecha_terminacion_estudios)->format('d/m/Y') : '';
        
        return [
            
            $fechaMatriculacion,
            $invoice->matricula,
            $invoice->distritoMatricula->nombre,
            $invoice->distritoRevista->nombre,
            $invoice->user->lastname,
            $invoice->user->name,
            $invoice->genero == Matriculado::GENERO_MASCULINO ? 'MASCULINO' : 'FEMENINO',
            $fechaNacimiento,
            $invoice->estado_observacion == Matriculado::RECEPCIONADO ? 'RECEPCIONADO' : 'OTRO',
            $invoice->situacionRevista->nombre,
            $invoice->situacionRevistaMotivo->nombre,
            $fechaSituacionRevista,
            $invoice->nationality->pais,

            $invoice->tipo_documento == Matriculado::DNI ? 'DNI' :
            ($invoice->tipo_documento == Matriculado::LE ? 'LE' :
            ($invoice->tipo_documento == Matriculado::LC ? 'LC' :
            ($invoice->tipo_documento == Matriculado::CI ? 'CI' : 'Otro'))),
            
            $invoice->documento_nro,
            $invoice->cuit,
            $invoice->domicilio_particular,
            $invoice->domicilio_particular_codigo_postal,
            $invoice->domicilio_particular_localidad,
            $invoice->domicilio_particular_municipio,
            $invoice->domicilio_particular_telefonos,
            $invoice->domicilio_particular_telefonos_alternativo,
            $invoice->domicilio_profesional_telefonos_alternativo,
            $invoice->domicilio_profesional,
            $invoice->domicilio_profesional_codigo_postal,
            $invoice->domicilio_profesional_localidad,
            $invoice->domicilio_profesional_municipio,
            $invoice->domicilio_profesional_telefonos,
            $invoice->user->email,
            $invoice->tituloUniversitario->nombre,
            $invoice->university->nombre,
            $fechaExpedicionTitulo,
            $fechaEjercicioDesde,
            $fechaTerminacionEstudio,
            $invoice->actuacion_gp_cdd,
            $invoice->actuacion_gp_cs,
            $invoice->actuacion_gp_tdd,
            $invoice->actuacion_gp_tsd,
            $invoice->registrado_tomo,
            $invoice->registrado_folio,
            
            $invoice->categoria == Matriculado::A ? 'A' : 
            ($invoice->categoria == Matriculado::B ? 'B' :
            ($invoice->categoria == Matriculado::C ? 'C' : 'Otro')),

            $invoice->observaciones,

        ];
    }

    /* Agregamos le logotipo */
    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Sistema Psicología');
        $drawing->setDescription('Sistema Psicología');
        $drawing->setPath(public_path('assets/images/CabeceraMatriculadosReporteExcel.png'));
        $drawing->setHeight(120);
        $drawing->setCoordinates('A2');
        return $drawing;
    }

    public function styles(Worksheet $sheet)
    {
        /* Cambia el nombre de la hoja */
        $sheet->setTitle('Matriculados');

        /* Combina y centra estas celdas */
        $sheet->mergeCells('A9:C9');

        /* Se puede agregar formular y valores a las celdas */
        /* ejemplo: */
        /* $sheet->setCellValue('9A', '=SUM(A1, G6)'); */
        $sheet->setCellValue('A9', 'LISTADO DE MATRICULADOS');

        /* Estilos a rangos de celdas para los matriculados */
        $sheet->getStyle('A10:AP10')->applyFromArray([
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
                    'argb' => '9B59B6'
                ]
            ]
        ]);

        /* Estilos a bordes de los matriculados */
        /* En la siguiente funcionalidad ('A10:AP' . $sheet->getHighestRow()) le indicamos que vaya hasta el final de la hoja
        como no sabemos cuando termina ya que se pueden ir agregando nuevos datos esta funcion lee hasta el final */
        $sheet->getStyle('A10:AP' . $sheet->getHighestRow())->applyFromArray([
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
