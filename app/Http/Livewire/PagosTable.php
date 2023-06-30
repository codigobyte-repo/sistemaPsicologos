<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Pago;
use Carbon\Carbon;
use Illuminate\Support\HtmlString;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

class PagosTable extends DataTableComponent
{
    protected $model = Pago::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
        ->setTableRowUrl(function($row){
            return route('admin.control-pagos.edit', [
                'pago' => $row->id
            ]);
        });
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
            Column::make("Precio cobrado", "precio")
                ->sortable(),
            Column::make("Fecha de pago efectuado", "created_at")
                ->sortable()
                ->format(function ($value) {
                    $date = Carbon::parse($value);
                    return $date->format('d/m/Y');
                })->collapseOnTablet()
                ->searchable(),
            Column::make("Fecha de vencimiento", "fecha_de_pago")
                ->sortable()
                ->format(function ($value) {
                    $date = Carbon::parse($value);
                    return $date->format('d/m/Y');
                })->collapseOnTablet()
                ->searchable(),                
            Column::make("Estado", "estado")
                ->sortable()
                ->searchable()
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
                })->collapseOnTablet(),
            Column::make("Motivo de rechazo", "motivos")
                ->sortable(),
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
        /* return Pago::query()
                ->with('user'); */
        /* Comenté el código anterior e implemente este para agilizar las consultas es como usar lazy
         solo traemos los datos que necesitamos */
        return Pago::query()
            ->with(['user' => function ($query) {
                $query->select('id', 'name', 'lastname', 'matricula', 'email');
            }]);
    }
}
