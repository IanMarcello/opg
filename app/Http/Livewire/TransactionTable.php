<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Transaction;

class TransactionTable extends DataTableComponent
{
    protected $model = Transaction::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Third party id", "third_party_id")
                ->sortable(),
            Column::make("Amount", "amount")
                ->sortable(),
            Column::make("Currency", "currency")
                ->sortable(),
            Column::make("Status", "status")
                ->sortable(),
            Column::make("Remark", "remark")
                ->sortable(),
            Column::make("Order id", "order_id")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }
}
