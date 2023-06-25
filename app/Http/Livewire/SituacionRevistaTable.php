<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\SituacionRevista;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

class SituacionRevistaTable extends DataTableComponent
{
    use AuthorizesRequests;
    
    protected $model = SituacionRevista::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');

        if (Gate::allows('Eliminar.Datatable.Revista')) {

            $this->setBulkActions([
                'deleteSituacion' => 'Eliminar',
            ]);

        }
    }

    public function columns(): array
    {
        $columns = [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Nombre", "nombre")
                ->sortable()
                ->searchable(),
            Column::make("Fecha de creación", "created_at")
                ->sortable()
                ->format(function ($value) {
                    $date = Carbon::parse($value);
                    return $date->format('d/m/Y');
                })->collapseOnTablet()
        ];

        if (Gate::allows('admin.revistas.edit')) {
            $columns[] = LinkColumn::make('Acciones')
                ->title(fn() => 'Editar')
                ->location(fn($row) => route('admin.revistas.edit', ['revista' => $row->id]))
                ->attributes(fn() => [
                    'class' => 'bg-blue-500 dark:bg-gray-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded'
                ]);
        }

        return $columns;
    }

    public function deleteSituacion()
    {
        if($this->getSelected()) {
            SituacionRevista::whereIn('id', $this->getSelected())->delete();
            $this->emit('delete', 'Situación revista eliminada correctamente');
            $this->clearSelected();
        }else{
            $this->emit('error', 'No hay registros seleccionados');
        }
    }
}
