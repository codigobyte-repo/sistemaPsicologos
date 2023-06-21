<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use App\Models\User;

class UserTable extends DataTableComponent
{
    protected $model = User::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setBulkActions([
            'deleteUser' => 'Eliminar',
        ]);
    }

    public function columns(): array
    {
        return [
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
                ->collapseOnTablet(),
            Column::make("Número matrícula", "matricula")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            LinkColumn::make('Acciones')
                ->title(fn() => 'Editar')
                ->location(fn($row) => route('admin.users.edit', ['user' => $row->id]))
                ->attributes(fn() => [
                    'class' => 'bg-blue-500 dark:bg-gray-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded'
                ])
        ];
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
}
