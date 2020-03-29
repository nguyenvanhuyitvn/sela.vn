<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->delete();
        DB::table('products')->insert([
            ['id'=>1,'product_code'=>'SP01','name'=>'Sản phẩm 1','price'=>500000,'featured'=>1,'state'=>1,'images'=>'no-img.jpg','category_id'=>2],
            ['id'=>2,'product_code'=>'SP02','name'=>' Sản phẩm 2','price'=>500000,'featured'=>1,'state'=>0,'images'=>'no-img.jpg','category_id'=>2],
            ['id'=>3,'product_code'=>'SP03','name'=>'Sản phẩm 3','price'=>500000,'featured'=>0,'state'=>1,'images'=>'no-img.jpg','category_id'=>3],
            ['id'=>4,'product_code'=>'SP04','name'=>'Sản phẩm 4','price'=>500000,'featured'=>1,'state'=>1,'images'=>'no-img.jpg','category_id'=>6],
            ['id'=>5,'product_code'=>'SP05','name'=>'Sản phẩm 5','price'=>500000,'featured'=>1,'state'=>1,'images'=>'no-img.jpg','category_id'=>7],
        ]);
    }
}
