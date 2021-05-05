<?php

namespace App\Http\Controllers;

use App\Packages\Crud\CrudService;
use App\Packages\Discipline\DisciplineAdapter;
// use App\Packages\Region\RegionAdapter;
use Illuminate\Http\Request;
use App\Packages\Discipline\DisciplinePort;

class JbDisciplineController extends Controller
{
    //

    function __construct(Request $request)
    {
    }

    function index(Request $request,DisciplinePort $disciplinePort){
//        $crudService = new CrudService(new DisciplineAdapter($request));
       $response = $disciplinePort->getList(); // $crudService->getList();
       return view('discipline.index',$response);
    }

    function create(){
       return view('discipline.create');
    }

   //
    function store(Request $request,DisciplinePort $disciplinePort){
//       $crudService = new CrudService(new DisciplineAdapter($request));
      $response = $disciplinePort->create(); //$crudService->create();
      return redirect()->back()->with($response);
   }

   function destroy(Request $request,DisciplinePort $disciplinePort){
//        $crudService = new CrudService(new DisciplineAdapter($request));
       $response = $disciplinePort->delete(); //$crudService->delete();
       return redirect()->back()->with($response);
   }

   function update(Request $request,DisciplinePort $disciplinePort){
//        $crudService = new CrudService(new DisciplineAdapter($request));
       $response = $disciplinePort->update(); //$crudService->update();
       return redirect()->back()->with($response);
   }

   function edit($id,Request $request,DisciplinePort $disciplinePort){
//        $crudService = new CrudService(new DisciplineAdapter($request));
       $response = $disciplinePort->getItem($id); //$crudService->getItem($id);
       return view('discipline.edit',$response);
   }

}
