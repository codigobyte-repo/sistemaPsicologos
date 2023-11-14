<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Models\DatosDePago;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\HtmlString;
use Carbon\Carbon;


class DatosDePagoTable extends DataTableComponent
{
    protected $model = DatosDePago::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
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
                ->attributes(fn() => [
                    'class' => 'bg-blue-500 dark:bg-gray-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded'
                ])->collapseOnTablet(),
        ];
    }

    public function builder(): Builder
    {
        return DatosDePago::query()
                ->with('user', 'images');
    }

    /* Función personalizada que sirve para poner un icono en los espacios vacíos */
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
}
