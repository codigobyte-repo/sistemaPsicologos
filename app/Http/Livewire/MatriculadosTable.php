<?php

namespace App\Http\Livewire;

use App\Exports\MatriculadoExport;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Matriculado;
use Carbon\Carbon;
use Illuminate\Support\HtmlString;
use Maatwebsite\Excel\Facades\Excel;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

class MatriculadosTable extends DataTableComponent
{
    protected $model = Matriculado::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setPageName('pagina');
        $this->setPerPageAccepted([
            5,
            10,
            15,
            50
        ]);
        $this->setPerPage(10);

        $this->setBulkActions([
            'deleteSelected' => 'Eliminar',
            'exportSelected' => 'Exportar'
        ]);
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable()->collapseOnTablet(),
            Column::make("Fecha matriculacion", "fecha_matriculacion")
                ->sortable()
                ->format(function ($value) {
                    $date = Carbon::parse($value);
                    return $date->format('d/m/Y');
                })->collapseOnTablet(),
            Column::make("Matricula", "matricula")
                ->sortable()
                ->searchable(),
            Column::make("Distrito Matriculación", "distritoMatricula.nombre")
                ->sortable()->collapseOnTablet(),
            Column::make("Distrito revista", "distritoRevista.nombre")
                ->sortable()->collapseOnTablet(),
            
            Column::make("Apellido", "user.lastname")
                ->sortable()
                ->searchable(),
            Column::make("Nombres", "user.name")
                ->sortable()
                ->searchable(),

