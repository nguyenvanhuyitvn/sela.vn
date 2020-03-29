<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Category;
use App\Repositories\CategoryRepository;
class CategoryController extends Controller
{
    protected $model;
    public function __construct(Category $category)
    {
        // set the model
        $this->model = new CategoryRepository($category);
    }

    public function index(){
        $data['category'] = $this->model->all();
        return view('admin.layouts.categories.list', $data);
    }
    public function create(){
        $data['category']=Category::all();
        return view('admin.layouts.categories.add', $data);
    }
    public function store(Request $request)
    {
        // create record and pass in only fields that are fillable
        $this->model->create($request->only($this->model->getModel()->fillable));
        return redirect('admin/category/list')->with('thongbao','Đã thêm danh mục : <strong>'.$request->name.' </strong> thành công!');
    }
    public function edit($id){
        $data['category']= $this->model->all();
        $data['cate']=  $this->model->show($id);
        return view('admin.layouts.categories.edit', $data);
    }
    public function update(Request $request, $id){
        $category =  $this->model->show($id);
        $old_name = $category->name;
        $this->model->update($request->only($this->model->getModel()->fillable), $id);
        return redirect('admin/category/edit/'.$id)->with('thongbao','Đã sửa danh mục : <strong>'.$old_name.' -> '.$request->name.' </strong> thành công!');
    }
    public function destroy($id){
        $this->model->delete($id);
        return redirect('admin/category/list')->with('thongbao','Đã xóa thành công');
    }
}
