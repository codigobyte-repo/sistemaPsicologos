<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\SituacionRevistaMotivo;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

class SituacionRevistaMotivoTable extends DataTableComponent
{
    use AuthorizesRequests;
    
    protected $model = SituacionRevistaMotivo::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');

        if (Gate::allows('Eliminar.Datatable.Revista-Motivos')) {
            $this->setBulkActions([
                'deleteMotivo' => 'Eliminar',
            ]);
        }
    }

    public function columns(): array
    {
        return [
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
                })->collapseOnTablet(),
               
            LinkColumn::make('Acciones')
                ->title(fn() => 'Editar')
                ->location(fn($row) => route('admin.revistas-motivos.edit', ['motivo' => $row->id]))
                ->attributes(fn() => [
                    'class' => 'bg-blue-500 dark:bg-gray-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded',
                    'style' => !Gate::allows('admin.revistas-motivos.edit') ? 'display:none' : ''
                ])
        ];
    }

    public function deleteMotivo()
    {
        if($this->getSelected()) {
            SituacionRevistaMotivo::whereIn('id', $this->getSelected())->delete();
            $this->emit('delete', 'Situación revista motivos eliminada correctamente');
            $this->clearSelected();
        }else{
            $this->emit('error', 'No hay registros seleccionados');
        }
    }
}
