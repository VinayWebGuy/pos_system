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
        $productsQuery = Product::select(
            'products.unique_id', 
            'products.name', 
            'category.name as category_name',
            'products.quantity', 
            'products.buying_price', 
            'products.selling_price', 
            'products.discount_type', 
            'products.discount', 
            'products.status'
        )
        ->leftJoin('category', 'products.category', '=', 'category.id');
       
        if ($this->conditions->has('no_stock') && $this->conditions->no_stock == 'true') {
            $productsQuery->where('products.quantity', '=', 0);
        }
        if ($this->conditions->has('without_category') && $this->conditions->without_category == 'true') {
            $productsQuery->whereNull('products.category');
        }
        return $productsQuery->get();
    }
}