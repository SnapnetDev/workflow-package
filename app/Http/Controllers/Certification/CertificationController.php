<?php

namespace App\Http\Controllers\Certification;

use App\Http\Controllers\Base\BaseController;
use App\Http\Controllers\Controller;

use App\Models\JbCertification;
use App\Packages\Certification\CertificationAdapter;
use App\Packages\Crud\CrudService;
use Illuminate\Http\Request;

class CertificationController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $rootTemplate = 'certification';
    private $resource = 'certification';
    private $storeMessage = 'Certification Added';
    private $destroyMessage = 'Certification Removed';
    private $updateMessage = 'Certification Saved';

    public function index(Request $request)
    {
        $crudService = new CrudService(new CertificationAdapter($request));
        $data = $crudService->getList();
        //
        return view('certification.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('certification.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $crudService = new CrudService(new CertificationAdapter($request));
        $response = $crudService->create();
        return redirect(route('certification.index'))->with($response);

        //
        // $data = request()->validate([
        //       'name'=>'required'
        // ]);
        // $data['created_by'] = \Auth::user()->id;
        // try {

        //     JbCertification::create($data);
        //     return $this->logSuccess($this->resource . '.index',[],$this->storeMessage);
        // } catch (Exception $e) {
        //     return $this->logError($this->competence . '.create',[],$e->getMessage());
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(JbSkill $skill)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($certification,Request $request)
    {
        $crudService = new CrudService(new CertificationAdapter($request));
        $data = $crudService->getItem($certification);
        //
        return view('certification.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$certification)
    {
     $crudService = new CrudService(new CertificationAdapter($request));
     $response = $crudService->update();
     return redirect(route('certification.index'))->with($response);
        //
        // try {
        //     $certification->update(request()->validate([
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
    public function destroy($certification,Request $request)
    {
        $crudService = new CrudService(new CertificationAdapter($request));
        $response = $crudService->delete();
        return redirect(route('certification.index'))->with($response);
        //certification
        //
        // try {
        //     $certification->delete();
        //     return $this->logSuccess($this->resource . '.index',[],$this->destroyMessage);
        // } catch (Exception $e) {
        //     return $this->logError($this->resource . '.index',[],$e->getMessage());
        // }
    }

}
