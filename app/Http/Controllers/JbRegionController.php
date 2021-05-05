<?php

namespace App\Http\Controllers;

use App\Packages\Crud\CrudService;
use App\Packages\Region\RegionAdapter;
use Illuminate\Http\Request;
use App\Packages\Region\RegionPort;

class JbRegionController extends Controller
{

    // private $crudService = null;


     function __construct(Request $request)
     {
     }

     function index(Request $request,RegionPort $regionPort){
//         $crudService = new CrudService(new RegionAdapter($request));
        $response = $regionPort->getList(); // $crudService->getList();
        return view('region.index',$response);
     }

     function create(){
        return view('region.create');
     }

    //
    function store(Request $request,RegionPort $regionPort){
//        $crudService = new CrudService(new RegionAdapter($request));
       $response = $regionPort->create(); // $crudService->create();
       return redirect()->back()->with($response);
    }

    function destroy(Request $request, RegionPort $regionPort){
//         $crudService = new CrudService(new RegionAdapter($request));
        $response = $regionPort->delete(); //$crudService->delete();
        return redirect()->back()->with($response);
    }

    function update(Request $request, RegionPort $regionPort){
//         $crudService = new CrudService(new RegionAdapter($request));
        $response = $regionPort->update(); //$crudService->update();
        return redirect()->back()->with($response);
    }

    function edit($id,Request $request, RegionPort $regionPort){
//         $crudService = new CrudService(new RegionAdapter($request));
        $response = $regionPort->getItem($id); //$crudService->getItem($id);
        return view('region.edit',$response);
    }

}
