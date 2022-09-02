<?php

namespace App\Http\Services;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\YourModel;

class YourService extends Controller
{
    public function getItems()
    {
        return YourModel::query()->get(); 
    }

    public function createItem($data)
    {
        $data = (object)$data; 
        YourModel::query()->create([
            'name' => $data->name,
            'detail' => $data->detail,
        ]);
    } 

    public function updateItem($id, $request)
    {
        YourModel::where('id',$id)->update([
            'name' => $request->name,
            'detail' => $request->detail,
        ]);  
    }

    public function deleteItem($id)  
    {
        return YourModel::query()->where('id',$id)->delete();  
    } 
}