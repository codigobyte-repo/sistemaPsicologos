<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Location;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

class LocationTable extends DataTableComponent
{
    use AuthorizesRequests;
    
    protected $model = Location::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');

        if (Gate::allows('Eliminar.Datatable.Localidad')) {
            
            $this->setBulkActions([
                'deleteLocation' => 'Eliminar',
            ]);

        }
        
    }

    public function columns(): array
    {
        $columns = [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Localidad", "location")
                ->sortable()
                ->searchable(),
            Column::make("Codigo31662", "codigo31662")
                ->sortable()
                ->searchable(),
            Column::make("Fecha de creación", "created_at")
                ->sortable()
                ->format(function ($value) {
                    $date = Carbon::parse($value);
                    return $date->format('d/m/Y');
                })->collapseOnTablet()
        ];

        if (Gate::allows('admin.localidades.edit')) {
            $columns[] = LinkColumn::make('Acciones')
            ->title(fn() => 'Editar')
            ->location(fn($row) => route('admin.localidades.edit', ['localidad' => $row->id]))
            ->attributes(fn() => [
                'class' => 'bg-blue-500 dark:bg-gray-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded',
                'style' => !Gate::allows('admin.localidades.edit') ? 'display:none' : ''
            ]);
        }

        return $columns;
    }

    public function deleteLocation()
    {
        if($this->getSelected()) {
            Location::whereIn('id', $this->getSelected())->delete();
            $this->emit('delete', 'Localidad eliminada correctamente');
            $this->clearSelected();
        }else{
            $this->emit('error', 'No hay registros seleccionados');
        }
    }
}
