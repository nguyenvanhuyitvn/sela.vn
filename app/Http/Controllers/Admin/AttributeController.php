<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Attribute;
use App\Repositories\AttributeRepository;
class AttributeController extends Controller
{
    protected $model;
    public function __construct(Attribute $attribute)
    {
        // set the model
        $this->model = new attributeRepository($attribute);
    }

    public function index(){
        $data['attributes'] = $this->model->all();
        return view('admin.layouts.attributes.list', $data);
    }
    public function create(){
        $data['attributes'] = $this->model->all();
        return view('admin.layouts.attributes.list', $data);
    }
    public function store(Request $request)
    {
        // create record and pass in only fields that are fillable
        $this->model->create($request->only($this->model->getModel()->fillable));
        return redirect('admin/attribute/list')->with('thongbao','Đã thêm thuộc tính : <strong>'.$request->name.' </strong> thành công!');
    }
    public function edit($id){
        $data['attribute']=  $this->model->show($id);
        return view('admin.layouts.attributes.edit', $data);
    }
    public function update(Request $request, $id){
        $attribute =  $this->model->show($id);
        $old_name = $attribute->name;
        $this->model->update($request->only($this->model->getModel()->fillable), $id);
        return redirect('admin/attribute/edit/'.$id)->with('thongbao','Đã sửa thuộc tính : <strong>'.$old_name.' -> '.$request->name.' </strong> thành công!');
    }
    public function destroy($id){
        $this->model->delete($id);
        return redirect('admin/attribute/list')->with('thongbao','Đã xóa thành công');
    }
}
