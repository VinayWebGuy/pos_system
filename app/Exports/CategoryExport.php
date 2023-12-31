<?php

namespace App\Exports;

use App\Models\Category;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CategoryExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings():array{
        return[
            'unique_id',
            'name',
            'status',
        ];
    } 

    public function collection()
    {
        return Category::select('unique_id', 'name', 'status')->get();
    }
}
