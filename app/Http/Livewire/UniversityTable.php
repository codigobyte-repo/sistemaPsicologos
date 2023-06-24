<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\University;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\HtmlString;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

class UniversityTable extends DataTableComponent
{
    use AuthorizesRequests;
    
    protected $model = University::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');

        if (Gate::allows('Eliminar.Datatable.Universidad')) {
            
            $this->setBulkActions([
                'deleteUniversity' => 'Eliminar',
            ]);

        }
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable()
                ->collapseOnTablet(),
            Column::make("Nombre", "nombre")
                ->sortable()
                ->searchable(),
            Column::make("Direccion", "direccion")
                ->sortable()
                ->format(function ($value) {
                    return $this->formatIcon($value);
                })->collapseOnTablet(),

            Column::make("Fecha de creación", "created_at")
                ->sortable()
                ->format(function ($value) {
                    $date = Carbon::parse($value);
                    return $date->format('d/m/Y');
                })->collapseOnTablet(),

            LinkColumn::make('Acciones')
                ->title(fn() => 'Editar')
                ->location(fn($row) => route('admin.universidades.edit', ['university' => $row->id]))
                ->attributes(fn() => [
                    'class' => 'bg-blue-500 dark:bg-gray-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded',
                    'style' => !Gate::allows('admin.universidades.edit') ? 'display:none' : ''
                ])
        ];
    }

    public function deleteUniversity()
    {
        if($this->getSelected()) {
            University::whereIn('id', $this->getSelected())->delete();
            $this->emit('delete', 'Universidad eliminada correctamente');
            $this->clearSelected();
        }else{
            $this->emit('error', 'No hay registros seleccionados');
        }
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
    
}
