<?php

namespace App\Http\Controllers\Education;

use App\Http\Controllers\Base\BaseController;
use App\Http\Controllers\Controller;

use App\Models\JbEducation;
use App\Packages\Crud\CrudService;
use App\Packages\Education\EducationAdapter;
use Illuminate\Http\Request;

class EducationController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $rootTemplate = 'education';
    private $resource = 'education';
    private $storeMessage = 'Education Added';
    private $destroyMessage = 'Education Removed';
    private $updateMessage = 'Education Saved';

    public function index(Request $request)
    {
        $crudService = new CrudService(new EducationAdapter($request));
        $data = $crudService->getList();
        //
        return view('education.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('education.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $crudService = new CrudService(new EducationAdapter($request));
        $response = $crudService->create();
        return redirect(route('education.index'))->with($response);
        //
        // $data = request()->validate([
        //       'name'=>'required'
        // ]);
        // $data['created_by'] = \Auth::user()->id;
        // try {

        //     JbEducation::create($data);
        //     return $this->logSuccess('education.index',[],$this->storeMessage);
        // } catch (Exception $e) {
        //     return $this->logError('education.create',[],$e->getMessage());
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(JbEducation $education)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($education,Request $request)
    {
        $crudService = new CrudService(new EducationAdapter($request));
        $data = $crudService->getItem($education);
        //
        return view('education.edit',$data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $crudService = new CrudService(new EducationAdapter($request));
        $response = $crudService->update();
        return redirect(route('education.index'))->with($response);
        //
        // try {
        //     $education->update(request()->validate([
        //       'name'=>'required'
        //     ]));
        //     return $this->logSuccess($this->resource . '.index',[],$this->updateMessage);
        // } catch (Exception $e) {
        //     return $this->logError($this->resource . '.edit',[],$e->getMessage());
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$education)
    {
        $crudService = new CrudService(new EducationAdapter($request));
        $response = $crudService->delete();
        return redirect(route('education.index'))->with($response);
        //
        // try {
        //     $education->delete();
        //     return $this->logSuccess($this->resource . '.index',[],$this->destroyMessage);
        // } catch (Exception $e) {
        //     return $this->logError($this->resource . '.index',[],$e->getMessage());
        // }
    }

}
