<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();
        $categories=[
            [
                'name'=>'Category A',
            ],
            [
                'name'=>'Category B',
            ],
            [
                'name'=>'Sub A1',
                'category_id'=>1
            ],
            [
                'name'=>'Sub A2',
                'category_id'=>1
            ],
            [
                'name'=>'Sub B1',
                'category_id'=>2
            ],
            [
                'name'=>'Sub B2',
                'category_id'=>2
            ],
            [
                'name'=>'Sub Sub B2-1',
                'category_id'=>4
            ],
            [
                'name'=>'Sub Sub  B2-2',
                'category_id'=>4
            ]
            ];
            foreach ($categories as $key => $value){
                Category::create($value);
                }
    }
}