            Column::make("Genero", "genero")
                ->sortable()
                ->format(function ($value) {
                    switch ($value) {
                        case Matriculado::GENERO_MASCULINO:
                            return 'MASCULINO';
                        case Matriculado::GENERO_FEMENINO:
                            return 'FEMENINO';
                    }
                })->collapseOnTablet(),
            Column::make("Fecha nacimiento", "fecha_nacimiento")
                ->sortable()
                ->format(function ($value) {
                    $date = Carbon::parse($value);
                    return $date->format('d/m/Y');
                })->collapseOnTablet(),
            Column::make("Estado observacion", "estado_observacion")
                ->sortable()
                ->format(function ($value) {
                    switch ($value) {
                        case Matriculado::RECEPCIONADO:
                            return 'RECEPCIONADO';
                        case Matriculado::OTRO:
                            return 'OTRO';
                    }
                })->collapseOnTablet(),
            Column::make("Situacion revista", "situacionRevista.nombre")
                ->sortable()->collapseOnTablet(),
            Column::make("Situacion revista motivo", "situacionRevistaMotivo.nombre")
                ->sortable()->collapseOnTablet(),
            Column::make("Situacion de revista fecha", "situacion_de_revista_fecha")
                ->sortable()
                ->format(function ($value) {
                    if($value === null){
                        $icon = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                 </svg>';
                                 $html = '<span class="text-red-600 flex items-center justify-center h-6 w-6">' . $icon . '</span>';
                                 return new HtmlString($html);

                    }else{
                        $date = Carbon::parse($value);
                        return $date->format('d/m/Y');
                    }
                })->collapseOnTablet(),
            Column::make("Nacionalidad", "nationality.pais")
                ->sortable()->collapseOnTablet(),
            Column::make("Documento tipo", "tipo_documento")
                ->sortable()
                ->format(function ($value) {
                    switch ($value) {
                        case Matriculado::DNI:
                            return 'DNI';
                        case Matriculado::LC:
                            return 'LC';
                        case Matriculado::LE:
                            return 'LE';
                        case Matriculado::CI:
                            return 'CI';
                    }
                })->collapseOnTablet(),
            Column::make("Documento Nro", "documento_nro")
                ->sortable()
                ->collapseOnTablet()
                ->searchable(),
            Column::make("Cuit", "cuit")
                ->sortable()
                ->format(function ($value) {
                    return $this->formatIcon($value);
                })->collapseOnTablet(),
            Column::make("Domicilio particular", "domicilio_particular")
                ->sortable()->collapseOnTablet(),
            Column::make("Domicilio particular codigo postal", "domicilio_particular_codigo_postal")
                ->sortable()
                ->format(function ($value) {
                    return $this->formatIcon($value);
                })->collapseOnTablet(),
            Column::make("Domicilio particular localidad", "domicilio_particular_localidad")
                ->sortable()->collapseOnTablet(),
            Column::make("Domicilio particular municipio", "domicilio_particular_municipio")
                ->sortable()->collapseOnTablet(),
            Column::make("Domicilio particular telefonos", "domicilio_particular_telefonos")
                ->sortable()
                ->format(function ($value) {
                    return $this->formatIcon($value);
                })->collapseOnTablet(),
            Column::make("Domicilio particular telefonos alternativo", "domicilio_particular_telefonos_alternativo")
                ->sortable()
                ->format(function ($value) {
                    return $this->formatIcon($value);
                })->collapseOnTablet(),
            Column::make("Domicilio profesional telefonos alternativo", "domicilio_profesional_telefonos_alternativo")
                ->sortable()
                ->format(function ($value) {
                    return $this->formatIcon($value);
                })->collapseOnTablet(),
            Column::make("Domicilio profesional", "domicilio_profesional")
                ->sortable()
                ->format(function ($value) {
                    return $this->formatIcon($value);
                })->collapseOnTablet(),
            Column::make("Domicilio profesional codigo postal", "domicilio_profesional_codigo_postal")
                ->sortable()
                ->format(function ($value) {
                    return $this->formatIcon($value);
                })->collapseOnTablet(),
            Column::make("Domicilio profesional localidad", "domicilio_profesional_localidad")
                ->sortable()
                ->format(function ($value) {
                    return $this->formatIcon($value);
                })->collapseOnTablet(),
            Column::make("Domicilio profesional municipio", "domicilio_profesional_municipio")
                ->sortable()
                ->format(function ($value) {
                    return $this->formatIcon($value);
                })->collapseOnTablet(),
            Column::make("Domicilio profesional telefonos", "domicilio_profesional_telefonos")
                ->sortable()
                ->format(function ($value) {
                    return $this->formatIcon($value);
                })->collapseOnTablet(),
            Column::make("Email", "user.email")
                ->sortable()
                ->format(function ($value) {
                    return $this->formatIcon($value);
                })->collapseOnTablet(),
            Column::make("Titulo universitario", "tituloUniversitario.nombre")
                ->sortable()
                ->format(function ($value) {
                    return $this->formatIcon($value);
                })->collapseOnTablet(),
            Column::make("Universidad", "university.nombre")
                ->sortable()
                ->format(function ($value) {
                    return $this->formatIcon($value);
                })->collapseOnTablet(),
            Column::make("Fecha expedicion titulo", "fecha_expedicion_titulo")
                ->sortable()
                ->format(function ($value) {
                    $date = Carbon::parse($value);
                    return $date->format('d/m/Y');
                })->collapseOnTablet(),
            Column::make("Fecha ejercicio desde", "fecha_ejercicio_desde")
                ->sortable()
                ->format(function ($value) {
                    $date = Carbon::parse($value);
                    return $date->format('d/m/Y');
                })->collapseOnTablet(),
            Column::make("Fecha terminacion estudios", "fecha_terminacion_estudios")
                ->sortable()
                ->format(function ($value) {
                    $date = Carbon::parse($value);
                    return $date->format('d/m/Y');
                })->collapseOnTablet(),
            Column::make("Actuacion gp cdd", "actuacion_gp_cdd")
                ->sortable()
                ->format(function ($value) {
                    return $this->formatIcon($value);
                })->collapseOnTablet(),
            Column::make("Actuacion gp cs", "actuacion_gp_cs")
                ->sortable()
                ->format(function ($value) {
                    return $this->formatIcon($value);
                })->collapseOnTablet(),
            Column::make("Actuacion gp tdd", "actuacion_gp_tdd")
                ->sortable()
                ->format(function ($value) {
                    return $this->formatIcon($value);
                })->collapseOnTablet(),
            Column::make("Actuacion gp tsd", "actuacion_gp_tsd")
                ->sortable()
                ->format(function ($value) {
                    return $this->formatIcon($value);
                })->collapseOnTablet(),
            Column::make("Registrado tomo", "registrado_tomo")
                ->sortable()
                ->format(function ($value) {
                    return $this->formatIcon($value);
                })->collapseOnTablet(),
            Column::make("Registrado folio", "registrado_folio")
                ->sortable()
                ->format(function ($value) {
                    return $this->formatIcon($value);
                })->collapseOnTablet(),
            Column::make("Categoria", "categoria")
                ->sortable()
                ->format(function ($value) {
                    switch ($value) {
                        case Matriculado::A:
                            return 'A';
                        case Matriculado::B:
                            return 'B';
                        case Matriculado::C:
                            return 'C';
                    }
                })->collapseOnTablet(),
            Column::make("Observaciones", "observaciones")
                ->sortable()
                ->format(function ($value) {
                    return $this->formatIcon($value);
                })->collapseOnTablet(),

