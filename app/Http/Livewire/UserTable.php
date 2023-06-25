<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\HtmlString;

class UserTable extends DataTableComponent
{
    use AuthorizesRequests;
    
    protected $model = User::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');

        if (Gate::allows('Eliminar.Datatable.Usuario')) {
            
            $this->setBulkActions([
                'deleteUser' => 'Eliminar',
            ]);

        }
        
    }

    public function columns(): array
    {
        $columns = [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Nombre/s", "name")
                ->sortable()
                ->searchable(),
            Column::make("Apellido/s", "lastname")
                ->sortable()
                ->searchable(),
            Column::make("Email", "email")
                ->sortable()
                ->searchable()
                ->format(function ($value) {
                    return $this->formatIcon($value);
                })->collapseOnTablet(),
            Column::make("Número matrícula", "matricula")
                ->sortable()
                ->searchable()
                ->format(function ($value) {
                    return $this->formatIcon($value);
                })->collapseOnTablet()            
        ];

        if (Gate::allows('admin.users.edit')) {
            $columns[] = LinkColumn::make('Acciones')
            ->title(fn() => 'Editar')
            ->location(fn($row) => route('admin.users.edit', ['user' => $row->id]))
            ->attributes(fn() => [
                'class' => 'bg-blue-500 dark:bg-gray-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded',
                'style' => !Gate::allows('admin.users.edit') ? 'display:none' : ''
            ]);
        }

        return $columns;
    }

    public function deleteUser()
    {
        if($this->getSelected()) {
            User::whereIn('id', $this->getSelected())->delete();
            $this->emit('delete', 'Usuario eliminado correctamente');
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
