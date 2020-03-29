<?php
function GetCategory($mang,$parent,$shift,$active)
{
 foreach($mang as $row)
 {
	if($row->parent==$parent)
	{
        if($row->id==$active)
        {
            echo "<option selected value='$row->id'>".$shift.$row->name."</option>";
        }
        else {
            echo "<option value='$row->id'>".$shift.$row->name."</option>";
        }
		
		GetCategory($mang,$row->id,$shift.'--| ',$active);
		
	}
 }
}



function ShowCategory($mang,$parent,$shift)
{
 foreach($mang as $row)
 {
	if($row->parent==$parent)
	{
		echo "<div class='item-menu'><span>".$shift.$row->name."</span>
        <div class='category-fix'>
            <a class='btn-category btn-primary' href='admin/category/edit/".$row->id."'><i class='fa fa-edit'></i></a>
            <a onclick='return del_category(\"$row->id\")' class='btn-category btn-danger' href='{{ route('admin.category.delete', ['id' => $row->id]) }}'><i class='fas fa-times'></i></i></a>
        </div>
    </div>";
		ShowCategory($mang,$row->id,$shift.'---|');
		
	}
 }
}
function ShowCategoryTable($mang,$parent,$shift)
{
 foreach($mang as $key => $row)
 {
	if($row->parent==$parent)
	{
		// echo "<tr>
		// 		<td>".$row->id."</td>
		// 		<td>".$shift." ".$row->name."</td>
		// 		<td>
		// 			<a class='btn btn-category btn-primary' href='admin/category/edit/".$row->id."'><i class='fa fa-edit'></i></a>
		// 			<a onclick='return del_category(\"$row->name\")' class='btn btn-category btn-danger' href='admin/category/del/".$row->id."'><i class='fas fa-times'></i></i></a>
		// 		</td>
		// 	</tr>";
		echo '<tr>
			<td>'.$row->id.'</td>
			<td>'.$shift.' '.$row->name.'</td>
			<td>
				<a class="btn btn-category btn-primary" href="'. route("admin.category.edit", ["id" => $row->id]).' "><i class="fa fa-edit"></i></a>
				<a onclick="return confirm(\' Bạn có muốn xóa danh mục:  '.$row->name.' \')" class="btn btn-category btn-danger" href="'. route("admin.category.delete", ["id" => $row->id]).' "><i class="fas fa-times"></i></i></a>
			</td>
		</tr>';
		unset($mang[$key]);
		ShowCategoryTable($mang,$row->id,$shift.'---|');
		
	}
 }
}


//input $mang=$product->values   output: array('size'=>array(s,m),'color'=>array('Đỏ',Xanh)) 
function attr_values($mang)
{
    $result=array();
    foreach($mang as $value)
    {
        $attr=$value->attribute->name;
        $result[$attr][]=$value->value;
    }
    return $result;
}

//get_variant
function get_combinations($arrays) {
	$result = array(array());
	foreach ($arrays as $property => $property_values) {
		$tmp = array();
		foreach ($result as $result_item) {
			foreach ($property_values as $property_value) {
				$tmp[] = array_merge($result_item, array($property => $property_value));
			}
		}
		$result = $tmp;
	}
	return $result;
}

//check value (editproduct.blade.php)
function check_value($product,$value_check)
{
	
	foreach ($product->values as $value) {
		if($value->id==$value_check)
		{
			return true;
		}
	}
	return false;

}
// kiểm tra biến thể
function check_var($product,$array)
{
	foreach($product->variant as $row)
	{
		$mang=array();
		foreach ($row->values as $value) {
			$mang[]=$value->id;
		}
		if(array_diff($mang,$array)==NULL)
		{
			return false;
		}
	}
	return true;
}