                /* FUNCIONALIDAD QUE TIENE SU COMPLEJIDAD ANALIZAR EN DETALLE */
            /* LinkColumn::make('Acciones')
                ->title(fn() => 'Editar')
                ->location(fn($row) => route('admin.matriculados.edit', ['matriculado' => $row->id]))
                ->attributes(fn() => [
                    'class' => 'bg-blue-500 dark:bg-gray-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded'
                ]) */
        ];
    }

    public function builder(): Builder
    {
        return Matriculado::query()
                ->with('user', 'distritoMatricula', 'distritoRevista', 'situacionRevista', 'situacionRevistaMotivo',
            'nationality', 'tituloUniversitario', 'university');
    }

    /* Funcion pérsonalizada que sirve para poner un icono en los espacios vacios */
    public function formatIcon($value)
    {
        if ($value === null or $value === '') {
            $icon = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>';
            $html = '<span class="text-red-600 flex items-center justify-center h-6 w-6">' . $icon . '</span>';
            return new HtmlString($html);
        }

        return $value;
    }

    public function deleteSelected()
    {
        if($this->getSelected()) {
            Matriculado::whereIn('id', $this->getSelected())->delete();
            $this->emit('delete', 'Registro de matriculación eliminado correctamente');
            $this->clearSelected();
        }else{
            $this->emit('error', 'No hay registros seleccionados');
        }
    }

    public function exportSelected()
    {
        if($this->getSelected()){
			
            /* Limpia las selecciones */
            /* $this->clearSelected(); */

			//Buscamos los matriculados en la db
            $matriculados = Matriculado::whereIn('id', $this->getSelected())->get();

			//Usamos la funcionalidad de laravel excel
            return Excel::download(new MatriculadoExport($matriculados), 'Matriculados.xlsx');

        }else{
            //exportamos lo que se esté viendo
            return Excel::download(new MatriculadoExport($this->getRows()), 'Matriculados.xlsx');
        }   
    }

    public function filters(): array
    {
        return [
            SelectFilter::make('Situación de Revista')
                ->options([
                    '' => 'Todos',
                    '1' => 'VIGENTE',
                    '2' => 'CANCELADO',
                    '3' => 'SUSPENDIDA'
                ])
                ->filter(function ($query, $value) {
                    if ($value != '') {
                        $query->where('situacion_revistas_id', $value);
                    }
                }),
            
            DateFilter::make('Fecha de Matriculación, desde:')
                ->filter(function ($query, $value) {
                    $query->whereDate('fecha_matriculacion', '>=', $value);
                }),

            DateFilter::make('Fecha de Matriculación, hasta:')
                ->filter(function ($query, $value) {
                    $query->whereDate('fecha_matriculacion', '<=', $value);
                }),
        ];
    }
}
