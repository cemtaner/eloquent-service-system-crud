<?php

namespace App\Http\Controllers;
use App\Http\Services\YourService;
use App\Models\YourModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class YourController extends Controller
{

    public $module;
    public $service;

    public function __construct(YourService $service)
    {
        $this->service = $service;
        $this->items = $service->getItems(); 
    } 

    public function index()
    {
        return view('module.index', [  
            'module'=>$this->items, 
        ]); 
    }


    public function create()
    {
        return view('module.create');
    }

    public function store(Request $request,YourService $service)
    {
        $validate=Validator::make($request->all(),[
            'name' => 'required|string',
            'detail' => 'required|string',
        ]);
        if($validate->fails()){
            return redirect()->route('module.index')->with('unsuccessful','Fill in all fields!');
        }
        $service->createItem($validate->validated()); 
        return redirect()->route('module.index')->with('success','Registration Added!'); 
    }


    public function show(YourModel $module)  
    { 
        return view('module.show',compact('module'));  
    }

    public function edit(YourModel $module)
    {
        return view('module.edit',compact('module'));   
    }

    public function update(Request $request, $id,YourService $service)
    { 
        $validate=Validator::make($request->all(),[
            'name' => 'required|string',
            'detail' => 'required|string',
        ]);
        if($validate->fails()){
            return redirect()->route('module.index')->with('unsuccessful','Fill in all fields!');
        }
        $service->updateItem($id,$request);   
        return redirect()->route('module.index')->with('success','Registration Updated!');  
    }

    public function destroy(YourService $service, $id)
    {
        $item = $service->deleteItem($id); 
        return redirect()->route('module.index')->with('unsuccessful','Record Deleted!'); 
    }
}
