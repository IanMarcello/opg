<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\App;

class AppTable extends DataTableComponent
{
    protected $model = App::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Name", "name")
                ->sortable(),
            Column::make("Description", "description")
                ->sortable(),
            Column::make("Status", "status")
                ->sortable(),
            Column::make("Disburse account", "disburse_account")
                ->sortable(),
            Column::make("Disburse mno", "disburse_mno")
                ->sortable(),
            Column::make("Disburse bank", "disburse_bank")
                ->sortable(),
            Column::make("User id", "user_id")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }
}
