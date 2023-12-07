<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Http\Request;

class ProductExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $conditions;

    public function __construct(Request $request)
    {
        $this->conditions = $request;
    }

    public function headings():array{
        return[
            'id',
            'unique_id',
            'name',
            'category',
            'quantity',
            'buying_price',
            'selling_price',
            'discount_type',
            'discount',
            'status',
        ];
    } 
    public function collection()
    {
        $productsQuery = Product::select('id', 'unique_id', 'name', 'category', 'quantity', 'buying_price', 'selling_price', 'discount_type', 'discount', 'status');
        if ($this->conditions->has('no_stock') && $this->conditions->no_stock == 'true') {
            $productsQuery->where('quantity', '=', 0);
        }
        if ($this->conditions->has('without_category') && $this->conditions->without_category == 'true') {
            $productsQuery->whereNull('category');
        }
        return $productsQuery->get();
    }
}
