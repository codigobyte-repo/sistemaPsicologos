<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Gate;
use App\Models\Area;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

class AreaTable extends DataTableComponent
{
    
    protected $model = Area::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        $columns = [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Localidad", "location.location")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Municipio", "name")
                ->sortable()
                ->searchable(),
            Column::make("Código Postal", "codigopostal")
                ->sortable()
                ->searchable()
                ->collapseOnTablet()
        ];

        if (Gate::allows('admin.areas.edit')) {
            $columns[] = LinkColumn::make('Acciones')
            ->title(fn() => 'Editar')
            ->location(fn($row) => route('admin.areas.edit', ['area' => $row->id]))
            ->attributes(fn() => [
                'class' => 'bg-blue-500 dark:bg-gray-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded',
                'style' => !Gate::allows('admin.areas.edit') ? 'display:none' : ''
            ]);
        }

        return $columns;
    }

    public function builder(): Builder
    {
        return Area::query()
            ->with('location');
    }

}
