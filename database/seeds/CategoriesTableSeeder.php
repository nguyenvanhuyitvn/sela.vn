<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();
        DB::table('categories')->insert([
            ['id'=>1,'name'=>'Merck','parent'=>0],
            ['id'=>2,'name'=>'Merck 1','parent'=>1],
            ['id'=>3,'name'=>'Merck 2','parent'=>1],
            ['id'=>4,'name'=>'Merck 1.1','parent'=>2],
            ['id'=>5,'name'=>'SCHOTT-DURAN','parent'=>0],
            ['id'=>6,'name'=>'Schott-duran-1','parent'=>5],
            ['id'=>7,'name'=>'Schott-duran-2','parent'=>5]
        ]);
    }
}
