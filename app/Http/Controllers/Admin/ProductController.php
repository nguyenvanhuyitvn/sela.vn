<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Product;
use App\models\Attribute;
use App\models\Category;
use App\Repositories\ProductRepository;

class ProductController extends Controller
{
    protected $model;
    public function __construct(Product $product)
    {
        // set the model
        $this->model = new ProductRepository($product);
    }

    public function index(){
        $products = $this->model->all();
        return view('admin.layouts.products.list', compact('products'));
    }
    public function create(){
        $category = Category::all();
        $pro = Attribute::all();
        return view('admin.layouts.products.add', compact('pro','category'));
    }
}
