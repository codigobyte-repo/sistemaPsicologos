<?php

namespace App\Http\Livewire;

use App\Exports\DatosDePagoExport;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Models\DatosDePago;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\HtmlString;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateFilter;


class DatosDePagoTable extends DataTableComponent
{
    protected $model = DatosDePago::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');

        $this->setBulkActions([
            /* 'deleteSelected' => 'Eliminar', */
            'exportSelected' => 'Exportar'
        ]);
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Nombre", "user.name")
                ->sortable()
                ->searchable(),
            Column::make("Apellido", "user.lastname")
                ->sortable()
                ->searchable(),
            Column::make("Matrícula", "user.matricula")
                ->sortable()
                ->searchable(),
            Column::make("Email", "user.email")
                ->sortable()
                ->searchable(),
            Column::make("Estado", "estado")
                ->sortable()
                ->format(function ($value) {
                    if ($value === 'pendiente') {
                        $html = '<span style="background-color: #4C51BF;" class="px-2 py-1 rounded-md text-white">Pendiente</span>';
                        return new HtmlString($html);
                    };
                    if ($value === 'aprobado') {
                        $html = '<span style="background-color: #34D399;" class="px-2 py-1 rounded-md text-white">Aprobado</span>';
                        return new HtmlString($html);
                    };
                    if ($value === 'rechazado') {
                        $html = '<span style="background-color: #EF4444;" class="px-2 py-1 rounded-md text-white">Rechazado</span>';
                        return new HtmlString($html);
                    };
                    if ($value === 'en_proceso') {
                        $html = '<span style="background-color: #000000;" class="px-2 py-1 rounded-md text-white">En proceso</span>';
                        return new HtmlString($html);
                    };
                })->collapseOnTablet()
                ->searchable(),
            Column::make("Importe de Matrícula", "matricula")
                ->sortable()
                ->format(function ($value) {
                    return $this->formatIcon($value);
                })->collapseOnTablet(),
            Column::make("Matricula anterior", "matricula_anterior")
                ->sortable()
                ->format(function ($value) {
                    return $this->formatIcon($value);
                })->collapseOnTablet(),
            Column::make("Multa", "multa")
                ->sortable()
                ->format(function ($value) {
                    return $this->formatIcon($value);
                })->collapseOnTablet(),
            Column::make("Multa por suspension", "multa_por_suspension")
                ->sortable()
                ->format(function ($value) {
                    return $this->formatIcon($value);
                })->collapseOnTablet(),
            Column::make("Habilitaciones", "habilitaciones")
                ->sortable()
                ->format(function ($value) {
                    return $this->formatIcon($value);
                })->collapseOnTablet(),
            Column::make("Ioma", "ioma")
                ->sortable()
                ->format(function ($value) {
                    return $this->formatIcon($value);
                })->collapseOnTablet(),
            Column::make("Supervisiones", "supervisiones")
                ->sortable()
                ->format(function ($value) {
                    return $this->formatIcon($value);
                })->collapseOnTablet(),
            Column::make("Cursos", "cursos")
                ->sortable()
                ->format(function ($value) {
                    return $this->formatIcon($value);
                })->collapseOnTablet(),
            Column::make("Carpeta especialidad", "carpeta_especialidad")
                ->sortable()
                ->format(function ($value) {
                    return $this->formatIcon($value);
                })->collapseOnTablet(),
            Column::make("Escuelas", "escuelas")
                ->sortable()
                ->format(function ($value) {
                    return $this->formatIcon($value);
                })->collapseOnTablet(),
            Column::make("Pago cuentas", "pago_cuentas")
                ->sortable()
                ->format(function ($value) {
                    return $this->formatIcon($value);
                })->collapseOnTablet(),
            Column::make("Otros pagos", "otros_pagos")
                ->sortable()
                ->format(function ($value) {
                    return $this->formatIcon($value);
                })->collapseOnTablet(),
            Column::make("Importe total", "importe_total")
                ->sortable()
                ->format(function ($value) {
                    return $this->formatIcon($value);
                })->collapseOnTablet(),
            Column::make("Pago enviado", "pago_enviado")
                ->sortable()
                ->format(function ($value) {
                    return $this->formatIcon($value);
                })->collapseOnTablet(),
            Column::make("Saldo a favor", "saldo_a_favor")
                ->sortable()
                ->format(function ($value) {
                    if ($value === null or $value === '') {
                        return $this->formatIcon($value);
                    }else{
                        $html = '<span style="color: green;">' . $value . '</span>';
                        return new HtmlString($html);
                    }
                })
                ->collapseOnTablet(),
            Column::make("Adeuda", "saldo_negativo")
                ->sortable()
                ->format(function ($value) {
                    if ($value === null or $value === '') {
                        return $this->formatIcon($value);
                    }else{
                        $html = '<span style="color: red;">' . $value . '</span>';
                        return new HtmlString($html);
                    }
                })->collapseOnTablet(),
            Column::make("Fecha anunciada", "created_at")
                ->sortable()
                ->format(function ($value) {
                    $date = Carbon::parse($value);
                    return $date->format('d/m/Y');
                })->collapseOnTablet()
                ->searchable(),
            LinkColumn::make('Acciones')
                ->title(fn() => 'Ver detalle')
                ->location(fn($row) => route('admin.control-pagos.edit', ['pago' => $row->id]))
                ->attributes(function ($row) {
                    $estado = $row->estado;
                    $color = '';
            
                    if ($estado === 'pendiente') {
                        $color = '#4C51BF';
                    } elseif ($estado === 'aprobado') {
                        $color = '#34D399';
                    } elseif ($estado === 'rechazado') {
                        $color = '#EF4444';
                    } elseif ($estado === 'en_proceso') {
                        $color = '#000000';
                    }
            
                    return [
                        'class' => 'bg-blue-500 dark:bg-gray-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded',
                        'style' => "background-color: $color;",
                    ];
                })
                ->collapseOnTablet()
        ];
    }

    public function builder(): Builder
    {
        return DatosDePago::query()
                ->with('user', 'images')->latest();
    }

    /* Función personalizada que sirve para poner un icono en los espacios vacíos */
    public function formatIcon($value)
    {
        /* Si el valor es nulo le pone le icono de X vacio. Sino al número le pone le formato de $ y con miles y decimales */
        if ($value === null or $value === '') {
            $icon = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>';
            $html = '<span class="text-red-600 flex items-center justify-center h-6 w-6">' . $icon . '</span>';
            return new HtmlString($html);
        }else{
            return '$ ' . number_format($value, 2, ',', '.');
        }
    }

    /* public function deleteSelected()
    {
        if($this->getSelected()) {
            DatosDePago::whereIn('id', $this->getSelected())->delete();
            $this->emit('delete', 'Registro de pago eliminado correctamente');
            $this->clearSelected();
        }else{
            $this->emit('error', 'No hay registros seleccionados');
        }   
    } */

    public function exportSelected()
    {
        if($this->getSelected()){
			
            /* Limpia las selecciones */
            /* $this->clearSelected(); */

			//Buscamos los matriculados en la db
            $datosPago = DatosDePago::whereIn('id', $this->getSelected())->get();
            $balancePorEstado = DatosDePago::getBalancePorEstado();

			//Usamos la funcionalidad de laravel excel
            return Excel::download(new DatosDePagoExport($datosPago, $balancePorEstado), 'DatosDePago.xlsx');

        }else{
            //exportamos lo que se esté viendo
            $balancePorEstado = DatosDePago::getBalancePorEstado();
            return Excel::download(new DatosDePagoExport($this->getRows(), $balancePorEstado), 'DatosDePago.xlsx');
        }   
    }

    public function filters(): array
    {
        return [
            SelectFilter::make('Estado')
                ->options([
                    '' => 'Todos',
                    'RECHAZADO' => 'RECHAZADO',
                    'APROBADO' => 'APROBADO',
                    'EN_PROCESO' => 'EN PROCESO'
                ])
                ->filter(function ($query, $value) {
                    if ($value != '') {
                        $query->where('estado', $value);
                    }
                }),
            DateFilter::make('Fecha desde:')
                ->filter(function ($query, $value) {
                    $query->whereDate('datos_de_pagos.created_at', '>=', $value);
                }),
            
            DateFilter::make('Fecha hasta:')
                ->filter(function ($query, $value) {
                    $query->whereDate('datos_de_pagos.created_at', '<=', $value);
                }),
        ];
    }
}
