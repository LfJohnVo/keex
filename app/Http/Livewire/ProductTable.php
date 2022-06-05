<?php

/*namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Link;
use App\Models\Product;

class ProductTable extends DataTableComponent
{

    public function columns(): array
    {
        return [
            Column::make('Estado', 'subcategory.name')
                ->sortable()
                ->searchable(),
            Column::make('Nombre', 'name')
                ->sortable()
                ->searchable(),
            Column::make('Precio', 'price')
                ->sortable()
                ->searchable(),
            Column::make('Estado', 'status')
                ->sortable()
                ->searchable()
                ->addClass('px-2 py-1 font-semibold leading-tight text-orange-700 bg-gray-100 rounded-sm'),
            Column::make('Actions')
                ->format(function ($value, $column, $row) {
                    return view('admin.prueba');
                }),
        ];
    }

    public function query(): Builder
    {
        return Product::with('subcategory');
    }
}
*/
