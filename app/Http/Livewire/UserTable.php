<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;

class UserTable extends DataTableComponent
{
    protected $model = User::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setHideBulkActionsWhenEmptyEnabled();
    }

    public function columns(): array
    {
        return [
            Column::make("Role", "role")
                ->sortable()
                ->excludeFromColumnSelect(),
            Column::make("Name", "name")
                ->sortable()
                ->searchable()
                ->excludeFromColumnSelect(),
            Column::make("Email", "email")
                ->sortable()
                ->searchable(),
            Column::make("Phone number", "phone_number")
                ->sortable()
                ->searchable(),
            BooleanColumn::make("Status", "status")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }
    
    public function builder(): Builder
    {
        return User::query()->where('role', 'Client');
    }
    
    public function bulkActions(): array
    {
        return [
            'active' => 'Activate',
            'inactive' => 'Deactivate'
        ];
    }
    /*
    public function active() {
        return true;
    }
    
    public function inactive() {
        return true;
    }*/
}
