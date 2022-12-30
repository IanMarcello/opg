<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Order;

class OrderTable extends DataTableComponent
{
    protected $model = Order::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Pay number", "pay_number")
                ->sortable(),
            Column::make("Buyer", "buyer")
                ->sortable(),
            Column::make("Third party id", "third_party_id")
                ->sortable(),
            Column::make("Total amount", "total_amount")
                ->sortable(),
            Column::make("Currency", "currency")
                ->sortable(),
            Column::make("Status", "status")
                ->sortable(),
            Column::make("Remark", "remark")
                ->sortable(),
            Column::make("Mno", "mno")
                ->sortable(),
            Column::make("Type", "type")
                ->sortable(),
            Column::make("App id", "app_id")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }
}
