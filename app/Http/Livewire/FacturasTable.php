<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use App\Models\Factura;

class FacturasTable extends DataTableComponent
{
    protected $model = Factura::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Nombre matriculado", "user.name")
                ->sortable()
                ->searchable(),
            Column::make("Apellido matriculado", "user.lastname")
                ->sortable()
                ->searchable(),
            Column::make("Matrícula", "matriculado.matricula")
                ->sortable()
                ->searchable(),
            Column::make("Número factura", "numero_factura")
                ->sortable()
                ->searchable(),
            Column::make("Fecha emision", "fecha_emision")
                ->sortable()
                ->searchable(),
            Column::make("Fecha de pago", "pago.fecha_de_pago")
                ->sortable()
                ->searchable(),
            Column::make("Precio", "pago.precio")
                ->sortable(),
            LinkColumn::make('Comprobantes')
                ->title(fn() => 'Ver comprobante')
                ->location(fn($row) => route('admin.generarPdf', ['facturaId' => $row->id]))
                ->attributes(fn() => [
                    'class' => 'bg-blue-500 dark:bg-gray-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded',
                    'target' => '_blank',
                ]),
        ];
    }

    public function builder(): Builder
    {
        return Factura::query()
                ->with('user', 'pago', 'matriculado');
    }
}
